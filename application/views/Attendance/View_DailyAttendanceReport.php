<!DOCTYPE html>
<html>
	<head>
		<title>Attendance</title>
		<script src="<?php echo base_url(); ?>template/vendor/jquery/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>js/jquery-ui.js"></script>
		<link href="<?php echo base_url(); ?>css/jquery-ui.css" rel="stylesheet" />
		<link href="<?php echo base_url(); ?>css/jquery-ui.structure.css" rel="stylesheet" />
		<link href="<?php echo base_url(); ?>css/jquery-ui.theme.css" rel="stylesheet" />
		<script type="text/javascript">
			$(function () {

				$('#date').datepicker({
					onSelect: function (date) {
						//alert(date);
						window.location = "<?php echo base_url(); ?>Attendance/dailyreport/"+<?php echo $class['classid']; ?>+"/"+<?php echo $section['secid']; ?>+"/"+date;
					}
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
						foreach($sections as $sec){
							if($section['secid']==$sec['secid']){
								$tab='active';
							}
							else{
								$tab='';
							}
							echo '<li class="'.$tab.'"><a href="'.base_url().'Attendance/dailyreport/'.$class['classid'].'/'.$sec['secid'].'">Section '.$sec['alphaname'].'</a></li>';
						}
					
					?>
					</ul>
				</div>
			</div><br/>
			
			
			
			<div class="row">
				<div class="col-sm-8">
				</div>
				<div class="col-sm-3" >
					<div class="input-group">
						<input type="text" id="date" class="form-control" placeholder="Select Date" />
						<span class="input-group-btn">
							<button class="btn btn-default" type="button">
								<span class="glyphicon glyphicon-calendar"></span>
							</button>
						</span>
					</div>
					
					
				</div>
				
			</div><br/>
			<div class="row">
			<div class="col-sm-1">
				</div>
				<div class="col-sm-10" style="background-color:lightgray" id="dailyreport">
					<div align="center">
						<h2>Daily Attendance</h2>
						<h3>
						Class : <?php echo $class['classname']; ?> | 
						Section : <?php echo $section['alphaname']; ?> 
						</h3>
						<h4>
						Date : <?php echo $date; ?>
						</h4>
					</div>
					<div align="right" style="padding-right:20px">
					<h4>
					Total Student : <?php echo $totalStudent; ?>  <br/>
					Present : <?php echo $present; ?> <br/> 
					Absent : <?php if(!$students){echo 0;}else{ echo $totalStudent-$present;} ?> <br/>
					</h4>
					</div>
					<table class="table table-bordered" style="background-color:white">
						<tr style="background-color:lightblue">
							<th>Id</th>
							<th>Name</th>
							<th>Status</th>
						</tr>
						<?php
							if(!$students){
								echo '
									<tr>
										<td colspan="3">Attendance Not given yet</td>
									</tr>
								';
							}
							else{
								foreach($students as $student){
									if($student['attendance']=='P'){
										$status='<span style="color:green">Present</span>';
									}
									else if($student['attendance']=='A'){
										$status='<span style="color:red">Absent</span>';
									}
									else{
										$status="None";
									}
									echo '<tr>
											<td>'.$student['sid'].'</td>
											<td>'.$student['studentname'].'</td>
											<td>'.$status.'</td>
										</tr>';
								}

							}
						
						?>
						
					</table>
					
				</div>
			
			</div><br/>
			
		</div>
	
	<script>
			function Search(value=" ") {
				alert("works");
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("dailyreport").innerHTML = xmlhttp.responseText;
					}
				};
				xmlhttp.open("GET", "<?php echo base_url(); ?>Attendance/search/"+value+"/"+<?php echo $class['classid']; ?>+"/"+<?php echo $section['secid']; ?>, true); //true=Asynchronous Request
				xmlhttp.send(); 
			}
			
			
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