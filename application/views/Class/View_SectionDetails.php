<!DOCTYPE html>
<html>
	<head>
		<title>Class</title>
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
					
				<div class="col-sm-5">
					
					<h3>Section Details</h3>
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
								<?php echo $section['alphaname']; ?>
							</td>
						</tr>
						<tr>
							<td>NickName</td>
							<td>
								<?php echo $section['nickname']; ?>
							</td>
						</tr>
						<tr>
							<td>Total Student</td>
							<td>
								<?php echo $totalstudent; ?> <a href="<?php echo base_url().'Student/information/'.$class['classid'].'/'.$section['secid'];?>" >  View</a>
							</td>
						</tr>
						<tr>
							
						</tr>
					</table>
					
					<br/>
					<a href="<?php echo base_url(); ?>classes/managesec/<?php echo $class['classid']; ?>" class="btn btn-info" role="button"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>&nbsp&nbsp
					<a href="<?php echo base_url(); ?>Classes/editsec/<?php echo $section['secid']; ?>" class="btn btn-primary" role="button">Edit</a>	
					
				</div>
			
			</div><br/>
		</div>
	</div>
	</body>
</html>	