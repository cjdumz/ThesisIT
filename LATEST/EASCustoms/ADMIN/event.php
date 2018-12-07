<?php
include_once("process/require/dataconf.php");
$calendar = array();
$sqlEvents = $connection->prepare("SELECT appointments.id, appointments.personalId, appointments.serviceId, vehicles.plateNumber, appointments.date, appointments.vehicleId FROM appointments INNER JOIN vehicles ON appointments.vehicleId = vehicles.id WHERE appointments.status = 'Accepted' OR  appointments.status = 'In-Progress'");
if ($sqlEvents->execute()){
    $resultset = $sqlEvents->get_result();
    while( $rows = $resultset->fetch_assoc() ) {	
        // convert  date to milliseconds
        $start = strtotime($rows['date']) * 1000;
        $calendar[] = array(
            'id' =>$rows['id'],
            'title' => $rows['plateNumber'],
            'url' => "records.php?id=".$rows['id']."",
            "class" => 'event-important',
            'start' => "$start",
        );
    }
}
$calendarData = array(
	"success" => 1,	
    "result"=>$calendar);
echo json_encode($calendarData);
exit;
?>