<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Result_M extends CI_Model
{

	function __construct()
	{
		$this->table = 'results';
		$this->rel_table = 'user_relation_table';
	}

	/*
     * get User Count from the users table
     */
	public function get_count()
	{
		return $this->db->count_all($this->table);
	}

	/*
     * get individual user from the users table
     */
	public function get_user($id)
	{
		$que = $this->db->get_where($this->table, array('id' => $id));
		$user = $que->row();
		return $user;
	}

	/*
     * get All User from the users table
     */
	public function get_all_users($limit, $start)
	{
		$this->db->limit($limit, $start);
		$query = $this->db->get($this->table);
		return $query->result();
	}
	/*
     * get user from the users table
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
	public function create_user($data = array())
	{

		//insert user data to users table
		$insert = $this->db->insert($this->table, $data);
		//return the status
		return $this->db->insert_id();
	}

}
