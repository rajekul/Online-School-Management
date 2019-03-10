<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AttendanceModel extends CI_Model {
	
	
	public function add($attendance)
	{
		$this->db->insert('attendance',$attendance);
	}
	public function update($attendance,$serial)
	{
		$this->db->where('serial',$serial);
		$this->db->update('attendance',$attendance);
	}
	public function getDailyAttendance($date,$secid){
		$this->db->join('studentinfo','attendance.sid=studentinfo.sid');
		$this->db->where('date',$date);
		$this->db->where('secid',$secid);
		$result = $this->db->get('attendance');
		return $result->result_array();
	}
	public function getAttendanceReport($sdate,$edate,$secid){
		$this->db->where('date >=',$sdate);
		$this->db->where('date <=',$edate);
		$this->db->where('secid',$secid);
		$result = $this->db->get('attendance');
		return $result->result_array();
	}
	
	public function getPresent($date,$secid)
	{
		$this->db->where('date',$date);
		$this->db->where('secid',$secid);
		$this->db->where('attendance', 'P');
		return $this->db->count_all_results('attendance');
		
	}
	
	public function getdailypresent($date){
		$this->db->where('date', $date);
		$this->db->where('attendance', 'P');
		$this->db->from('attendance');
		return $this->db->count_all_results();
	}
	
}