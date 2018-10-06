<?php
     session_start();
     include 'database.php';
     $username=$_SESSION['username'];
     $profile =new database;
     $profile->user_profile($username);
?>
<!DOCTYPE html>
<html lang="en">
<head>

     <title>EAS Customs - Home</title>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="../css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/font-awesome.min.css">
     <link rel="stylesheet" href="../css/animate.css">
     <link rel="stylesheet" href="../css/owl.carousel.css">
     <link rel="stylesheet" href="../css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="../css/tooplate-style.css">
	  <link rel="stylesheet" href="../css/index-style.css">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER 
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section> -->


     <!-- HEADER -->
       <header>
          <div class="container" >
               <div class="row">
         
          <div class="col-md-4 col-sm-5">
						<img src="../images/Logo.png" class="logoo" alt="logo" />
                       <a href="index.html" class="navbar-brand" style="color:black;"></i>EAS Customs</a>
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
               </div>
          
              <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                     <ul class="nav navbar-nav navbar-right">
                     <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php  if (isset($_SESSION['username'])) : ?><p> <i class="fa fa-user-circle-o" aria-hidden="true"></i></span> Welcome <?php echo $_SESSION['username']; ?> <span class="caret"></span></p>
                </a>
                  <ul class="dropdown-menu">
                     <li><a  href="accountsettings.php" style="font-size: 12px;z-index: 9999;">Account Settings</a></li>
              <li><a  href="index.php?logout='1'" style="color: red;font-size: 12px;z-index: 9999;">Logout</a>
                    </li>
                  </ul>
                  </li>
             </ul>
                    <?php endif ?>
                    <ul class="nav navbar-nav">
                          <li class="appointment-btn" ><a href="../appointment.php">Make an appointment</a></li>
                          <li><a href="#top" class="smoothScroll">Vehicle History</a></li>
                         <li><a href="#top" class="smoothScroll">Your Vehicles</a></li>
                    </ul>
               </div>
          </div>
     </section>

  <!-- EDIT PERSONAL INFORMATION --> 

  <section id="appointment" data-stellar-background-ratio="3">
          <div class="container">
               <div class="row">

 <div class="container">

  <form method="post" action="server.php" >
    <?php
        $sessionUsername= $_SESSION['username'];
        $db = mysqli_connect('localhost', 'root', '', 'thesis');
        $query = "SELECT * from users WHERE username='$sessionUsername'";
        $res = mysqli_query($db,$query);
        $resultCheck = mysqli_num_rows($res);
         if ($resultCheck > 0) {
          while ($row = mysqli_fetch_assoc($res)) {

          $last_id = $row['id'];
        ?>  
      <?php
        }
      }
      ?>
   <?php
       $sessionUsername= $_SESSION['username'];
        $query = "SELECT * from personalinfo WHERE user_id='$last_id'";
        $res = mysqli_query($db,$query);
        $resultCheck = mysqli_num_rows($res);

         if ($resultCheck > 0) {
          while ($row = mysqli_fetch_assoc($res)) {
        ?>  
    <h3>Edit Personal Information</h3> <br>
    <div class="form-group">
      <label for="firstname">Firstname:</label>
      <input type="text" class="form-control" id="username" name="firstname" value=" <?php echo $row['firstName']; ?>">
      <?php echo $row['firstName'].' '.$row['middleName'].' '.$row['lastName']; ?>
    </div>
     <div class="form-group">
      <label for="lastname">Lastname:</label>
      <input type="text" class="form-control" id="username" name="lastname" value=" <?php echo $row['lastName']; ?>">
    </div>
    <div class="form-group">
      <label for="middlename">Middlename:</label>
      <input type="text" class="form-control" id="username" name="middlename" value=" <?php echo $row['middleName']; ?>">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" id="username" name="email" value=" <?php echo $row['email']; ?>">
    </div>
    <div class="form-group">
      <label for="phone">Contact Number:</label>
       <input type="text" class="form-control" id="username" name="contactnumber" value=" <?php echo $row['contactNumber']; ?>">
    </div>
    <div class="form-group">
      <label for="address">Address:</label>
       <input type="text" class="form-control" id="username" name="address" value=" <?php echo $row['address']; ?>"
    </div>
     <div class="form-group">
     <input name="update" type="submit" class="btn btn-primary float-right" value="Save">
  </div>
</form>
    <?php
        }
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