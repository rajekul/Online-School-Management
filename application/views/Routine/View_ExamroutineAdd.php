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
				
				<div class="col-sm-5" >
					<h3>Add Exam Routine</h3>
					<form method="post" onsubmit="return requiredfield('subjectcode','subjectcodeErr')">
					
					<table class="table">
						<tr>
							<td>DATE</td>
							<td>
								<input type="text" id="date" name="date" class="form-control" value="<?php echo set_value('date');?>" onclick="hide('dateErr')"  placeholder="YYYY-MM-DD"/>
								<span id="dateErr" style="color:red"></span>
							</td>
						</tr>
						<tr>
							<td>TIME</td>
							<td>
								<div class="row">
									<div class="col-sm-4">
										<select id="hour" name="hour" class="form-control" onclick="requiredfield('date','dateErr'),hide('hourErr')">
											<option value="">Hour</option>
											<?php 
												for($i=1;$i<=12;$i++){
													echo '<option value="'.str_pad($i, 2, "0",STR_PAD_LEFT).'" '.set_select('hour',str_pad($i, 2, "0",STR_PAD_LEFT)).'>'.str_pad($i, 2, "0",STR_PAD_LEFT).'</option>';
												}
											?>
										</select>
										<span id="hourErr" style="color:red"></span>
									</div>
									<div class="col-sm-4">
										<select id="minute" name="minute" class="form-control">
											<?php 
												for($i=0;$i<60;$i++){
													echo '<option value="'.str_pad($i, 2, "0",STR_PAD_LEFT).'" '.set_select('minute',str_pad($i, 2, "0",STR_PAD_LEFT)).'>'.str_pad($i, 2, "0",STR_PAD_LEFT).'</option>';
												}
											?>
										</select>
									</div>
									<div class="col-sm-4">
										<select id="ampm" name="ampm" class="form-control">
											<option value="am" <?php echo set_select('ampm','am');?> >AM</option>
											<option value="pm" <?php echo set_select('ampm','pm');?>>PM</option>
										</select>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>Exam</td>
							<td>
								<select class="form-control" id="examid" name="examid" onclick="requiredfield('hour','hourErr'),hide('examidErr')">
								<option value="">Select Exam</option>
								{terms}
									<option value="{examid}">{term} ({examname})</option>
								{/terms}
								</select>
								<span id="examidErr" style="color:red"></span>
							</td>
						</tr>
						<tr>
							<td>Class</td>
							<td>
								<select id="classid" name="classid" onchange="Request(this.value)" onclick="requiredfield('examid','examidErr'),hide('classidErr')" class="form-control">
									<option value="">select class</option>
									{classes}
									<option value="{classid}">{classname}</option>
									{/classes}
								</select>
								<span id="classidErr" style="color:red"></span>
							</td>
						</tr>
						<tr>
							<td>Subject</td>
							<td><span id="classsub">
								<select class="form-control" id="subjectcode" name="subjectcode" onclick="requiredfield('classid','classidErr'),hide('subjectcodeErr')">
									<option value="">select Subject</option>
								</select>
							</span>
							
							<span id="subjectcodeErr" style="color:red"></span>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="buttonSubmit" value="Add Routine" class="btn btn-primary"/></td>
						</tr>
					</table>
					</form>
				</div>
			</div><br/>
			
			
		<script>
			function Request(value) {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("classsub").innerHTML = xmlhttp.responseText;
					}
				};
				xmlhttp.open("GET", "<?php echo base_url(); ?>Routine/getsubject/"+value, true); //true=Asynchronous Request
				xmlhttp.send(); 
			}
		</script> 
	</div>
	</body>
</html>	