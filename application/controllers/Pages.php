<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->session->set_userdata('hasVisited');
        $this->load->model('User_Model');
        $this->load->model('Testimonial_M');
    }
	
	public function index($page = 'home', $data = array()){
		
        $head['title'] = 'Pay My Bill | PMBCLUB';
		// $data['title'] = ucfirst($page);
        if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
            show_404();
        }
        $testimonials = $this->Testimonial_M->get_all_testi();
        if($testimonials) {
            $data['testimonials'] = $testimonials;
        }
        $this->load->view('templates/header', $head);
        $this->load->view('pages/'. $page, $data);
        $this->load->view('templates/footer');
	}

    /*
     * About Us Page information
     */
	public function about_us(){
        $data['usercount'] = $this->getUsersOnline();
		$page = 'about-us';
	    $this->index($page, $data);
	}

	public function how_to_play(){
		$page = 'how-to-play';
	    $this->index($page);
	}

    /*
     * Play Now Page information
     */
	public function play_now(){
		$page = 'play-now';
    	$this->index($page);
    } 

    /*
     * Donate Page information
     */
    public function donate(){
        $page = 'donate';
        $this->index($page);
    }

    /*
     * Insert Donate Information
     */
	public function add_donate(){
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
            $this->form_validation->set_rules('name', 'Your FullName', 'trim|required|min_length[4]');
            $this->form_validation->set_rules('email', 'Your Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric|max_length[12]');
            $this->form_validation->set_rules('amount', 'Amount', 'trim|numeric|required');
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'amount' => $this->input->post('amount')
            );
            if($this->form_validation->run() == true){
                $insert = $this->User_Model->insert_charity($data);
                if($insert && $this->input->post('amount')){
                    $this->session->set_flashdata('success_msg', 'Your request was send successfully. Please login to your account.');
                    redirect('pay/' .$insert);
                }else{
                    $this->session->set_flashdata('error_msg', 'You are not a registered user. please register and try again.');
                    redirect('donate');
                }
            } else {
				$this->session->set_flashdata('error_msg', 'Some problems occurred, please try again.');
                redirect('donate');
			}
        }
	}

    /*
     * Paqs Page information
     */
	public function faqs(){
		$page = 'our-faq';
	    $this->index($page);
	}

    /*
     * Winners Page information
     */
	public function winners(){
		$page = 'winners';
	    $this->index($page);
	}

    /*
     * Contact Us Page information
     */
	public function contact_us(){
        $page = 'contact-us';
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
            $this->form_validation->set_rules('name', 'Your FullName', 'trim|required|min_length[4]');
            $this->form_validation->set_rules('email', 'Your Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('title', 'Complaint Title', 'trim|required|max_length[12]');
            $this->form_validation->set_rules('content', 'Complaint Content', 'trim|required');
            $data = array(
                'id' => $this->session->userdata('userid'),
                'name' => strip_tags($this->input->post('name')),
                'email' => strip_tags($this->input->post('email')),
                'title' => strip_tags($this->input->post('title')),
                'content' => strip_tags($this->input->post('content')),
            );

            if($this->form_validation->run() == true){
                $insert = $this->User_Model->insert_complaint($data);
                if($insert){
                    $this->session->set_flashdata('success_msg', 'Your Request was send successfully! Please wait.');
                }else{
                    $this->session->set_flashdata('error_msg', 'You are not a registered user. please register and try again.');
                }
            } else {
				$this->session->set_flashdata('error_msg', 'Some problems occurred, please try again.');
			}
        }
        $this->index($page);
	}

    /*
     * User Counter information
     */
    public function getUsersOnline() {

        if (isset($_SESSION["hasVisited"])) {
            $count = $_SESSION["hasVisited"]++;
        } else {
            $count = 1;
        }
       return $count;
    }
} 
	
	