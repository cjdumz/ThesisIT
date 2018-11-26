<?php
session_start();

include('process/server.php'); 

if (isset($_SESSION['username'])) {            
    header('location: homepage.php');
          }

?>

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
                        <span class="email-icon"><i class="fa fa-user-o" aria-hidden="true"></i> <a href="login.php">LOGIN</a></span>
                        <span class="email-icon"><i class="fa fa-address-card-o" aria-hidden="true"></i> <a href="register.php">REGISTER</a></span>
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
                    <a href="index.php" class="navbar-brand">EAS CUSTOMS</a>
               </div>

               <!-- MENU LINKS -->
              <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="index.php" class="smoothScroll">Home</a></li>
                         <li><a href="/index.php#about" class="smoothScroll">About Us</a></li>
                         <li><a href="/index.php#services" class="smoothScroll">Services</a></li>
                         <li><a href="/index.php#fc" class="smoothScroll">Featured Cars</a></li>
                         <li><a href="/index.php#team" class="smoothScroll">The Team</a></li>
                         <li><a href="/index.php#feedback" class="smoothScroll">Feedback</a></li>
                         <li><a href="/index.php#google-map" class="smoothScroll">Find Us</a></li>
                         <li class="appointment-btn"><a href="appointment.php">Make an appointment</a></li>
                    </ul>
               </div>

          </div>
     </section>

	 
	 
     <!-- LOGIN PAGE -->
      <section id="appointment-detail" data-stellar-background-ratio="3">
          <div class="container">
               <div class="row">
                  
          <div class="col-xs-3 col-sm-3 " align="center">
          </div>                        
			   <div class="col-xs-5 col-sm-5 " align="center">
					<form id="appointment-form" role="form" method="post" action="login.php">
                        <div class="section-title wow fadeInUp" data-wow-delay="0.2s">
							<h2>Login</h2>
                        <?php if (isset($_SESSION['unauthorized_user'])) : ?>
                         <?php 
                           echo $_SESSION['unauthorized_user']; 
                             unset($_SESSION['unauthorized_user']);
                         ?>
                         <?php endif ?>
                         <?php if (isset($_SESSION['logged_out'])) : ?>
                         <?php 
                           echo $_SESSION['logged_out']; 
                             unset($_SESSION['logged_out']);
                         ?>

                         <?php endif ?>
                         <?php if (isset($_SESSION['timeout'])) : ?>
                         <?php 
                         
                           echo $_SESSION['timeout']; 
                             unset($_SESSION['timeout']);
                         ?>
                         <?php endif ?>
                         <?php if (isset($_SESSION['login_first'])) : ?>
                         <?php 
                         
                           echo $_SESSION['login_first']; 
                             unset($_SESSION['login_first']);
                         ?>
                         <?php endif ?>
                         <?php if (isset($_SESSION['register_success'])) : ?>
                         <?php 
                         
                           echo $_SESSION['register_success']; 
                             unset($_SESSION['register_success']);
                         ?>
                         <?php endif ?>
                         <?php
                         if(isset($_REQUEST['success'])=="done")
                          {
                              echo '<div class="alert alert-success fade in" align="center">
                              <a href="#" class="close" data-dismiss="alert" >&times;</a>
                              <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <strong>Notice</strong> Registration Successful Please Login </div';
                          }
                         ?>
                        </div>
                            <div class="wow fadeInUp" data-wow-delay="0.4s">
                                <div class="col-md-12 col-sm-12">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
          									<br>
          									<br>
          								</div>
                                <div class="col-md-12 col-sm-12">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
          									<br>
          									<br>
                                </div>		
                                    <button type="submit" class="form-control" id="cf-submit" name="login_user">Login </button>
                            
					</form>
					<br>
					<a href="register.php"> Don't have an account? Sign in </a>
					<p> Forgot your password? </p>
					</div>
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
                                   
                                   | Design: <a rel="nofollow" target="_parent">IT Project 2</a></p>
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