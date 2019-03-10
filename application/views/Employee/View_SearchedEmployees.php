
					<table class="table table-hover table-bordered" style="border:1px solid lightgray">
						<thead>
							<tr style="background-color:lightgreen">
								<th>ID</th>
								<th>Name</th>
								<th>phone</th>
								<th>email</th>
								<th>Designation</th>
								<th >Action</th>
							</tr>
						</thead>
						<tbody>
						
						{employees}
							<tr>
								<td>{eid}</td>
								<td>{name}</td>
								<td>{phone}</td>
								<td>{email}</td>
								<td>{designation}</td>
								<td>
									<ul class="btn btn-default" style="list-style-type: none;">
										<li class="dropdown">
											<a class="dropdown-toggle" data-toggle="dropdown" href="#" >Actions<span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a style="color:#0066cc" href="<?php echo base_url(); ?>Employee/profile/{eid}">Details</a></li>
												<li><a style="color:#0066cc" href="<?php echo base_url(); ?>Employee/edit/{eid}">Edit</a></li>
											</ul>
										</li>
									</ul>
								</td>
								
							</tr>
						{/employees}
						</tbody>
					</table>
				