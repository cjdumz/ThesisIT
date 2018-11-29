<?php
    $connection = new mysqli("localhost","thesis","","thesis");//make database connection

//Updating Overdue Appointment Request
$checkAppointmentStatus = $connection->prepare("SELECT * FROM `appointments` WHERE (appointments.status = 'Pending' OR appointments.status = 'Rescheduled') AND appointments.date < now()");
if($checkAppointmentStatus->execute()){
  $data = $checkAppointmentStatus->get_result();
  while($row = $data->fetch_assoc()) {
    $ID = $row['id'];
    $updateStatus = $connection->prepare("UPDATE `appointments` SET `status` = 'Overdue' WHERE `appointments`.`id` = $ID;");
    $updateStatus->execute();
  }
}

?>