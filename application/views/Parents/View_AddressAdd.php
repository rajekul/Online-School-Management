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
						<li ><a href="<?php echo base_url();?>Parents/addparent">Parent's Info</a></li>
						<li class="active"><a href="<?php echo base_url();?>Parents/addaddress">Address</a></li>
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
						<div class="row">
							<div class="col-sm-12"  style="background-color:#f2f2f2">
								<h2>ADDRESS</h2>
							</div>
						</div><br/>
						
					<form method="post" enctype="multipart/form-data" onsubmit="validation()">
						
						<div class="row">
							<div class="col-sm-10" >
								<table class="table">
									<tr>
										<td>Present<span style="color:red">*</span></td>
										<td>
											<textarea rows="4" cols="20" id="address" name="address" class="form-control"  onclick="hide('addressErr')" placeholder="Present Address"><?php if($this->session->userdata('add')){ echo $address['present'];}else{ echo set_value('address');} ?></textarea>
											<span id="addressErr" style="color:red"></span>
										</td>
									</tr>
									<tr>
										<td>Permanent<span style="color:red">*</span></td>
										<td>
											<textarea rows="4" cols="20" id="paddress" name="paddress" class="form-control"  onclick="requiredfield('address','addressErr'),hide('paddressErr')" placeholder="Permanent Address"><?php if($this->session->userdata('add')){ echo $address['permanent'];}else{ echo set_value('paddress');}  ?></textarea>
											<span id="paddressErr" style="color:red"></span>
										</td>
									</tr>
									<tr>
										<td>Guardian<span style="color:red">*</span></td>
										<td>
											<textarea rows="4" cols="20" id="gaddress" name="gaddress" class="form-control"  onclick="requiredfield('paddress','paddressErr'),hide('gaddressErr')" placeholder="Local Guardian Address"><?php if($this->session->userdata('add')){ echo $address['guardian'];}else{ echo set_value('gaddress'); } ?></textarea>
											<span id="gaddressErr" style="color:red"></span>
										</td>
									</tr>
								</table>	
									
							</div>
						</div><br/>
						
						
						<div class="row">
							<div class="col-sm-9" >
								
							</div>
							<div class="col-sm-2" >
								<input type="submit"  class="btn btn-primary" name="buttonSubmit" value="Save & Next" />
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
				</div><br/><br/><br/>
			</div>
		</div>
	</div>
	</body>
</html>	