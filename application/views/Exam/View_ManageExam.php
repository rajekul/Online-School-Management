<!DOCTYPE html>
<html>
	<head>
		<title>Exam</title>
		
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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Exam</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			
			
			
				
				
			<div class="row">
				
				<div class="col-sm-10" >
					<ul class="nav nav-tabs">
						<li><a href="<?php echo base_url();?>Exam/">Exam List</a></li>
						<li class="active"><a href="<?php echo base_url();?>Exam/manageexam">Add Exam</a></li>
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
				<br/>
			</div>
			<div class="row">
				<div class="col-sm-3" >
					<div id="createterm" class="modal fade" role="dialog">
				  <div class="modal-dialog modal-sm">
					<div class="modal-content">
					  <div class="modal-header">
						<br/>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title">Create New Term</h3>
					  </div>
					  <div class="modal-body">
							<form method="post" action="<?php echo base_url();?>exam/createterm"  onsubmit="return convalidation('contribution','contributionErr')">
								<table class="table">
									<tr>
										<td>Term Name</td>
										<td>
											<input type="text" id="term" name="term" class="form-control" value="<?php echo set_value('term'); ?>"  onclick="hide('termErr')" placeholder="1st term"/>
											<span id="termErr" style="color:red"></span>
										</td>
									</tr>
									<tr>
										<td>Contribution%</td>
										<td>
											<input type="text" id="contribution" name="contribution" class="form-control" value="<?php echo set_value('contribution'); ?>" onclick="requiredfield('term','termErr'),hide('contributionErr')"   placeholder="40/60"/>
											<span id="contributionErr" style="color:red"></span>
										</td>
									</tr>
									<tr>
										<td></td>
										<td><input type="submit" name="buttonSubmit" value="Create Term" class="btn btn-primary" /></td>
									</tr>
								</table>
							</form>
					  </div>
					  
					</div>
				  </div>
				</div>	
				</div>
				<div class="col-sm-4" >
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createterm"><span class="glyphicon glyphicon-plus-sign"></span> Create New Term</button>	
				</div>
			</div>
			<div class="row">
				
				<div class="col-sm-5" >
					<h3 >Create Exam</h3>
					<form method="post"  onsubmit="return convalidation('con','conErr')">
					<table class="table">
						<tr>
							<td>Term</td>
							<td>
								<select id="termid" name="termid" class="form-control" onclick="hide('termidErr')">
									<option value="">Select Term</option>
									<?php
									foreach($terms as $terms){
										echo '<option value="'.$terms['termid'].'" '.set_select('termid',$terms['termid'] ).'>'.$terms['term'].'</option>';
									}
									?>
								</select>
								<span id="termidErr" style="color:red"></span>
							</td>
						</tr>
						<tr>
							<td>Exam name</td>
							<td>
								<input type="text" id="exam" name="exam" class="form-control" value="<?php echo set_value('exam'); ?>"  onclick="requiredfield('termid','termidErr'),hide('examErr')" placeholder="monthly/term"/>
								<span id="examErr" style="color:red"></span>
							</td>
						</tr>
						<tr>
							<td>Exam Mark</td>
							<td>
								<input type="text" id="mark" name="mark" class="form-control" value="<?php echo set_value('mark'); ?>" onclick="requiredfield('exam','examErr'),hide('markErr')"   placeholder="100"/>
								<span id="markErr" style="color:red"></span>
							</td>
						</tr>
						<tr>
							<td>Contribution%</td>
							<td>
								<input type="text" id="con" name="con" class="form-control" value="<?php echo set_value('con'); ?>" onclick="convalidation('mark','markErr'),hide('conErr')"   placeholder="40/60"/>
								<span id="conErr" style="color:red"></span>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="buttonSubmit" value="Create Exam" class="btn btn-primary" /></td>
						</tr>
					</table>
					</form>
				</div>
			</div><br/>
			
		</div>
		<script>
			function convalidation(field,err){
				if(requiredfield(field,err)){
					var num=document.getElementById(field).value;
					if(IsNumber(num)){
						return true;
					}
					else{
						errmsg(err,field+' Should contain Numeric value');
						return false;
					}
				}
				else{
					return false;
				}
			}
		</script>
	</body>
</html>	