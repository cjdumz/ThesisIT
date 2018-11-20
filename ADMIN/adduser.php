<?php require 'process/require/auth.php';
      require "process/require/dataconf.php";
// if(!isset($_GET['id'])){
//   header("Location: error.php");
//   exit();
// }

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>User</title>
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
              <i class="menu-icon mdi mdi-sort-variant"></i>
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
                  <a class="nav-link" href="reschedule.php" style="font-size:14px;">Reschedule</a>
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
            <a class="nav-link" href="clientrecords.php">
              <i class="menu-icon mdi mdi-file"></i>
              <span class="menu-title" style="font-size:14px;">Client Records</span>
            </a>
          </li>
            
          <li class="nav-item active">
            <a class="nav-link " href="accountmanagement.php">
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
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <!-- start -->
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Personal Information</h4>
                  <form action="process/adduser_process.php" method="POST">
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
                    <button type="submit" class="btn btn-primary" name="submit-user" style="float:right">Add User</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <!-- end -->
            <!-- start -->
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Vehicle Information</h4>
                  <form action="process/addvehicle_process.php" method="POST">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Plate Number</label>
                          <input type="text" class="form-control" name="plateNumber" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Body Type</label>
                          <input type="text" class="form-control" name="bodyType" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Year Model</label>
                          <input type="text" class="form-control" name="yearModel" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Chassis Number</label>
                          <input type="text" class="form-control" name="chasisNumber">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Engine Classification</label>
                          <input type="text" class="form-control" name="engineClassification" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Number of Cylinders</label>
                          <input type="text" class="form-control" name="numberOfCylinders" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Type of Drive Train</label>
                          <input type="text" class="form-control" name="typeOfDriveTrain" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Make</label>
                          <input type="text" class="form-control" name="make">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Series</label>
                          <input type="text" class="form-control" name="series" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Color</label>
                          <input type="text" class="form-control" name="color">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Engine Number</label>
                          <input type="text" class="form-control" name="engineNumber" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Type of Engine</label>
                          <input type="text" class="form-control" name="typeOfEngine">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Engine Displacement</label>
                          <input type="text" class="form-control" name="engineDisplacement" required>
                        </div>
                      </div>
                    </div>
                    <br><br><br>
                    <button type="submit" class="btn btn-primary" name="submit-vehicle" style="float:right">Add Vehicle</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <!-- end -->



        

          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include "includes/footer.php";?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
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

  <script src="js/jquery.dataTables.js"></script>
  <script src="js/dataTables.bootstrap4.js"></script>
  <script src="js/sb-admin-datatables.min.js"></script>
</body>

</html>

<script>
  var table = $('#doctables').DataTable({
    // PAGELENGTH OPTIONS
    "lengthMenu": [[ 10, 25, 50, 100, -1], [ 10, 25, 50, 100, "All"]]

});
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#officegroup').on('change',function(){
        var ogID = $(this).val();
        if(ogID){
            $.ajax({
                type:'POST',
                url:'includes/getDeviceData.php',
                data:'group_id='+ogID,
                success:function(html){
                    $('#office').html(html);
                    $('#computer').html('<option value="">Select office first</option>'); 
                    $('#part').html('<option value="">Select computer first</option>'); 
                }
            }); 
        }else{
            $('#office').html('<option value="">Select office group first</option>');
            $('#computer').html('<option value="">Select office first</option>'); 
            $('#part').html('<option value="">Select computer first</option>'); 
        }
    });
    
    $('#office').on('change',function(){
        var officeID = $(this).val();
        if(officeID){
            $.ajax({
                type:'POST',
                url:'includes/getDeviceData.php',
                data:'office_id='+officeID,
                success:function(html){
                    $('#computer').html(html);
                    $('#part').html('<option value="">Select computer first</option>');
                }
            }); 
        }else{
          $('#computer').html('<option value="">Select office first</option>'); 
          $('#part').html('<option value="">Select computer first</option>'); 
        }
    });
          $('#computer').on('change',function(){
              var computerID = $(this).val();
              if(computerID){
                  $.ajax({
                      type:'POST',
                      url:'includes/getDeviceData.php',
                      data:'computer_id='+computerID,
                      success:function(html){
                          $('#part').html(html);
                      }
                  }); 
              }else{
                  $('#part').html('<option value="">Select computer first</option>');
              }          
      });
});
</script>