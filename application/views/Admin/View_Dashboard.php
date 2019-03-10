<!DOCTYPE html>
<html>
	<head>
		<title>Dashboard</title>
		
		<script src="<?php echo base_url(); ?>js/canvasjs.min.js"></script>
		
		<script>
			window.onload = function () {
				var chart = new CanvasJS.Chart("chartContainer", {
					theme: "theme1",//theme1
					title:{
						text: "Number of Students/Year"              
					},
					animationEnabled: false,   // change to true
					data: [              
					{
						// Change type to "bar", "area", "spline", "pie",etc.
						type: "column",
						dataPoints:<?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
					}
					]
				});
				chart.render();
			}
		</script>
		<?php $this->load->view('Shared/Admin_Layout'); ?>
		
			<div class="row">	
                <div class="col-lg-12">
                    <h2 class="page-header"><span class="glyphicon glyphicon-menu-right"></span> Dashboard</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-group fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $totalstudent; ?></div>
                                    <div>Total Student</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url(); ?>Student/">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-suitcase fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $totalemployee; ?></div>
                                    <div>Total Employee</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url(); ?>Employee/">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bar-chart-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $percent; ?>%</div>
                                    <div>Total Present Today</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-money fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $balance; ?></div>
                                    <div>Account Balance</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                   
                <div class="col-lg-7">
					<div id="chartContainer"></div>
				</div>
                <div class="col-lg-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-calendar fa-fw"></i> Upcoming Events
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <table class="table table-bordered">
									<tr style="background-color:lightgray">
										<td>Event</td>
										<td>Date</td>
									</tr>
									<tr>
										<td>Eid-ul-Adha</td>
										<td>Sep 2</td>
									</tr>
									<tr>
										<td>Durga Puja</td>
										<td>Sep 30</td>
									</tr>
									<tr>
										<td>Ashura</td>
										<td>Oct 1</td>
									</tr>
									<tr>
										<td>Victory Day</td>
										<td>Dec 16</td>
									</tr>
								</table>
                            </div>
                            <!-- /.list-group -->
                            <a href="#" class="btn btn-default btn-block">View All</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


</body>

</html>
