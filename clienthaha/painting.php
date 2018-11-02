<?php
session_start();
 $id = $_SESSION['id'];
//Connect to our MySQL database using the PDO extension.
$pdo = new PDO('mysql:host=localhost:3308;dbname=thesis', 'root', 'root');
$result = $pdo->query("select personalId from personalinfo where user_id = '$id'")->fetchColumn();

//Our select statement. This will retrieve the data that we want.
$sql = "SELECT id, make,series FROM vehicles where personalId = '$result'";
//Prepare the select statement.
$stmt = $pdo->prepare($sql);

 
//Execute the statement.
$stmt->execute();
 
//Retrieve the rows using fetchAll.
$vehicles = $stmt->fetchAll();
 
$sql2 = "SELECT serviceId,serviceType,serviceName from services where serviceType = 'Painting'";
$stmt2 = $pdo->prepare($sql2); 
$stmt2->execute();
 
//Retrieve the rows using fetchAll.
$services = $stmt2->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <title>EAS Customs - Make an Appointment</title>
<!--

Template 2098 Health

http://www.tooplate.com/view/2098-health

-->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/magnific-popup.css">

     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/animate.css">

     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/tooplate-style.css">
	 <link rel="stylesheet" href="css/index-style.css">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->



      <!-- HEADER -->
    <!-- HEADER -->
     <header>
          <div class="container" >
               <div class="row">
                    <div class="col-md-4 col-sm-5">
						<img src="images/Logo.png" class="logoo" alt="logo" />
                       <a href="index.html" class="navbar-brand" >EAS Customs</a>
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
                          <li class="appointment-btn" ><a href="appointment.php">Make an appointment</a></li>
                          <li><a href="#top" class="smoothScroll">My Vehicle History</a></li>
                         <li><a href="#top" class="smoothScroll">My Vehicles</a></li>
                    </ul>
               </div>

          </div>
     </section>

	 
	 
	 <!-- APPOINTMENT SECTION --> 
	  <section id="appointment-detail" data-stellar-background-ratio="3">
          <div class="container">
               <div class="">
					<form id="appointment-form" role="form" method="post" action="process/appointmentrequest.php">
                        <div class="section-title wow fadeInUp" data-wow-delay="0.2s">
							<h2>Make an appointment</h2>
                        </div>

                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <div class="col-md-6 col-sm-6">
                                <label for="select">Select Car</label>
                                   <select class="form-control" name="vehicle" id="vehicle">
										<?php foreach($vehicles as $vehicle): ?>
										<option value="<?= $vehicle['id']; ?>"><?= $vehicle['make']; ?> <?= $vehicle['series']; ?></option>
										<?php endforeach; ?>										
                                    </select>
                            </div>
								   
							<div class="col-md-12 col-sm-12">
							<br>
							<br>
							<label for="service">Select Service</label>
							<br>
							<br>
								<div class ="services">
									<ul>
										<li><a href="appointment.php">Mechanical</a></li>
										<li><a href="electrical.php">Electrical</a></li>
										<li><a href="#">Customize</a><li>
										<li><a href="#">Body Repair</a></li>
										<li><a class="active" href="painting.php">Body Paint</a></li>
										<li><a href="#">Maintenance</a></li>
									</ul>
								</div>
								<div class ="service-detail">
									<?php foreach($services as $service): ?>
									<input type="checkbox" name="service" value="<?= $service['serviceId']; ?>"><?= $service['serviceName']; ?>
									<br></input>
									<?php endforeach; ?>
									<br>
									<textarea class="form-control" rows="4" id="others" name="others" placeholder="Others"></textarea>
								</div>                   
							</div>
				   
							<div class="col-md-6 col-sm-6">
								<br>
								<br>
								<label for="date">Select Date</label>
								<input type="date" name="date" value="" class="form-control">
							</div>

							<div class="col-md-6 col-sm-6">
								<br>
								<br>
								<label for="time">Select Time</label>
								<input type="time" name="time" value="" class="form-control">
							</div>
							
							<div class="col-md-12 col-sm-12">
								<br>
								<br>
								<label for="Message">Additional Message</label>
								<textarea class="form-control" rows="5" id="message" name="message" placeholder="Message"></textarea>
							</div>
							
							<div class="col-md-6 col-sm-6" style="left:25%;">
								<br>
								<br>
								<button type="submit" class="form-control" id="cf-submit" name="submit" >Submit</button>
							</div>
						</div>
                    </form>
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
     <script src="js/jquery.magnific-popup.min.js"></script>
     <script src="js/magnific-popup-options.js"></script>
     <script src="js/wow.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/custom.js"></script>

</body>
</html>