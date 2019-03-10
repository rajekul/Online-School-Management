<!DOCTYPE html>
<html>
	<head>
		<title>Payments</title>
		
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
				
				<div class="col-sm-3">
					<select  onchange="" class="form-control" >
						<option value="">All</option>
					</select>
				</div>
			
				<div class="col-sm-5" >
				</div>
				<div class="col-sm-4" >
					<input type="text" onkeyup="" class="form-control"  placeholder="search" />
				</div>
			</div><br/>
			
			<div class="row">
				
				<div class="col-sm-12">
					<h4>Payment History</h4>
					<table class="table table-bordered" style="border:1px solid lightblue">
						<thead>
							<tr style="background-color:lightblue">
								<th>Date</th>
								<th>ID</th>
								<th>Name</th>
								<th>Details</th>
								<th>Amount</th>
								<th>Method</th>
							</tr>
						</thead>
						<tbody>
						{payments}
							<tr>
								<td>{date}</td>
								<td>{sid}</td>
								<td>{studentname}</td>
								<td>{details}</td>
								<td>{amount}</td>
								<td>{method}</td>
							</tr>
						{/payments}
						</tbody>
					</table>
				
				</div>
			</div><br/><br/>
		</div>
	
	
	</body>
</html>	