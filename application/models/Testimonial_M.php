<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testimonial_M extends CI_Model
{

	function __construct()
	{
		$this->table = 'testimonials';
	}

	/*
     * Get User testimonials information Count from the testimonials table
     */
	public function check($name)
	{	
		$this->db->where('Name', $name);
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}

	/*
     * Get All testimonials information from the testimonials table
     */
	public function get_all_testi()
	{
		$que = $this->db->query("SELECT t1.Name, t1.Title, t1.TicketNumber, t1.Message, t1.Date, users.Picture FROM $this->table AS t1 LEFT JOIN `users` ON t1.Name = users.Name");
		return $que->result();
	}

	/*
     * Get User testimonials information Count from the testimonials table
     */
	public function get_count($username)
	{	
		$this->db->where('UserName', $username);
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}

	/*
     * Get Individual User testimonials information from the testimonials table
     */
	public function get_user($id)
	{
		$que = $this->db->get_where($this->table, array('id' => $id));
		$user = $que->row();
		return $user;
	}

	/*
     * Get Individual User All testimonials information from the testimonials table
     */
	public function get_all($limit, $start, $username)
	{
		$this->db->order_by('Date', 'asc');
		$this->db->where('UserName', $username);
		$this->db->limit($limit, $start);
		$query = $this->db->get($this->table);
		return $query->result();
	}
	/*
     * Get User testimonials information from the testimonials table
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
     * Insert User testimonials information
     */
	public function save($data = array())
	{

		//insert user data to testimonials table
		$insert = $this->db->insert($this->table, $data);
		//return the status
		return $this->db->insert_id();
	}

}
