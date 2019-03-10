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
					
				<div class="col-sm-5">
					<form method="post" onsubmit="return requiredfield('classname','classnameErr')">
						<legend ><h3>Edit Class</h3></legend>
						ClassID:<?php echo $class['classid']; ?><br/><input type="hidden"  name="classid" value="<?php echo $class['classid']; ?>" />
						Class Name:<input type="text" id="classname" name="classname" class="form-control" value="<?php echo set_value('classname');if(set_value('classname')==''){echo $class['classname'];} ?>" placeholder="ex: one/two" onclick="hide('classnameErr')"/>
						<span id="classnameErr" style="color:red"></span><br/>
						<a href="<?php echo base_url(); ?>Classes/manageclass" class="btn btn-info" role="button"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>&nbsp&nbsp
						<input type="submit" name="buttonSubmit" value="Edit Class" class="btn btn-primary" />
					</form><br/>
				</div>
			
			</div><br/>
		</div>
	</div>
	</body>
</html>	