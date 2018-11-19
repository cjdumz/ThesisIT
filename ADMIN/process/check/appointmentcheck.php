<?php
    $connection = new mysqli("localhost","root","","thesis");//make database connection

//Updating Overdue Appointment Request
$checkAppointmentStatus = $connection->prepare("SELECT appointments.id as 'app_ID',concat(firstName,' ',middleName,' ',lastName) as 'Name',make,series,
                              yearModel,plateNumber,serviceType,serviceName as 'sername',appointments.status,date from appointments join personalinfo on
                              appointments.personalId = personalinfo.personalId join vehicles on appointments.vehicleId = vehicles.id join services on
                              appointments.serviceId = services.serviceId where appointments.status = 'Pending' AND (NOW() = date OR NOW() > date )");
if($checkAppointmentStatus->execute()){
  $data = $checkAppointmentStatus->get_result();
  while($row = $data->fetch_assoc()) {
    $ID = $row['app_ID'];
    echo  "$ID ";
    $updateStatus = $connection->prepare("UPDATE `appointments` SET `status` = 'Overdue' WHERE `appointments`.`id` = $ID;");
    $updateStatus->execute();
  }
}

?>