<?php require 'process/require/auth.php';?>
<?php require "process/require/dataconf.php";?>
<?php require "process/check/appointmentcheck.php";?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Appointment Request</title>
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
            <a class="nav-link" href="dashboard.php">
              <i class="menu-icon mdi mdi-inbox"></i>
              <span class="menu-title" style="font-size:14px;">Dashboard</span>
            </a>
          </li>
            
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
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
            
            <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title" style="font-size:20px;">Appointments</p>
                  <p class="card-description">
                    List of Appointment Request
                  </p>
                    
                  <div class="table-responsive">
                    <table class="table table-bordered table-dark" id="doctables">
                      <thead>
                        <tr class="grid">
                            <th style="font-size:15px;">Customer Name</th>
                            <th style="font-size:15px;">Service</th>
                            <th style="font-size:15px;">Plate Number</th>
                            <th style="font-size:15px;">Status</th>
                            <th style="font-size:15px;">Date</th>
                            <th style="font-size:15px;" class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody class="table-primary" style="color:black;">
                      <?php
                        $data = $connection->prepare("SELECT appointments.id as 'ID',concat(firstName,' ',middleName,' ',lastName) as 'Name',make,series,
                        yearModel,plateNumber,serviceType,serviceName as 'sername',appointments.status,date from appointments join personalinfo on appointments.personalId
                        = personalinfo.personalId join vehicles on appointments.vehicleId = vehicles.id join services on appointments.serviceId
                            = services.serviceId where appointments.status = 'Pending' OR appointments.status = 'Rescheduled' AND (NOW() = date OR NOW() < date ) order by 10 ASC");
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
                                <td class="text-center">
                                    <div class="row">
                                      <div class="col-12">
                                        <input type="hidden" name="command1" value="accept">
                                        <input type="hidden" name="id1" value="'.$row['ID'].'">
                                        <button class="btn btn-success" name="commands1" style="margin-top: 5px; width: 145px; color:white;"  data-toggle="modal" data-target="#appointmentModalCenter'.$row['ID'].'"><i class="menu-icon mdi mdi-checkbox-marked-outline"></i>
                                        Accept</button>
                                      </div>
                                      <div class="col-12">
                                        <input type="hidden" name="command2" value="deny">
                                        <input type="hidden" name="id2" value="'.$row['ID'].'">
                                        <button class="btn btn-warning"  name="commands2" style="margin-top: 5px; width: 145px; color:white;" data-toggle="modal" data-target="#exampleModalCenter'.$row['ID'].'"><i class="menu-icon mdi mdi-calendar-clock"></i>
                                        Reschedule</button>
                                      </div>
                                      <div class="col-12">
                                        <input type="hidden" name="command2" value="decline">
                                        <input type="hidden" name="id2" value="'.$row['ID'].'">
                                        <button class="btn btn-danger"  name="commands2" style="margin-top: 5px; width: 145px; color:white;" data-toggle="modal" data-target="#decline'.$row['ID'].'"><i class="menu-icon mdi mdi-calendar-remove"></i>
                                        Decline</button>
                                      </div>
                                    </div>
                                    
                                </td>

                                </tr>

                                <!-- Appointment Modal -->
                                <div class="modal fade" id="appointmentModalCenter'.$row['ID'].'" tabindex="-1" role="dialog" aria-labelledby="appointmentModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header" style="background-color: #4caf50; color: white; border: 3px solid #4caf50;">
                                        <h5 class="modal-title" id="appointmentModalCenterTitle">Accept</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <!-- start -->
                                        <div class="row">
                                          <div class="col-6">
                                            <h4 class="card-title">Customer Name:</h4>                                            
                                          </div>
                                          <div class="col-6">
                                            <h4 class="card-title">'.$row['Name'].'</h4>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-6">
                                            <h4 class="card-title">Plate Number:</h4>                                            
                                          </div>
                                          <div class="col-6">
                                            <h4 class="card-title">'.$row['plateNumber'].'</h4>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-6">
                                            <h4 class="card-title">Status:</h4>                                            
                                          </div>
                                          <div class="col-6">
                                            <h4 class="card-title">'.$row['status'].'</h4>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-12">
                                            <h4 class="card-title">Services:</h4>                                            
                                          </div>
                                          <div class="col-12">
                                            <h4 class="card-title">'.$row['sername'].'</h4>
                                          </div>
                                        </div>
                                       
                                          <div class="form-group row">
                                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Proposed Date</label>
                                            <div class="col-sm-9">
                                              <input type="text" class="form-control" id="exampleInputEmail2" disabled value="'; echo date('M d, Y',strtotime($date)); echo ' ">
                                            </div>
                                          </div>
                                        <!-- end -->
                                      </div>

                                      <div class="modal-footer" >
                                        <form action="process/server.php" method="post">
                                            <input type="hidden" name="command1" value="accept">
                                            <input type="hidden" name="id1" value="'.$row['ID'].'">
                                          <button class="btn btn-success" type="submit" name="commands1" style="margin-top: 5px; width: 145px; color:white;"><i class="menu-icon mdi mdi-checkbox-marked-outline"></i>
                                          Accept</button>
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="menu-icon mdi mdi-close"></i>Dismiss</button>
                                    
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <!-- Reschedule Modal -->
                                <div class="modal fade" id="exampleModalCenter'.$row['ID'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header" style="background-color: #FFAF00; color: white; border: 3px solid #FFAF00;">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Reschedule</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <!-- start -->
                                        <div class="row">
                                          <div class="col-6">
                                            <h4 class="card-title">Customer Name:</h4>                                            
                                          </div>
                                          <div class="col-6">
                                            <h4 class="card-title">'.$row['Name'].'</h4>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-6">
                                            <h4 class="card-title">Plate Number:</h4>                                            
                                          </div>
                                          <div class="col-6">
                                            <h4 class="card-title">'.$row['plateNumber'].'</h4>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-6">
                                            <h4 class="card-title">Status:</h4>                                            
                                          </div>
                                          <div class="col-6">
                                            <h4 class="card-title">'.$row['status'].'</h4>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-6">
                                            <h4 class="card-title">Services:</h4>                                            
                                          </div>
                                          <div class="col-6">
                                            <h4 class="card-title">'.$row['sername'].'</h4>
                                          </div>
                                        </div>
                                        <form method="POST" action="process/server.php" enctype="multipart/form-data">
                                          <div class="form-group row">
                                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label card-title">Previous Date</label>
                                            <div class="col-sm-9">
                                              <input type="text" class="form-control" id="exampleInputEmail2" disabled value="'; echo date('M d, Y',strtotime($date)); echo ' ">
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label card-title">Proposed Date</label>
                                            <div class="col-sm-9">
                                              <input type="date" class="form-control" id="exampleInputPassword2" name="update" placeholder="" required>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label card-title">Message</label>
                                            <div class="col-sm-9">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3"></textarea>
                                            </div>
                                          </div>
                                        <!-- end -->
                                      </div>
                                      
                                      
                                      <input type="hidden" name="id" value="'.$row['ID'].'">
                                      <input type="hidden" name="location" value="appointment">
                                      <div class="modal-footer" >
                                      
                                        <button type="submit" name="resubmit" class="btn btn-warning"><i class="menu-icon mdi mdi-calendar-clock"></i>Reschedule</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="menu-icon mdi mdi-close"></i>Dismiss</button>
                                        
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <!-- Decline Modal -->
                                <div class="modal fade" id="decline'.$row['ID'].'" tabindex="-1" role="dialog" aria-labelledby="appointmentModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header" style="background-color: #F44336; color: white; border: 3px solid #F44336;">
                                        <h5 class="modal-title" id="appointmentModalCenterTitle">Decline</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <!-- start -->
                                        <div class="row">
                                          <div class="col-6">
                                            <h4 class="card-title">Customer Name:</h4>                                            
                                          </div>
                                          <div class="col-6">
                                            <h4 class="card-title">'.$row['Name'].'</h4>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-6">
                                            <h4 class="card-title">Plate Number:</h4>                                            
                                          </div>
                                          <div class="col-6">
                                            <h4 class="card-title">'.$row['plateNumber'].'</h4>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-6">
                                            <h4 class="card-title">Status:</h4>                                            
                                          </div>
                                          <div class="col-6">
                                            <h4 class="card-title">'.$row['status'].'</h4>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-12">
                                            <h4 class="card-title">Services:</h4>                                            
                                          </div>
                                          <div class="col-12">
                                            <h4 class="card-title">'.$row['sername'].'</h4>
                                          </div>
                                        </div>
                                       
                                          <div class="form-group row">
                                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Proposed Date</label>
                                            <div class="col-sm-9">
                                              <input type="text" class="form-control" id="exampleInputEmail2" disabled value="'; echo date('M d, Y',strtotime($date)); echo ' ">
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <form action="process/server.php" method="post">
                                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label card-title">Message</label>
                                            <div class="col-sm-9">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3"></textarea>
                                            </div>
                                          </div>
                                        <!-- end -->
                                      </div>

                                      <div class="modal-footer" >
                                        
                                            <input type="hidden" name="command1" value="decline">
                                            <input type="hidden" name="id1" value="'.$row['ID'].'">
                                          <button class="btn btn-danger" type="submit" name="commands1" style="margin-top: 5px; width: 145px; color:white;"><i class="menu-icon mdi mdi-calendar-remove"></i>
                                          Decline</button>
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="menu-icon mdi mdi-close"></i>Dismiss</button>
                                    
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
  <script src="js/jquery.min.js"></script>
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
<!-- <script>
$('form.ajax').on('submit', function(){
    var that = $(this),
        url = that.attr('action'),
        type = that.attr('method'),
        data = {};

    that.find('[name]').each(function(index, value){
        var that = $(this),
            name = that.attr('name'),
            value = that.val();

        data[name] = value;
    });

    $.ajax({
        url: url,
        type: type,
        data: data,
        success: function(response){
            console.log(response);
        }

    });

    return false;

});
<<<<<<< HEAD
</script> -->
=======
>>>>>>> 6f5f39c89404f36fa32c1aed05e2ed9ca73ef000
