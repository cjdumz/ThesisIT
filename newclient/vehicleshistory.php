<?php
    session_start();
    include 'process/database.php';
    include 'process/server.php';
     $username=$_SESSION['username'];
     $profile =new database;
     $profile->user_profile($username);
     $personalinfo =new database;
     $personalinfo->personal_info(); 
    if (!isset($_SESSION['username'])) {
    $_SESSION['unauthorized_user'] = '<div class="alert alert-warning fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong>Warning</strong>  Unauthorized user please login.
    </div>';
        header('location: login.php');
      }

?>
<!DOCTYPE html>
<html lang="en">
<head>

     <title>EAS Customs - Vehicle History</title>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <link rel="icon" href="images/Logo.png">
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <!-- Font Awesome Version 5.0 -->
     <link rel="stylesheet" href="css/all.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/animate.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">
     <link href="css/dataTables.bootstrap4.css" rel="stylesheet">
     <script src="js/jquery.js"></script>
     <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>-->
     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/tooplate-style.css">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

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
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php  if (isset($_SESSION['username'])) : ?><p> <i class="fa fa-user-circle-o" aria-hidden="true"></i></span> Welcome <?php echo $_SESSION['username']; ?> <span class="caret"></span></p>
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
                          
                        <li><a href="vehicleshistory.php" class="smoothScroll"><i class="fa fa-credit-card" aria-hidden="true"></i> Vehicle History</a></li>
                        <li><a href="vehiclesinfo.php" class="smoothScroll"><i class="fa fa-truck" aria-hidden="true"></i> Your Vehicles</a></li>  
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
     <br>
    
     
     
  <div class="row">
  <div class="card" style="width: auto; margin-left: 0px; margin-right: 0px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
  <div class="container" >  
  <h3>Vehicle History</h3><br>
  </br>
  <br>


    <table class="table table-hover table-bordered " id="doctables" >
      <thead style="background-color: #B80011;color: white;">
        <tr>
          <th>Plate Number</th>
		  <th>Date</th>
          <th>Service</th>
		  <th>Scope</th>
		  <th>Work</th>
          <th>Scope Price</th>
          <th>Spare Parts</th>
		  <th>Spare Parts Price</th>
		  <th>Total Price</th>
        </tr>
      </thead>
      <tbody>


  <!-- MAIN VIEW VEHICLES -->
  
     <?php
            $db = mysqli_connect('localhost', 'root', '', 'thesis');
            $query = "SELECT * from personalinfo where user_id = '".$_SESSION['id']."'";
            $res = mysqli_query($db,$query);
            $row = mysqli_fetch_assoc($res);
            $personalid = $row['personalId'];
            
            $query1 = "
			SELECT vehicles.plateNumber as plateNumber, chargeinvoice.date as date, scope.scopeWork as scopeWork, scope.subScope as subScope, scope.subsubScope as subsubScope, scope.price as scopePrice, spareparts.name as sparePart, spareparts.price as partPrice, chargeinvoice.TotalPrice as TotalPrice, chargeinvoice.modified from chargeinvoice inner join vehicles on vehicles.id = chargeinvoice.vehicleId inner join scope on scope.id = chargeinvoice.scopeId inner join spareparts on spareparts.id = chargeinvoice.sparePartsId where chargeinvoice.personalId = '$personalid' ORDER BY modified DESC";
            $res = mysqli_query($db,$query1);
            $resultCheck = mysqli_num_rows($res);
                   if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
            ?>
      
      <tr>
		   <?php if (isset($row['plateNumber'])) {
              echo "<td align = 'center'>".$row['plateNumber']."</td>";
            }else
              echo "<td align = 'center'>No Value.</td> ";
        ?>
		  <?php if (isset($row['date'])) {
              echo "<td align = 'center'>".$row['date']."</td>"; 
            }else
              echo "<td align = 'center'>No Value.</td> ";
        ?>
		  <?php if (isset($row['scopeWork'])) {
              echo "<td align = 'center'>".$row['scopeWork']."</td>"; 
            }else
              echo "<td align = 'center'>No Value.</td> ";
        ?>
		  <?php if (isset($row['subScope'])) {
              echo "<td align = 'center'>".$row['subScope']."</td>"; 
            }else
              echo "<td align = 'center'>No Value.</td> ";
        ?>
		  <?php if (isset($row['subsubScope'])) {
              echo "<td align = 'center'>".$row['subsubScope']."</td>"; 
            }else
              echo "<td align = 'center'>No Value.</td> ";
        ?>
		  <?php if (isset($row['scopePrice'])) {
              echo "<td align = 'center'>".$row['scopePrice']."</td>"; 
            }else
              echo "<td align = 'center'>No Value.</td> ";
        ?>
		  <?php if (isset($row['sparePart'])) {
              echo "<td align = 'center'>".$row['sparePart']."</td>"; 
            }else
              echo "<td align = 'center'>No Value.</td> ";
        ?>
		  <?php if (isset($row['partPrice'])) {
              echo "<td align = 'center'>".$row['partPrice']."</td>"; 
            }else
              echo "<td align = 'center'>No Value.</td> ";
        ?>
		  <?php if (isset($row['TotalPrice'])) {
              echo "<td align = 'center'>".$row['TotalPrice']."</td>"; 
            }else
              echo "<td align = 'center'>No Value.</td> ";
        ?>
        <?php 
         }
        }else{
          echo '<td colspan="7"><nav aria-label="breadcrumb" align="center">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">PLEASE ADD A VEHICLE</li>
                  </ol>
                </nav></td>';
        }
        ?>

      </tr>

    </tbody>
  </table>
         </div>
        </div>
      </div>
    </div>
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
     
     <script src="js/bootstrap.min.js"></script>
     <script src="js/jquery.sticky.js"></script>
     <script src="js/jquery.stellar.min.js"></script>
     <script src="js/wow.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/custom.js"></script>
    <!-- FOR TABLE -->
     <script src="js/jquery.dataTables.js"></script>
     <script src="js/dataTables.bootstrap4.js"></script>
     <script src="js/sb-admin-datatables.min.js"></script>

    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="vendors/js/vendor.bundle.addons.js"></script>
 

     <script>
      var table = $('#doctables').DataTable({
      // PAGELENGTH OPTIONS
      "lengthMenu": [[ 10, 25, 50, 100, -1], [ 10, 25, 50, 100, "All"]]

      });
    </script>

</body>
</html>