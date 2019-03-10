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
						<li ><a href="<?php echo base_url();?>Accounting/monthlyfees">Monthly Fees</a></li>
						<li class="active"><a href="<?php echo base_url();?>Accounting/admissionfees">Admission Fees</a></li>
					</ul>
				</div>
			</div><br/>
				
				<div class="row">
					<div  >
						<div id="addfee" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
								  <div class="modal-header">
									<br/>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h3 class="modal-title">Admission Fee</h3>
								  </div>
								  <div class="modal-body">
									<form method="post"   onsubmit="return validation();">
											<table class="table">
												<tr>
													<td>Title(Fee Detail)</td>
													<td>
														<input type="text" id="title" name="title" class="form-control" value="<?php echo set_value('title'); ?>"  onclick="hide('titleErr')" placeholder="Fee details"/>
														<span id="titleErr" style="color:red"></span>
													</td>
												</tr>
												<tr>
													<td>Apply For(type)</td>
													<td>
														<select id="type" name="type" class="form-control" onclick="requiredfield('title','titleErr'),hide('typeErr')">
															<option value="">Select type</option>
															<option value="all" <?php  echo set_select('type', 'all');?>>All Student</option>
															<option value="new" <?php  echo set_select('type', 'new');?>>New Student</option>
															<option value="old" <?php  echo set_select('type', 'old');?>>Old Student</option>
														</select>
														<span id="typeErr" style="color:red"></span>
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
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addfee"><span class="glyphicon glyphicon-plus-sign"></span> Add Admission Fee</button>	
					</div>
					
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
				
				<div class="col-sm-6" id="examsbysession" >
					<h3>Admission Fees</h3>
					<table class="table table-bordered">
						<thead>
							<tr style="background-color:#33bbff">
								<th>Title</th>
								<th>Apply For</th>
								<th>Amount</th>
								<th colspan="2">Action</th>
							</tr>
						</thead>
						{fees}
							<tr>
								<td>{title}</td>
								<td>{type} Student</td>
								<td>{amount}</td>
								<td><a  data-toggle="modal" data-target="#{serial}edit">Edit</a></td>
								<td><a style="color:red" data-toggle="modal" data-target="#{serial}delete">Delete</a></td>
								
							</tr>
							
							<div id="{serial}edit" class="modal fade" role="dialog">
							  <div class="modal-dialog modal-sm">
								<div class="modal-content">
								  <div class="modal-header">
									<br/>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Update Admission Fees</h4>
								  </div>
								  <div class="modal-body">
									<form action="<?php echo base_url(); ?>accounting/editadmissionfees" method="post" onsubmit="return evalidation()">
										<input type="hidden"  name="serial" class="form-control" value="{serial}">
										Apply For: {type} Student<br/><br/>
										title:<input type="text" id="etitle" name="etitle" class="form-control" value="{title}" onclick="hide('etitleErr')" />
											<span id="etitleErr" style="color:red"></span><br/>
										Amount: <input type="text" id="eamount" name="eamount" class="form-control" value="{amount}" onclick="hide('eamountErr')" />
											<span id="eamountErr" style="color:red"></span>
										<br/><input type="submit" name="buttonSubmit" value="Edit Fee" class="btn btn-primary" /></td>
										
									</form>

								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								  </div>
								</div>
							  </div>
							</div>
							
							<div id="{serial}delete" class="modal fade" role="dialog">
							  <div class="modal-dialog modal-sm">
								<div class="modal-content">
								  <div class="modal-header">
									<br/>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Delete Fees</h4>
								  </div>
								  <div class="modal-body">
									<form action="<?php echo base_url(); ?>accounting/deleteadmissionfees" method="post" >
										<span style="color:red">
										Are You Sure to Delete {title} fee !!!
										</span>
										<input type="hidden"  name="serial" class="form-control" value="{serial}">
										<br/><br/>
										<input type="submit" name="buttonSubmit" value="Confirm" class="btn btn-primary" />
									</form>
									<button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
								  </div>
								</div>
							  </div>
							</div>
						{/fees}
					</table>
				</div>
			</div><br/>
			
		</div>
		
	</body>
	<script>
		function validation(){
			var title=requiredfield('title','titleErr');
			var type=requiredfield('type','typeErr');
			var amount=requiredfield('amount','amountErr');
			if(title==true && type==true && amount==true){
				return true;
			}
			else{
				return false;
			}
		}
		function evalidation(){
			var title=requiredfield('etitle','etitleErr');
			var amount=requiredfield('eamount','eamountErr');
			if(title==true  && amount==true){
				return true;
			}
			else{
				return false;
			}
		}
		
	</script>
</html>	