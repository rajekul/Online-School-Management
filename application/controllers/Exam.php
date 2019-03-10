<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exam extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ExamModel');
		$this->load->model('ClassModel');
		$this->load->model('SubjectModel');
		$this->load->model('StudentModel');
		$this->load->model('AcademicModel');
		$this->load->model('RoutineModel');
		
	}
	public function index()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['sessions']=$this->AcademicModel->getAllSession();
			$session=$this->session->userdata('currentsessionid');
			$data['terms']=$this->ExamModel->getAllTerm($session);
			$data['exams']=$this->ExamModel->getAllExams($session);
			$data['message']='';
			$this->parser->parse('Exam/View_Exams',$data);
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function manageexam()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$session=$this->session->userdata('currentsessionid');
			$data['terms']=$this->ExamModel->getAllTerm($session);
			if(!$this->input->post('buttonSubmit')){
				$data['message']='';
				$this->parser->parse('Exam/View_ManageExam',$data);
			}
			else{
				if(!$this->form_validation->run('exam')){
					$data['message']=validation_errors();
					$this->parser->parse('Exam/View_ManageExam',$data);
				}
				else{
					
					$exam['examname']=$this->input->post('exam');
					$exam['exammark']=$this->input->post('mark');
					$exam['contribution']=$this->input->post('con');
					$exam['termid']=$this->input->post('termid');
					$exam['session']=$this->session->userdata('currentsessionid');
					$this->ExamModel->addExam($exam);
					$this->session->set_flashdata('message', 'Exam created');
					redirect(base_url()."Exam");
				}
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function createterm(){
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$session=$this->session->userdata('currentsessionid');
			$data['terms']=$this->ExamModel->getAllterm($session);
			if(!$this->form_validation->run('term')){
				$data['message']=validation_errors();
				$this->parser->parse('Exam/View_ManageExam',$data);
			}
			else{
				$term['term']=$this->input->post('term');
				$term['con']=$this->input->post('contribution');
				$term['session']=$session;
				$this->ExamModel->addTerm($term);
				$this->session->set_flashdata('message', 'Term created');
				redirect(base_url()."Exam/manageexam");
			}
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function editterm(){
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			if(!$this->form_validation->run('term')){
				$this->session->set_flashdata('message', validation_errors());
				redirect(base_url()."Exam");
			}
			else{
				$termid=$this->input->post('termid');
				$term['term']=$this->input->post('term');
				$term['con']=$this->input->post('contribution');
				$this->ExamModel->editTerm($term,$termid);
				$this->session->set_flashdata('message', 'Term updated');
				redirect(base_url()."Exam");
			}
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function deleteterm(){
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$termid=$this->input->post('termid');
			$this->ExamModel->deleteTerm($termid);
			$this->session->set_flashdata('message', 'Term Deleted');
			redirect(base_url()."Exam");
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function editexam(){
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			if(!$this->form_validation->run('editexam')){
				$this->session->set_flashdata('message', validation_errors());
				redirect(base_url()."Exam");
			}
			else{
				$examid=$this->input->post('examid');
				$exam['examname']=$this->input->post('exam');
				$exam['exammark']=$this->input->post('mark');
				$exam['contribution']=$this->input->post('contribution');
				$this->ExamModel->editExam($exam,$examid);
				$this->session->set_flashdata('message', 'Exam updated');
				redirect(base_url()."Exam");
			}
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function deleteexam(){
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$examid=$this->input->post('examid');
			$this->ExamModel->deleteExam($examid);
			$this->session->set_flashdata('message', 'exam Deleted');
			redirect(base_url()."Exam");
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function examsbysession($session=''){
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['terms']=$this->ExamModel->getAllTerm($session);
			$data['exams']=$this->ExamModel->getAllTermExam($session);
			$this->parser->parse("Exam/View_SessionExams",$data);
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	
	
	//....................................................................
	
	public function managegrades()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			if(!$this->input->post('buttonSubmit')){
				$data['message']='';
				$this->parser->parse('exam/view_managegrades',$data);
			}
			else{
				if(!$this->form_validation->run('grade')){
					$data['message']=validation_errors();
					$this->parser->parse('Exam/View_ManageGrades',$data);
				}
				else{
					
					$grade['grade']=$this->input->post('grade');
					$grade['gradepoint']=$this->input->post('gradepoint');
					$grade['gradepointto']=$this->input->post('gradepointto');
					$grade['marksfrom']=$this->input->post('mf');
					$grade['marksto']=$this->input->post('mt');
					$grade['comment']=$this->input->post('comment');
					$this->ExamModel->addGrade($grade);
					$this->session->set_flashdata('message', 'Exam Grade Added');
					redirect(base_url()."exam/grades");
				}
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function grades(){
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['message']='';
			$data['grades']=$this->ExamModel->getAllGrades();
			$this->parser->parse('Exam/View_Grades',$data);
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function editgrade()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			
			if(!$this->form_validation->run('grade')){
				$data['message']=validation_errors();
				$data['grades']=$this->ExamModel->getAllgrades();
				$this->parser->parse('Exam/View_Grades',$data);
			}
			else{
				
				$serial=$this->input->post('serial');
				$grade['grade']=$this->input->post('grade');
				$grade['gradepoint']=$this->input->post('gradepoint');
				$grade['gradepointto']=$this->input->post('gradepointto');
				$grade['marksfrom']=$this->input->post('mf');
				$grade['marksto']=$this->input->post('mt');
				$grade['comment']=$this->input->post('comment');
				$this->ExamModel->editGrade($grade,$serial);
				$this->session->set_flashdata('message', 'Exam Grade Updated');
				redirect(base_url()."Exam/grades");
			}
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function deletegrade()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$serial=$this->input->post('serial');
			$this->ExamModel->deleteGrade($serial);
			$this->session->set_flashdata('message', 'Grade Deleted');
			redirect(base_url()."Exam/grades");
			
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	
	
	
	//............................................................................
	
	
	public function managemarks($classid,$secid=''){
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Teacher'){
			$session=$this->session->userdata('currentsessionid');
			$data['terms']=$this->ExamModel->getAllTermExam($session);
			if(!$data['terms']){
				$this->session->set_flashdata('message', 'Create Term And Exam First');
				redirect(base_url()."Exam/manageexam");
			}
			$data['class']=$this->ClassModel->getClass($classid);
			$data['sections']=$this->ClassModel->getSecByClass($classid);
			if($secid==''){
				foreach($data['sections'] as $section){
					$secid=$section['secid'];
					break;
				}
			}
			$data['section']=$this->ClassModel->getSec($secid);
			$data['subjects']=$this->SubjectModel->getClassSubject($classid);
			
			if(!$this->input->post('buttonSubmit')){
				$data['students']=null;
				$data['message']='';
				$this->parser->parse('Exam/View_ManageMark',$data);
			}
			else{
				$classid=$this->input->post('classid');
				$secid=$this->input->post('secid');
				$examid=$this->input->post('examid');
				$subjectcode=$this->input->post('subjectcode');
				$session=$this->session->userdata('currentsessionid');
				$student=$this->StudentModel->getStudentBySec($secid,$session);
				$marks['secid']=$secid;
				$marks['classid']=$secid;
				$marks['sessions']=$secid;
				$marks['subjectcode']=$subjectcode;
				$marks['examid']=$examid;
				foreach($student as $student){
					$sid=$student['sid'];
					$marks['sid']=$sid;
					$marks['mark']=$this->input->post($sid);
					$this->ExamModel->addExamMark($marks);
				}
				$this->session->set_flashdata('message', 'Mark Added Successfully');
				if($usertype=='Teacher'){
					redirect(base_url()."Teacher");
				}
				else{
					redirect(base_url()."Exam/managemarks/".$classid."/".$secid);
				}
				
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function addmarks($classid,$secid='',$subjectcode=''){
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Teacher'){
			$session=$this->session->userdata('currentsessionid');
			$data['terms']=$this->ExamModel->getAllTermExam($session);
			
			$data['class']=$this->ClassModel->getClass($classid);
			
			$data['section']=$this->ClassModel->getSec($secid);
			$data['subject']=$this->SubjectModel->get($subjectcode);
			
			if(!$this->input->post('buttonSubmit')){
				$data['students']=null;
				$data['message']='';
				$this->parser->parse('Exam/View_ManageMark',$data);
			}
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	
	public function studentmarks()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Teacher' ){
			$secid=$this->input->post('secid');
			$classid=$this->input->post('classid');
			$subjectcode=$this->input->post('subjectcode');
			$examid=$this->input->post('examid');
			
			$session=$this->session->userdata('currentsessionid');
			$data['terms']=$this->ExamModel->getAllTermExam($session);
			
			$data['class']=$this->ClassModel->getClass($classid);
			$data['sections']=$this->ClassModel->getSecByClass($classid);
			
			$data['section']=$this->ClassModel->getSec($secid);
			$data['subjects']=$this->SubjectModel->getClassSubject($classid);
			$data['subject']=$this->SubjectModel->get($subjectcode);
			$data['exam']=$this->ExamModel->getExam($examid);
			if($data['students']=$this->ExamModel->getSecMark($secid,$subjectcode,$examid)){
				$data['message']='';
				$this->parser->parse('Exam/View_UpdateMark',$data);
			}
			else{
				$data['students']=$this->StudentModel->getStudentBySec($secid,$session);
				$data['message']='';
				$this->parser->parse('Exam/View_ManageMark',$data);
			}
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	
	
	
	
	public function updatemarks(){
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Teacher'){
			$secid=$this->input->post('secid');
			$classid=$this->input->post('classid');
			$session=$this->session->userdata('currentsessionid');
			$student=$this->StudentModel->getstudentbysec($secid,$session);
			foreach($student as $student){
				$sid=$student['sid'];
				$marks['mark']=$this->input->post($sid);
				$serial=$this->input->post('s'.$sid);
				$this->ExamModel->updateStudentMark($marks,$serial);
			}
			$this->session->set_flashdata('message', 'Mark updated Successfully');
			if($usertype=='Teacher'){
				redirect(base_url()."Teacher");
			}
			else{
				redirect(base_url()."Exam/managemarks/".$classid."/".$secid);
			}
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function viewmarks($classid,$secid=''){
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Teacher' || $usertype=='Register'){
			$data['class']=$this->ClassModel->getClass($classid);
			$data['sections']=$this->ClassModel->getSecByClass($classid);
			if($secid==''){
				foreach($data['sections'] as $section){
					$secid=$section['secid'];
					break;
				}
			}
			$data['section']=$this->ClassModel->getSec($secid);
			$session=$this->session->userdata('currentsessionid');
			$data['exams']=$this->ExamModel->getAlltermexam($session);
			$data['students']=$this->StudentModel->getstudentbysec($secid,$session);
			$data['marks']=$this->ExamModel->getMarks($classid,$session);
			$data['subjects']=$this->SubjectModel->getclasssubject($classid);
			$data['grades']=$this->ExamModel->getAllgrades();
			
			$this->parser->parse('Exam/View_ViewMarks',$data);
			
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	
	public function viewtermmarks($classid,$secid=''){
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Teacher' || $usertype=='Register'){
			$data['class']=$this->ClassModel->getClass($classid);
			$data['sections']=$this->ClassModel->getSecByClass($classid);
			if($secid==''){
				foreach($data['sections'] as $section){
					$secid=$section['secid'];
					break;
				}
			}
			$data['section']=$this->ClassModel->getSec($secid);
			$session=$this->session->userdata('currentsessionid');
			$data['terms']=$this->ExamModel->getAllterm($session);
			$data['exams']=$this->ExamModel->getAlltermexam($session);
			$data['students']=$this->StudentModel->getstudentbysec($secid,$session);
			$data['marks']=$this->ExamModel->getMarks($classid,$session);
			$data['subjects']=$this->SubjectModel->getclasssubject($classid);
			$data['grades']=$this->ExamModel->getAllgrades();
			$this->parser->parse('Exam/View_TermMarks',$data);
			
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function tabulationsheet($classid=''){
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'|| $usertype=='Teacher'){
			$data['sessions']=$this->AcademicModel->getAllsession();
			$session=$this->session->userdata('currentsessionid');
			$data['sections']=$this->ClassModel->getSecByClass($classid);
			$data['students']=$this->StudentModel->getStudentByClass($classid,$session);
			$data['subjects']=$this->SubjectModel->getClassSubject($classid);
			$data['terms']=$this->ExamModel->getAllterm($session);
			$data['marks']=$this->ExamModel->getMarks($classid,$session);
			$data['grades']=$this->ExamModel->getAllgrades();
			$data['exams']=$this->ExamModel->getAllExams($session);
			$data['class']=$this->ClassModel->getclass($classid);
			
			$this->parser->parse('Exam/view_tabulationsheet',$data);
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function gettabulationsheet($classid,$session){
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register' || $usertype=='Teacher'){
			$data['sessions']=$this->AcademicModel->getAllsession();
			$data['sections']=$this->ClassModel->getSecByClass($classid);
			$data['students']=$this->StudentModel->getStudentByClass($classid,$session);
			$data['subjects']=$this->SubjectModel->getClassSubject($classid);
			$data['terms']=$this->ExamModel->getAllterm($session);
			$data['marks']=$this->ExamModel->getMarks($classid,$session);
			$data['grades']=$this->ExamModel->getAllgrades();
			$data['exams']=$this->ExamModel->getAllExams($session);
			$data['class']=$this->ClassModel->getclass($classid);
			
			$this->parser->parse('Exam/view_Sessiontabulationsheet',$data);
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	
	//....................................................................................
	
	
	
	
	//validation..........................................
	
	public function gradepointValidation($grade){
		$pattern = '/^[0-9]{1}.[0-9]{2}$/';
		if(preg_match($pattern,$grade)){
			return true;
		}
		else{
			$this->form_validation->set_message('gradepointValidation', 'Invalid Grade Point');
			return false;
		}
	}
}






	