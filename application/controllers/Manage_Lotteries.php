<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Manage_Lotteries extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Manage_Lottery_M');
    }
    
    /*
     *  Manage Lottery
     */

    public function index($page = 'manage-lottery', $data = array()){
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
     *  Manage Lottery view
     */

    public function view(){

        $page = 'manage-lottery';
        $data = array();
        $config = array();
        $config["base_url"] = base_url() . "Manage_Lotteries/view";
        $config["total_rows"] = $this->Manage_Lottery_M->get_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['lotteries'] = $this->Manage_Lottery_M->get_all($config["per_page"], $page);
        $data['flag'] = true;
        $this->index($page, $data);
    }

    /*
     *  Add Lottery 
     */

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
                $insert_id = $this->Manage_Lottery_M->add($insert);
                if($insert_id){
                    $this->session->set_flashdata('success_msg', 'Request was saved successfully.');
                    redirect('admin/manage-lottery');
                }else{
                    $this->session->set_flashdata('error_msg', 'Something was wrong, please try again.');
                    redirect('admin/manage-lottery');
                }
            }else{
                $this->session->set_flashdata('error_msg', 'Something was wrong, please try again.');
                redirect('admin/manage-lottery');
            }
        }
    }

    /*
     *  Edit Lottery
     */

    public function edit($id){

        $data = array(
        	'LotteryName' => $this->input->post('type'),
        	'StartDate' => $this->input->post('date_from'),
        	'EndDate' => $this->input->post('date_to'),
        	'Status' => $this->input->post('status)')
        );
        // var_dump($id); exit();
        $res = $this->Manage_Lottery_M->update($id, $data);
        $this->view();
    }

    /*
     *  Delete Lottery
     */

    public function delete($id){
        
        $res = $this->Manage_Lottery_M->delete($id);
        $this->view();
    }
}