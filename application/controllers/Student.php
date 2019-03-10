<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('StudentModel');
		$this->load->model('ParentModel');
		$this->load->model('UserModel');
		$this->load->model('ClassModel');
		
	}

	public function index()
	{
		
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$class=$this->ClassModel->getAllClass();
			foreach($class as $class){
				redirect(base_url().'Student/information/'.$class['classid']);
				break;
			}
				
		}
		else{
			redirect(base_url().'User/error');
		}
		
	}
	
	public function information($classid,$secid="")
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$session=$this->session->userdata('currentsessionid');
			$data['class']=$this->ClassModel->getClass($classid);
			$data['sections']=$this->ClassModel->getSecByClass($classid);
			$data['secid']=$secid;
			if($classid==""){
				redirect(base_url().'User/error');
			}
			else if($secid==""){
				$data['students']=$this->StudentModel->getStudentByClass($classid,$session);
				$this->parser->parse('Student/View_Students',$data);
			}
			else{
				
				$data['students']=$this->StudentModel->getStudentBySec($secid,$session);
				$this->parser->parse('Student/View_Students',$data);
			}	
		}
		else if($usertype=='Teacher'){
			$session=$this->session->userdata('currentsessionid');
			$data['class']=$this->ClassModel->getClass($classid);
			$data['sections']=$this->ClassModel->getSecByClass($classid);
			$data['secid']=$secid;
			if($classid==""){
				redirect(base_url().'User/error');
			}
			else if($secid==""){
				$data['students']=$this->StudentModel->getStudentByClass($classid,$session);
				$this->parser->parse('Student/View_StudentsToTeacher',$data);
			}
			else{
				
				$data['students']=$this->StudentModel->getStudentBySec($secid,$session);
				$this->parser->parse('Student/View_StudentsToTeacher',$data);
			}	
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	
	
	public function addstudent()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$currentsession=$this->session->userdata('currentsession');
			if($currentsession){
				if($data['id']=$this->session->userdata('sid')){
					$data['classes']=$this->ClassModel->getAllClass();
					$data['studentinfo']=$this->StudentModel->getStudentInfo($data['id']);
					if(!$this->input->post('buttonSubmit')){
						$data['message']='';
						$this->parser->parse('Student/View_StudentAdd',$data);
					}
					else{
						if(!$this->form_validation->run('editstudentadd')){
							$data['message']=validation_errors();
							$this->parser->parse('Student/View_StudentAdd',$data);
						}
						else{
							global $picname;
							$sid=$this->session->userdata('sid');
							$student['studentname']=$this->input->post('sname');
							$student['dob']=$this->input->post('dob');
							$student['studentemail']=$this->input->post('semail');
							$student['studentphone']=$this->input->post('sphone');
							$student['gender']=$this->input->post('gender');
							$student['blood']=$this->input->post('blood');
							$student['religion']=$this->input->post('religion');
							$student['nationality']=$this->input->post('nationality');
							$student['photo']=$picname;
							
							$this->StudentModel->updateStudent($student,$sid);
							
							$studentclass['classid']=$this->input->post('classid');
							$studentclass['secid']=$this->input->post('secid');
							$studentclass['session']=$this->session->userdata('currentsessionid');
							$this->StudentModel->updateAddStudentClass($studentclass,$sid);
							
							$this->session->set_flashdata('message', 'Student Information Updated.');
							redirect(base_url()."Student/addStudent");
						}
						
					}
					
				}
				else{
					$session=$this->session->userdata('currentsessionid');
					$totalstudent=$this->StudentModel->TotalStudent();
					$totalstudent+=1;
					$data['id']=date('y').'-'.str_pad($totalstudent, 5, "0",STR_PAD_LEFT);
					if(!$this->input->post('buttonSubmit')){
						$data['message']='';
						$data['classes']=$this->ClassModel->getAllClass();
						if(!$data['classes']){
							$this->session->set_flashdata('message', 'Please Create Class And Section First');
							redirect(base_url()."Classes/manageclass");
						}
						$this->parser->parse('Student/View_StudentAdd',$data);
					}
					else{
						$this->session->set_userdata('secid',$this->input->post('secid'));
						if(!$this->form_validation->run('studentadd')){
							$data['message']=validation_errors();
							$data['classes']=$this->ClassModel->getAllClass();
							$this->parser->parse('Student/View_StudentAdd',$data);
						}
						else{
							global $picname;
							$student['sid']=$this->input->post('sid');
							$student['studentname']=$this->input->post('sname');
							$student['dob']=$this->input->post('dob');
							$student['studentemail']=$this->input->post('semail');
							$student['studentphone']=$this->input->post('sphone');
							$student['gender']=$this->input->post('gender');
							$student['blood']=$this->input->post('blood');
							$student['religion']=$this->input->post('religion');
							$student['nationality']=$this->input->post('nationality');
							$student['photo']=$picname;
							$username=$student['sid'];
							$spassword=$this->randomPassword();
							$this->StudentModel->addStudent($student,$username,$spassword);
							
							$studentclass['sid']=$student['sid'];
							$studentclass['classid']=$this->input->post('classid');
							$studentclass['secid']=$this->input->post('secid');
							$studentclass['session']=$this->session->userdata('currentsessionid');
							$this->StudentModel->addStudentClass($studentclass);
							
							$this->session->set_userdata('sid',$student['sid']);
							$this->session->set_userdata('classid',$studentclass['classid']);
							$this->session->set_flashdata('message', 'Student Information saved.Please fillup the parent information form');
							redirect(base_url()."Parents/addparent");
						}
					}
				
				}
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
	public function editstudent($sid='')
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['studentinfo']=$this->StudentModel->getStudentInfo($sid);
			if(!$this->input->post('buttonSubmit')){
				$data['message']='';
				$this->parser->parse('Student/View_StudentEdit',$data);
			}
			else{
				if(!$this->form_validation->run('editstudent')){
					$data['message']=validation_errors();
					$this->parser->parse('Student/View_StudentEdit',$data);
				}
				else{
					global $picname;
					$sid=$this->input->post('sid');
					$student['studentname']=$this->input->post('sname');
					$student['dob']=$this->input->post('dob');
					$student['studentemail']=$this->input->post('semail');
					$student['studentphone']=$this->input->post('sphone');
					$student['gender']=$this->input->post('gender');
					$student['blood']=$this->input->post('blood');
					$student['religion']=$this->input->post('religion');
					$student['nationality']=$this->input->post('nationality');
					$student['photo']=$picname;
					$this->StudentModel->updateStudent($student,$sid);
					$classid=$this->input->post('classid');
					$secid=$this->input->post('secid');
					$this->session->set_flashdata('message', 'Student Information Updated.');
					redirect(base_url()."Student/information/".$classid."/".$secid);
				}

			}
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	
	public function finishadmission(){
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			if($this->session->userdata('add')){
				$pid=$this->session->userdata('pid');
				$sid=$this->session->userdata('sid');
				$data['studentinfo']=$this->StudentModel->getstudentinfo($sid);
				$data['father']=$this->ParentModel->getParentById($pid,'father');
				$data['mother']=$this->ParentModel->getParentById($pid,'mother');
				$data['guardian']=$this->ParentModel->getParentById($pid,'guardian');
				$data['address']=$this->ParentModel->getAddress($pid);
				
				$data['studentlogin']=$this->UserModel->get($sid);
				$data['parentlogin']=$this->UserModel->get($pid);
				
				if(!$this->input->post('buttonSubmit')){
					$data['message']='';
					$this->parser->parse('Student/View_AdmissionForm',$data);
				}
				else{
					$classid=$this->session->userdata('classid');
					$secid=$this->session->userdata('secid');
					$this->session->unset_userdata('secid');
					$this->session->unset_userdata('sid');
					$this->session->unset_userdata('pid');
					$this->session->unset_userdata('add');
					$this->session->set_flashdata('message', 'Student Admission Completed Successfully');
					redirect(base_url()."Student/information/".$classid."/".$secid);
					
				}
			}
			else{
				$this->session->set_flashdata('message', 'Please fillup All information');
				redirect(base_url()."Parents/addaddress");
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function details($sid){
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register' || $usertype=='Teacher'){
			
			$parent=$this->StudentModel->getParentId($sid);
			$data['studentinfo']=$this->StudentModel->getstudentinfo($sid);
			$data['father']=$this->ParentModel->getParentById($parent['pid'],'father');
			$data['mother']=$this->ParentModel->getParentById($parent['pid'],'mother');
			$data['guardian']=$this->ParentModel->getParentById($parent['pid'],'guardian');
			$data['address']=$this->ParentModel->getAddress($parent['pid']);
			
			$this->parser->parse('Student/View_StudentDetails',$data);
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
	function sidValidation($str){
		$pattern = '/^[0-9]{2}-[0-9]{5}$/';

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
	function pidValidation($str){
		$pattern = '/^[0-9]{4}-[0-9]{5}$/';

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
		if($_FILES['sphoto']['name']==""){
			$this->form_validation->set_message('photoValidation', 'Photo Required');
			return false;
		}
		else{
			$check = getimagesize($_FILES["sphoto"]["tmp_name"]);
			if($check !== false) {
				$extent=explode(".",$_FILES['sphoto']['name']);
				$picname=$this->input->post('sid').".".$extent[1];
				$file = $_FILES["sphoto"]["tmp_name"];
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
		if(!isset($_FILES['sphoto']['name'])){
			$picname=$this->input->post('pic');
			return true;
		}
		else if($_FILES['sphoto']['name']!=""){
			$check = getimagesize($_FILES["sphoto"]["tmp_name"]);
			if($check !== false) {
				$photodelete = "../school/files/photos/".$this->input->post('pic');
				unlink($photodelete);
				$extent=explode(".",$_FILES['sphoto']['name']);
				$picname=$this->input->post('sid').".".$extent[1];
				$file = $_FILES["sphoto"]["tmp_name"];
				$newloc = "../school/files/photos/$picname";
				move_uploaded_file($file, $newloc);
				return true;
			} 
			else {
				$this->form_validation->set_message('photoeditValidation', 'Invalid photo');
				return false;
			}
		}
		else{
			$picname=$this->input->post('pic');
			return true;
		}
		
		
	}
	
	
	//ajax...............................................
	
	
	
	
	public function searchstudent($nameid='',$classid='')
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$session=$this->session->userdata('currentsessionid');
			$data['class']=$this->ClassModel->getClass($classid);	
			$data['students']=$this->StudentModel->search($nameid,$classid,$session);
			$this->parser->parse('Student/View_SearchedStudents',$data);
			
			
		}
		if($usertype=='Teacher'){
			$session=$this->session->userdata('currentsessionid');
			$data['class']=$this->ClassModel->getClass($classid);	
			$data['students']=$this->StudentModel->search($nameid,$classid,$session);
			$this->parser->parse('Student/View_SearchedStudentsByTeacher',$data);
			
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
}