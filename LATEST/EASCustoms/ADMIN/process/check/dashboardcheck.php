<?php
  $connection = new mysqli("localhost","root","","thesis");//make database connectio><n
// <?php require "../require/dataconf.php";>
//Updating Overdue Appointment Request
$checkDashboard = $connection->prepare("SELECT COUNT(*) as count FROM `appointments` WHERE status = 'Pending' AND date = CURDATE()");
if($checkDashboard->execute()){
  $data = $checkDashboard->get_result();
  $box1 = $data->fetch_assoc();
}

$checkDashboard = $connection->prepare("SELECT COUNT(*) as count FROM `appointments` WHERE status = 'Accepted' AND date = CURDATE()");
if($checkDashboard->execute()){
  $data = $checkDashboard->get_result();
  $box2 = $data->fetch_assoc();
}


$checkDashboard = $connection->prepare("SELECT COUNT(*) as count FROM `appointments` WHERE status = 'In Progress'");
if($checkDashboard->execute()){
  $data = $checkDashboard->get_result();
  $box3 = $data->fetch_assoc();
}

$checkDashboard = $connection->prepare("SELECT COUNT(*) as count FROM `appointments` WHERE status = 'Done'");
if($checkDashboard->execute()){
  $data = $checkDashboard->get_result();
  $box4 = $data->fetch_assoc();
}


?>
