<!DOCTYPE html>
<html>
	<head>
		<title>Exam</title>
		
		<?php 
			$usertype=$this->session->userdata('usertype');
			if($usertype=='Admin'){
				$this->load->view('Shared/Admin_Layout');
			}
			else if($usertype=='Register'){
				$this->load->view('Shared/Register_Layout');
			}
			else if($usertype=='Teacher'){
				$this->load->view('Shared/Teacher_Layout');
			}
		?>
			<div class="row">	
                <div class="col-lg-12">
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span>Term  Marksheet [Class : <?php echo $class['classname']; ?>]</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			
			
			
			<div class="row">
				
				<div class="col-sm-12" >
					<ul class="nav nav-tabs">
					<?php
						foreach($sections as $sec){
							if($section['secid']==$sec['secid']){
								$tab='active';
							}
							else{
								$tab='';
							}
							echo '<li class="'.$tab.'"><a href="'.base_url().'Exam/viewtermmarks/'.$class['classid'].'/'.$sec['secid'].'">Section '.$sec['alphaname'].'</a></li>';
						}
					
					?>
					</ul>
				</div>
			</div><br/>
				
				
			<div class="row">
				
				<div class="col-sm-12" id="students">
					<?php
						echo '<div class="row" align="center" ><h2>Term Marksheet</h2><h4>class:'.$class['classname'].' Section:'.$section['alphaname'].'</h4></div>
								<div class="panel-group" id="accordion">
									<div class="panel panel-default">';
						foreach($terms as $term){
							$str='';
							$sub='';
							$markdetail='';
							
				
							foreach($students as $student){
								$mark=0;
								$subtotal=0;
								$gpa=0.00;
								$subcount=0;
								$str.='
									<tr>
									<td>'.$student['sid'].'</td>
									<td>'.$student['studentname'].'</td>
								';
					
					
								foreach($subjects as $subject){
									$totalmark=0;
									$point=0.00;
									$ltg='-';
						
									foreach($exams as $exam){
										if($term['termid']==$exam['termid'])	
											$outof=$exam['exammark'];
											foreach($marks as $mark){
												if($mark['examid']==$exam['examid'] && $mark['subjectcode']==$subject['subjectcode'] && $mark['sid']==$student['sid']){
													$mark=$mark['mark'];
													$conmark=($mark*100)/$outof;
													$contributemark=($conmark*$exam['contribution'])/100;
													$contributemark=intval($contributemark);
													$totalmark+=$contributemark;
													break;
										
												}
												else{
													$contributemark='-';
												}
											}
											$str.='
												<td>'.$contributemark.'</td>
											';
									}
									$subtotal+=$totalmark;
						
									foreach($grades as $grade){
										if($totalmark!=0){
											if($totalmark>=$grade['marksfrom'] && $totalmark<=$grade['marksto']){
												$point=$grade['gradepoint'];
												$ltg=$grade['grade'];
												$gpa+=$point;
												$subcount++;
											}
										}
								
									}
									$str.='
										<td>'.$totalmark.'</td>
										<td>'.$point.'</td>
										<td>'.$ltg.'</td>
									';
						
						
								}
								if($subcount!=0){
									$gpa/=$subcount;
								}
								$gpa=number_format($gpa, 2, '.', ',');
								$grade=$this->ExamModel->getAllgrades();
								$ltgrade='';
								foreach($grades as $grade){
									if($gpa>=$grade['gradepoint'] && $gpa<=$grade['gradepointto']){
										$ltgrade=$grade['grade'];
										break;
									}
									else{
										$ltgrade='NA';
									}
						
								}
								$str.='
									<td style="background-color:#3399ff">'.$subtotal.'</td>
									<td style="background-color:#3399ff">'.$gpa.'</td>
									<td style="background-color:#3399ff">'.$ltgrade.'</td>
								</tr>';
					
							}
				
							foreach($subjects as $subject){
								
								$colspan=3;
								foreach($exams as $exam){
									if($term['termid']==$exam['termid'])
									$colspan++;
									$markdetail.='<td>'.$exam['examname'].'('.$exam['contribution'].'%)</td>';
								}
								$sub.='<th colspan="'.$colspan.'">'.$subject['subjectname'].'</th>';
								$markdetail.='<td>Total Mark</td>
									<td>Point</td>
									<td>Grade</td>';
							}
				
							echo '<div class="panel-heading"border:1px solid white; style="background-color:#9CB770;">
							<h3 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#'.$term['termid'].'">Term : '.$term['term'].'</a>
							</h3>
							</div>
							<div id="'.$term['termid'].'" class="panel-collapse collapse">
							<div class="panel-body" style="overflow: scroll;">
							
								<table class="table table-bordered table-hover" style="background-color:white;border:1px solid lightgray">
									<thead>
									<tr style="background-color:#b3b3b3">
										<th rowspan="2">ID</th>
										<th rowspan="2">Name</th>
										'.$sub.'
										<th rowspan="2">Total Mark</th>
										<th rowspan="2">GPA</th>
										<th rowspan="2">Letter Grade</th>
									</tr>
									<tr style="background-color:#b3b3b3">
										'.$markdetail.'
									</tr>
									</thead>
									<tbody>
										'.$str.'
									</tbody>
								</table></div></div>
							';
						}
						
					
					?>
				</div></div></div>
				
			</div><br/><br/>
		</div>
		
	
	</body>
</html>	