
					<table class="table table-bordered">
						<thead>
							<tr style="background-color:#33bbff">
								<th>Up_Date</th>
								<th>Title</th>
								<th>Syllebus</th>
								<th>Class</th>
								<th colspan="2">Action</th>
							</tr>
						</thead>
						{syllebus}
							<tr>
								<td>{date}</td>
								<td>{title}</td>
									<td><a href="<?php echo base_url(); ?>files/docs/{syllebus}">{syllebus}</a></td>
								<td>{classname}</td>
								<td><a  data-toggle="modal" data-target="#{serial}edit">Update</a></td>
								<td><a style="color:red" data-toggle="modal" data-target="#{serial}delete">Delete</a></td>
							</tr>
							
							<div id="{serial}edit" class="modal fade" role="dialog">
							  <div class="modal-dialog modal-sm">
								<div class="modal-content">
								  <div class="modal-header">
									<br/>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Update Class {classname} syllebus</h4>
								  </div>
								  <div class="modal-body">
									<form action="<?php echo base_url(); ?>classes/editsyllebus" method="post" enctype="multipart/form-data">
										Upload File:<input type="file"  name="fileup" class="form-control" />
										<input type="hidden"  name="syllebus" class="form-control" value="{syllebus}">
										<input type="hidden"  name="serial" class="form-control" value="{serial}">
										<input type="hidden"  name="classid" class="form-control" value="{classid}">
										<br/>
										<input type="submit" name="buttonSubmit" value="Update Syllebus" class="btn btn-primary" />
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
									<h4 class="modal-title">Delete Class {classname} syllebus</h4>
								  </div>
								  <div class="modal-body">
									<form action="<?php echo base_url(); ?>classes/deletesyllebus" method="post" enctype="multipart/form-data">
										<span style="color:red">
										Are You Sure to Delete the Syllebus !!!
										</span>
										<input type="hidden"  name="syllebus" class="form-control" value="{syllebus}">
										<input type="hidden"  name="serial" class="form-control" value="{serial}">
										<br/><br/>
										<input type="submit" name="buttonSubmit" value="Confirm" class="btn btn-primary" />
									</form>
									<button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
								  </div>
								</div>
							  </div>
							</div>
						{/syllebus}
					</table>
					