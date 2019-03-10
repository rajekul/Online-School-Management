<!DOCTYPE html>
<html>
	<head>
		<title>Studentlist</title>
		
		<?php $this->load->view('masterpages/view_teachermaster'); ?>
		
			<div class="col-sm-10" style="box-shadow: 2px 2px 8px  lightgray">
				<h4><span class="glyphicon glyphicon-forward"></span> Students</h4><hr/>
				
				<div class="row">
					<div class="col-sm-1" >
							
					</div>
					<div class="col-sm-10" id="students">
						<?php echo $studentlist; ?>
					</div>
				</div><br/><br/>
			</div>
		</div>
		
	</div>
	</body>
</html>	