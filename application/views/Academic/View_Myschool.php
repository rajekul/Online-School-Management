<!DOCTYPE html>
<html>
	<head>
		<title>myschool</title>
		<script type='text/javascript' src="<?php echo base_url(); ?>js/formvalidation.js"></script>
		<script type='text/javascript' src="<?php echo base_url(); ?>js/myschoolvalidation.js"></script>
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
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Academic</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="row">
				<form method="post" enctype="multipart/form-data" onsubmit="return validation()">
				<div class="col-sm-1" >
						
				</div>
				<div class="col-sm-7">
					<h3>School Information</h3>	
					<table class="table">
						<tr>
							<td>School Name<span style="color:red">*</span></td>
							<td>
								<input type="text" id="name" name="name"  class="form-control" value="<?php echo set_value('name');if(set_value('name')==''){echo $myschool['schoolname'];}?>" placeholder="School Name" onclick="hide('nameErr')"/>
								<span id="nameErr" style="color:red"></span>
							</td>
						</tr>
						<tr>
							<td>Short Name<span style="color:red">*</span></td>
							<td>
								<input type="text" id="sname" name="sname" class="form-control" value="<?php echo set_value('sname');if(set_value('sname')==''){echo $myschool['shortname'];} ?>" placeholder="School Short Name" onclick="requiredfield('name','nameErr'),hide('snameErr')"/>
								<span id="snameErr" style="color:red"></span>
							</td>
						</tr>
						<tr>
							<td>Since</td>
							<td>
								<input type="text" id="since" name="since" class="form-control" value="<?php echo set_value('since');if(set_value('since')==''){echo $myschool['since'];}?>" placeholder="ex:1994" onclick="requiredfield('sname','snameErr'),hide('sinceErr')"/>
								<span id="sinceErr" style="color:red"></span>
							</td>
						</tr>
						<tr>
							<td>title</td>
							<td>
								<input type="text" id="title" name="title"  class="form-control" value="<?php echo set_value('title');if(set_value('title')==''){echo $myschool['title'];}?>" placeholder=" title" onclick="hide('titleErr')"/>
								<span id="titleErr" style="color:red"></span>
							</td>
						</tr>
						<tr>
							<td>contact</td>
							<td>
								<input type="text" id="contact" name="contact" class="form-control" value="<?php echo set_value('contact');if(set_value('contact')==''){echo $myschool['contact'];} ?>" placeholder=" All Contact no here" onclick="hide('contactErr')"/>
								<span id="contactErr" style="color:red"></span>
							</td>
						</tr>
						<tr>
							<td>email</td>
							<td>
								<input type="text" id="email" name="email" class="form-control" value="<?php echo set_value('email');if(set_value('email')==''){echo $myschool['email'];} ?>" placeholder="some@email.com" onclick="hide('emailErr')"/>
								<span id="emailErr" style="color:red"></span>
							</td>
						</tr>
						<tr>
							<td>Address</td>
							<td>
								<input type="text" id="address" name="address" class="form-control" value="<?php echo set_value('address');if(set_value('address')==''){echo $myschool['address'];} ?>" onclick="emailValidation('email','emailErr'),hide(addressErr)" placeholder="School Address" />
								<span id="addressErr" style="color:red"></span>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="buttonSubmit" value="Update Information" class="btn btn-primary" /></td>
						</tr>
					</table>
				</div>
				<div class="col-sm-4" >
					<br/><br/>
					<h4>Change School Logo</h4>
					<img id="slogo" src="<?php echo base_url().'files/logo/'.$myschool['logo']; ?>" width="180" height="170" style="border:1px solid gray"/>
					<br>
					<input type="hidden" name="pic" value="<?php echo $myschool['logo']; ?>" />
					<input type="file" id="logo" name="logo" class="form-control" value="" style="background-color:lightgray" /> 
					<br>
					<script>
						$('#logo').change( function(event) {
							$("#slogo").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
						});	
					</script>
				</div>
				</form>
			</div><br/>
			
		</div>
	</div>
	</body>
</html>	