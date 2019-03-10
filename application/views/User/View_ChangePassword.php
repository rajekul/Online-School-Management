<!DOCTYPE html>
<html>
	<head>
		<title>Change Password</title>
		
		<?php 
			$usertype=$this->session->userdata('usertype');
			if($usertype=='Admin'){
				$this->load->view('Shared/Admin_Layout');
			}
			else if($usertype=='Register'){
				$this->load->view('Shared/Register_Layout');
			}
			else if($usertype=='Teacher'){
				$this->load->view('Shared/Teacher_Layout');
			}
		?>
		
			<div class="row">	
                <div class="col-lg-12">
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Change Password</h2>
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
				
				<div class="col-sm-7">
					<form method="post" onsubmit="retun requiredfield('cnp','cnpErr')">
						<table class="table">
							<tr>
								<td>Current Password</td>
								<td>
									<input type="password" id="cp" name="cp" class="form-control" value="<?php echo set_value('cp'); ?>" onclick="hide('cpErr')"/>
									<span id="cpErr" style="color:red"></span>
								</td>
							</tr>
							<tr>
								<td>New Password</td>
								<td>
									<input type="password" name="np" class="form-control" value="<?php echo set_value('np'); ?>" onclick="requiredfield('cp','cpErr'),hide('npErr')"/>
									<span id="npErr" style="color:red"></span>
								</td>
							</tr>
							<tr>
								<td>Confirm Password</td>
								<td>
									<input type="password" name="cnp" class="form-control" value="<?php echo set_value('cnp'); ?>" onclick="requiredfield('np','npErr'),hide('cnpErr')"/>
									<span id="cnpErr" style="color:red"></span>
								</td>
							</tr>
							
							<tr>
								<td><input type="hidden" name="username" value="<?php echo $username;?>"</td>
								<td><input type="submit" name="buttonSubmit" value="change password" class="btn btn-primary"/></td>
							</tr>
						</table>
					</form>
				</div>
			</div><br/><br/>
			
		</div>
		
	
	</body>
</html>	