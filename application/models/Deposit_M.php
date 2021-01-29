<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Deposit_M extends CI_Model
{

	function __construct()
	{
		$this->table = 'deposits';
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

	function get_one_user($params = array())
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
     * get individual user money from the deposits table
     */
	public function wallet($id)
	{
		$que = $this->db->get_where($this->table, array('id' => $id));
		$user = $que->row();
		return $user->Amount;
	}
	
	/*
     * Insert user budget information
     */
	public function add_fund($data = array())
	{

		//insert user data to deposits table
		$insert = $this->db->insert($this->table, $data);
		//return the status
		return $this->db->insert_id();
	}
}
