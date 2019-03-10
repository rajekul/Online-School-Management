<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RoutineModel extends CI_Model {
	
	
	
	
	public function getClassPeriod()
	{
		$this->db->select('starttime,ampm,classduration,assembly,tiffin,beforetiffin,aftertiffin,sum(beforetiffin+aftertiffin) as totalperiod'); 
		$this->db->where('serial','1');
		$result = $this->db->get('classperiod');
		return $result->row_array();
	}
	public function updateClassPeriod($period)
	{
		$this->db->where('serial','1');
		$this->db->update('classperiod',$period);
		
	}
	public function addPeriod($classperiod)
	{
		$this->db->insert('period',$classperiod);
	}
	public function addClassPeriod($classperiod)
	{
		$this->db->insert('classperiod',$classperiod);
	}
	public function deletePeriod()
	{
		$sql = "TRUNCATE period";
		$this->db->query($sql);
		
	}
	public function getPeriod($period)
	{
		$this->db->where('period',$period);
		$result = $this->db->get('period');
		return $result->row_array();
	}
	public function getAllPeriod()
	{
		$this->db->order_by('cast(period as int)','ASC');
		$result = $this->db->get('period');
		return $result->result_array();
	}
	public function addClassRoutine($routine)
	{
		$this->db->insert('classroutine',$routine);
	}
	public function deleteClassRoutine($serial)
	{
		$this->db->where('serial',$serial);
		$this->db->delete('classroutine');
		
	}
	public function getSubjectClash($day,$subjectcode,$classid,$secid){
		$this->db->where('day',$day);
		$this->db->where('subjectcode',$subjectcode);
		$this->db->where('classid',$classid);
		$this->db->where('secid',$secid);
		$result = $this->db->get('classroutine');
		return $result->row_array();
	}
	public function getPeriodClash($day,$period,$classid,$secid){
		$this->db->where('day',$day);
		$this->db->where('period',$period);
		$this->db->where('classid',$classid);
		$this->db->where('secid',$secid);
		$result = $this->db->get('classroutine');
		return $result->row_array();
	}
	public function getTeacherClash($day,$period,$eid){
		$this->db->where('day',$day);
		$this->db->where('period',$period);
		$this->db->where('eid',$eid);
		$result = $this->db->get('classroutine');
		return $result->row_array();
	}
	public function getRoutine($classid,$secid,$day,$period){
		$this->db->join('subject','classroutine.subjectcode=subject.subjectcode');
		$this->db->join('employee','classroutine.eid=employee.eid');
		$this->db->where('day',$day);
		$this->db->where('period',$period);
		$this->db->where('classid',$classid);
		$this->db->where('secid',$secid);
		$result = $this->db->get('classroutine');
		return $result->row_array();
	}
	
	
	public function getRoutineBySerial($serial){
		$this->db->join('subject','classroutine.subjectcode=subject.subjectcode');
		$this->db->join('class','classroutine.classid=class.classid');
		$this->db->join('section','classroutine.secid=section.secid');
		$this->db->join('period','classroutine.period=period.period');
		$this->db->where('serial',$serial);
		$result = $this->db->get('classroutine');
		return $result->row_array();
	}
	
	public function getDailyRoutine($classid,$secid,$day){
		$this->db->join('subject','classroutine.subjectcode=subject.subjectcode');
		$this->db->join('employee','classroutine.eid=employee.eid');
		$this->db->join('period','classroutine.period=period.period');
		$this->db->order_by('cast(classroutine.period as int)','ASC');
		$this->db->where('day',$day);
		$this->db->where('classid',$classid);
		$this->db->where('secid',$secid);
		$result = $this->db->get('classroutine');
		return $result->result_array();
	}
	public function getDailyTeacherRoutine($eid,$day){
		$this->db->join('subject','classroutine.subjectcode=subject.subjectcode');
		$this->db->join('class','classroutine.classid=class.classid');
		$this->db->join('section','classroutine.secid=section.secid');
		$this->db->join('period','classroutine.period=period.period');
		$this->db->order_by('cast(classroutine.period as int)','ASC');
		$this->db->where('day',$day);
		$this->db->where('eid',$eid);
		$result = $this->db->get('classroutine');
		return $result->result_array();
	}
	
	public function getRoutineByTeacher($eid){
		$this->db->join('subject','classroutine.subjectcode=subject.subjectcode');
		$this->db->join('class','classroutine.classid=class.classid');
		$this->db->join('section','classroutine.secid=section.secid');
		$this->db->where('eid',$eid);
		$result = $this->db->get('classroutine');
		return $result->result_array();
	}
	
	
	
}