<!DOCTYPE html>
<html>
	<head>
		<title>Parents</title>
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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Parents</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<div class="row">
				
				<div class="col-sm-3">
					<select  onchange="Request(this.value)" class="form-control" >
						<option value="all">All</option>
						<option value="father">Father</option>
						<option value="mother">Mother</option>
						<option value="guardian">Local Guardian</option>
					</select>
				</div>
			
				<div class="col-sm-1" ></div>
				<div class="col-sm-4" >
					<input type="text" onkeyup="Searchparent(this.value)" class="form-control"  placeholder="student id" />
				</div>
				<div class="col-sm-4" >
					<input type="text" onkeyup="Searchparent(this.value)" class="form-control"  placeholder="search parent by name/id/phone" />
				</div>
			</div><br/>
			
			<div class="row">
				
				<div class="col-sm-12">
				<span id="parents">
					<table class="table table-bordered table-hover" style="border:1px solid lightgray">
						<thead>
							<tr style="background-color:#3385ff">
								<th>ID</th>
								<th>Name</th>
								<th>Phone</th>
								<th>Email</th>
								<th >Address(Present/Guardian)</th>
								<th >Relation</th>
								<th >Action</th>
							</tr>
						</thead>
						<tbody>
						{parents}
							<tr>
								<td>{pid}</td>
								<td>{parentname}</td>
								<td>{parentphone}</td>
								<td>{parentemail}</td>
								<td>{present}/{guardian}</td>
								<td>{relation}</td>
								<td>
									<ul class="btn btn-default" style="list-style-type: none;">
										<li class="dropdown">
											<a class="dropdown-toggle" data-toggle="dropdown" href="#" >Actions<span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a style="color:#0066cc" href="<?php echo base_url(); ?>Parents/details/{pid}">Details</a></li>
												<li><a style="color:#0066cc" href="<?php echo base_url(); ?>Parents/edit/{pid}">Edit</a></li>
												<li><a style="color:#0066cc" href="<?php echo base_url(); ?>Parents/editAddress/{pid}">Edit Address</a></li>
											</ul>
										</li>
									</ul>
								</td>
							</tr>
						{/parents}
						</tbody>
					</table>
				</span>
				</div>
			</div><br/><br/>
		</div>
		
	</div>
	<script>
		function Request(value) {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("parents").innerHTML = xmlhttp.responseText;
				}
			};
			xmlhttp.open("GET", "<?php echo base_url(); ?>Parents/getparentbytype/"+value, true); //true=Asynchronous Request
			xmlhttp.send(); 
		}
		function Searchparent(value) {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("parents").innerHTML = xmlhttp.responseText;
				}
			};
			xmlhttp.open("GET", "<?php echo base_url(); ?>Parents/search/"+value, true); //true=Asynchronous Request
			xmlhttp.send(); 
		}
		function Search(value) {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("parents").innerHTML = xmlhttp.responseText;
				}
			};
			xmlhttp.open("GET", "<?php echo base_url(); ?>Parents/getparentbystudent/"+value, true); //true=Asynchronous Request
			xmlhttp.send(); 
		}
	</script>
	</body>
</html>	