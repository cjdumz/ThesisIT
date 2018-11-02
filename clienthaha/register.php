
<!DOCTYPE html>
<html lang="en">
<head>

     <title>EAS Customs - Login</title>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/animate.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/tooplate-style.css">
	 <link rel="stylesheet" href="css/index-style.css">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>

 <!-- HEADER -->
      <header>
          <div class="container">
               <div class="row">

                    
                    <div class="col-md-4 col-sm-5">
						<img src="images/Logo.png" class="logoo" alt="logo" />
                       <a href="index.html" class="navbar-brand" >EAS Customs</a>
					</div>
                   
                         
                    <div class="col-md-8 col-sm-7 text-align-right">
                         <span class="phone-icon"><i class="fa fa-phone"></i>  09257196568 / 09304992021</span>
                         <span class="date-icon"><i class="fa fa-calendar-plus-o"></i> 6:00 AM - 10:00 PM (Mon-Sat)</span>
                         <span class="email-icon"><i class="fa fa-facebook-square" aria-hidden="true"></i> <a href="#">EAS Customs / @eascustoms75</a></span>
                    </div>

               </div>
          </div>
     </header>


     <!-- MENU -->
     <section class="navbar navbar-default navbar-static-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                   <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
						 <li class="appointment-btn"><a href="appointment.php">Make an appointment</a></li>
                         <li><a href="index.php" class="smoothScroll">Home</a></li>
                         <li><a href="#news" class="smoothScroll">Services</a></li>
                         <li><a href="#news" class="smoothScroll">About Us</a></li>
                         <li><a href="#news" class="smoothScroll">Contact Us</a></li>
                         <li><a href="#google-map" class="smoothScroll">Reviews</a></li> 
                    </ul>
               </div>
              </div>

               <!-- MENU LINKS -->
 
                    <div class="nav navbar-nav navbar-right">
						<br>
						<span class="email-icon"><i class="fa fa-sign-in" style="color:#B80011" aria-hidden="true"></i> <a href="login.php">LOGIN</a></span> &ensp;
                        <span class="email-icon"><i class="fa fa-file-text" style="color:#B80011" aria-hidden="true"></i> <a href="register.php">REGISTER</a></span>
					</div>    
     </section>


	 
	 
     <!-- REGISTER PAGE -->
      <section id="appointment" data-stellar-background-ratio="3">
          <div class="container">
            <div class="row">
			   
			   <div class="col-md-6 col-sm-6">
                    <img src="images/appointment-image.jpg" class="img-responsive" alt="">
                </div>
					
			   <div class="col-md-6 col-sm-6">
                         
                         <form id="appointment-form" role="form" method="post" action="process/rejister.php">

                             
                              <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                                   <h2>REGISTER</h2>
                              </div>

                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <div class="col-md-4 col-sm-4">
                                        <!--<label for="name">First Name</label>-->
                                        <input type="text" name="firstName" placeholder="First Name" required class="form-control">
                                   </div>

                                   <div class="col-md-4 col-sm-4">
                                        <!--<label for="email">Middle Name</label>-->
                                        <input type="text" name="middleName" placeholder="Middle Name" required class="form-control">
                                   </div>

                                   <div class="col-md-4 col-sm-4">
                                        <!--<label for="date">Last Name</label>-->
                                        <input type="text" name="lastName" placeholder="Last Name" required class="form-control">
                                   </div>

                                   <div class="col-md-6 col-sm-6">
										<!--<label for="date">Phone Number</label>-->
                                        <input type="contact" name="contactNumber" placeholder="Phone Number" required class="form-control">
                                   </div>
								   
								   <div class="col-md-6 col-sm-6">
										<!--<label for="date">Email</label>-->
                                        <input type="email" name="email" placeholder="Email" required class="form-control">
                                   </div>

                                   <div class="col-md-12 col-sm-12">
                                        <input type="text" name="address" placeholder="Address" required class="form-control">
                                   </div>
								   
								   <div class="col-md-6 col-sm-6">
										<!--<label for="date">Phone Number</label>-->
                                        <input type="text" name="username" placeholder="Username" required class="form-control">
                                   </div>
								   
								   <div class="col-md-6 col-sm-6">
										<!--<label for="date">Phone Number</label>-->
                                        <input type="password" name="password" placeholder="Password" required class="form-control">
                                   </div>
								   
								   <div class="col-md-12 col-sm-12">
                                        <button type="submit" class="form-control" id="cf-submit" name="submit">Submit</button>
                                   </div>
                              </div>
                        </form>
                    </div>
            </div>
        </div>
     </section>

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
                                   <p>Monday - Friday <span>06:00 AM - 10:00 PM</span></p>
                                   <p>Saturday <span>06:00 AM - 10:00 PM</span></p>
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
     <script src="js/wow.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/custom.js"></script>

</body>
</html>