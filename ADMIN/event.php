<?php
include_once("process/require/dataconf.php");
$calendar = array();
$sqlEvents = $connection->prepare("SELECT appointments.id, vehicles.plateNumber, appointments.date FROM appointments INNER JOIN vehicles ON appointments.vehicleId = vehicles.id LIMIT 20");
if ($sqlEvents->execute()){
    $resultset = $sqlEvents->get_result();
    while( $rows = $resultset->fetch_assoc() ) {	
        // convert  date to milliseconds
        $start = strtotime($rows['date']) * 1000;
        $calendar[] = array(
            'id' =>$rows['id'],
            'title' => $rows['plateNumber'],
            'url' => "#",
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