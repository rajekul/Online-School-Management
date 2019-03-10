<!DOCTYPE html>
<html>
	<head>
		<title>Class</title>
		<script>
			function Request(value) {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("sec").innerHTML = xmlhttp.responseText;
					}
				};
				xmlhttp.open("GET", "<?php echo base_url(); ?>Classes/getsecbyclass/"+value, true); //true=Asynchronous Request
				xmlhttp.send(); 
			}
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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Class Teachers</h2>
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
					<h3>Add Class Teachers</h3>
					<form method="post" onsubmit="return requiredfield('eid','eidErr')">
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
						<tr>
							<td>Section</td>
							<td>
								<span id="sec">
								<select id="secid" name="secid" class="form-control" onclick="requiredfield('classid','classidErr'),hide('secidErr')">	
								</select>
								</span>
								<span id="secidErr" style="color:red"></span>
							</td>
						</tr>
						<tr>
							<td>Teacher</td>
							<td>
								<select id="eid" name="eid" onclick="requiredfield('secid','secidErr'),hide('eidErr')" class="form-control">
									<option value="">select teacher</option>
									{employees}
									<option value="{eid}">{name}</option>
									{/employees}
								</select>
								<span id="eidErr" style="color:red"></span>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="buttonSubmit" value="Add Class Teacher" class="btn btn-primary"/></td>
						</tr>
					</table>
					</form>
				</div>
					
				
			</div>
		</div>
	</div>
	</body>
</html>	