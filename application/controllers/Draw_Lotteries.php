<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Draw_Lotteries extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Transaction_M');
        $this->load->model('User_Model');
        $this->load->model('Transaction_M');
    }
    
    // ================== User Dashboard Lottery Information ====================
    /*
     * User Dashboard Play Lottery Interface
     */
    public function index($page = 'play-lottery', $data = array()){

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
     * Store User Play Lottery Information
     */

    public function save(){

       	$data = array();
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
			$this->form_validation->set_rules('wallet', 'Wallet', 'required');
			if ($this->form_validation->run() == true) {
				$wallet = intval($this->input->post('wallet'));
				var_dump($wallet);
				$amount = intval($this->input->post('amount'));
				$money = $wallet - $amount;
				if($money < 0){
					$this->session->set_flashdata('warning', 'Sorry! Insufficient Available Balance. Before fill your wallet with fund.');
					return redirect('user/add-deposit');
				}
				$data = array(
					'User_id' => $this->session->userdata('userid'),
					'TransactionBy' => $this->session->userdata('username'),
					'Gateway' => 'Purchase Ticket',
					'GameType' => $this->input->post('gametype'),
					'Amount' => $amount,
					'TransactionID' => 'REF'. time(),
					'TicketNumber' => $this->input->post('ticket_num'),
					'WinAmount' => $this->input->post('win_amount'),
					'Created' => date("Y-m-d"),
                    'Status' => 'Completed'
				);
				$update_data = array('Wallet' => $money);
				$res1 = $this->Transaction_M->add_play_lottery($data);
				$res2 = $this->User_Model->update_profile($update_data);
				if($res1 && $res2){
					$this->session->set_flashdata('success_msg', 'Your Request have been saved successfully.');
				} 
			} else {
				$this->session->set_flashdata('error_msg', 'Some problems occurred, please try again.');
			}
			return redirect('user/lottery/play', 'refresh');
		}
    }

    // ================ Admin Dashboard Lottery Information ===============
    
    /*
     *  Show Draw Lottery
     */

    public function show($page = '', $data = null){
        $data['title'] = 'PMB';
        $this->load->view('admin-templates/header', $data);
        if($this->session->userdata('isAdminLoggedIn') && $this->session->userdata('UserName')){
            $this->load->view('admin-templates/menu', $data);
            $this->load->view('pages/admin/'. $page, $data);
        }else{
            $this->load->view('pages/admin/admin-login', $data);
        }
        $this->load->view('admin-templates/footer');
    }

    /*
     * Admin Dashboard Play For School Fees Interface
     */
    public function school_view(){

        $data = array();
        $config = array();
        $config["base_url"] = base_url() . "Draw_Lotteries/school_view";
        $config["total_rows"] = $this->Transaction_M->get_count_school();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = 'play-for-school-fees';
        $data["links"] = $this->pagination->create_links();
        $data['users'] = $this->Transaction_M->get_all_school($config["per_page"], $page);
        $data['flag'] = true;
        $this->show($page, $data);
    }

    /*
     * Admin Dashboard Play For House Rent Interface
     */
    public function house_view(){

        $data = array();
        $config = array();
        $config["base_url"] = base_url() . "Draw_Lotteries/house_view";
        $config["total_rows"] = $this->Transaction_M->get_count_house();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = 'play-for-house-rent';
        $data["links"] = $this->pagination->create_links();
        $data['users'] = $this->Transaction_M->get_all_house($config["per_page"], $page);
        $data['flag'] = true;
        $this->show($page, $data);
    }

    /*
     * Admin Dashboard Play For Business Funding Interface
     */
    public function business_view(){

        $data = array();
        $config = array();
        $config["base_url"] = base_url() . "Draw_Lotteries/business_view";
        $config["total_rows"] = $this->Transaction_M->get_count_business();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = 'play-for-business-funding';
        $data["links"] = $this->pagination->create_links();
        $data['users'] = $this->Transaction_M->get_all_business($config["per_page"], $page);
        $data['flag'] = true;
        $this->show($page, $data);
    }

    // ================== Make Admin Dashboard Winner ====================

    /*
     * Make Winner
     */

    public function win(){

        $page = $this->uri->segment(1). ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
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
            $this->form_validation->set_rules('win_amount', 'Win Amount', 'required');
            if ($this->form_validation->run() == true) {
                $t_id = $this->input->post('t_id');
                $wallet = intval($this->User_Model->get_user($id)->Wallet);
                $win_amount = intval($this->input->post('win_amount'));
                $money = $wallet + $win_amount;
                $data = array(
                    'id' => $t_id,
                    'WinStatus' => 'Win',
                    'WinAmount' => $win_amount,
                    'DrawDate' => date("Y-m-d")
                );
                $update_data = array('Wallet' => $money, 'id' => $this->input->post('userid'));
                $res1 = $this->Transaction_M->update_transaction($data);
                $res2 = $this->User_Model->update_profile($update_data);
                if($res1 && $res2){
                    $this->session->set_flashdata('success_msg', 'Your Request have been saved successfully.');
                } 
            } else {
                $this->session->set_flashdata('error_msg', 'Some problems occurred, please try again.');
            }
            return redirect($page, 'refresh');
        }
    }

    // ================== Make Admin Dashboard Loser ====================

    /*
     * Make Loser
     */

    public function loss(){

        $page = $this->uri->segment(1). ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        // var_dump($page); exit();
        $data = array();
        if ($this->session->set_flashdata('success_msg')) {
            anchor($this->session->set_flashdata('success_msg'));
            unset($_SESSION['success_msg']);
        }
        if ($this->session->set_flashdata('error_msg')) {
            anchor($this->session->set_flashdata('error_msg'));
            unset($_SESSION['error_msg']);
        }
        if ($this->input->post()) {
            if ($this->form_validation->run() == true) {
                $t_id = $this->input->post('t_id');
                $id = $this->input->post('userid');
                $data = array(
                    'id' => $t_id,
                    'WinStatus' => 'Loss',
                    'DrawDate' => date("Y-m-d")
                );
                $res = $this->Transaction_M->update_transaction($data);
                if($res){
                    $this->session->set_flashdata('success_msg', 'Your Request have been saved successfully.');
                } 
            } else {
                $this->session->set_flashdata('error_msg', 'Some problems occurred, please try again.');
            }
            return redirect('admin/dashboard', 'refresh');
            // return redirect($page, 'refresh');
        }
    }
}
