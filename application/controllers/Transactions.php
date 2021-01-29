<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Transactions extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Transaction_M');
        $this->load->model('User_Model');
    }
    
    /*
     * User Transaction Information
     */
    
    public function index($page = 'transactions', $data = array()){

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

        $data = array();
        $config = array();
        $Userid = $this->session->userdata('userid');
        $config["base_url"] = base_url() . "Transactions/view";
        $config["total_rows"] = $this->Transaction_M->get_count_transaction($Userid);
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['transactions'] = $this->Transaction_M->get_all_transaction($config["per_page"], $page, $Userid);
        $data['flag'] = true;
        var_dump($config["total_rows"]);
        $this->index($page, $data);
    }

    public function delete($id){
        
        $res = $this->Lottery_M->delete($id);
        $this->view();
    }
}
