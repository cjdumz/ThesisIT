<?php
//insert.php
if(isset($_POST["vehicle"]))
{
 $db = mysqli_connect('localhost', 'root', '','thesis');
 $vehicle = mysqli_real_escape_string($db, $_POST["vehicle"]);
 $personalId = mysqli_real_escape_string($db, $_POST["personalId"]);
 $additionalMessage = mysqli_real_escape_string($db, $_POST["additionalMessage"]);
 $service = mysqli_real_escape_string($db, implode(',', $_POST['service']));
 $date = mysqli_real_escape_string($db, $_POST["date"]);
 $query = "
 INSERT INTO appointments(serviceId, vehicleId, personalId, otherService, date, status, notification )
 VALUES ('$service', '$vehicle', '$personalId', '$additionalMessage', '$date', 'Pending', '0')
 ";
 mysqli_query($db, $query);
}
?>
