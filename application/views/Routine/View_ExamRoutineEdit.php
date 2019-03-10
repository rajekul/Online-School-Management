<!DOCTYPE html>
<html>
	<head>
		<title>Exam</title>
		<script src="<?php echo base_url(); ?>template/vendor/jquery/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>js/jquery-ui.js"></script>
		<link href="<?php echo base_url(); ?>css/jquery-ui.css" rel="stylesheet" />
		<link href="<?php echo base_url(); ?>css/jquery-ui.structure.css" rel="stylesheet" />
		<link href="<?php echo base_url(); ?>css/jquery-ui.theme.css" rel="stylesheet" />
		<script type="text/javascript">
			$(function () {

				$('#date').datepicker({
					
				});
				$("#date").datepicker("option", "dateFormat", "yy-mm-dd");
			});
		</script>
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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Exam Routine</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
		
			<div class="row">
				<div class="col-sm-11" >
					<ul class="nav nav-tabs">
						<li><a href="<?php echo base_url(); ?>Routine/examroutine">Exam Routine</a></li>
						<li class="active"><a href="<?php echo base_url(); ?>Routine/examroutineadd">Add Routine</a></li>
					</ul>
				</div>
			</div><br/>
			
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
				<br/>
			</div>
			<div class="row">
				<div class="col-sm-1" >
				
				</div>
				<div class="col-sm-5" >
					<h3>Edit Exam Routine</h3>
					<form  method="post">
						<input type="hidden"  name="serial" class="form-control" value="<?php echo $examroutine['serial']; ?>">
						Class:<?php echo $examroutine['classname']; ?><br/><br/>
						Subject:<?php echo $examroutine['subjectname']; ?><br/><br/>
						Change Date:<input type="text" id="date" name="date" class="form-control" value="<?php echo $examroutine['date']; ?>"><br/>
						Change Time:<input type="text"  name="time" class="form-control" value="<?php echo $examroutine['time']; ?>"><br/>
						<a href="<?php echo base_url(); ?>Routine/examroutine/" class="btn btn-default" role="button">Back</a>&nbsp
						<input type="submit" name="buttonSubmit" value="Update Exam Routine" class="btn btn-primary" />
					</form>
				</div>
			</div><br/>
			
		</div><br/><br/>
	

	</body>
</html>	