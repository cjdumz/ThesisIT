<?php require 'process/require/auth.php';?>
<?php require "process/require/dataconf.php";?>
<?php include "process/check/appointmentcheck.php";?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Material Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <!--  Datatables     -->    
  <link href="css/dataTables.bootstrap4.css" rel="stylesheet">
</head>

<body class="">
  <div class="wrapper ">

    <?php require "includes/navbar.php"; ?>
    
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Table List</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-fw fa-sign-out"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">

          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">Tasks:</span>
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active" href="#profile" data-toggle="tab">
                            <i class="material-icons">code</i> Appointments
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#messages" data-toggle="tab">
                            <i class="material-icons">code</i> Reschedule
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="card-body">
                  <div class="tab-content">
                    
                    <div class="tab-pane active" id="profile">

                      <div class="content table-responsive table-full-width">
                        <table class="table table-hover"  id="doctables" >
                            <thead class=" text-primary">
                                <tr>
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
                                          <td class="text-center">
                                            <form method="POST" action="process/server.php" enctype="multipart/form-data">
                                              <input type="hidden" name="command" value="accept">
                                              <input type="hidden" name="id" value="'.$row['ID'].'">
                                              <button class="btn btn-success col-12" type="submit" name="commands" style="margin-top: 5px; width: 150px;">
                                              <i class="fa fa-check-square-o" aria-hidden="true"></i> Accept</button>
                                            </form>

                                            <form method="POST" action="process/server.php" enctype="multipart/form-data">
                                                <input type="hidden" name="command" value="deny">
                                                <input type="hidden" name="id" value="'.$row['ID'].'">
                                                <button class="btn btn-danger col-12" type="submit" name="commands" style="margin-top: 5px; width: 150px;">
                                                <i class="fa fa-history" aria-hidden="true"></i> Reschedule</button>
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

                    <div class="tab-pane" id="messages">
                      <div class="table-responsive">
                        <table class="table">
                          <thead class=" text-primary">
                            <th>
                              ID
                            </th>
                            <th>
                              Name
                            </th>
                            <th>
                              Country
                            </th>
                            <th>
                              City
                            </th>
                            <th>
                              Salary
                            </th>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                1
                              </td>
                              <td>
                                Dakota Rice
                              </td>
                              <td>
                                Niger
                              </td>
                              <td>
                                Oud-Turnhout
                              </td>
                              <td class="text-primary">
                                $36,738
                              </td>
                            </tr>
                            <tr>
                              <td>
                                2
                              </td>
                              <td>
                                Minerva Hooper
                              </td>
                              <td>
                                Curaçao
                              </td>
                              <td>
                                Sinaai-Waas
                              </td>
                              <td class="text-primary">
                                $23,789
                              </td>
                            </tr>
                            <tr>
                              <td>
                                3
                              </td>
                              <td>
                                Sage Rodriguez
                              </td>
                              <td>
                                Netherlands
                              </td>
                              <td>
                                Baileux
                              </td>
                              <td class="text-primary">
                                $56,142
                              </td>
                            </tr>
                            <tr>
                              <td>
                                4
                              </td>
                              <td>
                                Philip Chaney
                              </td>
                              <td>
                                Korea, South
                              </td>
                              <td>
                                Overland Park
                              </td>
                              <td class="text-primary">
                                $38,735
                              </td>
                            </tr>
                            <tr>
                              <td>
                                5
                              </td>
                              <td>
                                Doris Greene
                              </td>
                              <td>
                                Malawi
                              </td>
                              <td>
                                Feldkirchen in Kärnten
                              </td>
                              <td class="text-primary">
                                $63,542
                              </td>
                            </tr>
                            <tr>
                              <td>
                                6
                              </td>
                              <td>
                                Mason Porter
                              </td>
                              <td>
                                Chile
                              </td>
                              <td>
                                Gloucester
                              </td>
                              <td class="text-primary">
                                $78,615
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>

      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="https://creative-tim.com/presentation">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
              <li>
                <a href="https://www.creative-tim.com/license">
                  Licenses
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
</body>

</html>