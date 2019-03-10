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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Edit Designation</h2>
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
				<div class="col-sm-5">
					<form method="post" onsubmit="return requiredfield('designation','designationErr')">
						Designation ID:<?php echo $designation['designationid']; ?><br/><input type="hidden"  name="designationid" value="<?php echo $designation['designationid']; ?>" />
						Designation:<input type="text" id="designation" name="designation" class="form-control" value="<?php echo set_value('designation');if(set_value('designation')==''){echo $designation['designation'];} ?>" onclick="hide('designationErr')"/>
						<span id="designationErr" style="color:red"></span><br/>
						<a href="<?php echo base_url(); ?>Employee/designation" class="btn btn-info" role="button"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>&nbsp&nbsp
						<input type="submit" name="buttonSubmit" value="Edit Designation" class="btn btn-primary" />
					</form><br/>
				</div>
			
			</div><br/><br/>
		</div>
	</div>
	</body>
</html>	