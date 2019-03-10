<!DOCTYPE html>
<html>
	<head>
		<title>Notices</title>
		
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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Notice</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
				
			
			
			
			
			<div class="row">
				
				<div class="col-sm-10" id="notice">
					<table class="table table-hover table-bordered" style="border:1px solid lightgray">
						<thead>
							<tr style="background-color:#b3b3b3">
								<th>Date</th>
								<th>Title</th>
								
							</tr>
						</thead>
						<tbody>
						
						{notices}
							<tr>
								<td>{date}</td>
								<td><a  data-toggle="modal" data-target="#{serial}">{title}</a></td>
							</tr>
							
							<div id="{serial}" class="modal fade" role="dialog">
							  <div class="modal-dialog">
								<div class="modal-content">
								  <div class="modal-header">
									<br/>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">{title}</h4>
								  </div>
								  <div class="modal-body">
								  {notice}
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								  </div>
								</div>
							  </div>
							</div>
						{/notices}
						</tbody>
					</table>
				</div>
			</div><br/><br/>
		</div>
	</div>
	
	
	</body>
</html>	