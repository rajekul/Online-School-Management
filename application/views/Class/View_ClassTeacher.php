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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Class Teachers</h2>
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
				
				<div class="col-sm-6" ></div>
				<div class="col-sm-4" >
					<a href="<?php echo base_url(); ?>Classes/addclassteacher" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-plus-sign"></span> Add ClassTeacher</a>
				</div>
				
			</div><br/>	
				
				
			<div class="row">
				
				<div class="col-sm-8" >
					<h3>Class Teachers</h3>
					<table class="table table-bordered">
						<thead>
							<tr style="background-color:#33bbff">
								<th>Class</th>
								<th>Section</th>
								<th>Teacher</th>
								<th colspan="2">Action</th>
							</tr>
						</thead>
						{classteachers}
							<tr>
								<td>{classname}</td>
								<td>{alphaname}</td>
								<td><a  data-toggle="modal" data-target="#{eid}">{name}</a></td>
								<td><a  data-toggle="modal" data-target="#{secid}">Change Teacher</a> |
								<a style="color:red" data-toggle="modal" data-target="#{secid}delete">Delete</a></td>
							</tr>
							
							<div id="{secid}" class="modal fade" role="dialog">
							  <div class="modal-dialog modal-sm">
								<div class="modal-content">
								  <div class="modal-header">
									<br/>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Change Class Teacher</h4>
								  </div>
								  <div class="modal-body">
									<form action="<?php echo base_url(); ?>classes/editclassteacher" method="post" enctype="multipart/form-data">
										Teacher:
										<select id="eid" name="eid" onclick="requiredfield('secid','secidErr'),hide('eidErr')" class="form-control">
											<option value="">select teacher</option>
											{employees}
											<option value="{eid}">{name}</option>
											{/employees}
										</select>
										<input type="hidden"  name="secid" class="form-control" value="{secid}">
										<br/>
										<input type="submit" name="buttonSubmit" value="Change Teacher" class="btn btn-primary" />
									</form>
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								  </div>
								</div>
							  </div>
							</div>
							
							<div id="{secid}delete" class="modal fade" role="dialog">
							  <div class="modal-dialog modal-sm">
								<div class="modal-content">
								  <div class="modal-header">
									<br/>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Delete Class Teacher</h4>
								  </div>
								  <div class="modal-body">
									<form action="<?php echo base_url(); ?>classes/deleteclassteacher" method="post" enctype="multipart/form-data">
										<span style="color:red">
										Are You Sure to Delete Class Teacher !!!
										</span>
										<input type="hidden"  name="secid" class="form-control" value="{secid}">
										<br/><br/>
										<input type="submit" name="buttonSubmit" value="Confirm" class="btn btn-primary" />
									</form>
									<button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
								  </div>
								</div>
							  </div>
							</div>
							
							<div id="{eid}" class="modal fade" role="dialog">
							  <div class="modal-dialog modal-sm">
								<div class="modal-content">
									<br/><br/>
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">{name}</h4>
								  </div>
								  <div class="modal-body">
									<img id="img" src="<?php echo base_url();?>files/photos/{photo}" width="180" height="170" style="border:1px solid gray"/><br/>
									<strong>{name}</strong><br/>
										{phone}<br/>
										{email}<br/>
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								  </div>
								</div>

							  </div>
							</div>
						{/classteachers}
					</table>
				</div>
					
				<br/><br/>
			</div>
		</div>
	</div>
	</body>
</html>	