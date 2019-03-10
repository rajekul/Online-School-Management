<!DOCTYPE html>
<html>
	<head>
		<title>Employee</title>
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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Designation</h2>
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
				
				<div class="col-sm-4">
				</div>
				<div class="col-sm-2">
					<a  data-toggle="modal" data-target="#add" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-plus-sign"></span> Add Designation</a>	
				</div>
				
			</div>
			<div class="row">
				<div id="add" class="modal fade" role="dialog">
				  <div class="modal-dialog modal-sm">
					<div class="modal-content">
					  <div class="modal-header">
						<br/>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add Designation</h4>
					  </div>
					  <div class="modal-body">
						<form method="post" onsubmit="return requiredfield('designation','designationErr')">
							
							Designation:<input type="text" id="designation" name="designation" class="form-control" value="<?php echo set_value('designation'); ?>" placeholder="teacher" onclick="hide('designationErr')"/>
							<span id="designationErr" style="color:red"></span><br/>
							<input type="submit" name="buttonSubmit" value="Add Designation" class="btn btn-primary" />
						</form><br/>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  </div>
					</div>
				  </div>
				</div>	
				
				
				<div class="col-sm-6" >
					<h3>Designations</h3>
					<table class="table table-bordered">
						<thead>
							<tr style="background-color:#33bbff">
								<th>ID</th>
								<th>Designation</th>
								<th>Action</th>
							</tr>
						</thead>
						{designations}
							<tr>
								<td>{designationid}</td>
								<td>{designation}</td>
								<td><a href="<?php echo base_url(); ?>Employee/editdesignation/{designationid}">Edit</a></td>
							</tr>
						{/designations}
					</table>
				</div>
				
			</div><br/><br/>
		</div>
		
	</div>
	</body>
</html>	