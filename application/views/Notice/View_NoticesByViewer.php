
					<table class="table table-hover table-bordered" style="border:1px solid lightgray">
						<thead>
							<tr style="background-color:#b3b3b3">
								<th>Date</th>
								<th>Title</th>
								<th>Viewer</th>
								<th colspan="2">Action</th>
							</tr>
						</thead>
						<tbody>
						
						{notice}
							<tr>
								<td>{date}</td>
								<td><a  data-toggle="modal" data-target="#{serial}">{title}</a></td>
								<td>{viewer}</td>
								<td><a  data-toggle="modal" data-target="#{serial}edit">Update</a></td>
								<td ><a class="text-danger" data-toggle="modal" data-target="#{serial}delete">Delete</a></td>
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
							
							<div id="{serial}edit" class="modal fade" role="dialog">
							  <div class="modal-dialog">
								<div class="modal-content">
								  <div class="modal-header">
									<br/>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Update Notice</h4>
								  </div>
								  <div class="modal-body">
									<form action="<?php echo base_url(); ?>Notice/editnotice" method="post">
										<input type="hidden"  name="serial" class="form-control" value="{serial}">
										<input type="text"  name="title" value="{title}" class="form-control"/><br/>
										<textarea rows="6" cols="40"  name="notice" class="form-control" >{notice}</textarea><br/>
										<input type="submit" name="buttonSubmit" value="Update Notice" class="btn btn-primary" />
									</form>
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								  </div>
								</div>
							  </div>
							</div>
							
							<div id="{serial}delete" class="modal fade" role="dialog">
							  <div class="modal-dialog modal-sm">
								<div class="modal-content">
								  <div class="modal-header">
									<br/>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Delete Notice</h4>
								  </div>
								  <div class="modal-body">
									<form action="<?php echo base_url(); ?>Notice/deletenotice" method="post">
										<h4 class="text-danger">
										Are You Sure to Delete the Notice: {title} !!!
										</h4><br/>
										<input type="hidden"  name="serial" class="form-control" value="{serial}">
										<input type="submit" name="buttonSubmit" value="Confirm" class="btn btn-danger" />
									</form>
									<button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
								  </div>
								</div>
							  </div>
							</div>
						{/notice}
						</tbody>
					</table>
				