<?php
    session_start();
    include 'process/database.php';

    $username=$_SESSION['username'];
    $profile =new database;
    $profile->user_profile($username);

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

  
$mechanicalservice = new database ;
$mechanicalservice -> mechanical_service();
$electricalservice = new database ;
$electricalservice -> electrical_service();
$paintservice = new database ;
$paintservice -> painting_service();
$appointmentinfo = new database ;
$appointmentinfo -> appointment_info_activeschedule();
$personalinfo = new database ;
$personalinfo -> personal_info();

$id = $_SESSION['id'];
$pdo = new PDO('mysql:host=localhost;dbname=thesis', 'root', '');
$result = $pdo->query("select personalId from personalinfo where user_id = '$id'")->fetchColumn(); 
$sql = "SELECT * FROM vehicles where personalId = '$result'";
$stmt = $pdo->prepare($sql); 
$stmt->execute(); 
$vehicles = $stmt->fetchAll();  
?>
<!DOCTYPE html>
<html lang="en">
<head>

     <title>EAS Customs - Make an Appointment</title>
     <link rel="icon" href="images/Logo.png">

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <link rel="icon" href="images/Logo.png">
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/magnific-popup.css">
     <!-- Font Awesome Version 5.0 -->
     <link rel="stylesheet" href="css/all.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/animate.css">

     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/tooplate-style.css">
     <link rel="stylesheet" href="css/normalize.css"  type="text/css"/>
     <link rel="stylesheet" href="css/datepicker.css"  type="text/css"/> 
     <!-- DatePicker dont move to another line -->

     <!-- Notification Jquery Library -->
     
     <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
     <script> 
      var $jq171 = jQuery.noConflict(true);
      </script>


     <script> 
      window.jQuery = $jq171;
     </script>
     <script type="text/javascript" src="js/jquery-ui-1.8.18.custom.min.js"></script>
     <script src="js/jquery.js"></script>

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
  
    

    <!-- HEADER -->
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
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
              

               </div>
          

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                     <ul class="nav navbar-nav ">
                     <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="padding: 0;"><?php  if (isset($_SESSION['username'])) : ?><p> <i class="fas fa-user-circle"></i></span> Welcome <?php echo $_SESSION['username']; ?> <span class="caret"></span></p>
                </a>
                  <ul class="dropdown-menu" id="dropdownaccount">
                     <li><a  href="accountsettings.php" style="font-size: 12px;z-index: 9999;"><i class="fa fa-cogs" aria-hidden="true"></i> Account Settings</a></li>
              <li><a  href="process/logout.php" style="color: red;font-size: 12px;z-index: 9999;"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
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
  <!-- APPOINTMENT SECTION --> 
  <div class="jumbotron">
    <section id="appointment-detail" data-stellar-background-ratio="3" style="padding: 0;">
          <div class="container">
                    <form method="post" id="appointment_form">
                        <div class="section-title wow fadeInUp" data-wow-delay="0.2s">
              <h2 align="center">Make an appointment</h2>
                        </div>
                            <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <div class="row">
                            <div class="col-md-6 col-sm-6">
                               <div class="panel panel-default" id="headings">
                                <div class="panel-heading" style="background-color: #b80011;color: white;">Select Car</div>
                                <div class="panel-body" style="overflow-y: auto;height: 100px;">
                                  <select class="form-control" name="vehicle" id="vehicle">
                                                  <?php foreach($vehicles as $vehicle): ?>
                                                  <option value="<?= $vehicle['id']; ?>"><?= $vehicle['plateNumber']; ?> <?= ucfirst($vehicle['make']); ?> <?= ucfirst($vehicle['series']); ?></option>
                                                  <?php endforeach; ?>                                                  
                                    </select>
                                </div>
                                </div>            
                            </div>
                            <div class="col-md-6 col-sm-6">
                              <div class="panel panel-default" id="headings">
                                <div class="panel-heading" style="background-color: #b80011;color: white;">Choosen Service.</div>
                                <div class="panel-body" id="serviceDisplay" style="overflow-y: auto;height: 100px;">
                                </div>
                              </div>
                            </div>
                            </div>
                            <br><br>
        
          <div class="row" >
          <div class="col-md-12 col-sm-12">  
          <div class="panel panel-default" id="headings">
                                <div class="panel-heading" style="background-color: #b80011;color: white;">Select Service</div>
                                <div class="panel-body" id="serviceDisplay" style="overflow-y: auto;height: auto;">
                              <div class ="services" >
                              <ul>
                                 <li><a role="button" id="mechanical" >Mechanical</a></li>
                                 <li><a role="button" id="electrical">Electrical</a></li>
                                 <li><a role="button" id="customize">Customize</a></li>
                                 <li><a role="button" id="bodyRepair">Body Repair</a></li>
                                 <li><a role="button" id="painting">Body Paint</a></li>
                                 <li><a role="button" id="maintenance">Maintenance</a></li>
                              </ul>
                              </div>
                               <br>
                                <div class="service-detail" id="mechanical_service" style="display: none;">
                              
                          <?php
                           foreach($mechanicalservice->mechanical_service as $mechanicalservice):
                          ?>  
                           <div class="col-md-4 col-sm-4">
                           <input type="checkbox" name="service[]" id="<?= $mechanicalservice['serviceName']; ?>"  value="<?= $mechanicalservice['serviceName']; ?>"><?= $mechanicalservice['serviceName']; ?><br></input>
                           </div>
                          <?php 
                            endforeach; 

                          ?>
                          </div>
                          
                         
                          
                         <div class="service-detail" id="electrical_service" style="display: none;">
                              <?php
                               foreach($electricalservice->electrical_service as $electricalservice):
                              ?>
                               <div class="col-md-5 col-sm-5">   
                               <input type="checkbox" name="service" id="<?= $electricalservice['serviceName']; ?>"  value="<?= $electricalservice['serviceName']; ?>"> 
                               <?= $electricalservice['serviceName']; ?>
                               </input>
                               <br>
                             </input>
                               </div>
                              <?php     
                                 endforeach;  
                              ?>
                         </div>


                         <div class="service-detail" id="paint_service" style="display: none">
                              <?php
                               foreach($paintservice->painting_service as $paintservice){
                              ?>   
                               <input type="checkbox" name="service[]" id="<?= $paintservice['serviceName']; ?>"  value="<?= $paintservice['serviceName']; ?>"><?= $paintservice['serviceName']; ?></input>
                              <br><br>
                              <?php     
                                   }
                              ?>        
                         </div>
                         <div class="service-detail" id="body_Repair" style="display: none">
                               <input type="checkbox" name="service[]" value="Body Repair">Request for Body Repair.</input>
                              <br><br> 
                         </div>

                         <div class="service-detail" id="customization" style="display: none">
                               <input type="checkbox" name="service[]" value="Customize">Request for Customization.</input>
                              <br><br> 
                         </div>

                         <div class="service-detail" id="maintenance" style="display: none">
                               <input type="checkbox" name="service[]" value="Maintenance">Request for Maintenance.</input>
                              <br><br> 
                         </div>
                        
                        
                                </div>
          </div>      
                       
            </div>
          </div>
           <div class="form-group">
            <?php
                   foreach($personalinfo->personal_info as $personalinfo):
            ?>
              <input type="hidden" id="personalId" name="personalId" value="<?= $personalinfo['personalId']; ?>">
            <?php 
                   endforeach;  
            ?>
           </div>                                            
          <br><br>
          <script type="text/javascript">
           var unavailableDates  = [<?php
           foreach($appointmentinfo->appointment_info as $appointmentinfo):
           ?>"<?= date('j-m-Y', strtotime($appointmentinfo['date'])); ?>",
          <?php     
            endforeach;
          ?>];
           function unavailable(date) {
           dmy = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
           if ($jq171.inArray(dmy, unavailableDates) == -1) {
            return [true, ""];
            } else {
            return [false, "", "Unavailable"];
            }
           }

          $jq171(function(){
            $jq171('#datepicker').datepicker({
              dateFormat: 'yy-mm-dd',
              minDate: 0,
              beforeShowDay: $jq171.datepicker.noWeekends,
              inline: true,
              //nextText: '&rarr;',
              //prevText: '&larr;',
              showOtherMonths: true,
              //dateFormat: 'dd MM yy',
              dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
              beforeShowDay: unavailable, 
              //showOn: "button",
              //buttonImage: "img/calendar-blue.png",
              //buttonImageOnly: true,
            });
          });
          </script>
          <div class="row">

          <div class="col-md-6 col-sm-6">
            <div class="panel panel-default" id="headings">
            <div class="panel-heading" style="background-color: #b80011;color: white;">Select Date</div>
            <div class="panel-body" id="serviceDisplay" style="overflow-y: auto;height: auto;">
            <input type="text" id="datepicker" name="date" class="form-control" autocomplete="off">
            </div>
          </div>
          </div>         
          </div>
          <br><br>
          
          <div class="row">   
          <div class="col-md-12 col-sm-12">
          <label for="Message" style="font-size: 24px;">Additional Message/Other Service</label>
          <textarea class="form-control" name="additionalMessage" rows="5" id="additionalMessage" name="message" placeholder="Message"></textarea>
          </div>  
                         </div>
          <div class="form-group" style="text-align: center;">
          <br>  <br>
          <input type="submit" name="post" id="cf-submit" class="btn btn-danger" value="SUBMIT" style="width: 1000px;" />
          </div>
          </div>         
          </form>
                </div>
            </div>
        </div>
        </div>
    </section>
   
   <!-- END OF APPOINTMENT SECTION -->

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