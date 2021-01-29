<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Winnings extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Transaction_M');
        $this->load->model('User_Model');
    }
    
    /*
     *  User Purchase Information
     */

    public function index($page = 'winnings', $data = array()){

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

        $Userid = $this->session->userdata('userid');
        $data = array();
        $config = array();
        $config["base_url"] = base_url() . "Winnings/view";
        $config["total_rows"] = $this->Transaction_M->get_count_winning($Userid);
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['winnings'] = $this->Transaction_M->get_all_winning($config["per_page"], $page, $Userid);
        $data['flag'] = true;
        $this->index($page, $data);
    }

    public function add(){

        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        if($this->input->post()){
            $this->form_validation->set_rules('type', 'Lottery Type', 'required');
            $this->form_validation->set_rules('date_from', 'Start Date', 'required');
            $this->form_validation->set_rules('date_to', 'End Date', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() == true) {
                $insert = array(
                    'LotteryName'=> $this->input->post('type'),
                    'StartDate'=> $this->input->post('date_from'),
                    'EndDate'=> $this->input->post('date_to'),
                    'Status'=> $this->input->post('status')
                );
                $insert_id = $this->Transaction_M->add($insert);
                if($insert_id){
                    $this->session->set_flashdata('success_msg', 'Request was saved successfully.');
                    redirect('admin/purchase-tickets');
                }else{
                    $this->session->set_flashdata('error_msg', 'Something was wrong, please try again.');
                }
            }
        }
        $this->view();
    }

    public function edit($id){

        $data = array(
        	'LotteryName' => $this->input->post('type'),
        	'StartDate' => $this->input->post('date_from'),
        	'EndDate' => $this->input->post('date_to'),
        	'Status' => $this->input->post('status)')
        );
        // var_dump($id); exit();
        $res = $this->Transaction_M->update($id, $data);
        $this->view();
    }

    public function delete($id){
        
        $res = $this->Transaction_M->delete($id);
        $this->view();
    }  
}
