<!DOCTYPE html>
<html>
	<head>
		<title>Student</title>
		
		<script type='text/javascript' src="<?php echo base_url(); ?>js/formvalidation.js"></script>
		<script type='text/javascript' src="<?php echo base_url(); ?>js/studentform.js"></script>
	
		<?php 
			$usertype=$this->session->userdata('usertype');
			if($usertype=='Admin'){
				$this->load->view('Shared/Admin_Layout');
			}
			else if($usertype=='Register'){
				$this->load->view('Shared/Register_Layout');
			}
		?>
			<div class="row">	
                <div class="col-lg-12">
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Admit Student</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			
			
			
			<div class="row">
				
				<div class="col-sm-10" >
					<ul class="nav nav-tabs">
						<li class="active"><a href="<?php echo base_url();?>Student/addstudent">Student Info</a></li>
						<li><a href="<?php echo base_url();?>Parents/addparent">Parent's Info</a></li>
						<li><a href="<?php echo base_url();?>Parents/addaddress">Address</a></li>
						<li><a href="<?php echo base_url();?>Student/finishadmission">Finish</a></li>
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
			
			<div class="row" style="padding-left:15px;" >
				
				<div class="col-sm-9" style="box-shadow:4px 4px 4px #d9d9d9;border:1px solid lightgray;">
					<div class="row">
						<div class="col-sm-12"  style="background-color:lightgray">
							<h3><span class="glyphicon glyphicon-plus-sign"></span> Admission Form</h3>
						</div>
					</div><br/>
					
				<form method="post" enctype="multipart/form-data" onsubmit="return validation()">
					<strong>Academic Details</strong><br/><br/> 
					<div class="row">
						<div class="col-sm-8" >
							<table class="table" >
								<tr>
									<td>Student ID<span style="color:red">*</span></td>
									<td>
										<input type="text" id="sid" name="sid" class="form-control" value="<?php echo set_value('sid'); if(set_value('sid')==''){ echo $id;} ?>"  onclick="hide('sidErr')" placeholder=" Student Id"/>
										<span id="sidErr" style="color:red"></span>
									</td>
								</tr>
								<tr>
									<td>Name<span style="color:red">*</span></td>
									<td>
										<input type="text" id="sname" name="sname" class="form-control" value="<?php if($this->session->userdata('sid')){echo $studentinfo['studentname'];} else{ echo set_value('sname');} ?>" onclick="idValidation('sid','sidErr',/[0-9]{2}-[0-9]{5}$/),hide('snameErr')"   placeholder=" Student Name"/>
										<span id="snameErr" style="color:red"></span>
									</td>
								</tr>
								<tr>
									<td>Class<span style="color:red">*</span></td>
									<td>
										<select id="classid" name="classid" onchange="Request(this.value)" class="form-control" onclick="nameValidation('sname','snameErr'),hide('classidErr')">
											<option value="">Select class</option>
											<?php
												$select='';
												foreach($classes as $classes){
													if($this->session->userdata('sid') && $studentinfo['classid']==$classes['classid']){ $select='selected="selected"';}
													else{ $select='set_select("classid",'.$classes['classid'].')'; }
													echo '<option value="'.$classes['classid'].'"'.$select.' >'.$classes['classname'].'</option>';
												}
											?>
										</select>
										<span id="classidErr" style="color:red"></span>
									</td>
								</tr>
								<tr>
									<td>Section<span style="color:red">*</span></td>
										<td>
											<span id="sec">
											<select id="secid" name="secid" class="form-control" onclick="requiredfield('classid','classidErr'),hide('secidErr')">
												<?php
													if($this->session->userdata('sid')){echo '<option value="'.$studentinfo['secid'].'">'.$studentinfo['alphaname'].'</option>';}
													else if($this->session->userdata('secid')){echo '<option value="'.$this->session->userdata('secid').'">'.$this->session->userdata('secid').'</option>';}
													else{ echo '<option value="">Select Section</option>'; }
												?>	
											</select>
											</span>
											<span id="secidErr" style="color:red"></span>
										</td>
								</tr>
							</table>
							
						</div>
						<div class="col-sm-4" >
							<input type="hidden" name="pic" value="<?php if($this->session->userdata('sid')){echo $studentinfo['photo'];} ?>"/>
							<img id="simg" src="<?php echo base_url(); if($this->session->userdata('sid')){echo 'files/photos/'.$studentinfo['photo'];}else{ echo 'files/logo/user.png';}?>" width="180" height="170" style="border:1px solid gray"/>
							<br>
							<input type="file" id="sphoto" name="sphoto" class="form-control" value="" style="background-color:lightgray" onclick="requiredfield('secid','secidErr')"> 
							<br>
							<script>
								$('#sphoto').change( function(event) {
									$("#simg").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
								});	
							</script>
						</div>
					</div><br/>
					
					<strong>Personal Details</strong><br/><br/>
					<div class="row">
						<div class="col-sm-8" >
							<table class="table">
								<tr>
									<td>DOB<span style="color:red">*</span></td>
									<td>
										<input type="text" id="dob" name="dob"  class="form-control" value="<?php if($this->session->userdata('sid')){echo $studentinfo['dob'];} else{ echo set_value('dob');} ?>" onclick="requiredfield('secid','secidErr'),hide('dobErr')" placeholder="Format(yyyy-mm-dd)"/>
										<span id="dobErr" style="color:red"></span>
									</td>
								</tr>
								<tr>
									<td>Email</td>
									<td>
										<input type="text" id="semail" name="semail" class="form-control" value="<?php if($this->session->userdata('sid')){echo $studentinfo['studentemail'];} else{ echo set_value('semail');} ?>" onclick="dobValidation('dob','dobErr'),hide('semailErr')" placeholder="someone@email.com"/>
										<span id="semailErr" style="color:red"></span>
									</td>
								</tr>
								<tr>
									<td>Phone</td>
									<td>
										<input type="text" id="sphone" name="sphone" class="form-control" value="<?php if($this->session->userdata('sid')){echo $studentinfo['studentphone'];} else{ echo set_value('sphone');} ?>" onclick="emailValidation('semail','semailErr'),hide('sphoneErr')" placeholder=" Contact Number"/>
										<span id="sphoneErr" style="color:red"></span>
									</td>
								</tr>
								<tr>
									<td>Nationality<span style="color:red">*</span></td>
									<td>
										<input type="text" id="nationality" name="nationality" class="form-control" value="<?php if($this->session->userdata('sid')){echo $studentinfo['nationality'];} else{ echo set_value('nationality');} ?>" onclick="phoneValidation('sphone','sphoneErr'),hide('nationalityErr')" placeholder="Nationality"/>
										<span id="nationalityErr" style="color:red"></span>
									</td>
								</tr>
								
							</table>	
						</div>
						<div class="col-sm-4" >
							<table class="table">
								<tr>
									<td>Gender<span style="color:red">*</span></td>
									<td>
										<input type="radio" id="gender" name="gender" onclick="requiredfield('nationality','nationalityErr'),hide('genderErr')" value="Male" <?php  if($this->session->userdata('sid') && $studentinfo['gender']=='Male'){echo 'checked';} else{ echo set_radio('gender', 'Male');} ?>/> Male
										<input type="radio" id="gender" name="gender" onclick="requiredfield('nationality','nationalityErr'),hide('genderErr')" value="Female" <?php  if($this->session->userdata('sid') && $studentinfo['gender']=='Female'){echo 'checked';} else{ echo set_radio('gender', 'Female');} ?>/> Female
									</td>
								</tr>
								<tr>
									<td colspan="2"><span id="genderErr" style="color:red"></span></td>
								</tr>
								
								<tr>
									<td>Blood</td>
									<td>
										<select id="blood" name="blood" class="form-control" onclick="genderValidation(),hide('bloodErr')">
											<option value="">Blood</option>
											<option value="O+" <?php  if($this->session->userdata('sid') && $studentinfo['blood']=='O+'){echo 'selected="selected"';} else{ echo set_select('blood', 'O+');} ?>>O+</option>
											<option value="O-" <?php  if($this->session->userdata('sid') && $studentinfo['blood']=='O-'){echo 'selected="selected"';} else{ echo set_select('blood', 'O-');} ?>>O-</option>
											<option value="A+" <?php  if($this->session->userdata('sid') && $studentinfo['blood']=='A+'){echo 'selected="selected"';} else{ echo set_select('blood', 'A+');} ?>>A+</option>
											<option value="A-" <?php  if($this->session->userdata('sid') && $studentinfo['blood']=='A-'){echo 'selected="selected"';} else{ echo set_select('blood', 'A-');}?>>A-</option>
											<option value="B+" <?php  if($this->session->userdata('sid') && $studentinfo['blood']=='B+'){echo 'selected="selected"';} else{ echo set_select('blood', 'B+');} ?>>B+</option>
											<option value="B-" <?php  if($this->session->userdata('sid') && $studentinfo['blood']=='B-'){echo 'selected="selected"';} else{ echo set_select('blood', 'B-');}?>>B-</option>
											<option value="AB+" <?php if($this->session->userdata('sid') && $studentinfo['blood']=='AB+'){echo 'selected="selected"';} else{ echo set_select('blood', 'AB+');} ?>>AB+</option>
											<option value="AB-" <?php  if($this->session->userdata('sid') && $studentinfo['blood']=='AB-'){echo 'selected="selected"';} else{ echo set_select('blood', 'AB-');} ?>>AB-</option>
										</select>
									</td>
								</tr>
								<tr>
									<td colspan="2"><span id="bloodErr" style="color:red"></span></td>
								</tr>
								<tr>
									<td>Religion<span style="color:red">*</span></td>
									<td>
										<select id="religion" name="religion" class="form-control" onclick="requiredfield('blood','bloodErr'),hide('religionErr')">
											<option value="">Religion</option>
											<option value="Islam" <?php  if($this->session->userdata('sid') && $studentinfo['religion']=='Islam'){echo 'selected="selected"';} else{echo set_select('religion', 'Islam');} ?>>Islam</option>
											<option value="Hindu" <?php  if($this->session->userdata('sid') && $studentinfo['religion']=='Hindu'){echo 'selected="selected"';} else{ echo set_select('religion', 'Hindu');}?>>Hindu</option>
										</select>
									</td>
								</tr>
								<tr>
									<td colspan="2"><span id="religionErr" style="color:red"></span></td>
								</tr>
							</table>	
						</div>
					</div><br/>
					
					<div class="row">
						<div class="col-sm-9" >
							
						</div>
						<div class="col-sm-2" >
							<input type="submit"  class="btn btn-primary" name="buttonSubmit" value="<?php if($this->session->userdata('sid')){ echo 'Update'; } else{ echo 'Save & Next';} ?>" />
						</div>
					</div><br/>
				</form>
				</div>
				<div class="col-sm-3" >
					<?php 
						if($this->session->userdata('sid')){
							echo '<div class="alert alert-success">
									<strong><span class="glyphicon glyphicon-ok-sign"></span> Student_Information</strong>
								</div>';
						}
						else{
							echo '<div class="alert alert-warning">
									<strong><span class="glyphicon glyphicon-info-sign"></span> Student_Information</strong>
								</div>';
						}
						if($this->session->userdata('pid')){
							echo '<div class="alert alert-success">
									<strong><span class="glyphicon glyphicon-ok-sign"></span> Parent_Information</strong>
								</div>';
						}
						else{
							echo '<div class="alert alert-warning">
									<strong><span class="glyphicon glyphicon-info-sign"></span> Parent_Information</strong>
								</div>';
						}
						if($this->session->userdata('add')){
							echo '<div class="alert alert-success">
									<strong><span class="glyphicon glyphicon-ok-sign"></span> Address</strong>
								</div>';
						}
						else{
							echo '<div class="alert alert-warning">
									<strong><span class="glyphicon glyphicon-info-sign"></span> Address</strong>
								</div>';
						}
					?>
				</div>
			</div><br/><br/>
		</div>
	
	<script>
		function Request(value) {
			
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("sec").innerHTML = xmlhttp.responseText;
				}
			};
			xmlhttp.open("GET", "<?php echo base_url(); ?>Classes/getavailsec/"+value, true); //true=Asynchronous Request
			xmlhttp.send(); 
		}
	</script>
	</body>
</html>	