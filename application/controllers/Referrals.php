<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Referrals extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('User_Model');
    }
    
    /*
     * User account information
     */
    public function index($page = 'referrals', $data = array()){

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
        $userid = $this->session->userdata('userid');
        $data = array();
        $config = array();
        $config["base_url"] = base_url() . "Referrals/view";
        $config["total_rows"] = $this->User_Model->get_count_referral($userid);
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['users'] = $this->User_Model->get_user_referral($config["per_page"], $page, $userid);
        $data['flag'] = true;
        $this->index($page, $data);
    }
    
}
