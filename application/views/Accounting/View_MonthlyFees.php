<!DOCTYPE html>
<html>
	<head>
		<title>Student Fees</title>
		
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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Fees</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="row">
				<div class="col-sm-10" >
					<ul class="nav nav-tabs">
						<li ><a href="<?php echo base_url();?>Accounting/fees">All Fees</a></li>
						<li class="active"><a href="<?php echo base_url();?>Accounting/monthlyfees">Monthly Fees</a></li>
						<li><a href="<?php echo base_url();?>Accounting/admissionfees">Admission Fees</a></li>
					</ul>
				</div>
			</div><br/>
				
			<div class="row">
				<div  >
					<div id="addfee" class="modal fade" role="dialog">
						<div class="modal-dialog modal-sm">
							<div class="modal-content">
							  <div class="modal-header">
								<br/>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h3 class="modal-title">Add Monthly Fee</h3>
							  </div>
							  <div class="modal-body">
								<form method="post"   onsubmit="return validation();">
										<table class="table">
											<tr>
												<td>Class</td>
												<td>
													<select id="classid" name="classid" class="form-control" onclick="hide('classidErr')">
														<option value="">Select class</option>
													<?php
														foreach($classes as $classes){
															echo '<option value="'.$classes['classid'].'" '.set_select('classid', $classes['classid']).'>'.$classes['classname'].'</option>';
														}
													?>
													</select>
													<span id="classidErr" style="color:red"></span>
												</td>
											</tr>
											
											<tr>
												<td>Amount</td>
												<td>
													<input type="text" id="amount" name="amount" class="form-control" value="<?php echo set_value('amount'); ?>" onclick="hide('amountErr')" />
													<span id="amountErr" style="color:red"></span>
												</td>
											</tr>
											
											<tr>
												<td></td>
												<td><input type="submit" name="buttonSubmit" value="Add Fee" class="btn btn-primary" /></td>
											</tr>
										</table>
									</form>

							  </div>
							  
							</div>
						</div>
					</div>
						
				</div>
				<div class="col-sm-2" >
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addfee"><span class="glyphicon glyphicon-plus-sign"></span> Add Monthly Fee</button>	
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
				
				<div class="col-sm-8" id="examsbysession" >
					<h3>Monthly Fees</h3>
					<table class="table table-bordered">
						<thead>
							<tr style="background-color:#33bbff">
								<th>Class</th>
								<th>Amount</th>
								<th>Action</th>
								<th>Add Fee</th>
							</tr>
						</thead>
						{fees}
							<tr>
								<td>{classname}</td>
								<td>{amount}</td>
								<td><a  data-toggle="modal" data-target="#{classid}edit">Edit</a></td>
								<td><a  href="<?php echo base_url(); ?>accounting/addmonthlyfees/{classid}" class="btn btn-info" role="button">Add class {classname} <?php echo date('F', mktime(0, 0, 0, date('m'), 10)); ?> Month Fee </a></td>
							</tr>
							
							<div id="{classid}edit" class="modal fade" role="dialog">
							  <div class="modal-dialog modal-sm">
								<div class="modal-content">
								  <div class="modal-header">
									<br/>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Update {classname} Monthly Fees</h4>
								  </div>
								  <div class="modal-body">
									<form action="<?php echo base_url(); ?>accounting/editmonthlyfee" method="post" onsubmit="return requiredfield('eamount','eamountErr')">
										<input type="hidden"  name="classid" class="form-control" value="{classid}">
										Class: {classname}<br/><br/>
										
										Amount: <input type="text" id="eamount" name="eamount" class="form-control" value="{amount}" onclick="hide('eamountErr')" />
											<span id="eamountErr" style="color:red"></span>
										<br/><br/><input type="submit" name="buttonSubmit" value="Edit Fee" class="btn btn-primary" /></td>
										
									</form>

								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								  </div>
								</div>
							  </div>
							</div>
							
							
						{/fees}
					</table>
				</div>
			</div>
			
			<div class="row">
				
				<div class="col-sm-6" >
					<a  href="<?php echo base_url(); ?>Accounting/addmonthlyfees/all" class="btn btn-warning" role="button">Add All class <?php echo date('F', mktime(0, 0, 0, date('m'), 10)); ?> Month Fee </a>
				</div>
			</div><br/>
			
		</div>
		
	</body>
	<script>
		function validation(){
			var classid=requiredfield('classid','classidErr');
			var amount=requiredfield('amount','amountErr');
			if(classid==true && amount==true){
				return true;
			}
			else{
				return false;
			}
		}
		
	</script>
</html>	