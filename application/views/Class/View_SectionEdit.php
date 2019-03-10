<!DOCTYPE html>
<html>
	<head>
		<title>Section</title>
		
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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Section</h2>
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
					<form method="post" onsubmit="return requiredfield('classid','classidErr')">
						<h3>Edit Section</h3>
							<table class="table">
								<tr>
									<td>SecID</td>
									<td>
										<?php echo $section['secid']; ?>
										<input type="hidden"  name="secid" class="form-control" value="<?php echo $section['secid']; ?>" />
									</td>
								</tr>
								<tr>
									<td>Class</td>
									<td>
										<?php echo $class['classname']; ?>
									</td>
								</tr>
								
								<tr>
									<td>AlphaName</td>
									<td>
										<input type="text" id="alphaname" name="alphaname" class="form-control" value="<?php echo set_value('alphaname');if(set_value('alphaname')==''){echo $section['alphaname'];} ?>"  onclick="hide('alphanameErr')" placeholder="A/B/C"/>
										<span id="alphanameErr" style="color:red"></span>
									</td>
								</tr>
								<tr>
									<td>NickName</td>
									<td>
										<input type="text" id="name" name="name" class="form-control" value="<?php echo set_value('name');if(set_value('name')==''){echo $section['nickname'];} ?>" onclick="requiredfield('alphaname','alphanameErr'),hide('nameErr')"   placeholder="Nick Name"/>
										<span id="nameErr" style="color:red"></span>
									</td>
								</tr>
								<tr>
										<td>Seat Limit</td>
										<td>
											<input type="text" id="limit" name="limit" class="form-control" value="<?php echo set_value('limit');if(set_value('limit')==''){echo $section['limit'];}  ?>" onclick="requiredfield('name','nameErr')"   placeholder="seat limit"/>
											<span id="nameErr" style="color:red"></span>
										</td>
									</tr>
								<tr>
									<td></td>
									<td>
									<a href="<?php echo base_url(); ?>classes/managesec/<?php echo $class['classid']; ?>" class="btn btn-info" role="button"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>&nbsp&nbsp
									<input type="submit" name="buttonSubmit" value="Edit Section" class="btn btn-primary" />
									</td>
								</tr>
							</table>
					</form>
				</div>
			</div><br/>
			
		</div>
	</div>
	
	</body>
</html>	