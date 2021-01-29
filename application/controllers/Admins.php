<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Admins extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Admin_Model');
        $this->load->model('User_Model');
        $this->load->model('Transaction_M');
        $this->load->model('Withdrawal_M');
    }
    
    /*
     * Admin account information
     */

    public function index($page = 'admin-login', $data = array()){

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
     * Admin login
     */
    public function login(){

        $page = 'admin-login';
        $data = array();
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        if($this->input->post()){
            $this->form_validation->set_rules('user', 'Username/Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            if ($this->form_validation->run() == true) {
                $con = array(
                    'user'=> $this->input->post('user'),
                    'password' => md5($this->input->post('password')),
                );
                $checkLogin = $this->Admin_Model->getAdmin($con);
                if($checkLogin){
                    $this->session->set_userdata('isAdminLoggedIn', TRUE);
                    $this->session->set_userdata('UserName', $checkLogin->username);
                    $this->session->set_userdata('name', $checkLogin->name);
                    $this->session->set_userdata('success_msg', 'Your account was successfully.');
                    redirect('admin/users');
                }else{
                    $this->session->set_userdata('error_msg', 'Wrong email or password, please try again.');
                }
            }
        }
        //load the index
        $this->index($page);
    }

    /*
     * Existing email check during validation
     */
    public function email_check($str){
        $con['returnType'] = 'count';
        $con['conditions'] = array('email'=>$str);
        $checkEmail = $this->User_Model->getEmail($con);
        if($checkEmail > 0){
            $this->form_validation->set_message('email_check', 'The given email already exists.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /*
     * --------------- update password -----------------------
     */
    public function update_password()
    {
        if($this->input->post()) {
            $this->form_validation->set_rules('old_pass', 'Your Old Password', 'required');
            $this->form_validation->set_rules('new_pass', 'Your New Password', 'required');
            $this->form_validation->set_rules('confirm_pass', 'Your Confirm Password', 'required|matches[new_pass]');
            $old_pass = $this->input->post('old_pass');
            $new_pass = $this->input->post('new_pass');
            $confirm_pass = $this->input->post('confirm_pass');
            $session_id = $this->session->userdata('userId');
            $que = $this->db->query("select * from users where id='$session_id'");
            $row = $que->row();
            if((!strcmp($old_pass, $pass)) && (!strcmp($new_pass, $confirm_pass))){
                $this->User_Model->update_password($session_id, $new_pass);
                $this->session->set_userdata('success_msg', 'Password changed successfully !');
                }
                else{
                    $this->session->set_userdata('error_msg', 'Your password invalid.');
                }
        }
        $page = 'update-password';
        $this->index($page); 
    }

    /*
     * Admin logout
     */
    public function logout(){
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->unset_userdata('UserName');
        $this->session->sess_destroy();
        redirect('admin');
    }

    /*
     * Admin logout
     */
    public function users(){
        $data = array();
        $config = array();
        $config["base_url"] = base_url() . "Admins/users";
        $config["total_rows"] = $this->User_Model->get_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['users'] = $this->User_Model->get_all_users($config["per_page"], $page);
        $data['flag'] = true;
        $this->index($page, $data);
    }

    /*
     * Admin Dashboard view
     */
    public function admin_dashboard(){

        $page = 'admin-dashboard';
        $data = array(
            'user_counts' => $this->User_Model->get_count(), 
            'ticket_counts' => $this->Transaction_M->get_count_history(),
            'winner_counts' => $this->Transaction_M->get_count_winners(), 
            'deposit_amounts' => $this->Transaction_M->deposit_amount(),
        );
        $this->index($page, $data);
    }

    /*
     * Admin Counter view
     */
    public function counter(){

        $page = 'counter';
        $this->index($page);
    }

    /*
     * Admin Counter Record
     */
    public function save_counter(){

        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        if($this->input->post()) {
            $this->form_validation->set_rules('number', 'Number', 'required|min_length[9]|is_unique[counters.Count]');
            if ($this->form_validation->run() == true) {
                $insert = array(
                    'Count'=> $this->input->post('number'),
                    'Date' => date('Y-m-d')
                );
                $res = $this->Admin_Model->store($insert);
                if($res){
                    $this->session->set_userdata('id', $res);
                    $this->session->set_userdata('success_msg', 'Your Number have been recorded Successfully.');
                    redirect('admin/counter');
                }else{
                    $this->session->set_userdata('error_msg', 'Wrong email or password, please try again.');
                }
            } else{
                $this->session->set_userdata('error_msg', 'Wrong email or password, please try again.');
            }
            redirect('admin/counter', 'refresh');
        }
    }

    /*
     * Admin Deposits view
     */
    public function deposits(){

        $data = array();
        $config = array();
        $config["base_url"] = base_url() . "Admins/deposits";
        $config["total_rows"] = $this->Transaction_M->count_deposit();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['deposits'] = $this->Transaction_M->all_deposit($config["per_page"], $page);
        $data['flag'] = true;
        $this->index($page, $data);
    }

    /*
     * Admin Draw History List
     */
    public function draw_history(){

        $data = array();
        $config = array();
        $config["base_url"] = base_url() . "Admins/draw_history";
        $config["total_rows"] = $this->Transaction_M->get_count_history();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['users'] = $this->Transaction_M->get_all_history($config["per_page"], $page);
        $data['flag'] = true;
        $this->index($page, $data);
    }

    /*
     * Admin All User Profiles view
     */
    public function profile(){

        redirect('user/dashboard');
    }

    /*
     * Admin All Payment Profiles view
     */
    public function payment_profile(){

        $page = 'payment-profile';
        $this->index($page);
    }

    /*
     * Admin Draw Lottery Results view
     */
    public function results(){

        $data = array();
        $config = array();
        $config["base_url"] = base_url() . "Admins/results";
        $config["total_rows"] = $this->Transaction_M->get_count_winners();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['winnings'] = $this->Transaction_M->get_all_winners($config["per_page"], $page);
        $data['flag'] = true;
        $this->index($page, $data);
    }

    /*
     * Admin All Testimonials view
     */
    public function testimonial(){

        $page = 'testimonial';
        $this->index($page);
    }

    /*
     * Admin All Transactions view
     */
    public function transactions(){

        $data = array();
        $config = array();
        $Userid = $this->session->userdata('userid');
        $config["base_url"] = base_url() . "Admins/transactions";
        $config["total_rows"] = $this->Transaction_M->get_count();
        $config["per_page"] = 25;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['transactions'] = $this->Transaction_M->get_all($config["per_page"], $page);
        $data['flag'] = true;
        $this->index($page, $data);
    }

    /*
     * Admin All User Payment Profile view
     */
    public function user_payment_profile(){

        $page = 'user-payment-profile';
        $this->index($page);
    }

    /*
     * Admin All Withdrawal Request view
     */
    public function withdrawal_requests(){

        $data = array();
        $config = array();
        $config["base_url"] = base_url() . "Admin/withdrawal_requests";
        $config["total_rows"] = $this->Withdrawal_M->get_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['withdrawals'] = $this->Withdrawal_M->get_all($config["per_page"], $page);
        $data['flag'] = true;
        $this->index($page, $data);
    }    
}