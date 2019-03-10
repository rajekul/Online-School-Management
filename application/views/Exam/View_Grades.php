<!DOCTYPE html>
<html>
	<head>
		<title>Exam</title>
		<script>
			function markvalidation(field,err){
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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Exam Grades</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<div class="row">
				
				<div class="col-sm-10" >
					<ul class="nav nav-tabs">
						<li class="active"><a href="<?php echo base_url();?>Exam/grades">Grade List</a></li>
						<li><a href="<?php echo base_url();?>Exam/managegrades">Add Grades</a></li>
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
				
				<div class="col-sm-7" id="examsbysession" >
					<h3>Grade List</h3>
					<table class="table table-bordered">
						<thead>
							<tr style="background-color:#33bbff">
								<th>Grade</th>
								<th>Grade Point</th>
								<th>Mark From</th>
								<th>Mark To</th>
								<th>Comment</th>
								<th colspan="2">Action</th>
							</tr>
						</thead>
						{grades}
							<tr>
								<td>{grade}</td>
								<td>{gradepoint}</td>
								<td>{marksfrom}</td>
								<td>{marksto}</td>
								<td>{comment}</td>
								<td><a  data-toggle="modal" data-target="#{serial}edit">Edit</a></td>
								<td><a style="color:red" data-toggle="modal" data-target="#{serial}delete">Delete</a></td>
							</tr>
							
							<div id="{serial}edit" class="modal fade" role="dialog">
							  <div class="modal-dialog modal-sm">
								<div class="modal-content">
								  <div class="modal-header">
									<br/>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Update Grade {grade}</h4>
								  </div>
								  <div class="modal-body">
									<form action="<?php echo base_url(); ?>Exam/editgrade" method="post">
										<input type="hidden"  name="serial" class="form-control" value="{serial}">
										
												Letter Grade
													<input type="text" id="grade" name="grade" class="form-control" value="{grade}"  onclick="hide('gradeErr')" placeholder="A+"/>
													<span id="gradeErr" style="color:red"></span>
												<br/>
												Grade Point(From)
													<input type="text" id="gradepoint" name="gradepoint" class="form-control" value="{gradepoint}"  onclick="requiredfield('grade','gradeErr'),hide('gradepointErr')" placeholder="5.00"/>
													<span id="gradepointErr" style="color:red"></span>
												<br/>
												Grade Point(To)
													<input type="text" id="gradepointto" name="gradepointto" class="form-control" value="{gradepointto}"  onclick="requiredfield('gradepoint','gradepointErr'),hide('gradepointtoErr')" placeholder="5.00"/>
													<span id="gradepointtoErr" style="color:red"></span>
												<br/>
												Marks(From)
													<input type="text" id="mf" name="mf" class="form-control" value="{marksfrom}" onclick="requiredfield('gradepointto','gradepointtoErr'),hide('mfErr')"   placeholder="80"/>
													<span id="mfErr" style="color:red"></span>
												<br/>
												Marks(TO)
													<input type="text" id="mt" name="mt" class="form-control" value="{marksto}" onclick="markvalidation('mf','mfErr'),hide('mtErr')"   placeholder="100"/>
													<span id="mtErr" style="color:red"></span>
												<br/>
												Comment<input type="text" id="comment" name="comment" class="form-control" value="{comment}" onclick="markvalidation('mt','mtErr'),hide('commentErr')"   placeholder="Exelent"/>
													<span id="commentErr" style="color:red"></span>
												<br/>
												<input type="submit" name="buttonSubmit" value="Edit Grade" class="btn btn-primary" /></td>
											
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
									<h4 class="modal-title">Delete Grade {grade}</h4>
								  </div>
								  <div class="modal-body">
									<form action="<?php echo base_url(); ?>Exam/deletegrade" method="post" >
										<span style="color:red">
										Are You Sure to Delete the Grade !!!
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
						{/grades}
					</table>
				</div>
			</div><br/>
				
		</div>
		
	</body>
</html>	