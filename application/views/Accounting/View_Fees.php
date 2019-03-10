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
						<li class="active"><a href="<?php echo base_url();?>Accounting/fees">All Fees</a></li>
						<li><a href="<?php echo base_url();?>Accounting/monthlyfees">Monthly Fees</a></li>
						<li><a href="<?php echo base_url();?>Accounting/admissionfees">Admission Fees</a></li>
					</ul>
				</div>
			</div><br/>
				
			<div class="row">
				<div  >
					<div id="massfee" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header">
								<br/>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h3 class="modal-title">Add Mass Fee</h3>
							  </div>
							  <div class="modal-body">
								<form method="post"   onsubmit="return massvalidation();">
										<table class="table">
											<tr>
												<td>Class</td>
												<td>
													<select id="classid" name="classid" class="form-control" onclick="hide('classidErr')">
														<option value="">Select class</option>
														<option value="all">All</option>
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
												<td>Title(Fee Detail)</td>
												<td>
													<input type="text" id="title" name="title" class="form-control" value="<?php echo set_value('title'); ?>"  onclick="requiredfield('classid','classidErr'),hide('titleErr')" placeholder="1st term exam Fee"/>
													<span id="titleErr" style="color:red"></span>
												</td>
											</tr>
											<tr>
												<td>Type</td>
												<td>
													<select id="type" name="type" class="form-control" onclick="requiredfield('title','titleErr'),hide('typeErr')">
														<option value="">Select type</option>
														<option value="examfee" <?php  echo set_select('type', 'examfee');?>>Exam Fee</option>
														<option value="others" <?php  echo set_select('type', 'others');?>>Others</option>
													</select>
													<span id="typeErr" style="color:red"></span>
												</td>
											</tr>
											<tr>
												<td>Amount</td>
												<td>
													<input type="text" id="amount" name="amount" class="form-control" value="<?php echo set_value('amount'); ?>" onclick="requiredfield('type','typeErr'),hide('amountErr')" />
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
					
					<div id="singlefee" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header">
								<br/>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h3 class="modal-title">Add Single Fee</h3>
							  </div>
							  <div class="modal-body">
									<form method="post" action="<?php echo base_url(); ?>accounting/addsinglefee" onsubmit="return singlevalidation()">
										<table class="table">
											<tr>
												<td>StudentID</td>
												<td>
													<input type="text" id="sid" name="sid" class="form-control" value="<?php echo set_value('sid'); ?>"  onclick="hide('sidErr')" placeholder="Enter Student ID"/>
													<span id="sidErr" style="color:red"></span>
												</td>
											</tr>
											<tr>
												<td>Title(Fee Detail)</td>
												<td>
													<input type="text" id="stitle" name="stitle" class="form-control" value="<?php echo set_value('stitle'); ?>"  onclick="requiredfield('sid','sidErr'),hide('stitleErr')" placeholder="1st term exam Fee"/>
													<span id="stitleErr" style="color:red"></span>
												</td>
											</tr>
											
											<tr>
												<td>Amount</td>
												<td>
													<input type="text" id="samount" name="samount" class="form-control" value="<?php echo set_value('samount'); ?>" onclick="requiredfield('stitle','stitleErr'),hide('samountErr')" />
													<span id="samountErr" style="color:red"></span>
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
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#massfee"><span class="glyphicon glyphicon-plus-sign"></span> Add Mass Fee</button>	
				</div>
				
				<div class="col-sm-2" >
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#singlefee"><span class="glyphicon glyphicon-plus-sign"></span> Add Single Fee</button>	
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
				<div class="col-sm-6" >
					
				</div>
				
				<div class="col-sm-3" >
					<select  class="form-control">
						<?php
							for($i=1;$i<=12;$i++){
								if($i==date('m')){ $select='selected="selected"';}
								else{ $select='';}
								echo '<option value="'.$i.'" '.$select.'>'.date('F', mktime(0, 0, 0, $i, 10)).'</option><br/>';
							}
						?>
					</select>	
				</div>
				
			</div>
			
			<div class="row">
				
				<div class="col-sm-10" id="examsbysession" >
					<h3>All Fees</h3>
					<table class="table table-bordered">
						<thead>
							<tr style="background-color:#33bbff">
								<th>Title</th>
								<th>Fee Type</th>
								<th>Amount</th>
								<th>Class</th>
								<th colspan="2">Action</th>
							</tr>
						</thead>
						{fees}
							<tr>
								<td>{title}</td>
								<td>{type}</td>
								<td>{amount}</td>
								<td>{classname}</td>
								<td><a  data-toggle="modal" data-target="#{feeid}edit">Edit</a></td>
								<td><a style="color:red" data-toggle="modal" data-target="#{feeid}delete">Delete</a></td>
							</tr>
							
							<div id="{feeid}edit" class="modal fade" role="dialog">
							  <div class="modal-dialog">
								<div class="modal-content">
								  <div class="modal-header">
									<br/>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Update Fees</h4>
								  </div>
								  <div class="modal-body">
									<form action="<?php echo base_url(); ?>accounting/editfee" method="post" onsubmit="return editfee()">
										<input type="hidden"  name="feeid" class="form-control" value="{feeid}">
										Class: {classname}<br/><br/>
										Type: {type}<br/><br/>
										Title(Fee Detail): <input type="text" id="etitle" name="etitle" class="form-control" value="{title}"  onclick="hide('etitleErr')" />
										<span id="etitleErr" style="color:red"></span><br/>
										Amount: <input type="text" id="eamount" name="eamount" class="form-control" value="{amount}" onclick="requiredfield('etitle','etitleErr'),hide('eamountErr')" />
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
							
							<div id="{feeid}delete" class="modal fade" role="dialog">
							  <div class="modal-dialog modal-sm">
								<div class="modal-content">
								  <div class="modal-header">
									<br/>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Delete Fees</h4>
								  </div>
								  <div class="modal-body">
									<form action="<?php echo base_url(); ?>accounting/deletefee" method="post" >
										<span style="color:red">
										Are You Sure to Delete {title} !!!
										</span>
										<input type="hidden"  name="feeid" class="form-control" value="{feeid}">
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
		function massvalidation(){
			var classid=requiredfield('classid','classidErr');
			var title=requiredfield('title','titleErr');
			var type=requiredfield('type','typeErr');
			var amount=requiredfield('amount','amountErr');
			if(classid==true && title==true && type==true && amount==true){
				return true;
			}
			else{
				return false;
			}
		}
		function singlevalidation(){
			var sid=requiredfield('sid','sidErr');
			var stitle=requiredfield('stitle','stitleErr');
			var samount=requiredfield('samount','samountErr');
			if(sid==true && stitle==true && samount==true){
				return true;
			}
			else{
				return false;
			}
		}
		function editfee(){
			
			var etitle=requiredfield('etitle','etitleErr');
			var eamount=requiredfield('eamount','eamountErr');
			if(etitle==true && eamount==true){
				return true;
			}
			else{
				return false;
			}
		}
	</script>
</html>	