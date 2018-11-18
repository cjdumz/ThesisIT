<?php require 'process/require/auth.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- jQuery -->
    
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Calendar</title>
<link rel="icon" href="images/Logo.png">

<link rel="stylesheet" href="css/calendar.css">
<link rel="stylesheet" href="css/style.css">
<link rel="shortcut icon" href="images/favicon.png" />
<link href="css/dataTables.bootstrap4.css" rel="stylesheet">

<body>
    <div class="container-scroller">
        <?php include "includes/navbar.php";?>
        <div class="container-fluid page-body-wrapper">
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
                <a class="nav-link"  href="clientrecords.php">
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
                                  <p class="card-title" style="font-size:25px; text-decoration: underline; font-weight: 900; color:#b80011;">Calendar</p>
                                  <p class="card-description" style="font-size:17px;">
                                        Calendar
                                  </p>
                                  
                              <div class="container">
                                  <div class="page-header">
                                      <h3></h3>
                                      
                                      <div class="pull-center form-inline">
                                          <div class="btn-group">
                                            <button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
				                            <button class="btn btn-default" data-calendar-nav="today">Today</button>
				                            <button class="btn btn-primary" data-calendar-nav="next">Next >></button>
                                          </div>
                                          
                                          <div class="btn-group">
                                            <button class="btn btn-warning" data-calendar-view="year">Year</button>
				                            <button class="btn btn-warning active" data-calendar-view="month">Month</button>
				                            <button class="btn btn-warning" data-calendar-view="week">Week</button>
				                            <button class="btn btn-warning" data-calendar-view="day">Day</button>
                                          </div>
                                      </div>
                                      
                                      <div class="col-md-12">
                                      <br>
                                          <div id="showEventCalendar"></div>
                                      </div>
                                      
                                  </div>
                              </div>
                                  
                              </div>
                           </div>
                       </div>   
                   </div>
                </div>
            </div>
            
        </div>
    </div>
    <?php include "includes/footer.php";?>
</body>
    

    
    
    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/events.js"></script>
    
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


