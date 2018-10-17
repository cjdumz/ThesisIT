<?php require 'process/require/auth.php';?>
<?php require "process/require/dataconf.php";?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Appointment Request</title>
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
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="images/faces-clipart/pic-1.png" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">Admin</p>
                  <div>
                    <small class="designation text-muted">Manager</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Request</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item active">
                  <a class="nav-link" href="appointments.php">Appointments</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="reschedule.php">Reschedule</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="menu-icon mdi mdi-backup-restore"></i>
              <span class="menu-title">Calendar</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">Client Records</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">Account Management</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="vehicle.php">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">Vehicle</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="menu-icon mdi mdi-sticker"></i>
              <span class="menu-title">Settings</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="menu-icon mdi mdi-restart"></i>
              <span class="menu-title">Notifications</span>
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
                  <h4 class="card-title">Appointments</h4>
                  <p class="card-description">
                    List of Appointment Request
                    
                  </p>
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="doctables">
                      <thead>
                        <tr class="redborder">
                            <th>Customer Name</th>
                            <th>Service</th>
                            <th>Plate Number</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $data = $connection->prepare("SELECT appointments.id as 'ID',concat(firstName,' ',middleName,' ',lastName) as 'Name',make,series,
                        yearModel,plateNumber,serviceType,serviceName as 'sername',appointments.status,date from appointments join personalinfo on appointments.personalId
                        = personalinfo.personalId join vehicles on appointments.vehicleId = vehicles.id join services on appointments.serviceId
                            = services.serviceId where appointments.status = 'Pending' AND (NOW() = date OR NOW() < date ) order by 10 ASC");
                        if($data->execute()){
                            $values = $data->get_result();
                            while($row = $values->fetch_assoc()) {
                            $dateTime = $row['date'];
                            $dateTimeSplit = explode(" ",$dateTime);
                            $date = $dateTimeSplit[0];
                            echo '
                                <tr>
                                <td>'.$row['Name'].'</td>
                                <td>'.$row['sername'].'</td>
                                <td>'.$row['plateNumber'].'</td>
                                <td>'.$row['status'].'</td>
                                <td>'; echo date('M d, Y',strtotime($date)); echo '</td>
                                <td>

                                    <form method="POST" action="process/server.php" enctype="multipart/form-data">
                                        <input type="hidden" name="command1" value="accept">
                                        <input type="hidden" name="id1" value="'.$row['ID'].'">
                                        <button class="btn btn-success" type="submit" name="commands1" style="margin-top: 5px; width: 120px;">
                                        Accept</button>
                                        <input type="hidden" name="command2" value="deny">
                                        <input type="hidden" name="id2" value="'.$row['ID'].'">
                                        <button class="btn" type="submit" name="commands2" style="margin-top: 5px; width: 120px; background-color: #B80011; color:white;">
                                        Reschedule</button>
                                    </form>
                                    
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
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
              <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
              <i class="mdi mdi-heart text-danger"></i>
            </span>
          </div>
        </footer>
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