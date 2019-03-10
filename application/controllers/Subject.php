<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subject extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SubjectModel');
		$this->load->model('ClassModel');
		
	}

	public function index()
	{
		
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['subjects']=$this->SubjectModel->getAllSubject();
			if(!$this->input->post('buttonSubmit')){
				$data['message']='';
				$this->parser->parse('Subject/View_Subjects',$data);
			}
			else{
				if(!$this->form_validation->run('subject')){
					$data['message']=validation_errors();
					$this->parser->parse('Subject/View_Subjects',$data);
				}
				else{
					$subject['subjectcode']=$this->input->post('subjectcode');
					$subject['subjectname']=$this->input->post('subjectname');
					$this->SubjectModel->addSubject($subject);
					$this->session->set_flashdata('message', 'Subject Successfully Added.');
					redirect(base_url()."Subject");
				}
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function editsubject($subjectcode="")
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['subject']=$this->SubjectModel->get($subjectcode);
			if(!$this->input->post('buttonSubmit')){
				$data['message']='';
				$this->parser->parse('Subject/View_SubjectEdit',$data);
			}
			else{
				if(!$this->form_validation->run('editsubject')){
					$data['message']=validation_errors();
					$this->parser->parse('Subject/View_SubjectEdit',$data);
				}
				else{
					$subjectcode=$this->input->post('subjectcode');
					$subject['subjectname']=$this->input->post('subjectname');
					$this->SubjectModel->update($subjectcode,$subject);
					$this->session->set_flashdata('message', 'Successfully Updated');
					redirect(base_url()."Subject");
				}
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function deletesubject($subjectcode="")
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['subject']=$this->SubjectModel->get($subjectcode);
			if(!$this->input->post('buttonSubmit')){
				$data['message']='';
				$this->parser->parse('Subject/View_SubjectDelete',$data);
			}
			else{
				$subjectcode=$this->input->post('subjectcode');
				$this->SubjectModel->del($subjectcode);
				$this->session->set_flashdata('message', 'Successfully Deleted');
				redirect(base_url()."Subject");
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function asign($classid)
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['class']=$this->ClassModel->getclass($classid);
			$data['subjects']=$this->SubjectModel->getAllsubject();
			$data['classsubject']=$this->SubjectModel->getClassSubject($classid);
			if(!$this->input->post('buttonSubmit')){
				$data['message']='';
				$this->parser->parse('Subject/View_SubjectAsign',$data);
			}
			else{
				if(!$this->form_validation->run('asignsubject')){
					$data['message']=validation_errors();
					$this->parser->parse('Subject/View_SubjectAsign',$data);
				}
				else{
					$asign['classid']=$this->input->post('classid');
					$subjects=$this->SubjectModel->getAllsubject();
					foreach($subjects as $subject){
						if($this->input->post($subject['subjectcode'])){
							$asign['subjectcode']=$this->input->post($subject['subjectcode']);
							if(!$this->SubjectModel->getsubjectbyclass($asign['classid'],$asign['subjectcode'])){
								$this->SubjectModel->asignsubject($asign);
							}
						}
					}
					$this->session->set_flashdata('message', 'Successfully Asigned');
					redirect(base_url()."Subject/asign/".$asign['classid']);
				}
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	
	
	//student part...............................
	
	
	
	public function studentsubjects()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='student'){
			$session=$this->session->userdata('currentsessionid');
			$sid=$this->session->userdata('username');
			$class=$this->classmodel->getstudentclass($sid,$session);
			$data['subjects']=$this->SubjectModel->getclasssubject($class['classid']);
			$this->parser->parse('class/view_studentsubject',$data);
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	
}