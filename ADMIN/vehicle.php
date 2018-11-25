<?php require 'process/require/auth.php';?>
<?php require "process/require/dataconf.php";?>

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
            <a class="nav-link" href="clientrecords.php">
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
            
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            
            <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title" style="font-size:20px;">Vehicles</h4>
                  <p class="card-description">
                    List of all registered Vehicles
                  </p>
                  <div class="table-responsive">
                    <table class="table table-bordered table-dark" id="doctables">
                      <thead>
                        <tr class="grid">
                          <th style="font-size:15px;">
                            Plate
                          </th>
                          <th style="font-size:15px;">
                            Body Type
                          </th>
                          <th style="font-size:15px;">
                            Brand
                          </th>
                          <th style="font-size:15px;">
                            Series
                          </th>
                          <th style="font-size:15px;">
                            Color
                          </th>
                          <th style="font-size:15px;">
                            Status
                          </th>
                          <th style="font-size:15px;">
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody class="table-primary" style="color:black;">
                      <?php
                            $data = $connection->prepare("SELECT  vehicles.id as 'ID', concat(firstName, ' ', middleName, ' ',lastName ) as 'Name', vehicles.plateNumber,
                            vehicles.bodyType, vehicles.bodyType, vehicles.make, vehicles.series, vehicles.color, vehicles.status FROM `vehicles`
                             join personalinfo where personalinfo.personalId = vehicles.personalId");
                            if($data->execute()){
                                $values = $data->get_result();
                                
                                while($row = $values->fetch_assoc()) {
                                  $vehicleID = $row['ID'];
                                echo '
                                    <tr>
                                        <td>'.$row['plateNumber'].'</td>
                                        <td>'.$row['bodyType'].'</td>
                                        <td>'.$row['make'].'</td>
                                        <td>'.$row['series'].'</td>
                                        <td>'.$row['color'].'</td>
                                        <td>'.$row['status'].'</td>
                                        <td class="text-center">
                                          <a href="viewvehicle.php?plate='.$row['plateNumber'].'"><button class="btn btn-primary"><i class="menu-icon mdi mdi-eye-outline"></i> View</button></a>
                                          
                                          <button class="btn btn-darkblue" data-toggle="modal" data-target="#decline'.$row['ID'].'"><i class="menu-icon mdi mdi-history"></i>
                                          History</button>
                                        
                                        </td>
                                    </tr>


                                    <!-- Decline Modal -->
                                    <div class="modal fade" id="decline'.$row['ID'].'" tabindex="-1" role="dialog" aria-labelledby="appointmentModalCenterTitle" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header" style="background-color: #000099; color: white; border: 3px solid #000099;">
                                            <h5 class="modal-title" id="appointmentModalCenterTitle">History</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <!-- start -->';

                                            $getHistory = $connection->prepare("SELECT *, concat(firstName,' ',middleName,' ',lastName) as 'Name', appointments.date as 'Time' FROM
                                             `appointments` inner join personalinfo on
                                            appointments.personalId = personalinfo.personalId
                                            where vehicleID = $vehicleID limit 10;");
                                            if($getHistory->execute()){
                                                $dates = $getHistory->get_result();
                                                while($rows = $dates->fetch_assoc()) {
                                                  echo '
                                                  <a href="records.php?id='.$rows['id'].'" style="text-decoration:none; color: white;">
                                                  <div style="border: 4px solid #000099; border-radius: 5px; color: white; text-align: center; background-color:#000099;margin-bottom: 5px; margin-top: 5px;">
                                                  '.$rows['Time'].'
                                                  </div></a>
    
                                                    ';

                                                }
                                              }
                                              echo'
                                              <a href="viewvehicle.php?plate='.$row['plateNumber'].'#view" style="text-decoration:none; color: white;">
                                              <div style="border: 4px solid #000099; border-radius: 5px; color: white; text-align: center; background-color:#000099;margin-bottom: 5px; margin-top: 5px;">
                                              View All
                                              </div></a>

                            
                                            <!-- end -->
                                          </div>
    
                                          <div class="modal-footer" >
                                            
                                              
                                      
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