<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Deposits extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Transaction_M');
        $this->load->model('User_Model');
    }
    
    /*
     * User Deposit Information
     */
    public function index($page = 'add-deposit', $data = array()){

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
        $config["base_url"] = base_url() . "Deposits/view";
        $config["total_rows"] = $this->Transaction_M->get_count_deposit($Userid);
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['deposits'] = $this->Transaction_M->get_all_deposit($config["per_page"], $page, $Userid);
        $data['flag'] = true;
        $this->index($page, $data);
    }
    
    public function add_deposit(){

		$page = 'add-deposit';
		$data = array();
		$id = $this->session->userdata('userid');
		if ($this->session->set_flashdata('warning')) {
			$data['warning'] = $this->session->set_flashdata('warning');
			unset($_SESSION['warning']);
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
			if($this->input->post('gateway') === 'Paystack'){
				$transactionid = 'STXN'. time();
			} else{
				$transactionid = time();
			}
			$id = $this->session->userdata('userid');
			$userData = array(
				'User_id' => $id,
				'Gateway' => "Deposit Via " .$this->input->post('gateway'),
				'Amount' => $this->input->post('amount'),
				'TransactionID' => $transactionid,
				'TransactionBy' => $this->session->userdata('username'),
				'Status' => 'Pending',
				'Created' => date("Y-m-d")
			);
			$amount = intval($this->input->post('amount'));
			if($amount < 100){
				$this->session->set_flashdata('warning', 'Sorry! you can only deposit minimum of N100');
				redirect('user/add-deposit');
			}
			if ($this->form_validation->run() == true) {
				$res = $this->Transaction_M->add_play_lottery($userData);
				if($res){
					if($userData['Gateway'] == 'Deposit Via Paystack'){
						redirect('user/deposit/now/'. $id);
					} else{
						$this->session->set_flashdata('success_msg', 'Your Profile have been updated successfully.');
						redirect('user/transactions');
					}
				} 
			} else {
					$this->session->set_flashdata('error_msg', 'Some problems occurred, please try again.');
					redirect('user/add-deposit');
				}
		}
        $this->index($page, $data);
    }
}
