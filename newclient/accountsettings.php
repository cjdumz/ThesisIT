<?php
     session_start();
    include 'process/database.php';
    include 'process/server.php';
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
     </section>-->


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
                          
                        <li><a href="vehicleshistory.php" class="smoothScroll"><i class="fas fa-history"></i>  Vehicle History</a></li>
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
   </div>
 <div class="container">
 <div class="row">
 <div class="col-md-12 col-sm-12">
   <div class="panel panel-default" id="headings">
  <div class="panel-heading" style="background-color: #b80011;color: white;"><i class="fas fa-user"> </i>  User Profile</div>
  <div class="panel-body" id="serviceDisplay" style="overflow-y: auto;height: ;">
  <form action="personalinfoedit.php" >
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
  
  </div>
    <div class="vl"></div>
    <div class="col-sm-6 col-md-6">
    <div class="form-group">
    <h4>Contact Information</h4>
    </div>
      <label for="email">Email:</label>
      <?php echo $personalinfo['email']; ?><hr style="padding: 0px;margin: 0px;">
      <label for="phone">Contact Number:</label>
      <?php echo $personalinfo['mobileNumber']; ?><hr style="padding: 0px;margin: 0px;">
      <label for="address">Address:</label>
      <?php echo ucfirst($personalinfo['address']); ?><hr style="padding: 0px;margin: 0px;">
      <label for="modified">Date Created:</label>
      <?php echo $personalinfo['created']; ?><hr style="padding: 0px;margin: 0px;">
      <label for="modified">Date Modified:</label>
      <?php if (isset($personalinfo['modified'])){
             echo $personalinfo['modified']; 
            }else {
             echo "-----";
             }?>
      <hr style="padding: 0px;margin: 0px;">
  </div>
  </div>
  <div class="form-group">
    <br>
  <div class="pull-right">
  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#viewVehicle" style="background-color: #b80011;"><i class="fas fa-car"></i> My Vehicle</button>
  <button type="submit" class="btn btn-success btn-sm" style="background-color: #4caf50; "><i class="fas fa-user-edit"></i> Edit </button>
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
</form>

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
                                        
                                   </div>
                                   <div class="stories-info">
                                        <a href="#"><h5>Amazing Technology</h5></a>
                                        <span>March 08, 2018</span>
                                   </div>
                              </div>

                              <div class="latest-stories">
                                   <div class="stories-image">
                                        
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

      <script>
  $(document).ready(function(){
   
   function load_unseen_notification(view = '')
   {
    $.ajax({
     url:"process/fetch.php",
     method:"POST",
     data:{view:view},
     dataType:"json",
     success:function(data)
     {
      $('#dropdownnotif').html(data.notification);
      if(data.unseen_notification > 0)
      {
       $('.count').html(data.unseen_notification);
      }
     }
    });
   }
   
   load_unseen_notification();
   
   $('#appointment_form').on('submit', function(event){
    event.preventDefault();
    if($('#vehicle').val() != '' && $('#additionalMessage').val() != '')
    {
     var form_data = $(this).serialize();
     $.ajax({
      url:"process/insert.php",
      method:"POST",
      data:form_data,
      success:function(data)
      {
       $('#appointment_form')[0].reset();
       load_unseen_notification();
      }
     });
    }
    else
    {
     alert("Both Fields are Required");
    }
   });
   
   $(document).on('click', '.dropdown-toggle', function(){
    $('.count').html('');
    load_unseen_notification('yes');
   });
   
   setInterval(function(){ 
    load_unseen_notification();; 
   }, 5000);
   
  });
  </script>

     <!-- SCRIPTS -->
     
     <script src="js/bootstrap.min.js"></script>
     <script src="js/jquery.sticky.js"></script>
     <script src="js/jquery.stellar.min.js"></script>
     <script src="js/wow.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/custom.js"></script>

</body>
</html>