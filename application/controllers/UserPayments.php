<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class UserPayments extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('PayPro_M');
        $this->load->model('User_Model');
    }
    
    /*
     * User account information
     */
    public function index($page = 'create-payment-profile', $data = array()){

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
    
    /*
     * --------------- Payment Profile View -----------------------
     */
    public function view(){

		$Userid = $this->session->userdata('userid');
        $data = array();
        $config = array();
        $config["base_url"] = base_url() . "UserPayments/view";
        $config["total_rows"] = $this->PayPro_M->get_count_payment($Userid);
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['users'] = $this->PayPro_M->get_all_payment($config["per_page"], $page, $Userid);
        $data['flag'] = true;
        $this->index($page, $data);
    }
    /*
     * --------------- Insert User Payment Profile -----------------------
     */
    public function save(){

		$userid = $this->input->post('user_id');
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
			$this->form_validation->set_rules('bank_name', 'Bank Name', 'required');
			$this->form_validation->set_rules('acc_name', 'Account Name', 'required');
			$this->form_validation->set_rules('acc_number', 'Account Number', 'required|numeric|is_unique[pay_profiles.AccountNumber]');
			$userData = array(
				'UserID' => $this->input->post('user_id'),
			    'Gateway' => 'Bank',
				'BankName' => $this->input->post('bank_name'),
				'AccountName' => $this->input->post('acc_name'),
				'AccountNumber' => $this->input->post('acc_number'),
				'Created' => date("Y-m-d")
			);
			if ($this->form_validation->run() == true) {
				$res = $this->PayPro_M->save($userData, $userid);
				if($res){
					$this->session->set_flashdata('success_msg', 'Your Profile have been updated successfully.');
					redirect('user/payment-profile/create');
				} 
			} else {
				$this->session->set_flashdata('error_msg', 'Some problems occurred,  please try again.');
				redirect('user/payment-profile/create');
			}
		} else {
			$this->session->set_flashdata('error_msg', 'Some problems occurred,  please try again.');
			redirect('user/payment-profile/create');
		}
    }
}
