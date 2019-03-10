<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Classes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ClassModel');
		$this->load->model('EmployeeModel');
		$this->load->model('AcademicModel');
	}

	public function index()
	{
		
		redirect(base_url().'User/error');
		
	}
	
	public function manageclass()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			if(!$this->input->post('buttonSubmit')){
				$data['classes']=$this->ClassModel->getAllclass();
				$data['message']='';
				$this->parser->parse('Class/View_Class',$data);
			}
			else{
				if(!$this->form_validation->run('addclass')){
					$data['classes']=$this->ClassModel->getAllclass();
					$data['message']=validation_errors();
					$this->parser->parse('Class/View_Class',$data);
				}
				else{
					$class['classname']=$this->input->post('classname');
					$this->ClassModel->addclass($class);
					$classes=$this->ClassModel->getAllclass();
					$this->session->set_userdata('classes',$classes);
					$this->session->set_flashdata('message', 'Successfully Added Class'.$classname);
					redirect(base_url()."Classes/manageclass");
				}
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function editclass($classid="")
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			if($classid==""){
				redirect(base_url().'Classes/manageclass');
			}
			else{
				$data['class']=$this->ClassModel->getclass($classid);
			}
			if(!$this->input->post('buttonSubmit')){
				
				$data['message']='';
				$this->parser->parse('Class/View_ClassEdit',$data);
			}
			else{
				if(!$this->form_validation->run('editclass')){
					$data['message']=validation_errors();
					$this->parser->parse('Class/View_ClassEdit',$data);
				}
				else{
					$classid=$this->input->post('classid');
					$class['classname']=$this->input->post('classname');
					$this->ClassModel->editclass($classid,$class);
					$this->session->set_flashdata('message', 'Edit Successfull');
					redirect(base_url()."Classes/manageclass");
				}
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function classdetails($classid="")
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			if($classid==""){
				redirect(base_url().'Classes/manageclass');
			}
			else{
				$data['class']=$this->ClassModel->getclass($classid);
				$data['totalstudent']=$this->ClassModel->gettotalstudent($classid);
				$data['totalsection']=$this->ClassModel->gettotalsection($classid);
				$this->parser->parse('Class/View_ClassDetails',$data);
			}
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function deleteclass($classid="")
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			if($classid==""){
				redirect(base_url().'Classes/manageclass');
			}
			else{
				$data['class']=$this->ClassModel->getclass($classid);
				$data['totalstudent']=$this->ClassModel->gettotalstudent($classid);
				$data['totalsection']=$this->ClassModel->gettotalsection($classid);
			}
			if(!$this->input->post('buttonSubmit')){
				
				$data['message']='';
				$this->parser->parse('Class/View_ClassDelete',$data);
			}
			else{
				
				$classid=$this->input->post('classid');
				$this->ClassModel->deleteclass($classid);
				$classes=$this->ClassModel->getAllclass();
				$this->session->set_userdata('classes',$classes);
				$this->session->set_flashdata('message', 'Delete Successfull');
				redirect(base_url()."Classes/manageclass");
				
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function managesec($classid="")
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			if($classid==""){
				redirect(base_url().'Classes/manageclass');
			}
			$data['class']=$this->ClassModel->getclass($classid);
			$data['sections']=$this->ClassModel->getsecbyclass($classid);
			if(!$this->input->post('buttonSubmit')){
				$data['message']='';
				$this->parser->parse('Class/View_Section',$data);
			}
			else{
				if(!$this->form_validation->run('addsec')){
					
					$data['message']=validation_errors();
					$this->parser->parse('Class/View_Section',$data);
				}
				else{
					$classid=$this->input->post('classid');
					$section['alphaname']=$this->input->post('alphaname');
					$section['nickname']=$this->input->post('name');
					$section['limit']=$this->input->post('limit');
					$section['classid']=$classid;
					if(!$this->ClassModel->secValid($section['classid'],$section['alphaname'])){
						$this->ClassModel->addsec($section);
						$this->session->set_flashdata('message', 'Successfully Added.');
						redirect(base_url()."Classes/managesec/".$classid);
					}
					else{
						$data['class']=$this->ClassModel->getclass($classid);
						$data['sections']=$this->ClassModel->getsecbyclass($classid);
						$data['message']='Section '.$section['alphaname'].' is already added for this class';
						$this->parser->parse('Class/View_Section',$data);
					}
					
				}
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function editsec($secid="")
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			if(!$this->input->post('buttonSubmit')){
				$data['section']=$this->ClassModel->getsec($secid);
				$data['class']=$this->ClassModel->getclass($data['section']['classid']);
				$data['message']='';
				$this->parser->parse('Class/View_SectionEdit',$data);
			}
			else{
				$secid=$this->input->post('secid');
				$data['section']=$this->ClassModel->getsec($secid);
				$data['class']=$this->ClassModel->getclass($data['section']['classid']);
				if(!$this->form_validation->run('editsec')){
					
					$data['message']=validation_errors();
					$this->parser->parse('Class/View_SectionEdit',$data);
				}
				else{
					$section['alphaname']=$this->input->post('alphaname');
					$section['nickname']=$this->input->post('name');
					$section['limit']=$this->input->post('limit');
					$this->ClassModel->editsec($secid,$section);
					$this->session->set_flashdata('message', 'Section Edit Done');
					redirect(base_url()."Classes/managesec/".$data['class']['classid']);
				}
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function deletesec($secid="")
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			if(!$this->input->post('buttonSubmit')){
				$data['section']=$this->ClassModel->getsec($secid);
				$data['totalstudent']=$this->ClassModel->getsecstudent($secid);
				$data['class']=$this->ClassModel->getclass($data['section']['classid']);
				$data['message']='';
				$this->parser->parse('Class/View_SectionDelete',$data);
			}
			else{
				$secid=$this->input->post('secid');
				$data['section']=$this->ClassModel->getsec($secid);
				$this->ClassModel->deleteSec($secid);
				$this->session->set_flashdata('message', 'Section Deleted');
				redirect(base_url()."Classes/managesec/".$data['section']['classid']);
			
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function secdetails($secid="")
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['section']=$this->ClassModel->getsec($secid);
			$data['totalstudent']=$this->ClassModel->getsecstudent($secid);
			$data['class']=$this->ClassModel->getclass($data['section']['classid']);
			$data['message']='';
			$this->parser->parse('Class/View_SectionDetails',$data);
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	
	public function classteacher(){
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['employees']=$this->EmployeeModel->getAll();
			$data['message']='';
			$data['classteachers']=$this->ClassModel->getAllClassTeacher(); 
			$this->parser->parse('Class/View_ClassTeacher',$data);
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function addclassteacher(){
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['classes']=$this->ClassModel->getAllclass();
			$data['employees']=$this->EmployeeModel->getAll();
			if(!$this->input->post('buttonSubmit')){
				$data['message']='';
				$this->parser->parse('class/view_classteacheradd',$data);
			}
			else{
				if(!$this->form_validation->run('addclassteacher')){
					$data['message']=validation_errors();
					$this->parser->parse('class/view_classteacheradd',$data);
				}
				else{
					$classteacher['secid']=$this->input->post('secid');
					$classteacher['classid']=$this->input->post('classid');
					$classteacher['eid']=$this->input->post('eid');
					$this->ClassModel->addclassteacher($classteacher);
					$this->session->set_flashdata('message', 'Class teacher added');
					redirect(base_url()."Classes/classteacher");
				}
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function editclassteacher(){
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['employees']=$this->EmployeeModel->getAll();
			$data['classteachers']=$this->ClassModel->getAllclassteacher(); 
			if(!$this->form_validation->run('editclassteacher')){
				$data['message']=validation_errors();
				$this->parser->parse('class/view_classteacher',$data);
			}
			else{
				$secid=$this->input->post('secid');
				$classteacher['eid']=$this->input->post('eid');
				$this->ClassModel->editclassteacher($classteacher,$secid);
				$this->session->set_flashdata('message', 'Class teacher Changed');
				redirect(base_url()."Classes/classteacher");
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function deleteclassteacher()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$secid=$this->input->post('secid');	
			$this->ClassModel->deleteclassteacher($secid);
			$this->session->set_flashdata('message', 'Successfully Deleted');
			redirect(base_url()."Classes/classteacher");
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function syllebus()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register' ){
			$data['message']='';
			$data['sessions']=$this->AcademicModel->getAllSession();
			$session=$this->session->userdata('currentsessionid');
			$data['syllebus']=$this->ClassModel->getSyllebus($session);
			$this->parser->parse('Class/View_Syllebus',$data);
		}
		else if($usertype=='Teacher'){
			$session=$this->session->userdata('currentsessionid');
			$data['syllebus']=$this->ClassModel->getSyllebus($session);
			$this->parser->parse('Class/View_SyllebusToTeacher',$data);
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	
	public function addsyllebus()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['classes']=$this->ClassModel->getAllClass();
			if(!$this->input->post('buttonSubmit')){
				$data['message']='';
				$this->parser->parse('Class/View_SyllebusAdd',$data);
			}
			else{
				if(!$this->form_validation->run('syllebus')){
					$data['message']=validation_errors();
					$this->parser->parse('Class/View_SyllebusAdd',$data);
				}
				else{
					global $filename;
					$syllebus['date']=date('Y-m-d');
					$syllebus['title']=$this->input->post('title');
					$syllebus['syllebus']=$filename;
					$syllebus['classid']=$this->input->post('classid');
					$syllebus['session']=$this->session->userdata('currentsessionid');
					$this->ClassModel->addSyllebus($syllebus);
					$this->session->set_flashdata('message', 'Syllebus Uploded');
					redirect(base_url()."Classes/syllebus");
				}
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function editsyllebus()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			
			if(!$this->form_validation->run('editsyllebus')){
				$data['message']=validation_errors();
				$data['sessions']=$this->AcademicModel->getAllsession();
				$session=$this->session->userdata('currentsessionid');
				$data['syllebus']=$this->ClassModel->getsyllebus($session);
				$this->parser->parse('Class/View_Syllebus',$data);
			}
			else{
				global $filename;
				$serial=$this->input->post('serial');
				$syllebus['syllebus']=$filename;
				$deletesyllebus=$this->input->post('syllebus');
				$file = "../school/files/docs/".$deletesyllebus;
				unlink($file);
				$this->ClassModel->editsyllebus($syllebus,$serial);
				$this->session->set_flashdata('message', 'Syllebus Updated');
				redirect(base_url()."Classes/syllebus");
			}
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function deletesyllebus()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$serial=$this->input->post('serial');	
			$syllebus=$this->input->post('syllebus');
			$file = "../school/files/docs/".$syllebus;
			if (!unlink($file))
			{
				$data['message']='Error deleting $file';
				$data['sessions']=$this->AcademicModel->getAllSession();
				$session=$this->session->userdata('currentsessionid');
				$data['syllebus']=$this->ClassModel->getsyllebus($session);
				$this->parser->parse('Class/View_Syllebus',$data);
			}
			else
			{
				$this->ClassModel->deletesyllebus($serial);
				$this->session->set_flashdata('message', 'Syllebus Deleted');
				redirect(base_url()."Classes/syllebus");
			}
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function syllebusbysession($session='')
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			
			$data['syllebus']=$this->ClassModel->getsyllebus($session);
			$this->parser->parse('Class/View_PreSyllebus',$data);
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	//.....................................................................................
	//............................................................
	
	
	
	
	
	
	
	
	//ajax request....................
	
	
	public function getsecbyclass($classid='')
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register' || $usertype=='teacher'){
			$str='';
			$sections=$this->ClassModel->getsecbyclass($classid);
			foreach($sections as $section){
				$str.= '
					<option value="'.$section['secid'].'" '.set_select('secid', $section['secid']).'>'.$section['alphaname'].'</option>
				';
			}
			echo '
				<select id="secid"   name="secid" class="form-control" >
					<option value="">Select Section</option>
					'.$str.'
				</select>	
			';
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function getavailsec($classid='')
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register' || $usertype=='teacher'){
			$str='';
			$sections=$this->ClassModel->getsecbyclass($classid);
			
			foreach($sections as $section){
				$student=$this->ClassModel->getStudentNo($section['secid']);
				if($section['limit']>$student){
					$str.= '
						<option value="'.$section['secid'].'" '.set_select('secid', $section['secid']).'>'.$section['alphaname'].'</option>
					';
				}
				else{
					$str.= '
						<option value="'.$section['secid'].'" '.set_select('secid', $section['secid']).' disabled>'.$section['alphaname'].'(No Seat Available)</option>
					';
				}
				
			}
			echo '
				<select id="secid"   name="secid" class="form-control" >
					<option value="">Select Section</option>
					'.$str.'
				</select>	
			';
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	
	
	
	
	
	
	//fileupload//////////////////
	function fileUpload(){
		global $filename;
		if($_FILES['fileup']['name']==""){
			$this->form_validation->set_message('fileUpload', 'Photo Required');
			return false;
		}
		else{
			$extent=explode(".",$_FILES['fileup']['name']);
			$filename=$this->input->post('classid').'('.$this->session->userdata('currentsessionid').").".$extent[1];
			$file = $_FILES["fileup"]["tmp_name"];
			$newloc = "../school/files/docs/$filename";
			move_uploaded_file($file, $newloc);
			return true;
		}
		
		
	}
	
}