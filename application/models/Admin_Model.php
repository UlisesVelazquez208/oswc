<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Model extends CI_Model {

    function __construct() {
        $this->table = 'admins';
    }
    
    /*
     * get Admin from the admins table
     */

    function getAdmin($params = array()){

        $this->db->where('email', $params['user']);
        $this->db->where('flag', '1');
        $this->db->or_where('username', $params['user']);
        $this->db->from($this->table);
        $que = $this->db->get();
        $result = $que->row();
        return $result;
    }
    
    /*
     * record Count to the counters table
     */
    public function store($data = array()) {
        
        //insert count to counters table
        $insert = $this->db->insert('counters', $data);
        //return the status
        return $this->db->insert_id();
    }
}