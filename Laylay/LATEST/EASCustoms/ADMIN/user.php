<?php require 'process/require/auth.php';
      require "process/require/dataconf.php";
if(!isset($_GET['id'])){
  header("Location: error.php");
  exit();
}else{
  $id = $connection->real_escape_string($_GET["id"]);
  $data = $connection->prepare("SELECT *, concat(firstName, ' ',middleName, ' ',lastName)as 'Name' FROM `personalinfo` WHERE personalId =  $id");
  if($data->execute()){
      $values = $data->get_result();
      $row = $values->fetch_assoc();
      $ID = $row['personalId'];
      $Name = $row['Name'];
  }else{
      header("Location: error.php");
  }
}

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
            <div class="col-lg-12 grid-margin  stretch-card">
              <div class="card">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="accountmanagement.php" style="font-size:18px;">Account Management</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="font-size:18px;"><?php echo $Name ?></li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>

          <div class="row">
            
            <!-- start -->

             <?php
              if(isset($_GET['id'])){
                $id = $_GET['id'];
                $getuser = $connection->prepare('SELECT * FROM personalinfo where personalId = '.$id.' limit 1; ');
                $getuser->execute();
                $value = $getuser->get_result();
                $contentx = $value->fetch_assoc();
              }
              ?>

            <!-- end -->

            <!-- start -->
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <p class="card-title" style="font-size:20px;"><i class="fa fa-caret-square-o-left"></i><?php echo $Name ?></p>
                <!-- start -->
                <form class="form-sample">
                  <p class="card-description">
                    Personal information
                  </p>

                  <div class="row">
                    <div class="offset-1 col-md-2"><p >Name </p></div>
                    <div class="col-md-9"><p style="margin-top: -1%" class="card-title">: <?php echo $row['Name'] ?></p></div>
                  </div>

                  <div class="row">
                    <div class="offset-1 col-md-2"><p>Address </p></div>
                    <div class="col-md-9"><p style="margin-top: -1%" class="card-title">: <?php echo $row['address'] ?></p></div>
                  </div>

                  <div class="row">
                    <div class="offset-1 col-md-2"><p>Mobile Number </p></div>
                    <div class="col-md-9"><p style="margin-top: -1%" class="card-title">: <?php echo $row['mobileNumber'] ?></p></div>
                  </div>

                  <div class="row">
                    <div class="offset-1 col-md-2"><p>Telephone Number </p></div>
                    <div class="col-md-9"><p style="margin-top: -1%" class="card-title">: <?php echo $row['telephoneNumber'] ?></p></div>
                  </div>

                  <div class="row">
                    <div class="offset-1 col-md-2"><p>Email </p></div>
                    <div class="col-md-9"><p style="margin-top: -1%" class="card-title">: <?php echo $row['email'] ?></p></div>
                  </div>

                  <?php 
                    $count = $connection->prepare("SELECT count(plateNumber) as 'counter' from vehicles where personalId = $id");
                    if($count->execute()){
                        $values3 = $count->get_result();
                        $row3 = $values3->fetch_assoc();
                        $counter = $row3['counter'];
                    }
                  ?>
                </form>
              <!-- end -->
                  <button type="submit" class="btn btn-success" style="float:right"  data-toggle="modal"  data-target="#updateprofilemodal">
                    <i class="menu-icon mdi mdi-account-convert"></i> Update Profile
                  </button>
                  
                  <br><br>

                  <p class="card-description">
                    Account information
                  </p>

                  <?php
                      if(empty($row['user_id'])){
                        echo '
                              <div class="row">
                                <div class="offset-1 col-md-2"><p >Status </p></div>
                                <div class="col-md-9">
                                  <p style="margin-top: -1%" class="card-title">: 
                                    No Account
                                  </p>
                                </div>
                              </div>

                              <form action="process/server.php" method="POST">
                                <input type="hidden" value="'.$id.'" name="personal-id">
                                <button type="submit" name="generate" class="btn btn-success" style="float:right" >
                                  <i class="menu-icon mdi mdi-account-settings-variant"></i> Generate Account
                                </button>
                              </form>
                        ';
                      }else{
                        $user = $row['user_id'];
                        $query = $connection->prepare("SELECT * FROM `users` WHERE `id` = '$user';");
                        if($query->execute()){
                          $values = $query->get_result();
                          $row = $values->fetch_assoc();
                          echo '
                              <div class="row">
                                <div class="offset-1 col-md-2"><p >Status </p></div>
                                <div class="col-md-9">
                                  <form action="process/server.php" method="POST">
                                  <input type="hidden" value="'.$id.'" name="per-id">
                                  <input type="hidden" value="'.$user.'" name="user-id">
                                  <input type="hidden" value="'.$row['status'].'" name="status">
                                  <p style="margin-top: -8%" class="card-title">

                                  ';
                                  if($row['status'] == 'Active'){
                                    echo ' 
                                          <button type="submit" name="changeStatus" class="btn btn-success" style="float:left" >'.$row['status'].'</button>
                                        ';
                                  }else{
                                    echo ' <button type="submit" name="changeStatus" class="btn btn-danger" style="float:left" >'.$row['status'].'</button> ';
                                  }
                                   
                                    echo'

                                  </p>
                                  </form>
                                </div>
                              </div>

                              <div class="row">
                                <div class="offset-1 col-md-2"><p >Username</p></div>
                                <div class="col-md-9">
                                  <p style="margin-top: -1%" class="card-title">: 
                                  '.$row['username'].'
                                  </p>
                                </div>
                              </div>

                              <div class="row">
                                <div class="offset-1 col-md-2"><p >Password</p></div>
                                <div class="col-md-9">
                                  <p style="margin-top: -1%" class="card-title"> 
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#changePassword">
                                      <i class="menu-icon mdi mdi-lock-reset"></i>Change Password
                                    </button>
                                  </p>
                                </div>
                              </div>

                              <!-- Modal -->
                              <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="process/server.php" method="POST">
                                      <div>
                                        <label for="message-text" class="col-form-label">Password:</label>
                                        <input type="password" class="form-control" name="p1"  id="password" placeholder="Password"  onkeyup="check();" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="message-text" class="col-form-label">Confirm Password:</label>
                                        <input type="password" class="form-control" name="p2"  id="confirm_password" placeholder="Confirm Password" onkeyup="check();" required>
                                        <span id="message">
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <input type="hidden" value="'.$id.'" name="per-id">
                                      <input type="hidden" value="'.$user.'" name="user-id">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" name="changePass" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                          ';
                        }
                      }
                    ?>


                
                  
                </div>
              </div>
            </div>
            <!-- end -->

            <!-- start -->
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                <!-- start -->
                <p class="card-title" style="font-size:20px;">Vehicle List</p>
                <div class="table-responsive">
                    <table class="table table-bordered table-dark" id="doctables">
                      <thead>
                        <tr class="text-center">
                          <th>Plate Number</th>
                          <th>View</th>
                        </tr>
                      </thead>
                      <tbody class="table-primary" style="color:black;">
                        
                      <?php
                        $datas = $connection->prepare("Select * from `vehicles` where personalId = $id;");
                        if($datas->execute()){
                            $valuess = $datas->get_result();
                            while($row2 = $valuess->fetch_assoc()) {
                            echo '
                                <tr>
                                  <td>'.$row2['plateNumber'].'</td>
                                  <td class="text-center"><a href="viewvehicle.php?plate='.$row2['plateNumber'].'"><button class="btn btn-primary"><i class="menu-icon mdi mdi-eye-outline"></i> View</td>
                                </tr>
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
                <!-- end -->
                 
                </div>
              </div>
            </div>
            <!-- end -->

            <!-- start -->
            <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Records</h4>
                  
                  <!-- start -->
                  <div class="table-responsive">
                    <table class="table table-borderless table-dark" id="doctables2">
                      <thead>
                        <tr class="text-center">
                          <th>Plate Number</th>
                          <th>Date</th>
                          <th>Status</th>
                          <th>Progress</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody class="table-primary" style="color:black;">
                        
                      <?php
                        $data = $connection->prepare("SELECT appointments.id as 'id', vehicles.plateNumber 'plateNumber', appointments.date as 'date', appointments.status as 'stats', appointments.personalId
                        as 'client' from appointments inner join vehicles on appointments.vehicleId = vehicles.id where appointments.personalId = '$id' AND(appointments.status = 'Done' OR appointments.status
                         = 'In-Progress' OR appointments.status = 'Accepted')");
                        if($data->execute()){
                            $values = $data->get_result();
                            while($row = $values->fetch_assoc()) {
                            $dateTime = $row['date'];
                            $dateTimeSplit = explode(" ",$dateTime);
                            $date = $dateTimeSplit[0];
                            echo '
                                <tr>
                                <td>'.$row['plateNumber'].'</td>
                                <td>'; echo date('M d, Y',strtotime($date)); echo '</td>
                                <td>'.$row['stats'].'</td>
                                <td>
                                  <div class="progress">
                                    <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                                      aria-valuemax="100">
                                    </div>
                                  </div>
                                </td>
                                <td class="text-center">
                                    <div class="row">
                                      <div class="col-12">
                                        <a href="records.php?id='.$row['id'].'"><button class="btn btn-primary" style="margin-top: 5px; width: 145px; color:white;">
                                          <i class="menu-icon mdi mdi-eye-outline"></i>
                                          View
                                        </button></a>
                                      </div>
                                    </div>
                                    
                                </td>

                                </tr>
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
                  <!-- end -->

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

  <!-- modal start -->
  <div class="modal fade" id="updateprofilemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header" style="background-color: #4caf50; color: white; border: 3px solid #4caf50;">
        <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <!-- start -->
      <p class="card-title" style="font-size:20px;">Personal Information</p>
      <form action="process/server.php" method="POST">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="bmd-label-floating">Fist Name</label>
              <input type="hidden" name="id" value="<?php echo $id; ?>">
              <input type="text" class="form-control" name="first" value="<?php echo $contentx['firstName'] ?>" placeholder="<?php echo $contentx['firstName'] ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="bmd-label-floating">Middle Name</label>
              <input type="text" class="form-control" name="middle" value="<?php echo $contentx['middleName'] ?>" placeholder="<?php echo $contentx['middleName'] ?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="bmd-label-floating">Last Name</label>
              <input type="text" class="form-control" name="last" value="<?php echo $contentx['lastName'] ?>" placeholder="<?php echo $contentx['lastName'] ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="bmd-label-floating">Suffix</label>
              <input type="text" class="form-control" name="suffix" value="<?php echo $contentx['suffix'] ?>" placeholder="<?php echo $contentx['suffix'] ?>">
              <span style="font-size: 10px">(Ex. II)</span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label class="bmd-label-floating">Adress</label>
              <input type="text" class="form-control" name="address" value="<?php echo $contentx['address'] ?>" placeholder="<?php echo $contentx['address'] ?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label class="bmd-label-floating">Email Address</label>
              <input type="text" class="form-control" name="email" value="<?php echo $contentx['email'] ?>" placeholder="<?php echo $contentx['email'] ?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="bmd-label-floating">Mobile Number</label>
              <input type="text" class="form-control" name="mobile" pattern="[0-9]{4}[0-9]{3}[0-9]{4}" value="<?php echo $contentx['mobileNumber'] ?>" placeholder="<?php echo $contentx['mobileNumber'] ?>">
              <span style="font-size: 10px">(Ex. 09*********)</span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="bmd-label-floating">Telephone Number</label>
              <input type="text" class="form-control" name="telephone" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" value="<?php echo $contentx['telephoneNumber'] ?>" placeholder="<?php echo $contentx['telephoneNumber'] ?>">
              <span style="font-size: 10px">(Ex. 074 *** ****)</span>
            </div>
          </div>
        </div>
                    
        <!-- end -->
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success" name="submit-user" style="float:right"><i class="menu-icon mdi mdi-account-convert"></i> Update Profile</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="menu-icon mdi mdi-close"></i> Close</button>
          <div class="clearfix"></div>
        </form>
        </div>
      </div>
    </div>
  </div>
  <!-- modal end -->

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
    "lengthMenu": [[ 5, 10, 25, 50, 100, -1], [ 5, 10, 25, 50, 100, "All"]]

});
</script>

<script>
  var table = $('#doctables2').DataTable({
    // PAGELENGTH OPTIONS
    "lengthMenu": [[ 5, 10, 25, 50, 100, -1], [ 5, 10, 25, 50, 100, "All"]]

});
</script>
<script>
  var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
    $('#Submit').prop('disabled',false);
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
    $('#Submit').prop('disabled',true);
    }
  }
</script>


