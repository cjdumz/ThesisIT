<?php
     session_start();
    include 'process/database.php';
    include 'process/server.php';
    include 'process/info.php';
    include 'process/auth.php';
     $username=$_SESSION['username'];
     $profile =new database;
     $profile->user_profile($username);
     $id = $_SESSION['id'];
     $pdo = new PDO('mysql:host=localhost;dbname=thesis', 'root', '');
     $result = $pdo->query("select personalId from personalinfo where user_id = '$id'")->fetchColumn();
     $_SESSION['personalId'] = $result;
     $personalinfo =new database;
     $personalinfo->personal_info();
     $vehicleinfo =new database;
     $vehicleinfo->vehicle_info();
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
     <link rel="icon" href="images/Logo.png">
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/animate.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">
     <!-- Font Awesome Version 5.0 -->
     <link rel="stylesheet" href="css/all.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/tooplate-style.css">

     <script src="js/jquery.js"></script>

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER 
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>
    -->

     <header>
          <div class="container" >
               <div class="row">
         
          <div class="col-md-4 col-sm-5">
                       <img src="images/Logo.png" class="logoo" alt="logo" style="width: 50px; height: 40px" />
                       <a href="home.php" class="navbar-brand" >EAS Customs</a>
          </div>

              <div class="col-md-8 col-sm-7 text-align-right">
                         <span class="phone-icon"><i class="fa fa-phone"></i>  09257196568 / 09304992021</span>
                         <span class="date-icon"><i class="fa fa-calendar-plus-o"></i> 6:00 AM - 10:00 PM (Mon-Sat)</span>
                         <span class="email-icon"><i class="fab fa-facebook"></i> <a href="#">EAS Customs / @eascustoms75</a></span>
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
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
              

               </div>
          

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                     <ul class="nav navbar-nav ">
                     <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php  if (isset($_SESSION['username'])) : ?><p> <i class="fas fa-user-circle"></i></span> Welcome <?php echo $_SESSION['username']; ?> <span class="caret"></span></p>
                </a>
                  <ul class="dropdown-menu" id="dropdownaccount">
                     <li><a  href="accountsettings.php" style="font-size: 12px;z-index: 9999;"><i class="fa fa-cogs" aria-hidden="true"></i> Account Settings</a></li>
              <li><a  href="process/logout.php" style="color: red;font-size: 12px;z-index: 9999;"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                  </ul>
                  </li>
                  <?php endif ?>
             </ul>
                    
                    <ul class="nav navbar-nav navbar-right">
                          
                        <li><a href="vehicleshistory.php" class="smoothScroll"><i class="fas fa-history"></i>  Vehicle History  <span class="label label-pill label-danger count1" style="border-radius:10px;padding:6px;"></span></a></li>
                        <li><a href="vehiclesinfo.php" class="smoothScroll"><i class="fas fa-car"></i> Your Vehicles</a></li>  
                        <li class="dropdown">
                        <li><a href="requeststatus.php" class="smoothScroll"><i class="far fa-calendar-check"></i>  Request Status</a></li>  
                        <li class="dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell" aria-hidden="true" style="font-size: 20px;padding: 0;"></i>  <span class="label label-pill label-danger count" style="border-radius:10px;"></span></a>
                         <ul class="dropdown-menu" id="dropdownnotif" aria-labelledby="dropdownMenuDivider"></ul>
                        </li>          
                        <li class="appointment-btn" ><a href="appointment.php">Make an appointment</a></li>

                          
                           
                    </ul>
               </div>

          </div>
     </section>


<div class="jumbotron">    
<div class="container">
   <?php if (isset($_SESSION['success'])) : ?>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
    <?php endif ?>
    <?php if (isset($_SESSION['changepassword'])) : ?>
          <?php 
            echo $_SESSION['changepassword']; 
            unset($_SESSION['changepassword']);
          ?>
    <?php endif ?>
   </div>
 <div class="container">
 <div class="row">
 <div class="col-md-12 col-sm-12">
   <div class="panel panel-default" id="headings">
  <div class="panel-heading" style="background-color: #b80011;color: white;"><i class="fas fa-user"> </i>  User Profile</div>
  <div class="panel-body" id="serviceDisplay" style="overflow-y: auto;height: ;">
 
  <div class="row">
  <div class="col-sm-6 col-md-6">
  <h4>General Information</h4>
      <label for="username">Username:</label>
     <?php echo $_SESSION['username']; ?><hr style="padding: 0px;margin: 0px;">
  
  <?php 
   foreach($personalinfo->personal_info as $personalinfo){
   ?>
      <label for="username">Account Name:</label>
      <?php echo ucfirst($personalinfo['firstName']).' '.ucfirst($personalinfo['middleName'][0]).'. '.ucfirst($personalinfo['lastName']); ?><hr style="padding: 0px;margin: 0px;">
  <br>
    <div class="pull-right">
      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#changepassword"><i class="fas fa-user-shield"></i> Change Password</button>
  
<div id="changepassword" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" >
      <div class="modal-header" style="background-color:#337AB7; color: #ffffff;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title" style="color: white;"> <i class="fas fa-users-cog"></i> Change Password</h5>
      </div>
      <div class="modal-body" style="margin:0;">
      <form action="accountsettings.php" method="POST">
      <input type="hidden" name="personalId" value='<?php echo $personalinfo['personalId']; ?>'>
      <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" name="accountpassword" id="accountpassword" title="must contain 8 or more characters that are of at least one number, and one uppercase and lowercase letter">
      
      <div id="passwordpat_msg" style="display: none; color: red;font-size: 0.9em"> Must contain 8 or more characters that are of at least one number, and one uppercase and lowercase letter.</div>
      <div id="password_msg" style="display: none; color: red;font-size: 0.9em">password is empty</div>
      <span style="font-size: 0.9em"></span>
      </div>
      
      <div class="form-group">
      <label for="accountconfirm_password">Confirm Password:</label>
      <input type="password" class="form-control" name="accountconfirm_password" id="accountconfirm_password">
      <span id="message" style="font-size: 0.9em"></span>
      </div>

      </div>
      <div class="modal-footer">
        <button type="button" id="changepassbutton" name="changepassword" class="btn btn-primary btn-sm disabled"><i class="fas fa-check-square"></i> Save</button>
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
      </form>
      </div>
      </div>
     

  </div>
</div>
      
    </div>
  
  </div>
    <div class="vl"></div>
    <div class="col-sm-6 col-md-6">
    <div class="form-group">
    <h4>Contact Information</h4>
    </div>
      <label for="email">Email:</label>
      <?php echo $personalinfo['email']; ?><hr style="padding: 0px;margin: 0px;">
      <label for="phone">Contact Number:</label>
      <?php echo '+63'.$personalinfo['mobileNumber']; ?><hr style="padding: 0px;margin: 0px;">
      <label for="address">Address:</label>
      <?php echo ucfirst($personalinfo['address']); ?><hr style="padding: 0px;margin: 0px;">
      <label for="modified">Date Created:</label>
      <?php echo date("m/d/y h:i A",strtotime($personalinfo['created'])); ?><hr style="padding: 0px;margin: 0px;">
      <label for="modified">Date Modified:</label>
      <?php if (isset($personalinfo['modified'])){
             echo date("m/d/y h:i A",strtotime($personalinfo['modified'])); 
            }else {
             echo "-----";
             }?>
      <hr style="padding: 0px;margin: 0px;">
  </div>
  </div>
  <div class="form-group">
    <br>
  <div class="pull-right">
  <form action="personalinfoedit.php" >
  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#viewVehicle" style="background-color: #b80011;"><i class="fas fa-car"></i> My Vehicle</button>
  <button type="submit" class="btn btn-success btn-sm" style="background-color: #4caf50; "><i class="fas fa-user-edit"></i> Edit </button>
  </form>
  </div>

<!-- Modal -->
<div id="viewVehicle" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" >
      <div class="modal-header" style="background-color: #b80011;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title" style="color: white;"> <i class="fas fa-car"></i> My Vehicles</h5>
      </div>
      <div class="modal-body" style="margin:0;">
        <h5>Car Registered</h5>
        <?php 
         foreach($vehicleinfo->vehicle_info as $vehicleinfo):
         ?> 
         <b><?= $vehicleinfo['plateNumber']; ?></b> <?= $vehicleinfo['make']; ?> <?= $vehicleinfo['series']; ?> <?= $vehicleinfo['yearModel']; ?> <br><hr style="padding: 0;margin:0;">
         <?php 
          endforeach;
          ?>

      </div>
      <div class="modal-footer">
          <a href="vehiclesinfo.php" class="btn btn-default btn-sm" style="background-color: #b80011;color: white;"><i class="fas fa-info-circle"></i> Vehicles Info</a>
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
        
      </div>
    </div>

  </div>
</div>

  </div>

<?php
   
    }

  ?>
  </div>
</div>
  
  
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
                                   <p><i class="fas fa-phone"></i> 09257196568 / 09304992021</p>
                                   <p><i class="far fa-envelope"></i> <a href="#">eascustoms@yahoo.com</a></p>
                                   <p><i class="fab fa-facebook-square"></i> <a href="#">EAS Customs / @eascustoms75</a>
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
     <script src="js/script.js"></script>
     <script src="js/notifinvoice.js"></script>
     <script src="js/notif.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/jquery.sticky.js"></script>
     <script src="js/jquery.stellar.min.js"></script>
     <script src="js/wow.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/custom.js"></script>

</body>
</html>