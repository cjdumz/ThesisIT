<?php
session_start();
include 'process/database.php';
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
$sql = "SELECT id, make,series FROM vehicles where personalId = '$result'";
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
     
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/animate.css">

     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/tooplate-style.css">
     <link rel="stylesheet" href="css/normalize.css"  type="text/css"/>
     <link rel="stylesheet" href="css/datepicker.css"  type="text/css"/> 
     <!-- DatePicker dont move to another line -->
     
     <script type="text/javascript" src="js/jquery-ui-1.8.18.custom.min.js"></script> 
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
                         <span class="email-icon"><i class="fa fa-facebook-square" aria-hidden="true"></i> <a href="#">EAS Customs / @eascustoms75</a></span>
                    </div>


                    
        </div>
      </div>

      <style type="text/css">
      ul.nav li.dropdown:hover > ul.dropdown-menu {
      display: block;    
      }
     @media (min-width: 979px) {
      ul.nav li.dropdown:hover > ul.dropdown-menu {
     display: block;
     }
    }
      </style>
          

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

                 <nav class="navbar navbar-inverse">
    <div class="container-fluid">
     <div class="navbar-header">
      <a class="navbar-brand" href="#">Webslesson Tutorial</a>
     </div>
     <ul class="nav navbar-nav navbar-right">
       <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown">Appointment Status <span class="label label-pill label-danger count" style="border-radius:10px;"></span></a>
       <ul class="dropdown-menu" aria-labelledby="dropdownMenuDivider"></ul>
      </li>
     </ul>
    </div>
   </nav>
          

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                     <ul class="nav navbar-nav navbar-right">
                     <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php  if (isset($_SESSION['username'])) : ?><p> <i class="fa fa-user-circle-o" aria-hidden="true"></i></span> Welcome <?php echo $_SESSION['username']; ?> <span class="caret"></span></p>
                </a>
                  <ul class="dropdown-menu">
                     <li><a  href="accountsettings.php" style="font-size: 12px;z-index: 9999;"><i class="fa fa-cogs" aria-hidden="true"></i> Account Settings</a></li>
              <li><a  href="process/logout.php" style="color: red;font-size: 12px;z-index: 9999;"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                    </li>
                  </ul>
                  </li>
             </ul>
                    <?php endif ?>
                    <ul class="nav navbar-nav">
                          <li class="appointment-btn" ><a href="appointment.php">Make an appointment</a></li>
                          <li><a href="vehicleshistory.php" class="smoothScroll"><i class="fa fa-credit-card" aria-hidden="true"></i> Vehicle History</a></li>
                         <li><a href="vehiclesinfo.php" class="smoothScroll"><i class="fa fa-truck" aria-hidden="true"></i> Your Vehicles</a></li>
                         <li class="dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-calendar-o" aria-hidden="true"></i> Appointment Status <span class="label label-pill label-danger count" style="border-radius:10px;"></span></a>
                         <ul class="dropdown-menu" aria-labelledby="dropdownMenuDivider"></ul>
                        </li>              
                    </ul>
               </div>

          </div>
     </section>

  

	 
	 
	 <!-- APPOINTMENT SECTION --> 
	  <section id="appointment-detail" data-stellar-background-ratio="3">
          <div class="container">
				
                    <form method="post" id="appointment_form">
                        <div class="section-title wow fadeInUp" data-wow-delay="0.2s">
							<h2 align="center">Make an appointment</h2>
                        </div>
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <div class="row">
                            <div class="col-md-6 col-sm-6">
                               <label for="select">Select Car</label>
                                    <select class="form-control" name="vehicle" id="vehicle">
                                                  <?php foreach($vehicles as $vehicle): ?>
                                                  <option value="<?= $vehicle['id']; ?>"><?= $vehicle['make']; ?> <?= $vehicle['series']; ?></option>
                                                  <?php endforeach; ?>                                                  
                                    </select>
                            </div>
                            <div class="col-md-6 col-sm-6">
                              <div class="panel panel-default" id="headings">
                                <div class="panel-heading" style="background-color: #b80011;color: white;">Choose a service.</div>
                                <div class="panel-body" id="serviceDisplay" style="overflow-y: auto;height: 100px;">
                                </div>
                              </div>
                            </div>
                            </div>
                            <br><br>

					<div class="row" >
          <div class="col-md-12 col-sm-12">			   
					<label for="service">Select Service</label>
					<br><br>
					<div class ="services" >
                              <ul>
                                 <li><a role="button" id="mechanical" >Mechanical</a></li>
                                 <li><a role="button" id="electrical">Electrical</a></li>
                                 <li><a role="button" id="customize">Customize</a></li>
                                 <li><a role="button" id="bodyRepair">Body Repair</a></li>
                                 <li><a role="button" id="painting">Body Paint</a></li>
                                 <li><a href="#">Maintenance</a></li>
                              </ul>
          </div>
                         <br>


 
                         <div class="service-detail" id="mechanical_service" style="display: none;">
                              
              						<?php
              						 foreach($mechanicalservice->mechanical_service as $mechanicalservice):
              						?>	
                           <div class="col-md-4 col-sm-4">
              						 <input type="checkbox" id="<?= $mechanicalservice['serviceName']; ?>" name="service" value="<?= $mechanicalservice['serviceId']; ?>"><?= $mechanicalservice['serviceName']; ?><br></input>
                           </div>
              						<?php	
                            endforeach; 

              						?>
              					</div>
                         
                          
                         <div class="service-detail" id="electrical_service" style="display: none;">
                              <?php
                               foreach($electricalservice->electrical_service as $electricalservice):
                              ?>   
                               <input type="checkbox" name="service" value="<?= $electricalservice['serviceName']; ?>"> 
                               <?= $electricalservice['serviceName']; ?>
                               </input>
                               <br>
                             </input>

                              <?php     
                                 endforeach;  
                              ?>
                         </div>

                         <div class="service-detail" id="paint_service" style="display: none">
                              <?php
                               foreach($paintservice->painting_service as $paintservice){
                              ?>   
                               <input type="checkbox" name="service" value="<?= $paintservice['serviceId']; ?>"><?= $paintservice['serviceName']; ?></input>
                              <br><br>
                              <?php     
                                   }
                              ?>
                              
                         </div>
                         <div class="service-detail" id="body_Repair" style="display: none">
                               <input type="checkbox" name="service" value="bodyRepair">Request for Body Repair.</input>
                              <br><br> 
                         </div>

                         <div class="service-detail" id="customization" style="display: none">
                               <input type="checkbox" name="service" value="custom">Request for Customization.</input>
                              <br><br> 
                         </div>
                        
                         
            </div>
          </div>
           <div class="form-group">
            <?php
                   foreach($personalinfo->personal_info as $personalinfo):
            ?>
              <input type="text" id="personalId" name="personalId" value="<?= $personalinfo['personalId']; ?>">
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
           if ($.inArray(dmy, unavailableDates) == -1) {
            return [true, ""];
            } else {
            return [false, "", "Unavailable"];
            }
           }

          $(function(){
            $('#datepicker').datepicker({
              minDate: 0,
              beforeShowDay: $.datepicker.noWeekends,
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
          <br>
					<label for="date">Select Date</label>
					<input type="text" id="datepicker" name="date" class="form-control">
					</div>         
          </div>
          <br><br>
          
          <div class="row">		
					<div class="col-md-12 col-sm-12">
					<label for="Message">Additional Message</label>
					<textarea class="form-control" name="additionalMessage" rows="5" id="additionalMessage" name="message" placeholder="Message"></textarea>
					</div>	
                         </div>
					<div class="col-md-6 col-sm-6" style="left:25%;">
					<br>	<br>
          <input type="submit" name="post" id="post" class="btn btn-info" value="Post" />
					</div>
					</div>



                         
                    </form>
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
      $('.dropdown-menu').html(data.notification);
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
      url:"process/server.php",
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
                </div>
            </div>
        </div>
    </section>
	 
	 <!-- END OF APPOINTMENT SECTION -->
	<hr>
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
    

     <script src="js/bootstrap.min.js"></script>
     <script src="js/jquery.sticky.js"></script>
     <script src="js/jquery.stellar.min.js"></script>
     <script src="js/jquery.magnific-popup.min.js"></script>
     <script src="js/magnific-popup-options.js"></script>
     <script src="js/wow.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/custom.js"></script>
     <script src="js/script.js"></script>
     

  

</body>
</html>