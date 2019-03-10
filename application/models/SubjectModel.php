<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SubjectModel extends CI_Model {
	
	public function addSubject($subject)
	{
		$this->db->insert('subject',$subject);
	}
	
	public function getAllSubject()
	{
		$result = $this->db->get('subject');
		return $result->result_array();
	}

	public function get($subjectcode)
	{
		$this->db->where('subjectcode',$subjectcode);
		$result = $this->db->get('subject');
		return $result->row_array();
	}
	
	public function update($subjectcode,$subject)
	{
		$this->db->where('subjectcode',$subjectcode);
		$this->db->update('subject',$subject);
	}
	
	public function del($subjectcode)
	{
		$this->db->where('subjectcode',$subjectcode);
		$this->db->delete('classsubject');
		$this->db->where('subjectcode',$subjectcode);
		$this->db->delete('subject');
		$this->db->where('subjectcode',$subjectcode);
		$this->db->delete('classroutine');
	}
	public function asignSubject($asign)
	{
		$this->db->insert('classsubject',$asign);
	}
	public function getClassSubject($classid)
	{
		$this->db->join('subject','classsubject.subjectcode=subject.subjectcode');
		$this->db->where('classid',$classid);
		$result = $this->db->get('classsubject');
		return $result->result_array();
	}
	public function getSubjectByClass($classid,$subjectcode)
	{
		$this->db->where('classid',$classid);
		$this->db->where('subjectcode',$subjectcode);
		$result = $this->db->get('classsubject');
		return $result->row_array();
	}
	
}