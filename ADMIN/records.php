<?php require 'process/require/auth.php';?>
<?php require "process/require/dataconf.php";?>
<?php require "process/check/appointmentcheck.php";?>
<?php if(!isset($_GET['id'])){
        header("Location: error.php");
        exit();
      }else{
        $id = $connection->real_escape_string($_GET["id"]);
        $data = $connection->prepare("SELECT appointments.id as 'ID', concat(firstName, ' ',middleName, ' ',lastName)as 
        'Name', plateNumber, appointments.status as 'stat', appointments.date, appointments.modified, appointments.created,  appointments.targetEndDate from 
        appointments inner join personalinfo on appointments.personalId = personalinfo.personalId inner join vehicles 
        on personalinfo.personalId = vehicles.personalId where appointments.status = 'Accepted' and appointments.id = '$id';");
        if($data->execute()){
            $values = $data->get_result();
            $row = $values->fetch_assoc();

            if($row['stat'] != "Accepted"){
              header("Location: error.php");
            }

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
            <div class="col-lg-12 grid-margin  stretch-card">
              <div class="card">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="calendar.php" style="font-size:18px;">Calendar</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="font-size:18px;"><?php echo $id ?></li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>

          <div class="row">
            
            <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title" style="font-size:20px; float:left;"><?php echo date('F j, Y',strtotime($row['date'])); ?></p>
                    <?php
                        if ($row['targetEndDate'] == null){
                    ?>
                    <form method = "post" action="addenddate.php?id=<?php echo $id;?>">      
                        <p class="card-title" style="font-size:20px; float:right;" >Target End Date : <input type ="date" name="enddate"> <button class="btn btn-primary" type="submit" name="submit"><i class="menu-icon mdi mdi-checkbox-multiple-marked-circle-outline"></i> Submit</button></p></form>
                    <?php
                        }else{
                            ?><p class="card-title" style="font-size:20px; float:right;" > Target End Date : <?php echo date('F j, Y',strtotime ($row['targetEndDate']));?>
                        <?php
                        }
                    ?>
                    
                  <p class="card-description" style="clear:both">Transaction Record of Appointment ID: <?php echo $id; ?></p>
                  <hr>
                  <br>
                  <!-- start -->

                  <div class="form-group">
                    <div class="row"><!-- row-start -->
                      <div class="col-md-2"><p>Owner</p></div>
                      <div class="col-md-4"><h5 style="margin-top: -1%">: <?php echo $row['Name'] ?></h5></div>
                      <div class="col-md-2"><p>Date of Request</p></div>
                      <div class="col-md-4"><h5 style="margin-top: -1%">: <?php echo date('F j, Y',strtotime($row['created'])); ?></h5></div>
                    </div><!-- row-end -->
                    <div class="row">
                      <div class="col-md-2"><p>Plate Number </p></div>
                      <div class="col-md-4"><h5 style="margin-top: -1%">: <?php echo $row['plateNumber'] ?></h5></div>
                      <div class="col-md-2"><p>Date Approved </p></div>
                      <div class="col-md-4"><h5 style="margin-top: -1%">: <?php echo date('F j, Y',strtotime($row['modified'])); ?></h5></div>
                    </div>
                    <div class="row">
                      <div class="col-md-2"><p>Status</p></div>
                      <div class="col-md-4"><h5 style="margin-top: -1%">: <?php echo $row['stat'] ?></h5></div>
                      <div class="col-md-2"><p> </p></div>
                        <div class="col-md-4"><h5 style="margin-top: -1%"></h5></div>
                    </div>
                    <div class="row">
                      <div class=" offset-md-1 col-md-2"><p>Progress</p></div>
                      <div class="col-md-7">
                        <div class="progress">
                          <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 0%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- start -->
                   <hr>
                   <div class="row">
                      <div class="col-md-2"><p><p class="card-title" style="font-size:20px;">Task List</p></div>
                      <div class="col-md-2 offset-md-8" style="margin">
                        <h5 style="margin-top: 20px;">
                          <button type="button" class="btn btn-darkred" style="padding-button: 10px; float: right; width: 140px;" data-toggle="modal" data-target="#exampleModalCenter"><i class="menu-icon mdi mdi-clipboard-text"></i> Add Task</button>
                        </h5>
                      </div>
                    </div>
                    
                   
                    <div class="table-responsive">
                      <table class="table table-bordered table-dark" id="doctables">
                        <thead>
                          <tr class="grid">
                            <th scope="col" style="font-size:15px;">#</th>
                            <th scope="col" style="font-size:15px;">Task</th>
                            <th scope="col" style="font-size:15px;">Type</th>
                            <th scope="col" style="font-size:15px;">Status</th>
                            <th scope="col" style="font-size:15px;">Start Date</th>
                            <th scope="col" style="font-size:15px;">End Date</th>
                            <th scope="col" style="font-size:15px;">Action</th>
                          </tr>
                        </thead>
                        <tbody class="table-primary" style="color:black;">
                          <tr class="text-center">
                            <th scope="row">1</th>
                            <td>Change Oil</td>
                            <td>Mechanical</td>
                            <td>Pending</td>
                            <td>11-03-2018</td>
                            <td>11-03-2018</td>
                            <td><input type="checkbox" aria-label="Checkbox for following text input"></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <br>
                    
                    <!-- Button trigger modal -->

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header" style="background-color: #b80011; color: white; border: 3px solid #b80011;">
                            <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form>
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Recipient:</label>
                                <input type="text" class="form-control" id="recipient-name">
                              </div>
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">Message:</label>
                                <textarea class="form-control" id="message-text"></textarea>
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-darkred"><i class="menu-icon mdi mdi-clipboard-text"></i>Add</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="menu-icon mdi mdi-close"></i>Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end -->
                    

                    
                  </div>
                  <!-- END -->

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