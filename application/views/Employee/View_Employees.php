<!DOCTYPE html>
<html>
	<head>
		<title>Employees</title>
		
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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Employee : <?php echo $desig; ?></h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="row">
				
				<div class="col-sm-8" >
					<a href="<?php echo base_url(); ?>Employee/add" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-plus-sign"></span> Add New Employee</a>
				</div>
				<div class="col-sm-4" >
					<input type="text" onkeyup="Search(this.value)" class="form-control" name="search" id="search"  placeholder="search by name" />
				</div>
			</div><br/>
			
			<div class="row">
				
				<div class="col-sm-12" id="emp">
					<table class="table table-hover table-bordered" style="border:1px solid lightgray">
						<thead>
							<tr style="background-color:lightgreen">
								<th>ID</th>
								<th>Name</th>
								<th>phone</th>
								<th>email</th>
								<th>Designation</th>
								<th >Action</th>
							</tr>
						</thead>
						<tbody>
						
						{employees}
							<tr>
								<td>{eid}</td>
								<td>{name}</td>
								<td>{phone}</td>
								<td>{email}</td>
								<td>{designation}</td>
								<td>
									<ul class="btn btn-default" style="list-style-type: none;">
										<li class="dropdown">
											<a class="dropdown-toggle" data-toggle="dropdown" href="#" >Actions<span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a style="color:#0066cc" href="<?php echo base_url(); ?>Employee/profile/{eid}">Details</a></li>
												<li><a style="color:#0066cc" href="<?php echo base_url(); ?>Employee/edit/{eid}">Edit</a></li>
											</ul>
										</li>
									</ul>
								</td>
								
							</tr>
						{/employees}
						</tbody>
					</table>
				</div>
			</div><br/><br/>
		</div>
	</div>
	
	<script>
			
			function Search(value) {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("emp").innerHTML = xmlhttp.responseText;
					}
				};
				xmlhttp.open("GET", "<?php echo base_url(); ?>Employee/searchemp/"+value, true); //true=Asynchronous Request
				xmlhttp.send(); 
			}
		</script>
	</body>
</html>	