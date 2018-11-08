<?php require 'process/require/auth.php';?>
<?php require "process/require/dataconf.php";?>
<?php require 'process/process.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Account Management</title>
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
            <a class="nav-link" id="active" href="dashboard.php">
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
              </ul>
            </div>
          </li>
            
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="menu-icon mdi mdi-calendar"></i>
              <span class="menu-title" style="font-size:14px;">Calendar</span>
            </a>
          </li>
            
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="menu-icon mdi mdi-file"></i>
              <span class="menu-title" style="font-size:14px;">Client Records</span>
            </a>
          </li>
            
          <li class="nav-item active">
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
            
          <li class="nav-item">
            <a class="nav-link" href="blank.php">
              <i class="menu-icon mdi mdi-settings"></i>
              <span class="menu-title" style="font-size:14px;">Settings</span>
            </a>
          </li>
            
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="menu-icon mdi mdi-bell"></i>
              <span class="menu-title" style="font-size:14px;">Notifications</span>
            </a>
          </li>
            
        </ul>
      </nav>
        
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            
            <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title" style="font-size:25px; text-decoration: underline; font-weight: 900; color:#b80011;">Register</p>
                  <p class="card-title" style="font-size:23px;">
                    Vehicle Information
                  </p>
                    
                <form id="register_form">
                    <div class="form-group">
                        <label for="plateNumber">Plate Number</label><i style="color:red;"> *</i>
                        <input type="text" class="form-control" id="plateNumber"  placeholder="Enter Plate Number" name="plateNumber">
                        <span></span>
                    </div>
                    
                    <div class="form-group">
                        <label for="make">Make</label><span style="color:red;"> *</span>
                        <input type="text" class="form-control" id="make" aria-describedby="make" name="make" >
                        <small id="make" class="form-text text-muted">Eg. Toyota, Mitsubishi, Honda etc.</small>
                    </div>
                     
                    <div class="form-group">
                        <label for="series">Series</label><span style="color:red;"> *</span>
                        <input class="form-control" type="text" class="form-control" name="series" id="series">
                    </div>
                    
                    <div class="form-group">
                        <label for="yearModel">Year Model</label><span style="color:red;"> *</span>
                        <input class="form-control" type="number" class="form-control" id="yearModel" name="yearModel">
                    </div>
                    
                    <div class="form-group">
                        <label for="color">Color</label><span style="color:red;"> *</span>
                        <input class="form-control" type="text" name="color" id="color">
                    </div>
                             
                          
                    <p class="card-title" style="font-size:23px;">
                    Personal Info
                    </p>   
                          <br>
                          <div class="row">
                          <div class="col-md-4 col-sm-4">
                          <input type="text" class="form-control" name="firstName" placeholder="First Name" id="firstName" required>
                          <div id="firstName_msg" style="display: none; color: red;">First name is empty</div>
                          </div>
                          <div class="col-md-4 col-sm-4">
                          <input type="text" class="form-control" name="middleName" placeholder="Middle Name" id="middleName">
                          <div id="middleName_msg" style="display: none; color: red;">Middle name is empty</div>
                          </div>
                          <div class="col-md-4 col-sm-4">
                          <input type="text" class="form-control" name="lastName" placeholder="Last Name" id="lastName">
                          <div id="lastName_msg" style="display: none; color: red;">Last name is empty</div>
                          </div>
                          </div>
                    
                          <br>
                          <div class="row">
                          <div class="col-md-12 col-sm-12">
                          <input type="text" class="form-control" name="address" placeholder="Address" id="address">
                          <div id="address_msg" style="display: none; color: red;">Address is empty</div>
                          <br>
                          </div>
                          <div class="col-md-12 col-sm-12">
                          <input type="text" class="form-control" name="contactNumber" placeholder="Contact Number" id="contactNumber">
                          <div id="contactNumber_msg" style="display: none; color: red;">Contact is empty</div>
                          <span></span>
                          <br>
                          </div>
                          <div class="col-md-12 col-sm-12">
                          <input type="email" class="form-control" name="Email" placeholder="email" id="email">
                          <div id="email_msg" style="display: none; color: red;">email is empty</div>
                          <div id="emailpat_msg" style="display: none; color: red;"> Invalid Email.</div>
                          <span></span><br>
                          </div>
                          <div class="col-md-12 col-md-12">
                          <input type="text" class="form-control" name="username" placeholder="Username" id="username" pattern=".{8,}" title='must contain 6 or more characters'>
                          <small id="username" class="form-text text-muted"> Must contain 8-12 characters.</small><br>
                          <div id="username_msg" style="display: none; color: red;">Username is empty</div>
                          <div id="usernamepat_msg" style="display: none; color: red;"> Must contain 8 or more characters that are of at least one number, and one uppercase and lowercase letter.</div>
                          <span></span>
                          <br>
                          </div>
                          <div class="col-md-6 col-sm-6">
                          <input type="password" class="form-control" name="password" placeholder="Password" id="password" title="must contain 8 or more characters that are of at least one number, and one uppercase and lowercase letter">
                          <div id="passwordpat_msg" style="display: none; color: red;"> Must contain 8 or more characters that are of at least one number, and one uppercase and lowercase letter.</div>
                          <div id="password_msg" style="display: none; color: red;">password is empty</div>
                          <span></span><br>
                          </div>
                          <br>
                          <div class="col-md-6 col-sm-6">
                          <input type="password" class="form-control" placeholder="Confirm Password" id="confirm_password">
                          <span id="message"></span>
                          </div>
                          </div>
                    
                          <div id="error_msg"></div>
                          <div class="form-group">
                          <button type="button" name="register" id="reg_btn">Register</button>
                          </div>
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
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <!-- Modal -->
  
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
   <script src="js/script.js"></script>
  <!-- AJAX Link -->
 <script>
$(document).ready(function(){
  $("#submit").click(function(){
    var exampleInputName1 = $("#exampleInputName1").val();
    var exampleInputName2 = $("#exampleInputName2").val();
    var exampleInputName3 = $("#exampleInputName3").val();
    var exampleInputPlate = $("#exampleInputPlate").val();
    var exampleInputEmail = $("#exampleInputEmail").val();
    var exampleInputMobile = $("#exampleInputMobile").val();
    var exampleInputTel = $("#exampleInputTel").val();
    var exampleInputAddress = $("#exampleInputAddress").val();
    var dataString = 'exampleInputName1=' + exampleInputName1 + '&exampleInputName2=' + exampleInputName2;
    if(exampleInputName1=='' || exampleInputName2=='' || exampleInputName3=='' || exampleInputNPlate=='' || exampleInputEmail==''
      || exampleInputMobile=='' || exampleInputTel=='' || exampleInputAddress==''){
      alert('Fill all fields')
      $("#display").html("");
    } else {
    $.ajax({
      type: "POST",
      cache: false,
      success: function(result){
       $("#display").html(result);
      }
    });
    }
    return false;
  }); 
});
</script>
</body>




<script>
  var table = $('#doctables').DataTable({
    // PAGELENGTH OPTIONS
    "lengthMenu": [[ 10, 25, 50, 100, -1], [ 10, 25, 50, 100, "All"]]

});
</script>
</html>