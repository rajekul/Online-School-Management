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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Subject [Class : <?php echo $class['classname'];?>]</h2>
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
			
				<div class="col-sm-6">
					<h3>Asigned Sujects Of Class <?php echo $class['classname'];?></h3>
					<table class="table table-bordered">
						<tr style="background-color:lightblue">
							<th>Code</th>
							<th>Subject</th>
						</tr>
					{classsubject}
						<tr>
							<td>{subjectcode}</td>
							<td>{subjectname}</td>
						</tr>
					{/classsubject}
					</table>
				</div>
			
				<div class="col-sm-2">
				
				</div>
				<div class="col-sm-4" style="background-color:darkgray">
					<form method="post">
					<input type="hidden" name="classid" value="<?php echo $class['classid'];?>"/>
					<h3>Asign More Subject </h3>
					<h4>Subject List</h4>
						<?php 
							foreach($subjects as $subject){
								$notasign=true;
								foreach($classsubject as $classsubjects){
									if($subject['subjectcode']==$classsubjects['subjectcode']){
										$notasign=false;
										break;
									}
									else{
										$notasign=true;
									}
									
								}
								if($notasign){
									echo '<h4><input type="checkbox" value="'.$subject['subjectcode'].'" name="'.$subject['subjectcode'].'" />&nbsp'.$subject['subjectname'].'</h4>';
								}
								
							}
						?>
						
						<input type="submit" name="buttonSubmit" value="Asign Subject" class="btn btn-primary" /><br/><br/>	
					</form>
				</div>

			</div>
		</div>
	
	</body>
</html>



