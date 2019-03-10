<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ExamModel extends CI_Model {
	
	public function addExam($exam)
	{
		$this->db->insert('exams',$exam);
	}
	public function addTerm($term)
	{
		$this->db->insert('term',$term);
	}
	public function editTerm($term,$termid)
	{
		$this->db->where('termid',$termid);
		$this->db->update('term',$term);
	}
	public function deleteTerm($termid)
	{
		$this->db->where('termid',$termid);
		$this->db->delete('term');
		$this->db->where('termid',$termid);
		$this->db->delete('exams');
	}
	public function editExam($exam,$examid)
	{
		$this->db->where('examid',$examid);
		$this->db->update('exams',$exam);
	}
	public function deleteExam($examid)
	{
		$this->db->where('examid',$examid);
		$this->db->delete('exams');
	}
	public function getAllExams($session)
	{
		$this->db->where('session',$session);
		
		$result=$this->db->get('exams');
		return $result->result_array();
	}
	public function getAllExam($termid)
	{
		$this->db->where('termid',$termid);
		$result=$this->db->get('exams');
		return $result->result_array();
	}
	public function getTerm($termid)
	{
		$this->db->where('termid',$termid);
		$result=$this->db->get('term');
		return $result->row_array();
	}
	public function getAllTerm($session)
	{ 
		$this->db->where('session',$session);
		$result=$this->db->get('term');
		return $result->result_array();
	}
	public function getAllTermExam($session)
	{ 
		$this->db->join('exams','term.termid=exams.termid');
		$this->db->where('term.session',$session);
		$result=$this->db->get('term');
		return $result->result_array();
	}
	public function getExam($examid)
	{ 
		$this->db->join('term','exams.termid=term.termid');
		$this->db->where('examid',$examid);
		$result=$this->db->get('exams');
		return $result->row_array();
	}
	public function getClass($classid)
	{
		$this->db->where('classid',$classid);
		$result=$this->db->get('class');
		return $result->row_array();
	}
	public function getAllGrades()
	{
		$result=$this->db->get('grades');
		return $result->result_array();
	}
	public function addGrade($grade)
	{
		$this->db->insert('grades',$grade);
	}
	public function editGrade($grade,$serial)
	{
		$this->db->where('serial',$serial);
		$this->db->update('grades',$grade);
	}
	public function deleteGrade($serial)
	{
		$this->db->where('serial',$serial);
		$this->db->delete('grades');
	}
	public function getTeacherAccess($classid,$secid,$eid,$subjectcode){
		$this->db->where('classid',$classid);
		$this->db->where('secid',$secid);
		$this->db->where('eid',$eid);
		$this->db->where('subjectcode',$subjectcode);
		$result = $this->db->get('classroutine');
		return $result->result_array();
	}
	public function addExamMark($marks)
	{
		$this->db->insert('exammark',$marks);
	}
	public function updateStudentMark($marks,$serial){
		$this->db->where('serial',$serial);
		$this->db->update('exammark',$marks);
	}
	public function getSecMark($secid,$subjectcode,$examid){
		$this->db->join('studentinfo','exammark.sid=studentinfo.sid');
		$this->db->where('examid',$examid);
		$this->db->where('secid',$secid);
		$this->db->where('subjectcode',$subjectcode);
		$result = $this->db->get('exammark');
		return $result->result_array();
	}
	public function getMarks($classid,$session){
		$this->db->where('classid',$classid);
		$this->db->where('sessions',$session);
		$result = $this->db->get('exammark');
		return $result->result_array();
	}
	public function getStudentMark($sid,$subjectcode,$examid){
		$this->db->where('examid',$examid);
		$this->db->where('sid',$sid);
		$this->db->where('subjectcode',$subjectcode);
		$result = $this->db->get('exammark');
		return $result->row_array();
	}
	
	public function addExamRoutine($examroutine)
	{
		$this->db->insert('examroutine',$examroutine);
	}
	
	public function getExamRoutine($examid)
	{ 
		$this->db->join('subject','examroutine.subjectcode=subject.subjectcode');
		$this->db->where('examid',$examid);
		$result=$this->db->get('examroutine');
		return $result->result_array();
	}
	public function getRoutine($serial)
	{ 
		$this->db->join('class','examroutine.classid=class.classid');
		$this->db->join('subject','examroutine.subjectcode=subject.subjectcode');
		$this->db->where('serial',$serial);
		$result=$this->db->get('examroutine');
		return $result->row_array();
	}
	
	public function editExamRoutine($examroutine,$serial)
	{
		$this->db->where('serial',$serial);
		$this->db->update('examroutine',$examroutine);
	}
	public function deleteExamRoutine($serial)
	{
		$this->db->where('serial',$serial);
		$this->db->delete('examroutine');
	}
	public function getStudentMarks($sid,$examid){
		$this->db->join('subject','exammark.subjectcode=subject.subjectcode');
		$this->db->where('examid',$examid);
		$this->db->where('sid',$sid);
		$result = $this->db->get('exammark');
		return $result->result_array();
	}
	
}