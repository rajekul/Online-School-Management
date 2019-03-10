<!DOCTYPE html>
<html>
	<head>
		<title>Notices</title>
		
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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Notice</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
				
			<div class="row">
				<div class="col-sm-8" >
						
				</div>
				<div class="col-sm-2 " >
					<a href="<?php echo base_url(); ?>notice/add" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-plus-sign"></span> Add Notice</a>
				</div>
			</div><br/>
			
			<div class="row">
				
				<div class="col-sm-3" >
					<select onchange="Request(this.value)" class="form-control">
						<option value="all">All</option>
						<option value="staff">Staff</option>
						<option value="student">Student</option>
						<option value="homepage">Homepage</option>
					</select>	
				</div>
				<div class="col-sm-3" >
				</div>
				<div class="col-sm-4" >
					<input  type="text" onkeyup="Search(this.value)" class="form-control" name="search" id="search"  placeholder="search by title/date" />
				</div>
			</div><br/>
			
			<div class="row">
				
				<div class="col-sm-10" id="notice">
					<table class="table table-hover table-bordered" style="border:1px solid lightgray">
						<thead>
							<tr style="background-color:#b3b3b3">
								<th>Date</th>
								<th>Title</th>
								<th>Viewer</th>
								<th colspan="2">Action</th>
							</tr>
						</thead>
						<tbody>
						
						{notices}
							<tr>
								<td>{date}</td>
								<td><a  data-toggle="modal" data-target="#{serial}">{title}</a></td>
								<td>{viewer}</td>
								<td><a  data-toggle="modal" data-target="#{serial}edit">Update</a></td>
								<td ><a class="text-danger" data-toggle="modal" data-target="#{serial}delete">Delete</a></td>
							</tr>
							
							<div id="{serial}" class="modal fade" role="dialog">
							  <div class="modal-dialog">
								<div class="modal-content">
								  <div class="modal-header">
									<br/>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">{title}</h4>
								  </div>
								  <div class="modal-body">
								  {notice}
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								  </div>
								</div>
							  </div>
							</div>
							
							<div id="{serial}edit" class="modal fade" role="dialog">
							  <div class="modal-dialog">
								<div class="modal-content">
								  <div class="modal-header">
									<br/>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Update Notice</h4>
								  </div>
								  <div class="modal-body">
									<form action="<?php echo base_url(); ?>Notice/editnotice" method="post">
										<input type="hidden"  name="serial" class="form-control" value="{serial}">
										<input type="text"  name="title" value="{title}" class="form-control"/><br/>
										<textarea rows="6" cols="40"  name="notice" class="form-control" >{notice}</textarea><br/>
										<input type="submit" name="buttonSubmit" value="Update Notice" class="btn btn-primary" />
									</form>
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								  </div>
								</div>
							  </div>
							</div>
							
							<div id="{serial}delete" class="modal fade" role="dialog">
							  <div class="modal-dialog modal-sm">
								<div class="modal-content">
								  <div class="modal-header">
									<br/>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Delete Notice</h4>
								  </div>
								  <div class="modal-body">
									<form action="<?php echo base_url(); ?>Notice/deletenotice" method="post">
										<h4 class="text-danger">
										Are You Sure to Delete the Notice: {title} !!!
										</h4><br/>
										<input type="hidden"  name="serial" class="form-control" value="{serial}">
										<input type="submit" name="buttonSubmit" value="Confirm" class="btn btn-danger" />
									</form>
									<button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
								  </div>
								</div>
							  </div>
							</div>
						{/notices}
						</tbody>
					</table>
				</div>
			</div><br/><br/>
		</div>
	</div>
	
	<script>
			function Request(value) {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("notice").innerHTML = xmlhttp.responseText;
					}
				};
				xmlhttp.open("GET", "<?php echo base_url(); ?>Notice/getbyviewer/"+value, true); //true=Asynchronous Request
				xmlhttp.send(); 
			}
			function Search(value) {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("notice").innerHTML = xmlhttp.responseText;
					}
				};
				xmlhttp.open("GET", "<?php echo base_url(); ?>Notice/searchnotices/"+value, true); //true=Asynchronous Request
				xmlhttp.send(); 
			}
		</script>
	</body>
</html>	