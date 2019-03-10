<!DOCTYPE html>
<html>
	<head>
		<title>Employees</title>
		<script type='text/javascript' src="<?php echo base_url(); ?>js/formvalidation.js"></script>
		<script type='text/javascript' src="<?php echo base_url(); ?>js/employeeform.js"></script>
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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Employee</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			
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
			
				
			<div class="row">
				
				<div class="col-sm-10" style="box-shadow:4px 4px 4px #d9d9d9;border:1px solid #d9d9d9">
					<div class="row">
						<div class="col-sm-12"  style="background-color:lightgray;">
							<h3><span class="glyphicon glyphicon-plus-sign"></span> Appoint New Employee </h3>	
						</div>
					</div><br/>
					<form method="post" enctype="multipart/form-data" onsubmit="return validation()">
					
					<div class="row">
						<div class="col-sm-1" >
						</div>
						<div class="col-sm-7" >
							<table class="table">
								<tr>
									<td>EmployeeID</td>
									<td>
										<input type="text" id="eid" name="eid" class="form-control" value="<?php echo set_value('eid');if(set_value('eid')==''){ echo $id; } ?>"  onclick="hide('eidErr')" placeholder="Employee ID"/>
										<span id="eidErr" style="color:red"></span>
									</td>
								</tr>
								<tr>
									<td>Name</td>
									<td>
										<input type="text" id="name" name="name" class="form-control" value="<?php echo set_value('name'); ?>" onclick="idValidation('eid','eidErr',/[0-9]{6}-[0-9]{4}$/),hide('nameErr')"   placeholder="Employee Name"/>
										<span id="nameErr" style="color:red"></span>
									</td>
								</tr>
								<tr>
									<td>Designation</td>
									<td>
										<select id="designation" name="designation" class="form-control" onclick="nameValidation('name','nameErr'),hide('designationErr')">
											<option value="">Select Designation</option>
											<?php
											foreach($designations as $designation){
												echo '<option value="'.$designation['designation'].'" '.set_select('designation',$designation['designation'] ).'>'.$designation['designation'].'</option>';
											}
											?>
										</select>
										<span id="designationErr" style="color:red"></span>
									</td>
								</tr>
								<tr>
									<td>Gender</td>
									<td>
										<input type="radio" id="gender" name="gender" onclick="requiredfield('designation','designationErr'),hide('genderErr')" value="Male" <?php  echo set_radio('gender', 'Male');?>/> Male
										<input type="radio" id="gender" name="gender" onclick="requiredfield('designation','designationErr'),hide('genderErr')" value="Female" <?php  echo set_radio('gender', 'Female');?>/> Female
										<br/><span id="genderErr" style="color:red"></span>
									</td>
								</tr>
								<tr>
									<td>DOB</td>
									<td>
										<input type="text" id="dob" name="dob"  class="form-control" value="<?php echo set_value('dob'); ?>" onclick="genderValidation(),hide('dobErr')" placeholder="Format(yyyy-mm-dd)"/>
										<span id="dobErr" style="color:red"></span>
									</td>
								</tr>
								<tr>
									<td>Email</td>
									<td>
										<input type="text" id="email" name="email" class="form-control" value="<?php echo set_value('email'); ?>" onclick="dobValidation('dob','dobErr'),hide('emailErr')" placeholder="someone@email.com"/>
										<span id="emailErr" style="color:red"></span>
									</td>
								</tr>
								<tr>
									<td>Phone</td>
									<td>
										<input type="text" id="phone" name="phone" class="form-control" value="<?php echo set_value('phone'); ?>" onclick="requiredfield('email','emailErr'),emailValidation('email','emailErr'),hide('phoneErr')" placeholder=" Contact Number"/>
										<span id="phoneErr" style="color:red"></span>
									</td>
								</tr>
								<tr>
									<td>NID</td>
									<td>
										<input type="text" id="nid" name="nid" class="form-control" value="<?php echo set_value('nid'); ?>" onclick="requiredfield('phone','phoneErr'),phoneValidation('phone','phoneErr'),hide('nidErr')" placeholder="National ID"/>
										<span id="nidErr" style="color:red"></span>
									</td>
								</tr>
								<tr>
									<td>Qualification</td>
									<td>
										<input type="text" id="qualification" name="qualification" class="form-control" value="<?php echo set_value('qualification'); ?>" onclick="requiredfield('nid','nidErr'),hide('qualificationErr')" placeholder="qualification"/>
										<span id="qualificationErr" style="color:red"></span>
									</td>
								</tr>
							
								<tr>
									<td>AccessType</td>
									<td>
										<select id="access" name="access" class="form-control" onclick="requiredfield('qualification','qualificationErr'),hide('accessErr')">
											<option value="">Select Access</option>
											<option value="Register" <?php  echo set_select('access', 'register');?>>Register</option>
											<option value="Teacher" <?php  echo set_select('access', 'teacher');?>>Teacher</option>
											<option value="Accountant" <?php  echo set_select('access', 'accountant');?>>Accountant</option>
										</select>
										<span id="accessErr" style="color:red"></span>
									</td>
								</tr>
								<tr>
									<td></td>
									<td><input type="submit" name="buttonSubmit" value="Add Employee" class="btn btn-primary" /></td>
								</tr>
								
							</table>
						</div>
						<div class="col-sm-4" >
							<img id="img" src="<?php echo base_url(); ?>files/logo/user.png" width="180" height="170" style="border:1px solid gray"/>
							<br>
							<input type="file" id="photo" name="photo" class="form-control" value="" style="background-color:lightgray" /> 
							<br>
							<script>
								$('#photo').change( function(event) {
									$("#img").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
								});	
							</script>
						</div>
					</form>
					</div><br/>
				</div>
			</div><br/><br/><br/>
		</div>
		
	</div>
	</body>
</html>	