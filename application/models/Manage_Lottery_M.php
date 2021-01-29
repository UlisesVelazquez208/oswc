<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_Lottery_M extends CI_Model
{

	function __construct()
	{
		$this->table = 'manage_lottery';
	}

	/*
     * get Data Count from the manage_lottery table
     */
	public function get_count()
	{
		return $this->db->count_all($this->table);
	}

	/*
     * get individual Data from the manage_lottery table
     */
	public function get_user($id)
	{
		$que = $this->db->get_where($this->table, array('id' => $id));
		$user = $que->row();
		return $user;
	}

	/*
     * get All Data from the manage_lottery table
     */
	public function get_all($limit, $start)
	{
		$this->db->order_by("id", "asc");
		$this->db->limit($limit, $start);
		$query = $this->db->get($this->table);
		return $query->result();
	}
	/*
     * get Data from the manage_lottery table
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
     * Insert Data from the manage_lottery table
     */
	public function add($data = array())
	{

		//insert user data to manage_lottery table
		$insert = $this->db->insert($this->table, $data);
		//return the status
		return $this->db->insert_id();
	}

	/*
     * Update Data from the manage_lottery table
     */
	public function update($id, $data = array())
	{

		//insert user data to manage_lottery table
		$this->db->where('id', $id);
		$insert = $this->db->update($this->table, $data);
		//return the status
		return true;
	}

	/*
     * Delete Data from the manage_lottery table
     */
	public function delete($id)
	{

		//insert user data to manage_lottery table
		$this->db->where('id', $id);
		$insert = $this->db->delete($this->table);
		//return the status
		return true;
	}
}
