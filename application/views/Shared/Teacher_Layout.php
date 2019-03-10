<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
	<link rel="shortcut icon" href="<?php echo base_url(); ?>files/img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url(); ?>template/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>template/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    
    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>template/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- jQuery -->
    <script src="<?php echo base_url(); ?>template/vendor/jquery/jquery.min.js"></script>
	

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>template/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>template/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url(); ?>template/vendor/raphael/raphael.min.js"></script>
    

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>template/dist/js/sb-admin-2.js"></script>
	
	<script src="<?php echo base_url(); ?>js/jquery-ui.js"></script>
    <link href="<?php echo base_url(); ?>css/jquery-ui.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>css/jquery-ui.structure.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>css/jquery-ui.theme.css" rel="stylesheet" />
	<script type='text/javascript' src="<?php echo base_url(); ?>js/master.js"></script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>Teacher/">
					<div class="row">
						<div class="col-sm-2 hidden-xs hidden-sm">
							<img src="<?php echo base_url().'files/logo/'.$this->session->userdata('logo'); ?>" style="width:40px" alt="logo"/>
						</div>
						<div class="col-sm-10">
							<?php echo $this->session->userdata('schoolname'); ?>
						</div>
					</div>
				</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
				<li>
                    <a class="success"  href="#">
                        <i class="fa fa-angle-double-right "></i> Running Session:<?php echo $this->session->userdata("currentsession"); ?>
                    </a>
                    
                </li>
				
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa  fa-check  fa-fw"> </i> Access Type:<?php echo $this->session->userdata("usertype"); ?> <br/><i class="fa fa-user fa-fw"></i> <?php echo $this->session->userdata("name").'('.$this->session->userdata("username"); ?>) <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="<?php echo base_url(); ?>User/changePassword"><span class="glyphicon glyphicon-lock"></span> Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a style="color:darkred" href="<?php echo base_url(); ?>User/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <h3>&nbsp&nbsp<span class="glyphicon glyphicon-list pull-right"></span>MENUBAR</h3> 
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>Teacher/"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
						<li>
                            <a href="#"><i class="fa fa-group fa-fw"></i> Students<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                 <?php 
									$classes=$this->session->userdata('classes');
									foreach($classes as $class){
										echo '
											<li>
												<a href="'.base_url().'Student/information/'.$class['classid'].'"><i class="fa fa-angle-right  fa-fw"></i> Class '.$class['classname'].' </a>
											</li>
										';
									}
								?>
								
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						
						<li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Attendance<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                
                                
								<li>
									<a href="#">Daily  Report <span class="fa arrow"></span></a>
									<ul class="nav nav-third-level">
                                        
										<?php 
											$classes=$this->session->userdata('classes');
											foreach($classes as $class){
												echo '
													<li>
														<a href="'.base_url().'Attendance/dailyreport/'.$class['classid'].'"><i class="fa fa-angle-right  fa-fw"></i> Class '.$class['classname'].' </a>
													</li>
												';
											}
										?>
                                        
                                    </ul>
								</li>
								<li>
									<a href="#">Attendance Report<span class="fa arrow"></span></a>
									<ul class="nav nav-third-level">
                                        
										<?php 
											$classes=$this->session->userdata('classes');
											foreach($classes as $class){
												echo '
													<li>
														<a href="'.base_url().'Attendance/attendancereport/'.$class['classid'].'"><i class="fa fa-angle-right  fa-fw"></i>  Class '.$class['classname'].' </a>
													</li>
												';
											}
										?>
                                        
                                    </ul>
								</li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
						<li>
                            <a href="#"><i class="fa fa-file-text-o fa-fw"></i> Exam Marks<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
									<a href="#">Marks</a>
								</li>
								<li>
									<a href="#">Exam Marksheet <span class="fa arrow"></span></a>
									<ul class="nav nav-third-level">
                                        
										<?php 
											$classes=$this->session->userdata('classes');
											foreach($classes as $class){
												echo '
													<li>
														<a href="'.base_url().'Exam/viewmarks/'.$class['classid'].'"><i class="fa fa-angle-right  fa-fw"></i> Class '.$class['classname'].' </a>
													</li>
												';
											}
										?>
                                        
                                    </ul>
								</li>
								
								<li>
									<a href="#">Term Marksheet <span class="fa arrow"></span></a>
									<ul class="nav nav-third-level">
                                        
										<?php 
											$classes=$this->session->userdata('classes');
											foreach($classes as $class){
												echo '
													<li>
														<a href="'.base_url().'Exam/viewtermmarks/'.$class['classid'].'"><i class="fa fa-angle-right  fa-fw"></i> Class '.$class['classname'].' </a>
													</li>
												';
											}
										?>
                                        
                                    </ul>
								</li>
								
								<li>
									<a href="#">Tabulation Sheet <span class="fa arrow"></span></a>
									<ul class="nav nav-third-level">
                                        
										<?php 
											$classes=$this->session->userdata('classes');
											foreach($classes as $class){
												echo '
													<li>
														<a href="'.base_url().'Exam/tabulationsheet/'.$class['classid'].'"><i class="fa fa-angle-right  fa-fw"></i> Class '.$class['classname'].' </a>
													</li>
												';
											}
										?>
                                        
                                    </ul>
								</li>
								
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="<?php echo base_url(); ?>Routine/examroutine"><i class="fa fa-calendar fa-fw"></i> Exam Routine</a>
                        </li>
						<li>
                            <a href="<?php echo base_url(); ?>Classes/Syllebus"><i class="fa fa-sitemap fa-fw"></i> Academic Syllebus</a>
                        </li>
						<li>
                            <a href="<?php echo base_url(); ?>Notice/"><i class="fa fa-list-alt fa-fw"></i> Noticeboard</a>
                        </li>  
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
		<div id="page-wrapper">
			<?php 
				if($this->session->flashdata('message')){
					echo '<br/>
						<div class="alert alert-success alert-dismissable">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
						<strong>Message: </strong> '.$this->session->flashdata('message').'</div>';
				}
				
			?>