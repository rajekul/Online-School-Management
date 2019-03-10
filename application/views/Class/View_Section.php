<!DOCTYPE html>
<html>
	<head>
		<title>Section</title>
		
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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Section</h2>
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
					<div id="addsection" class="modal fade" role="dialog">
				  <div class="modal-dialog modal-sm">
					<div class="modal-content">
					  <div class="modal-header">
						<br/>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title">Add New Section</h3>
					  </div>
					  <div class="modal-body">
							<form method="post"  onsubmit="return requiredfield('classid','classidErr')">
								<table class="table">
									<tr>
										<td>AlphaName</td>
										<td>
											<input type="text" id="alphaname" name="alphaname" class="form-control" value="<?php echo set_value('alphaname'); ?>"  onclick="hide('alphanameErr')" placeholder="A/B/C"/>
											<span id="alphanameErr" style="color:red"></span>
										</td>
									</tr>
									<tr>
										<td>NickName</td>
										<td>
											<input type="text" id="name" name="name" class="form-control" value="<?php echo set_value('name'); ?>" onclick="requiredfield('alphaname','alphanameErr'),hide('nameErr')"   placeholder="Nick Name"/>
											<span id="nameErr" style="color:red"></span>
										</td>
									</tr>
									<tr>
										<td>Seat Limit</td>
										<td>
											<input type="text" id="limit" name="limit" class="form-control" value="<?php echo set_value('limit'); ?>" onclick="requiredfield('name','nameErr')"   placeholder="seat limit"/>
											<span id="nameErr" style="color:red"></span>
										</td>
									</tr>
									<tr>
										<td>Class</td>
										<td>
											<?php echo $class['classname'];?>
											<input type="hidden" id="classid" name="classid" value="<?php echo $class['classid'];?>">
												
											<span id="classidErr" style="color:red"></span>
										</td>
									</tr>
									<tr>
										<td style="color:red" colspan="2"></td>
									</tr>
									<tr>
										<td></td>
										<td><input type="submit" name="buttonSubmit" value="Add Section" class="btn btn-primary" /></td>
									</tr>
								</table>
							</form>
					  </div>
					  
					</div>
				  </div>
				</div>	
				</div>
				<div class="col-sm-4" >
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addsection"><span class="glyphicon glyphicon-plus-sign"></span> Add New Section</button>	
				</div>
			</div>
			
			<div class="row">
				
				<div class="col-sm-7" >
					<h3 class="text-primary">Class <?php echo $class['classname'];?> </h3>
					<table class="table table-bordered">
						<thead>
							<tr style="background-color:#33bbff">
								<th>Secid</th>
								<th>Alpha Name</th>
								<th>Nick Name</th>
								<th>Seat</th>
								<th colspan="3">Action</th>
							</tr>
						</thead>
						{sections}
							<tr>
								<td>{secid}</td>
								<td>{alphaname}</td>
								<td>{nickname}</td>
								<td>{limit}</td>
								<td><a href="<?php echo base_url(); ?>Classes/editsec/{secid}">Edit</a></td>
								<td><a href="<?php echo base_url(); ?>Classes/secdetails/{secid}">Details</a></td>
								<td><a class="text-danger" href="<?php echo base_url(); ?>Classes/deletesec/{secid}">Delete</a></td>
							</tr>
						{/sections}
					</table>
				</div>
				
			</div><br/>
			
		</div>
	</div>
	</body>
</html>	