<?php require 'process/require/auth.php';?>
<?php require "process/require/dataconf.php";?>

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
            <a class="nav-link"  href="clientrecords.php">
              <i class="menu-icon mdi mdi-file"></i>
              <span class="menu-title" style="font-size:14px;">Client Records</span>
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

                                    <form action="process/adduser_process.php" method="POST">
                                    <p class="card-title" style="font-size:20px;">Personal Information</p>
                                        <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label class="bmd-label-floating">First Name</label>
                                              <input type="text" class="form-control" name="first" required>
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label class="bmd-label-floating">Middle Name</label>
                                              <input type="text" class="form-control" name="middle" required>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label class="bmd-label-floating">Last Name</label>
                                              <input type="text" class="form-control" name="last" required>
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label class="bmd-label-floating">Suffix</label>
                                              <input type="text" class="form-control" name="suffix">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-12">
                                            <div class="form-group">
                                              <label class="bmd-label-floating">Address</label>
                                              <input type="text" class="form-control" name="address" required>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-12">
                                            <div class="form-group">
                                              <label class="bmd-label-floating">Email Address</label>
                                              <input type="text" class="form-control" name="email" required>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label class="bmd-label-floating">Mobile Number</label>
                                              <input type="text" class="form-control"  pattern="[0-9]{4}[0-9]{3}[0-9]{4}" name="mobile" required>
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label class="bmd-label-floating">Telephone Number</label>
                                              <input type="text" class="form-control"  pattern="[0-9]{3}[0-9]{3}[0-9]{4}" name="telephone">
                                            </div>
                                          </div>
                                        </div>
                                        <br><br><br>
                                        <a href="addvehicle.php">
                                            <button type="submit" class="btn btn-primary" name="submit-user" style="float:right">Next <i class="menu-icon mdi mdi-chevron-right"></i></button>
                                            <div class="clearfix"></div>
                                        </a>
                                      </form>
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

</html>