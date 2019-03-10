<!DOCTYPE html>
<html>
	<head>
		<title>Student</title>
		<script type='text/javascript' src="<?php echo base_url(); ?>js/formvalidation.js"></script>
		<script type='text/javascript' src="<?php echo base_url(); ?>js/studentedit.js"></script>
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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Update Student</h2>
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
					
					<div class="col-sm-9" style="box-shadow:4px 4px 4px #d9d9d9;border:1px solid lightgray;">
						<div class="row" >
							<div class="col-sm-12"  style="background-color:#f2f2f2">
								<h2><?php echo $studentinfo['studentname'];?>'s Information</h2>
							</div>
						</div><br/>
						
					<form method="post" enctype="multipart/form-data" onsubmit="return validation()">
						<u><strong>Academic Details</strong></u><br/><br/> 
						<div class="row">
							<div class="col-sm-8" >
								<table class="table">
									<tr>
										<td>Student ID<span style="color:red">*</span></td>
										<td>
											<input type="hidden" id="sid" name="sid" class="form-control" value="<?php echo $studentinfo['sid']; ?>"  onclick="hide('sidErr')" placeholder=" Student Id"/>
											<?php echo $studentinfo['sid']; ?>
										</td>
									</tr>
									<tr>
										<td>Name<span style="color:red">*</span></td>
										<td>
											<input type="text" id="sname" name="sname" class="form-control" value="<?php echo set_value('sname'); if(set_value('sname')==''){ echo $studentinfo['studentname'];} ?>" onclick="idValidation('sid','sidErr',/[0-9]{2}-[0-9]{5}$/),hide('snameErr')"   placeholder=" Student Name"/>
											<span id="snameErr" style="color:red"></span>
										</td>
									</tr>
									<tr>
										<td>Class<span style="color:red">*</span></td>
										<td>
											<?php echo $studentinfo['classname']; ?> <input type="hidden"  name="classid"  value="<?php echo $studentinfo['classid']; ?>"/>
										</td>
									</tr>
									<tr>
										<td>Section<span style="color:red">*</span></td>
											<td>
												<?php echo $studentinfo['alphaname']; ?>  <input type="hidden"  name="secid"  value="<?php echo $studentinfo['secid']; ?>" />
											</td>
									</tr>
								</table>
								
							</div>
							<div class="col-sm-4" >
								<input type="hidden" name="pic" value="<?php echo $studentinfo['photo']; ?>"/>
								<img id="simg" src="<?php echo base_url().'files/photos/'.$studentinfo['photo'];?>" width="180" height="170" style="border:1px solid gray"/>
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
						
						<u><strong>Personal Details</strong></u><br/><br/>
						<div class="row">
							<div class="col-sm-8" >
								<table class="table">
									<tr>
										<td>DOB<span style="color:red">*</span></td>
										<td>
											<input type="text" id="dob" name="dob"  class="form-control" value="<?php echo set_value('dob'); if(set_value('dob')==''){ echo $studentinfo['dob'];} ?>" onclick="requiredfield('secid','secidErr'),hide('dobErr')" placeholder="Format(yyyy-mm-dd)"/>
											<span id="dobErr" style="color:red"></span>
										</td>
									</tr>
									<tr>
										<td>Email</td>
										<td>
											<input type="text" id="semail" name="semail" class="form-control" value="<?php echo set_value('semail'); if(set_value('semail')==''){ echo $studentinfo['studentemail'];} ?>" onclick="dobValidation('dob','dobErr'),hide('semailErr')" placeholder="someone@email.com"/>
											<span id="semailErr" style="color:red"></span>
										</td>
									</tr>
									<tr>
										<td>Phone</td>
										<td>
											<input type="text" id="sphone" name="sphone" class="form-control" value="<?php echo set_value('sphone'); if(set_value('sphone')==''){ echo $studentinfo['studentphone'];} ?>" onclick="emailValidation('semail','semailErr'),hide('sphoneErr')" placeholder=" Contact Number"/>
											<span id="sphoneErr" style="color:red"></span>
										</td>
									</tr>
									<tr>
										<td>Nationality<span style="color:red">*</span></td>
										<td>
											<input type="text" id="nationality" name="nationality" class="form-control" value="<?php echo set_value('nationality'); if(set_value('nationality')==''){ echo $studentinfo['nationality'];} ?>" onclick="phoneValidation('sphone','sphoneErr'),hide('nationalityErr')" placeholder="Nationality"/>
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
											<input type="radio" id="gender" name="gender" onclick="requiredfield('nationality','nationalityErr'),hide('genderErr')" value="Male" <?php  if($studentinfo['gender']=='Male'){echo 'checked';} else{ echo set_radio('gender', 'Male');} ?>/> Male
											<input type="radio" id="gender" name="gender" onclick="requiredfield('nationality','nationalityErr'),hide('genderErr')" value="Female" <?php  if($studentinfo['gender']=='Female'){echo 'checked';} else{ echo set_radio('gender', 'Female');} ?>/> Female
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
												<option value="O+" <?php  if($studentinfo['blood']=='O+'){echo 'selected="selected"';} else{ echo set_select('blood', 'O+');} ?>>O+</option>
												<option value="O-" <?php  if($studentinfo['blood']=='O-'){echo 'selected="selected"';} else{ echo set_select('blood', 'O-');} ?>>O-</option>
												<option value="A+" <?php  if($studentinfo['blood']=='A+'){echo 'selected="selected"';} else{ echo set_select('blood', 'A+');} ?>>A+</option>
												<option value="A-" <?php  if($studentinfo['blood']=='A-'){echo 'selected="selected"';} else{ echo set_select('blood', 'A-');}?>>A-</option>
												<option value="B+" <?php  if($studentinfo['blood']=='B+'){echo 'selected="selected"';} else{ echo set_select('blood', 'B+');} ?>>B+</option>
												<option value="B-" <?php  if($studentinfo['blood']=='B-'){echo 'selected="selected"';} else{ echo set_select('blood', 'B-');}?>>B-</option>
												<option value="AB+" <?php if($studentinfo['blood']=='AB+'){echo 'selected="selected"';} else{ echo set_select('blood', 'AB+');} ?>>AB+</option>
												<option value="AB-" <?php  if($studentinfo['blood']=='AB-'){echo 'selected="selected"';} else{ echo set_select('blood', 'AB-');} ?>>AB-</option>
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
												<option value="Islam" <?php  if($studentinfo['religion']=='Islam'){echo 'selected="selected"';} else{echo set_select('religion', 'Islam');} ?>>Islam</option>
												<option value="Hindu" <?php  if($studentinfo['religion']=='Hindu'){echo 'selected="selected"';} else{ echo set_select('religion', 'Hindu');}?>>Hindu</option>
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
							<div class="col-sm-8" >
							</div>
							<div class="col-sm-4" >
								<a href="<?php echo base_url().'Student/information/'.$studentinfo['classid'].'/'.$studentinfo['secid'];?>" class="btn btn-info" role="button"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>&nbsp&nbsp
							
								<input type="submit"  class="btn btn-primary" name="buttonSubmit" value="Update" />
							</div>
						</div><br/>
					</form>
					</div>
					
				</div><br/><br/><br/>
			</div>
		</div>
	</div>
	</body>
</html>	