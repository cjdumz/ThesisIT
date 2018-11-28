<?php 
    session_start();
    include 'process/database.php';
    $username=$_SESSION['username'];
    $profile =new database;
    $profile->user_profile($username);
    $username=$_SESSION['username'];
     $id = $_SESSION['id'];
     $pdo = new PDO('mysql:host=localhost;dbname=thesislatest', 'root1', '');
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
       <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>
    

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
   elseif (isset($_REQUEST['status'])== "Rescheduled") 
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
    <?php if (isset($_SESSION['appointment_delete'])) : ?>
          <?php 
            echo $_SESSION['appointment_delete']; 
              unset($_SESSION['appointment_delete']);
          ?>
    <?php endif ?>
    <?php if (isset($_SESSION['appointment_accepted'])) : ?>
      <?php 
        echo $_SESSION['appointment_accepted']; 
          unset($_SESSION['appointment_accepted']);
      ?>
    <?php endif ?>

    <div class="row">
    <div class="col-md-6 col-sm-6">
    <div class="panel panel-default" id="headings">
      <div class="panel-heading" style="background-color: #ffaf00;color: white;"><i class="fas fa-truck-loading"></i> Pending Requests</div>
      <div class="panel-body" id="serviceDisplay" style="overflow-y: auto;height: 200px;">
      <?php
       if ($pendingRequestsresultCheck > 0) {
        while ($appointmentpending = mysqli_fetch_assoc($pendingRequestsresult)) {
      ?>
      <div class="well well-sm" style="margin: 0;"> 
      <br> 
      <b><?= $appointmentpending['plateNumber']; ?> <?= $appointmentpending['make']; ?> <?= $appointmentpending['series']; ?> <?= $appointmentpending['yearModel']; ?></b>
      <?php if ($appointmentpending['status'] == "Pending"){ ?>
        <div class="pull-right">
        <label for="Pending">Status:</label>
        <b style="color:orange;"><?= $appointmentpending['status']; ?></b>
        </div>

        <div class="row">
       <div class="col-sm-6 col-md-6">
       <br>
       <label for="desiredDate">Date:</label>
       <?= date('F d, Y', strtotime($appointmentpending['desiredDate'])); ?><hr style="padding: 0px;margin: 0px;">
       <label for="created">Created:</label>
       <?= date('F d, Y h:i A', strtotime($appointmentpending['created'])); ?><hr style="padding: 0px;margin: 0px;">
      </div>

      <div class="col-md-6 col-sm-6">
      <br><br><br>
      <div class="pull-right">
      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#pendingModal<?= $appointmentpending['id']; ?>"> More Details...</button>
      </div> 
      <div id="pendingModal<?= $appointmentpending['id']; ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="background-color: #286090;color: white;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h5 class="modal-title"><i class="fas fa-concierge-bell"></i> Service Request</h5>
            </div>
            <div class="modal-body">
                <label for="created">Date Requested:</label>
                <?= date("F d, Y h:i A",strtotime($appointmentpending['created'])); ?><hr style="padding: 0px;margin: 0px;">
                <label for="services">Services Requested:</label><br>
                <?= preg_replace("/[,]/" , "<br>",$appointmentpending['services']); ?><hr style="padding: 0px;margin: 0px;">   
               <label for="otherServices">Other Services:</label>
                <?= $appointmentpending['otherServices']; ?><hr style="padding: 0px;margin: 0px;">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
            </div>
          </div>
        </div>
      </div>

      </div>
      </div>
      <?php
       }  elseif($appointmentpending['status'] == "Rescheduled"){
      ?>  
        <div class="pull-right">
        <label for="Pending">Status:</label>
        <b style="color:red;"><?= $appointmentpending['status']; ?></b>
        </div><hr style="padding: 0px;margin: 0px;">
        <div class="row">
       <div class="col-sm-6 col-md-6">
       <br>
       <label for="desiredDate">Date:</label>
       <?= date('F d, Y', strtotime($appointmentpending['desiredDate'])); ?><hr style="padding: 0px;margin: 0px;">
       <label for="desiredDate">Date Suggested:</label>
       <?= date('F d, Y ', strtotime($appointmentpending['adminDate'])); ?><hr style="padding: 0px;margin: 0px;">
       <label for="desiredDate">Reason:</label>
       <?= $appointmentpending['reason']; ?>
      </div>
      <div class="col-md-6 col-sm-6">
      <br><br><br><br>
      <div class="pull-right">
      <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#approverescheduleModal<?= $appointmentpending['id']; ?>"> <i class="fas fa-check-square"></i> Approve Date</button>
      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#rescheduleModal<?= $appointmentpending['id']; ?>"> More Details...</button>

      </div> 
      <div id="rescheduleModal<?= $appointmentpending['id']; ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="background-color: #286090;color: white;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h5 class="modal-title"><i class="fas fa-concierge-bell"></i> Service Request</h5>
            </div>
            <div class="modal-body">
                <label for="created">Date Requested:</label>
                <?= date("F d, Y h:i A",strtotime($appointmentpending['created'])); ?><hr style="padding: 0px;margin: 0px;">
                <label for="services">Services Requested:</label><br>
                <?= preg_replace("/[,]/" , "<br>",$appointmentpending['services']); ?><hr style="padding: 0px;margin: 0px;">   
               <label for="otherServices">Other Services:</label>
                <?= $appointmentpending['otherServices']; ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
            </div>
          </div>
        </div>
      </div>

      <div id="approverescheduleModal<?= $appointmentpending['id']; ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="background-color: #4caf50;color: white;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h5 class="modal-title"><i class="fas fa-check-square"></i> Approve Date</h5>
            </div>
            <div class="modal-body">
              <form action="process/server.php" method="POST">
                <input type="hidden" name="appointmentId" value="<?= $appointmentpending['id']; ?>">
                <input type="hidden" name="adminDate" value="<?= $appointmentpending['adminDate']; ?>">
                <input type="hidden" name="plateNumber" value="<?= $appointmentpending['plateNumber']; ?>">
                <input type="hidden" name="make" value="<?= $appointmentpending['make']; ?>">
                <input type="hidden" name="series" value="<?= $appointmentpending['series']; ?>">
                <input type="hidden" name="yearModel" value="<?= $appointmentpending['yearModel']; ?>">
                <label for="created">Date:</label>
                <?= date("F d, Y",strtotime($appointmentpending['desiredDate'])); ?><hr style="padding: 0px;margin: 0px;">
                <label for="created">Date Suggested:</label>
                <?= date("F d, Y",strtotime($appointmentpending['adminDate'])); ?>       
                  <h5>Would you like to choose this date for your appointment?</h5>
                <br>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success btn-sm" name="appointmentAccepted" value="<?= $appointmentpending['id']; ?>" ><i class="fas fa-check"></i> Yes</button>
              <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-ban"></i> Cancel</button>
             </form>
            </div>
          </div>
        </div>
      </div>


      </div>
      </div>
      <?php
      }
      ?>
      <hr style="padding-bottom: 10px;margin: 0px;">
      </div>
      <br>
      <?php 
         }
        } else {
          echo '<ol class="breadcrumb" style = "text-align: center;">
              <li class="breadcrumb-item active" aria-current="page">NO PENDING REQUESTS</li>
            </ol>';
        }
      ?>
    </div>
    </div>
    <div class="panel panel-default" id="headings">
      <div class="panel-heading" style="background-color:#4caf50;color: white;"><i class="fas fa-calendar-check"></i> Accepted Vehicles</div>
      <div class="panel-body" id="serviceDisplay" style="overflow-y: auto;height: 200px;">
      <?php
       if ($acceptedRequestsresultCheck > 0) {
        while ($appointmentaccepted = mysqli_fetch_assoc($acceptedRequestsresult)) {
      ?>
      <div class="well well-sm" style="margin: 0;"> 
      <br> 
      <b><?= $appointmentaccepted['plateNumber']; ?> <?= $appointmentaccepted['make']; ?> <?= $appointmentaccepted['series']; ?> <?= $appointmentaccepted['yearModel']; ?></b>
      <div class="pull-right">
      <label for="Pending">Status:</label>
      <b style="color:green;"><?= $appointmentaccepted['status']; ?></b>
      </div>
     <hr style="padding-bottom: 10px;margin: 0px;">
       <div class="row">
       <div class="col-sm-6 col-md-6">
       <label for="desiredDate">Date:</label>
       <?= date('F d, Y', strtotime($appointmentaccepted['desiredDate'])); ?><hr style="padding: 0px;margin: 0px;">
       <label for="created">Date Accepted:</label>
       <?= date("F d, Y h:i A",strtotime($appointmentaccepted['created'])); ?>
      </div>
      <br>
      <br>
      <div class="col-md-6 col-sm-6">
      <div class="pull-right">
      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#acceptedcheduleModal<?= $appointmentaccepted['id']; ?>"> More Details...</button>
      </div> 
      </div>
      <div id="acceptedcheduleModal<?= $appointmentaccepted['id']; ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="background-color: #286090;color: white;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h5 class="modal-title"><i class="fas fa-concierge-bell"></i> Service Request</h5>
            </div>
            <div class="modal-body">
                <label for="created">Date Accepted:</label>
                <?= date("F d, Y h:i A",strtotime($appointmentaccepted['created'])); ?><hr style="padding: 0px;margin: 0px;">
                <label for="services">Services Requested:</label><br>
                <?= preg_replace("/[,]/" , "<br>",$appointmentaccepted['services']); ?><hr style="padding: 0px;margin: 0px;">   
               <label for="otherServices">Other Services:</label>
                <?= $appointmentaccepted['otherServices']; ?><hr style="padding: 0px;margin: 0px;">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
            </div>
          </div>
        </div>
      </div>
      </div>
      </div>
      <br>
      <?php 
         }
        } else {
      ?>
      <div class="well well-sm" style="margin: 0;text-align: center;">
        NO ACCEPTED REQUESTS
      </div>
      <?php 
        }  
      ?>

    </div>
    </div>
    </div>

    <div class="col-md-6 col-sm-6">
    <div class="panel panel-default" id="headings">
      <div class="panel-heading" style="background-color: #b80011;color: white;"><i class="fas fa-times-circle"></i> Declined Requests</div>
      <div class="panel-body" id="serviceDisplay" style="overflow-y: auto;height: 460px;">   
      <?php
       if ($declinedRequestsresultCheck > 0) {
        while ($appointmentdeclined = mysqli_fetch_assoc($declinedRequestsresult)) {
      ?>
      <div class="well well-sm" style="margin: 0;">
      <div class="form-group">
      <form method="POST" action="process/server.php">
      <input type="hidden" name="appointmentId" value="<?= $appointmentdeclined['id']; ?>">
      <input type="hidden" name="plateNumber" value="<?= $appointmentdeclined['plateNumber']; ?>">
      <input type="hidden" name="make" value="<?= $appointmentdeclined['make']; ?>">
      <input type="hidden" name="series" value="<?= $appointmentdeclined['series']; ?>">
      <input type="hidden" name="yearModel" value="<?= $appointmentdeclined['yearModel']; ?>">
      <button type="submit" class="close" name="appointmentDelete">&times;</button>
      </form> 
      </div> 
      <b><?= $appointmentdeclined['plateNumber']; ?> <?= $appointmentdeclined['make']; ?> <?= $appointmentdeclined['series']; ?> <?= $appointmentdeclined['yearModel']; ?></b>
      <div class="pull-right">
      <label for="Declined">Status:</label>
      <b style="color:red;"><?= $appointmentdeclined['status']; ?></b>
      </div>
      <hr style="padding-bottom: 10px;margin: 0px;">
       <div class="row">
       <div class="col-sm-6 col-md-6">
       <label for="reason">Reason:</label>
       <?= $appointmentdeclined['reason']; ?><hr style="padding: 0px;margin: 0px;">
       <label for="created">Date Requested:</label>
       <?= date("m/d/y h:i A",strtotime($appointmentdeclined['created'])); ?>
      </div>
      <div class="col-md-6 col-sm-6">
      <br>
      <br>
      <div class="pull-right">
      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#declinedcheduleModal<?= $appointmentdeclined['id']; ?>"> More Details...</button>

      </div> 
      </div>
      <div id="declinedcheduleModal<?= $appointmentdeclined['id']; ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="background-color: #286090;color: white;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h5 class="modal-title"><i class="fas fa-concierge-bell"></i> Service Request</h5>
            </div>
            <div class="modal-body">
                <label for="created">Date Requested:</label>
                <?= date("F d, Y h:i A",strtotime($appointmentdeclined['created'])); ?><hr style="padding: 0px;margin: 0px;">
                <label for="services">Services Requested:</label><br>
                <?= preg_replace("/[,]/" , "<br>",$appointmentdeclined['services']); ?><hr style="padding: 0px;margin: 0px;">   
               <label for="otherServices">Other Services:</label>
                <?= $appointmentdeclined['otherServices']; ?><hr style="padding: 0px;margin: 0px;">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
            </div>
          </div>
        </div>
      </div>
      </div>
      </div>
      <br>
      <?php 
         }
       }else {
        echo '<ol class="breadcrumb" style="text-align: center;"> 
              <li class="breadcrumb-item active" aria-current="page">NO DECLINED REQUESTS</li>
            </ol>';
        }
      ?> 
    
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

                              <div class="contact-info">
                                   <p><i class="fa fa-phone"></i> 09257196568 / 09304992021</p>
                                   <p><i class="fa fa-envelope-o"></i> <a href="#">eascustoms@yahoo.com</a></p>
                                   <p><i class="fab fa-facebook-square" aria-hidden="true"></i> <a href="#">EAS Customs / @eascustoms75</a>
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