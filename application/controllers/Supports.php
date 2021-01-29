<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Supports extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Support_M');
        $this->load->model('User_Model');
    }
    
    /*
     * User Deposit Information
     */
    public function index($page = 'add-support', $data = array()){

		if($this->session->userdata('isUserLoggedIn')){
        	$Userid = $this->session->userdata('userid');
			$money = $this->User_Model->get_user($Userid)->Wallet;
			if($money <= 50){
				$this->session->set_flashdata('notice', 'Insufficient Account Balance. Please add fund to your wallet to proceed!');
			}
			if(!isset($this->User_Model->get_user($Userid)->Picture)){
			    $image ='';
			} else{
			    $image = $this->User_Model->get_user($Userid)->Picture;
			}
			$head = array(
				'title' => 'pmb', 
				'money' => $money,
				'image' => $image
			);
			array_push($data, array('money' => $money));
            $this->load->view('user-templates/header', $head);
            $this->load->view('pages/user/'. $page, $data);
			$this->load->view('user-templates/footer');
        }
        else{
            redirect('/');
        }
    }

    public function view(){

    	$username = $this->session->userdata('username');
        $data = array();
        $config = array();
        $config["base_url"] = base_url() . "Supports/view";
        $config["total_rows"] = $this->Support_M->get_count($username);
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['users'] = $this->Support_M->get_all($config["per_page"], $page, $username);
        $data['flag'] = true;
        $this->index($page, $data);
    }
    
    public function add_support(){

		$data = array();
		if ($this->session->set_flashdata('success_msg')) {
			$data['success_msg'] = $this->session->set_flashdata('success_msg');
			unset($_SESSION['success_msg']);
		}
		if ($this->session->set_flashdata('error_msg')) {
			$data['error_msg'] = $this->session->set_flashdata('error_msg');
			unset($_SESSION['error_msg']);
		}
		if ($this->input->post()) {
			$this->form_validation->set_rules('subject', 'Subject', 'required');
			$this->form_validation->set_rules( 'message', 'Message.', 'required|min_length[20]|max_length[200]');
			if ($this->form_validation->run() == true) {
				
				if (!empty($_FILES['image']['name'])) {
				    
				    $config['overwrite'] = TRUE;
					$config['upload_path'] = 'front/uploads/images/';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['file_name'] = $_FILES['image']['name'];
					//Load upload library and initialize configuration
					$this->upload->initialize($config);
					if ($this->upload->do_upload('image')) {
						$uploadData = $this->upload->data();
						$image = $uploadData['file_name'];
					} else {
						$image = '';
					}
				} else {
					$image = '';
				}
				$userData = array(
					// 'Name' => strip_tags($this->input->post('name')),
					'UserName' => $this->session->userdata('username'),
					'Subject' => strip_tags($this->input->post('subject')),
					'Message' => strip_tags($this->input->post('message')),
					'Status' => 'Pending',
					'Date' => date("Y-m-d"),
					'Image' => $image
				);
				$insert_id = $this->Support_M->add($userData);
				if($insert_id){
					$this->session->set_flashdata('success_msg', 'Your Profile have been updated successfully.');
					$this->session->set_userdata('support_id', $insert_id);
					redirect('user/add-support');
				} 
			} else {
					$this->session->set_flashdata('error_msg', 'Some problems occurred, please try again.');
					redirect('user/add-support');
				}
		}else {
			$this->session->set_flashdata('error_msg', 'Some problems occurred, please try again.');
			redirect('user/add-support');
		}
    }
}
