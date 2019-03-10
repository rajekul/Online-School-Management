
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
					