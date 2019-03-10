<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EmployeeModel extends CI_Model {
	
	public function insert($data,$username,$password,$type,$status)
	{
		$sql = "create or replace trigger add_emp after insert on employee for each row begin INSERT INTO user VALUES ('$username','$password','$type','$status');end;";
		$this->db->query($sql);
		$this->db->insert('employee', $data);
	}
	public function addDesignation($designation)
	{
		$this->db->insert('designation',$designation);
	}
	public function updateDesignation($designation,$id)
	{
		$this->db->where('designationid', $id);
		$this->db->update('designation', $designation); 
	}
	public function getAll()
	{
		$result = $this->db->get('employee');
		return $result->result_array();
	}
	public function getAllDesignation()
	{
		$result = $this->db->get('designation');
		return $result->result_array();
	}
	public function get($eid)
	{
		$this->db->where('eid',$eid);
		$result = $this->db->get('employee');
		return $result->row_array();
	}
	public function getDesignation($id)
	{
		$this->db->where('designationid',$id);
		$result = $this->db->get('designation');
		return $result->row_array();
	}
	public function getByDesignation($designation)
	{
		$this->db->where('designation',$designation);
		$result = $this->db->get('employee');
		return $result->result_array();
	}
	public function search($nameid)
	{
		$this->db->like('name',$nameid);
		$this->db->or_like('eid',$nameid);
		$result = $this->db->get('employee');
		return $result->result_array();
	}
	public function update($employee,$eid)
	{
		$this->db->where('eid', $eid);
		$this->db->update('employee', $employee); 
	}
	public function getTotalEmployee(){
		return $this->db->count_all('employee');
	}
}