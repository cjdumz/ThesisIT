<?php require 'process/require/auth.php';?>
<?php require "process/require/dataconf.php";?>
<?php
    $pdo = new PDO('mysql:host=localhost;dbname=thesis', 'eas', '');
$sql = "SELECT chargeinvoice.id as id, vehicles.plateNumber as platenumber, vehicles.make as make, vehicles.series as series, personalInfo.firstName,personalInfo.lastName, chargeinvoice.scopeId as scopeWork, chargeinvoice.sparepartsId as spareParts, chargeinvoice.date, chargeinvoice.totalPrice FROM chargeinvoice join vehicles on chargeinvoice.vehicleId = vehicles.id join personalInfo on chargeinvoice.personalId = personalInfo.personalId;";
$stmt = $pdo->prepare($sql); 
$stmt->execute(); 
$ci = $stmt->fetchAll(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>   
    
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
                  <a class="nav-link" href="reschedule.php" style="font-size:14px;">Overdue</a>
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
            <a class="nav-link"  href="dailytaskform.php">
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
               <div class="content-wrapper">
          <div class="row">
            
            <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-11">
                            <p class="card-title" style="font-size:20px;">Charge Invoice</p>
                            <br>
                        </div>
                        <div class="col-1">
                            <a href ="addcibutton.php"><button type="button" class="btn btn-darkred" style="padding-button: 10px; float: right; width: 145px;" data-toggle="modal" data-target="#addUser"><i class="menu-icon mdi mdi-receipt"></i>
                                Add CI
                            </button></a>
                        </div>
                    </div>
                    
                  
                  
                  <div class="table-responsive">
                  <table class="table table-bordered table-dark" id="doctables">
                      <thead>
                        <tr class="grid">
                            <th>ID</th>
                            <th>Plate</th>
                            <th>Made</th>
                            <th>Series</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Scope Work</th>
                            <th>Spare Parts</th>
                            <th>Date</th>
                            <th>Balance</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody class="table-primary" style="color:black;">
                          <?php foreach($ci as $chargeInvoice): ?>
                              <tr>
                                <td><?= $chargeInvoice['id']; ?></td>
                                <td><?= $chargeInvoice['platenumber']; ?></td>
                                <td><?= $chargeInvoice['make']; ?></td>
                                <td><?= $chargeInvoice['series']; ?></td>
                                <td><?= $chargeInvoice['firstName']; ?></td>
                                <td><?= $chargeInvoice['lastName']; ?></td>
                                <td><?= $chargeInvoice['scopeWork']; ?></td>
                                <td><?= $chargeInvoice['spareParts']; ?></td>
                                <td><?= $chargeInvoice['date']; ?></td>
                                <td><?= $chargeInvoice['totalPrice']; ?></td>
                                  <td>
                                      <form action='payment.php?id=<?= $chargeInvoice['id']; ?>&totalPrice=<?= $chargeInvoice['totalPrice']; ?>' method = 'POST' > Payment = <input type = 'text' name = 'payment' style="border-style: groove; border-radius: 5px; border-color:#f2f2f2">
                                      <input type='submit' name='submit' class="btn btn-primary"></form>
                                  </td>
                              </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                      <br>
                  </div>
                </div>
              </div>
            </div>

          </div>
                </div>
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
    
<script>
  var table = $('#doctables').DataTable({
    // PAGELENGTH OPTIONS
    "lengthMenu": [[ 5, 10, 25, 50, 100, -1], [ 5, 10, 25, 50, 100, "All"]]

});
</script>

</html>
