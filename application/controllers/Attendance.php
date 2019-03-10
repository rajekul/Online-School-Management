<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Attendance extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Dhaka');
		$this->load->model('AttendanceModel');
		$this->load->model('ClassModel');
		$this->load->model('StudentModel');
		
	}

	public function index()
	{
		
		redirect(base_url().'User/error');
		
	}
	
	
	
	public function dailyattendance($classid,$secid=''){
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register' || $usertype=='Teacher'){
			if(!$this->input->post('buttonSubmit')){
				$date=date('Y-m-d');
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
				if($data['students']=$this->AttendanceModel->getDailyAttendance($date,$secid)){
					$data['message']='';
					$this->parser->parse('Attendance/View_DailyAttendanceUpdate',$data);
				}
				else{
					$data['students']=$this->StudentModel->getStudentBysec($secid,$session);
					$data['message']='';
					$this->parser->parse('Attendance/View_DailyAttendance',$data);
				}
				
			}
			else{
				$attendance['classid']=$this->input->post('classid');
				$attendance['secid']=$this->input->post('secid');
				$session=$this->session->userdata('currentsessionid');
				$student=$this->StudentModel->getStudentBySec($attendance['secid'],$session);
				$attendance['date']=date('Y-m-d');
				foreach($student as $student){
					$attendance['sid']=$student['sid'];
					$attendance['attendance']=$this->input->post($student['sid']);
					$attendance['session']=$session;
					$this->AttendanceModel->add($attendance);
				}
				
				$this->session->set_flashdata('message', 'Attendance Given Successfully');
				redirect(base_url()."Attendance/dailyreport/".$classid."/".$secid);
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function updateattendance(){
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register' || $usertype=='Teacher'){
			$classid=$this->input->post('classid');
			$secid=$this->input->post('secid');
			$session=$this->session->userdata('currentsessionid');
			$student=$this->StudentModel->getStudentBySec($secid,$session);
			foreach($student as $student){
				$serial=$this->input->post("s".$student['sid']);
				$attendance['attendance']=$this->input->post($student['sid']);
				$this->AttendanceModel->update($attendance,$serial);
			}
			
			$this->session->set_flashdata('message', 'Attendance Given Successfully');
			redirect(base_url()."Attendance/dailyreport/".$classid."/".$secid);
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function dailyreport($classid,$secid='',$date=''){
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register' || $usertype=='Teacher' ){
			if($date==''){
				$date=date("Y-m-d");
			}
			$data['date']=$date;
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
			$data['totalStudent']=$this->ClassModel->getStudentNo($secid);
			$data['present']=$this->AttendanceModel->getPresent($date,$secid);
			$data['students']=$this->AttendanceModel->getDailyAttendance($date,$secid);
			$this->parser->parse('Attendance/View_DailyAttendanceReport',$data);
				
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function attendancereport($classid,$secid=''){
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register' || $usertype=='Teacher'){
			$data['class']=$this->ClassModel->getClass($classid);
			$data['sections']=$this->ClassModel->getSecByClass($classid);
			if($secid==''){
				foreach($data['sections'] as $section){
					$secid=$section['secid'];
					break;
				}
			}
			$year=date("Y");
			$month=date("m");
			$number = cal_days_in_month(CAL_GREGORIAN, $month, $year);
			$sdate=$year."-".$month."-01";
			$edate=$year."-".$month."-".$number;
			$data['days']=$number;
			$data['section']=$this->ClassModel->getSec($secid);
			$session=$this->session->userdata('currentsessionid');
			$data['students']=$this->StudentModel->getStudentBySec($secid,$session);
			$data['reports']=$this->AttendanceModel->getAttendanceReport($sdate,$edate,$secid);
			$this->parser->parse('Attendance/View_AttendanceReport',$data);
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
}