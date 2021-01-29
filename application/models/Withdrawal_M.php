<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Withdrawal_M extends CI_Model
{

	function __construct()
	{
		$this->table = 'withdrawals';
	}
	// ================== User Withdrawal View ==========================
	/*
     * Get User withdrawals information Count from the withdrawals table
     */
	public function get_count_withdrawal($userid)
	{	
		$this->db->where('User_id', $userid);
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}

	/*
     * Get Individual User withdrawals information from the withdrawals table
     */
	public function get_user_withdrawal($id)
	{
		$que = $this->db->get_where($this->table, array('id' => $id));
		$user = $que->row();
		return $user;
	}

	/*
     * Get User withdrawals information from the withdrawals table
     */
	public function get_all_withdrawal($limit, $start, $userid)
	{
		$this->db->order_by('id', 'asc');
		$this->db->where('User_id', $userid);
		$this->db->limit($limit, $start);
		$query = $this->db->get($this->table);
		return $query->result();
	}
	/*
     * Get User withdrawals information from the withdrawals table
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
     * Insert User withdrawals information
     */
	public function save($data = array())
	{

		//insert user data to testimonials table
		$insert = $this->db->insert($this->table, $data);
		//return the status
		return $this->db->insert_id();
	}

	// ================== Admin Withdrawal View ==========================
	/*
     * Get All User withdrawals Count from the withdrawals table
     */
	public function get_count()
	{	
		return $this->db->count_all($this->table);
	}

	/*
     * Get Individual User withdrawals information from the withdrawals table
     */
	public function get_user($id)
	{
		$que = $this->db->get_where($this->table, array('id' => $id));
		$user = $que->row();
		return $user;
	}

	/*
     * Get All User withdrawals Information from the withdrawals table
     */
	public function get_all($limit, $start)
	{
		$this->db->order_by('id', 'asc');
		$this->db->limit($limit, $start);
		$query = $this->db->get($this->table);
		return $query->result();
	}

}
