<!DOCTYPE html>
<html>
	<head>
		<title>Parent</title>
		
		<script type='text/javascript' src="<?php echo base_url(); ?>js/formvalidation.js"></script>
		<script type='text/javascript' src="<?php echo base_url(); ?>js/studentform1.js"></script>
		
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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Edit Parent</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			
			
			<div class="row">
				
				<div class="col-sm-5" >
					<?php 
						if($message!=''){
							echo '<div class="alert alert-danger alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
							<strong>Errors!</strong>'.$message.'</div>';
						}
					?>
				</div>
				
			</div>
				
				<div class="row">
					
					<div class="col-sm-9" style="box-shadow:4px 4px 4px #d9d9d9;border:1px solid lightgray;">
						<div class="row" >
							<div class="col-sm-12" style="background-color:#f2f2f2">
								<h2>Parent Information</h2>
							</div>
						</div><br/>
						
						
					<form method="post" enctype="multipart/form-data" onsubmit="return validation()">
					
					<span id="eparent">	
						<strong>Father's Details</strong><br/><br/>
						<div class="row">
							<div class="col-sm-7" >
								<table class="table">
									<tr>
										<td>Name<span style="color:red">*</span></td>
										<td>
											<input type="text" id="fname" name="fname" class="form-control" value="<?php  if(set_value('fname')==''){echo $father['parentname'];} else{ echo set_value('fname');} ?>" onclick="hide('fnameErr')" placeholder="Father's Name"/>
											<span id="fnameErr" style="color:red"></span>
										</td>
									</tr>
									<tr>
										<td>Email</td>
										<td>
											<input type="text" id="femail" name="femail" class="form-control" value="<?php  if(set_value('femail')==''){echo $father['parentemail'];} else{ echo set_value('femail');} ?>" onclick="nameValidation('fname','fnameErr'),hide('femailErr')" placeholder="Father's Email"/>
											<span id="femailErr" style="color:red"></span>
										</td>
									</tr>
									<tr>
										<td>Phone<span style="color:red">*</span></td>
										<td>
											<input type="text" id="fphone" name="fphone" class="form-control" value="<?php  if(set_value('fphone')==''){echo $father['parentphone'];} else{ echo set_value('fphone');} ?>" onclick="emailValidation('femail','femailErr'),hide('fphoneErr')" placeholder="Father's Contact Number"/>
											<span id="fphoneErr" style="color:red"></span>
										</td>
									</tr>
									<tr>
										<td>NID<span style="color:red">*</span></td>
										<td>
											<input type="text" id="fnid" name="fnid" class="form-control" value="<?php  if(set_value('fnid')==''){echo $father['nid'];} else{ echo set_value('fnid');} ?>" onclick="requiredfield('fphone','fphoneErr'),phoneValidation('fphone','fphoneErr'),hide('fnidErr')" placeholder="Father's National ID No "/>
											<span id="fnidErr" style="color:red"></span>
										</td>
									</tr>
								</table>	
							</div>
							<div class="col-sm-5" >
								<table class="table">
									<tr>
										<td>Profession<span style="color:red">*</span></td>
										<td>
											<select id="fprofession" name="fprofession" class="form-control" onclick="requiredfield('fnid','fnidErr'),hide('fprofessionErr')">
												<option value="">Profession</option>
												<option value="Businessman" <?php  if( $father['profession']=='Businessman' ){echo 'selected="selected"' ;} else{ echo set_select('fprofession', 'Businessman');} ?>>Businessman</option>
												<option value="Employee" <?php  if( $father['profession']=='Employee' ){echo 'selected="selected"' ;} else{ echo set_select('fprofession', 'Employee');} ?>>Employee</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Annual Income<span style="color:red">*</span></td>
										<td><input type="text" id="fincome" name="fincome" class="form-control" value="<?php  if(set_value('fincome')==''){echo $father['income'];} else{ echo set_value('fincome');} ?>" onclick="requiredfield('fprofession','fprofessionErr'),hide('fincomeErr')" placeholder="Father's Annual Income"/></td>
									</tr>
									<tr>
										<td colspan="2"><span id="fincomeErr" style="color:red"></span></td>
									</tr>
								</table>	
							</div>
						</div><br/>
						<strong>Mother's Details</strong><br/><br/>
						<div class="row">
							<div class="col-sm-7" >
								<table class="table">
									<tr>
										<td>Name<span style="color:red">*</span></td>
										<td>
											<input type="text" id="mname" name="mname" class="form-control" value="<?php if(set_value('mname')==''){echo $mother['parentname'];} else{ echo set_value('mname'); } ?>" onclick="requiredfield('fincome','fincomeErr'),hide('mnameErr')" placeholder="Mother's Name"/>
											<span id="mnameErr" style="color:red"></span>
										</td>
									</tr>
									<tr>
										<td>Email</td>
										<td>
											<input type="text" id="memail" name="memail" class="form-control" value="<?php if(set_value('memail')==''){echo $mother['parentemail'];} else{ echo set_value('memail'); } ?>" onclick="nameValidation('mname','mnameErr'),hide('memailErr')" placeholder="Mother's Email"/>
											<span id="memailErr" style="color:red"></span>
										</td>
									</tr>
									<tr>
										<td>Phone<span style="color:red">*</span></td>
										<td>
											<input type="text" id="mphone" name="mphone" class="form-control" value="<?php  if(set_value('mphone')==''){echo $mother['parentphone'];} else{ echo set_value('mphone');} ?>" onclick="emailValidation('memail','memailErr'),hide('mphoneErr')" placeholder="Mother's Contact Number"/>
											<span id="mphoneErr" style="color:red"></span>
										</td>
									</tr>
									<tr>
										<td>NID<span style="color:red">*</span></td>
										<td>
											<input type="text" id="mnid" name="mnid" class="form-control" value="<?php  if(set_value('mnid')==''){echo $mother['nid'];} else{ echo set_value('mnid'); } ?>" onclick="phoneValidation('mphone','mphoneErr'),hide('mnidErr')" placeholder="Mother's National ID No"/>
											<span id="mnidErr" style="color:red"></span>
										</td>
									</tr>
								</table>	
							</div>
							<div class="col-sm-5" >
								<table class="table">
									
									<tr>
										<td>Profession<span style="color:red">*</span></td>
										<td>
											<select id="mprofession" name="mprofession" class="form-control" onclick="requiredfield('mnid','mnidErr'),hide('mprofessionErr')">
												<option value="">Profession</option>
												<option value="Housewife" <?php if($mother['profession']=='Housewife' ){echo 'selected="selected"' ;} else{ echo set_select('mprofession', 'Housewife');} ?>>Housewife</option>
												<option value="Employee" <?php  if($mother['profession']=='Employee' ){echo 'selected="selected"' ;} else{ echo set_select('mprofession', 'Employee');} ?>>Employee</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Annual Income<span style="color:red">*</span></td>
										<td><input type="text" id="mincome" name="mincome" class="form-control" value="<?php  if(set_value('mincome')==''){echo $mother['income'];} else{ echo set_value('mincome');} ?>" onclick="requiredfield('mprofession','mprofessionErr'),hide('mincomeErr')" placeholder="Mother's Annual Income"/></td>
									</tr>
									<tr>
										<td colspan="2"><span id="mincomeErr" style="color:red"></span></td>
									</tr>
								</table>	
							</div>
						</div><br/>
						<strong>LocalGuardian's Details</strong><br/><br/>
						<div class="row">
							<div class="col-sm-7" >
								<table class="table">
									<tr>
										<td>Name<span style="color:red">*</span></td>
										<td>
											<input type="text" id="lname" name="lname" class="form-control" value="<?php  if(set_value('lname')==''){echo $guardian['parentname'];} else{ echo set_value('lname'); } ?>" onclick="requiredfield('mincome','mincomeErr'),hide('lnameErr')" placeholder="Local Guardian Name"/>
											<span id="lnameErr" style="color:red"></span>
										</td>
									</tr>
									<tr>
										<td>Email</td>
										<td>
											<input type="text" id="lemail" name="lemail" class="form-control" value="<?php if(set_value('lemail')==''){echo $guardian['parentemail'];} else{ echo set_value('lemail'); } ?>" onclick="nameValidation('lname','lnameErr'),hide('lemailErr')" placeholder="Local Guardian Email"/>
											<span id="lemailErr" style="color:red"></span>
										</td>
									</tr>
									<tr>
										<td>Phone<span style="color:red">*</span></td>
										<td>
											<input type="text" id="lphone" name="lphone" class="form-control" value="<?php if(set_value('lphone')==''){echo $guardian['parentphone'];} else{ echo set_value('lphone'); } ?>" onclick="emailValidation('lemail','lemailErr'),hide('lphoneErr')" placeholder="Guardian Contact Number"/>
											<span id="lphoneErr" style="color:red"></span>
										</td>
									</tr>
									<tr>
										<td>NID<span style="color:red">*</span></td>
										<td>
											<input type="text" id="lnid" name="lnid" class="form-control" value="<?php if(set_value('')=='lnid'){echo $guardian['nid'];} else{ echo set_value('lnid');} ?>" onclick="phoneValidation('lphone','lphoneErr'),hide('lnidErr')" placeholder="Guardian National ID No"/>
											<span id="lnidErr" style="color:red"></span>
										</td>
									</tr>
								</table>	
							</div>
							<div class="col-sm-5" >
								<table class="table">
									<tr>
										<td>Profession<span style="color:red">*</span></td>
										<td>
											<select id="lprofession" name="lprofession" class="form-control" onclick="requiredfield('lnid','lnidErr'),hide('lprofessionErr')">
												<option value="">Profession</option>
												<option value="Businessman" <?php if($guardian['profession']=='Businessman' ){echo 'selected="selected"' ;} else{ echo set_select('lprofession', 'Businessman');} ?>>Businessman</option>
												<option value="Employee" <?php  if($guardian['profession']=='Employee' ){echo 'selected="selected"' ;} else{ echo set_select('lprofession', 'Employee');} ?>>Employee</option>
											</select>
										</td>
									</tr>
									<tr>
										<td colspan="2"><span id="lprofessionErr" style="color:red"></span></td>
									</tr>
								</table>
							</div>
						</div><br/>
						<strong>Parent Details</strong><br/><br/>
						<div class="row">
							<div class="col-sm-8">
								<table class="table">
									<tr>
										<td>ParentId<span style="color:red">*</span></td>
										<td>
											<input type="hidden" id="pid" name="pid" class="form-control" value="<?php echo $id;?>"/>
											<?php echo $id;?>
										</td>
									</tr>
									
								</table>
							</div>
						</div><br/>
						
						
						<div class="row">
							<div class="col-sm-9" >
								
							</div>
							<div class="col-sm-2" >
								<input type="submit"  class="btn btn-primary" name="buttonSubmit" value="Update" />
							</div>
						</div><br/>
						</span>
					</form>
					</div>
					
				</div><br/><br/><br/>
			</div>
		</div>
	</div>
	
	</body>
</html>	