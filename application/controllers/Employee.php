<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Dhaka');
		$this->load->model('EmployeeModel');
		
	}

	public function index()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['desig']="ALL";
			$data['employees']=$this->EmployeeModel->getAll();
			$this->parser->parse('Employee/View_Employees',$data);
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function info($designation)
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['desig']=$designation;
			$data['employees']=$this->EmployeeModel->getByDesignation($designation);
			$this->parser->parse('Employee/View_Employees',$data);
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function add()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$totalemployee=$this->EmployeeModel->getTotalEmployee();
			$totalemployee+=1;
			$data['id']=date('ymd').'-'.str_pad($totalemployee, 4, "0",STR_PAD_LEFT);
			$data['designations']=$this->EmployeeModel->getAllDesignation();
			if(!$data['designations']){
				$this->session->set_flashdata('message', 'Please Add designation First');
				redirect(base_url()."Employee/designation");
			}
			if(!$this->input->post('buttonSubmit')){
				$data['message']='';
				$this->parser->parse('Employee/View_EmployeeAdd',$data);
			}
			else{
				if(!$this->form_validation->run('employee')){
					$data['message']=validation_errors();
					$this->parser->parse('Employee/View_EmployeeAdd',$data);
				}
				else{
					global $picname;
					$employee['eid']=$this->input->post('eid');
					$employee['name']=$this->input->post('name');
					$employee['designation']=$this->input->post('designation');
					$employee['gender']=$this->input->post('gender');
					$employee['dob']=$this->input->post('dob');
					$employee['email']=$this->input->post('email');
					$employee['phone']=$this->input->post('phone');
					$employee['nid']=$this->input->post('nid');
					$employee['qualification']=$this->input->post('qualification');
					$employee['photo']=$picname;
					$employee['appointdate']=date('Y-m-d');
					$username=$employee['eid'];
					$password=$this->randomPassword();
					$type=$this->input->post('access');
					$status='Active';
					$this->EmployeeModel->insert($employee,$username,$password,$type,$status);
					$this->session->set_flashdata('message', 'New Employee Added<br/>Username:'.$username.' & Password:'.$password);
					redirect(base_url()."Employee/info/".$employee['designation']);
				}
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function edit($eid="")
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['employee']=$this->EmployeeModel->get($eid);
			if(!$this->input->post('buttonSubmit')){
				$data['message']='';
				$this->parser->parse('Employee/View_EmployeeEdit',$data);
			}
			else{
				if(!$this->form_validation->run('editemployee')){
					$data['message']=validation_errors();
					$this->parser->parse('Employee/View_EmployeeEdit',$data);
				}
				else{
					global $picname;
					$eid=$this->input->post('eid');
					$employee['name']=$this->input->post('name');
					$employee['gender']=$this->input->post('gender');
					$employee['dob']=$this->input->post('dob');
					$employee['email']=$this->input->post('email');
					$employee['phone']=$this->input->post('phone');
					$employee['nid']=$this->input->post('nid');
					$employee['qualification']=$this->input->post('qualification');
					$employee['photo']=$picname;
					$this->EmployeeModel->update($employee,$eid);
					$this->session->set_flashdata('message', 'Successfully Updated Employee Information');
					redirect(base_url()."employee");
				}
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function designation()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['designations']=$this->EmployeeModel->getAllDesignation();
			$this->session->set_userdata('designations',$data['designations']);
			if(!$this->input->post('buttonSubmit')){
				$data['message']='';
				$this->parser->parse('Employee/View_Designation',$data);
			}
			else{
				if(!$this->form_validation->run('designation')){
					$data['message']=validation_errors();
					$this->parser->parse('Employee/View_Designation',$data);
				}
				else{
					$designation['designation']=$this->input->post('designation');
					$this->EmployeeModel->addDesignation($designation);
					$this->session->set_flashdata('message', 'New Designation created');
					redirect(base_url()."Employee/designation");
				}
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function editdesignation($id='')
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['designation']=$this->EmployeeModel->getDesignation($id);
			if(!$this->input->post('buttonSubmit')){
				$data['message']='';
				$this->parser->parse('Employee/View_DesignationEdit',$data);
			}
			else{
				if(!$this->form_validation->run('designation')){
					$data['message']=validation_errors();
					$this->parser->parse('Employee/View_DesignationEdit',$data);
				}
				else{
					$id=$this->input->post('designationid');
					$designation['designation']=$this->input->post('designation');
					$this->EmployeeModel->updateDesignation($designation,$id);
					$this->session->set_flashdata('message', 'Designation Updated');
					redirect(base_url()."Employee/designation");
				}
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function profile($eid="")
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['employee']=$this->EmployeeModel->get($eid);
			$this->parser->parse('Employee/View_EmployeeProfile',$data);
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	function randomPassword() {
		$alphabet = '1234567890';
		$pass = array();
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, strlen($alphabet) - 1);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); 
	}
	
	
	
	
	
	
	//ajax request part.......................
	
	public function searchemp($nameid='')
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['employees']=$this->EmployeeModel->search($nameid);
			$this->parser->parse('Employee/View_SearchedEmployees',$data);
		}
		
		else{
			redirect(base_url().'User/error');
		}
	}
	
	
	
	//validaton part..........................
	
	public function nameValidation($str)
	{
		$pattern = '/^[a-zA-Z. ]*([1-9])?$/';

		if(preg_match($pattern, $str))
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('nameValidation', 'Invalid Name');
			return false;
		}
	}
	function idValidation($str){
		$pattern = '/^[0-9]{6}-[0-9]{4}$/';

		if(preg_match($pattern, $str))
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('idValidation', 'Invalid Id');
			return false;
		}
		
	}
	
	function dobValidation($dob){
		
		$dobv=explode("-",$dob);
		if(count($dobv)==3 && preg_match("/^[0-9]{2}$/",$dobv[2]) && preg_match("/^[0-9]{2}$/",$dobv[1])&& preg_match("/^[0-9]{4}$/",$dobv[0]) && $dobv[2]<=31 && $dobv[1]<=12){
			if($dobv[0]<date("Y")){
				return true;
			}
			else{
				$this->form_validation->set_message('dobValidation', 'Birth Date should be past');
				return false;
			}
			
		}
		else{
			$this->form_validation->set_message('dobValidation', 'Invalid Date');
			return false;
		}
			
	}
	
	
	function photoValidation(){
		global $picname;
		if($_FILES['photo']['name']==""){
			$this->form_validation->set_message('photoValidation', 'Photo Required');
			return false;
		}
		else{
			$check = getimagesize($_FILES["photo"]["tmp_name"]);
			if($check) {
				$extent=explode(".",$_FILES['photo']['name']);
				$picname=$this->input->post('eid').".".$extent[1];
				$file = $_FILES["photo"]["tmp_name"];
				$newloc = "../school/files/photos/$picname";
				move_uploaded_file($file, $newloc);
				return true;
			} 
			else {
				$this->form_validation->set_message('photoValidation', 'Invalid photo');
				return false;
			}
		}	
		
	}
	
	function photoeditValidation(){
		global $picname;
		if(!isset($_FILES['photo']['name'])){
			$picname=$this->input->post('pic');
			return true;
		}
		else if($_FILES['photo']['name']!=""){
			$check = getimagesize($_FILES["photo"]["tmp_name"]);
			if($check !== false) {
				$photodelete = "../school/files/photos/".$this->input->post('pic');
				unlink($photodelete);
				$extent=explode(".",$_FILES['photo']['name']);
				$picname=$this->input->post('eid').".".$extent[1];
				$file = $_FILES["photo"]["tmp_name"];
				$newloc = "../school/files/photos/$picname";
				move_uploaded_file($file, $newloc);
				return true;
			} 
			else {
				$this->form_validation->set_message('photoValidation', 'Invalid photo');
				return false;
			}
		}
		else{
			$picname=$this->input->post('pic');
			return true;
		}
		
		
	}
	
}