<!DOCTYPE html>
<html>
	<head>
		<title>Student</title>
		
		<script type='text/javascript' src="<?php echo base_url(); ?>js/formvalidation.js"></script>
		<script type='text/javascript' src="<?php echo base_url(); ?>js/studentform2.js"></script>
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
						<li><a href="<?php echo base_url();?>Parents/addparent">Parent's Info</a></li>
						<li><a href="<?php echo base_url();?>Parents/addaddress">Address</a></li>
						<li class="active"><a href="<?php echo base_url();?>Student/finishadmission">Finish</a></li>
					</ul>
				</div>
			</div><br/>
			
			<div id="printableArea"> 
				<div class="row">
					
					<div class="col-sm-10"  style="box-shadow:4px 4px 4px #d9d9d9;border:1px solid lightgray">
						<div class="row">
							<div class="col-sm-12"  style="background-color:#f2f2f2">
								<h2>Student Information</h2>
							</div>
						</div><br/>
						<strong>Academic Details</strong><br/><br/> 
						<div class="row">
							<div class="col-sm-8" >
								<table class="table">
									<tr>
										<td>Student ID</td>
										<td>
											: <?php echo $studentinfo['sid']; ?>
										</td>
									</tr>
									<tr>
										<td>Name</td>
										<td>
											: <?php echo $studentinfo['studentname']; ?>
										</td>
									</tr>
									<tr>
										<td>Class</td>
										<td>
											: <?php echo $studentinfo['classname']; ?>
										</td>
									</tr>
									<tr>
										<td>Section</td>
											<td>
												: <?php echo $studentinfo['alphaname']; ?>
											</td>
									</tr>
								</table>
								
							</div>
							<div class="col-sm-4" >
								<img id="simg" src="<?php echo base_url().'files/photos/'.$studentinfo['photo'];?>" width="180" height="170" style="border:1px solid gray"/>
							</div>
						</div><br/>
						
						<strong>Personal Details</strong><br/><br/>
						<div class="row">
							<div class="col-sm-8" >
								<table class="table">
									<tr>
										<td>DOB</td>
										<td>
											: <?php echo $studentinfo['dob']; ?>
										</td>
									</tr>
									<tr>
										<td>Email</td>
										<td>
											: <?php echo $studentinfo['studentemail']; ?>
										</td>
									</tr>
									<tr>
										<td>Phone</td>
										<td>
											: <?php echo $studentinfo['studentphone']; ?>
										</td>
									</tr>
									<tr>
										<td>Nationality</td>
										<td>
											: <?php echo $studentinfo['nationality']; ?>
										</td>
									</tr>
									
								</table>	
							</div>
							<div class="col-sm-4" >
								<table class="table">
									<tr>
										<td>Gender</td>
										<td>
											: <?php echo $studentinfo['gender']; ?>
										</td>
									</tr>
									
									
									<tr>
										<td>Blood</td>
										<td>
											: <?php echo $studentinfo['blood']; ?>
										</td>
									</tr>
									
									<tr>
										<td>Religion</td>
										<td>
											: <?php echo $studentinfo['religion']; ?>
										</td>
									</tr>
									
								</table>	
							</div>
						</div><br/>
					</div>
				</div><br/>
				
				<div class="row">
					<div class="col-sm-10"  style="box-shadow:4px 4px 4px #d9d9d9;border:1px solid lightgray">
						<div class="row">
							<div class="col-sm-12"  style="background-color:#f2f2f2">
								<h2>Parent Information</h2>
							</div>
						</div><br/>
						<strong>Father's Details</strong><br/><br/>
						<div class="row">
							<div class="col-sm-7" >
								<table class="table">
									<tr>
										<td>Name</td>
										<td>
											: <?php echo $father['parentname']; ?>
										</td>
									</tr>
									<tr>
										<td>Email</td>
										<td>
											: <?php echo $father['parentemail']; ?>
										</td>
									</tr>
									<tr>
										<td>Phone</td>
										<td>
											: <?php echo $father['parentphone']; ?>
										</td>
									</tr>
									<tr>
										<td>NID</td>
										<td>
											: <?php echo $father['nid']; ?>
										</td>
									</tr>
								</table>	
							</div>
							<div class="col-sm-5" >
								<table class="table">
									<tr>
										<td>Profession</td>
										<td>
											: <?php echo $father['profession']; ?>
										</td>
									</tr>
									<tr>
										<td>Annual Income</td>
										<td>: <?php echo $father['income']; ?></td>
									</tr>
									
								</table>	
							</div>
						</div><br/>
						<strong>Mother's Details</strong><br/><br/>
						<div class="row">
							<div class="col-sm-7" >
								<table class="table">
									<tr>
										<td>Name</td>
										<td>
											: <?php echo $mother['parentname']; ?>
										</td>
									</tr>
									<tr>
										<td>Email</td>
										<td>
											: <?php echo $mother['parentemail']; ?>
										</td>
									</tr>
									<tr>
										<td>Phone</td>
										<td>
											: <?php echo $mother['parentphone']; ?>
										</td>
									</tr>
									<tr>
										<td>NID</td>
										<td>
											: <?php echo $mother['nid']; ?>
										</td>
									</tr>
								</table>	
							</div>
							<div class="col-sm-5" >
								<table class="table">
									<tr>
										<td>Profession</td>
										<td>
											: <?php echo $mother['profession']; ?>
										</td>
									</tr>
									
									<tr>
										<td>Annual Income</td>
										<td>: <?php echo $mother['income']; ?></td>
									</tr>
									
								</table>	
							</div>
						</div><br/>
						<strong>LocalGuardian's Details</strong><br/><br/>
						<div class="row">
							<div class="col-sm-7" >
								<table class="table">
									<tr>
										<td>Name</td>
										<td>
											: <?php echo $guardian['parentname']; ?>
										</td>
									</tr>
									<tr>
										<td>Email</td>
										<td>
											: <?php echo $guardian['parentemail']; ?>
										</td>
									</tr>
									<tr>
										<td>Phone</td>
										<td>
											: <?php echo $guardian['parentphone']; ?>
										</td>
									</tr>
									<tr>
										<td>NID</td>
										<td>
											: <?php echo $guardian['nid']; ?>
										</td>
									</tr>
								</table>	
							</div>
							<div class="col-sm-5" >
								<table class="table">
									<tr>
										<td>Profession</td>
										<td>
											: <?php echo $guardian['profession']; ?>
										</td>
									</tr>
									
								</table>	
							</div>
						</div><br/>
					</div>
				</div><br/>
				
				<div class="row">
					<div class="col-sm-10"  style="box-shadow:4px 4px 4px #d9d9d9;border:1px solid lightgray">
						<div class="row">
							<div class="col-sm-12"  style="background-color:#f2f2f2">
								<h2>ADDRESS</h2>
							</div>
						</div><br/>
						
						<div class="row">
							<div class="col-sm-10" >
								<table class="table">
									<tr>
										<td>Present</td>
										<td>
											: <?php echo $address['present']; ?>
										</td>
									</tr>
									<tr>
										<td>Permanent</td>
										<td>
											: <?php echo $address['permanent']; ?>
										</td>
									</tr>
									<tr>
										<td>Guardian</td>
										<td>
											: <?php echo $address['guardian']; ?>
										</td>
									</tr>
								</table>	
									
							</div>
						</div><br/>
					</div>
				</div><br/>
				<div class="row">
					<div class="col-sm-10"  style="box-shadow:4px 4px 4px #d9d9d9;border:1px solid lightgray">
						<div class="row">
							<div class="col-sm-12"  style="background-color:#f2f2f2">
								<h2>Login Details</h2>
							</div>
						</div><br/>
						
						<div class="row">
							<div class="col-sm-10" >
								<strong>Student Login</strong><br/><br/>
								<table class="table">
									<tr>
										<td>Username</td>
										<td>
											: <?php echo $studentlogin['username']; ?>
										</td>
									</tr>
									<tr>
										<td>Password</td>
										<td>
											: <?php echo $studentlogin['password']; ?>
										</td>
									</tr>
								</table><br/>
								<strong>Parent Login</strong><br/><br/>
								<table class="table">
									<tr>
										<td>Username</td>
										<td>
											: <?php echo $parentlogin['username']; ?>
										</td>
									</tr>
									<tr>
										<td>Password</td>
										<td>
											: <?php echo $parentlogin['password']; ?>
										</td>
									</tr>
								</table>
								
							</div>
						</div><br/>
					</div>
				</div><br/>
				<br/>
								<span style="color:red">***Please Check All Information Before Click Finish Button.<br/>Back to Previous Tab to Update Information If Needed.</span>
			</div>	
				<div class="row">
					<div class="col-sm-7">
					
					</div><div class="col-sm-1">
						<input type="button" onclick="printDiv('printableArea')" class="btn btn-default" value="Print" />
					</div>
					<div class="col-sm-1">
						<form method="post">
							<input type="submit"  class="btn btn-primary" name="buttonSubmit" value="Finish" />
						</form>
					</div>
				</div><br/><br/><br/>
				
			</div>
		</div>
	</div>
	<script>
		function printDiv(divName) {
			 var printContents = document.getElementById(divName).innerHTML;
			 var originalContents = document.body.innerHTML;

			 document.body.innerHTML = printContents;

			 window.print();

			 document.body.innerHTML = originalContents;
		}
	</script>
	</body>
</html>	