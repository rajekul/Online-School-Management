<!DOCTYPE html>
<html>
	<head>
		<title>Student</title>
		
		<?php 
			$this->load->view('Shared/Teacher_Layout');
		?>
			<div class="row">	
                <div class="col-lg-12">
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Student Information [ Class : <?php echo $class['classname']; ?> ] </h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="row">
				
				<div class="col-sm-12" >
					<ul class="nav nav-tabs">
						<li class="<?php if($secid==""){ echo "active" ;}else{ echo '';} ?>"><a href="<?php echo base_url();?>Student/information/<?php echo $class['classid']; ?>">All Student</a></li>
					<?php
						foreach($sections as $section){
							if($secid==$section['secid']){
								$tab='active';
							}
							else{
								$tab='';
							}
							echo '<li class="'.$tab.'"><a href="'.base_url().'Student/information/'.$class['classid'].'/'.$section['secid'].'">Section '.$section['alphaname'].'</a></li>';
						}
					
					?>
					</ul>
				</div>
			</div><br/>
			<div class="row">
					<div class="col-sm-8 " >
						
					</div>
					<div class="col-sm-4" <?php if($secid!=""){ echo 'hidden';}?>>
						<input type="text" name="sid" onkeyup="Searchstudent(this.value)" class="form-control"  placeholder="search student" />
					</div>
			</div><br/>
			<div class="row">
					<div class="col-sm-12" id="students" >
						<table class="table table-bordered" style="border:1px solid lightgray">
							<thead>
								<tr style="background-color:lightblue">
									<th>ID</th>
									<th>Photo</th>
									<th>Name</th>
									<th>Phone</th>
									<th colspan="3">Action</th>
								</tr>
							</thead>
							<tbody>
							
							{students}
								<tr>
									<td>{sid}</td>
									<td><img  class="img-rounded" alt="img of {sid}" src="<?php echo base_url(); ?>files/photos/{photo}" width="30"  style="border:1px solid gray"/></td>
									<td>{studentname}</td>
									<td>{studentphone}</td>
									<td ><a class="text-info" href="<?php echo base_url(); ?>Student/details/{sid}">Details</a> 
								</tr>
							{/students}
							</tbody>
						</table>
					</div>
			</div><br/>
		<script>
			
			function Searchstudent(value) {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("students").innerHTML = xmlhttp.responseText;
					}
				};
				xmlhttp.open("GET", "<?php echo base_url(); ?>student/searchstudent/"+value+"/"+<?php echo $class['classid']; ?>, true); //true=Asynchronous Request
				xmlhttp.send(); 
			}
		</script>
	</div>
	</body>
</html>	