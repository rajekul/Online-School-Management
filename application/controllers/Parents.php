<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Parents extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ParentModel');
	}

	public function index()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['parents']=$this->ParentModel->getAllparents();
			$this->parser->parse('Parents/View_Parents',$data);
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	
	public function addparent()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			if($this->session->userdata('sid')){
				if($data['id']=$this->session->userdata('pid')){
					$data['father']=$this->ParentModel->getParentById($this->session->userdata['pid'],'father');
					$data['mother']=$this->ParentModel->getParentById($this->session->userdata['pid'],'mother');
					$data['guardian']=$this->ParentModel->getParentById($this->session->userdata['pid'],'guardian');
					if(!$this->input->post('buttonSubmit')){
						$data['message']='';
						$this->parser->parse('Parents/View_ParentAdd',$data);
					}
					else{
						if(!$this->form_validation->run('editparentadd')){
							$data['message']=validation_errors();
							$this->parser->parse('Parents/View_ParentAdd',$data);
						}
						else{
							$pid=$this->session->userdata('pid');
							$parent['parentname']=$this->input->post('fname');
							$parent['parentemail']=$this->input->post('femail');
							$parent['parentphone']=$this->input->post('fphone');
							$parent['nid']=$this->input->post('fnid');
							$parent['profession']=$this->input->post('fprofession');
							$parent['income']=$this->input->post('fincome');
							$relation='father';
							$this->ParentModel->updateParent($parent,$pid,$relation);
							
							
							$parent['parentname']=$this->input->post('mname');
							$parent['parentemail']=$this->input->post('memail');
							$parent['parentphone']=$this->input->post('mphone');
							$parent['nid']=$this->input->post('mnid');
							$parent['profession']=$this->input->post('mprofession');
							$parent['income']=$this->input->post('mincome');
							$relation='mother';
							$this->ParentModel->updateParent($parent,$pid,$relation);
							
							
							$parent['parentname']=$this->input->post('lname');
							$parent['parentemail']=$this->input->post('lemail');
							$parent['parentphone']=$this->input->post('lphone');
							$parent['nid']=$this->input->post('lnid');
							$parent['profession']=$this->input->post('lprofession');
							$parent['income']=0;
							$relation='guardian';
							$this->ParentModel->updateParent($parent,$pid,$relation);
							
							$this->session->set_flashdata('message', 'Parent information updated');
							redirect(base_url()."Parents/addparent");
						}
					}
				}
				else{
					$totalparent=$this->ParentModel->getTotalParent();
					$totalparent+=1;
					$data['id']=date('Y').'-'.str_pad($totalparent, 5, "0",STR_PAD_LEFT);
					if(!$this->input->post('buttonSubmit')){
						$data['message']='';
						$data['parents']=$this->ParentModel->getParentByType('father');
						$this->parser->parse('Parents/View_ParentAdd',$data);
					}
					else{
						if($this->input->post('buttonSubmit')=='Add & Next'){
							$studentparent['sid']=$this->session->userdata('sid');
							$studentparent['pid']=$this->input->post('pid');
							$this->session->set_userdata('pid',$studentparent['pid']);
							$this->ParentModel->addstudenteparent($studentparent);
							$this->session->set_flashdata('message', 'Parent information saved.Please fillup adresses form');
							redirect(base_url()."Parents/addaddress");
						}
						else if($this->input->post('buttonSubmit')=='Save & Next'){
							if(!$this->form_validation->run('parentadd')){
								$data['message']=validation_errors();
								//$data['parents']=$this->ParentModel->getFathers();
								$this->parser->parse('Parents/View_ParentAdd',$data);
							}
							else{
								$pid=$this->input->post('pid');
								$ppassword=$this->randomPassword();
								$studentparent['sid']=$this->session->userdata('sid');
								$studentparent['pid']=$pid;
								$this->ParentModel->addStudentParent($studentparent,$pid,$ppassword);
								
								$parent['pid']=$pid;
								$parent['parentname']=$this->input->post('fname');
								$parent['parentemail']=$this->input->post('femail');
								$parent['parentphone']=$this->input->post('fphone');
								$parent['nid']=$this->input->post('fnid');
								$parent['profession']=$this->input->post('fprofession');
								$parent['income']=$this->input->post('fincome');
								$parent['relation']='father';
								$this->ParentModel->addParent($parent);
								
								$parent['pid']=$pid;
								$parent['parentname']=$this->input->post('mname');
								$parent['parentemail']=$this->input->post('memail');
								$parent['parentphone']=$this->input->post('mphone');
								$parent['nid']=$this->input->post('mnid');
								$parent['profession']=$this->input->post('mprofession');
								$parent['income']=$this->input->post('mincome');
								$parent['relation']='mother';
								$this->ParentModel->addParent($parent);
								
								$parent['pid']=$pid;
								$parent['parentname']=$this->input->post('lname');
								$parent['parentemail']=$this->input->post('lemail');
								$parent['parentphone']=$this->input->post('lphone');
								$parent['nid']=$this->input->post('lnid');
								$parent['profession']=$this->input->post('lprofession');
								$parent['income']=0;
								$parent['relation']='guardian';
								$this->ParentModel->addParent($parent);
								
								$this->session->set_userdata('pid',$pid);
								$this->session->set_flashdata('message', 'Parent information saved.Please fillup adresses form');
								redirect(base_url()."Parents/addaddress");
							}
						}
					}
				}
			}
			else{
				$this->session->set_flashdata('message', 'Please fillup student information');
				redirect(base_url()."Student/addstudent");
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function edit($pid)
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['id']=$pid;	
			$data['father']=$this->ParentModel->getParentById($pid,'father');
			$data['mother']=$this->ParentModel->getParentById($pid,'mother');
			$data['guardian']=$this->ParentModel->getParentById($pid,'guardian');
			if(!$this->input->post('buttonSubmit')){
				$data['message']='';
				$this->parser->parse('Parents/View_ParentEdit',$data);
			}
			else{
				if(!$this->form_validation->run('editparentadd')){
					$data['message']=validation_errors();
					$this->parser->parse('Parents/View_ParentEdit',$data);
				}
				else{
					
					$pid=$this->input->post('pid');
					$parent['parentname']=$this->input->post('fname');
					$parent['parentemail']=$this->input->post('femail');
					$parent['parentphone']=$this->input->post('fphone');
					$parent['nid']=$this->input->post('fnid');
					$parent['profession']=$this->input->post('fprofession');
					$parent['income']=$this->input->post('fincome');
					$relation='father';
					$this->ParentModel->updateParent($parent,$pid,$relation);
					
					
					$parent['parentname']=$this->input->post('mname');
					$parent['parentemail']=$this->input->post('memail');
					$parent['parentphone']=$this->input->post('mphone');
					$parent['nid']=$this->input->post('mnid');
					$parent['profession']=$this->input->post('mprofession');
					$parent['income']=$this->input->post('mincome');
					$relation='mother';
					$this->ParentModel->updateParent($parent,$pid,$relation);
					
					
					$parent['parentname']=$this->input->post('lname');
					$parent['parentemail']=$this->input->post('lemail');
					$parent['parentphone']=$this->input->post('lphone');
					$parent['nid']=$this->input->post('lnid');
					$parent['profession']=$this->input->post('lprofession');
					$parent['income']=0;
					$relation='guardian';
					$this->ParentModel->updateParent($parent,$pid,$relation);
					
					$this->session->set_flashdata('message', 'Parent information updated');
					redirect(base_url()."Parents/");
				}
					
				
				
			}
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function details($pid){
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['student']=$this->ParentModel->getStudentByParent($pid);
			$data['father']=$this->ParentModel->getParentById($pid,'father');
			$data['mother']=$this->ParentModel->getParentById($pid,'mother');
			$data['guardian']=$this->ParentModel->getParentById($pid,'guardian');
			$data['address']=$this->ParentModel->getAddress($pid);
			
			$this->parser->parse('Parents/View_ParentDetails',$data);
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function addaddress()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			if($this->session->userdata('pid')){
				$pid=$this->session->userdata('pid');
				if($this->ParentModel->getAddress($pid)){
					$this->session->set_userdata('add','address');
				}
				if($this->session->userdata('add')){
					$data['address']=$this->ParentModel->getAddress($pid);
					
					if(!$this->input->post('buttonSubmit')){
						$data['message']='';
						$this->parser->parse('Parents/View_AddressAdd',$data);
					}
					else{
						if(!$this->form_validation->run('addressadd')){
							$data['message']=validation_errors();
							$this->parser->parse('Parents/View_AddressAdd',$data);
						}
						else{
							
							$address['present']=$this->input->post('address');
							$address['permanent']=$this->input->post('paddress');
							$address['guardian']=$this->input->post('gaddress');
							$this->ParentModel->updateStudentAddress($address,$pid);
							
							$this->session->set_flashdata('message', 'Adresses updated');
							redirect(base_url()."Student/finishadmission");
						}
					}

				}
				else{
					if(!$this->input->post('buttonSubmit')){
						$data['message']='';
						$this->parser->parse('Parents/View_AddressAdd',$data);
					}
					else{
						if(!$this->form_validation->run('addressadd')){
							$data['message']=validation_errors();
							$this->parser->parse('Parents/View_AddressAdd',$data);
						}
						else{
							$address['pid']=$this->session->userdata('pid');
							$address['present']=$this->input->post('address');
							$address['permanent']=$this->input->post('paddress');
							$address['guardian']=$this->input->post('gaddress');
							$this->ParentModel->addStudentAddress($address);
							
							$this->session->set_userdata('add','address');
							$this->session->set_flashdata('message', 'Addresses Add Successfully.Now check & finishup');
							redirect(base_url()."Student/finishadmission");
						}
					}

				}
				
			}
			else{
				$this->session->set_flashdata('message', 'Please fillup parent information');
				redirect(base_url()."Parents/addparent");
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function editaddress($pid)
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
				
			$data['address']=$this->ParentModel->getAddress($pid);
			
			if(!$this->input->post('buttonSubmit')){
				$data['message']='';
				$this->parser->parse('Parents/View_AddressEdit',$data);
			}
			else{
				if(!$this->form_validation->run('addressadd')){
					$data['message']=validation_errors();
					$this->parser->parse('Parents/View_AddressEdit',$data);
				}
				else{
					
					$address['present']=$this->input->post('address');
					$address['permanent']=$this->input->post('paddress');
					$address['guardian']=$this->input->post('gaddress');
					$this->ParentModel->updateStudentAddress($address,$pid);
					
					$this->session->set_flashdata('message', 'Adresses updated');
					redirect(base_url()."Parents");
				}
			}

				
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
	
	
	
	
	
	public function geteparent($pid=''){
		if($data['father']=$this->ParentModel->getParentById($pid,'father')){
			$data['mother']=$this->ParentModel->getParentById($pid,'mother');
			$data['guardian']=$this->ParentModel->getParentById($pid,'guardian');
			$data['pid']=$pid;
			$this->load->view("Parents/View_EparentAdd",$data);
		}
		
	}
	
	public function getparentbytype($type='')
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			if($type=='all'){
				$data['parents']=$this->ParentModel->getAllparents();
			}
			else{
				$data['parents']=$this->ParentModel->getparentbytype($type);
			}
			$this->parser->parse('Parents/View_SearchedParents',$data);
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function search($value='')
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['parents']=$this->ParentModel->search($value);
			$this->parser->parse('Parents/View_SearchedParents',$data);
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function getparentbystudent($sid='')
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['parents']=$this->ParentModel->getParentByStudent($sid);
			$this->parser->parse('Parents/View_SearchedParents',$data);
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
}