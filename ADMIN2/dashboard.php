<?php require 'process/require/auth.php';?>
<?php require "process/require/dataconf.php";
?>
<?php require"process/check/dashboardcheck.php";?>

<!DOCTYPE html>
<html lang="en">

<head>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>
  <link rel="icon" href="images/Logo.png">
  <!-- plugins:css -->
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
  <link rel="stylesheet" href="css/calendar.css">
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
                  <a class="nav-link" href="overdue.php" style="font-size:14px;">Overdue</a>
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
            
          <li class="nav-item">
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
            
        </ul>
      </nav>
        
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
         

        <!--  Start Calendar  -->
          <div class="row">
               <div class="col-lg-8 grid-margin stretch-card">
                  <div class="card">
                      <div class="card-body">    
                      <div class="container">

                          <div class="page-header">
                              <h3></h3>

                              

                              <div class="col-md-12">
                              <br>
                                  <div id="showEventCalendar"></div>
                              </div>

                          </div>
                      </div>

                      </div>
                   </div>
               </div> 
             
              <!--  Start  -->
              <div class="col-lg-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 
                     
            <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-calendar-clock text-danger icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Appointment Requests for today</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $box1['count']?></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> 65% lower growth
                  </p>
                </div>
              </div>
                    <hr>
                    
            <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-car-side text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Vehicles to be repaired today</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $box2['count']?></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> 65% lower growth
                  </p>
                </div>
              </div>
                    <hr>
                    
                    
                    <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-wrench text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Vehicles in progress</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $box3['count']?></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> 65% lower growth
                  </p>
                </div>
              </div>
                    <hr>
                    <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-check-circle text-info icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Vehicles Successfully Repaired</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $box4['count']?></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> 65% lower growth
                  </p>
                </div>
              </div>
                    
                </div>
              </div>
            </div>     
          </div>
          <br>
            
            
          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Appointments in progress</h4>
                  <div class="table-responsive">
                    <table class="table table-bordered" id="doctables" style="background-color: #212529; color:white; border-color:#212529;">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Full Name
                          </th>
                          <th>
                            Progress
                          </th>
                          <th>
                            Plate Number
                          </th>
                          <th>
                            Start Date
                          </th>
                          <th>
                            Target End Date
                          </th>
                        </tr>
                      </thead>
                      <tbody style="background-color:white; color:#212529;">
                         <?php $query = $connection->prepare("SELECT CONCAT(personalinfo.firstName,' ', personalinfo.middleName, ' ', personalinfo.lastName) AS FullName, appointments.date, appointments.targetEndDate, appointments.id, vehicles.plateNumber FROM personalinfo JOIN appointments ON appointments.personalId = personalinfo.personalId JOIN vehicles ON appointments.vehicleId = vehicles.id WHERE appointments.status = 'In-progress'"); 
                            if ($query->execute()){
                                $result=$query->get_result();
                                while($appinprogress = $result->fetch_assoc()){
                               ?> 
                        <tr>
                          <td class="font-weight-medium">
                            <?php echo $appinprogress['id']?>
                          </td>
                          <td>
                           <?php echo $appinprogress['FullName']?>
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                           <?php echo $appinprogress['plateNumber']?>
                          </td>
                          <td class="text-success"> <?php echo  date('F j, Y',strtotime($appinprogress['date']))?>
                          </td>
                          <td class="text-danger">
                            <?php echo  date('F j, Y',strtotime($appinprogress['targetEndDate']))?>
                          </td>
                        </tr>
                           <?php }
                            }
                          ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-4">Feedbacks</h5>
                  <?php $feedback = $connection->prepare("SELECT * FROM feedback ORDER BY date DESC"); 
                        if($feedback->execute()){
                        $result=$feedback->get_result();
                        while($feed = $result->fetch_assoc()){?>
                    
                    <div class="fluid-container">
                    <div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3">
                      <div class="col-md-1">
                        <img class="img-sm rounded-circle mb-4 mb-md-0" src="images/faces/1.png" alt="profile image">
                      </div>
                      <div class="ticket-details col-md-9">
                        <div class="d-flex">
                          <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap"><?php if($feed['name']==null){
                            echo 'Anonymous';
                        }else{
                            echo $feed['name'];
                        }?></p>
                          <p class="text-primary mr-1 mb-0"></p>
                          
                        </div>
                        <p class="text-gray ellipsis mb-2"><?php  echo $feed['message'];?>
                        </p>
                        <div class="row text-gray d-md-flex d-none">
                          <div class="col-4 d-flex">
                            <small class="mb-0 mr-2 text-muted text-muted"><?php echo date('F j, Y',strtotime($feed['date']))?></small>
                            
                          </div>
                          <div class="col-4 d-flex">
                            <small class="mb-0 mr-2 text-muted text-muted"><?php echo $feed['email']?></small>
                          </div>
                        </div>
                      </div>
                     
                    </div>
                  </div>
                    <?php }}?>
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
  <script src="js/script.js"></script> 
    
    <script>
  var table = $('#doctables').DataTable({
    // PAGELENGTH OPTIONS
    "lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]]

});
</script>
    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/events.js"></script>    
</body>

</html>