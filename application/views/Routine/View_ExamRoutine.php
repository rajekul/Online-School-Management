<!DOCTYPE html>
<html>
	<head>
		<title>Exam</title>
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
						<li class="active"><a href="<?php echo base_url(); ?>Routine/examroutine">Exam Routine</a></li>
						<li ><a href="<?php echo base_url(); ?>Routine/examroutineadd">Add Routine</a></li>
					</ul>
				</div>
			</div><br/>
			<div class="row">
				
				<div class="col-sm-3">
					<select class="form-control" onchange="Request(this.value)">
					{terms}
						<option value="{examid}">{term} ({examname})</option>
					{/terms}
					</select>
				</div>
			</div>
			
			<div class="row">
				
				<div class="col-sm-10" id="routine">
					
					<?php 
					echo '<div class="row" align="center" ><h2>Exam Routine</h2><h4>'.$exam['term'].':'.$exam['examname'].'</h4></div>
							<div class="panel-group" id="accordion">
								<div class="panel panel-default">';
		
								foreach($classes as $class){
									$str='';
					
									foreach($examroutine as $routine){
										if($class['classid']==$routine['classid']){
											$timestamp = strtotime($routine['date']);
											$day = date('l', $timestamp);
											$str.='
											<tr>
												<td>'.$routine['date'].'</td>
												<td>'.$day.'</td>
												<td>'.$routine['time'].'</td>
												<td>'.$routine['subjectname'].'</td>
												<td><a  href="'.base_url().'Routine/editexamroutine/'.$routine['serial'].'">Update</a></td>
												<td><a style="color:red" data-toggle="modal" data-target="#'.$routine['classid'].$routine['subjectcode'].'delete">Delete</a></td>
											</tr>
											<div id="'.$routine['classid'].$routine['subjectcode'].'delete" class="modal fade" role="dialog">
												<div class="modal-dialog modal-sm">
													<div class="modal-content">
														<div class="modal-header">
														<br/>
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Delete Routine</h4>
													</div>
													<div class="modal-body">
														<span style="color:red">
															Are You Sure to Delete Routine for <br/> Class '.$class['classname'].' '.$routine['subjectname'].' !!!
														</span>
														<br/>
														<button type="button" class="btn btn-default" data-dismiss="modal">Back</button>&nbsp
														<a href="'.base_url().'Routine/deleteexamroutine/'.$routine['serial'].'" class="btn btn-primary" role="button">Confirm</a>
													</div>
												</div>
											</div>
											</div>
										';
										}
										
									}
									echo ' 
											<div class="panel-heading"border:1px solid white; style="background-color:#9CB770;">
												<h3 class="panel-title">
												  <a data-toggle="collapse" data-parent="#accordion" href="#'.$class['classid'].'">Class:'.$class['classname'].'</a>
												</h3>
											</div>
											<div id="'.$class['classid'].'" class="panel-collapse collapse">
												<div class="panel-body" style="overflow: scroll;">
											
													<table class="table table-bordered table-hover" style="background-color:white;">
														<thead>
														<tr style="background-color:#b3b3b3">
															<th>Date</th>
															<th>Day</th>
															<th>Time</th>
															<th>Subject</th>
															<th colspan="2">Action</th>
														</tr>
														</thead>
														<tbody>
														'.$str.'
														</tbody>
													</table>
													</div></div>
										';
								}
							
						?>
						</div>
					</div>
				</div>
			
		
	<script>
			function Request(value) {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("routine").innerHTML = xmlhttp.responseText;
					}
				};
				xmlhttp.open("GET", "<?php echo base_url(); ?>Routine/getexamroutine/"+value, true); //true=Asynchronous Request
				xmlhttp.send(); 
			}
		</script> 
	</body>
</html>	