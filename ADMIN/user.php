<?php require 'process/require/auth.php';
      require "process/require/dataconf.php";
if(!isset($_GET['id'])){
  header("Location: error.php");
  exit();
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
                  <h4 class="card-title">Personal Information</h4>
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
                          <input type="text" class="form-control" name="mobile" value="<?php echo $contentx['mobileNumber'] ?>" placeholder="<?php echo $contentx['mobileNumber'] ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Telephone Number</label>
                          <input type="text" class="form-control" name="telephone" value="<?php echo $contentx['telephoneNumber'] ?>" placeholder="<?php echo $contentx['telephoneNumber'] ?>">
                        </div>
                      </div>
                    </div>
                    <br><br><br>
                    <button type="submit" class="btn btn-primary" name="submit-user" style="float:right">Update Profile</button>
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

                <!-- start -->
                <h4 class="card-title">Vehicle List</h4>
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
                                  <td class="text-center"><button class="btn btn-primary">View</td>
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
                    <table class="table table-bordered table-dark" id="doctables">
                      <thead>
                        <tr class="text-center">
                          <th>#</th>
                          <th>Plate Number</th>
                          <th>Date</th>
                          <th>Status</th>
                          <th>Progress</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody class="table-primary" style="color:black;">
                        
                      <?php
                        $data = $connection->prepare("SELECT *,concat(firstName,' ',middleName,' ',lastName) as 'Name', vehicles.plateNumber, appointments.status as 'stats'  FROM `appointments` join `personalinfo` join vehicles
                        where personalinfo.personalId = $id and appointments.status = 'Accepted' and personalinfo.personalId = appointments.personalId");
                        if($data->execute()){
                            $values = $data->get_result();
                            while($row = $values->fetch_assoc()) {
                            $dateTime = $row['date'];
                            $dateTimeSplit = explode(" ",$dateTime);
                            $date = $dateTimeSplit[0];
                            echo '
                                <tr>
                                <td>'.$row['id'].'</td>
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
                                        <button class="btn btn-success" name="commands1" style="margin-top: 5px; width: 145px; color:white;"  data-toggle="modal" data-target="#appointmentModalCenter'.$row['id'].'"><i class="menu-icon mdi mdi-checkbox-marked-outline"></i>
                                        View</button>
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