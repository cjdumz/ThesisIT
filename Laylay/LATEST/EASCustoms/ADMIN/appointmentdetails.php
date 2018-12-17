<?php
include_once("process/require/dataconf.php");
$id = $_GET['id'];
$appointmentid = $_GET['appid'];
$serviceid = $_GET['serviceid'];

$query1 = $connection->prepare("SELECT * FROM appointments WHERE id = '".$appointmentid."'");

if ($query1->execute()){
    $result = $query1->get_result();
    while( $rows = $result->fetch_assoc() ) {	
    ?> <h4> <?php echo date('F j, Y',strtotime($rows['date']));?></h4> <?php
    }
}

$query2 = $connection->prepare("SELECT * FROM personalinfo WHERE personalId = '".$id."'");

if ($query2->execute()){
    $result = $query2->get_result();
    while( $rows = $result->fetch_assoc() ) {	
        ?> Name: <?php echo $rows['firstName'];
        ?> &nbsp; <?php echo $rows['middleName'];
        ?> &nbsp; <?php echo $rows['lastName'];
        ?> <br>Mobile Number: <?php echo $rows['mobileNumber'];
    }
}

$query3 = $connection->prepare("SELECT * FROM services WHERE serviceId = '".$serviceid."'");

if ($query3->execute()){
    $result = $query3->get_result();
    while( $rows = $result->fetch_assoc() ) {	
        ?> <br> Type of Service: <?php echo $rows['serviceType']; 
        ?> <br> Vehicle Problems:<li> <?php echo $rows['serviceName'];?> </li> <?php
    }
}
 ?>



