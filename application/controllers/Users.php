<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Transaction_M');
        $this->load->model('Commission_M');
        $this->load->model('User_Model');
    }
    
    /*
     * User account information
     */
    public function index($page = 'user-dashboard', $data = array()){

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
     * --------------- update password -----------------------
     */
    public function update_password()
    {
		$page = 'update-password';
		$data = array();
		if ($this->session->set_flashdata('success_msg')) {
			$data['success_msg'] = $this->session->set_flashdata('success_msg');
			unset($_SESSION['success_msg']);
		}
		if ($this->session->set_flashdata('error_msg')) {
			$data['error_msg'] = $this->session->set_flashdata('error_msg');
			unset($_SESSION['error_msg']);
		}
        if($this->input->post()) {
            $this->form_validation->set_rules('old_pass', 'Your Old Password', 'required');
            $this->form_validation->set_rules('new_pass', 'Your New Password', 'required|min_length[6]');
            $this->form_validation->set_rules('confirm_pass', 'Your Confirm Password', 'required|matches[new_pass]');
            $old_pass = md5($this->input->post('old_pass'));
            $new_pass = md5($this->input->post('new_pass'));
            $confirm_pass = md5($this->input->post('confirm_pass'));
            $session_id = $this->session->userdata('userid');
            $que = $this->db->query("select * from users where id='$session_id'");
            $row = $que->row();
            if((!strcmp($old_pass, $row->Password)) && (!strcmp($new_pass, $confirm_pass))){
                $this->User_Model->update_password($session_id, $new_pass);
                $this->session->set_userdata('success_msg', 'Password changed successfully !');

            }else{
                    $this->session->set_userdata('error_msg', 'Your password invalid.');
            }      
        }
        $this->index($page); 
    }

	// ============================= User Dashboard ==================================

    /*
     * --------------- User Dashboard -----------------------
     */
    public function dashboard(){

    	$page = 'user-dashboard';
    	if ($this->session->set_flashdata('notice')) {
			$data['notice'] = $this->session->set_flashdata('notice');
			unset($_SESSION['notice']);
		}
    	$Userid = $this->session->userdata('userid');
		$transationID = $this->db->order_by('id',"desc")->where('User_id', $Userid)->limit(1)->get('transactions')->row()->TransactionID;
    	$data = array(
			'purchases' => $this->Transaction_M->get_count_purchase($Userid), 
			'earnings' => $this->Commission_M->get_count_commission($Userid),
			'winnings' => $this->Transaction_M->get_count_winning($Userid), 
			'amount' => $this->Transaction_M->amount($Userid),
			'transactionID' => $transationID
		);
        $this->index($page, $data);
    }

    public function profile(){

        $page = 'profile';
        $id = $this->session->userdata('userid');
		$user = $this->User_Model->get_user($id);
		$data = array(
		    'name' => $user->Name,
		    'username' => $user->Username,
		    'email' => $user->Email,
		    'phone' => $user->Phone,
		    'gender' => $user->Gender,
		    'country' => $user->Country
		);
		$this->index($page, $data);
    }

    public function update_profile(){

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
			$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[4]|is_unique[users.Name]');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric|max_length[12]');
			$this->form_validation->set_rules('address', 'Address', 'trim|required');
			$this->form_validation->set_rules('userinfo', 'Additional info', 'trim|required|min_length[15]');
			if($this->form_validation->run() == TRUE) {

				if (!empty($_FILES['picture']['name'])) {
				    
					$config['upload_path'] = 'front/uploads/images/';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['file_name'] = $_FILES['picture']['name'];
					$config['overwrite'] = TRUE;
					//Load upload library and initialize configuration
					$this->upload->initialize($config);
					if ($this->upload->do_upload('picture')) {
						$uploadData = $this->upload->data();
						$picture = $uploadData['file_name'];
					} else {
						$picture = '';
					}
				} else {
					$picture = '';
				}
				$update_data = array(
					'Name' => strip_tags($this->input->post('name')),
					'Gender' => $this->input->post('gender'),
					'Phone' => strip_tags($this->input->post('phone')),
					'Country' => $this->input->post('country'),
					'Address' => strip_tags($this->input->post('address')),
					'Userinfo' => strip_tags($this->input->post('userinfo')),
					'DateUpdated' => date("Y-m-d"),
					'Picture' => $picture
				);
				$res = $this->User_Model->update_profile($update_data);
				if($res > 0){
					$this->session->set_flashdata('success_msg', 'Your Profile have been updated successfully.');
				} 
			}else {
				$this->session->set_flashdata('error_msg', 'Some problems occurred, please try again.');
			}
		}
		redirect('user/profile');
    }

    public function request_withdrawal(){

        $page = 'request-withdrawal';
        $this->index($page);
    }

    public function withdrawals(){

        $page = 'withdrawals';
        $this->index($page);
    }
    
}
