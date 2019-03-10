						<strong>Father Details</strong><br/><br/>
							<div class="row">
								<div class="col-sm-7" >
									<table class="table">
										<tr>
											<td>Name</td>
											<td>
												<?php echo $father['parentname']; ?>
											</td>
										</tr>
										<tr>
											<td>Email</td>
											<td>
												<?php echo $father['parentemail']; ?>
											</td>
										</tr>
										<tr>
											<td>Phone</td>
											<td>
												<?php echo $father['parentphone']; ?>
											</td>
										</tr>
										<tr>
											<td>NID</td>
											<td>
												<?php echo $father['nid']; ?>
											</td>
										</tr>
									</table>	
								</div>
								<div class="col-sm-5" >
									<table class="table">
										<tr>
											<td>Profession</td>
											<td>
												<?php echo $father['profession']; ?>
											</td>
										</tr>
										<tr>
											<td>Annual Income</td>
											<td><?php echo $father['income']; ?></td>
										</tr>
										
									</table>	
								</div>
							</div><br/>
							<strong>Mother Details</strong><br/><br/>
							<div class="row">
								<div class="col-sm-7" >
									<table class="table">
										<tr>
											<td>Name</td>
											<td>
												<?php echo $mother['parentname']; ?>
											</td>
										</tr>
										<tr>
											<td>Email</td>
											<td>
												<?php echo $mother['parentemail']; ?>
											</td>
										</tr>
										<tr>
											<td>Phone</td>
											<td>
												<?php echo $mother['parentphone']; ?>
											</td>
										</tr>
										<tr>
											<td>NID</td>
											<td>
												<?php echo $mother['nid']; ?>
											</td>
										</tr>
									</table>	
								</div>
								<div class="col-sm-5" >
									<table class="table">
										<tr>
											<td>Profession</td>
											<td>
												<?php echo $mother['profession']; ?>
											</td>
										</tr>
										<tr>
											<td>Annual Income</td>
											<td><?php echo $mother['income']; ?></td>
										</tr>
										
									</table>	
								</div>
							</div><br/>
							<strong>LocalGuardian Details</strong><br/><br/>
							<div class="row">
								<div class="col-sm-7" >
									<table class="table">
										<tr>
											<td>Name</td>
											<td>
												<?php echo $guardian['parentname']; ?>
											</td>
										</tr>
										<tr>
											<td>Email</td>
											<td>
												<?php echo $guardian['parentemail']; ?>
											</td>
										</tr>
										<tr>
											<td>Phone</td>
											<td>
												<?php echo $guardian['parentphone']; ?>
											</td>
										</tr>
										<tr>
											<td>NID</td>
											<td>
												<?php echo $guardian['nid']; ?>
											</td>
										</tr>
									</table>	
								</div>
								<div class="col-sm-5" >
									<table class="table">
										<tr>
											<td>Profession</td>
											<td>
												<?php echo $guardian['profession']; ?>
											</td>
										</tr>
									</table>	
								</div>
							</div><br/>
							<u><strong>Parent Details</strong></u><br/><br/>
							<div class="row">
								<div class="col-sm-8">
									<table class="table">
										<tr>
											<td>ParentId</td>
											<td>
												<input type="hidden"  name="pid"  value="<?php echo $pid; ?>"/><?php echo $pid; ?>
											</td>
										</tr>
										
									</table>
								</div>
							</div><br/>
							
							
							<div class="row">
								<div class="col-sm-9" >
									
								</div>
								<div class="col-sm-2" >
									<input type="submit"  class="btn btn-primary" name="buttonSubmit" value="Add & Next" />
								</div>
							</div><br/>