<!DOCTYPE html>
<html>
	<head>
		<title>Subjects</title>
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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Subjects</h2>
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
					<div class="col-sm-4" >
						<div id="addsubject" class="modal fade" role="dialog">
					  <div class="modal-dialog modal-sm">
						<div class="modal-content">
						  <div class="modal-header">
							<br/>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h3 class="modal-title">Add New Subject</h3>
						  </div>
						  <div class="modal-body">
							<form method="post" onsubmit="return requiredfield('subjectname','subjectnameErr')">
								Subject Code:<input type="text" id="subjectcode" name="subjectcode" class="form-control" value="<?php echo set_value('subjectcode'); ?>" onclick="hide('subjectcodeErr')"/>
								<span id="subjectcodeErr" style="color:red"></span><br/>
								Subject Name:<input type="text" id="subjectname" name="subjectname" class="form-control" value="<?php echo set_value('subjectname'); ?>" placeholder="ex: Bangla 1st paper" onclick="requiredfield('subjectcode','subjectcodeErr'),hide('subjectnameErr')"/>
								<span id="subjectnameErr" style="color:red"></span><br/>
								<input type="submit" name="buttonSubmit" value="Add Subject" class="btn btn-primary" />
							</form><br/>
						  </div>
						  
						</div>
					  </div>
					</div>	
					</div>
					<div class="col-sm-4" >
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addsubject"><span class="glyphicon glyphicon-plus-sign"></span> Add New Subject</button>	
					</div>
				</div>
				<div class="row">
					
					<div class="col-sm-6" >
						<h3>Subject List</h3>
						<table class="table table-bordered">
							<thead>
								<tr style="background-color:#33bbff">
									<th>Subject Code</th>
									<th>Subject Name</th>
									<th colspan="2">Action</th>
								</tr>
							</thead>
							{subjects}
								<tr>
									<td>{subjectcode}</td>
									<td>{subjectname}</td>
									<td><a href="<?php echo base_url(); ?>Subject/editsubject/{subjectcode}">Edit</a></td>
									<td><a style="color:red" href="<?php echo base_url(); ?>Subject/deletesubject/{subjectcode}">Delete</a></td>
								</tr>
							{/subjects}
						</table>
					</div>
					
				</div><br/><br/>
			</div>
		</div>
	</div>
	</body>
</html>	