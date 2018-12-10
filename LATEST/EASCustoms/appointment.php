<?php
    session_start();
    include 'process/database.php';
    include 'process/info.php';
    include 'process/auth.php';
    $username=$_SESSION['username'];
    $profile =new database;
    $profile->user_profile($username);


  
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
                          
                        <li><a href="vehicleshistory.php" class="smoothScroll"><i class="fas fa-history"></i> Vehicle History  <span class="label label-pill label-danger count1" style="border-radius:10px;padding:6px;"></span></a></li>
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
    <section id="appointment-detail2" data-stellar-background-ratio="0" style="padding: 0;">
          <div class="container">
                    <form method="post" id="appointment_form">
                        <div class="section-title wow fadeInUp" data-wow-delay="0.2s">
              <h2 align="center">Make an appointment</h2>
                        </div>
                            <div class="wow fadeInUp box" data-wow-delay="0.2s" style="width: auto; padding:5px;">
                            <div class="row">
                            <div class="col-md-6 col-sm-6">
                               <div class="panel panel-default" id="headings">
                                <div class="panel-heading" style="background-color: #b80011;color: white;"><i class="fas fa-car"></i> Select Car</div>
                                <div class="panel-body" style="overflow-y: auto;height: 100px;">
                                  <select class="form-control" name="vehicle" id="vehicle">
                                                  <option value=" " selected disabled>Choose your Vehicle</option>
                                                  <?php foreach($vehicles as $vehicle): ?>
                                                  <option value="<?= $vehicle['id']; ?>"><?= $vehicle['plateNumber']; ?> <?= ucfirst($vehicle['make']); ?> <?= ucfirst($vehicle['series']); ?></option>
                                                  <?php endforeach; ?>                                                  
                                    </select>
                                </div>
                                </div>            
                            </div>
                            <div class="col-md-6 col-sm-6">
                              <div class="panel panel-default" id="headings">
                                <div class="panel-heading" style="background-color: #b80011;color: white;"><i class="fas fa-cogs"></i> Choosen Service.</div>
                                <div class="panel-body" id="serviceDisplay" style="overflow-y: auto;height: 100px;">
                                </div>
                              </div>
                            </div>
                            </div>
                            <br><br>
        
          <div class="row" >
          <div class="col-md-12 col-sm-12">  
          <div class="panel panel-default" id="headings">
                                <div class="panel-heading" style="background-color: #b80011;color: white;"><i class="fas fa-cogs"></i> Select Service</div>
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
                               <input type="checkbox" name="service[]" id="<?= $electricalservice['serviceName']; ?>"  value="<?= $electricalservice['serviceName']; ?>"> 
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
            <div class="panel-heading" style="background-color: #b80011;color: white;"><i class="fas fa-calendar-check"></i> Select Date</div>
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
     <script src="js/notifinvoice.js"></script>
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