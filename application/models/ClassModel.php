<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ClassModel extends CI_Model {
	
	
	//class model...................................
	public function addClass($class)
	{
		$this->db->insert('class',$class);
	}
	
	public function getAllClass()
	{
		$result=$this->db->get('class');
		return $result->result_array();
	}
	public function getClass($classid)
	{
		$this->db->where('classid',$classid);
		$result=$this->db->get('class');
		return $result->row_array();
	}
	public function gettotalstudent($classid)
	{
		
		$this->db->where('classid',$classid);
		return $this->db->count_all_results('studentclass');
		
	}
	public function gettotalsection($classid)
	{
		$this->db->where('classid',$classid);
		return $this->db->count_all_results('section');
		
	}
	public function editClass($classid,$class)
	{
		$this->db->where('classid', $classid);
		$this->db->update('class', $class); 
	}
	public function deleteClass($classid)
	{
		$this->db->where('classid',$classid);
		$this->db->delete('class');
		
	}
	
	//section model.................................
	
	
	public function addSec($section)
	{
		$this->db->insert('section',$section);
	}
	
	
	public function getSecByClass($classid)
	{
		$this->db->where('classid',$classid);
		$result = $this->db->get('section');
		return $result->result_array();
	}
	
	public function getsecstudent($secid)
	{
		$this->db->where('secid',$secid);
		return $this->db->count_all_results('studentclass');
		
	}
	public function getSec($secid)
	{
		$this->db->where('secid',$secid);
		$result = $this->db->get('section');
		return $result->row_array();
	}
	public function editSec($secid,$section)
	{
		$this->db->where('secid',$secid);
		$this->db->update('section',$section);
		
	}
	public function deleteSec($secid)
	{
		$this->db->where('secid',$secid);
		$this->db->delete('section');
		
	}
	public function secValid($classid,$alphaname)
	{
		$this->db->where('classid',$classid); 
		$this->db->where('alphaname',$alphaname);
		$result = $this->db->get('section');
		return $result->row_array();
	}
	public function getStudentNo($secid)
	{
		
		$this->db->where('secid',$secid);
		return $this->db->count_all_results('studentclass');
		
	}
	//class teacher & syllebus................................................
	
	public function addSyllebus($syllebus)
	{
		$this->db->insert('syllebus',$syllebus);
	}
	public function editSyllebus($syllebus,$serial)
	{
		$this->db->where('serial',$serial);
		$this->db->update('syllebus',$syllebus);
	}
	public function deleteSyllebus($serial)
	{
		$this->db->where('serial',$serial);
		$this->db->delete('syllebus');
	}
	public function getSyllebus($session){
		$this->db->join('class','syllebus.classid=class.classid');
		$this->db->where('session',$session);
		$result = $this->db->get('syllebus');
		return $result->result_array();
	}
	public function addClassTeacher($classteacher)
	{
		$this->db->insert('classteacher',$classteacher);
	}
	public function editClassTeacher($classteacher,$secid)
	{
		$this->db->where('secid',$secid);
		$this->db->update('classteacher',$classteacher);
	}
	public function deleteClassTeacher($secid)
	{
		$this->db->where('secid',$secid);
		$this->db->delete('classteacher');
	}
	
	
	public function getAllClassTeacher(){
		$this->db->join('employee','classteacher.eid=employee.eid');
		$this->db->join('class','classteacher.classid=class.classid');
		$this->db->join('section','classteacher.secid=section.secid');
		$result = $this->db->get('classteacher');
		return $result->result_array();
	}
	public function getClassTeacher($secid){
		$this->db->where('secid',$secid);
		$result = $this->db->get('classteacher');
		return $result->row_array();
	}
	public function getClassTeacherById($eid){
		$this->db->where('eid',$eid);
		$result = $this->db->get('classteacher');
		return $result->row_array();
	}
	
	
	//.....................
	
	public function getStudentSyllebus($classid,$session){
		$this->db->join('class','syllebus.classid=class.classid');
		$this->db->join('sessions','syllebus.session=sessions.sessionid');
		$this->db->where('syllebus.classid',$classid);
		$this->db->where('session',$session);
		$result = $this->db->get('syllebus');
		return $result->row_array();
	}
	
}