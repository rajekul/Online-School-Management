<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Academic extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('AcademicModel');
	}
	public function index()
	{
		redirect(base_url().'User/error');
	}
	public function session()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['current']=$this->AcademicModel->getCurrentSession();
			$data['upcoming']=$this->AcademicModel->getUpcomingSession();
			$data['sessions']=$this->AcademicModel->getAllSession();
			if(!$this->input->post('buttonSubmit')){
				
				$data['message']='';
				$this->parser->parse('Academic/View_Session',$data);
			}
			else{
				if($this->input->post('buttonSubmit')=='Add Session'){
					if(!$this->form_validation->run('session')){
						
						$data['message']=validation_errors();
						$this->parser->parse('Academic/View_Session',$data);
					}
					else{
						$session['sessions']=$this->input->post('session');
						$session['year']=$this->input->post('year');
						$session['status']='Upcoming';
						$this->AcademicModel->addSession($session);
						$this->session->set_flashdata('message', 'Successfully Added New Session');
						redirect(base_url()."academic/session");
					}

				}
				else if($this->input->post('buttonSubmit')=='Change Session'){
					$sessionid=$this->input->post('nextsession');
					$this->AcademicModel->changeSession($sessionid);
					$current=$this->AcademicModel->getCurrentSession();
					$this->session->set_userdata('currentsessionid',$current['sessionid']);
					$this->session->set_userdata('currentsession',$current['sessions']);
					$this->session->set_flashdata('message', 'Session Changed Successfully');
					redirect(base_url()."academic/session");
				}
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function editsession($sessionid='')
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			if(!$this->input->post('buttonSubmit')){
				$data['session']=$this->AcademicModel->getsession($sessionid);
				$data['message']='';
				$this->parser->parse('Academic/View_Sessionedit',$data);
			}
			else{
				if(!$this->form_validation->run('editsession')){
					$data['session']=$this->AcademicModel->getsession($sessionid);
					$data['message']=validation_errors();
					$this->parser->parse('Academic/View_Sessionedit',$data);
				}
				else{
					$session['sessions']=$this->input->post('session');
					$session['year']=$this->input->post('year');
					$sessionid=$this->input->post('sessionid');
					$this->AcademicModel->editsession($sessionid,$session);
					$current=$this->AcademicModel->getCurrentSession();
					$this->session->set_userdata('currentsessionid',$current['sessionid']);
					$this->session->set_userdata('currentsession',$current['sessions']);
					$this->session->set_flashdata('message', 'Session Updated Successfully');
					redirect(base_url()."academic/session");
				}
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function myschool()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			if(!$this->input->post('buttonSubmit')){
				$data['myschool']=$this->AcademicModel->getSchoolInfo();
				$data['message']='';
				$this->parser->parse('Academic/View_Myschool',$data);
			}
			else{
				if(!$this->form_validation->run('myschool')){
					$data['myschool']=$this->AcademicModel->getSchoolInfo();
					$data['message']='<div class="alert alert-danger alert-dismissable">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
						<strong>Errors!</strong>';
					$data['message'].=validation_errors();
					$data['message'].='</div>';
					$this->parser->parse('Academic/View_Myschool',$data);
				}
				else{
					global $picname;
					$name=$this->input->post('name');
					$sname=$this->input->post('sname');
					$since=$this->input->post('since');
					$title=$this->input->post('title');
					$contact=$this->input->post('contact');
					$logo=$picname;
					$email=$this->input->post('email');
					$address=$this->input->post('address');
					$this->AcademicModel->updateMyschool($name,$sname,$since,$title,$contact,$email,$logo,$address);
					$myschool=$this->AcademicModel->getSchoolInfo();
					$this->session->set_userdata('schoolname',$myschool['schoolname']);
					$this->session->set_userdata('shortname',$myschool['shortname']);
					$this->session->set_flashdata('message', 'Successfully Updated School Information');
					redirect(base_url()."Academic/Myschool");
				}
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function events()
	{
		redirect(base_url().'User/error');
	}
	
	function logoValidation(){
		global $picname;
		if(!isset($_FILES['logo']['name'])){
			$picname=$this->input->post('pic');
			return true;
		}
		else if($_FILES['logo']['name']!=""){
			$check = getimagesize($_FILES["logo"]["tmp_name"]);
			if($check !== false) {
				$extent=explode(".",$_FILES['logo']['name']);
				$picname="logo.".$extent[1];
				$file = $_FILES["logo"]["tmp_name"];
				$newloc = "../school/files/logo/$picname";
				move_uploaded_file($file, $newloc);
				return true;
			} 
			else {
				$this->form_validation->set_message('logoValidation', 'Invalid photo');
				return false;
			}
		}
		else{
			$picname=$this->input->post('pic');
			return true;
		}
		
		
	}
}