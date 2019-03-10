<!DOCTYPE html>
<html>
	<head>
		<title>Exam</title>
		<script>
			function Request(value) {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("examsbysession").innerHTML = xmlhttp.responseText;
					}
				};
				xmlhttp.open("GET", "<?php echo base_url(); ?>Exam/examsbysession/"+value, true); //true=Asynchronous Request
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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Exam</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			
			
			
				
				
			<div class="row">
				
				<div class="col-sm-10" >
					<ul class="nav nav-tabs">
						<li class="active"><a href="<?php echo base_url();?>Exam/">Exam List</a></li>
						<li><a href="<?php echo base_url();?>Exam/manageexam">Add Exam</a></li>
					</ul>
				</div>
			</div><br/>
			<div class="row">
				
				<div class="col-sm-4" >
				</div>
				<div class="col-sm-3" >
					<select onchange="Request(this.value)" class="form-control">
						<?php
							
							foreach($sessions as $sessions){
								if($sessions['status']=='current'){ $select='selected="selected"';}
								else{ $select='';}
								echo '<option value="'.$sessions['sessionid'].'"'.$select.' >'.$sessions['sessions'].'</option>';
							}
						?>
					</select>	
				</div>
				
			</div>
			<br/>
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
				
				<div class="col-sm-7" id="examsbysession" >
					<h3>Exam List</h3>
					<?php
						foreach($terms as $term){
							
							echo '<table class="table table-bordered">
										<tr>
											<td colspan="3">'.$term['term'].'-('.$term['con'].'%)</td>
											<td><a  data-toggle="modal" data-target="#'.$term['termid'].'edit">Update</a></td>
											<td><a style="color:red" data-toggle="modal" data-target="#'.$term['termid'].'delete">Delete</a></td>
										</tr>
					
									<div id="'.$term['termid'].'edit" class="modal fade" role="dialog">
										<div class="modal-dialog modal-sm">
											<div class="modal-content">
												<div class="modal-header">
													<br/>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Update '.$term['term'].'</h4>
												</div>
												<div class="modal-body">
													<form action="'.base_url().'Exam/editterm" method="post">
													<input type="hidden"  name="termid" class="form-control" value="'.$term['termid'].'">
													Term:<input type="text"  name="term" class="form-control" value="'.$term['term'].'"><br/>
													Contribution%:<input type="text"  name="contribution" class="form-control" value="'.$term['con'].'"><br/>
													<input type="submit" name="buttonSubmit" value="Update Term" class="btn btn-primary" />
													</form>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
					
									<div id="'.$term['termid'].'delete" class="modal fade" role="dialog">
										<div class="modal-dialog modal-sm">
											<div class="modal-content">
												<div class="modal-header">
													<br/>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Delete '.$term['term'].'</h4>
												</div>
												<div class="modal-body">
													<form action="'.base_url().'Exam/deleteterm" method="post">
													<span style="color:red">
														Are You Sure to Delete '.$term['term'].' !!!
													</span>
													<input type="hidden"  name="termid" class="form-control" value="'.$term['termid'].'">
													<br/><br/>
													<input type="submit" name="buttonSubmit" value="Confirm" class="btn btn-primary" />
													</form>
													<button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
												</div>
											</div>
										</div>
									</div>
					
									<tr style="background-color:lightblue">
										<th>Exam Name</th>
										<th>Exam Mark</th>
										<th>Contribution</th>
										<th colspan="2">Action</th>
									</tr>
								';
							foreach($exams as $exam){
								if($exam['termid']==$term['termid']){
									echo '
										<tr>
											<td>'.$exam['examname'].'</td>
											<td>'.$exam['exammark'].'</td>
											<td>'.$exam['contribution'].'%</td>
											<td><a  data-toggle="modal" data-target="#'.$exam['examid'].'editexam">Update</a></td>
											<td><a style="color:red" data-toggle="modal" data-target="#'.$exam['examid'].'deleteexam">Delete</a></td>
										</tr>
					
										<div id="'.$exam['examid'].'editexam" class="modal fade" role="dialog">
											<div class="modal-dialog modal-sm">
												<div class="modal-content">
													<div class="modal-header">
														<br/>
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Update '.$exam['examname'].'</h4>
													</div>
													<div class="modal-body">
														<form action="'.base_url().'Exam/editexam" method="post">
														<input type="hidden"  name="examid" class="form-control" value="'.$exam['examid'].'">
														Exam:<input type="text"  name="exam" class="form-control" value="'.$exam['examname'].'"><br/>
														Exam Mark:<input type="text"  name="mark" class="form-control" value="'.$exam['exammark'].'"><br/>
														Contribution%:<input type="text"  name="contribution" class="form-control" value="'.$exam['contribution'].'"><br/>
														<input type="submit" name="buttonSubmit" value="Update Exam" class="btn btn-primary" />
														</form>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div>
					
										<div id="'.$exam['examid'].'deleteexam" class="modal fade" role="dialog">
											<div class="modal-dialog modal-sm">
												<div class="modal-content">
													<div class="modal-header">
														<br/>
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Delete '.$exam['examname'].'</h4>
												</div>
											<div class="modal-body">
												<form action="'.base_url().'Exam/deleteexam" method="post">
												<span style="color:red">
													Are You Sure to Delete '.$term['term'].' '.$exam['examname'].' !!!
												</span>
												<input type="hidden"  name="examid" class="form-control" value="'.$exam['examid'].'">
												<br/><br/>
												<input type="submit" name="buttonSubmit" value="Confirm" class="btn btn-primary" />
												</form>
												<button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
											</div>
										</div>
									</div>
									</div>
									';
								}
							}
							echo '</table><br/>';
						}
					?>
		
				</div>
			</div><br/>
				
		</div>
	
	</body>
</html>	