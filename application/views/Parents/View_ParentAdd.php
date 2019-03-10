<!DOCTYPE html>
<html>
	<head>
		<title>Student</title>
		
		<script type='text/javascript' src="<?php echo base_url(); ?>js/formvalidation.js"></script>
		<script type='text/javascript' src="<?php echo base_url(); ?>js/studentform1.js"></script>
		
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
						<li ><a href="<?php echo base_url();?>Student/addstudent">Student Info</a></li>
						<li class="active"><a href="<?php echo base_url();?>Parents/addparent">Parent's Info</a></li>
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
				
				<div class="row">
					
					<div class="col-sm-9" style="box-shadow:4px 4px 4px #d9d9d9;border:1px solid lightgray;">
						<div class="row" >
							<div class="col-sm-12" style="background-color:#f2f2f2">
								<h2>Parent Information</h2>
							</div>
						</div><br/>
						
						<div class="row <?php if($this->session->userdata('pid')){echo 'hidden'; }?>">
							
							<div class="col-sm-12">
								<u><strong>Existing Parent</strong></u><br/>
							</div>
							<div class="col-sm-5" >
								<span style="color:blue">For Existing Parent Enter Parentid</parent>	
							</div>
							<div class="col-sm-5" >
								
								<input type="text" onkeyup="Request(this.value)" class="form-control" /><br/>
								<a href="<?php echo base_url();?>Parents/addparent">Refresh <span class="glyphicon glyphicon-refresh"></span></a>
							</div>
						</div><br/>
					<form method="post" enctype="multipart/form-data" onsubmit="return validation()">
					
					<span id="eparent">	
						<strong>Father's Details</strong><br/><br/>
						<div class="row">
							<div class="col-sm-7" >
								<table class="table">
									<tr>
										<td>Name<span style="color:red">*</span></td>
										<td>
											<input type="text" id="fname" name="fname" class="form-control" value="<?php  if($this->session->userdata('pid')){echo $father['parentname'];} else{ echo set_value('fname');} ?>" onclick="hide('fnameErr')" placeholder="Father's Name"/>
											<span id="fnameErr" style="color:red"></span>
										</td>
									</tr>
									<tr>
										<td>Email</td>
										<td>
											<input type="text" id="femail" name="femail" class="form-control" value="<?php  if($this->session->userdata('pid')){echo $father['parentemail'];} else{ echo set_value('femail');} ?>" onclick="nameValidation('fname','fnameErr'),hide('femailErr')" placeholder="Father's Email"/>
											<span id="femailErr" style="color:red"></span>
										</td>
									</tr>
									<tr>
										<td>Phone<span style="color:red">*</span></td>
										<td>
											<input type="text" id="fphone" name="fphone" class="form-control" value="<?php  if($this->session->userdata('pid')){echo $father['parentphone'];} else{ echo set_value('fphone');} ?>" onclick="emailValidation('femail','femailErr'),hide('fphoneErr')" placeholder="Father's Contact Number"/>
											<span id="fphoneErr" style="color:red"></span>
										</td>
									</tr>
									<tr>
										<td>NID<span style="color:red">*</span></td>
										<td>
											<input type="text" id="fnid" name="fnid" class="form-control" value="<?php  if($this->session->userdata('pid')){echo $father['nid'];} else{ echo set_value('fnid');} ?>" onclick="requiredfield('fphone','fphoneErr'),phoneValidation('fphone','fphoneErr'),hide('fnidErr')" placeholder="Father's National ID No "/>
											<span id="fnidErr" style="color:red"></span>
										</td>
									</tr>
								</table>	
							</div>
							<div class="col-sm-5" >
								<table class="table">
									<tr>
										<td>Profession<span style="color:red">*</span></td>
										<td>
											<select id="fprofession" name="fprofession" class="form-control" onclick="requiredfield('fnid','fnidErr'),hide('fprofessionErr')">
												<option value="">Profession</option>
												<option value="Businessman" <?php  if($this->session->userdata('pid') && $father['profession']=='Businessman' ){echo 'selected="selected"' ;} else{ echo set_select('fprofession', 'Businessman');} ?>>Businessman</option>
												<option value="Employee" <?php  if($this->session->userdata('pid') && $father['profession']=='Employee' ){echo 'selected="selected"' ;} else{ echo set_select('fprofession', 'Employee');} ?>>Employee</option>
											</select>
										</td>
									</tr>
									<tr>
										<td colspan="2"><span id="fprofessionErr" style="color:red"></span></td>
									</tr>
									<tr>
										<td>Annual Income<span style="color:red">*</span></td>
										<td><input type="text" id="fincome" name="fincome" class="form-control" value="<?php  if($this->session->userdata('pid')){echo $father['income'];} else{ echo set_value('fincome');} ?>" onclick="requiredfield('fprofession','fprofessionErr'),hide('fincomeErr')" placeholder="Father's Annual Income"/></td>
									</tr>
									<tr>
										<td colspan="2"><span id="fincomeErr" style="color:red"></span></td>
									</tr>
								</table>	
							</div>
						</div><br/>
						<strong>Mother's Details</strong><br/><br/>
						<div class="row">
							<div class="col-sm-7" >
								<table class="table">
									<tr>
										<td>Name<span style="color:red">*</span></td>
										<td>
											<input type="text" id="mname" name="mname" class="form-control" value="<?php if($this->session->userdata('pid')){echo $mother['parentname'];} else{ echo set_value('mname'); } ?>" onclick="requiredfield('fincome','fincomeErr'),hide('mnameErr')" placeholder="Mother's Name"/>
											<span id="mnameErr" style="color:red"></span>
										</td>
									</tr>
									<tr>
										<td>Email</td>
										<td>
											<input type="text" id="memail" name="memail" class="form-control" value="<?php if($this->session->userdata('pid')){echo $mother['parentemail'];} else{ echo set_value('memail'); } ?>" onclick="nameValidation('mname','mnameErr'),hide('memailErr')" placeholder="Mother's Email"/>
											<span id="memailErr" style="color:red"></span>
										</td>
									</tr>
									<tr>
										<td>Phone<span style="color:red">*</span></td>
										<td>
											<input type="text" id="mphone" name="mphone" class="form-control" value="<?php  if($this->session->userdata('pid')){echo $mother['parentphone'];} else{ echo set_value('mphone');} ?>" onclick="emailValidation('memail','memailErr'),hide('mphoneErr')" placeholder="Mother's Contact Number"/>
											<span id="mphoneErr" style="color:red"></span>
										</td>
									</tr>
									<tr>
										<td>NID<span style="color:red">*</span></td>
										<td>
											<input type="text" id="mnid" name="mnid" class="form-control" value="<?php  if($this->session->userdata('pid')){echo $mother['nid'];} else{ echo set_value('mnid'); } ?>" onclick="phoneValidation('mphone','mphoneErr'),hide('mnidErr')" placeholder="Mother's National ID No"/>
											<span id="mnidErr" style="color:red"></span>
										</td>
									</tr>
								</table>	
							</div>
							<div class="col-sm-5" >
								<table class="table">
									<tr>
										<td>Profession<span style="color:red">*</span></td>
										<td>
											<select id="mprofession" name="mprofession" class="form-control" onclick="requiredfield('mnid','mnidErr'),hide('mprofessionErr')">
												<option value="">Profession</option>
												<option value="Housewife" <?php if($this->session->userdata('pid') && $mother['profession']=='Housewife' ){echo 'selected="selected"' ;} else{ echo set_select('mprofession', 'Housewife');} ?>>Housewife</option>
												<option value="Employee" <?php  if($this->session->userdata('pid') && $mother['profession']=='Employee' ){echo 'selected="selected"' ;} else{ echo set_select('mprofession', 'Employee');} ?>>Employee</option>
											</select>
										</td>
									</tr>
									<tr>
										<td colspan="2"><span id="mprofessionErr" style="color:red"></span></td>
									</tr>
									<tr>
										<td>Annual Income<span style="color:red">*</span></td>
										<td><input type="text" id="mincome" name="mincome" class="form-control" value="<?php  if($this->session->userdata('pid')){echo $mother['income'];} else{ echo set_value('mincome');} ?>" onclick="requiredfield('mprofession','mprofessionErr'),hide('mincomeErr')" placeholder="Mother's Annual Income"/></td>
									</tr>
									<tr>
										<td colspan="2"><span id="mincomeErr" style="color:red"></span></td>
									</tr>
								</table>	
							</div>
						</div><br/>
						<strong>LocalGuardian's Details</strong><br/><br/>
						<div class="row">
							<div class="col-sm-7" >
								<table class="table">
									<tr>
										<td>Name<span style="color:red">*</span></td>
										<td>
											<input type="text" id="lname" name="lname" class="form-control" value="<?php  if($this->session->userdata('pid')){echo $guardian['parentname'];} else{ echo set_value('lname'); } ?>" onclick="requiredfield('mincome','mincomeErr'),hide('lnameErr')" placeholder="Local Guardian Name"/>
											<span id="lnameErr" style="color:red"></span>
										</td>
									</tr>
									<tr>
										<td>Email</td>
										<td>
											<input type="text" id="lemail" name="lemail" class="form-control" value="<?php if($this->session->userdata('pid')){echo $guardian['parentemail'];} else{ echo set_value('lemail'); } ?>" onclick="nameValidation('lname','lnameErr'),hide('lemailErr')" placeholder="Local Guardian Email"/>
											<span id="lemailErr" style="color:red"></span>
										</td>
									</tr>
									<tr>
										<td>Phone<span style="color:red">*</span></td>
										<td>
											<input type="text" id="lphone" name="lphone" class="form-control" value="<?php if($this->session->userdata('pid')){echo $guardian['parentphone'];} else{ echo set_value('lphone'); } ?>" onclick="emailValidation('lemail','lemailErr'),hide('lphoneErr')" placeholder="Guardian Contact Number"/>
											<span id="lphoneErr" style="color:red"></span>
										</td>
									</tr>
									<tr>
										<td>NID<span style="color:red">*</span></td>
										<td>
											<input type="text" id="lnid" name="lnid" class="form-control" value="<?php if($this->session->userdata('pid')){echo $guardian['nid'];} else{ echo set_value('lnid');} ?>" onclick="phoneValidation('lphone','lphoneErr'),hide('lnidErr')" placeholder="Guardian National ID No"/>
											<span id="lnidErr" style="color:red"></span>
										</td>
									</tr>
								</table>	
							</div>
							<div class="col-sm-5" >
								<table class="table">
									<tr>
										<td>Profession<span style="color:red">*</span></td>
										<td>
											<select id="lprofession" name="lprofession" class="form-control" onclick="requiredfield('lnid','lnidErr'),hide('lprofessionErr')">
												<option value="">Profession</option>
												<option value="Businessman" <?php if($this->session->userdata('pid') && $guardian['profession']=='Businessman' ){echo 'selected="selected"' ;} else{ echo set_select('lprofession', 'Businessman');} ?>>Businessman</option>
												<option value="Employee" <?php  if($this->session->userdata('pid') && $guardian['profession']=='Employee' ){echo 'selected="selected"' ;} else{ echo set_select('lprofession', 'Employee');} ?>>Employee</option>
											</select>
										</td>
									</tr>
									<tr>
										<td colspan="2"><span id="lprofessionErr" style="color:red"></span></td>
									</tr>
								</table>	
							</div>
						</div><br/>
						<strong>Parent Details</strong><br/><br/>
						<div class="row">
							<div class="col-sm-8">
								<table class="table">
									<tr>
										<td>ParentId<span style="color:red">*</span></td>
										<td>
											<input type="text" id="pid" name="pid" class="form-control" value="<?php echo set_value('pid'); if(set_value('pid')==''){ echo $id;} ?>" onclick="hide('pidErr')" placeholder="Parent ID"/>
											<span id="pidErr" style="color:red"></span>
										</td>
									</tr>
									
								</table>
							</div>
						</div><br/>
						
						
						<div class="row">
							<div class="col-sm-9" >
								
							</div>
							<div class="col-sm-2" >
								<input type="submit"  class="btn btn-primary" name="buttonSubmit" value="<?php if($this->session->userdata('pid')){ echo 'Update'; } else{ echo 'Save & Next';} ?>" />
							</div>
						</div><br/>
						</span>
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
				</div><br/><br/><br/>
			</div>
		</div>
	</div>
	<script>
		function Request(value) {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("eparent").innerHTML = xmlhttp.responseText;
				}
			};
			xmlhttp.open("GET", "<?php echo base_url(); ?>Parents/geteparent/"+value, true); //true=Asynchronous Request
			xmlhttp.send(); 
		}
	</script>
	</body>
</html>	