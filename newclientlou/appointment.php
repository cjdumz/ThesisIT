<?php
include 'process/database.php';
$service = new database ;
$service -> mechanical_service();

?>
<!DOCTYPE html>
<html lang="en">
<head>
     <title>EAS Customs - Make an Appointment</title>
     <link rel="icon" href="images/Logo.png">
<!--

Template 2098 Health

http://www.tooplate.com/view/2098-health

-->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <link rel="icon" href="images/Logo.png">
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/magnific-popup.css">
     
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/animate.css">

     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/tooplate-style.css">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->



     <!-- HEADER -->
     <header>
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-3">
                         <p>Welcome to EAS Customs</p>
                    </div>
                         
                    <div class="col-md-8 col-sm-7 text-align-right">
                         <span class="phone-icon"><i class="fa fa-phone"></i>  09257196568 / 09304992021</span>
                         <span class="date-icon"><i class="fa fa-calendar-plus-o"></i> 09:00 AM - 05:00 PM (Mon-Sat)</span>
                         <span class="email-icon"><i class="fa fa-facebook-square" aria-hidden="true"></i> <a href="#">EAS Customs / @eascustoms75</a></span>
                    </div>

               </div>
          </div>
     </header>


     <!-- MENU -->
     <section class="navbar navbar-default navbar-static-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <img src="images/Logo.png" class="logoo" alt="logo" />

                    <a href="index.php" class="navbar-brand"> EAS CUSTOMS</a>


               </div>

               <!-- MENU LINKS -->
              <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="index.php" class="smoothScroll">Home</a></li>
                         <li><a href="index.php#about" class="smoothScroll">About Us</a></li>
                         <li><a href="index.php#services" class="smoothScroll">Services</a></li>
                         <li><a href="index.php#fc" class="smoothScroll">Featured Cars</a></li>
                         <li><a href="index.php#team" class="smoothScroll">The Team</a></li>
                         <li><a href="index.php#feedback" class="smoothScroll">Feedback</a></li>
                         <li><a href="index.php#google-map" class="smoothScroll">Find Us</a></li>
                         <li class="appointment-btn"><a href="appointment.php">Make an appointment</a></li>
                    </ul>
               </div>

          </div>
     </section>


	 
	 
	 <!-- APPOINTMENT SECTION --> 
	  <section id="appointment-detail" data-stellar-background-ratio="3">
          <div class="container">
               <div class="">
					<form id="appointment-form" role="form" method="post" action="#">
                        <div class="section-title wow fadeInUp" data-wow-delay="0.2s">
							<h2 align="center">Make an appointment</h2>
                        </div>
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <div class="col-md-6 col-sm-6">
                                <label for="select">Select Vehicle:</label>
                                    <select class="form-control">
								<option>General Health</option>
                                        <option>Cardiology</option>
                                        <option>Dental</option>
								<option>Medical Research</option>
                                    </select>
                            </div>
								   
							<div class="col-md-12 col-sm-12">
							<br>
							<br>
							<label for="service">Select Service</label>
							<br>
							<br>
								<div class ="services">
									<ul>
										<li><a class="active" href="appointment.php">Mechanical</a></li>
										<li><a href="electrical.php">Electrical</a></li>
										<li><a href="#">Customize</a><li>
										<li><a href="#">Body Repair</a></li>
										<li><a href="painting.php">Body Paint</a></li>
										<li><a href="#">Maintenance</a></li>
									</ul>
								</div>
								<div class ="service-detail">
									<?php
										foreach($service->mechanical_service as $service){
										?>	
										<input type="radio" name="service" value="<?= $service['serviceId']; ?>"><?= $service['serviceName']; ?></input>
										<br>
										<br>
							<?php	}
						?>
								</div>                   
							</div>
				   
							<div class="col-md-6 col-sm-6">
								<br>
								<br>
								<label for="date">Select Date</label>
								<input type="date" name="date" value="" class="form-control">
							</div>

							<div class="col-md-6 col-sm-6">
								<br>
								<br>
								<label for="time">Select Time</label>
								<input type="time" name="time" value="" class="form-control">
							</div>
							
							<div class="col-md-12 col-sm-12">
								<br>
								<br>
								<label for="Message">Additional Message</label>
								<textarea class="form-control" rows="5" id="message" name="message" placeholder="Message"></textarea>
							</div>
							
							<div class="col-md-6 col-sm-6" style="left:25%;">
								<br>
								<br>
								<button type="submit" class="form-control" id="cf-submit" name="submit" >Submit</button>
							</div>
						</div>
                    </form>
                </div>
            </div>
        </div>
    </section>
	 
	 <!-- END OF APPOINTMENT SECTION -->
	<hr>
     <!-- FOOTER -->
     <footer data-stellar-background-ratio="5">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-4">
                         <div class="footer-thumb"> 
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s">Contact Info</h4>

                              <div class="contact-info">
                                   <p><i class="fa fa-phone"></i> 09257196568 / 09304992021</p>
                                   <p><i class="fa fa-envelope-o"></i> <a href="#">eascustoms@yahoo.com</a></p>
                                   <p><i class="fa fa-facebook-square" aria-hidden="true"></i> <a href="#">EAS Customs / @eascustoms75</a>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4"> 
                         <div class="footer-thumb"> 
                              <div class="opening-hours">
                                   <h4 class="wow fadeInUp" data-wow-delay="0.4s">Opening Hours</h4>
                                   <p>Monday - Friday <span>09:00 AM - 05:00 PM</span></p>
                                   <p>Saturday <span>09:00 AM - 05:00 PM</span></p>
                                   <p>Sunday <span>Closed</span></p>
                              </div> 

                              <ul class="social-icon">
                              </ul>

                         </div>
                    </div>

                    <div class="col-md-12 col-sm-12 border-top">
                         <div class="col-md-4 col-sm-6">
                              <p>Copyright &copy; Abenchers 2018 
                                   
                                   | Design: <a rel="nofollow" href="https://www.facebook.com/tooplate" target="_parent">IT Project 2</a></p>
                         </div>
                         <div class="col-md-6 col-sm-6">
                              <div class="footer-link"> 

                              </div>
                         </div>
                         <div class="col-md-2 col-sm-2 text-align-center">
                              <div class="angle-up-btn"> 
                                  <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                              </div>
                         </div>   
                    </div>
                    
               </div>
          </div>
     </footer>

     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/jquery.sticky.js"></script>
     <script src="js/jquery.stellar.min.js"></script>
     <script src="js/jquery.magnific-popup.min.js"></script>
     <script src="js/magnific-popup-options.js"></script>
     <script src="js/wow.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/custom.js"></script>

</body>
</html>