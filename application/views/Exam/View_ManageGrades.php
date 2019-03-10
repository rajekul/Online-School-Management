<!DOCTYPE html>
<html>
	<head>
		<title>Exam</title>
		<script>
			function markvalidation(field,err){
				if(requiredfield(field,err)){
					var num=document.getElementById(field).value;
					if(IsNumber(num)){
						return true;
					}
					else{
						errmsg(err,field+' Should contain Numeric value');
						return false;
					}
				}
				else{
					return false;
				}
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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Exam Grades</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<div class="row">
				
				<div class="col-sm-10" >
					<ul class="nav nav-tabs">
						<li><a href="<?php echo base_url();?>Exam/grades">Grade List</a></li>
						<li class="active"><a href="<?php echo base_url();?>Exam/managegrades">Add Grades</a></li>
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
					<h3 >Add New Grade</h3>
					<form method="post"  onsubmit="return requiredfield('comment','commentErr')">
					<table class="table">
						<tr>
							<td>Grade</td>
							<td>
								<input type="text" id="grade" name="grade" class="form-control" value="<?php echo set_value('grade'); ?>"  onclick="hide('gradeErr')" placeholder="A+"/>
								<span id="gradeErr" style="color:red"></span>
							</td>
						</tr>
						<tr>
							<td>GradePoint(From)</td>
							<td>
								<input type="text" id="gradepoint" name="gradepoint" class="form-control" value="<?php echo set_value('gradepoint'); ?>"  onclick="requiredfield('grade','gradeErr'),hide('gradepointErr')" placeholder="5.00"/>
								<span id="gradepointErr" style="color:red"></span>
							</td>
						</tr>
						<tr>
							<td>GradePoint(TO)</td>
							<td>
								<input type="text" id="gradepointto" name="gradepointto" class="form-control" value="<?php echo set_value('gradepointto'); ?>"  onclick="requiredfield('gradepoint','gradepointErr'),hide('gradepointtoErr')" placeholder="5.00"/>
								<span id="gradepointtoErr" style="color:red"></span>
							</td>
						</tr>
						<tr>
							<td>Marks(From)</td>
							<td>
								<input type="text" id="mf" name="mf" class="form-control" value="<?php echo set_value('mf'); ?>" onclick="requiredfield('gradepointto','gradepointtoErr'),hide('mfErr')"   placeholder="80"/>
								<span id="mfErr" style="color:red"></span>
							</td>
						</tr>
						<tr>
							<td>Marks(TO)</td>
							<td>
								<input type="text" id="mt" name="mt" class="form-control" value="<?php echo set_value('mt'); ?>" onclick="markvalidation('mf','mfErr'),hide('mtErr')"   placeholder="100"/>
								<span id="mtErr" style="color:red"></span>
							</td>
						</tr>
						<tr>
							<td>Comment</td>
							<td>
								<input type="text" id="comment" name="comment" class="form-control" value="<?php echo set_value('comment'); ?>" onclick="markvalidation('mt','mtErr'),hide('commentErr')"   placeholder="Exelent"/>
								<span id="commentErr" style="color:red"></span>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="buttonSubmit" value="Add Grade" class="btn btn-primary" /></td>
						</tr>
					</table>
					</form>
				</div>
			</div><br/>
			
		</div>
		
	</body>
</html>	