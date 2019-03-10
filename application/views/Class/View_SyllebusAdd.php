<!DOCTYPE html>
<html>
	<head>
		<title>Syllebus</title>
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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Syllebus</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			
				
				<div class="row">
					<div class="col-sm-11" >
						<ul class="nav nav-tabs">
							<li ><a href="<?php echo base_url();?>Classes/syllebus">Syllebus</a></li>
							<li class="active"><a href="<?php echo base_url();?>Classes/addsyllebus">Add Syllebus</a></li>
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
				
			</div>
				<div class="row">
					
					<div class="col-sm-8" >
						<h3>Add Syllebus</h3>
						<form method="post" enctype="multipart/form-data" >
							<table class="table">
								<tr>
									<td>Title</td>
									<td>
										<input type="text" id="title" name="title" class="form-control" value="<?php echo set_value('title'); ?>"  onclick="hide('titleErr')"/>
										<span id="titleErr" style="color:red"></span>
									</td>
								</tr>
								<tr>
									<td>Class</td>
									<td>
										<select id="classid" name="classid" class="form-control" onclick="requiredfield('title','titleErr'),hide('classidErr')">
											<option value="">Select class</option>
											{classes}
											<option value="{classid}" <?php  echo set_select('classid', '{classid}');?>>{classname}</option>
											{/classes}
										</select>
										<span id="classidErr" style="color:red"></span>
									</td>
								</tr>
								<tr>
									<td>Syllebus</td>
									<td>
										<input type="file"  name="fileup" class="form-control"  onclick="requiredfield('classid','classidErr')"/>
									</td>
								</tr>
								
								<tr>
									<td></td>
									<td><input type="submit" name="buttonSubmit" value="Upload Syllebus" class="btn btn-primary" /></td>
								</tr>
							</table>
						</form>
						
					</div>
					
				</div><br/><br/>
			</div>
		</div>
	</div>
	</body>
</html>	