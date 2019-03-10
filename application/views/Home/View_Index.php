<?php
	$this->load->view("Shared/Home_Layout");
?>
<section id="banner_part">
       <div class="container">
           <div class="row">
               <div class="col-md-8">
                   <div class="banner"> 
<!--                      carosol start-->
                       <div id="myCarousel" class="carousel slide" data-ride="carousel">
                          <!-- Indicators -->
                          <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                            <li data-target="#myCarousel" data-slide-to="4"></li>
                          </ol>

                          <!-- Wrapper for slides -->
                          <div class="carousel-inner">
                            <div class="item active">
                              <img src="<?php echo base_url(); ?>files/img/banner_image2.jpg" alt="Los Angeles">
                            </div>

                            <div class="item">
                              <img src="<?php echo base_url(); ?>files/img/banner_image.jpg" alt="Los Angeles">
                            </div>

                            <div class="item">
                               <img src="<?php echo base_url(); ?>files/img/banner_image3.jpg" alt="Los Angeles">
                            </div>
                            
                            <div class="item">
                               <img src="<?php echo base_url(); ?>files/img/banner_image4.jpg" alt="Los Angeles">
                            </div>
                            
                            <div class="item">
                               <img src="<?php echo base_url(); ?>files/img/banner_image5.jpg" alt="Los Angeles">
                            </div>
                          </div>

                          <!-- Left and right controls -->
                           <div class="index">
                              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                          </a>
                          </div>
                        </div>      
                  <!--                      carosol start end--> 
                              
                   </div>
                   
               </div>
               <div class="col-md-4">
                   <div class="notice">
                       <div class="panel panel-primary">
                          <div class="panel-heading">Notice</div>
                          <div class="panel-body table-responsive">
                              <table class="table table-striped table-condensed table-hover table-text">
							  {notices}
								  <tr>
                                      <td>{date}</td>
                                      <td>{notice}</td>                                      
                                  </tr>
                              {/notices}   
                              </table>
                          
                          </div>
                      </div>
                   </div>
               </div>

<!--
               <div class="icon">
                   <i class="fa fa-facebook"></i>
                  <a href="http://dhakaeducationboard.gov.bd/" target="_blank" title="মাধ্যমিক ও উচ্চমাধ্যমিক শিক্ষা বোর্ড, ঢাকা"><img src="img/dhaka_board_logo.png" width="35" alt=""></a>
               </disection
           </div>
-->
       </div>
        </div>
    </section>
    <!--   banner_part end

    <!--News & Events start-->
    <section id="news_part">
        <h4>News & Events</h4>
        <div class="container">
            <div class="row">
                <!-- 1st event start -->
                <div class="col-md-3">
                    <div class="event">
                        <img src="<?php echo base_url(); ?>files/img/1.jpg" class="img-responsive " alt="">
                        <h5>Discussion Against Extremism and Terrorism</h5>
                        <p>Dhaka Commerce College organised a discussion programme at Professor Kazi Nurul Islam Faruky Auditorium...</p>
                        <a href="#" data-toggle="modal" data-target="#myModal">Read More <span class="fa fa-long-arrow-right"></span></a>
                        <!-- modal start-->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h5 class="modal-title"></h5>
                                    </div>
                                    <div class="modal-body">
                                        <p>Dhaka Commerce College organised a discussion programme at Professor Kazi Nurul Islam Faruky Auditorium on 3 September 2016 with a view to raising national awareness against extremism and terrorism. On this occasion the chief orator was Md Sahjahan Ali, Assistant Professor, Bangla Department. The programme was presided over by the Principal of the college Professor Md Abu Syeed. Vice Principal (Administration) Professor Md Shafiqul Islam, Academic Advisor Professor Md Mojahar Jamil and Convener of the Cultural Committee Md Saidur Rahman Mian also spoke at the programme. All the teachers, staff and students of the college spontaneously attended the programme.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--                modal end-->
                    </div>
                </div>
                <!--            1st event end-->
                <!--            2nd event start-->
                <div class="col-md-3">
                    <div class="event">
                        <img src="<?php echo base_url(); ?>files/img/8.jpg" class="img-responsive" alt="">
                        <h5>Discussion Against Extremism and Terrorism</h5>
                        <p>Dhaka Commerce College organised a discussion programme at Professor Kazi Nurul Islam Faruky Auditorium...</p>
                        <a href="#" data-toggle="modal" data-target="#myModal">Read More <span class="fa fa-long-arrow-right"></span></a>
                        <!-- modal start-->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h5 class="modal-title"></h5>
                                    </div>
                                    <div class="modal-body">
                                        <p>Dhaka Commerce College organised a discussion programme at Professor Kazi Nurul Islam Faruky Auditorium on 3 September 2016 with a view to raising national awareness against extremism and terrorism. On this occasion the chief orator was Md Sahjahan Ali, Assistant Professor, Bangla Department. The programme was presided over by the Principal of the college Professor Md Abu Syeed. Vice Principal (Administration) Professor Md Shafiqul Islam, Academic Advisor Professor Md Mojahar Jamil and Convener of the Cultural Committee Md Saidur Rahman Mian also spoke at the programme. All the teachers, staff and students of the college spontaneously attended the programme.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--    ss modal end-->
                    </div>
                </div>
                <!--            2nd event end-->
                <!--            3rd event start-->
                <div class="col-md-3">
                    <div class="event">
                        <img src="<?php echo base_url(); ?>files/img/3.jpg" class="img-responsive " alt="">
                        <h5>Discussion Against Extremism and Terrorism</h5>
                        <p>Dhaka Commerce College organised a discussion programme at Professor Kazi Nurul Islam Faruky Auditorium...</p>
                        <a href="#" data-toggle="modal" data-target="#myModal">Read More <span class="fa fa-long-arrow-right"></span></a>
                        <!-- modal start-->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h5 class="modal-title"></h5>
                                    </div>
                                    <div class="modal-body">
                                        <p>Dhaka Commerce College organised a discussion programme at Professor Kazi Nurul Islam Faruky Auditorium on 3 September 2016 with a view to raising national awareness against extremism and terrorism. On this occasion the chief orator was Md Sahjahan Ali, Assistant Professor, Bangla Department. The programme was presided over by the Principal of the college Professor Md Abu Syeed. Vice Principal (Administration) Professor Md Shafiqul Islam, Academic Advisor Professor Md Mojahar Jamil and Convener of the Cultural Committee Md Saidur Rahman Mian also spoke at the programme. All the teachers, staff and students of the college spontaneously attended the programme.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--                modal end-->
                    </div>
                </div>
                <!--                3th event end-->
                <!--               4th event start-->
                <div class="col-md-3">
                    <div class="event">
                        <img src="<?php echo base_url(); ?>files/img/4.jpg" class="img-responsive " alt="">
                        <h5>Discussion Against Extremism and Terrorism</h5>
                        <p>Dhaka Commerce College organised a discussion programme at Professor Kazi Nurul Islam Faruky Auditorium...</p>
                        <a href="#" data-toggle="modal" data-target="#myModal">Read More <span class="fa fa-long-arrow-right"></span></a>
                        <!-- modal start-->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h5 class="modal-title"></h5>
                                    </div>
                                    <div class="modal-body">
                                        <p>Dhaka Commerce College organised a discussion programme at Professor Kazi Nurul Islam Faruky Auditorium on 3 September 2016 with a view to raising national awareness against extremism and terrorism. On this occasion the chief orator was Md Sahjahan Ali, Assistant Professor, Bangla Department. The programme was presided over by the Principal of the college Professor Md Abu Syeed. Vice Principal (Administration) Professor Md Shafiqul Islam, Academic Advisor Professor Md Mojahar Jamil and Convener of the Cultural Committee Md Saidur Rahman Mian also spoke at the programme. All the teachers, staff and students of the college spontaneously attended the programme.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--                modal end-->
                    </div>
                </div>
                <!--                4th event end-->
            </div>
        </div>
    </section>
    <!--News & Events end-->


    <!--Our Achievements part start-->
    <section id="achievement_part">
        <h4>Our Achievements</h4>
        <div class="container">
            <div class="row">
                <!--               1st achievement start-->
                <div class="col-md-3">
                    <div class="achievement">
                        <img src="img/5.jpg" class="img-responsive " alt="">
                        <h5>Discussion Against Extremism and Terrorism</h5>
                        <p>Dhaka Commerce College organised a discussion programme at Professor Kazi Nurul Islam Faruky Auditorium...</p>
                        <a href="#" data-toggle="modal" data-target="#myModal">Read More <span class="fa fa-long-arrow-right"></span></a>
                        <!-- modal start-->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h5 class="modal-title"></h5>
                                    </div>
                                    <div class="modal-body">
                                        <p>Dhaka Commerce College organised a discussion programme at Professor Kazi Nurul Islam Faruky Auditorium on 3 September 2016 with a view to raising national awareness against extremism and terrorism. On this occasion the chief orator was Md Sahjahan Ali, Assistant Professor, Bangla Department. The programme was presided over by the Principal of the college Professor Md Abu Syeed. Vice Principal (Administration) Professor Md Shafiqul Islam, Academic Advisor Professor Md Mojahar Jamil and Convener of the Cultural Committee Md Saidur Rahman Mian also spoke at the programme. All the teachers, staff and students of the college spontaneously attended the programme.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--                modal end-->
                    </div>
                </div>
                <!--                1nd achievement end-->
                <!--                 2nd achievement start-->
                <div class="col-md-3">
                    <div class="achievement">
                        <img src="img/6.jpg" class="img-responsive " alt="">
                        <h5>Discussion Against Extremism and Terrorism</h5>
                        <p>Dhaka Commerce College organised a discussion programme at Professor Kazi Nurul Islam Faruky Auditorium...</p>
                        <a href="#" data-toggle="modal" data-target="#myModal">Read More <span class="fa fa-long-arrow-right"></span></a>
                        <!-- modal start-->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h5 class="modal-title"></h5>
                                    </div>
                                    <div class="modal-body">
                                        <p>Dhaka Commerce College organised a discussion programme at Professor Kazi Nurul Islam Faruky Auditorium on 3 September 2016 with a view to raising national awareness against extremism and terrorism. On this occasion the chief orator was Md Sahjahan Ali, Assistant Professor, Bangla Department. The programme was presided over by the Principal of the college Professor Md Abu Syeed. Vice Principal (Administration) Professor Md Shafiqul Islam, Academic Advisor Professor Md Mojahar Jamil and Convener of the Cultural Committee Md Saidur Rahman Mian also spoke at the programme. All the teachers, staff and students of the college spontaneously attended the programme.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--                modal end-->
                    </div>
                </div>
                <!--                2nd achievement end-->
                <!--           3rd achievement start-->
                <div class="col-md-3">
                    <div class="achievement">
                        <img src="img/7.jpg" class="img-responsive " alt="">
                        <h5>Discussion Against Extremism and Terrorism</h5>
                        <p>Dhaka Commerce College organised a discussion programme at Professor Kazi Nurul Islam Faruky Auditorium...</p>
                        <a href="#" data-toggle="modal" data-target="#myModal">Read More <span class="fa fa-long-arrow-right"></span></a>
                        <!-- modal start-->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h5 class="modal-title"></h5>
                                    </div>
                                    <div class="modal-body">
                                        <p>Dhaka Commerce College organised a discussion programme at Professor Kazi Nurul Islam Faruky Auditorium on 3 September 2016 with a view to raising national awareness against extremism and terrorism. On this occasion the chief orator was Md Sahjahan Ali, Assistant Professor, Bangla Department. The programme was presided over by the Principal of the college Professor Md Abu Syeed. Vice Principal (Administration) Professor Md Shafiqul Islam, Academic Advisor Professor Md Mojahar Jamil and Convener of the Cultural Committee Md Saidur Rahman Mian also spoke at the programme. All the teachers, staff and students of the college spontaneously attended the programme.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--                modal end-->
                    </div>
                </div>
                <!--           3rd achievement end-->
                <!--               4rd achievement start-->
                <div class="col-md-3">
                    <div class="achievement">
                        <img src="img/8.jpg" class="img-responsive " alt="">
                        <h5>Discussion Against Extremism and Terrorism</h5>
                        <p>Dhaka Commerce College organised a discussion programme at Professor Kazi Nurul Islam Faruky Auditorium...</p>
                        <a href="#" data-toggle="modal" data-target="#myModal">Read More <span class="fa fa-long-arrow-right"></span></a>
                        <!-- modal start-->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h5 class="modal-title"></h5>
                                    </div>
                                    <div class="modal-body">
                                        <p>Dhaka Commerce College organised a discussion programme at Professor Kazi Nurul Islam Faruky Auditorium on 3 September 2016 with a view to raising national awareness against extremism and terrorism. On this occasion the chief orator was Md Sahjahan Ali, Assistant Professor, Bangla Department. The programme was presided over by the Principal of the college Professor Md Abu Syeed. Vice Principal (Administration) Professor Md Shafiqul Islam, Academic Advisor Professor Md Mojahar Jamil and Convener of the Cultural Committee Md Saidur Rahman Mian also spoke at the programme. All the teachers, staff and students of the college spontaneously attended the programme.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--                modal end-->
                    </div>
                </div>
                <!--           4rd achievement end-->
            </div>
        </div>
    </section>
    <!--Our Achievements part end-->
    <!--information part start-->
    <section id="information_part">
       <h4>Information</h4>
        <div class="container">
            <div class="row">
                 <div class="col-md-8">
					<div class="col-md-6">
<!--                   tution fee start-->
						<div class="panel panel-default">
						  <div class="panel-heading">Monthly Fees</div>
						  <div class="panel-body table-responsive">
							   <table class="table table-bordered table-hover table-condensed">
									<thead>
									  <tr>
										<th>Class</th>
										<th>Monthly Fee</th>
									  </tr>
									</thead>
									<tbody>
									{monthlyfees}
									  <tr>
										<td>{classname}</td>
										<td>{amount}</td>
									  </tr>
									 {/monthlyfees}
									</tbody>
								  </table>
						  </div>
						</div>
					</div>
					<div class="col-md-6">
<!--                   tution fee start-->
						<div class="panel panel-default">
						  <div class="panel-heading">Admission Fees</div>
						  <div class="panel-body table-responsive">
							   <table class="table table-bordered table-hover table-condensed">
									<thead>
									  <tr>
										<th>Title</th>
										<th>Type</th>
										<th>Fee</th>
									  </tr>
									</thead>
									<tbody>
									{admissionfees}
									  <tr>
										<td>{title}</td>
										<td>{type}</td>
										<td>{amount}</td>
									  </tr>
									 {/admissionfees}
									</tbody>
								  </table>
						  </div>
						</div>
					</div>
                
                   <div class="panel panel-default">
                      
						<h3>Grading System</h3>
						<table class="table table-bordered">
							<thead>
								<tr style="background-color:#33bbff">
									<th>Grade</th>
									<th>Grade Point</th>
									<th>Mark From</th>
									<th>Mark To</th>
									<th>Comment</th>
									
								</tr>
							</thead>
							{grades}
								<tr>
									<td>{grade}</td>
									<td>{gradepoint}</td>
									<td>{marksfrom}</td>
									<td>{marksto}</td>
									<td>{comment}</td>  
								</tr>
							{/grades}
						</table>
                    </div>
                 </div>
                <!--    1st  massages start -->
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Messages</div>

                        <div class="panel-body">
                            <div class="media">
                                <div class="media-left media-top">
                                    <img src="<?php echo base_url(); ?>files/img/1.png" class="media-object" style="width:100px">
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading">Prof. Dr. Shafiq Ahmed Siddique</h5>
                                    <p>Chairman </p>
                                    <P>Governing Body</P>
                                    <P>Dhaka Commerce College</P>
                                    <a href="#" data-toggle="modal" data-target="#massage1">Read More <span class="fa fa-long-arrow-right"></span></a>
                                    <div class="modal fade" id="massage1" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h3 class="modal-title">Prof. Dr. Shafiq Ahmed Siddique</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Dhaka Commerce College organised a discussion programme at Professor Kazi Nurul Islam Faruky Auditorium on 3 September 2016 with a view to raising national awareness against extremism and terrorism. On this occasion the chief orator was Md Sahjahan Ali, Assistant Professor, Bangla Department. The programme was presided over by the Principal of the college Professor Md Abu Syeed. Vice Principal (Administration) Professor Md Shafiqul Islam, Academic Advisor Professor Md Mojahar Jamil and Convener of the Cultural Committee Md Saidur Rahman Mian also spoke at the programme. All the teachers, staff and students of the college spontaneously attended the programme.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--                    1st massage end-->
                        <!--                    2nd massage start-->
                        <div class="panel-body">
                            <div class="media">
                                <div class="media-left media-top">
                                    <img src="<?php echo base_url(); ?>files/img/2.png" class="media-object" style="width:100px">
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading">About Prof. Md. Abu Sayeed</h5>
                                    <p>Principal, Dhaka Commerce College</p>
                                    <P>Dhaka Commerce College</P>
                                    <P>Dhaka Cantonment.</P>
                                    <a href="#" data-toggle="modal" data-target="#massage2">Read More <span class="fa fa-long-arrow-right"></span></a>
                                    <div class="modal fade" id="massage2" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h3 class="modal-title">Prof. Dr. Shafiq Ahmed Siddique</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Professor Md. Abu Sayeed is the current Principal of Dhaka Commerce College. He was born in Kazipara village in Sirajgonj in 1954. His father is late Moulovi Nurul Hossain and mother is late Suratunnesa. Professor Md. Abu Sayeed passed the SSC exam in 1968 from Sirajgonj Govt BL College. He passed the HSC examination in 1970 from Sirajgonj Govt. College. Later he obtained Honours and Masters degrees in Accounting from Rajshahi University in 1973 and 1974 respectively. He started his career as a teacher in Sirajgonj Islamia College. Later he qualified in the BCS examination, in 1979 and joined as a Lecturer in Govt. Jagannath College. In his long career he achieved an excellent track record in teaching in Govt. Suhrawardi College and Govt. Anandamohan College. In 2006 he joined Bakshigonj Govt. College, Jamalpur as Principal. Later he also served in Govt. Akbar Ali College, Sirajgonj and lastly in Govt. Sadat College, Tangail as Principal. In his professional life he took training on Education Administration and Management from NAEM and University of Dhaka.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--                    2nd massage end-->
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!--Messages and Notice part end-->
    <!--footer_part start-->
    <section id="footer_part">
        <h4>Contact Us</h4>
        <div class="container">
            <div class="row">
             <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p><i class="fa fa-address-card"></i>Address: <?php echo $info['address']; ?></p>
                        <p><i class="fa fa-phone"></i>Phone: <?php echo $info['contact']; ?></p>
                        <p><i class="fa fa-envelope"></i>Email: <?php echo $info['email']; ?></p>
                        <p><i class="fa fa-desktop"></i>Web: www.dcc.edu.bds</p>
                    </div>
                </div>
             </div>
            </div>
<!--
               
               
                <p>Dhaka-1216, Bangladesh</p>
                <p>Phone: 9023338</p>
                <p>Email: dcc1989@dcc.edu.bd</p>
                <p>Web: www.dcc.edu.bds</p>
-->
            </div>
        </div>
        <div class="b2t">
               <i class="fa fa-chevron-right"></i>
        </div>
    </section>
    <!--footer_part end-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/lightbox_js/venobox.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script>
     var amountScrolled = 300;

			$(window).scroll(function() {
				if ( $(window).scrollTop() > amountScrolled ) {
					$('.b2t').fadeIn('slow');
				} else {
					$('.b2t').fadeOut('slow');
				}
			});

			$('.b2t').click(function() {
				$('html, body').animate({
					scrollTop: 0
				}, 700);
				return false;
			});
    </script>
</body>

</html>