<?php
//insert.php
if(isset($_POST["vehicle"]))
{
 include("connect.php");
 $vehicle = mysqli_real_escape_string($connect, $_POST["vehicle"]);
 $personalId = mysqli_real_escape_string($connect, $_POST["personalId"]);
 $additionalMessage = mysqli_real_escape_string($connect, $_POST["additionalMessage"]);
 $service = mysqli_real_escape_string($connect, $_POST["service"]);
 $date = mysqli_real_escape_string($connect, $_POST["date"]);
 $query = "
 INSERT INTO appointments(serviceId, vehicleId, personalId, otherService, date, status, notification )
 VALUES ('$service', '$vehicle', '$personalId', '$additionalMessage', '$date', 'Pending', '0')
 ";
 mysqli_query($connect, $query);
}
?>
