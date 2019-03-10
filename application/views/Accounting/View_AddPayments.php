<!DOCTYPE html>
<html>
	<head>
		<title>Student Fees</title>
		
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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Payments</h2>
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
				
				<div class="col-sm-4"  >
					<div class="alert alert-info alert-dismissable">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
					<strong>Info!</strong>Enter Student Id & Press Next to get Payment Information</div>
					<h4>Student ID</h4>
					<form method="post"  onsubmit="return requiredfield('id','idErr')">
						<input type="text" id="id" name="id" class="form-control" value="<?php echo set_value('id'); ?>"  onclick="hide('idErr'),hide('sidErr')" placeholder="Enter Student id"/>
						<span id="idErr" style="color:red"></span><br/>
						<input type="submit" name="buttonSubmit" value="Next" class="btn btn-primary" />
					</form>
				</div>
				<div class="col-sm-1"  >
					
				</div>
				<div class="col-sm-5" >
					<h3 >Payment Information</h3>
					<form method="post" action="<?php echo base_url(); ?>accounting/submitpayment"  onsubmit="return validation()">
					<table class="table">
						<tr>
							<td>Student ID</td>
							<td>
								:<?php echo $sid; ?>
								<input type="hidden" id="sid" name="sid"  value="<?php echo $sid; ?>" />
								<br/><span id="sidErr" style="color:red"></span>
							</td>
						</tr>
						<tr>
							<td>Name</td>
							<td>
								:<?php echo $name; ?><input type="hidden"  name="name"  value="<?php echo $name; ?>" />
							</td>
						</tr>
						<tr>
							<td>Class (Section)</td>
							<td>
								:<?php echo $class; ?><input type="hidden"  name="class"  value="<?php echo $class; ?>" />
							</td>
						</tr>
						<tr>
							<td>Due</td>
							<td>
								:<?php echo $balance; ?><input type="hidden" name="balance"  value="<?php echo $balance; ?>" />
							</td>
						</tr>
						<tr>
							<td>Details</td>
							<td>
								<input type="text" id="details" name="details" class="form-control" value="<?php echo set_value('details'); ?>"    placeholder="Payment Details"/>
								
							</td>
						</tr>
						<tr>
							<td>Payment</td>
							<td>
								<input type="text" id="amount" name="amount" class="form-control" value="<?php echo set_value('amount'); ?>" onclick="hide('amountErr')"   placeholder="Enter Payment Amount"/>
								<span id="amountErr" style="color:red"></span>
							</td>
						</tr>
						<tr>
							<td>Method</td>
							<td>
								<select id="method" name="method" class="form-control" >
									<option value="cash" <?php echo set_select('method','cash'); ?>>Cash</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Payment For</td>
							<td>
								<select name="sessionid" class="form-control">
									<?php
										
										foreach($sessions as $sessions){
											if($sessions['status']=='current'){ $select='selected="selected"';}
											else{ $select='';}
											echo '<option value="'.$sessions['sessionid'].'"'.$select.''.set_select('sessionid',$sessions['sessionid']).' >'.$sessions['sessions'].'</option>';
										}
									?>
								</select>	
							</td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="buttonSubmit" value="Add Payment" class="btn btn-primary" />
							&nbsp &nbsp
							<a  href="<?php echo base_url(); ?>Accounting/addpayments" class="btn btn-default" role="button"> Cancel</a>
							</td>
						</tr>
					</table>
					</form>
				</div>
			</div><br/>
			
		</div>
	
	</body>
				
	<script>
		function validation(){
			var sid=requiredfield('sid','sidErr');
			var amount=requiredfield('amount','amountErr');
			if(sid==true && amount==true){
				return true;
			}
			else{
				return false;
			}
		}
		
	</script>
</html>	