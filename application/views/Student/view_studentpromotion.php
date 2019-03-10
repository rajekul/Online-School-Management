<!DOCTYPE html>
<html>
	<head>
		<title>Student</title>
		<?php $this->load->view('view_adminmaster'); ?>
		<div class="row">
			<div class="col-sm-2 hidden-xs hidden-sm">
				<ul style="list-style-type: none; position:fixed; left:140 ; padding: 0; ">
					<h4><span class="glyphicon glyphicon-chevron-down"></span> Student</h4>
					<li><a style="display: block;  padding: 8px 16px; "  href="<?php echo base_url(); ?>student/">Student Info</a></li>
					<li><a style="display: block;  padding: 8px 16px; " href="<?php echo base_url(); ?>student/add">Admission</a></li>
					<li><a style="display: block;  padding: 8px 16px; " href="#">Student Promotion</a></li>
				</ul>
			</div>
			<div class="col-sm-10" style="box-shadow: 2px 2px 8px  lightgray">
				<h4><span class="glyphicon glyphicon-forward"></span> Student Information</h4><hr/>
				<div class="row">
					<div class="col-sm-1" >
							
					</div>
					<div class="col-sm-3">
						<select id="classid" class="form-control">
							<option value="">Select Class</option>
						</select>
					</div>
					<div class="col-sm-3">
						
					</div>
					<div class="col-sm-2" >
						
					</div>
					<div class="col-sm-2 hidden-xs hidden-sm" >
						<a href="<?php echo base_url(); ?>student/add" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-plus-sign"></span> Admit Student</a>
					</div>
					
				</div><br/>
				
				<div class="row">
					<div class="col-sm-7" >
							
					</div>
					<div class="col-sm-4" >
						<input type="text" class="form-control" name="search" id="search"  placeholder="search student" />
					</div>
				</div><br/>
				
				<div class="row">
					<div class="col-sm-1" >
							
					</div>
					<div class="col-sm-10" style="border:1px solid gray;border-radius:6px" >
						Class:<br/>
						Section:<br/>
						<table class="table table-bordered">
							<thead>
								<tr>
									<td>ID</td>
									<td>Name</td>
									<td>Roll</td>
									<td>Action</td>
								</tr>
							</thead>
							<tbody>
							
							</tbody>
						</table>
					</div>
				</div><br/><br/>
			</div>
		</div>
	</div>
	</body>
</html>	