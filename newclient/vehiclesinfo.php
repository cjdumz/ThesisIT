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

     <title>EAS Customs - Vehicle Info</title>
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
     <link href="css/dataTables.bootstrap4.css" rel="stylesheet">

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
                         <li><a href="requeststatus.php" class="smoothScroll"><i class="fa fa-calendar-o" aria-hidden="true"></i> Appointment Status  <span class="badge"> 4</span></a></li>
                    </ul>
               </div>

          </div>
     </section>
     <br>
    <div class="container">
    <?php if (isset($_SESSION['vehicle_add'])) : ?>
          <?php 
            echo $_SESSION['vehicle_add']; 
            unset($_SESSION['vehicle_add']);
          ?>
    <?php endif ?>

    <?php if (isset($_SESSION['delete'])) : ?>
          <?php 
            echo $_SESSION['delete']; 
            unset($_SESSION['delete']);
          ?>
    <?php endif ?>
   </div>
     
    
     
     
  <div class="row">
  <div class="card" style="width: auto; margin-left: 0px; margin-right: 0px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
  <div class="container" >  
  <h3>Vehicle Information</h3><br>
    <button type="button" class="btn btn-sm btn-danger " data-toggle="modal" data-target="#addVehicle" style="background-color: #B80011;color: white"><i class="fa fa-car" aria-hidden="true"></i>  Add Vehicle</button>
  </br>
  <!--MODAL ADD VEHICLES-->
  <div class="modal fade" id="addVehicle" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color:#B80011; color: #ffffff;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title"><i class="fa fa-car" aria-hidden="true"></i> Add your Vehicle</h5>
        </div>
        <div class="modal-body">

        <form action="vehiclesinfo.php" method="post">
        <small id="reminder" class="form-text text-muted">Please fill out the required fields.</small>
        <div class="form-group">
         <?php 
         foreach($personalinfo->personalinfo as $personalinfo){
         ?> 
           <input type="hidden" name="personalId" value="<?php echo $personalinfo['personalId']; ?>">
         <?php
            }
         ?>
        </div>
        <div class="form-group">
          <label for="plateNumber">Plate Number</label><span style="color:red;"> *</span>
          <input type="text" class="form-control input-xs" id="plateNumber"  placeholder="Enter Plate Number" name="plateNumber" required="" oninvalid="this.setCustomValidity('Plate Number Invalid or Empty.')" oninput="setCustomValidity('')" pattern="[A-Za-z]{3}-[0-9]{3,}" 
          >
        </div>
        <div class="form-group">
          <label for="make">Make</label><span style="color:red;"> *</span>
          <input type="text" class="form-control input-xs" id="make" aria-describedby="make" name="make" required="" oninvalid="this.setCustomValidity('Make is Empty.')" oninput="setCustomValidity('')" >
          <small id="make" class="form-text text-muted">Eg. Toyota, Mitsubishi, Honda etc.</small>
        </div>
         <div class="form-group">
          <label for="series">Series</label><span style="color:red;"> *</span>
          <input class="form-control input-sm" type="text" class="form-control" name="series" required="" invalid="this.setCustomValidity('Series is Empty.')" oninput="setCustomValidity('')">
        </div>
        <div class="form-group">
          <label for="yearModel">Year Model</label><span style="color:red;"> *</span>
          <input class="form-control input-sm" type="text" class="form-control" id="yearModel" name="yearModel" required="" invalid="this.setCustomValidity('Year Model is Empty.')" oninput="setCustomValidity('')">
        </div>
         <div class="form-group">
          <label for="color">Color</label><span style="color:red;"> *</span>
          <input class="form-control input-sm" type="text" name="color" required="" invalid="this.setCustomValidity('Color is Empty.')" oninput="setCustomValidity('')">
        </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-sm " name="vehicle_add" style="background-color: #B80011;color: white"><i class="fa fa-motorcycle" aria-hidden="true"></i> Add Vehicle</button>
          <button type="button" class="btn btn-sm" data-dismiss="modal" style="background-color: #308ee0;color:black;"><i class="fa fa-times" aria-hidden="true"></i>Cancel</button>
        </div>
      </div>
      </form>
      
    </div>
  </div>
  <br>


    <div class="container">
    <?php if (isset($_SESSION['success'])) : ?>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
    <?php endif ?>
    </div>
    <table class="table table-hover table-bordered " id="doctables" >
      <thead style="background-color: #B80011;color: white;">
        <tr>
          <th>Plate Number</th>
          <th>Make</th>
          <th>Series</th>
          <th>Color</th>
          <th>Created</th>
          <th>Modified</th>
          <th>Actions</th>
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
            
            $query1 = "SELECT * from vehicles where personalId = '$personalid' ORDER BY modified DESC";
            $res = mysqli_query($db,$query1);
            $resultCheck = mysqli_num_rows($res);
                   if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {

              
            ?>
      
      <tr>
        <?php echo "<td align = 'center'>".$row['plateNumber']."</td>"; ?>
        <?php echo "<td align = 'center'>".$row['make']."</td>"; ?>
        <?php echo "<td align = 'center'>".$row['series']."</td>"; ?>
        <?php echo "<td align = 'center'>".$row['color']."</td>"; ?>
        <?php echo "<td align = 'center'>".date('F d, Y', strtotime($row['created']))."</td>"; ?>
        <?php if (isset($row['modified'])) {
              echo "<td align = 'center'>".date('F d, Y', strtotime($row['modified']))."</td>"; 
            }else
              echo "<td align = 'center'>No Value.</td> ";
        ?>
        <td>
        
        <button type="button" class="btn btn-sm btn-primary " data-toggle="modal" data-target="#viewVehicle<?php echo $row['id']; ?>"><i class="fa fa-address-card" aria-hidden="true"></i> View Info</button>
        <button type="button" class="btn btn-sm btn-success " data-toggle="modal" data-target="#editVehicle<?php echo $row['id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Edit</button>
        <button type="button" class="btn btn-sm btn-danger " data-toggle="modal" data-target="#deleteVehicle<?php echo $row['id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i>  Delete</button>
      </td>


      

       <!--MODAL VIEWINFO VEHICLES-->
      <div class="modal fade" id="viewVehicle<?php echo $row['id']; ?>" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="background-color:#B80011; color: #ffffff;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h5 class="modal-title"><?php echo $row['make'].' '.$row['series'].' '.$row['yearModel']; ?></h5>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="plateNumber">Plate Number</label>
                <p><?php echo $row['plateNumber']; ?></p>
              </div>
              <div class="form-group">
                <label for="make">Make</label>
                <p><?php echo $row['make']; ?></p>
              </div>
              <div class="form-group">
                <label for="series">Series</label>
                <p><?php echo $row['series']; ?></p>
              </div>
              <div class="form-group">
                <label for="yearModel">Year Model</label>
                <p><?php echo $row['yearModel']; ?></p>
              </div>
               <div class="form-group">
                <label for="color">Color</label>
                <p><?php echo $row['color']; ?></p>
              </div>
              <div class="form-group">
                <label for="bodyType">Body Type</label>
                <p><?php 
                if (isset($row['modified'])) {
                    echo $row['bodyType'];
                   }else
                   echo "No Value.";   
                ?>
                 <p>
              </div>
              <div class="form-group">
                <label for="chasisNumber">Chasis Number</label>
                <p><?php 
                if (isset($row['chasisNumber'])) {
                    echo $row['chasisNumber'];
                   }else
                   echo "No Value.";   
                ?>
                <p>
              </div>
              <div class="form-group">
                <label for="numberOfCylinders">Number of Cylinders</label>
                <p><?php 
                if (isset($row['numberOfCylinders'])) {
                    echo $row['numberOfCylinders'];
                   }else
                   echo "No Value.";   
                ?>
                <p>
              </div>
               <div class="form-group">
                <label for="engineClassification">Engine Classification</label>
                <p><?php 
                if (isset($row['engineClassification'])) {
                    echo $row['engineClassification'];
                   }else
                   echo "No Value.";   
                ?>
                <p>
              </div>
               <div class="form-group">
                <label for="typeOfDriveTrain">Type of Drive Train</label>
                <p><?php 
                if (isset($row['typeOfDriveTrain'])) {
                    echo $row['typeOfDriveTrain'];
                   }else
                   echo "No Value.";   
                ?>
                <p>
              </div>
               <div class="form-group">
                <label for="engineDisplacement">Engine Displacement</label>
                <p><?php 
                if (isset($row['engineDisplacement'])) {
                    echo $row['engineDisplacement'];
                   }else
                   echo "No Value.";   
                ?>
                <p>
              </div>
              <div class="form-group">
                <label for="typeOfEngine">Type of Engine</label>
                <p><?php 
                if (isset($row['typeOfEngine'])) {
                    echo $row['typeOfEngine'];
                   }else
                   echo "No Value.";   
                ?>
                <p>
              </div>
               <div class="form-group">
                <label for="engineNumber">Engine Number</label>
                <p><?php 
                if (isset($row['engineNumber'])) {
                    echo $row['engineNumber'];
                   }else
                   echo "No Value.";   
                ?>
                <p>
              </div> 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>


       <!--MODAL EDIT VEHICLES-->
      <div class="modal fade" id="editVehicle<?php echo $row['id']; ?>" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="background-color:#B80011; color: #ffffff;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h5 class="modal-title"><?php echo $row['make'].' '.$row['series'].' '.$row['yearModel']; ?></h5>
            </div>
            <div class="modal-body">
          <form action="vehiclesinfo.php" method="post">
          <div class="row">
           <input type="hidden" name="vehicleid" value="<?php echo $row['id']; ?>" >
          <div class="col-sm-12">
          <div class="form-group">
            <label for="plateNumber">Plate Number</label>
            <input type="text" class="form-control input-xs" id="plateNumber" name="plateNumber" value="<?php echo $row['plateNumber']; ?>" >
          </div>
          </div>
           <div class="col-sm-6">
            <div class="form-group">
            <label for="make">Make</label>
            <input type="text" class="form-control input-xs" id="make" name="make" value="<?php echo $row['make']; ?>" >
          </div>
          </div>
           <div class="col-sm-6">
            <div class="form-group">
            <label for="series">Series</label>
            <input type="text" class="form-control input-xs" id="series" name="series" value="<?php echo $row['series']; ?>" >
          </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
            <label for="yearModel">Year Model</label>
            <input type="text" class="form-control input-xs" id="yearModel" name="yearModel" value="<?php echo $row['yearModel']; ?>" >
          </div>
          </div>
           <div class="col-sm-6">
            <div class="form-group">
            <label for="color">Color</label>
            <input type="text" class="form-control input-xs" id="color" name="color" value="<?php echo $row['color']; ?>" >
          </div>
          </div>
          <div class="col-sm-6">
          <div class="form-group">
            <label for="bodyType">Body Type</label>
            <input type="text" class="form-control input-sm" id="bodyType"  name="bodyType" value="<?php echo $row['bodyType']; ?>">
          </div>
          </div>
         <div class="col-sm-6">
          <div class="form-group">
            <label for="chasisNumber">Chasis Number</label>
            <input type="text" class="form-control" id="chasisNumber" name="chasisNumber" value="<?php echo $row['chasisNumber']; ?>" >
          </div>
         </div>
           <div class="col-sm-6">
           <div class="form-group">
            <label for="numberOfCylinders">Number of Cylinders</label>
            <input type="number" class="form-control" id="numberOfCylinders" name="numberOfCylinders"value="<?php echo $row['numberOfCylinders']; ?>">
           </div>
           </div>
           <div class="col-sm-6">
           <div class="form-group">
            <label for="typeOfDriveTrain">Type of Drive Train</label>
            <input type="number" class="form-control" id="typeOfDriveTrain" name="typeOfDriveTrain" value="<?php echo $row['typeOfDriveTrain']; ?>">
          </div>
          </div>
           <div class="col-sm-6">
           <div class="form-group">
            <label for="engineNumber">Engine Number</label>
            <input type="text" class="form-control" id="engineNumber" name="engineNumber" value="<?php echo $row['engineNumber']; ?>">
          </div>
          </div>
           <div class="col-sm-6">
           <div class="form-group">
            <label for="engineDisplacement">Engine Displacement</label>
            <input type="number" class="form-control" id="engineDisplacement" name="engineDisplacement" value="<?php echo $row['engineDisplacement']; ?>">
          </div>  
           </div> 
           <div class="col-sm-6">
           <div class="form-group">
            <label for="engineClassification">Engine Classification</label>
            <input type="text" class="form-control" id="engineClassification" name="engineClassification" value="<?php echo $row['engineClassification']; ?>">
          </div>
          </div>
          <div class="col-sm-6">
          <div class="form-group">
            <label for="typeofEngine">Type of Engine</label>
            <input type="text" class="form-control" id="typeOfEngine" name="typeOfEngine" value="<?php echo $row['typeOfEngine']; ?>">
          </div>
          </div>
          </div>   
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-sm btn-primary" name="vehiclesinfo_edit">Edit Vehicle</button>
              <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
            </div>
          </div>
         </form>
          
        </div>
      </div>

     <!--MODAL DELETE VEHICLES-->
      <div class="modal fade" id="deleteVehicle<?php echo $row['id']; ?>" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <form action="vehiclesinfo.php" method="post">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#B80011; color: #ffffff;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h5 class="modal-title"> <?php echo $row['make'].' '.$row['series'].' '.$row['yearModel']; ?>?</h5>
            </div>
            <div class="modal-body">
              <h5>Are you sure?All data about <?php echo $row['make'].' '.$row['series'].' '.$row['yearModel']; ?> will be deleted?</h5>
            <input type="hidden" name="vehicleId" value="<?php echo $row['id']; ?>">
            </div>
          
            <div class="modal-footer">
              <button type="submit" class="btn btn-sm btn-success" name="vehicle_delete">Yes</button>
              <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
            </div>
          </div>
          </form>
          
        </div>
      </div>
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
     <script src="js/jquery.js"></script>
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