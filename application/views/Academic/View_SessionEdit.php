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
					
					<div class="col-sm-4">
						<form method="post" onsubmit="return validation()">
							<legend ><h3>Edit Session</h3></legend>
							Session:<input type="hidden" id="sessionid" name="sessionid" class="form-control" value="<?php echo $session['sessionid']; ?>"/>
							<input type="text" id="session" name="session" class="form-control" value="<?php echo $session['sessions']; ?>" onclick="hide('sessionErr')"/>
							<span id="sessionErr" style="color:red"></span><br/>
							<input type="text" id="year" name="year" class="form-control" value="<?php echo $session['year']; ?>" onclick="hide('sessionErr')"/><br/>
							<a href="<?php echo base_url(); ?>academic/session" class="btn btn-info" role="button"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>&nbsp&nbsp
							<input type="submit" name="buttonSubmit" value="Update Session" class="btn btn-primary" />
						</form><br/>
					</div>
				</div><br/>
			</div>
		</div>
	</body>
</html>	