<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('NoticeModel');
		$this->load->model('AccountingModel');
		$this->load->model('AcademicModel');
		$this->load->model('ExamModel');
		
	}
	
	public function index()
	{
		$data['notices']=$this->NoticeModel->getNotices("Homepage");
		$data['monthlyfees']=$this->AccountingModel->getMonthlyFees();
		$data['admissionfees']=$this->AccountingModel->getAllAdmissionFee();
		$data['grades']=$this->ExamModel->getAllGrades();
		$data['info']=$this->AcademicModel->getSchoolInfo();
		$this->parser->parse('Home/View_Index',$data);
	}
	
}