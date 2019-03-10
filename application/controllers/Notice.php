<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notice extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('NoticeModel');
		
	}
	
	public function index()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['notices']=$this->NoticeModel->getAll();
			$this->parser->parse('Notice/View_Notices',$data);
		}
		if($usertype=='Teacher'){
			$data['notices']=$this->NoticeModel->getNotices('staff');
			$this->parser->parse('Notice/View_NoticesToStaff',$data);
		}
	}
	
	public function add()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			if(!$this->input->post('buttonSubmit')){
				$data['message']='';
				$this->parser->parse('Notice/View_NoticeAdd',$data);
			}
			else{
				if(!$this->form_validation->run('notice')){
					$data['message']=validation_errors();
					$this->parser->parse('Notice/View_NoticeAdd',$data);
				}
				else{
					$notice['date']=date('Y-m-d');
					$notice['title']=$this->input->post('title');
					$notice['viewer']=$this->input->post('viewer');
					$notice['notice']=$this->input->post('notice');
					$this->NoticeModel->addNotice($notice);
					$this->session->set_flashdata('message', 'Notice added successfully');
					redirect(base_url()."Notice");
				}
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function editnotice()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){	
			$serial=$this->input->post('serial');
			$notice['title']=$this->input->post('title');
			$notice['notice']=$this->input->post('notice');
			$this->NoticeModel->editNotice($notice,$serial);
			$this->session->set_flashdata('message', 'Notice Updated');
			redirect(base_url()."notice");
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function deletenotice()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){	
			$serial=$this->input->post('serial');
			$this->NoticeModel->deleteNotice($serial);
			$this->session->set_flashdata('message', 'Notice Deleted');
			redirect(base_url()."notice");
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	
	
	//............................................
	
	public function notices($viewer="all")
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype){
			$data['notices']=$this->NoticeModel->getNotices($viewer);
			$this->parser->parse('notice/view_studentnotices',$data);
		}
	}
	
	
	//ajax.......................................
	

	public function getbyviewer($viewer="all")
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			if($viewer=='all'){
				$data['notice']=$this->NoticeModel->getAll();
			}
			else{
				$data['notice']=$this->NoticeModel->getNotices($viewer);
			}
			$this->parser->parse('Notice/View_NoticesByViewer',$data);
		}
	}
	
	public function searchnotices($notice='')
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['notice']=$this->NoticeModel->searchnotices($notice);
			$this->parser->parse('Notice/View_SearchedNotice',$data);
		}
	}
}