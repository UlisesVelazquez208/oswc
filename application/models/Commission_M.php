<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Commission_M extends CI_Model
{

	function __construct()
	{
		$this->table = 'commissions';
	}

	// ======================== Commissions Table View=========================

	/*
     * get User Commission History Count from the transactions table
     */
	public function get_count_commission($Userid)
	{
		$this->db->where('User_id', $Userid);
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}

	/*
     * get individual User Commission History from the transactions table
     */
	public function get_one_commission($id)
	{
		$que = $this->db->get_where($this->table, array('id' => $id));
		$user = $que->row();
		return $user;
	}

	/*
     * get All User Commission History from the transactions table
     */
	public function get_all_commission($limit, $start, $Userid)
	{
		$this->db->where('User_id', $Userid);
		$this->db->limit($limit, $start);
		$query = $this->db->get($this->table);
		return $query->result();
	}
		
	/*
     * Insert User Commission History from the transactions table
     */
	public function add_commission($data = array())
	{
		//insert user commission to transactions table
		$insert = $this->db->insert($this->table, $data);
		//return the status
		return $this->db->insert_id();
	}
}
