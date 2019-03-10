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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Subject</h2>
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
					<form method="post" onsubmit="return requiredfield('subjectname','subjectnameErr')">
						<legend ><h3>Delete Subject</h3></legend>
						<h4>Subject Code:<?php echo $subject['subjectcode']; ?>
						<input type="hidden" name="subjectcode"  value="<?php echo $subject['subjectcode']; ?>"/><br/>
						Subject Name:<?php echo $subject['subjectname']; ?><br/></h4>
						<span id="subjectnameErr" style="color:red">This can't be undeone.<br/>The subject will be deleted permanently.<br/>Are You sure???</span><br/><br/>
						<a href="<?php echo base_url(); ?>Subject" class="btn btn-info" role="button"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>&nbsp&nbsp
						<input type="submit" name="buttonSubmit" value="Confirm" class="btn btn-danger" />
					</form><br/>
				</div>
				
			</div><br/>
		</div>
	</div>
	</body>
</html>	