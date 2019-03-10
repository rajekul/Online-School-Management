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
					<h3 >Payment Recept</h3>
					<table class="table">
						<tr>
							<td>Date</td>
							<td>
								:<?php echo $date; ?>
								
							</td>
						</tr>
						<tr>
							<td>Student ID</td>
							<td>
								:<?php echo $sid; ?>
								
							</td>
						</tr>
						<tr>
							<td>Name</td>
							<td>
								:<?php echo $name; ?>
							</td>
						</tr>
						<tr>
							<td>Class (Section)</td>
							<td>
								:<?php echo $class; ?>
							</td>
						</tr>
						<tr>
							<td>Due</td>
							<td>
								:<?php echo $balance-$amount; ?>
							</td>
						</tr>
						<tr>
							<td>Details</td>
							<td>
								<?php echo $details; ?>
							</td>
						</tr>
						<tr>
							<td>Paid</td>
							<td>
								<?php echo $amount; ?>
							</td>
						</tr>
						<tr>
							<td>Method</td>
							<td>
								<?php echo $method; ?>
							</td>
						</tr>
						<tr>
							<td>Payment For</td>
							<td>
								<?php echo $session; ?>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><a  href="<?php echo base_url(); ?>Accounting/addpayments" class="btn btn-default" role="button"> Back</a></td>
						</tr>
					</table>
					
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