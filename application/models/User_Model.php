<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model {

    function __construct() {
        $this->table = 'users';
        $this->charity_table = 'user_charity';
        $this->rel_table = 'user_relation_table';
    }

    /*
     * get User Referrals Count from the users table
     */
    public function get_user_referral($limit, $start, $userid) {

        $this->db->where('id', $userid);
        $this->db->limit($limit, $start);
        $res = $this->db->get($this->table);
        return $res->result();
    }

    /*
     * get User Referrals Count from the users table
     */
    public function get_count_referral($userid) {

        $this->db->where('id', $userid);
        $res = $this->db->get($this->table);
        return $res->num_rows();
    }

    /*
     * get All User Counts from the users table
     */
    public function get_count() {
        return $this->db->count_all($this->table);
    }

    /*
     * get individual user from the users table
     */
    public function get_user($userid) {
        $que = $this->db->get_where($this->table, array('id' => $userid));
        $user = $que->row();
        return $user;
    }

    /*
     * get All Users from the users table
     */
    public function get_all_users($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get($this->table);
        return $query->result();
    }
    /*
     * get user from the users table
     */

    function get_one_user($params = array()){
    
        // $this->db->where('Verified', 1);
        $this->db->where('Username', $params['username']);
        $this->db->where('Password', $params['password']);
        $this->db->from($this->table);
        $query = $this->db->get();
        $result = $query->row();
        if($result){
            $userid = $result->id;
            $this->visit_count($id);
        }
        return $result;
    }

    /*
     * email verify
     */

    function getEmail($params = array()){

        $this->db->select('*');
        $this->db->from($this->table);
        if(array_key_exists("conditions", $params)){
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key,$value);
            }
        }
        
        if(array_key_exists("id",$params)){
            $this->db->where('id',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            $query = $this->db->get();
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $query->num_rows();
            }elseif(array_key_exists("returnType",$params) && $params['returnType'] == 'single'){
                $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
            }else{
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }
        
        return $result;
    }
    
    /*
     * Visit count information
     */
    public function visit_count($id) {
        
        $count = 0;
        if($id){
            $query = $this->db->get_where($this->table, array('id' => $id));
            $result = $query->row();
            $count = $result->visit_count;
            $data = array(
                'visit_count' => $count + 1,
            );
        $this->db->update($this->table, $data,  array('id' => $id));
        }
    }

    /*
     * Insert user information
     */
    public function create_user($data = array()) {
        
        //insert user data to users table
        $insert = $this->db->insert($this->table, $data);
        //return the status
        return $this->db->insert_id();
    }

    /*
     * Insert charity information
     */
    public function activate($data, $id) {
        
        $this->db->where('id', $id);
        $answer = $this->db->update($this->table, $data);
        return $answer;
    }

    /*
     * Insert charity information
     */
    public function insert_charity($data = array()) {
        
        $this->db->where('Name', $data['name']);
        $this->db->where('Email', $data['email']);
        $this->db->where('Phone', $data['phone']);
        $que = $this->db->get($this->table);
        $row = $que->row();

        //insert charity data to user_charity table
        if($row){
            $insert_data = array(
                'user_id' => $row->id,
                'charity' => 'email:'. $data['email']. 'phone:'. $data['phone'],
                'amount' => $data['amount'],
                'date' => date("Y-m-d H:i:s"),
            );
            $this->db->insert($this->charity_table, $insert_data);
            return $row->id;
        }else{
            return false;
        }
    }

    /*
     * Get Donator Information
     */
    public function get_charity($id) {
        
        $que = $this->db->get_where($this->charity_table, array('user_id' => $id));
        $row = $que->row();
        $query = $this->db->get_where($this->table, array('id' => $id));
        $row1 = $query->row();
        $send = array(
            'name' => $row1->Name,
            'email' => $row1->Email, 
            'phone' => $row1->Phone,
            'amount' => $row->amount,
            'key' => 'pk_live_edb33a26c9ddb1bb8a4241a216d35edc2f64dcef'
        );
        if($send){
            return $send;
        } else{
            return false;
        }
    }

    /*
     * Insert complaint information
     */
    public function insert_complaint($data = array()) {
        
        $que = $this->db->get_where($this->table, array('Name' => $data['name'], 'Email' => $data['email'], 'id' => $data['id']));
        $row = $que->row();
        //insert complaint data to user_relation_table
        if($row){
            $insert_data = array(
                'user_id' => $row->id,
                'complaint_title' => $data['title'],
                'content' => $data['content'],
                'complaint_day' => date("Y-m-d"),
            );
            $this->db->insert($this->rel_table, $insert_data);
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    function update_password($session_id, $new_pass) {

        $update_data = array('Password' => $new_pass, );
        $this->db->where('id', $session_id);
        $res = $this->db->update($this->table, $update_data);
        return $res;
    }

    /*
     * email sending
     */
    public function get_user_by_email($email) {

        $que = $this->db->get_where($this->table, array('Email' => $email));
        $row = $que->row();
        return $row;
    }

    /*
     * User Profile Update
     */
    public function update_profile($data = array()) {
		
		$id = $this->session->userdata('userid');
		$this->db->where('id', $id);
		$update = $this->db->update($this->table, $data);
        if($update){
            return true;
        }else{
            return false;    
        }
    }

    /*
     * User Wallet Update
     */
    public function update_wallet($data = array()) {
        
        $this->db->where('id', $data['id']);
        $update = $this->db->update($this->table, $data);
        if($update){
            return true;
        }else{
            return false;    
        }
    }
}
