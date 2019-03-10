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
				
				<div class="col-sm-8">
					<h4>Add Notice</h4>
					<form method="post" onsubmit="return requiredfield('notice','noticeErr')">
						<table  class="table">
							<tr>
								<td>TITLE</td>
								<td>
									<input type="text" id="title" name="title" value="<?php echo set_value('title');?>" class="form-control" onclick="hide('titleErr')"/>
									<span style="color:red" id="titleErr"></span>
								</td>
							</tr>
							
							<tr>
								<td>VIEWER</td>
								<td>
									<select id="viewer" name="viewer" class="form-control" onclick="requiredfield('title','titleErr'),hide('viewerErr')">
										<option value="homepage" <?php echo set_select('viewer','homepage'); ?>>Homepage</option>
										<option value="all" <?php echo set_select('viewer','all'); ?>>All</option>
										<option value="staff" <?php echo set_select('viewer','staff'); ?>>Staff</option>
										<option value="student" <?php echo set_select('viewer','student'); ?>>Student</option>
									</select>
									<span style="color:red" id="viewerErr"></span>
								</td>
							</tr>
							<tr>
								<td>NOTICE</td>
								<td>
									<textarea rows="6" cols="40" id="notice" name="notice" class="form-control" onclick="hide('noticeErr')"><?php echo set_value('notice');?></textarea>
									<span style="color:red" id="noticeErr"></span>
								</td>
							</tr>
							<tr>
								<td></td>
								<td>
									<input type="submit" name="buttonSubmit" value="Add Notice" class="btn btn-primary" />
								</td>
							</tr>
						</table>
					</form>
				</div>
				
			</div><br/><br/>
		
		</div>
	
	</body>
</html>	