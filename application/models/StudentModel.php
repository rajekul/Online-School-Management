<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StudentModel extends CI_Model {
	
	public function addStudent($student,$username,$password)
	{
		$sql = "create or replace trigger add_stu after insert on studentinfo for each row begin INSERT INTO user VALUES ('$username','$password','Student','Active');end;";
		$this->db->query($sql);
		$this->db->insert('studentinfo', $student);
	}
	public function updateStudent($student,$sid)
	{
		$this->db->where('sid', $sid);
		$this->db->update('studentinfo', $student); 
	}
	public function addStudentClass($studentclass)
	{
		$this->db->insert('studentclass', $studentclass);
	}
	public function updateAddStudentClass($studentclass,$sid)
	{
		$this->db->where('studentclass.sid', $sid);
		$this->db->update('studentclass', $studentclass); 
	}
	
	
	
	
	public function getStudentBySec($secid,$session){
		$this->db->join('studentinfo','studentclass.sid=studentinfo.sid');
		$this->db->where('studentclass.secid',$secid);
		$this->db->where('session',$session);
		$result = $this->db->get('studentclass');
		return $result->result_array();
	}
	
	public function getStudentByClass($classid,$session){
		$this->db->join('studentinfo','studentclass.sid=studentinfo.sid');
		$this->db->where('studentclass.classid',$classid);
		$this->db->where('session',$session);
		$result = $this->db->get('studentclass');
		return $result->result_array();
	}
	public function getTotalStudent($session){
		$this->db->where('session',$session);
		return $this->db->count_all_results('studentclass');
	}
	public function TotalStudent(){
		
		return $this->db->count_all('studentinfo');
	}
	
	public function getStudentInfo($sid)
	{
		$this->db->join('studentinfo','studentclass.sid=studentinfo.sid');
		$this->db->join('class','studentclass.classid=class.classid');
		$this->db->join('section','studentclass.secid=section.secid');
		$this->db->where('studentclass.sid',$sid);
		$result=$this->db->get('studentclass');
		return $result->row_array();
	}
	public function getStudent($sid,$session)
	{
		$this->db->join('studentinfo','studentclass.sid=studentinfo.sid');
		$this->db->join('class','studentclass.classid=class.classid');
		$this->db->join('section','studentclass.secid=section.secid');
		$this->db->where('studentclass.sid',$sid);
		$this->db->where('session',$session);
		$result=$this->db->get('studentclass');
		return $result->row_array();
	}
	
	public function getParentId($sid)
	{
		$this->db->where('sid',$sid);
		$result=$this->db->get('studentparent');
		return $result->row_array();
	}
	
	public function search($nameid,$classid,$session)
	{
		$this->db->join('studentclass','studentinfo.sid=studentclass.sid');
		$this->db->where('studentclass.session',$session);
		$this->db->where('studentclass.classid',$classid);
		$this->db->like('studentclass.sid',$nameid);
		$this->db->or_like('studentinfo.studentname',$nameid);
		$result=$this->db->get('studentinfo');
		return $result->result_array();
	}
	
	
	
}