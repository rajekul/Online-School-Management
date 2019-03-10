<!DOCTYPE html>
<html>
	<head>
		<title>Index</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="<?php echo base_url(); ?>files/img/logo.png">
		<link href="<?php echo base_url();?>template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<script src="<?php echo base_url();?>template/vendor/jquery/jquery-2.2.3.min.js"></script>
		<script src="<?php echo base_url();?>template/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script type='text/javascript' src="<?php echo base_url(); ?>js/master.js"></script>
		<script type='text/javascript' src="<?php echo base_url(); ?>js/login.js"></script>
	</head>
	<body style=" background-image: url('<?php echo base_url(); ?>files/logo/index.jpg');background-repeat: no-repeat;background-attachment: fixed;  background-size: 100% 100%;">
		<div style="position:absolute;left:0;top:0;width:100%;height:100%;background-color:rgba(156, 183, 112,.8);">
			<div align="center">
				<br/>
				<img src="<?php echo base_url().'files/logo/'.$myschool['logo']; ?>" width="190" alt="school logo"><br/>
				<font face="Bookman Old Style" size="16" color=""><?php echo $myschool['schoolname']; ?></font>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
					</div>
					<div class="col-sm-4" style="background-color:rgba(192, 192, 192,.5);border-radius:10px;color:#2952a3">
						<br/><font size="6">Login Panel</font><hr/>
						<form method="post" action="<?php echo base_url(); ?>User/login" onsubmit="return loginvalidation()">
							<input type="text" style="background-color:rgba(0, 0, 0,.6);color:white;border:1px solid gray" class="form-control" name="username" id="username" value="<?php echo $username; ?>" placeholder="Enter Userid" autofocus onclick="hide('usernameErr')"/>
							<span style="color:#990000" id="usernameErr"></span><br/>
							<input type="password" style="background-color:rgba(0, 0, 0,.6);color:white;border:1px solid gray" class="form-control" name="password" id="password" value="" placeholder="Enter Password" onclick="requiredfield('username','usernameErr'),hide('passwordErr')"/>
							<span style="color:#990000" id="passwordErr"><?php echo $message; ?></span><br/>
							<button type="submit" style="font-size:18px;width:100%;" class="btn btn-primary" name="buttonSubmit"  onclick="loginvalidation()"/>login <span class="glyphicon glyphicon-log-in"></span></button>
							<br/><br/><a href="#" style="color:#2952a3">Forgot password??</a>
							<br/><br/>
						</form>
					</div>
					<div class="col-sm-4">
					</div>
				</div>
			</div>
		</div>
	</body>
</html>