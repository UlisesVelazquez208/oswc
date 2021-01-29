<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Withdrawals extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Withdrawal_M');
        $this->load->model('Testimonial_M');
        $this->load->model('User_Model');
    }
    
    /*
     *  User Purchase Information
     */

    public function index($page = 'request-withdrawal', $data = array()){

        if($this->session->userdata('notice_msg')){
            $data['notice_msg'] = $this->session->userdata('notice_msg');
            $this->session->unset_userdata('notice_msg');
        }
        $name = $this->session->userdata('name');
        if($this->Testimonial_M->check($name) < 1){
            $this->session->set_flashdata('notice_msg', 'You have to write testimony before request withdrawal.');
        }
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
     *  User Purchase Information
     */

    public function view(){

        $Userid = $this->session->userdata('userid');
        $data = array();
        $config = array();
        $config["base_url"] = base_url() . "Withdrawals/view";
        $config["total_rows"] = $this->Withdrawal_M->get_count_withdrawal($Userid);
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['withdrawals'] = $this->Withdrawal_M->get_all_withdrawal($config["per_page"], $page, $Userid);
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
            $this->form_validation->set_rules('method', 'Payment Method', 'required');
            $this->form_validation->set_rules('amount', 'Amount', 'required|numeric');
            $this->form_validation->set_rules('message', 'Message', 'required|min_length[40]|max_length[200]');
            if ($this->form_validation->run() == true) {
                $insert = array(
                    'User_id'=> $this->session->userdata('userid'),
                    'Gateway'=> $this->input->post('method'),
                    'TransactionID'=> time(),
                    'TransactionBy'=> $this->session->userdata('username'),
                    'Amount'=> $this->input->post('amount'),
                    'Message'=> $this->input->post('message'),
                    'Status'=> 'Completed',
                    'Created'=> date('Y-m-d')
                );
                $name = $this->session->userdata('name');
                if($this->Testimonial_M->check($name) > 0){
                    $insert_id = $this->Withdrawal_M->save($insert);
                    if($insert_id){
                        $this->session->set_flashdata('success_msg', 'Request was saved successfully.');
                        redirect('user/withdrawal/request');
                    }else{
                        $this->session->set_flashdata('notice_msg', 'You have to write testimony before request withdrawal.');
                    }
                } else{
                    $this->session->set_flashdata('notice_msg', 'You have to write testimony before request withdrawal.');
                    redirect('user/withdrawal/request');
                }
                
            } else{
                $this->session->set_flashdata('error_msg', 'Something was wrong, please try again.');
            }
            redirect('user/withdrawal/request');
        }
    }
}
