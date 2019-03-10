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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Class</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="row">
					
				<div class="col-sm-5">
					<h3>Class Details</h3>
				
					<table class="table">
						<tr>
							<td>ClassID</td>
							<td><?php echo $class['classid']; ?></td>
						</tr>
						<tr>
							<td>Class</td>
							<td><?php echo $class['classname']; ?></td>
						</tr>
						<tr>
							<td>Total Student</td>
							<td><?php echo $totalstudent; ?> <a href="<?php echo base_url().'Student/information/'.$class['classid'];?>" >  View</a></td>
						</tr>
						<tr>
							<td>Total Section</td>
							<td><?php echo $totalsection; ?> <a href="<?php echo base_url().'Classes/managesec/'.$class['classid'];?>" >  View</a></td>
						</tr>
					</table><br/>
					
					<a href="<?php echo base_url(); ?>Classes/manageclass" class="btn btn-info" role="button"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>&nbsp&nbsp
					<a href="<?php echo base_url().'Classes/editclass/'. $class['classid']; ?>" class="btn btn-primary" role="button"> Edit</a>
				
				</div>
			
			</div><br/>
		</div>
	</div>
	</body>
</html>	
