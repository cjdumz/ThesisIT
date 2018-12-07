<?php
session_start();

if (isset($_SESSION['username'])) 
     {            
      header('location: home.php');    
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>

     <title>EAS Customs</title>
     <link rel="icon" href="images/Logo.png">
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
     <link rel="icon" href="images/Logo.png">
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/animate.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">
     <link rel="stylesheet" href="css/all.css">
     
    
     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/index-style.css">

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
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-5">
                        <span class="email-icon"><i class="fas fa-user-circle" aria-hidden="true"></i> <a href="login.php">LOGIN</a></span>
                        <span class="email-icon"><i class="fas fa-id-card" aria-hidden="true"></i> <a href="register.php">REGISTER</a></span>
                    </div>
                         
                    <div class="col-md-8 col-sm-7 text-align-right">
                         <span class="phone-icon"><i class="fa fa-phone"></i>  09257196568 / 09304992021</span>
                         <span class="date-icon"><i class="fa fa-calendar-plus-o"></i> 09:00 AM - 05:00 PM (Mon-Sat)</span>
                         <span class="email-icon"><i class="fab fa-facebook-square"></i> <a href="#">EAS Customs / @eascustoms75</a></span>
                    </div>

               </div>
          </div>
     </header>


     <!-- MENU -->
     <section class="navbar navbar-default navbar-static-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <img src="images/Logo.png" class="logoo" alt="logo" />

                    <a href="index.php" class="navbar-brand"> EAS CUSTOMS</a>


               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="index.php" class="smoothScroll">Home</a></li>
                         <li><a href="#about" class="smoothScroll">About Us</a></li>
                         <li><a href="#services" class="smoothScroll">Services</a></li>
                         <li><a href="#fc" class="smoothScroll">Featured Cars</a></li>
                         <li><a href="#team" class="smoothScroll">The Team</a></li>
                         <li><a href="#feedback" class="smoothScroll">Feedback</a></li>
                         <li><a href="#google-map" class="smoothScroll">Find Us</a></li>
                         <li class="appointment-btn"><a href="appointment.php">Make an appointment</a></li>
                    </ul>
               </div>

          </div>
     </section>


     <!-- HOME -->
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                         <div class="owl-carousel owl-theme">
                              <div class="item item-first">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>Let's make the most of your car</h3>
                                             <h1>Fuels Passion Beyond Full Throttle</h1>
                                             <a href="#team" class="section-btn btn btn-default smoothScroll">Meet Our Team</a>
                                        </div>
                                   </div>
                              </div>

                              <div class="item item-second">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>Find out more about us.</h3>
                                             <h1>What is EAS Customs?</h1>
                                             <a href="#about" class="section-btn btn btn-default btn-gray smoothScroll">More About Us</a>
                                        </div>
                                   </div>
                              </div>

                              <div class="item item-third">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>Find out about what we do.</h3>
                                             <h1>Services Beyond Expectations</h1>
                                             <a href="#services" class="section-btn btn btn-default btn-blue smoothScroll">See our Services</a>
                                        </div>
                                   </div>
                              </div>
                         </div>

               </div>
          </div>
     </section>


     <!-- ABOUT -->
     <section id="about">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6">
                         <div class="about-info">
                              <h2 class="wow fadeInUp" data-wow-delay="0.6s">Welcome to EAS Customs</h2>
                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <p>EAS customs is a family-owned business located at #08 Regidor St., Pacdal Baguio City, Benguet. The shop was formerly known as “Toot’s Auto Repair Shop”. The business began as a small-time automotive repair shop in the year 2002. The shop catered mechanical works and was only using the garage of the owner’s house. “Toot’s Auto Repair Shop” was changed to “Enriques A. Simeon Auto Repair Shop” which was named after the owner of the company..</p>
                                   <p>The shop is one of the few auto repair shops that specializes in American and European-made automobiles (eg. BMW, Opel, Ford, Mini Cooper, Mercedes Benz, Chevrolet, and Cadillac)​.</p>
                              </div>
                              <figure class="profile wow fadeInUp" data-wow-delay="1s">
                              </figure>
                         </div>
                    </div>
                    
               </div>
          </div>
     </section>

     <!-- SERVICES -->
     <section id="services" data-stellar-background-ratio="2.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <!-- SECTION TITLE -->
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>Services</h2>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <!-- NEWS THUMB -->
                         <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s">
                              <a href="news-detail.html">
                                   <img src="images/wassup1.jpg" class="img-responsive" alt="">
                              </a>
                              <div class="news-info">
                                   <h3><a href="#">Body Paint</a></h3>
                                   <p>Cars need make-overs too. Our shop offers painting of your cars</p>
                                   
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <!-- NEWS THUMB -->
                         <div class="news-thumb wow fadeInUp" data-wow-delay="0.6s">
                              <a href="news-detail.html">
                                   <img src="images/wassup2.jpg" class="img-responsive" alt="">
                              </a>
                              <div class="news-info">
                                   <h3><a href="#">Body Repair</a></h3>
                                   <p>This is when your car becomes our patient, and we the doctors, fixing your car's sickness</p>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <!-- NEWS THUMB -->
                         <div class="news-thumb wow fadeInUp" data-wow-delay="0.8s">
                              <a href="#">
                                   <img src="images/wassup3.jpg" class="img-responsive" alt="">
                              </a>
                              <div class="news-info">
                                   <h3><a href="#">Customize</a></h3>
                                   <p>Need to spice up your car? We can do that too.</p>
                                   
                              </div>
                         </div>
                    </div>

               </div>
          </div>

          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <!-- SECTION TITLE -->
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <!-- NEWS THUMB -->
                         <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s">
                              <a href="news-detail.html">
                                   <img src="images/wassup4.jpg" class="img-responsive" alt="">
                              </a>
                              <div class="news-info">
                                   <h3><a href="#">Electrical</a></h3>
                                   <p>This is where yur car's electrical components are managed.</p>
                                   
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <!-- NEWS THUMB -->
                         <div class="news-thumb wow fadeInUp" data-wow-delay="0.6s">
                              <a href="news-detail.html">
                                   <img src="images/wassup5.jpg" class="img-responsive" alt="">
                              </a>
                              <div class="news-info">
                                   <h3><a href="#">Maintenance</a></h3>
                                   <p>Your cars need to be maintained and stay its best, we can handle that for you.</p>
                                   
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <!-- NEWS THUMB -->
                         <div class="news-thumb wow fadeInUp" data-wow-delay="0.8s">
                              <a href="news-detail.html">
                                   <img src="images/wassup6.jpg" class="img-responsive" alt="">
                              </a>
                              <div class="news-info">
                                   <h3><a href="#">Mechanical</a></h3>
                                   <p>We also do mechanical works for your car, because we want what's best for you.</p>
                                   
                              </div>
                         </div>
                    </div>

               </div>
          </div>
     </section>

     <!-- LATEST CARS -->
     <section id="fc" data-stellar-background-ratio="2.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <!-- SECTION TITLE -->
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>Latest Cars</h2>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <!-- NEWS THUMB -->
                         <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s">
                              <a href="#">
                                   <img src="images/c1.jpg" class="img-responsive" alt="">
                              </a>
                              <div class="news-info">
                                   <span>March 08, 2018</span>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <!-- NEWS THUMB -->
                         <div class="news-thumb wow fadeInUp" data-wow-delay="0.6s">
                              <a href="#">
                                   <img src="images/c2.jpg" class="img-responsive" alt="">
                              </a>
                              <div class="news-info">
                                   <span>February 20, 2018</span>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <!-- NEWS THUMB -->
                         <div class="news-thumb wow fadeInUp" data-wow-delay="0.8s">
                              <a href="#">
                                   <img src="images/c3.jpg" class="img-responsive" alt="">
                              </a>
                              <div class="news-info">
                                   <span>January 27, 2018</span>
                              </div>
                         </div>
                    </div>

               </div>
          </div>
     </section>

     <!-- TEAM -->
     <section id="team" data-stellar-background-ratio="1">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6">
                         <div class="about-info">
                              <h2 class="wow fadeInUp" data-wow-delay="0.1s">Our Team</h2>
                         </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-md-4 col-sm-6">
                         <div class="team-thumb wow fadeInUp" data-wow-delay="0.2s">
                              <img src="images/eryl.png" class="img-responsive" alt="">

                                   <div class="team-info">
                                        <h3>Chanealle Audune</h3>
                                        <p>Assistant Manager</p>
                                   </div>

                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <div class="team-thumb wow fadeInUp" data-wow-delay="0.4s">
                              <img src="images/eryl.png" class="img-responsive" alt="">

                                   <div class="team-info">
                                        <h3>Eryl Simeon Thaddeus</h3>
                                        <p>Manager / Head Mechanic</p>
                                   </div>

                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <div class="team-thumb wow fadeInUp" data-wow-delay="0.6s">
                              <img src="images/eryl.png" class="img-responsive" alt="">

                                   <div class="team-info">
                                        <h3>N/A</h3>
                                        <p>Supervisor</p>
                                   </div>

                         </div>
                    </div>
                    
               </div>
          </div>
     </section>

     <!-- FEEDBACKS -->
     <section id="feedback" data-stellar-background-ratio="3">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6">
                         <img src="" class="img-responsive" alt="">
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <!-- CONTACT FORM HERE -->
                         <form id="appointment-form" role="form" method="post" action="process/feedback.php">

                              <!-- SECTION TITLE -->
                              <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                                   <h2>Feedback</h2>
                              </div>

                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                  <h3>We love to hear from you</h3>
                                  <br>
                                    <table>
                                        <tr>
                                            <div class="col-md-12 col-sm-12">
                                                <label for="telephone">Name (Optional)</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                                            </div>
                                        </tr>
                                        
                                        <tr>
                                            <div class="col-md-6 col-sm-6">
                                                <br>
                                                <label for="email">Email (Optional)</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                                           </div>
                                        </tr>
                                        <tr>
                                           <div class="col-md-6 col-sm-6">
                                                <br>
                                                <label for="telephone">Phone Number (Optional)</label>
                                                <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Phone Number">
                                           </div>
                                        </tr>                       
                                        
                                  
                                        <tr>
                                            <div class="col-md-12 col-sm-12">
                                             <br>
                                            <label for="Message">Message</label>
                                                <textarea class="form-control" rows="5" id="message" name="message" placeholder="Message"></textarea>
                                                <br>
                                                <button type="submit" class="form-control" id="cf-submit" name="submit">Submit</button>
                                                <br>
                                            </div>
                                        </tr>
                                    </table>
                             </div>
                        </form>
                    </div>

               </div>
          </div>
     </section>


     <!-- GOOGLE MAP -->
     <section id="google-map">
     <!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
	-->
  
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1913.5731268645245!2d120.61448442071841!3d16.417396917170695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3391a155e4185ff3%3A0xcab1184b836ba6ac!2sEAS+Customs!5e0!3m2!1sen!2sph!4v1544168498115" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
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