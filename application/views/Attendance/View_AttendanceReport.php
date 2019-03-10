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
							echo '<li class="'.$tab.'"><a href="'.base_url().'Attendance/attendancereport/'.$class['classid'].'/'.$sec['secid'].'">Section '.$sec['alphaname'].'</a></li>';
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
					
					<div class="col-sm-12 pre-scrollable" id="report" >
						
						<h2>Attendance Report</h2>
						<h4>
						Class : <?php echo $class['classname']; ?> |
						Section : <?php echo $section['alphaname']; ?> 
						</h4>
						<div align="right" style="padding-right:20px">
							<?php
								$workingday=0;
								foreach($students as $student){
									
									foreach($reports as $report){
										if($report['sid']==$student['sid']){
											$workingday++;
										}
										
									}
									break;
								}
								echo '<h4>Workingday: '.$workingday.' </h4>';
							?>
							
						</div>
						<table class="table table-bordered table-striped">
							<tr style="background-color:lightblue">
								<th>ID</th>
								<th>Date <span class="glyphicon glyphicon-arrow-right"></span>Name<span class="glyphicon glyphicon-arrow-down"></span></th>
								<?php
									for($i=1;$i<=$days;$i++){
										echo '<th>'.$i.'</th>';
									}
									
								?>
								<th>Attendance </th>
							</tr>
						
						<?php
							foreach($students as $student){
								$count=0;
								echo'<tr>
										<td>'.$student['sid'].'</td>
										<td>'.$student['studentname'].'</td>
								';
								for($i=1;$i<=$days;$i++){
									$found=false;
									foreach($reports as $report){
										
										$d=explode("-",$report['date']);
										
										if($report['sid']==$student['sid']){
											if($d[2]==$i){
												$found=true;
												$status=$report['attendance'];
												if($report['attendance']=='P'){
													$count++;
												}
												break;
											}
											else{
												$found=false;
											}
											
										}
										
										
									}
									if($found){
										echo '<td>'.$status.'</td>';
									}
									else{
										echo '<td>-</td>';
									}
								}
								if($workingday!=0){
									echo '
										<td>'.$count.' ('.($count/$workingday)*100 .'%)</td>
									</tr>';
								}
								else{
									echo '
										<td>NA</td>
									</tr>';
								}
								
							}
						?>
						</table>
					</div>
					
				</div><br/><br/>
			</div>
		</div>
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