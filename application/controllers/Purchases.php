<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Purchases extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Transaction_M');
        $this->load->model('User_Model');
    }
    
    /*
     *  User Purchase Information
     */

    public function index($page = 'purchase-tickets', $data = array()){

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
        $page = 'purchase-tickets';
        $data = array();
        $config = array();
        $config["base_url"] = base_url() . "Purchases/view";
        $config["total_rows"] = $this->Transaction_M->get_count_purchase($Userid);
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        $data['purchases'] = $this->Transaction_M->get_all_purchase($config["per_page"], $page, $Userid);
        $data['flag'] = true;
        $this->index($page, $data);
    }

    public function add_purchase(){

        $page = 'add-deposit';
        $data = array();
        $id = $this->session->userdata('userid');
        if ($this->session->set_flashdata('notice')) {
            $data['notice'] = $this->session->set_flashdata('notice');
            unset($_SESSION['notice']);
        }
        if ($this->session->set_flashdata('success_msg')) {
            $data['success_msg'] = $this->session->set_flashdata('success_msg');
            unset($_SESSION['success_msg']);
        }
        if ($this->session->set_flashdata('error_msg')) {
            $data['error_msg'] = $this->session->set_flashdata('error_msg');
            unset($_SESSION['error_msg']);
        }
        if ($this->input->post()) {
            $this->form_validation->set_rules('amount', 'Amount', 'required|numeric');
            $this->form_validation->set_rules( 'gateway', 'Select Payment Gateway...', 'required');
            $userData = array(
                'User_id' => $this->session->userdata('userid'),
                'Gateway' => "Purchase Ticket",
                'Amount' => $this->input->post('amount'),
                'TransactionID' => time(),
                'TransactionBy' => $this->session->userdata('username'),
                'Status' => 'Pending',
                'Created' => date("Y-m-d")
            );
            $amount = intval($this->input->post('amount'));
            if($amount < 100){
                $this->session->set_flashdata('notice', 'Sorry! you can only deposit minimum of N100');
                redirect('user/add-deposit');
            }
            if ($this->form_validation->run() == true) {
                $res = $this->Transaction_M->add_fund($userData);
                if($res){
                    $this->session->set_flashdata('success_msg', 'Your Profile have been updated successfully.');
                    redirect('user/add-deposit');
                } 
            } else {
                    $this->session->set_flashdata('error_msg', 'Some problems occurred, please try again.');
                    redirect('user/add-deposit');
                }
        }
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
