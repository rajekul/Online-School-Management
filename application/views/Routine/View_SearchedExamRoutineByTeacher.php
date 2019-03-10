
					
					<?php 
					echo '<div class="row" align="center" ><h2>Exam Routine</h2><h4>'.$exam['term'].':'.$exam['examname'].'</h4></div>
							<div class="panel-group" id="accordion">
								<div class="panel panel-default">';
		
								foreach($classes as $class){
									$str='';
					
									foreach($examroutine as $routine){
										if($class['classid']==$routine['classid']){
											$timestamp = strtotime($routine['date']);
											$day = date('l', $timestamp);
											$str.='
											<tr>
												<td>'.$routine['date'].'</td>
												<td>'.$day.'</td>
												<td>'.$routine['time'].'</td>
												<td>'.$routine['subjectname'].'</td>
												</tr>
											
										';
										}
										
									}
									echo ' 
											<div class="panel-heading"border:1px solid white; style="background-color:#9CB770;">
												<h3 class="panel-title">
												  <a data-toggle="collapse" data-parent="#accordion" href="#'.$class['classid'].'">Class:'.$class['classname'].'</a>
												</h3>
											</div>
											<div id="'.$class['classid'].'" class="panel-collapse collapse">
												<div class="panel-body" style="overflow: scroll;">
											
													<table class="table table-bordered table-hover" style="background-color:white;">
														<thead>
														<tr style="background-color:#b3b3b3">
															<th>Date</th>
															<th>Day</th>
															<th>Time</th>
															<th>Subject</th>
															
														</tr>
														</thead>
														<tbody>
														'.$str.'
														</tbody>
													</table>
													</div></div>
										';
								}
							
						?>
						</div>
					</div>
				