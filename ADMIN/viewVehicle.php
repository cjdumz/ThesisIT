<?php require 'process/require/auth.php';?>
<?php require "process/require/dataconf.php";

if(isset($_GET['plate'])){
    $plate = $connection->real_escape_string($_GET["plate"]);
    $data = $connection->prepare("SELECT *, concat(personalinfo.firstName, ' ', personalinfo.middleName, ' ', personalinfo.lastName) as 
    'Name', personalinfo.personalId as 'ID' FROM vehicles join personalinfo where plateNumber = '$plate' AND vehicles.personalId = personalinfo.personalId");
    if($data->execute()){
        $values = $data->get_result();
        $row = $values->fetch_assoc();
        $vehicleID = $row['id'];
    }else{
        header("Location: error.php");
    }
   

}else{
    header("Location: error.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Vehicle</title>
  <link rel="icon" href="images/Logo.png">
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="vendor/chosen/chosen.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/custom.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <link href="css/dataTables.bootstrap4.css" rel="stylesheet">
  <link rel="stylesheet" href="css/chosen.css" />

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
            
          <li class="nav-item">
            <a class="nav-link" href="accountmanagement.php">
              <i class="menu-icon mdi mdi-account-multiple"></i>
              <span class="menu-title" style="font-size:14px;">Account Management</span>
            </a>
          </li>
            
          <li class="nav-item active">
            <a class="nav-link" href="vehicle.php">
              <i class="menu-icon mdi mdi-car-side"></i>
              <span class="menu-title" style="font-size:14px;">Vehicle</span>
            </a>
          </li>
            
          <li class="nav-item">
            <a class="nav-link" href="blank.php">
              <i class="menu-icon mdi mdi-bell"></i>
              <span class="menu-title" style="font-size:14px;">Settings</span>
            </a>
          </li>
            
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="menu-icon mdi mdi-restart"></i>
              <span class="menu-title" style="font-size:14px;">Notifications</span>
            </a>
          </li>
            
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <!-- start -->
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Vehicle Information</h4>
                    <form action="process/updateVehicle.php" method="POST"> 
                        <div class="row">
                        <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Owner</label>
                                    <input type="hidden" name="altowner" value="<?php echo $row['personalId']; ?>">
                                    <select 
                                    <?php 
                                        if($row['status'] == 'active'){
                                            echo 'disabled';
                                        }
                                    ?>
                                    type="text" class="form-control  chzn-select" name="owner" tabindex="2">
                                      <option selected value="<?php echo $row['personalId']; ?>"><?php echo $row['Name']; ?></option>
                                    <?php 
                                      $otherOwner = $connection->prepare("SELECT concat(personalinfo.firstName, ' ', personalinfo.middleName, ' ', personalinfo.lastName) as 
                                      'Name', personalinfo.personalId as 'ID' FROM  personalinfo");
                                      if($otherOwner->execute()){
                                          $values = $otherOwner->get_result();
                                          while($rows = $values->fetch_assoc()) {
                                          echo '
                                              <option value="'.$rows['ID'].'">'.$rows['Name'].'</td>';
                                          }
                                        }
          

                                    ?>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="userID" value="<?php echo $row['ID']; ?>">
                            <input type="hidden" name="vehicleID" value="<?php echo $row['id']; ?>">
                            <div class="col-4">
                                    <div class="form-group">
                                    <label class="bmd-label-floating">Plate Number</label>
                                    <input type="text" class="form-control" name="plate" value="<?php echo $plate; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Status</label>
                                    <select type="text" class="form-control" name="status">
                                    <?php
                                        echo '<option selected hidden value="'.$row['status'].'">'.$row['status'].'</option>';
                                    ?>
                                        <option value="active">active</option>
                                        <option value="deactivated">deactivate</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-4 ">
                            <div class="form-group">
                            <label class="bmd-label-floating">Body Type</label>
                            <input type="text" class="form-control" name="btype" value="<?php echo $row['bodyType']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label class="bmd-label-floating">Year Model</label>
                            <input type="text" class="form-control" name="ymodel" value="<?php echo $row['yearModel']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label class="bmd-label-floating">Chassis Number</label>
                            <input type="text" class="form-control" name="chassis" value="<?php echo $row['chasisNumber']; ?>">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                            <label class="bmd-label-floating">Engine Classification</label>
                            <input type="text" class="form-control" name="engineClass" value="<?php echo $row['engineClassification']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label class="bmd-label-floating">Number of Cylinders</label>
                            <input type="text" class="form-control" name="cylinderNum" value="<?php echo $row['numberOfCylinders']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label class="bmd-label-floating">Type of Drive Terrain</label>
                            <input type="text" class="form-control" name="terain" value="<?php echo $row['typeOfDriveTrain']; ?>">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                            <label class="bmd-label-floating">Make</label>
                            <input type="text" class="form-control" name="make" value="<?php echo $row['make']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label class="bmd-label-floating">Series</label>
                            <input type="text" class="form-control" name="series" value="<?php echo $row['series']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label class="bmd-label-floating">Color</label>
                            <input type="text" class="form-control" name="color" value="<?php echo $row['color']; ?>">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                            <label class="bmd-label-floating">Engine Number</label>
                            <input type="text" class="form-control" name="engineNum" value="<?php echo $row['engineNumber']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label class="bmd-label-floating">Type of Engine</label>
                            <input type="text" class="form-control" name="engineType" value="<?php echo $row['typeOfEngine']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label class="bmd-label-floating">Engine Displacement</label>
                            <input type="text" class="form-control" name="displacement" value="<?php echo $row['engineDisplacement']; ?>">
                            </div>
                        </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="updateVehicle" style="float:right">Update Vehicle</button>
                        <div class="clearfix"></div>
                    </form>
                    </div>
                    <div class="card-footer small text-muted">
                    <?php 
                      $timequery = $connection->query("SELECT modified FROM `vehicles` where id = $vehicleID;");
                      $row2 = $timequery->fetch_assoc();
                      $dateTime = $row2['modified'];
                      $dateTimeSplit = explode(" ",$dateTime);
                      $date = $dateTimeSplit[0];
                      $time = $dateTimeSplit[1];
                      echo "Updated on ".date('M d, Y',strtotime($date));
                      echo "  ".date('h:i:s A',strtotime($time));
                    ?>
                    </div>
                </div>
            </div>
            <!-- end -->

           <!-- start -->
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Vehicle Hisotry</h4>
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
                        </tbody>
                      </table>
                    </div>
                    <!-- end -->
                    
                </div>
                <div class="card-footer small text-muted">
                    <?php 
                      if($timequery = $connection->query("SELECT modified FROM `vehicles` where id = $vehicleID;")){
                        $row2 = $timequery->fetch_assoc();
                        $dateTime = $row2['modified'];
                        $dateTimeSplit = explode(" ",$dateTime);
                        $date = $dateTimeSplit[0];
                        $time = $dateTimeSplit[1];
                        echo "Updated on ".date('M d, Y',strtotime($date));
                        echo "  ".date('h:i:s A',strtotime($time));
                      }else{
                        echo "No current Update";
                      }
                    ?>
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
  <!-- <script src="vendors/js/vendor.bundle.base.js"></script> -->
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
  <!-- End custom js for this page -->


	<script src="js/mootools-yui-compressed.js"></script>
	<script src="js/mootools-more-1.4.0.1.js"></script>
  <script src="js/chosen.js"></script>
  <script> $$(".chzn-select").chosen(); $$(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>



</body>

</html>

<script>
  var table = $('#doctables').DataTable({
    // PAGELENGTH OPTIONS
    "lengthMenu": [[ 10, 25, 50, 100, -1], [ 10, 25, 50, 100, "All"]]

});
</script>

