<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction_M extends CI_Model
{

	function __construct()
	{
		$this->table = 'transactions';
	}

	// ================ Admin Dashboard Draw History Information ===============
    
	/*
     * get Draw Lottery History Count from the transactions table
     */
	public function get_count_history()
	{
		$this->db->like('Gateway', 'Purchase', 'after');
		$que = $this->db->get($this->table);
		return $que->num_rows();
	}

	/*
     * get All User Draw Lottery History from the transactions table
     */
	public function get_all_history($limit, $start)
	{
		$this->db->like('Gateway', 'Purchase', 'after');
		$this->db->limit($limit, $start);
		$que = $this->db->get($this->table);
		return $que->result();
	}

	/*
     * Store User Draw Lottery History to the transactions table
     */
	public function store($id, $data = array())
	{

		//insert user data to transactions table
		$this->db->where('id', $id);
		$insert = $this->db->update($this->table, $data);
		//return the status
		return true;
	}

	/*
     * Delete Data from the transactions table
     */
	public function delete($id)
	{

		//insert user data to transactions table
		$this->db->where('id', $id);
		$insert = $this->db->delete($this->table);
		//return the status
		return true;
	}


	// ================ Admin Dashboard Lottery Information ===============

	/*
     * get All User Transaction History Count from the transactions table
     */
	public function get_count()
	{
		return $this->db->count_all($this->table);
	}

	/*
     * get User Individual Transaction History from the transactions table
     */
	public function get_one($id)
	{
		$que = $this->db->get_where($this->table, array('id' => $id));
		$transaction = $que->row();
		return $transaction;
	}

	/*
     * get All User Transaction History from the transactions table
     */
	public function get_all($limit, $start)
	{
		$this->db->order_by('id', 'asc');
		$this->db->limit($limit, $start);
		$query = $this->db->get($this->table);
		return $query->result();
	}

	// ================ User Dashboard Lottery Information ===============

	/*
     * Insert User Draw Lottery Data to the transactions table
     */
	public function add_play_lottery($data = array())
	{

		//insert user data to transactions table
		$insert = $this->db->insert($this->table, $data);
		//return the status
		return $this->db->insert_id();
	}

	/*
     * get User Transaction History Count from the transactions table
     */
	public function get_count_transaction($Userid)
	{
		$this->db->where('User_id', $Userid);
		$que = $this->db->get($this->table);
		return $que->num_rows();
	}

	/*
     * get User Individual Transaction History from the transactions table
     */
	public function get_one_transaction($id)
	{
		$que = $this->db->get_where($this->table, array('id' => $id));
		$transaction = $que->row();
		return $transaction;
	}

	/*
     * get User All Transaction History from the transactions table
     */
	public function get_all_transaction($limit, $start, $Userid)
	{
		$this->db->order_by('id', 'asc');
		$this->db->where('User_id', $Userid);
		$this->db->limit($limit, $start);
		$query = $this->db->get($this->table);
		return $query->result();
	}

	// ==========================User deposits Table View=================================
	/*
     * get User Deposit History Count from the transactions table
     */
	public function get_count_deposit($Userid)
	{
		$this->db->where('User_id', $Userid);
		$this->db->like('Gateway', 'Deposit', 'after');
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}

	/*
     * get User All Deposit History from the transactions table
     */
	public function get_all_deposit($limit, $start, $Userid)
	{
		$this->db->order_by('id', 'asc');
		$this->db->where('User_id', $Userid);
		$this->db->like('Gateway', 'Deposit', 'after');
		$this->db->limit($limit, $start);
		$query = $this->db->get($this->table);
		return $query->result();
	}
	/*
     * get User Individual Deposit History from the transactions table
     */

	function get_one_deposit($id)
	{

		$que = $this->db->get_where($this->table, array('id' => $id));
		$deposit = $que->row();
		return $deposit;
	}

	/*
     * get Individual User Money from the transactions table
     */
	public function wallet($userid)
	{
		$this->db->where('User_id', $userid);
		$this->db->select_sum('Wallet');
		$que = $this->db->get($this->table);
		$res = $que->row();
		if($res){
			return $res->Wallet;
		}
	}

	/*
     * get Individual User Money from the transactions table
     */
	public function amount($userid)
	{
		$this->db->where('User_id', $userid);
		$this->db->where('Status', 'Completed');
		$this->db->select_sum('Amount');
		$que = $this->db->get($this->table);
		$amount = $que->row();
		if($amount){
			return $amount->Amount;
		}
	}

	/*
     * get User Deposits Amount from the transactions table
     */
	public function deposit_amount()
	{
		$this->db->where('Status', 'Completed');
		$this->db->select_sum('Amount');
		$que = $this->db->get($this->table);
		$amount = $que->row();
		if($amount){
			return $amount->Amount;
		}
	}

	// ==========================Admin deposits Table View=================================
	/*
     * get User Deposit History Count from the transactions table
     */
	public function count_deposit()
	{
		$this->db->like('Gateway', 'Deposit', 'after');
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}

	/*
     * get User All Deposit History from the transactions table
     */
	public function all_deposit($limit, $start)
	{
		$this->db->order_by('id', 'asc');
		$this->db->like('Gateway', 'Deposit', 'after');
		$this->db->limit($limit, $start);
		$query = $this->db->get($this->table);
		return $query->result();
	}
	/*
     * get User Individual Deposit History from the transactions table
     */

	function one_deposit($id)
	{

		$que = $this->db->get_where($this->table, array('id' => $id));
		$deposit = $que->row();
		return $deposit;
	}

	// ========================User Commission Table=========================
	/*
     * Insert User Commission History Information
     */
	public function add_commission($data = array())
	{
		//insert User data to transactions table
		$insert = $this->db->insert($this->table, $data);
		//return the status
		return $this->db->insert_id();
	}

	// ========================User Purchases Table View=========================

	/*
     * get User Purchase History Count from the transactions table
     */
	public function get_count_purchase($Userid)
	{
		$this->db->where('User_id', $Userid);
		$this->db->like('Gateway', 'Purchase', 'after');
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}

	/*
     * get User Individual Purchase History from the transactions table
     */
	public function get_one_purchase($id)
	{
		$que = $this->db->get_where($this->table, array('id' => $id));
		$user = $que->row();
		return $user;
	}

	/*
     * get User All Purchase History from the transactions table
     */
	public function get_all_purchase($limit, $start, $Userid)
	{
		$this->db->order_by('id', 'desc');
		$this->db->where('User_id', $Userid);
		$this->db->like('Gateway', 'Purchase', 'after');
		$this->db->limit($limit, $start);
		$query = $this->db->get($this->table);
		return $query->result();
	}
		
	/*
     * Insert User Purchase History from the transactions table
     */
	public function add_purchase($data = array())
	{
		//insert user purchase history to transactions table
		$insert = $this->db->insert($this->table, $data);
		//return the status
		return $this->db->insert_id();
	}

	// ======================== Winnings Table View=========================

	/*
     * get User Winning History Count from the transactions table
     */
	public function get_count_winning($Userid)
	{
		$this->db->where('User_id', $Userid);
		$this->db->where('WinStatus', 'Win');
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}

	/*
     * get User Individual Winning History from the transactions table
     */
	public function get_one_winning($id)
	{
		$que = $this->db->get_where($this->table, array('id' => $id));
		$user = $que->row();
		return $user;
	}

	/*
     * get User All Winning History from the transactions table
     */
	public function get_all_winning($limit, $start, $Userid)
	{
		$this->db->order_by('id', 'asc');
		$this->db->where('User_id', $Userid);
		$this->db->where('WinStatus', 'Win');
		$this->db->limit($limit, $start);
		$query = $this->db->get($this->table);
		return $query->result();
	}
		
	/*
     * Insert User Winning History from the transactions table
     */
	public function add_winning($data = array())
	{
		//insert user wInning History to transactions table
		$insert = $this->db->insert($this->table, $data);
		//return the status
		return $this->db->insert_id();
	}

	// ================ Admin Dashboard Winners Information ===============
    
	/*
     * get Winners Count from the transactions table
     */
	public function get_count_winners()
	{
		$this->db->where('WinStatus', 'Win');
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}

	/*
     * get All Winners from the transactions table
     */
	public function get_all_winners($limit, $start)
	{
		$this->db->where('WinStatus', 'Win');
		$this->db->limit($limit, $start);
		$que = $this->db->get($this->table);
		return $que->result();
	}

	// ================ Admin Dashboard Lottery Information ===============
    
	/*
     * get User Draw Lottery Count for School from the transactions table
     */
	public function get_count_school()
	{
		$this->db->where('GameType', 'Play For School Fees');
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}

	/*
     * get User Draw Lottery for School from the transactions table
     */
	public function get_all_school($limit, $start)
	{
		$this->db->order_by("id", "asc");
		$this->db->where('GameType', 'Play For School Fees');
		$this->db->limit($limit, $start);
		$query = $this->db->get($this->table);
		return $query->result();
	}

	/*
     * get User Draw Lottery Count for House from the transactions table
     */
	public function get_count_house()
	{
		$this->db->where('GameType', 'Play For House Rent');
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}

	/*
     * get User Draw Lottery for House from the transactions table
     */
	public function get_all_house($limit, $start)
	{
		$this->db->order_by("id", "asc");
		$this->db->where('GameType', 'Play For House Rent');
		$this->db->limit($limit, $start);
		$query = $this->db->get($this->table);
		return $query->result();
	}

	/*
     * get User Draw Lottery Count for Business from the transactions table
     */
	public function get_count_business()
	{
		$this->db->where('GameType', 'Play For Business Funding');
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}

	/*
     * get User Draw Lottery for Business from the transactions table
     */
	public function get_all_business($limit, $start)
	{
		$this->db->order_by("id", "asc");
		$this->db->where('GameType', 'Play For Business Funding');
		$this->db->limit($limit, $start);
		$query = $this->db->get($this->table);
		return $query->result();
	}

	/*
     * Make Winner or Loser from the transactions table
     */
	public function update_transaction($data = array())
	{
		$this->db->where('id', $data['id']);
        $answer = $this->db->update($this->table, $data);
        return $answer;
	}

	
}
