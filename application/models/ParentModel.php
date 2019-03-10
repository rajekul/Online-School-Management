<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ParentModel extends CI_Model {
	
	
	
	public function addStudentParent($studentparent,$username,$password)
	{
		$sql = "create or replace trigger add_stuparent after insert on studentparent for each row begin INSERT INTO user VALUES ('$username','$password','parent','active');end;";
		$this->db->query($sql);
		$this->db->insert('studentparent', $studentparent);
	}
	public function addStudenteParent($studentparent)
	{
		$sql = "drop trigger IF EXISTS add_stuparent";
		$this->db->query($sql);
		$this->db->insert('studentparent', $studentparent);
	}
	public function addParent($parent)
	{
		$this->db->insert('parents', $parent);
	}
	public function updateParent($parent,$pid,$relation)
	{
		$this->db->where('pid', $pid);
		$this->db->where('relation', $relation);
		$this->db->update('parents', $parent);
	}
	
	public function getTotalParent(){
		return $this->db->count_all('studentparent');
	}
	public function getAllParents()
	{
		$this->db->join('studentaddress','parents.pid=studentaddress.pid');
		$result = $this->db->get('parents');
		return $result->result_array();
	}
	public function getParentByType($type)
	{
		$this->db->join('studentaddress','parents.pid=studentaddress.pid');
		$this->db->where('parents.relation',$type);
		$result = $this->db->get('parents');
		return $result->result_array();
	}
	public function getParentById($pid,$relation)
	{
		$this->db->where('pid',$pid);
		$this->db->where('relation',$relation);
		$result = $this->db->get('parents');
		return $result->row_array();
	}
	public function getParentByStudent($sid)
	{
		$this->db->join('studentaddress','parents.pid=studentaddress.pid');
		$this->db->join('studentparent','parents.pid=studentparent.pid');
		$this->db->like('studentparent.sid',$sid);
		$result = $this->db->get('parents');
		return $result->result_array();
	}
	
	
	public function search($value)
	{
		$this->db->join('studentaddress','parents.pid=studentaddress.pid');
		$this->db->like('parentname',$value);
		$this->db->or_like('parents.pid',$value);
		$this->db->or_like('parentphone',$value);
		$result = $this->db->get('parents');
		return $result->result_array();
	}
	
	public function addStudentAddress($address)
	{
		$this->db->insert('studentaddress', $address);
	}
	public function updateStudentAddress($address,$pid)
	{
		$this->db->where('pid', $pid);
		$this->db->update('studentaddress', $address);
	}
	
	public function getAddress($pid)
	{
		$this->db->where('pid', $pid);
		$result=$this->db->get('studentaddress');
		return $result->row_array();
	}
	
	public function getStudentByParent($pid)
	{
		$this->db->join('studentinfo','studentparent.sid=studentinfo.sid');
		$this->db->join('studentclass','studentparent.sid=studentclass.sid');
		$this->db->join('class','studentclass.classid=class.classid');
		$this->db->join('section','studentclass.secid=section.secid');
		$this->db->where('studentparent.pid',$pid);
		$result=$this->db->get('studentparent');
		return $result->result_array();
	}
	
}