<?php require 'process/require/auth.php';?>
<?php require "process/require/dataconf.php";?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>EAS Customs</title>
    <link rel="icon" href="assets/img/Logo.png">

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <?php include "includes/headscripts.php";?>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="red" data-image="assets/img/8.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->
    <div class="sidebar-wrapper">
            <div class="logo">
                <img src="assets/img/Logo.png" class="logoo" alt="logo" />
                <a href="dashboard.html" class="simple-text">
                    <strong>EAS Customs</strong>
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="dashboard.php">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reports">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
                        <i class="fa fa-inbox"></i>
                        <span class="nav-link-text">Client Request</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseExamplePages">
                        <!-- <li>
                        <a href="schedules.php">Approved</a>
                        </li> -->
                        <li>
                            <a href="appointment.php"></i>Request</a>
                        </li>
                        <li>
                            <a href="reschedule.php"></i>Reschedule</a>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <a href="calendar.php">
                        <i class="fa fa-calendar"></i>
                        <p>Calendar</p>
                    </a>
                </li>
                <li>
                    <a href="icons.php">
                        <i class="fa fa-file-text"></i>
                        <p>Client Records</p>
                    </a>
                </li>
                <li>
                    <a href="template.php">
                        <i class="fa fa-users"></i>
                        <p>Account Management</p>
                    </a>
                </li>
                <li>
                    <a href="typography.php">
                        <i class="fa fa-cog"></i>
                        <p>Settings</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.php">
                        <i class="fa fa-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
            </ul>

        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Approved Request</a>
                </div>
    <?php include "includes/navbar.php";?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Reschedule Request</h4>
                                <p class="category">List of Reschedule Request or Appointments that have already passed</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover"  id="doctables" >
                                    <thead>
                                        <tr class="text-center">
                                            <th>Customer Name</th>
                                            <th>Service</th>
                                            <th>Plate Number</th>
                                            <th>Brand</th>
                                            <th>Series</th>
                                            <th>Year Model</th>
                                            <th>Status</th>
                                            <th width="10%">Date</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $data = $connection->prepare("SELECT appointments.id as 'ID',concat(firstName,' ',middleName,' ',lastName) as 'Name',make,series,
                                            yearModel,plateNumber,serviceType,serviceName as 'sername',appointments.status,date,time from appointments join personalinfo on appointments.personalId
                                            = personalinfo.personalId join vehicles on appointments.vehicleId = vehicles.id join services on appointments.serviceId
                                                = services.serviceId where status = 'Accepted'");
                                            if($data->execute()){
                                                $values = $data->get_result();
                                                while($row = $values->fetch_assoc()) {
                                                    $dateTime = $row['date'];
                                                    $dateTimeSplit = explode(" ",$dateTime);
                                                    $date = $dateTimeSplit[0];
                                                echo '
                                                    <tr class="text-center">
                                                    <td><a href="user.php?id='.$row['ID'].'">'.$row['Name'].'</td>
                                                    <td>'.$row['sername'].'</td>
                                                    <td>'.$row['plateNumber'].'</td>
                                                    <td>'.$row['make'].'</td>
                                                    <td>'.$row['series'].'</td>
                                                    <td>'.$row['yearModel'].'</td>
                                                    <td>'.$row['status'].'</td>
                                                    <td>'; echo "".date('M d, Y',strtotime($date)); echo '</td>
                                                    <td>'.$row['time'].'</td>

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

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> Abenchers | Design: IT Project 2
                </p>
            </div>
        </footer>


    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>
    
    <script src="js/jquery.dataTables.js"></script>
    <script src="js/dataTables.bootstrap4.js"></script>
</html>

<script>
    var table = $('#doctables').DataTable({
      // PAGELENGTH OPTIONS
      "lengthMenu": [[ 10, 25, 50, 100, -1], [ 10, 25, 50, 100, "All"]]
      
 });
</script>