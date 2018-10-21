<?php require 'process/require/auth.php';?>
<?php require "process/require/dataconf.php";?>

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
        <ul class="nav">
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

                    <div class="row">
                        <div class="col-11">
                            <p class="card-title" style="font-size:20px;">Users</p>
                            <p class="card-description">
                                List of Users
                            </p>
                        </div>
                        <div class="col-1">
                            <button type="button" class="btn btn-darkred" style="padding-button: 10px; float: right; width: 145px;" data-toggle="modal" data-target="#addUser"><i class="menu-icon mdi mdi-account-multiple-plus"></i>
                                Add User
                            </button>
                        </div>
                    </div>
                  
                  
                  <div class="table-responsive">
                  <table class="table table-bordered table-dark" id="doctables">
                      <thead>
                        <tr class="grid">
                          <th style="font-size:15px;">
                            ID
                          </th>
                          <th style="font-size:15px;">
                            Name
                          </th>
                          <th style="font-size:15px;">
                            Address
                          </th>
                          <th style="font-size:15px;">
                            Mobile Number
                          </th>
                          <th style="font-size:15px;">
                            Email
                          </th>
                          <a href=""></a>
                        </tr>
                      </thead>
                      <tbody class="table-primary" style="color:black;">
                        <?php
                            $data = $connection->prepare("SELECT * from personalinfo;");
                            if($data->execute()){
                                $values = $data->get_result();
                                while($row = $values->fetch_assoc()) {
                                echo '
                                    <tr>
                                        <td>'.$row['personalId'].'</td>
                                        <td><a href="user.php?id='.$row['personalId'].'">'.$row['firstName'].' '.$row['middleName'].' '.$row['lastName'].'</a></td>
                                        <td>'.$row['address'].'</td>
                                        <td>'.$row['mobileNumber'].'</td>
                                        <td>'.$row['email'].'</td>
                                        
                                        
                                    </tr>



                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter'.$row['personalId'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header" style="background-color: #B80011; color: white; border: 3px solid #B80011;">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Reschedule</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <!-- start -->
                                            
                                            <form class="forms-sample">
                                              <div class="form-group row">
                                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Previous Date</label>
                                                <div class="col-sm-9">
                                                  <input type="date" class="form-control" id="exampleInputEmail2" disabled value="">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Proposed Date</label>
                                                <div class="col-sm-9">
                                                  <input type="date" class="form-control" id="exampleInputPassword2" placeholder="">
                                                </div>
                                              </div>
                                            <!-- end -->
                                          </div>
                                          <div class="modal-footer" >
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-danger">Dismiss</button>
                                            <button type="button" class="btn btn-success">Reschedule</button>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                ';
                                }
                            }else{
                                echo "<tr>
                                        <td colspan='7'>No Available Data</td>
                                    </tr>";
                            }
                        ?>
                      </tbody>
                    </table>
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
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <!-- Modal -->
    <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #B80011; color: white; border: 3px solid #B80011;">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <!-- start -->
                <br>
                  <form class="forms-sample">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputName2">Middle Name</label>
                                <input type="text" class="form-control" id="exampleInputName2" placeholder="Middle Name">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputName3">Last Name</label>
                                <input type="text" class="form-control" id="exampleInputName3" placeholder="Last Name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPlate">Plate Number</label>
                      <input type="text" class="form-control" id="exampleInputPlate" placeholder="Plate Number">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputMobile">Mobile Number</label>
                      <input type="text" class="form-control" id="exampleInputMobile" placeholder="Mobile Number">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputTel">Telephone Number</label>
                      <input type="text" class="form-control" id="exampleInputTel" placeholder="Telephone Number">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputAddress">Address</label>
                      <input type="text" class="form-control" id="exampleInputAddress" placeholder="Location">
                    </div>
                    <button id="submit" type="button">Add</button>
                    &nbsp;
                    <button type="button" class="btn btn-secondary" style="width: 100px;" data-dismiss="modal"><i class="menu-icon mdi mdi-close"></i>Close</button>
                    </form> 
                   
                <!-- end -->
                </div>
          <!-- <div class="modal-footer" >
                <form>
                </form>
                </div> -->
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

  <script src="js/jquery.dataTables.js"></script>
  <script src="js/dataTables.bootstrap4.js"></script>
  <script src="js/sb-admin-datatables.min.js"></script>
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