<!DOCTYPE html>
<html>
	<head>
		<title>Parent</title>
		
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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Parent Details</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			
			<div id="printableArea"> 
				<div class="row">
					<div class="col-sm-10"  style="box-shadow:4px 4px 4px #d9d9d9;border:1px solid lightgray">
						<div class="row">
							<div class="col-sm-12"  style="background-color:#f2f2f2">
								<h2>Student</h2>
							</div>
						</div><br/>
						
						<div class="row">
							<div class="col-sm-12" >
								<table class="table table-bordered">
									<tr style="background-color:lightblue">
										<td>Id</td>
										<td>Name</td>
										<td>Class</td>
										<td>Section</td>
									</tr>
									{student}
									<tr>
										<td>{sid}</td>
										<td>{studentname}</td>
										<td>{classname}</td>
										<td>{alphaname}</td>
										<!--<td ><a class="text-info" href="<?php echo base_url(); ?>Student/details/{sid}">Details</a></td>-->
									</tr>
									{/student}
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
					<div class="col-sm-8">
					
					</div>
					<div class="col-sm-1">
						<a href="<?php echo base_url().'Parents'?>" class="btn btn-info" role="button"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>&nbsp&nbsp
					</div>
					<div class="col-sm-1">
						<input type="button" onclick="printDiv('printableArea')" class="btn btn-default" value="Print" />
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