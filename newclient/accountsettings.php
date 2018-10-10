<?php
     session_start();
    include 'process/database.php';
    include 'process/server.php';
     $username=$_SESSION['username'];
     $profile =new database;
     $profile->user_profile($username);
     $personalinfo =new database;
     $personalinfo->personal_info();

     if (!isset($_SESSION['username'])) {
    $_SESSION['unauthorized_user'] = '<div class="alert alert-warning fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong>Notice</strong>  Unauthorized user please login.
    </div>';
        header('location: login.php');
      }

?>
<!DOCTYPE html>
<html lang="en">
<head>

     <title>EAS Customs - Account</title>
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


     <header>
          <div class="container" >
               <div class="row">
         
          <div class="col-md-4 col-sm-5">

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
     <section class="navbar navbar-default navbar-static-top" role="navigation" >
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
              

               </div>
          

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                     <ul class="nav navbar-nav navbar-right">
                     <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php  if (isset($_SESSION['username'])) : ?><p> <i class="fa fa-user-circle-o" aria-hidden="true"></i></span> Welcome <?php echo $_SESSION['username']; ?> <span class="caret"></span></p>
                </a>
                  <ul class="dropdown-menu">
                     <li><a  href="accountsettings.php" style="font-size: 12px;z-index: 9999;">Account Settings</a></li>
              <li><a  href="process/logout.php" style="color: red;font-size: 12px;z-index: 9999;">Logout</a>
                    </li>
                  </ul>
                  </li>
             </ul>
                    <?php endif ?>
                    <ul class="nav navbar-nav">
                          <li class="appointment-btn" ><a href="#appointment">Make an appointment</a></li>
                          <li><a href="vehicleshistory.php" class="smoothScroll">Vehicle History</a></li>
                         <li><a href="vehiclesinfo.php" class="smoothScroll">Your Vehicles</a></li>
                    </ul>
               </div>

          </div>
     </section>

 
    <br>
    <div class="container">
   <?php if (isset($_SESSION['success'])) : ?>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
    <?php endif ?>
   </div>

 <div class="container">
 <div class="row">


  <form action="personalinfoedit.php" >
  <h3>Account Settings</h3>
  <h5>General Information</h5>
   
   <?php 
   foreach($personalinfo->personalinfo as $personalinfo){
   ?>
    <div class="form-group">
    <h4>Personal Information</h4>
    </div>
    <div class="form-group">
      <label for="username">Account Name:</label>
      <?php echo ucfirst($personalinfo['firstName']).' '.ucfirst($personalinfo['middleName'][0]).'. '.ucfirst($personalinfo['lastName']); ?>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <?php echo $personalinfo['email']; ?>
    </div>
    <div class="form-group">
      <label for="phone">Contact Number:</label>
      <?php echo $personalinfo['contactNumber']; ?>
    </div>
    <div class="form-group">
      <label for="address">Address:</label>
      <?php echo $personalinfo['address']; ?>
    </div>
     <div class="form-group">
      <label for="modified">Date Created:</label>
      <?php echo $personalinfo['created']; ?>
    </div>
      <div class="form-group">
      <label for="modified">Date Modified:</label>
      <?php echo $personalinfo['modified']; ?>
    </div>
     <input type="submit" class="btn" value="Edit">
  </div>
</form>

<?php
   
    }

  ?>
  
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

</body>
</html>