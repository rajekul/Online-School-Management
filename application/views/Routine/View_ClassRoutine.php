<!DOCTYPE html>
<html>
	<head>
		<title>Class Routine</title>
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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Class Routine</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
				
				
			<div class="row">
				<div class="col-sm-9" ></div>
				<div class="col-sm-2" >
					<a type="button" class="btn btn-primary" href="<?php echo base_url(); ?>Routine/classroutineadd"><span class="glyphicon glyphicon-plus-sign"></span> Add Class Routine</a>	
				</div>
			</div><br/>
			<div class="row">
				<div class="col-sm-12 ">
					
					<?php echo $routine; ?>
				</div>
				
			</div><br/>
				
			</div><br/>
		</div>
	</div>
	</body>
</html>	