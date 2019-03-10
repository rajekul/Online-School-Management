<!DOCTYPE html>
<html>
	<head>
		<title>Dashboard</title>
		<?php $this->load->view('Shared/Teacher_Layout'); ?>
			<div class="row">	
                <div class="col-lg-12">
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Dashboard</h2>
                </div>
                <!-- /.col-lg-12 -->
			</div>
			<?php 
				if($classteacher){
					echo '<div class="row">
						<div class="col-sm-4">
							<a href="'. base_url().'Attendance/dailyattendance/'.$classteacher['classid'].'/'.$classteacher['secid'].'" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-pencil"></span> Attendance</a>
						</div>
					</div><br/>';
				}
			
			?>
			
			<div class="row">
				
				<div class="col-sm-7">
					<h3>Today Class Schedule</h3><hr/>
					<table class="table table-bordered">
					{dailyroutine}
						<tr>
							<td><b>{periodname}</b><br/>({time})</td>
							<td><b>{subjectname}</b> <a href="<?php echo base_url(); ?>Student/information/{classid}/{secid}">Students</a> | <a href="<?php echo base_url(); ?>Exam/addmarks/{classid}/{secid}/{subjectcode}">Marks</a> <br/>Class:{classname} &nbsp Section:{alphaname}</td>
						</tr>
					{/dailyroutine}
					</table>
				</div>
			</div><br/>
			<div class="row">
				
				<div class="col-sm-12">
					<h3>Class Routine</h3><hr/>
					<?php 
						$day=array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
						
						echo ' <div style="overflow: scroll;">
						
							<table class="table table-bordered table-hover">
								<tr style="background-color:#9999ff"><td>Day/Period</td>';
						foreach($periods as $period){
							echo '<td><b>'.
									$period['periodname'].'</b> ('.
									$period['time'].')
									</td>';
						}
						echo '</tr><tr>';
						for($i=0;$i<count($day);$i++){
							echo '<td><strong>'.$day[$i].'</strong></td>';
							
							foreach($periods as $period){
								$found=false;
								foreach($classroutines as $classroutine){
									if($classroutine['day']==$day[$i] && $classroutine['period']==$period['period']){
										echo '
											<td>
												<b>'.$classroutine['subjectname'].'</b><br/>
												<a href="'.base_url().'Exam/addmarks/'.$classroutine['classid'].'/'.$classroutine['secid'].'/'.$classroutine['subjectcode'].'">Marks</a>|<a href="'.base_url().'Student/information/'.$classroutine['classid'].'/'.$classroutine['secid'].'">Students</a><br/>
												(class:'.$classroutine['classname'].'|Sec:'.$classroutine['alphaname'].')
											 </td>
										';
										$found=true;
										break;
									}
									else{
										$found=false;
									}
								}
								if(!$found){
									echo '<td></td>';
								}
							}
							echo '</tr>';
						}
						echo '</table></div>';


					?>
				</div>
			</div><br/><br/>
			
		</div>
	
	</body>
</html>	