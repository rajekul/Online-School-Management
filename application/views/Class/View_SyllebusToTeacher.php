<!DOCTYPE html>
<html>
	<head>
		<title>Syllebus</title>
		
		
		<?php 
			
			$this->load->view('Shared/Teacher_Layout');
			
		?>
			<div class="row">	
                <div class="col-lg-12">
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Syllebus</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			
			<div class="row">
				
				<div class="col-sm-10" >
					<h3>Syllebus</h3>
				<span id="getsyllebus">
					<table class="table table-bordered">
						<thead>
							<tr style="background-color:#33bbff">
								<th>Up_Date</th>
								<th>Title</th>
								<th>Syllebus</th>
								<th>Class</th>
								
							</tr>
						</thead>
						{syllebus}
							<tr>
								<td>{date}</td>
								<td>{title}</td>
								<td><a href="<?php echo base_url(); ?>files/docs/{syllebus}">{syllebus}</a></td>
								<td>{classname}</td>
							</tr>
						{/syllebus}
					</table>
					</span>
				</div>
			
			</div>
		</div>
	</div>
	</body>
</html>	