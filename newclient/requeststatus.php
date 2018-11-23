<?php
    session_start();
    include 'process/database.php';
    $username=$_SESSION['username'];
    $profile =new database;
    $profile->user_profile($username);
    

    $id = $_SESSION['id'];
    $pdo = new PDO('mysql:host=localhost;dbname=thesis', 'root', '');
    $result = $pdo->query("select personalId from personalinfo where user_id = '$id'")->fetchColumn();
    $_SESSION['personalId'] = $result;

    if (!isset($_SESSION['username'])) {
    $_SESSION['unauthorized_user'] = '<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <strong>Error</strong>  Unauthorized user please login.
    </div>';
        header('location: login.php');
      }
  if (isset($_SESSION['username'])) {
  header("Refresh: 1800; url=process/logout.php?timeout=yes");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>

     <title>EAS Customs - Request Status</title>
     
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <link rel="icon" href="images/Logo.png">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/animate.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">
     <!-- Font Awesome Version 5.0 -->
     <link rel="stylesheet" href="css/all.css">
     <script src="js/jquery.js"></script>
     

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/tooplate-style.css">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
  
    

    <!-- HEADER -->
     <header>
          <div class="container" >
               <div class="row">
         
          <div class="col-md-4 col-sm-5">
                       <img src="images/Logo.png" class="logoo" alt="logo" style="width: 50px; height: 40px" />
                       <a href="index.html" class="navbar-brand" >EAS Customs</a>
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
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php  if (isset($_SESSION['username'])) : ?><p> <i class="fas fa-user-circle"></i></i></span> Welcome <?php echo $_SESSION['username']; ?> <span class="caret"></span></p>
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
                          
                        <li><a href="vehicleshistory.php" class="smoothScroll"><i class="fas fa-history"></i> Vehicle History</a></li>
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
    <?php if (isset($_SESSION['delete'])) : ?>
          <?php 
            echo $_SESSION['delete']; 
              unset($_SESSION['delete']);
          ?>
      <?php endif ?>
      </div>

  <?php
   if(isset($_REQUEST['status'])=="Active")
   {
    echo '<script type="text/javascript">
      $("document").ready(function(){
      $("#activeContent").show();
        });
        </script>';
   }
   elseif (isset($_REQUEST['status'])== "Pending") 
   {
    
    echo '<script type="text/javascript">
      $("document").ready(function(){
      $("#pendingContent").show();
        });
        </script>'; 
   }
   elseif (isset($_REQUEST['status'])== "Reschedule") 
   {
    
    echo '<script type="text/javascript">
      $("document").ready(function(){
      $("#rescheduleContent").show();
        });
        </script>'; 
   }
   else
   {
    
    echo '<script type="text/javascript">
      $("document").ready(function(){
      $("#pendingContent").show();
        });
        </script>'; 
   }

    ?>
    
    <div class="container">
    <div class="row">
    <div class="col-md-6 col-sm-6">
    <div class="panel panel-default" id="headings">
      <div class="panel-heading" style="background-color: #ffaf00;color: white;"><i class="fas fa-truck-loading"></i> Pending Requests</div>
      <div class="panel-body" id="serviceDisplay" style="overflow-y: auto;height: 200px;">
      <?php
      $pendingRequestsresultCheck = mysqli_num_rows($pendingRequestsresult);
       if ($pendingRequestsresultCheck > 0) {
        while ($appointmentpending = mysqli_fetch_assoc($pendingRequestsresult)) {
      ?>
      <div class="well well-sm" style="margin: 0;">  
      <b><?= $appointmentpending['plateNumber']; ?> <?= $appointmentpending['make']; ?> <?= $appointmentpending['series']; ?> <?= $appointmentpending['yearModel']; ?></b>
       <span class="label label-success"><?= $appointmentpending['status']; ?></span> <br>
      <hr style="padding-bottom: 10px;margin: 0px;">
       <div class="row">
       <div class="col-sm-6 col-md-6">
       <label for="desiredDate">Desired Date:</label>
       <?= $appointmentpending['desiredDate']; ?><hr style="padding: 0px;margin: 0px;">
       <label for="created">Date Requested:</label>
       <?= date("m/d/y h:i A",strtotime($appointmentpending['created'])); ?>
      </div>
       <div class="col-md-6 col-sm-6">
       <label for="services">Services Requested:</label>
        <?= $appointmentpending['services']; ?>
       <hr style="padding: 0px;margin: 0px;">

       <label for="otherServices">Other Services:</label>
       <?= $appointmentpending['otherServices']; ?><hr style="padding: 0px;margin: 0px;">
      </div>
      </div>
      </div>
      <br>
      <?php 
         }
        }  
      ?>
    </div>
    </div>
    <div class="panel panel-default" id="headings">
      <div class="panel-heading" style="background-color:#4caf50;color: white;"><i class="fas fa-calendar-check"></i> Accepted Vehicles</div>
      <div class="panel-body" id="serviceDisplay" style="overflow-y: auto;height: 200px;">
      <?php
      $acceptedRequestsresultCheck = mysqli_num_rows($acceptedRequestsresult);
       if ($acceptedRequestsresultCheck > 0) {
        while ($appointmentaccepted = mysqli_fetch_assoc($acceptedRequestsresult)) {
      ?>

      <div class="well well-sm" style="margin: 0;">  
      <b><?= $appointmentaccepted['plateNumber']; ?> <?= $appointmentaccepted['make']; ?> <?= $appointmentaccepted['series']; ?> <?= $appointmentaccepted['yearModel']; ?></b>
      <?php 
        if ($appointmentaccepted['status'] == 'Reschedule')
        {
      ?>
      <span class="label label-danger"><?= $appointmentaccepted['status']; ?></span> <br>
      <hr style="padding-bottom: 10px;margin: 0px;">
      <?php 
        } else if ($appointmentaccepted['status'] == 'Pending')
        {
      ?>
       <span class="label label-warning"><?= $appointmentaccepted['status']; ?></span> <br>
      <hr style="padding-bottom: 10px;margin: 0px;">
      <?php
        }
      ?>
       <div class="row">
       <div class="col-sm-6 col-md-6">
       <label for="desiredDate">Desired Date:</label>
       <?= date('F d, Y', strtotime($appointmentaccepted['desiredDate'])); ?><hr style="padding: 0px;margin: 0px;">
       <label for="created">Date Requested:</label>
       <?= date("m/d/y h:i A",strtotime($appointmentaccepted['created'])); ?>
      </div>
       <div class="col-md-6 col-sm-6">
       <label for="services">Services Requested:</label>
       <?=  $appointmentaccepted['services']; ?><hr style="padding: 0px;margin: 0px;">

       <label for="otherServices">Other Services:</label>
       <?= $appointmentaccepted['otherServices']; ?><hr style="padding: 0px;margin: 0px;">
      </div>
      </div>
      </div>
      <br>
      <?php 
         }
        } else {
      ?>
      <div class="well well-sm" style="margin: 0;text-align: center;">
        NO DATA YET
      </div>
      <?php 
        }
      ?> 
      ?>

    </div>
    </div>
    </div>
    <div class="col-md-6 col-sm-6">
    <div class="panel panel-default" id="headings">
      <div class="panel-heading" style="background-color: #b80011;color: white;"><i class="fas fa-times-circle"></i> Declined Requests</div>
      <div class="panel-body" id="serviceDisplay" style="overflow-y: auto;height: 460px;">     
      <?php
      $declineRequestsresultCheck = mysqli_num_rows($declineRequestsresult);
       if ($declineRequestsresultCheck > 0) {
        while ($appointmentdecline = mysqli_fetch_assoc($declineRequestsresult)) {
      ?>
      <div class="well well-sm" style="margin: 0;">  
      <b><?= $appointmentdecline['plateNumber']; ?> <?= $appointmentdecline['make']; ?> <?= $appointmentdecline['series']; ?> <?= $appointmentdecline['yearModel']; ?></b>
       <span class="label label-danger"><?= $appointmentdecline['status']; ?></span> <br>
      <hr style="padding-bottom: 10px;margin: 0px;">
       <div class="row">
       <div class="col-sm-6 col-md-6">
       <label for="desiredDate">Desired Date:</label>
       <?= $appointmentdecline['desiredDate']; ?><hr style="padding: 0px;margin: 0px;">
       <label for="created">Date Requested:</label>
       <?= date("m/d/y h:i A",strtotime($appointmentdecline['created'])); ?>
      </div>
       <div class="col-md-6 col-sm-6">
       <label for="services">Services Requested:</label>
       <?= $appointmentdecline['services']; ?>
       <?php 
         $_SESSION['sessionId'] = explode(",", $appointmentdecline['services']);  
       ?>
       <!--<?php $serviceId = explode("," ,$appointmentdecline['services']);  
        foreach($serviceId as $service) {
           echo $serviceNumber = $service;
        }
       ?>-->
       <!--
       <?php foreach($appointmentservice->appointment_service as $appointmentservice):?>
        <?= $appointmentservice['serviceName'];   ?>
        <?php 
         endforeach;  
        ?>
        -->

       <hr style="padding: 0px;margin: 0px;">

       <label for="otherServices">Other Services:</label>
       <?= $appointmentdecline['otherServices']; ?><hr style="padding: 0px;margin: 0px;">
      </div>
      </div>
      </div>
      <br>
      <?php 
         }
       }else {
      ?>
      <div class="well well-sm" style="margin: 0;text-align: center;">
        NO DATA YET
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
  </div>

    <!-- END OF JUMBOTRON -->
 

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
     <script src="js/notif.js"></script>
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