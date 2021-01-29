<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Testimonials extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Testimonial_M');
        $this->load->model('User_Model');
    }
    
    /*
     * User Deposit Information
     */
    public function index($page = 'add-testimonial', $data = array()){

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
        $config["base_url"] = base_url() . "Testimonials/view";
        $config["total_rows"] = $this->Testimonial_M->get_count($username);
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['users'] = $this->Testimonial_M->get_all($config["per_page"], $page, $username);
        $data['flag'] = true;
        $this->index($page, $data);
    }
    
    public function add_testimonial(){

		$data = array();
		$id = $this->session->userdata('userid');
		if ($this->session->set_flashdata('success_msg')) {
			$data['success_msg'] = $this->session->set_flashdata('success_msg');
			unset($_SESSION['success_msg']);
		}
		if ($this->session->set_flashdata('error_msg')) {
			$data['error_msg'] = $this->session->set_flashdata('error_msg');
			unset($_SESSION['error_msg']);
		}
		if ($this->input->post()) {
			$this->form_validation->set_rules('title', 'Title', 'required|max_length[40]|min_length[9]');
			$this->form_validation->set_rules( 'ticket_num', 'TicketNumber', 'required');
			$this->form_validation->set_rules( 'message', 'Message', 'required|min_length[20]|max_length[200]');
			$testiData = array(
				'Name' => $this->session->userdata('name'),
				'Title' => $this->input->post('title'),
				'TicketNumber' => $this->input->post('ticket_num'),
				'Message' => $this->input->post('message'),
				'Status' => 'Completed',
				'Date' => date("Y-m-d"),
			);
			if ($this->form_validation->run() == true) {
				$res = $this->Testimonial_M->save($testiData);
				if($res){
					$this->session->set_flashdata('success_msg', 'Your Request have been saved successfully.');
					redirect('user/add-testimonial');
				} 
			} else {
					$this->session->set_flashdata('error_msg', 'Some problems occurred, please try again.');
					redirect('user/add-testimonial');
				}
		}else {
			$this->session->set_flashdata('error_msg', 'Some problems occurred, please try again.');
			redirect('user/add-testimonial');
		}
	}
}
