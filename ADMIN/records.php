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
            <a class="nav-link" href="#">
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
            <div class="col-lg-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Personal Information</h4>
                  <form action="updateUserInfo.php?<?php echo $contentx['personalId']; ?> ">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fist Name</label>
                          <input type="text" class="form-control" value="<?php echo $contentx['firstName'] ?>" placeholder="<?php echo $contentx['firstName'] ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Middle Name</label>
                          <input type="text" class="form-control" value="<?php echo $contentx['middleName'] ?>" placeholder="<?php echo $contentx['middleName'] ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input type="text" class="form-control" value="<?php echo $contentx['lastName'] ?>" placeholder="<?php echo $contentx['lastName'] ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Suffix</label>
                          <input type="text" class="form-control" value="<?php echo $contentx['suffix'] ?>" placeholder="<?php echo $contentx['suffix'] ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Adress</label>
                          <input type="text" class="form-control" value="<?php echo $contentx['address'] ?>" placeholder="<?php echo $contentx['address'] ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email Address</label>
                          <input type="text" class="form-control" value="<?php echo $contentx['email'] ?>" placeholder="<?php echo $contentx['email'] ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Mobile Number</label>
                          <input type="text" class="form-control" value="<?php echo $contentx['mobileNumber'] ?>" placeholder="<?php echo $contentx['mobileNumber'] ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Telephone Number</label>
                          <input type="text" class="form-control" value="<?php echo $contentx['telephoneNumber'] ?>" placeholder="<?php echo $contentx['telephoneNumber'] ?>">
                        </div>
                      </div>
                    </div>
                    <br><br><br>
                    <button type="submit" class="btn btn-primary" style="float:right">Update Profile</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <!-- end -->

            <!-- start -->
            <div class="col-lg-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Vehicle Information</h4>
                  <form>
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Plate Number</label>
                          <select type="text" class="form-control">
                          <?php
                            if(isset($_GET['id'])){
                              $id = $_GET['id'];
                              $getpart = $connection->prepare('SELECT * FROM vehicles where personalId = '.$id.' limit 1; ');
                              $getpart->execute();
                              $values = $getpart->get_result();
                              $content = $values->fetch_assoc();
                              echo' <option hidden value="'.$content['id'].'" selected>'.$content['make'].'('.$content['plateNumber'].')</option>';
                              $getotherpart = $connection->prepare('SELECT * FROM vehicles where personalId = '.$id.'; ');
                              $getotherpart->execute();
                              $values = $getotherpart->get_result();
                              while($contents = $values->fetch_assoc()) {
                                  echo' <option value="'.$contents['id'].'">'.$contents['make'].'('.$contents['plateNumber'].')</option>';
                              }
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Status</label>
                          <select type="text" class="form-control">
                            <option value="">Active</option>
                            <option value="">Deactivate</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 ">
                        <div class="form-group">
                          <label class="bmd-label-floating">Body Type</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Year Model</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Chassis Number</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Engine Classification</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Number of Cylenders</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Type of Drive Terrain</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Make</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Series</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Color</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Engine Number</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Type of Engine</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Engine Displacement</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="float:right">Update Vehicle</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <!-- end -->

            <!-- start -->
            <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Transactions</h4>
                  
                  <!-- start -->
                  <div class="table-responsive">
                    <table class="table table-bordered table-dark" id="doctables">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            First name
                          </th>
                          <th>
                            Product
                          </th>
                          <th>
                            Amount
                          </th>
                          <th>
                            Deadline
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="table-info">
                          <td>
                            1
                          </td>
                          <td>
                            Herman Beck
                          </td>
                          <td>
                            Photoshop
                          </td>
                          <td>
                            $ 77.99
                          </td>
                          <td>
                            May 15, 2015
                          </td>
                        </tr>
                        <tr class="table-warning">
                          <td>
                            2
                          </td>
                          <td>
                            Messsy Adam
                          </td>
                          <td>
                            Flash
                          </td>
                          <td>
                            $245.30
                          </td>
                          <td>
                            July 1, 2015
                          </td>
                        </tr>
                        <tr class="table-danger">
                          <td>
                            3
                          </td>
                          <td>
                            John Richards
                          </td>
                          <td>
                            Premeire
                          </td>
                          <td>
                            $138.00
                          </td>
                          <td>
                            Apr 12, 2015
                          </td>
                        </tr>
                        <tr class="table-success">
                          <td>
                            4
                          </td>
                          <td>
                            Peter Meggik
                          </td>
                          <td>
                            After effects
                          </td>
                          <td>
                            $ 77.99
                          </td>
                          <td>
                            May 15, 2015
                          </td>
                        </tr>
                        <tr class="table-primary" style="color:black;">
                          <td>
                            5
                          </td>
                          <td>
                            Edward
                          </td>
                          <td>
                            Illustrator
                          </td>
                          <td>
                            $ 160.25
                          </td>
                          <td>
                            May 03, 2015
                          </td>
                        </tr>
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