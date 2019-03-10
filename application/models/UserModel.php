<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model {
	
	
	public function get($username)
	{
		$this->db->where('username',$username);
		$result = $this->db->get('user');
		return $result->row_array();
	}
	public function getAll()
	{
		$result = $this->db->get('user');
		return $result->result_array();
	}
	
	public function add($user)
	{
		$this->db->insert('user',$user);
		
	}
	
	public function changePassword($password,$username)
	{
		$this->db->where('username',$username);
		$this->db->update('user',$password);
	}
}