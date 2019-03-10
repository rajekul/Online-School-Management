<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->model('EmployeeModel');
		$this->load->model('AcademicModel');
		$this->load->model('ClassModel');
		
	}
	
	public function index()
	{
		$data['message']="";
		$data['username']="";
		$users=$this->UserModel->getAll();
		if(!$users){
			$user['username']='admin';
			$user['password']='admin';
			$user['type']='Admin';
			$user['status']='Active';
			$this->UserModel->add($user);
		}
		
		
		$data['myschool']=$this->AcademicModel->getSchoolInfo();
		$this->load->view('User/View_Index',$data);
	}
	public function login()
	{
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$data['username']=$username;
		$data['myschool']=$this->AcademicModel->getSchoolInfo();
		if($username=="" || $password==""){
			
			$data['message']="Please Enter Username & Password<br/>";
			$this->load->view('User/View_Index',$data);
		}
		else{
			if(!$user=$this->UserModel->get($username)){
				
				$data['message']="Incorrect Username or Password<br/>";
				$this->load->view('User/View_Index',$data);
			}
			else{
				if($user['password']==$password){
					if($user['status']=='Active'){
						$myschool=$this->AcademicModel->getSchoolInfo();
						$classes=$this->ClassModel->getAllclass();
						$current=$this->AcademicModel->getCurrentSession();
						$designations=$this->EmployeeModel->getAllDesignation();
						$this->session->set_userdata('schoolname',$myschool['schoolname']);
						$this->session->set_userdata('shortname',$myschool['shortname']);
						$this->session->set_userdata('logo',$myschool['logo']);
						$this->session->set_userdata('currentsessionid',$current['sessionid']);
						$this->session->set_userdata('currentsession',$current['sessions']);
						$this->session->set_userdata('username',$user['username']);
						$this->session->set_userdata('usertype',$user['type']);
						$this->session->set_userdata('classes',$classes);
						$this->session->set_userdata('designations',$designations);
						
						if($user['type']=='Admin'){
							redirect(base_url().'Admin/');
						}
						else if($user['type']=='Student'){
							$this->session->set_userdata('usertype','student');
							redirect('http://localhost/osms/student');
						}
						else if($user['type']=='Teacher'){
							redirect(base_url().'Teacher/');
						}
						else if($user['type']=='Register'){
							$emp=$this->EmployeeModel->get($user['username']);
							$this->session->set_userdata('name',$emp['name']);
							redirect(base_url().'Register/');
						}
						else{
							redirect(base_url().'User/error');
						}

					}
					else{						
						$data['message']="Your Account is blocked<br/>";
						$this->load->view('User/View_Index',$data);
					}
				}
				else{
					$data['message']="Incorrect Username or Password<br/>";
					$this->load->view('User/View_Index',$data);
				}
			}
		}
	}
	
	
	public function changepassword()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype){
			$data['username']=$this->session->userdata('username'); 
			if(!$this->input->post('buttonSubmit')){
				$data['message']="";
				$this->parser->parse('User/View_ChangePassword',$data);
			}
			else{
				if(!$this->form_validation->run('password')){
					$data['message']=validation_errors();
					$this->parser->parse('User/View_ChangePassword',$data);
				}
				else{
					$username=$this->input->post('username');
					$password['password']=$this->input->post('np');
					$this->UserModel->changePassword($password,$username);
					$this->session->set_flashdata('message', 'Password Successfully Changed...');
					redirect(base_url()."User/changepassword");
				}
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	} 
	
	public function oldpass($str)
	{
		$username=$this->session->userdata('username');
		$user=$this->UserModel->get($username);
		if($user['password']==$str){
			return true;
		}
		else
		{
			$this->form_validation->set_message('oldpass', 'Current password is wrong');
			return false;
		}
	}
	public function newpass($str)
	{
		$pattern ="(^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$)";
		
		if(preg_match($pattern, $str))
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('newpass', '**Password should contain 1 uppercase 1 lowercase 1 digit');
			return false;
		}
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
	public function error(){
		$this->load->view('User/View_Error');
	}
}