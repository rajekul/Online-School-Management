<!DOCTYPE html>
<html>
	<head>
		<title>Exam</title>
		
		<?php 
			$usertype=$this->session->userdata('usertype');
			if($usertype=='Admin'){
				$this->load->view('Shared/Admin_Layout');
			}
			else if($usertype=='Register'){
				$this->load->view('Shared/Register_Layout');
			}
			else if($usertype=='Teacher'){
				$this->load->view('Shared/Teacher_Layout');
			}
		?>
			<div class="row">	
                <div class="col-lg-12">
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Exam Marks [Class : <?php echo $class['classname']; ?>]</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			
			
			
			<div class="row">
				
				<div class="col-sm-12" >
					<ul class="nav nav-tabs">
					<?php
						if($usertype!='Teacher'){
							foreach($sections as $sec){
							
								if($section['secid']==$sec['secid']){
									$tab='active';
								}
								else{
									$tab='';
								}
								echo '<li class="'.$tab.'"><a href="'.base_url().'Exam/managemarks/'.$class['classid'].'/'.$sec['secid'].'">Section '.$sec['alphaname'].'</a></li>';
							}
						}
					
					?>
					</ul>
				</div>
			</div><br/>
			
			<div class="row">
				
				<div class="col-sm-5" >
					<?php 
						if($message!=''){
							echo '<div class="alert alert-danger alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
							<strong>Errors!</strong>'.$message.'</div>';
						}
					?>
				</div>
				
			</div>
			<?php
				if($usertype=='Teacher'){
					echo '
					<div class="row">
				
						<form action="'.base_url().'Exam/studentmarks/" method="post">	
				
						<div align="right" class="col-sm-1" >
							<h4>Exam:</h4>
						</div>
						<div class="col-sm-3" >
					
							<select class="form-control"  name="examid">';
							foreach($terms as $term){
								echo '<option value="'.$term['examid'].'">'.$term['term'].' ('.$term['examname'].')</option>';
							}
							
							
					echo'</select>
						</div>
						
						
						<div class="col-sm-2" >
							<input type="hidden"  name="subjectcode"  value="'.$subject['subjectcode'].'"/>
							<input type="hidden"  name="secid"  value="'.$section['secid'].'"/>
							<input type="hidden"  name="classid"  value="'.$class['classid'].'"/>
							<input type="submit" name="buttonSubmit"   value="Manage Marks" class="btn btn-primary"/>
							</form>
						</div>
						
					</div><br/>';
				}
				else{
					echo '
					<div class="row">
				
						<form action="'.base_url().'Exam/studentmarks/" method="post">	
				
						<div align="right" class="col-sm-1" >
							<h4>Exam:</h4>
						</div>
						<div class="col-sm-3" >
					
							<select class="form-control"  name="examid">';
							foreach($terms as $term){
								echo '<option value="'.$term['examid'].'">'.$term['term'].' ('.$term['examname'].')</option>';
							}
							
							
					echo'</select>
						</div>
						<div align="right" class="col-sm-1">
							<h4>Subject:</h4>
						</div>
						<div class="col-sm-3">
							
							<select name="subjectcode"  class="form-control" >';
							foreach($subjects as $subject){
								echo '<option value="'.$subject['subjectcode'].'">'.$subject['subjectname'].'</option>';
							}	
					echo '</select>
						</div>
						<div class="col-sm-2" >
							<input type="hidden"  name="secid"  value="'.$section['secid'].'"/>
							<input type="hidden"  name="classid"  value="'.$class['classid'].'"/>
							<input type="submit" name="buttonSubmit"   value="Manage Marks" class="btn btn-primary"/>
							</form>
						</div>
						
					</div><br/>';
				}
			?>
			
			
			<div class="row">
				<div class="col-sm-1">
				</div>
				
					<?php
						if($students){
							echo '<div class="col-sm-10" align="center" style="background-color:lightgray">
							<h2>Exam Marks</h2>
							<h4>
							Term:'.$exam['term'].' | 
							Term:'.$exam['examname'].' |
							Marks:'.$exam['exammark'].' <br/>
							Class : '.$class['classname'].' | 
							Section : '.$section['alphaname'].'  <br/>
							Subject : '.$subject['subjectname'].'
							</h4>
							</div>	
							';
						}
					
					?>
				
				
			</div>
			<div class="row">
			<div class="col-sm-1">
			</div>
				
					<?php
						if($students){
							echo '<div class="col-sm-10" style="background-color:lightgray">
							<form method="post" action="'.base_url().'Exam/updatemarks">
							<table class="table table-bordered" style="background-color:white">
								<tr style="background-color:lightblue">
									<th>Id</th>
									<th>Name</th>
									<th>Mark Obtain</th>
								</tr>
								
							';
							foreach($students as $student){
								echo '
									<tr>
										<td>'.$student['sid'].'</td>
										<td>'.$student['studentname'].'</td>
										<td><input type="text" name="'.$student['sid'].'" class="form-control" value="'.$student['mark'].'"/> </td>
									</tr>
									
								';
							}
							echo '
									<tr>
										<td align="right" colspan="3">
											<input type="hidden" name="classid" value="'. $class['classid'].'"/>
											<input type="hidden" name="secid" value="'.$section['secid'].'"/>
											<input type="hidden" name="s'.$student['sid'].'" value="'.$student['serial'].'"/>
											<input type="submit" name="buttonSubmit" value="Save Changes" class="btn btn-primary" />
										</td>
									</tr>
								</table>
								</form>
							</div>
							
							';
						}
						
					
					?>
					
						
						
						
				
				
			</div><br/>
			
		</div>
	<script>
			
		
		function markvalidation(){
				var ln=document.getElementById('stuno').value;
				var mark=true;
				for(var i=0;i<ln;i++){
					var num=document.getElementById(i).value;
					if(!IsNumber(num)){
						mark=false;
						break;
					}
					
				}
				if(mark==true){
					return true;
				}
				else{
					alert('Invalid mark Input');
					return false;
				}
			}
	</script>
	</body>
</html>	