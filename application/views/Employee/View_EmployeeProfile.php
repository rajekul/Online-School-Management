<!DOCTYPE html>
<html>
	<head>
		<title>Employees</title>
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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Employee</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
				
			<div class="row">
				
				<div class="col-sm-10">
					<div class="row">
						<div class="col-sm-12" >
							<h3><?php echo $employee['name']; ?>'s Information</h3>	
						</div>
					</div><br/>
					<div class="row">
						
						<div class="col-sm-7" >
							<table class="table">
								<tr>
									<td>ID</td>
									<td>: <?php echo $employee['eid']; ?></td>
								</tr>
								<tr>
									<td>Name</td>
									<td>: <?php echo $employee['name'];?></td>
								</tr>
								<tr>
									<td>Designation</td>
									<td>: <?php echo $employee['designation'];?></td>
								</tr>
								<tr>
									<td>Appoint Date</td>
									<td>: <?php echo $employee['appointdate'];?></td>
								</tr>
								<tr>
									<td>Gender</td>
									<td>: <?php echo $employee['gender'];?></td>
								</tr>
								<tr>
									<td>DOB</td>
									<td>: <?php echo $employee['dob']; ?></td>
								</tr>
								<tr>
									<td>Email</td>
									<td>: <?php echo $employee['email'];?></td>
								</tr>
								<tr>
									<td>Phone</td>
									<td>: <?php echo $employee['phone']; ?></td>
								</tr>
								<tr>
									<td>NID</td>
									<td>: <?php echo $employee['nid']; ?></td>
								</tr>
								
								
							</table>
						</div>
						<div class="col-sm-4" >
							<img id="img" src="<?php echo base_url().'files/photos/'.$employee['photo']; ?>" width="180" height="170" style="border:1px solid gray"/>
						</div>
					</div><br/>
					<a href="<?php echo base_url(); ?>Employee/" class="btn btn-info" role="button"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>&nbsp&nbsp
				</div>
				<br/>
			</div>
		</div>
	</div>
	</body>
</html>	