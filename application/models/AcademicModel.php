<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AcademicModel extends CI_Model {
	
	public function addSession($session)
	{
		
		$this->db->insert('sessions',$session);
	}
	public function getCurrentSession()
	{
		$this->db->where('status','current');
		$result = $this->db->get('sessions');
		return $result->row_array();
	}
	public function getAllSession()
	{
		$result = $this->db->get('sessions');
		return $result->result_array();
	}
	public function getUpcomingSession()
	{
		$this->db->where('status','upcoming');
		$result = $this->db->get('sessions');
		return $result->result_array();
	}
	public function getSession($sessionid)
	{
		$this->db->where('sessionid',$sessionid);
		$result = $this->db->get('sessions');
		return $result->row_array();
	}
	public function changeSession($sessionid)
	{
		$sq = "UPDATE sessions SET status='finished' WHERE status='current'";
		$this->db->query($sq);
		$sql = "UPDATE sessions SET status='current' WHERE sessionid='$sessionid'";
		$this->db->query($sql);
		
	}
	public function editSession($sessionid,$session)
	{
		$this->db->where('sessionid',$sessionid);
		$this->db->update('sessions',$session);
		
	}
	public function updateMyschool($name,$sname,$since,$title,$contact,$email,$logo,$address)
	{
		$sql = "UPDATE myschool SET schoolname='$name',shortname='$sname',since='$since',title='$title',contact='$contact',email='$email',logo='$logo',address='$address' WHERE serial='1'";
		$this->db->query($sql);
		
	}
	public function getSchoolInfo()
	{
		$this->db->where('serial','1');
		$result = $this->db->get('myschool');
		return $result->row_array();
		
	}
	
	
}