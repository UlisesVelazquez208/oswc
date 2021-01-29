<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Support_M extends CI_Model
{

	function __construct()
	{
		$this->table = 'supports';
		$this->usertable = 'users';
	}

	/*
     * get User Count from the supports table
     */
	public function get_count($username)
	{
		$this->db->where('UserName', $username);
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}

	/*
     * get individual user from the supports table
     */
	public function get_user($id)
	{
		$que = $this->db->get_where($this->table, array('id' => $id));
		$user = $que->row();
		return $user;
	}

	/*
     * get All User from the supports table
     */
	public function get_all($limit, $start, $username)
	{
		// $this->db->order_by('Date', 'asc');
		$this->db->where('UserName', $username);
		$this->db->limit($limit, $start);
		$query = $this->db->get($this->table);
		return $query->result();
	}
	/*
     * get user from the supports table
     */

	function getRows($params = array())
	{

		// $this->db->where('Verified', 1);
		$this->db->where('Username', $params['username']);
		$this->db->where('Password', $params['password']);
		$this->db->from($this->table);
		$query = $this->db->get();
		$result = $query->row();
		if ($result) {
			$id = $result->id;
			$this->visit_count($id);
		}
		return $result;
	}

	

	/*
     * Insert user information
     */
	public function add($data = array())
	{

		//insert user data to supports table
		$insert = $this->db->insert($this->table, $data);
		//return the status
		if($insert){
			return $this->db->insert_id();
		} else{
			return false;
		}
	}

}
