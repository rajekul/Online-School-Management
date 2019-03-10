<!DOCTYPE html>
<html>
	<head>
		<title>Sessions</title>
		<script type='text/javascript' src="<?php echo base_url(); ?>js/sessionvalidation.js"></script>
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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Academic</h2>
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
				<div >
					<div id="change" class="modal fade" role="dialog">
					  <div class="modal-dialog modal-sm">
						<div class="modal-content">
						  <div class="modal-header">
							<br/>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Change Session</h4>
						  </div>
						  <div class="modal-body">
							<h4>Current Session:<?php if(isset($current['sessions'])){echo $current['sessions'];} ?></h4>
							Next Session:
							<form method="post" onsubmit="return requiredfield('nextsession','nextsessionErr')">
								<select id="nextsession" name="nextsession" class="form-control">
									<option value="">Select Session</option>
									{upcoming}
										<option value="{sessionid}">{sessions}</option>
									{/upcoming}
									<?php
										if(!$upcoming){
											echo '<option value="" class="text-danger">No Upcoming  Session Found</option>';
										}
									?>
								</select>
								<span id="nextsessionErr" style="color:red"></span><br/>
								<input type="submit" name="buttonSubmit" value="Change Session" class="btn btn-primary"/>
							</form>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						  </div>
						</div>
					  </div>
					</div>
					
					<div id="add" class="modal fade" role="dialog">
					  <div class="modal-dialog modal-sm">
						<div class="modal-content">
						  <div class="modal-header">
							<br/>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Add Session</h4>
						  </div>
						  <div class="modal-body">
							<form method="post" onsubmit="return validation()">
								Session:<input type="text" id="session" name="session" class="form-control" value="<?php echo set_value('session'); ?>" placeholder="ex: 2016-2017" onclick="hide('sessionErr')"/>
								
								<span id="sessionErr" style="color:red"></span><br/>
								Session Year:<input type="text" id="year" name="year" class="form-control" value="<?php echo set_value('session'); ?>" placeholder="ex: 2016" onclick="hide('yearErr')"/>
								
								<span id="yearErr" style="color:red"></span><br/>
								<input type="submit" name="buttonSubmit" value="Add Session" class="btn btn-primary" />
							</form>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						  </div>
						</div>
					  </div>
					</div>	
				</div>
				<div class="col-sm-2">
					<a  data-toggle="modal" data-target="#add" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-plus-sign"></span> Add New Session</a>	
				</div>
				<div class="col-sm-2">
					<a  data-toggle="modal" data-target="#change" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-pencil"></span> Change Session</a>	
				</div>
				
			</div>
			<div class="row">
				
				<div class="col-sm-5">
					<h3>Sessions</h3>
					<table class="table table-bordered" style="background-color:white">
						<thead>
							<tr style="background-color:#33bbff">
								<th>#</th>
								<th>Session</th>
								<th>Session Year</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						{sessions}
							<tr>
								<td>{sessionid}</td>
								<td>{sessions}</td>
								<td>{year}</td>
								<td>{status}</td>
								<td><a href="<?php echo base_url(); ?>academic/editsession/{sessionid}">Edit</a></td>
							</tr>
						{/sessions}
					</table>
				</div>
				
			</div><br/>
		</div>
	</div>
	</body>
</html>	