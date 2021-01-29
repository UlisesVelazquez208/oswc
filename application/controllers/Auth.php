<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Auth extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('User_Model');
    }
    /*
     * User account information
     */
    public function index($page = 'login', $data = null){
        
        $head['title'] = 'Pay My Bill | PMBCLUB';
        $this->load->view('templates/header', $head);
        $this->load->view('pages/'. $page, $data);
        $this->load->view('templates/footer');
    }
    
    /*
     * User login
     */
    public function login(){
        $page = 'login';
        $data = array();
        if($this->session->set_flashdata('success_msg')){
            $data['success_msg'] = $this->session->set_flashdata('success_msg');
            unset($_SESSION['success_msg']);
        }
        if($this->session->set_flashdata('error_msg')){
            $data['error_msg'] = $this->session->set_flashdata('error_msg');
            unset($_SESSION['error_msg']);
        }
        if($this->input->post()){
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() == true) {
                $con['returnType'] = 'single';
                $con = array(
                    'username'=> $this->input->post('username'),
                    'password' => md5($this->input->post('password')),
                );
                $checkLogin = $this->User_Model->get_one_user($con);
                if($checkLogin){
					$sess_data['userid'] = $checkLogin->id;
					$sess_data['name'] = $checkLogin->Name;
                    $sess_data['email'] = $checkLogin->Email;
                    $sess_data['username'] = $checkLogin->Username;
					$sess_data['phone'] = $checkLogin->Phone;
                    $this->session->set_userdata('isUserLoggedIn', TRUE);
                    $this->session->set_userdata($sess_data);
					$this->session->set_flashdata('success_msg', 'Your account was log in successfully.');
                    redirect('user');
                }else{
                    $this->session->set_flashdata('error_msg', 'Wrong email or password.Or please Verify Your Email and try again.');
                }
            }
        }
        $this->index($page);
     }
    
    /*
     * User registration
     */
    public function register(){
		$page = 'register';
        $userData = array();
        if($this->session->set_flashdata('success_msg')){
            $data['success_msg'] = $this->session->set_flashdata('success_msg');
            unset($_SESSION['success_msg']);
        }
        if($this->session->set_flashdata('error_msg')){
            $data['error_msg'] = $this->session->set_flashdata('error_msg');
            unset($_SESSION['error_msg']);
        }
        if($this->input->post()){
            $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[4]|is_unique[users.Name]');
            $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|callback_email_check');
            $this->form_validation->set_rules('username', 'Choose a Username', 'trim|required|min_length[4]|is_unique[users.Username]');
            $this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
            $this->form_validation->set_rules('password', 'Choose Password', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('repassword', 'Confirm Password', 'trim|required|matches[password]');
            $userData = array(
                'Name' => strip_tags($this->input->post('name')),
                'Email' => strip_tags($this->input->post('email')),
                'Username' => strip_tags($this->input->post('username')),
                'Gender' => $this->input->post('gender'),
                'Phone' => strip_tags($this->input->post('phone')),
                'State' => $this->input->post('state'),
                'Password' => md5($this->input->post('password')),
                'Visit_count' => 0, 
                'DateRegistered' => date("Y-m-d"),
                'Email_key' => md5(date("Y-m-d H:i:s")),
                'Verified' => 0
            );
            if($this->form_validation->run() == true){
                $id = $this->User_Model->create_user($userData);
                $key = $userData['Email_key'];
                $email = $userData['Email'];
                $password = $userData['Password'];
                if($id){
                    //set up email
                    // $config = array(
                    //     'protocol' => 'sendmail',
                    //     'mailtype' => 'html',
                    //     'charset' => 'iso-8859-1',
                    //     'validation' => TRUE,
                    //     'wordwrap' => TRUE
                    // );
                    // $message =  "
                    //     <html>
                    //     <head>
                    //         <title>Verification Key</title>
                    //     </head>
                    //     <body>
                    //         <h2>Thank you for Registering.</h2>
                    //         <p>Your Account:</p>
                    //         <p>Email: ".$email."</p>
                    //         <p>Password: ".$password."</p>
                    //         <p>Please click the link below to verify your account.</p>
                    //         <h4><a href='".base_url()."Auth/verify_email/".$id."/".$key."'>Activate My Account</a></h4>
                    //     </body>
                    //     </html>
                    //     ";
                    // $this->load->library('email', $config);
                    // $this->email->set_newline("\r\n");
                    // $this->email->clear(TRUE);
                    // $this->email->from('pmbclub.com', 'pmbclub');
                    // $this->email->to($email);
                    // $this->email->subject('Signup Verification Email');
                    // $this->email->message($message);
         
                    // //sending email
                    // if($this->email->send()){
                    //     $this->session->set_flashdata('success_msg','We sent a request to your Mail. Please verify your Email.');
                    // }
                    // else{
                    //     $this->session->set_flashdata('error_msg', $this->email->print_debugger());
                    // }
                    $this->session->set_flashdata('success_msg', 'We sent a request to your Mail. Please verify your Email.');
                } else {
                    $this->session->set_flashdata('error_msg', $this->email->print_debugger());
                }
            }
        }
        $this->index($page);
        
    }

    /*
     * Verify Email
     */
    public function verify_email(){
        $id =  $this->uri->segment(3);
        $verification_key = $this->uri->segment(4);
 
        //fetch user details
        $user = $this->User_Model->get_user($id);
 
        //if email_key matches
        if($user->Email_key == $verification_key){
            //update user verify status
            $data['Verified'] = 1;
            $query = $this->User_Model->activate($data, $id);
 
            if($query){
                $this->session->set_flashdata('success_msg', 'Your Account verified successfully! Please log in now.');
            }
            else{
                $this->session->set_flashdata('error_msg', 'Something went wrong in verifying account');
            }
        }
        else{
            $this->session->set_flashdata('error_msg', 'Cannot verfy account. email_key didnt match');
        }
        redirect('signup');
    }
    /*
     * User Forgot password
     */ 
    public function forgot_password() {

		$page = 'forgot_password';
		$data = array();
        if($this->session->set_flashdata('success_msg')){
            $data['success_msg'] = $this->session->set_flashdata('success_msg');
            unset($_SESSION['success_msg']);
        }
        if($this->session->set_flashdata('error_msg')){
            $data['error_msg'] = $this->session->set_flashdata('error_msg');
            unset($_SESSION['error_msg']);
        }
        if($this->input->post()){
            $this->form_validation->set_rules('email', 'Your Email', 'trim|required|valid_email');
            if($this->form_validation->run() == true){
                $email = $this->input->post('email');
                $row = $this->User_Model->get_user_by_email($email);
                if($row){
                    $session['session_id'] = $row->id;
                    $this->session->set_flashdata('success_msg', 'Your Email was valid. Please reset your Password.');
                    $this->session->set_userdata($session);
                    redirect('change');
                } else{
                    $this->session->set_flashdata('error_msg', 'No Account Found For This Email.');
                }
            }
        }
        $this->index($page);
    }
    /*
     * User Reset password
     */ 
    public function reset_password() {

		$page = 'reset-password';
		$data = array();
        if($this->session->set_flashdata('success_msg')){
            $data['success_msg'] = $this->session->set_flashdata('success_msg');
            unset($_SESSION['success_msg']);
        }
        if($this->session->set_flashdata('error_msg')){
            $data['error_msg'] = $this->session->set_flashdata('error_msg');
            unset($_SESSION['error_msg']);
        }
        if($this->input->post()){
            $this->form_validation->set_rules('password', 'New Password', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]');
            if($this->form_validation->run() == true) {
                $new_pass = md5($this->input->post('password'));
                $session_id = $this->session->userdata('session_id');
                $row = $this->User_Model->update_password($session_id, $new_pass);
                if($row){
                    $this->session->set_flashdata('success_msg', 'Your Password was updated successfully. Please login to your account.');
                } else{
                    $this->session->set_flashdata('error_msg', 'Your password is not matched. Please try again!');
                }
            }
        }
        $this->index($page);
    }

    /*
     * User logout
     */
    public function logout(){
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->unset_userdata('userId');
        $this->session->sess_destroy();
        redirect('login');
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
}
