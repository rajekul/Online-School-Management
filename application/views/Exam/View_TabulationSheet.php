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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Tabulation Sheet [Class : <?php echo $class['classname']; ?>]</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
				
				<div class="row">
					
					<div class="col-sm-8" >
					</div>
					<div class="col-sm-3" >
						<select onchange="Request(this.value)" class="form-control">
							<?php
								
								foreach($sessions as $sessions){
									if($sessions['status']=='current'){ $select='selected="selected"';}
									else{ $select='';}
									echo '<option value="'.$sessions['sessionid'].'" '.$select.' >'.$sessions['sessions'].'</option>';
								}
							?>
						</select>	
					</div>
					
				</div><br/>
				<div class="row">
					
					<div class="col-sm-12" id="tabulationsheet" >
						<?php 
						echo '<div class="row" align="center" ><h2>Tabulation Sheet</h2><h4>(Session: '.$this->session->userdata('currentsession').')</h4></div>
								<div class="panel-group" id="accordion">
									<div class="panel panel-default">';
									$markdetail='';
			
									foreach($sections as $section){
										$str='';
										$sub='';
										$secid=$section['secid'];
										foreach($students as $student){
											if($section['secid']==$student['secid']){
												$mark=0;
												$grandtotal=0;
												$gpa=0.00;
												$subcount=0;
												$str.='
													<tr>
													<td>'.$student['sid'].'</td>
													<td>'.$student['studentname'].'</td>
												';
							
												foreach($subjects as $subject){
													$subtotal=0;
													$point=0.00;
													$ltg='-';
									
													foreach($terms as $term){
														$totalmark=0;
													
														foreach($exams as $exam){
															if($term['termid']==$exam['termid']){
																$outof=$exam['exammark'];
																foreach($marks as $mark){
																	if($mark['examid']==$exam['examid'] && $mark['subjectcode']==$subject['subjectcode'] && $mark['sid']==$student['sid']){
																		$mark=$mark['mark'];
																		$conmark=($mark*100)/$outof;
																		$contributemark=($conmark*$exam['contribution'])/100;
																		$totalmark+=$contributemark;
																		
													
																	}
																	else{
																		$contributemark=0;
																	}
																}
																
																
															}
														}
														$totalmark=($totalmark*$term['con'])/100;
														$totalmark=intval($totalmark);
														$str.='
															<td>'.$totalmark.'</td>
														';
														$subtotal+=$totalmark;
													}
								
													
													foreach($grades as $grade){
														if($subtotal!=0){
															if($subtotal>=$grade['marksfrom'] && $subtotal<=$grade['marksto']){
																$point=$grade['gradepoint'];
																$ltg=$grade['grade'];
																$gpa+=$point;
																$subcount++;
															}
														}
													}
													$str.='
														<td>'.$subtotal.'</td>
														<td>'.$point.'</td>
														<td>'.$ltg.'</td>
													';
													$grandtotal+=$subtotal;
												}
												if($subcount!=0){
													$gpa/=$subcount;
												}
												$gpa=number_format($gpa, 2, '.', ',');
												
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
													<td style="background-color:#3399ff">'.$grandtotal.'</td>
													<td style="background-color:#3399ff">'.$gpa.'</td>
													<td style="background-color:#3399ff">'.$ltgrade.'</td>
												</tr>';

											}
										}
										
										foreach($subjects as $subject){
											$colspan=3;
											foreach($terms as $term){
												$colspan++;
												$markdetail.='<td>'.$term['term'].'('.$term['con'].'%)</td>';
											}
											$sub.='<th colspan="'.$colspan.'">'.$subject['subjectname'].'</th>';
											$markdetail.='<td>Total Mark</td>
												<td>Point</td>
												<td>Grade</td>';
										}
										
										echo ' 
											<div class="panel-heading"border:1px solid white; style="background-color:#9CB770;">
											<h3 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#'.$section['secid'].'">Class:'.$class['classname'].' (Section:'.$section['alphaname'].')</a>
											</h3>
											</div>
											<div id="'.$section['secid'].'" class="panel-collapse collapse">
											<div class="panel-body" style="overflow: scroll;">
							
											<table class="table table-bordered table-hover" style="background-color:white;">
											<thead>
											<tr style="background-color:#b3b3b3">
											<th rowspan="2">ID</th>
											<th rowspan="2">Name</th>
											'.$sub.'
											<th rowspan="2">Grand Total</th>
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
			
								echo '</div></div>';
						
						?>
					</div>
				</div><br/><br/>
				
			</div>
		</div>
	</div>
	<script>
			
			function Request(value) {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("tabulationsheet").innerHTML = xmlhttp.responseText;
					}
				};
				xmlhttp.open("GET", "<?php echo base_url(); ?>Exam/gettabulationsheet/<?php echo $class['classid'];?>/"+value, true); //true=Asynchronous Request
				xmlhttp.send(); 
			}
			function printDiv(divName) {
				 var printContents = document.getElementById(divName).innerHTML;
				 var originalContents = document.body.innerHTML;

				 document.body.innerHTML = printContents;

				 window.print();

				 document.body.innerHTML = originalContents;
			}
		</script>
	</body>
</html>	