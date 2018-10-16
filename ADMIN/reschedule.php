<?php require 'process/require/auth.php';?>
<?php require "process/require/dataconf.php";?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Reschedule Request</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
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
                <li class="nav-item">
                  <a class="nav-link" href="appointments.php">Appointments</a>
                </li>
                <li class="nav-item active">
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
            <a class="nav-link" href="accountmanagement.php">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">Account Management</span>
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
                  <h4 class="card-title">Reschedule</h4>
                  <p class="card-description">
                    List of pedding appointments to be rescheduled
                  </p>
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="doctables">
                      <thead>
                        <tr style="background-color: #B80011; font-weight: bold; color: white;">
                            <th>Customer Name</th>
                            <th>Service</th>
                            <th>Plate Number</th>
                            <th>Status</th>
                            <th>Previous Date</th>
                            <th>Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            $data = $connection->prepare("SELECT appointments.id as 'ID', personalinfo.personalId as 'personID',
                                concat(firstName,' ',middleName,' ',lastName) as 'Name',make,series, yearModel,plateNumber,serviceType,serviceName
                                as 'sername',appointments.status,date from appointments join personalinfo on appointments.personalId
                                = personalinfo.personalId join vehicles on appointments.vehicleId = vehicles.id join services on
                                appointments.serviceId = services.serviceId where appointments.status = 'Rescheduled' OR appointments.status
                                    = 'Declined' OR appointments.status = 'Overdue'");
                            if($data->execute()){
                                $values = $data->get_result();
                                while($row = $values->fetch_assoc()) {
                                    $dateTime = $row['date'];
                                    $dateTimeSplit = explode(" ",$dateTime);
                                    $date = $dateTimeSplit[0];
                                echo '
                                    <tr>
                                        
                                        <td><a href="user.php?id='.$row['personID'].'" class="rowlink">'.$row['Name'].'</a></td>
                                        <td>'.$row['sername'].'</td>
                                        <td>'.$row['plateNumber'].'</td>
                                        <td>'.$row['status'].'</td>
                                        <td>'; echo "".date('M d, Y',strtotime($date)); echo '</td>
                                        <td>

                                            <div class="col-12">

                                                <form method="POST" action="process/server.php" enctype="multipart/form-data">
                                                    <input type="hidden" name="command" value="deny">
                                                    <input type="hidden" name="id" value="'.$row['ID'].'">
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn" style="background-color: #595959; color: white;" data-toggle="modal" data-target="#exampleModalCenter'.$row['ID'].'">
                                                      Reschedule
                                                    </button>
                                                </form>
                                            
                                            </div>
                                                
                                        </td>
                                        
                                    </tr>



                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter'.$row['ID'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                            <div class="row">
                                              <div class="col-6">
                                                <h4 class="card-title">Customer Name: '.$row['Name'].'</h4>
                                                <h4 class="card-title">Plate Number: '.$row['plateNumber'].'</h4>
                                              </div>
                                              <div class="col-6">
                                                <h4 class="card-title">Services:</h4>
                                                <p class="card-description">
                                                <h4 class="card-title">'.$row['sername'].'</h4>
                                                </p>
                                              </div>
                                            </div>
                                            <form class="forms-sample">
                                              <div class="form-group row">
                                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Previous Date</label>
                                                <div class="col-sm-9">
                                                  <input type="date" class="form-control" id="exampleInputEmail2" disabled value="'.$row['date'].'">
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


