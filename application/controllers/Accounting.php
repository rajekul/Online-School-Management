<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accounting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Dhaka');
		$this->load->model('AcademicModel');
		$this->load->model('AccountingModel');
		$this->load->model('ClassModel');
		$this->load->model('StudentModel');
		
	}

	public function index()
	{
		redirect(base_url().'User/error');
	}
	///settting fees..............................................................
	
	public function fees()
	{
		
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Accountant'){
			$month=date('Y-m');
			$data['fees']=$this->AccountingModel->getAllFees($month);
			$data['classes']=$this->ClassModel->getAllClass();
			if(!$this->input->post('buttonSubmit')){
				$data['message']='';
				$this->parser->parse('Accounting/View_Fees',$data);
			}
			else{
				if(!$this->form_validation->run('setmassfee')){
					$data['message']=validation_errors();
					$this->parser->parse('accounting/view_fees',$data);
				}
				else{
					$fee['date']=date('Y-m-d');
					$fee['title']=$this->input->post('title');
					$fee['type']=$this->input->post('type');
					$fee['amount']=$this->input->post('amount');
					$fee['classid']=$this->input->post('classid');
					$studentfee['sessionid']=$this->session->userdata('currentsessionid');
					if($fee['classid']=='all'){
						$classes=$this->ClassModel->getAllclass();
						foreach($classes as $classes){
							$fee['classid']=$classes['classid'];
							$studentfee['feeid']=$this->AccountingModel->addfee($fee);
							$students=$this->StudentModel->getstudentbyclass($fee['classid'],$studentfee['sessionid']);
							foreach($students as $student){
								$studentfee['sid']=$student['sid'];
								$this->AccountingModel->addStudentFee($studentfee);
							}
						}
					}
					else{
						$studentfee['feeid']=$this->AccountingModel->addFee($fee);
						$students=$this->StudentModel->getstudentbyclass($fee['classid'],$studentfee['sessionid']);
						foreach($students as $student){
							$studentfee['sid']=$student['sid'];
							$this->AccountingModel->addstudentfee($studentfee);
						}
					}
					$this->session->set_flashdata('message', 'Student Fee Successfully Added.');
					redirect(base_url()."Accounting/fees");
				}
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function addsinglefee()
	{
		
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Accountant'){
			$month=date('Y-m');
			$data['fees']=$this->AccountingModel->getAllFees($month);
			$data['classes']=$this->ClassModel->getAllClass();
			
			if(!$this->form_validation->run('setsinglefee')){
				$data['message']=validation_errors();
				$this->parser->parse('Accounting/View_Fees',$data);
			}
			else{
				$fee['date']=date('Y-m-d');
				$fee['sid']=$this->input->post('sid');
				$fee['title']=$this->input->post('stitle');
				$fee['fee']=$this->input->post('samount');
				$fee['sessionid']=$this->session->userdata('currentsessionid');
				$this->AccountingModel->addSingleFee($fee);
				$this->session->set_flashdata('message', 'Successfully Added.');
				redirect(base_url()."Accounting/fees");
			}
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	
	public function editfee()
	{
		
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Accountant'){
			$month=date('Y-m');
			$data['fees']=$this->AccountingModel->getAllFees($month);
			$data['classes']=$this->ClassModel->getAllClass();
			
			if(!$this->form_validation->run('editfee')){
				$data['message']=validation_errors();
				$this->parser->parse('Accounting/View_Fees',$data);
			}
			else{
				$feeid=$this->input->post('feeid');
				$fee['title']=$this->input->post('etitle');
				$fee['amount']=$this->input->post('eamount');
				$this->AccountingModel->editFee($fee,$feeid);
				$this->session->set_flashdata('message', 'Successfully Updated.');
				redirect(base_url()."accounting/fees");
			}
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function deletefee()
	{
		
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Accountant'){
			
			$feeid=$this->input->post('feeid');
			$this->AccountingModel->deleteFee($feeid);
			$this->session->set_flashdata('message', 'Successfully deleted.');
			redirect(base_url()."Accounting/fees");
			
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	
	
	public function addmonthlyfees($classid="")
	{
		
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Accountant'){
			$fee['date']=date('Y-m-d');
			$fee['title']='Monthly Fee Of '.date('F', mktime(0, 0, 0, date('m'), 10));
			$fee['type']='MonthlyFee';
			$studentfee['sessionid']=$this->session->userdata('currentsessionid');
			if($classid=='all'){
				$classes=$this->ClassModel->getAllclass();
				foreach($classes as $classes){
					if($amount=$this->AccountingModel->getClassMonthlyFee($classes['classid'],date('m'))){
						$fee['amount']=$amount['amount'];
						$fee['classid']=$classes['classid'];
						$studentfee['feeid']=$this->AccountingModel->addFee($fee);
						$students=$this->StudentModel->getStudentByClass($fee['classid'],$studentfee['sessionid']);
						foreach($students as $student){
							$studentfee['sid']=$student['sid'];
							$this->AccountingModel->addStudentFee($studentfee);
						}
						$month=date('m')+1;
						if($month>12){
							$month=1;
						}
						$mfee['month']=$month;
						$this->AccountingModel->updateMonthlyFee($classes['classid'],$mfee);
					}
				}
				$this->session->set_flashdata('message', 'Monthly Fee Successfully Added.');
			}
			else{
				if($amount=$this->AccountingModel->getClassMonthlyFee($classid,date('m'))){
					$fee['amount']=$amount['amount'];
					$fee['classid']=$classid;
					$studentfee['feeid']=$this->AccountingModel->addFee($fee);
					$students=$this->StudentModel->getstudentbyclass($fee['classid'],$studentfee['sessionid']);
					foreach($students as $student){
						$studentfee['sid']=$student['sid'];
						$this->AccountingModel->addStudentFee($studentfee);
					}
					$month=date('m')+1;
					if($month>12){
						$month=1;
					}
					$mfee['month']=$month;
					$this->AccountingModel->updateMonthlyFee($classid,$mfee);
					$this->session->set_flashdata('message', 'Monthly Fee Successfully Added.');
				}
				else{
					$this->session->set_flashdata('message', 'Monthly Fee already Added for this class.');
				}
				
			}
			
			redirect(base_url()."Accounting/fees");
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function monthlyfees()
	{
		
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Accountant'){
			$data['fees']=$this->AccountingModel->getMonthlyFees();
			$data['classes']=$this->ClassModel->getAllClass();
			if(!$this->input->post('buttonSubmit')){
				$data['message']='';
				$this->parser->parse('Accounting/View_Monthlyfees',$data);
			}
			else{
				if(!$this->form_validation->run('monthlyfee')){
					$data['message']=validation_errors();
					$this->parser->parse('Accounting/View_Monthlyfees',$data);
				}
				else{
					$fee['classid']=$this->input->post('classid');
					$fee['amount']=$this->input->post('amount');
					$fee['month']=date('m');
					$this->AccountingModel->addMonthlyFee($fee);
					$this->session->set_flashdata('message', 'Monthly Fee Successfully Added.');
					redirect(base_url()."Accounting/monthlyfees");
				}
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function editmonthlyfee()
	{
		
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Accountant'){
			$data['fees']=$this->AccountingModel->getMonthlyFees();
			$data['classes']=$this->ClassModel->getAllclass();
			
			if(!$this->form_validation->run('editmonthlyfee')){
				$data['message']=validation_errors();
				$this->parser->parse('accounting/view_monthlyfees',$data);
			}
			else{
				$classid=$this->input->post('classid');
				$fee['amount']=$this->input->post('eamount');
				$this->AccountingModel->editMonthlyFee($fee,$classid);
				$this->session->set_flashdata('message', 'Successfully Updated.');
				redirect(base_url()."Accounting/monthlyfees");
			}
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function admissionfees()
	{
		
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Accountant'){
			$data['fees']=$this->AccountingModel->getAllAdmissionFee();
			if(!$this->input->post('buttonSubmit')){
				$data['message']='';
				$this->parser->parse('Accounting/View_AdmissionFees',$data);
			}
			else{
				if(!$this->form_validation->run('admissionfee')){
					$data['message']=validation_errors();
					$this->parser->parse('Accounting/View_AdmissionFees',$data);
				}
				else{
					$fee['title']=$this->input->post('title');
					$fee['type']=$this->input->post('type');
					$fee['amount']=$this->input->post('amount');
					$this->AccountingModel->addAdmisssionFee($fee);
					$this->session->set_flashdata('message', 'Admission Fee Successfully Added.');
					redirect(base_url()."Accounting/admissionfees");
				}
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function editadmissionfees()
	{
		
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Accountant'){
			$data['fees']=$this->AccountingModel->getAllAdmissionFee();
			
			if(!$this->form_validation->run('editadmissionfee')){
				$data['message']=validation_errors();
				$this->parser->parse('Accounting/View_AdmissionFees',$data);
			}
			else{
				$serial=$this->input->post('serial');
				$fee['title']=$this->input->post('etitle');
				$fee['amount']=$this->input->post('eamount');
				$this->AccountingModel->editAdmissionFee($fee,$serial);
				$this->session->set_flashdata('message', 'Admission Fee Successfully Updated.');
				redirect(base_url()."Accounting/admissionfees");
			}
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function deleteadmissionfees()
	{
		
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Accountant'){
			
			$serial=$this->input->post('serial');
			$this->AccountingModel->deleteAdmissionFee($serial);
			$this->session->set_flashdata('message', 'Admission Fee Successfully Deleted.');
			redirect(base_url()."Accounting/admissionfees");
			
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	
	
	///creating payments...................................................
	
	
	public function addpayments($sid="")
	{
		
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Accountant'){
			$data['sessions']=$this->AcademicModel->getAllsession();
			$data['sid']='';
			$data['name']='';
			$data['class']='';
			$data['balance']='';
			if(!$this->input->post('buttonSubmit')){
				if($sid==""){
					$data['message']='';
					$this->parser->parse('accounting/view_addpayments',$data);
				}
				else{
					$session=$this->session->userdata('currentsessionid');
					$student=$this->StudentModel->getstudent($sid,$session);
					$data['sid']=$student['sid'];
					$data['name']=$student['studentname'];
					$data['class']=$student['classname'].' ('.$student['alphaname'].')';
					$totalfee=0;
					$totalpay=0;
					if($fees=$this->AccountingModel->getfeebystudent($sid)){
						$totalfee=$fees['amount'];
					}
					if($singlefees=$this->AccountingModel->getsinglefeebystudent($sid)){
						$totalfee+=$singlefees['fee'];
					}
					if($payments=$this->AccountingModel->getpaymentbystudent($sid)){
						$totalpay=$payments['amount'];
					}
					$data['balance']=$totalfee-$totalpay;
					$data['message']='';
					$this->parser->parse('accounting/view_addpayments',$data);
				}
			}
			else{
				if(!$this->form_validation->run('payment')){
					$data['message']=validation_errors();
					$this->parser->parse('Accounting/View_AddPayments',$data);
				}
				else{
					$sid=$this->input->post('id');
					$session=$this->session->userdata('currentsessionid');
					$student=$this->StudentModel->getstudent($sid,$session);
					$data['sid']=$student['sid'];
					$data['name']=$student['studentname'];
					$data['class']=$student['classname'].' ('.$student['alphaname'].')';
					$totalfee=0;
					$totalpay=0;
					if($fees=$this->AccountingModel->getfeebystudent($sid)){
						$totalfee=$fees['amount'];
					}
					if($singlefees=$this->AccountingModel->getsinglefeebystudent($sid)){
						$totalfee+=$singlefees['fee'];
					}
					if($payments=$this->AccountingModel->getpaymentbystudent($sid)){
						$totalpay=$payments['amount'];
					}
					$data['balance']=$totalfee-$totalpay;
					$data['message']='';
					$this->parser->parse('Accounting/View_AddPayments',$data);
				}
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function submitpayment()
	{
		
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Accountant'){
			$data['sessions']=$this->AcademicModel->getAllsession();
			if(!$this->form_validation->run('addpayment')){
				$data['sid']=set_value('sid');
				$data['name']=set_value('name');
				$data['class']=set_value('class');
				$data['balance']=set_value('balance');
				$data['message']=validation_errors();
				$this->parser->parse('Accounting/View_AddPayments',$data);
			}
			else{
				$payment['date']=date('Y-m-d');
				$payment['sid']=$this->input->post('sid');
				$payment['details']=$this->input->post('details');
				$payment['amount']=$this->input->post('amount');
				$payment['method']=$this->input->post('method');
				$payment['sessionid']=$this->input->post('sessionid');
				$this->AccountingModel->addPayment($payment);
				$this->session->set_flashdata('message', 'Payment Successfull.');
				
				$data['date']=date('Y-m-d');
				$data['sid']=set_value('sid');
				$data['name']=set_value('name');
				$data['class']=set_value('class');
				$data['balance']=set_value('balance');
				$data['details']=$this->input->post('details');
				$data['amount']=$this->input->post('amount');
				$data['method']=$this->input->post('method');
				$session=$this->AcademicModel->getSession($payment['sessionid']);
				$data['session']=$session['sessions'];
				$this->parser->parse('Accounting/View_PrintPayments',$data);
			}
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function payments()
	{
		
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Accountant'){
			$data['payments']=$this->AccountingModel->getAllPayments();
			$this->parser->parse('Accounting/View_Payments',$data);
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function expenses()
	{
		
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Accountant'){
			$data['expenses']=$this->AccountingModel->getExpenses();
			if(!$this->input->post('buttonSubmit')){
				$data['message']='';
				$this->parser->parse('Accounting/View_Expenses',$data);
			}
			else{
				if(!$this->form_validation->run('expense')){
					$data['message']=validation_errors();
					$this->parser->parse('Accounting/View_Expenses',$data);
				}
				else{
					$expense['date']=date("Y-m-d");
					$expense['title']=$this->input->post("title");
					$expense['details']=$this->input->post("details");
					$expense['amount']=$this->input->post("amount");
					$expense['session']=$this->session->userdata('currentsessionid');
					$this->AccountingModel->addExpenses($expense);
					redirect(base_url().'Accounting/expenses');
				}
			}
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	
	//student part...................
	public function studentpayments()
	{
		
		$usertype=$this->session->userdata('usertype');
		if($usertype=='student'){
			$sid=$this->session->userdata('username');
			$fee=$this->AccountingModel->getfeebystudent($sid);
			$otherfee=$this->AccountingModel->getsinglefeebystudent($sid);
			$payment=$this->AccountingModel->getpaymentbystudent($sid);
			$totalfee=$fee['amount']+$otherfee['fee'];
			$data['fee']=$totalfee;
			$data['pay']=$payment['amount'];
			$data['due']=$totalfee-$payment['amount'];
			$data['payments']=$this->AccountingModel->getstudentpayments($sid);
			$data['fees']=$this->AccountingModel->getstudentfees($sid);
			$data['otherfees']=$this->AccountingModel->getstudentotherfees($sid);
			$this->parser->parse('accounting/view_studentpayments',$data);
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	
	//validation..........................................................
	public function validstudent($sid)
	{
		
		if($this->StudentModel->getstudentinfo($sid))
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('validstudent', 'Invalid Student ID');
			return false;
		}
	}

}