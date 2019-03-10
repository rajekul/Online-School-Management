<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Home </title>
    <link rel="shortcut icon" href="<?php echo base_url().'files/logo/'.$info['logo']; ?>">
    <link href="<?php echo base_url(); ?>css/family-raleway.css" rel="stylesheet" type="text/css" media="screen">
     <link href="<?php echo base_url(); ?>template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox_css/venobox.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
</head>

<body data-spy="scroll" data-target=".navbar-fixed-top">
    <header>
        <nav class="navbar-inverse navbar_bg navbar-fixed-top" id="navbar-example" data-spy="affix">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<i class="fa fa-bars"></i>
		  </button>
                </div>
                <a class="navbar-brand" href="<?php echo base_url(); ?>"><h4><?php echo $info['shortname']; ?></h4></a>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="navbar-right">
                        <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><a href="#news_part">News & Events</a></li>
                        <li><a href="#achievement_part">Our Achievement</a></li>
                        <li><a href="#information_part">Information</a></li>
                        <li><a href="#footer_part">Contact Us</a></li>
                        <li><a href="<?php echo base_url(); ?>user">Administrator</a></li>
                        <li><a href="http://localhost/osms/">Student Login</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </header>
    <!--   banner_part start-->
    