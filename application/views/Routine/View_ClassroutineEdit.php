<!DOCTYPE html>
<html>
	<head>
		<title>Class Routine</title>
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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Class Routine</h2>
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
					<h3>Edit Class Routine</h3>
					<form method="post" >
					<input type="hidden" name="serial" value="<?php echo $routine['serial']; ?>"/>
					<table class="table">
						<tr>
							<td>Day</td>
							<td>
								<?php echo $routine['day']; ?>
								<input type="hidden" name="day" value="<?php echo $routine['day']; ?>"/>
							</td>
						</tr>
						<tr>
							<td>Period</td>
							<td>
								<?php echo $routine['periodname']; ?>
								<input type="hidden" name="period" value="<?php echo $routine['period']; ?>"/>
								
							</td>
						</tr>
						<tr>
							<td>Class</td>
							<td>
								<?php echo $routine['classname']; ?>
								<input type="hidden" name="classid" value="<?php echo $routine['classid']; ?>"/>
							</td>
						</tr>
						<tr>
							<td>Section</td>
							<td>
								<?php echo $routine['alphaname']; ?>
							</td>
						</tr>
						<tr>
							<td>Subject</td>
							<td>
								<?php echo $routine['subjectname']; ?>
							</td>
						</tr>
						<tr>
							<td>Teacher</td>
							<td>
								<select  name="teacher"  class="form-control">
									{employees}
									<option value="{eid}">{name} ({designation})</option>
									{/employees}
								</select>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
							<a href="<?php echo base_url().'Routine/classroutine/'.$routine['classid']?>" class="btn btn-info" role="button"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>&nbsp&nbsp
							<input type="submit" name="buttonSubmit" value="Edit Routine" class="btn btn-primary"/></td>
						</tr>
					</table>
					</form>
				</div>
				
			</div><br/>
			<div class="row">
				<div class="col-sm-1" >
						
				</div>
				<div class="col-sm-4" >
						
				</div>
			</div>
		</div><br/><br/>
		
	</div>
	</body>
</html>	