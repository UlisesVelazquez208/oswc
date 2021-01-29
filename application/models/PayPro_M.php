<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PayPro_M extends CI_Model
{

	function __construct()
	{
		$this->table = 'pay_profiles';
	}

	// ========================== pay_profiles Table View=================================
	/*
     * get User Payment Profile History Count from the pay_profiles table
     */
	public function get_count_payment($Userid)
	{
		$this->db->where('UserID', $Userid);
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}

	/*
     * get All User Payment Profile History from the pay_profiles table
     */
	public function get_all_payment($limit, $start, $Userid)
	{
		$this->db->order_by('Created', 'asc');
		$this->db->where('UserID', $Userid);
		$this->db->limit($limit, $start);
		$query = $this->db->get($this->table);
		return $query->result();
	}

	/*
     * Insert User Payment Profile Information
     */
	public function save($data = array())
	{
		//insert User Payment Profile to pay_profiles table
		$insert = $this->db->insert($this->table, $data);
		//return the status
		return $this->db->insert_id();
	}
}
