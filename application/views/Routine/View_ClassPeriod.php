<!DOCTYPE html>
<html>
	<head>
		<title>Class Period</title>
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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Class Period</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<div class="row">
				
				<div class="col-sm-10" >
					<ul class="nav nav-tabs">
						<li class="active"><a href="<?php echo base_url();?>Routine/classperiod">Periods</a></li>
						<li><a href="<?php echo base_url();?>Routine/updateclassperiod">Update Periods</a></li>
					</ul>
				</div>
			</div><br/>
			<div class="row">
				
				<div class="col-sm-5" >
					<h3>Periods</h3>
					<table class="table table-bordered">
						<tr style="background-color:lightgreen">
							<th>Period</th>
							<th>Time</th>
						</tr>
						{periods}
						<tr>
							<td>{periodname}</td>
							<td>{time}</td>
						</tr>
						{/periods}
					</table>
				</div>
			</div><br/>
				
			
		</div>
	</div>
	</body>
</html>	