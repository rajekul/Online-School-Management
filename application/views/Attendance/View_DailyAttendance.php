<!DOCTYPE html>
<html>
	<head>
		<title>Attendance</title>
		
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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Attendance [Class : <?php echo $class['classname']; ?>]</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			
			
			
			<div class="row">
				
				<div class="col-sm-12" >
					<ul class="nav nav-tabs">
					<?php
						if($usertype!='Teacher'){
							foreach($sections as $sec){
								if($section['secid']==$sec['secid']){
									$tab='active';
								}
								else{
									$tab='';
								}
								echo '<li class="'.$tab.'"><a href="'.base_url().'Attendance/dailyattendance/'.$class['classid'].'/'.$sec['secid'].'">Section '.$sec['alphaname'].'</a></li>';
							}
						}
						
					
					?>
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
				
			</div>
			
			
			<div class="row">
				<div class="col-sm-1">
				</div>
				<div class="col-sm-10" align="center" style="background-color:lightgray">
					<h2>Daily Attendance</h2>
					<h3>
					Class : <?php echo $class['classname']; ?> | 
					Section : <?php echo $section['alphaname']; ?> | 
					Date : <?php echo date('d-m-Y'); ?>
					</h3>
				</div>
				
			</div>
			<div class="row">
			<div class="col-sm-1">
				</div>
				<div class="col-sm-10" style="background-color:lightgray">
					<form method="post">
					<table class="table table-bordered" style="background-color:white">
						<tr style="background-color:lightblue">
							<th>Id</th>
							<th>Name</th>
							<th>Status</th>
						</tr>
						{students}
						<tr>
							<td>{sid}</td>
							<td>{studentname}</td>
							<td><input type="radio" name="{sid}" value="P"/> Present &nbsp <input type="radio" name="{sid}" value="A"/> Absent</td>
						</tr>
						{/students}
						<tr>
							<td align="right" colspan="3">
								<input type="hidden" name="classid" value="<?php echo $class['classid']; ?>"/>
								<input type="hidden" name="secid" value="<?php echo $section['secid']; ?>"/>
								<input type="submit" name="buttonSubmit" value="Save Changes" class="btn btn-primary" />
							</td>
						</tr>
					</table>
					</form>
				</div>
				
			</div><br/>
			
		</div>
	
	<script>
			
			function printDiv() {
				 var printContents = document.getElementById('printdiv').innerHTML;
				 var originalContents = document.body.innerHTML;

				 document.body.innerHTML = printContents;

				 window.print();

				 document.body.innerHTML = originalContents;
			}
		</script>
	</body>
</html>	