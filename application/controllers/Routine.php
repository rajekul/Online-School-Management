<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Routine extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('RoutineModel');
		$this->load->model('ClassModel');
		$this->load->model('EmployeeModel');
		$this->load->model('ExamModel');
		$this->load->model('SubjectModel');
		
		
	}

	public function index()
	{
		
		redirect(base_url().'User/error');
		
	}
	
	
	public function classperiod()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			if(!$data['periods']=$this->RoutineModel->getAllPeriod()){
				$period['starttime']="9.00";
				$period['ampm']="am";
				$period['classduration']="35";
				$period['assembly']="15";
				$period['tiffin']="20";
				$period['beforetiffin']="4";
				$period['aftertiffin']="3";
				$this->RoutineModel->addClassPeriod($period);
				$this->addClassPeriod();
			}
			$this->parser->parse('Routine/View_ClassPeriod',$data);
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function addclassperiod()
	{
		$usertype=$this->session->userdata('usertype');
		global $min,$hour,$ap,$count;
		if($usertype=='Admin' || $usertype=='Register'){
			
			$this->RoutineModel->deletePeriod();
			$period=$this->RoutineModel->getClassPeriod();
			$tp=2;
			$count=0;
			$st=$period['starttime'];
			$ap=$period['ampm'];
			$cd=$period['classduration'];
			$ad=$period['assembly'];
			$td=$period['tiffin'];
			$bt=$period['beforetiffin'];
			$at=$period['aftertiffin'];
			$tp+=$period['totalperiod'];
			$time=explode(".",$st);
			$hour=$time[0];
			$min=$time[1];
			
			for($i=0;$i<$tp;$i++){
				if($i==0){
					$start=$hour.'.'.$min.$ap;
					$end=$this->periodcalculate($ad);
					$classperiod['period']=$i;
					$classperiod['periodname']='Assembly';
					$classperiod['time']=$start.'-'.$end;
					$this->RoutineModel->addPeriod($classperiod);
				}
				else if($i<($bt+1)){
					$start=$hour.'.'.$min.$ap;
					$end=$this->periodcalculate($cd);
					$pname=$i;
					if($i==1){
						$pname=$i.'st';
					}
					else if($i==2){
						$pname=$i.'nd';
					}
					else if($i==3){
						$pname=$i.'rd';
					}
					else{
						$pname=$i.'th';
					}
					$classperiod['period']=$i;
					$classperiod['periodname']=$pname.'period';
					$classperiod['time']=$start.'-'.$end;
					$this->RoutineModel->addPeriod($classperiod);
				}
				else if($i==($bt+1)){
					$start=$hour.'.'.$min.$ap;
					$end=$this->periodcalculate($td);
					$classperiod['period']=$i;
					$classperiod['periodname']='Tiffin';
					$classperiod['time']=$start.'-'.$end;
					$this->RoutineModel->addPeriod($classperiod);
				}
				
				else{
					$j=$i;
					$j-=1;
					$start=$hour.'.'.$min.$ap;
					$end=$this->periodcalculate($cd);
					$classperiod['period']=$i;
					$classperiod['periodname']=$j.'th period';
					$classperiod['time']=$start.'-'.$end;
					$this->RoutineModel->addPeriod($classperiod);
				}
			}
			$this->session->set_flashdata('message', 'Successfully Updated Class period');
			redirect(base_url()."Routine/classperiod");
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function periodcalculate($duration){
		global $min,$hour,$ap,$count;
		$min+=$duration;
		if($min>59){
			$min-=60;
			$hour+=1;
		}
		if($hour>=12){
			if($hour==13){
				$hour=1;
			}
			if($count==0){
				if($ap=='am'){
					$ap='pm';
				}
				else{
					$ap='am';
				}
				$count++;
			}	
		}
		return $end=$hour.'.'.$min.$ap;
	}
	
	public function updateclassperiod()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['period']=$this->RoutineModel->getClassPeriod();
			if(!$this->input->post('buttonSubmit')){
				$data['message']='';
				$this->parser->parse('Routine/View_ClassPeriodUpdate',$data);
			}
			else{
				if(!$this->form_validation->run('period')){
					$data['message']=validation_errors();
					$this->parser->parse('Routine/View_ClassPeriodUpdate',$data);
				}
				else{
					
					$period['starttime']=$this->input->post('stime');
					$period['ampm']=$this->input->post('ampm');
					$period['classduration']=$this->input->post('cd');
					$period['assembly']=$this->input->post('ad');
					$period['tiffin']=$this->input->post('td');
					$period['beforetiffin']=$this->input->post('bt');
					$period['aftertiffin']=$this->input->post('at');
					$this->RoutineModel->updateClassPeriod($period);
					$this->addClassPeriod();
				}
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function classroutine($classid='')
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$day=array('Sunday','Monday','Tuesday','Wednessday','Thursday','Friday','Saturday');
			$str='<div class="panel-group" id="accordion">
					<div class="panel panel-default">';
			
			$class=$this->ClassModel->getClass($classid);
			$section=$this->ClassModel->getSecByClass($classid);
			
			foreach($section as $section){
				$period=$this->RoutineModel->getAllperiod();
				$str.='<div class="panel-heading"border:1px solid white; style="background-color:#9CB770;">
							<h3 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#'.$section['secid'].'">Class:'.$class['classname'].' (Section:'.$section['alphaname'].')</a>
							</h3>
						</div>
						<div id="'.$section['secid'].'" class="panel-collapse collapse">
							<div class="panel-body" style="overflow: scroll;">
								<table class="table table-bordered table-hover" style="background-color:white">
									<tr style="background-color:#bfbfbf"><td>Day/Period</td>';
				foreach($period as $period){
					$str.='<td><b>'.
							$period['periodname'].'</b> ('.
							$period['time'].')
						</td>';
				}
				$str.='</tr><tr>';
				for($i=0;$i<count($day);$i++){
					$str.='<td><strong>'.$day[$i].'</strong></td>';
					$periods=$this->RoutineModel->getAllperiod();
					foreach($periods as $periods){
						if(!$classroutine=$this->RoutineModel->getroutine($classid,$section['secid'],$day[$i],$periods['period'])){
							$str.='
								<td></td>
							';
						}
						else{
							$str.='
							<td>
								<ul class="btn btn-default" style="list-style-type: none;">
									<li class="dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#" >'.$classroutine['subjectname'].'<span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a style="color:#0066cc" href="'.base_url().'Routine/classroutineedit/'.$classroutine['serial'].'">Change Teacher</a></li>
											<li><a style="color:red" href="'.base_url().'Routine/classroutinedelete/'.$classroutine['serial'].'/'.$classroutine['classid'].'">Delete</a></li>
										</ul>
									</li>
									</ul>
									 Teacher<a  data-toggle="modal" data-target="#'.$classroutine['eid'].'">('.$classroutine['name'].')</a>
									<div id="'.$classroutine['eid'].'" class="modal fade" role="dialog">
									  <div class="modal-dialog modal-sm">
										<div class="modal-content">
											<br/><br/>
										  <div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">'.$classroutine['name'].'</h4>
										  </div>
										  <div class="modal-body">
											<img id="img" src="'.base_url().'files/photos/'.$classroutine['photo'].'" width="180" height="170" style="border:1px solid gray"/><br/>
											<strong>'.$classroutine['name'].'</strong><br/>
											'.$classroutine['phone'].'<br/>
											'.$classroutine['email'].'<br/>
										  </div>
										  <div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										  </div>
										</div>

									  </div>
									</div>
								 </td>
							';
						}
							
					}
					$str.='</tr>';
				}
				$str.='</table></div></div>';
			}
			$data['routine']=$str;
			$this->parser->parse('Routine/View_ClassRoutine',$data);
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function classroutineadd()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['classes']=$this->ClassModel->getAllclass();
			$data['periods']=$this->RoutineModel->getAllperiod();
			$data['employees']=$this->EmployeeModel->getAll();
			if(!$data['periods']){
				$this->session->set_flashdata('message', 'Please Check Periods First');
				redirect(base_url()."Routine/classperiod");
			}
			if(!$this->input->post('buttonSubmit')){
				$data['message']='';
				$this->parser->parse('Routine/View_ClassRoutineAdd',$data);
			}
			else{
				if(!$this->form_validation->run('addclassroutine')){
					$data['message']=validation_errors();
					$this->parser->parse('Routine/View_ClassRoutineAdd',$data);
				}
				else{
					$classid=$this->input->post('classid');
					$secid=$this->input->post('section');
					$subjectcode=$this->input->post('subject');
					$eid=$this->input->post('teacher');
					$day=$this->input->post('day');
					$period=$this->input->post('period');
					$routine['day']=$day;
					$routine['period']=$period;
					$routine['classid']=$classid;
					$routine['secid']=$secid;
					$routine['subjectcode']=$subjectcode;
					$routine['eid']=$eid;
					if(!$this->RoutineModel->getperiodclash($day,$period,$classid,$secid)){
						if(!$this->RoutineModel->getsubjectclash($day,$subjectcode,$classid,$secid)){
							if(!$this->RoutineModel->getteacherclash($day,$period,$eid)){
								$this->RoutineModel->addclassroutine($routine);
								$this->session->set_flashdata('message', 'Class Routine Added Successfull. Add Another...');
								redirect(base_url()."Routine/classroutineadd");
							}
							else{
								$data['classes']=$this->ClassModel->getAllclass();
								$data['periods']=$this->RoutineModel->getAllperiod();
								$data['employees']=$this->EmployeeModel->getAll();
								$data['message']='Teacher has time clash';
								$this->parser->parse('Routine/View_ClassRoutineAdd',$data);
							}
							
						}
						else{
							$data['classes']=$this->ClassModel->getAllclass();
							$data['periods']=$this->RoutineModel->getAllperiod();
							$data['employees']=$this->EmployeeModel->getAll();
							$data['message']='Subject has Day Clash';
							$this->parser->parse('Routine/View_ClassRoutineAdd',$data);
						}
					}
					else{
						$data['classes']=$this->ClassModel->getAllclass();
						$data['periods']=$this->RoutineModel->getAllperiod();
						$data['employees']=$this->EmployeeModel->getAll();
						$data['message']='Period clash';
						$this->parser->parse('Routine/View_ClassRoutineAdd',$data);
					}
					
				}
			}
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function classroutineedit($serial='')
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['routine']=$this->RoutineModel->getRoutineBySerial($serial);
			$data['employees']=$this->EmployeeModel->getAll();
			if(!$this->input->post('buttonSubmit')){
				$data['message']='';
				$this->parser->parse('Routine/View_ClassRoutineEdit',$data);
			}
			else{
				$serial=$this->input->post('serial');
				$employee['eid']=$this->input->post('teacher');
				$eid=$employee['eid'];
				$day=$this->input->post('day');
				$period=$this->input->post('period');
				$classid=$this->input->post('classid');
				if(!$this->RoutineModel->getTeacherClash($day,$period,$eid)){
					$this->RoutineModel->updateClassRoutine($serial,$employee);
					$this->session->set_flashdata('message', 'Class Routine Updated');
					redirect(base_url()."Routine/classroutine/".$classid);
				}
				else{
					
					$data['message']='Teacher has time clash';
					$this->parser->parse('Routine/View_ClassRoutineEdit',$data);
				}
			}
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function classroutinedelete($serial='',$classid)
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$this->RoutineModel->deleteClassRoutine($serial);
			$this->session->set_flashdata('message', 'Delete Successfull');
			redirect(base_url()."Routine/classroutine/".$classid);
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	
	
	//ajax request....................
	
	public function teacherclash($eid,$day,$period)
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			if($this->RoutineModel->getTeacherClash($day,$period,$eid)){
				echo 'Clash Time of the Teacher ';
				
			}
		}
		
		else{
			redirect(base_url().'User/error');
		}
	}
	public function periodclash($day,$period,$classid,$secid)
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			if($this->RoutineModel->getPeriodClash($day,$period,$classid,$secid)){
				echo 'Clash Period';
				
			}
		}
		
		else{
			redirect(base_url().'User/error');
		}
	}
	public function subjectclash($day,$subjectcode,$classid,$secid)
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			if($this->RoutineModel->getSubjectClash($day,$subjectcode,$classid,$secid)){
				echo 'Clash Subject Day ';
				
			}
		}
		
		else{
			redirect(base_url().'User/error');
		}
	}
	
	public function getsecsubject($classid='')
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$str='';
			$sections=$this->ClassModel->getSecByClass($classid);
			$str.='<table class="table">
			<tr>
				<td>Section</td>
				<td>
				<select class="form-control" onchange="periodclash()" id="section" name="section">
					<option value="">Select Section</option>
				';
			foreach($sections as $section){
				$str.= '
					<option value="'.$section['secid'].'">'.$section['alphaname'].'</option>
				';
			}
			$str.= '
				</select>
				</td>
			</tr>
			<tr>
				<td>Subject</td>
				<td>
				<select class="form-control" onchange="subjectclash(this.value)" id="subject" name="subject">
					<option value="">Select Subject</option>
				';
			$subjects=$this->SubjectModel->getClassSubject($classid);
			foreach($subjects as $subjects){
				$subject=$this->SubjectModel->get($subjects['subjectcode']);
				$str.= '
					<option value="'.$subject['subjectcode'].'">'.$subject['subjectname'].'</option>
				';
			}
			$str.= '
				</select>
				</td>
			</tr></table>';
			echo $str;
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	//examroutine...........................................................
	
	public function examroutine($examid=''){
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$session=$this->session->userdata('currentsessionid');
			$data['terms']=$this->ExamModel->getAllTermExam($session);
			if($examid==''){
				foreach($data['terms'] as $term){
					$examid=$term['examid'];
					break;
				}
			}
			
			$data['exam']=$this->ExamModel->getExam($examid);
			$data['examroutine']=$this->ExamModel->getExamRoutine($examid);
			$data['classes']=$this->ClassModel->getAllClass();
			$this->parser->parse('Routine/View_Examroutine',$data);
		}
		else if($usertype=='Teacher'){
			$session=$this->session->userdata('currentsessionid');
			$data['terms']=$this->ExamModel->getAllTermExam($session);
			if($examid==''){
				foreach($data['terms'] as $term){
					$examid=$term['examid'];
					break;
				}
			}
			
			$data['exam']=$this->ExamModel->getExam($examid);
			$data['examroutine']=$this->ExamModel->getExamRoutine($examid);
			$data['classes']=$this->ClassModel->getAllClass();
			$this->parser->parse('Routine/View_ExamroutineToTeacher',$data);
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
	
	public function getexamroutine($examid){
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register' ){
			$session=$this->session->userdata('currentsessionid');
			$data['terms']=$this->ExamModel->getAllTermExam($session);
			
			$data['exam']=$this->ExamModel->getExam($examid);
			$data['examroutine']=$this->ExamModel->getExamRoutine($examid);
			$data['classes']=$this->ClassModel->getAllClass();
			$this->parser->parse('Routine/View_SearchedExamroutine',$data);
		}
		else if($usertype=='Teacher' ){
			$session=$this->session->userdata('currentsessionid');
			$data['terms']=$this->ExamModel->getAllTermExam($session);
			
			$data['exam']=$this->ExamModel->getExam($examid);
			$data['examroutine']=$this->ExamModel->getExamRoutine($examid);
			$data['classes']=$this->ClassModel->getAllClass();
			$this->parser->parse('Routine/View_SearchedExamroutineByTeacher',$data);
		}
		
		else{
			redirect(base_url().'User/error');
		}
	}
	
	
	
	
	
	
	public function examroutineadd(){
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$data['classes']=$this->ClassModel->getAllClass();
			$session=$this->session->userdata('currentsessionid');
			$data['terms']=$this->ExamModel->getAllTermExam($session);
			if(!$this->input->post('buttonSubmit')){
				$data['message']='';
				$this->parser->parse('Routine/View_ExamRoutineAdd',$data);
			}
			else{
				if(!$this->form_validation->run('examroutine')){
					$data['message']=validation_errors();
					$this->parser->parse('Routine/View_ExamRoutineAdd',$data);
				}
				else{
					$examroutine['date']=$this->input->post('date');
					$examroutine['time']=$this->input->post('hour').':'.$this->input->post('minute').' '.$this->input->post('ampm');
					$examroutine['examid']=$this->input->post('examid');
					$examroutine['classid']=$this->input->post('classid');
					$examroutine['subjectcode']=$this->input->post('subjectcode');
					$this->ExamModel->addExamRoutine($examroutine);
					$this->session->set_flashdata('message', 'Routine added.');
					redirect(base_url()."Routine/examroutineadd");
				}
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function editexamroutine($serial=''){
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			if(!$this->input->post('buttonSubmit')){
				$data['message']='';
				$data['examroutine']=$this->ExamModel->getroutine($serial);
				$this->parser->parse('Routine/View_ExamRoutineEdit',$data);
			}
			else{
				$examroutine['date']=$this->input->post('date');
				$examroutine['time']=$this->input->post('time');
				$serial=$this->input->post('serial');
				$this->ExamModel->editExamRoutine($examroutine,$serial);
				$this->session->set_flashdata('message', 'Routine Updated.');
				redirect(base_url()."Routine/examroutine");
			}
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function deleteexamroutine($serial=''){
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$this->ExamModel->deleteExamRoutine($serial);
			$this->session->set_flashdata('message', 'Routine Deleted.');
			redirect(base_url()."Routine/examroutine");	
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	public function getsubject($classid='')
	{
		
		$usertype=$this->session->userdata('usertype');
		if($usertype=='Admin' || $usertype=='Register'){
			$str='';
			
			$str.= '
				<select class="form-control" onchange="subjectclash(this.value)" id="subjectcode" name="subjectcode" >
					<option value="">Select Subject</option>
				';
			$subjects=$this->SubjectModel->getclasssubject($classid);
			foreach($subjects as $subjects){
				$subject=$this->SubjectModel->get($subjects['subjectcode']);
				$str.= '
					<option value="'.$subject['subjectcode'].'">'.$subject['subjectname'].'</option>
				';
			}
			$str.= '</select>';
			echo $str;
			
		}
		else{
			redirect(base_url().'User/error');
		}
	}
	
}