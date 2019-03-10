<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('StudentModel');
		$this->load->model('AttendanceModel');
		$this->load->model('AccountingModel');
		$this->load->model('ClassModel');
		$this->load->model('AcademicModel');
		$this->load->model('EmployeeModel');
		$this->load->model('RoutineModel');
	}
	public function index()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Teacher'){
			$eid=$this->session->userdata('username');
			$employee=$this->EmployeeModel->get($eid);
			$this->session->set_userdata('name',$employee['name']);
			$timestamp = strtotime(date('Y-m-d'));
			$day = date('l', $timestamp);
			//$day = 'Sunday';
			$data['classteacher']=$this->ClassModel->getClassTeacherById($eid);
			$data['dailyroutine']=$this->RoutineModel->getDailyTeacherRoutine($eid,$day);
			$data['periods']=$this->RoutineModel->getAllPeriod();
			$data['classroutines']=$this->RoutineModel->getRoutineByTeacher($eid);
			$this->parser->parse('Teacher/View_Dashboard',$data);
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	
	
	
	
	

	
}