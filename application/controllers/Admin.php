<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('StudentModel');
		$this->load->model('AttendanceModel');
		$this->load->model('AccountingModel');
		$this->load->model('AcademicModel');
		$this->load->model('EmployeeModel');
		
	}
	public function index()
	{
		$usertype=$this->session->userdata('usertype');
		$currentsession=$this->session->userdata('currentsession');
		$session=$this->session->userdata('currentsessionid');
		if($usertype=='Admin'){
			if($currentsession){
				$date=date('Y-m-d');
				$data['message']='';
				$data['totalstudent']=$this->StudentModel->getTotalStudent($session);
				$data['totalemployee']=$this->EmployeeModel->getTotalEmployee();
				$data['present']=$this->AttendanceModel->getDailyPresent($date);
				$expense=$this->AccountingModel->getTotalExpense();
				$paid=$this->AccountingModel->getTotalPayment();
				$balance=$paid['amount']-$expense['amount'];
				$data['balance']=$balance;//$this->AccountingModel->getBalance();
				$data['percent']=0;
				if($data['totalstudent']>0){
					$data['percent']=intval(($data['present']/$data['totalstudent'])*100);
				}
				$sessions=$this->AcademicModel->getAllSession();
				$arr=array();
				foreach($sessions as $session){
					$arr[]=array("y" =>$this->StudentModel->getTotalStudent($session['sessionid']) , "label" => $session['sessions']);	
				}
				$data['dataPoints'] = $arr;
				
				$this->load->view('Admin/View_Dashboard',$data);
			}
			else{
				$this->session->set_flashdata('message', 'Please Add New Session and Change it to Current Session');
				redirect(base_url().'Academic/session');
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	
	
}