<!DOCTYPE html>
<html>
	<head>
		<title>Class</title>
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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Class</h2>
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
				<div class="col-sm-5" >
					<div id="addclass" class="modal fade" role="dialog">
				  <div class="modal-dialog modal-sm">
					<div class="modal-content">
					  <div class="modal-header">
						<br/>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title">Add New Class</h3>
					  </div>
					  <div class="modal-body">
						<form method="post" onsubmit="return requiredfield('classname','classnameErr')">
							Class Name:<input type="text" id="classname" name="classname" class="form-control" value="<?php echo set_value('classname'); ?>" placeholder="ex: one/two" onclick="hide('classnameErr')"/>
							<span id="classnameErr" style="color:red"></span><br/>
							<input type="submit" name="buttonSubmit" value="Add Class" class="btn btn-primary" />
						</form><br/>
					  </div>
					  
					</div>
				  </div>
				</div>	
				</div>
				<div class="col-sm-4" >
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addclass"><span class="glyphicon glyphicon-plus-sign"></span> Add New Class</button>	
				</div>
			</div>
				
			<div class="row">
				
				<div class="col-sm-7" >
					<h3>Class List</h3>
					<table class="table table-bordered">
						<thead>
							<tr style="background-color:#33bbff">
								<th>Classid</th>
								<th>Class Name</th>
								<th colspan="3">Action</th>
							</tr>
						</thead>
						{classes}
							<tr>
								<td>{classid}</td>
								<td>{classname}</td>
								<td><a href="<?php echo base_url(); ?>Classes/editclass/{classid}">Edit</a></td>
								<td ><a class="text-info" href="<?php echo base_url(); ?>Classes/classdetails/{classid}">Details</a></td>
								<td ><a class="text-danger" href="<?php echo base_url(); ?>Classes/deleteclass/{classid}">Delete</a></td>
							</tr>
						{/classes}
					</table>
				</div>
				
			</div><br/><br/>
			
		</div>
	</div>
	</body>
</html>	