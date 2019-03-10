<!DOCTYPE html>
<html>
	<head>
		<title>Expenses</title>
		
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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Expenses</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
		<div class="row">
				
				<div class="col-sm-3">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add"><span class="glyphicon glyphicon-plus-sign"></span> Add Expense</button>
				</div>
			
				<div class="col-sm-5" >
				</div>
				<div class="col-sm-4" >
					<input type="text" onkeyup="" class="form-control"  placeholder="search" />
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
				
			</div>
			
			
			<div class="row">
				<div>
					<div id="add" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header">
								<br/>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h3 class="modal-title">Add Expense</h3>
							  </div>
							  <div class="modal-body">
								<form method="post"   onsubmit="return massvalidation();">
										<table class="table">
											
											<tr>
												<td>Title</td>
												<td>
													<input type="text" id="title" name="title" class="form-control" value="<?php echo set_value('title'); ?>"  onclick="hide('titleErr')" placeholder="Title"/>
													<span id="titleErr" style="color:red"></span>
												</td>
											</tr>
											<tr>
												<td>Details</td>
												<td>
													<input type="text" id="details" name="details" class="form-control" value="<?php echo set_value('details'); ?>"   placeholder="Details"/>
												</td>
											</tr>
											<tr>
												<td>Amount</td>
												<td>
													<input type="text" id="amount" name="amount" class="form-control" value="<?php echo set_value('amount'); ?>" onclick="hide('amountErr')" />
													<span id="amountErr" style="color:red"></span>
												</td>
											</tr>
											
											<tr>
												<td></td>
												<td><input type="submit" name="buttonSubmit" value="Add Expense" class="btn btn-primary" /></td>
											</tr>
										</table>
									</form>

							  </div>
							  
							</div>
						</div>
					</div>
				
				</div>
			
				
				<div class="col-sm-12">
					<h4>Expense History</h4>
					<table class="table table-bordered" style="border:1px solid lightblue">
						<thead>
							<tr style="background-color:lightblue">
								<th>Date</th>
								<th>Title</th>
								<th>Details</th>
								<th>Amount</th>
							</tr>
						</thead>
						<tbody>
						{expenses}
							<tr>
								<td>{date}</td>
								<td>{title}</td>
								<td>{details}</td>
								<td>{amount}</td>
							</tr>
						{/expenses}
						</tbody>
					</table>
				
				</div>
			</div><br/><br/>
		</div>
	
	
	</body>
</html>	