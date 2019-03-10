<!DOCTYPE html>
<html>
	<head>
		<title>Class Period</title>
		<script type='text/javascript' src="<?php echo base_url(); ?>js/periodvalidation.js"></script>
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
						<li ><a href="<?php echo base_url();?>Routine/classperiod">Periods</a></li>
						<li class="active"><a href="<?php echo base_url();?>Routine/updateclassperiod">Update Periods</a></li>
					</ul>
				</div>
			</div><br/>
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
				
			</div><br/>
			<div class="row">
				
				<div class="col-sm-5" >
					<h3>Update Periods</h3>
					<form method="post"  onsubmit="return validation()">
							<table class="table">
								<tr>
									<td>start Time(hh.mm)</td>
									<td>
										<input type="text" id="stime" name="stime" class="form-control" value="<?php echo set_value('stime');if(set_value('stime')==''){echo $period['starttime'];} ?>" onclick="hide('stimeErr')" placeholder="08.00"/>
										<span id="stimeErr" style="color:red"></span>
									</td>
								</tr>
								<tr>
									<td></td>
									<td>
										<select class="form-control" name="ampm" >
											<option>am</option>
											<option>pm</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Class Duration (Min)</td>
									<td >
										<input type="text" id="cd" name="cd" class="form-control" value="<?php echo set_value('cd');if(set_value('cd')==''){echo $period['classduration'];}  ?>" onclick="stimeValidation('stime','stimeErr'),hide(cdErr)" placeholder="45/30"/>
										<span id="cdErr" style="color:red"></span>
									</td>
								</tr>
								<tr>
									<td>Assembly Duration (Min)</td>
									<td >
										<input type="text" id="ad" name="ad" class="form-control" value="<?php echo set_value('ad');if(set_value('ad')==''){echo $period['assembly'];}  ?>" onclick="numericValidation('cd','cdErr'),hide(adErr)" placeholder="45/30"/>
										<span id="adErr" style="color:red"></span>
									</td>
								</tr>
								<tr>
									<td>Tiffin Duration (Min)</td>
									<td >
										<input type="text" id="td" name="td" class="form-control" value="<?php echo set_value('td');if(set_value('td')==''){echo $period['tiffin'];}  ?>" onclick="numericValidation('ad','adErr'),hide(tdErr)" placeholder="45/30"/>
										<span id="tdErr" style="color:red"></span>
									</td>
								</tr>
								<tr>
									<td>Period Before Tiffin</td>
									<td >
										<input type="text" id="bt" name="bt" class="form-control" value="<?php echo set_value('bt');if(set_value('bt')==''){echo $period['beforetiffin'];}  ?>" onclick="numericValidation('td','tdErr'),hide(btErr)" placeholder="4"/>
										<span id="btErr" style="color:red"></span>
									</td>
								</tr>
								<tr>
									<td>Period Before Tiffin</td>
									<td >
										<input type="text" id="at" name="at" class="form-control" value="<?php echo set_value('at');if(set_value('at')==''){echo $period['aftertiffin'];}  ?>" onclick="numericValidation('bt','btErr'),hide(atErr)" placeholder="3"/>
										<span id="atErr" style="color:red"></span>
									</td>
								</tr>
								
								<tr>
									<td></td>
									<td ><input type="submit" name="buttonSubmit" value="Update Period" class="btn btn-primary" /></td>
								</tr>
							</table>
					</form>
				</div>
			</div><br/>
			
		</div>
	</div>
	</body>
</html>	