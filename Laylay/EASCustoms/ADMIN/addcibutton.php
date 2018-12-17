<?php require 'process/require/auth.php';?>
<?php require "process/require/dataconf.php";?>
<?php
include 'database.php';
$mechanicalservice = new database ;
$mechanicalservice -> mechanical_service();
$electricalservice = new database ;
$electricalservice -> electrical_service();
$otherservice = new database ;
$otherservice -> other_service();
$paintservice = new database ;
$paintservice -> painting_service();
$pdo = new PDO('mysql:host=localhost;dbname=thesis', 'root', '');
$sql = "SELECT * FROM vehicles";
$stmt = $pdo->prepare($sql); 
$stmt->execute(); 
$vehicles = $stmt->fetchAll(); 

$sql2 = "SELECT * FROM spareparts";
$stmt2 = $pdo->prepare($sql2); 
$stmt2->execute(); 
$spareparts = $stmt2->fetchAll(); 
                                   

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="script.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>
  <link rel="icon" href="images/Logo.png">
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/custom.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <link href="css/dataTables.bootstrap4.css" rel="stylesheet">
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include "includes/navbar.php";?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
        
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav" style="position:fixed;">
        <hr class="style2">
            
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="menu-icon mdi mdi-view-dashboard"></i>
              <span class="menu-title" style="font-size:14px;">Dashboard</span>
            </a>
          </li>
            
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-inbox"></i>
              <span class="menu-title" style="font-size:14px;">Request</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="appointments.php" style="font-size:14px;">Appointments</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="overdue.php" style="font-size:14px;">Overdue</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="declined.php" style="font-size:14px;">Declined</a>
                </li>
              </ul>
            </div>
          </li>
            
          <li class="nav-item">
            <a class="nav-link" href="calendar.php">
              <i class="menu-icon mdi mdi-calendar"></i>
              <span class="menu-title" style="font-size:14px;">Calendar</span>
            </a>
          </li>
            
          <li class="nav-item">
            <a class="nav-link" href="dailytaskform.php">
              <i class="menu-icon mdi mdi-file"></i>
              <span class="menu-title" style="font-size:14px;">Daily Task Form</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link"  href="chargeinvoice.php">
              <i class="menu-icon mdi mdi-receipt"></i>
              <span class="menu-title" style="font-size:14px;">Charge Invoice</span>
            </a>
          </li>
            
          <li class="nav-item">
            <a class="nav-link" href="accountmanagement.php">
              <i class="menu-icon mdi mdi-account-multiple"></i>
              <span class="menu-title" style="font-size:14px;">Account Management</span>
            </a>
          </li>
            
          <li class="nav-item">
            <a class="nav-link" href="vehicle.php">
              <i class="menu-icon mdi mdi-car-side"></i>
              <span class="menu-title" style="font-size:14px;">Vehicle</span>
            </a>
          </li>
            
        </ul>
      </nav>
      
            <div class="main-panel">
            <form method = "post" action="addCi.php">
               <div class="content-wrapper">
                         
                    <div class="row">  
                       <div class="col-lg-3 grid-margin stretch-card">
                          <div class="card">
                            <div class="card-body">

                            <!-- start -->
                            <p class="card-title" style="font-size:20px;">Scope Work</p>
                            
                                 <div class ="services" >
                                    <ul style="list-style: none;">
                                        <li><button type="button" id="mechanical" class="btn btn-darkblue" style="margin-top: 5px; width: 180px; color:white; font-size:17px;">Mechanical Job</button></li>
                                        <li><button type="button" class="btn btn-warning" id="electrical" style="margin-top: 5px; width: 180px; color:white; font-size:17px;">Electrical Job</button></li>
                                        <li><button type="button" id="painting" class="btn btn-danger" style="margin-top: 5px; width: 180px; color:white; font-size:17px;">Body Paint</button></li>
                                        <li><button type="button" id="others" class="btn btn-success" style="margin-top: 5px; width: 180px; color:white; font-size:17px;">Others</button></li>
                                    </ul>
                                     
                                 </div>
                            
                            <!-- end --> 
                            </div>
                          </div>
                        </div>  
                        
                        
                        <div class="col-lg-9 grid-margin stretch-card">
                          <div class="card">
                            <div class="card-body">
                                
                            <p class="card-title" style="font-size:20px;">Services</p>
                            <!-- start -->
                            <div class="service-detail" id="mechanical_service" style="display: none;">

                                <?php
                                foreach($mechanicalservice->mechanical_service as $mechanicalservice):
                                ?>  
                                <div class="col-md-4 col-sm-4">
                                <input type="checkbox" name="service[]" id="<?= $mechanicalservice['subScope']; ?>"  value="<?= $mechanicalservice['subScope']; ?>"><?= $mechanicalservice['subScope']; ?><br>
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
                                <input type="checkbox" name="service[]" id="<?= $electricalservice['subScope']; ?>"  value="<?= $electricalservice['subScope']; ?>"> 
                                <?= $electricalservice['subScope']; ?>
                
                                <br>
                                
                                </div>
                                <?php     
                                endforeach;  
                                ?>
                            </div>  
                            
                            <div class="service-detail" id="paint_service" style="display: none">
                                <?php
                                foreach($paintservice->painting_service as $paintservice):
                                ?>
                                <div class="col-md-5 col-sm-5">
                                <input type="checkbox" name="service[]" id="<?= $paintservice['subScope']; ?>"  value="<?= $paintservice['subScope']; ?>"><?= $paintservice['subScope']; ?>
                                <br>
                                </div>

                                <br>
                                <?php     
                                endforeach;  
                                ?>      
                            </div>
                             
                            <div class="service-detail" id="other_service" style="display: none">
                                <?php
                                foreach($otherservice->other_service as $otherservice):
                                ?>   
                                <input type="checkbox" name="service[]" id="<?= $otherservice['subScope']; ?>"  value="<?= $otherservice['subScope']; ?>"><?= $otherservice['subScope']; ?>
                                <br>
                                     <?php     
                                endforeach;  
                                ?>       
                            </div>
                            
                            
                            <!-- end --> 
                            </div>
                          </div>
                        </div>  
                        
                        
                       
                   </div>
                   
                   
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                          <div class="card">
                              <div class="card-body">    
                              <div class="container">
                                    
                                    <p class="card-title" style="font-size:20px; " >

                                    Vehicle : <select class="form-control" name="vehicleId" id="vehicle">
                                    <?php foreach($vehicles as $vehicle): ?>
                                    <option value="<?= $vehicle['id']; ?>"><?= $vehicle['plateNumber']; ?> <?= ucfirst($vehicle['make']); ?> <?= ucfirst($vehicle['series']); ?></option>
                                    <?php endforeach; ?>
                                    </select> 

                                    Spare Parts: &nbsp;
                                    <?php foreach($spareparts as $sparepart): ?>
                                    <input type ="checkbox" name="spareParts[]" value="<?= $sparepart['name']; ?>"><?=  $sparepart['name']; ?>
                                    <?php endforeach; ?><br>
                                    Date : <input type ="date" name="date" style="border-style: groove; border-radius: 5px; border-color:#f2f2f2" required><br> 
                                    Total : <input type ="text" name="total" style="border-style: groove; border-radius: 5px; border-color:#f2f2f2"><br><br>

                                    <button class="btn btn-primary" type="submit" name="submit"><i class="menu-icon mdi mdi-checkbox-multiple-marked-circle-outline"></i> Submit</button></p>
                                

                              </div>

                              </div>
                           </div>
                       </div> 
                   </div>
                </div>
            </form>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <?php include "includes/footer.php";?>
                <!-- partial -->
           </div>
      </div>
    </div>
        
    
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
       
</body>

</html>