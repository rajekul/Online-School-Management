
					<table class="table table-bordered table-hover" style="border:1px solid lightgray">
						<thead>
							<tr style="background-color:#3385ff">
								<th>ID</th>
								<th>Name</th>
								<th>Phone</th>
								<th>Email</th>
								<th >Address(Present/Guardian)</th>
								<th >Relation</th>
								<th >Action</th>
							</tr>
						</thead>
						<tbody>
						{parents}
							<tr>
								<td>{pid}</td>
								<td>{parentname}</td>
								<td>{parentphone}</td>
								<td>{parentemail}</td>
								<td>{present}/{guardian}</td>
								<td>{relation}</td>
								<td>
									<ul class="btn btn-default" style="list-style-type: none;">
										<li class="dropdown">
											<a class="dropdown-toggle" data-toggle="dropdown" href="#" >Actions<span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a style="color:#0066cc" href="<?php echo base_url(); ?>Parents/details/{pid}">Details</a></li>
												<li><a style="color:#0066cc" href="<?php echo base_url(); ?>Parents/edit/{pid}">Edit</a></li>
												<li><a style="color:#0066cc" href="<?php echo base_url(); ?>Parents/editAddress/{pid}">Edit Address</a></li>
											</ul>
										</li>
									</ul>
								</td>
							</tr>
						{/parents}
						</tbody>
					</table>
				