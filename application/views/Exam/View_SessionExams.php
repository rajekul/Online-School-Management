
					<h3>Exam List</h3>
					<?php
						if($terms){
						foreach($terms as $terms){
			
							echo '<table class="table table-bordered">
										<tr>
											<td colspan="3">'.$terms['term'].'-('.$terms['con'].'%)</td>
										</tr>
					
									<tr style="background-color:lightblue">
										<th>Exam Name</th>
										<th>Exam Mark</th>
										<th>Contribution</th>
										
									</tr>
								';
							foreach($exams as $exams){
								if($exams['termid']==$terms['termid']){
									echo '
										<tr>
											<td>'.$exams['examname'].'</td>
											<td>'.$exams['exammark'].'</td>
											<td>'.$exams['contribution'].'%</td>
										</tr>
					
										
									</div>
								</div>
								';
								}
							}
							echo '</table><br/>';
						}
						}
						else{
							echo 'No Exams Found';
						}
					?>
		