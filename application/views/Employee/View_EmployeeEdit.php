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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Edit Employee</h2>
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
				
				<div class="col-sm-10">
					<form method="post" enctype="multipart/form-data" >
					<div class="row">
						<div class="col-sm-12" >
							<h3>Update <?php echo $employee['name']; ?>'s Information</h3>	
						</div>
					</div><br/>
					<div class="row">
						
						<div class="col-sm-7" >
							<table class="table">
								<tr>
									<td>EmployeeID</td>
									<td>
										<?php echo $employee['eid']; ?>
										<input type="hidden" name="eid" value="<?php echo $employee['eid']; ?>" />
									</td>
								</tr>
								<tr>
									<td>Name</td>
									<td>
										<input type="text" id="name" name="name" class="form-control" value="<?php echo set_value('name');if(set_value('name')==''){echo $employee['name'];} ?>" onclick="hide('nameErr')"   placeholder="Employee Name"/>
										<span id="nameErr" style="color:red"></span>
									</td>
								</tr>
								<tr>
									<td>Gender</td>
									<td>
										<input type="radio" id="gender" name="gender" onclick="requiredfield('designation','designationErr'),hide('genderErr')" value="Male" <?php if($employee['gender']=='Male'){echo 'checked';}echo set_radio('gender', 'Male');?>/> Male
										<input type="radio" id="gender" name="gender" onclick="requiredfield('designation','designationErr'),hide('genderErr')" value="Female" <?php  if($employee['gender']=='Female'){echo 'checked';}echo set_radio('gender', 'Female');?>/> Female
										<br/><span id="genderErr" style="color:red"></span>
									</td>
								</tr>
								<tr>
									<td>DOB</td>
									<td>
										<input type="text" id="dob" name="dob"  class="form-control" value="<?php echo set_value('dob');if(set_value('dob')==''){echo $employee['dob'];} ?>" onclick="genderValidation(),hide('dobErr')" placeholder="Format(yyyy-mm-dd)"/>
										<span id="dobErr" style="color:red"></span>
									</td>
								</tr>
								<tr>
									<td>Email</td>
									<td>
										<input type="text" id="email" name="email" class="form-control" value="<?php echo set_value('email');if(set_value('email')==''){echo $employee['email'];} ?>" onclick="dobValidation('dob','dobErr'),hide('emailErr')" placeholder="someone@email.com"/>
										<span id="emailErr" style="color:red"></span>
									</td>
								</tr>
								<tr>
									<td>Phone</td>
									<td>
										<input type="text" id="phone" name="phone" class="form-control" value="<?php echo set_value('phone');if(set_value('phone')==''){echo $employee['phone'];} ?>" onclick="requiredfield('email','emailErr'),emailValidation('email','emailErr'),hide('phoneErr')" placeholder=" Contact Number"/>
										<span id="phoneErr" style="color:red"></span>
									</td>
								</tr>
								<tr>
									<td>NID</td>
									<td>
										<input type="text" id="nid" name="nid" class="form-control" value="<?php echo set_value('nid');if(set_value('nid')==''){echo $employee['nid'];} ?>" onclick="requiredfield('phone','phoneErr'),phoneValidation('phone','phoneErr'),hide('nidErr')" placeholder="National ID"/>
										<span id="nidErr" style="color:red"></span>
									</td>
								</tr>
								<tr>
									<td>Qualification</td>
									<td>
										<input type="text" id="qualification" name="qualification" class="form-control" value="<?php echo set_value('qualification');if(set_value('qualification')==''){echo $employee['qualification'];} ?>" onclick="requiredfield('nid','nidErr'),hide('qualificationErr')" placeholder="Qualification"/>
										<span id="qualificationErr" style="color:red"></span>
									</td>
								</tr>
								<tr>
									<td></td>
									<td><a href="<?php echo base_url(); ?>Employee/" class="btn btn-info" role="button"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>&nbsp&nbsp
									<input type="submit" name="buttonSubmit" value="Update Employee" class="btn btn-primary" /></td>
								</tr>
							</table>
						</div>
						<div class="col-sm-4" >
							<h4>Change Photo</h4>
							<img id="img" src="<?php echo base_url().'files/photos/'.$employee['photo']; ?>" width="180" height="170" style="border:1px solid gray"/>
							<input type="hidden" name="pic" value="<?php echo $employee['photo']; ?>" />
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
				<br/>
			</div>
		</div>
	</div>
	</body>
</html>	