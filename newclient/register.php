<?php include('process/process.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>

     <title>EAS Customs - Register</title>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <link rel="icon" href="images/Logo.png">
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/animate.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/tooplate-style.css">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER 
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>-->

 <!-- HEADER -->
     <header>
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-5">
                        <span class="email-icon"><i class="fa fa-user-o" aria-hidden="true"></i> <a href="login.php">LOGIN</a></span>
                        <span class="email-icon"><i class="fa fa-file-text" aria-hidden="true"></i> <a href="register.php">REGISTER</a></span>
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
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                     <img src="images/Logo.png" class="logoo" alt="logo" />
                     
                    <a href="index.php" class="navbar-brand">EAS CUSTOMS</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="index.php" class="smoothScroll">Home</a></li>
                         <li><a href="#about" class="smoothScroll">Services</a></li>
                         <li><a href="#team" class="smoothScroll">About Us</a></li>
                         <li><a href="#news" class="smoothScroll">Contact Us</a></li>
                         <li><a href="#google-map" class="smoothScroll">Reviews</a></li>
                         <li class="appointment-btn"><a href="login.php?loginrequired=1">Make an appointment</a></li>
                    </ul>
               </div>

          </div>
     </section>

   
   
     <!-- REGISTER PAGE -->
    <div class="container">
    <div id="error_msg"></div>
    <div class="row">
    <div class="col-md-6 col-sm-6">
      <form id="register_form">
      <div class="panel panel-default" id="headings">
    <div class="panel-heading" style="background-color: #b80011;color: white;">Personal Info</div>
    <div class="panel-body" style="overflow-y: auto;height: auto;">
    <div class="form-group">
    <input type="text" class="form-control" name="firstName" placeholder="First Name" id="firstName" required>
    <div id="firstName_msg" style="display: none; color: red;font-size: 0.9em;">First name is empty</div>
    </div>
    <div class="form-group">
    <input type="text" class="form-control" name="middleName" placeholder="Middle Name" id="middleName">
    <div id="middleName_msg" style="display: none; color: red;font-size: 0.9em">Middle name is empty</div>
    </div>
    <div class="form-group">
    <input type="text" class="form-control" name="lastName" placeholder="Last Name" id="lastName">
    <div id="lastName_msg" style="display: none; color: red;font-size: 0.9em">Last name is empty</div>
    </div>
    <div class="form-group">
    <input type="text" class="form-control" name="username" placeholder="Username" id="username" pattern=".{8,}" title='must contain 6 or more characters'>
    <small id="username" class="form-text text-muted"> Must contain 8-12 characters.</small><br>
    <div id="username_msg" style="display: none; color: red;font-size: 0.9em">Username is empty</div>
    <div id="usernamepat_msg" style="display: none; color: red;font-size: 0.9em"> Must contain 8 or more characters that are of at least one number, and one uppercase and lowercase letter.</div>
    <span style="font-size: 0.9em"></span>
    </div>
    <div class="form-group">
    <input type="text" class="form-control" name="address" placeholder="Address" id="address">
    <div id="address_msg" style="display: none; color: red;font-size: 0.9em">Address is empty</div>
    </div>
    <div class="form-group">
    <input type="text" class="form-control" name="contactNumber" placeholder="Contact Number" id="contactNumber">
    <div id="contactNumber_msg" style="display: none; color: red;font-size: 0.9em">Contact Number is empty</div>
    <span style="font-size: 0.9em"></span>
    </div>
    <div class="form-group">
    <input type="email" class="form-control" name="Email" placeholder="Email" id="email">
    <div id="email_msg" style="display: none; color: red;font-size: 0.9em">email is empty</div>
    <span style="font-size: 0.9em"></span>
    <div id="emailpat_msg" style="display: none; color: red;font-size: 0.9em"> Invalid Email.</div>
    </div>
    <div class="form-group">
    <input type="password" class="form-control" name="password" placeholder="Password" id="password" title="must contain 8 or more characters that are of at least one number, and one uppercase and lowercase letter">
    <div id="passwordpat_msg" style="display: none; color: red;font-size: 0.9em"> Must contain 8 or more characters that are of at least one number, and one uppercase and lowercase letter.</div>
    <div id="password_msg" style="display: none; color: red;font-size: 0.9em">password is empty</div>
    <span style="font-size: 0.9em"></span>
    </div>
    <div class="form-group">
    <input type="password" class="form-control" placeholder="Confirm Password" id="confirm_password">
    <span id="message" style="font-size: 0.9em"></span>
    </div>
    </div>
  </div>
  </div>  
    <div class="col-md-6 col-sm-6">


      <div class="panel panel-default" id="headings">
      <div class="panel-heading" style="background-color: #b80011;color: white;">Vehicle Info</div>
      <div class="panel-body" style="overflow-y: auto;height: auto;">      
        <div class="form-group">
          <input type="text" class="form-control" id="plateNumber"  placeholder="Enter Plate Number" name="plateNumber">
          <div id="plateNumber_msg" style="display: none; color: red;font-size: 0.9em;">Plate Number is empty</div>
          <div id="plateNumberpat_msg" style="display: none; color: red;font-size: 0.9em"> Wrong Plate Number format.</div>
          <span style="font-size: 0.9em;"></span>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="make" placeholder="Enter Your Make" aria-describedby="make" name="make" >
          <div id="make_msg" style="display: none; color: red;font-size: 0.9em;">Make is empty</div>
          <small id="make" class="form-text text-muted">Eg. Toyota, Mitsubishi, Honda etc.</small>
        </div>
         <div class="form-group">
          <input class="form-control" type="text" class="form-control" name="series" id="series" placeholder="Series">
          <div id="series_msg" style="display: none; color: red;font-size: 0.9em;">Series is empty</div>
        </div>
        <div class="form-group">
          <input class="form-control" type="number" class="form-control" id="yearModel" name="yearModel" placeholder="Year Model">
          <div id="yearModel_msg" style="display: none; color: red;font-size: 0.9em;">Year Model is empty</div>
        </div>
         <div class="form-group">
          <input class="form-control" type="text" name="color" id="color" placeholder="Color">
          <div id="color_msg" style="display: none; color: red;font-size: 0.9em;">Color is empty</div>
        </div>
        <div class="pull-right">
        <button type="button" class="btn btn-danger btn-sm" name="register" id="reg_btn" style="background-color: #b80011;">Register</button>
        </div>
        </div>
        </div>  
    
  </form>
  </div>

       
  </div> 


             
     <!-- FOOTER -->
     <footer data-stellar-background-ratio="5">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-4">
                         <div class="footer-thumb"> 
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s">Contact Info</h4>
                              <p>Fusce at libero iaculis, venenatis augue quis, pharetra lorem. Curabitur ut dolor eu elit consequat ultricies.</p>

                              <div class="contact-info">
                                   <p><i class="fa fa-phone"></i> 010-070-0170</p>
                                   <p><i class="fa fa-envelope-o"></i> <a href="#">info@company.com</a></p>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4"> 
                         <div class="footer-thumb"> 
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s">Latest News</h4>
                              <div class="latest-stories">
                                   <div class="stories-image">
                                        <a href="#"><img src="images/news-image.jpg" class="img-responsive" alt=""></a>
                                   </div>
                                   <div class="stories-info">
                                        <a href="#"><h5>Amazing Technology</h5></a>
                                        <span>March 08, 2018</span>
                                   </div>
                              </div>

                              <div class="latest-stories">
                                   <div class="stories-image">
                                        <a href="#"><img src="images/news-image.jpg" class="img-responsive" alt=""></a>
                                   </div>
                                   <div class="stories-info">
                                        <a href="#"><h5>New Healing Process</h5></a>
                                        <span>February 20, 2018</span>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4"> 
                         <div class="footer-thumb">
                              <div class="opening-hours">
                                   <h4 class="wow fadeInUp" data-wow-delay="0.4s">Opening Hours</h4>
                                   <p>Monday - Friday <span>06:00 AM - 10:00 PM</span></p>
                                   <p>Saturday <span>09:00 AM - 08:00 PM</span></p>
                                   <p>Sunday <span>Closed</span></p>
                              </div> 

                              <ul class="social-icon">
                                   <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                   <li><a href="#" class="fa fa-twitter"></a></li>
                                   <li><a href="#" class="fa fa-instagram"></a></li>
                              </ul>
                         </div>
                    </div>

                    <div class="col-md-12 col-sm-12 border-top">
                         <div class="col-md-4 col-sm-6">
                              <div class="copyright-text"> 
                                   <p>Copyright &copy; 2018 Your Company 
                                   
                                   | Design: <a rel="nofollow" href="https://www.facebook.com/tooplate" target="_parent">Tooplate</a></p>
                              </div>
                         </div>
                         <div class="col-md-6 col-sm-6">
                              <div class="footer-link"> 
                                   <a href="#">Laboratory Tests</a>
                                   <a href="#">Departments</a>
                                   <a href="#">Insurance Policy</a>
                                   <a href="#">Careers</a>
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
     <script src="js/script.js"></script>

</body>
</html>