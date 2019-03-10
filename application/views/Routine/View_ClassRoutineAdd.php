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
							<strong>Errors!</strong><span id="Err">'.$message.'</span></div>';
						}
					?>
				</div>
				
			</div>
			
			
			<div class="row">
				
				<div class="col-sm-5" >
					<h3>Add Class Routine</h3>
					<form method="post" onsubmit="return requiredfield('teacher','teacherErr')">
					
					<table class="table">
						
						<tr>
							<td>Day</td>
							<td>
								<select id="day" name="day" class="form-control"  onclick="hide('dayErr')">
									<option value="">Select Day</option>
									<option value="Sunday">Sunday</option>
									<option value="Monday">Monday</option>
									<option value="Tuesday">Tuesday</option>
									<option value="Wednesday">Wednesday</option>
									<option value="Thursday">Thursday</option>
									<option value="Friday">Friday</option>
									<option value="Saturday">Saturday</option>
								</select>
								<span id="dayErr" style="color:red"></span>
							</td>
						</tr>
						<tr>
							<td>Period</td>
							<td>
								<select id="period" name="period" onchange="periodclash()" onclick="requiredfield('day','dayErr'),hide('periodErr')" class="form-control">
									<option value="">select Period</option>
									{periods}
									<option value="{period}">{periodname}</option>
									{/periods}
								</select>
								<span id="periodErr" style="color:red"></span>
							</td>
						</tr>
					</table>
					
					<table class="table">
						<tr>
							<td>Class</td>
							<td>
								<select id="classid" name="classid" onchange="Request(this.value)" onclick="requiredfield('period','periodErr'),hide('classidErr')" class="form-control">
									<option value="">select class</option>
									{classes}
									<option value="{classid}">{classname}</option>
									{/classes}
								</select>
								<span id="classidErr" style="color:red"></span>
							</td>
						</tr>
					</table>
						<span id="subsec"></span>
					<table class="table">
						
						<tr>
							<td>Teacher</td>
							<td>
								<select id="teacher" onchange="teacherclash(this.value)" name="teacher" onclick="requiredfield('classid','classidErr'),hide('teacherErr')" class="form-control">
									<option value="">select teacher</option>
									{employees}
									<option value="{eid}">{name} ({designation})</option>
									{/employees}
								</select>
								<span id="teacherErr" style="color:red"></span>
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
			<div class="row">
				<div class="col-sm-1" >
						
				</div>
				<div class="col-sm-4" >
						
				</div>
			</div>
		</div><br/><br/>
	
	</div>
	<script>
		function Request(value) {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("subsec").innerHTML = xmlhttp.responseText;
				}
			};
			xmlhttp.open("GET", "<?php echo base_url(); ?>Routine/getsecsubject/"+value, true); //true=Asynchronous Request
			xmlhttp.send(); 
		}
		function periodclash() {
			var day=document.getElementById('day').value;
			var period=document.getElementById('period').value;
			var classid=document.getElementById('classid').value;
			var secid=document.getElementById('section').value;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("Err").innerHTML = xmlhttp.responseText;
				}
			};
			xmlhttp.open("GET", "<?php echo base_url(); ?>Routine/periodclash/"+day+"/"+period+"/"+classid+"/"+secid, true); //true=Asynchronous Request
			xmlhttp.send(); 
		}
		function subjectclash(value) {
			var day=document.getElementById('day').value;
			var classid=document.getElementById('classid').value;
			var secid=document.getElementById('section').value;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("Err").innerHTML = xmlhttp.responseText;
				}
			};
			xmlhttp.open("GET", "<?php echo base_url(); ?>Routine/subjectclash/"+day+"/"+value+"/"+classid+"/"+secid, true); //true=Asynchronous Request
			xmlhttp.send(); 
		}
		function teacherclash(value) {
			var day=document.getElementById('day').value;
			var period=document.getElementById('period').value;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("Err").innerHTML = xmlhttp.responseText;
				}
			};
			xmlhttp.open("GET", "<?php echo base_url(); ?>Routine/teacherclash/"+value+"/"+day+"/"+period, true); //true=Asynchronous Request
			xmlhttp.send(); 
		}
		
	</script>
	</body>
</html>	