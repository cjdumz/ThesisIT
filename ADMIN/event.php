<?php
include_once("process/require/dataconf.php");
<<<<<<< HEAD
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
=======
$sqlEvents = "SELECT appointments.id, vehicles.plateNumber, appointments.date FROM appointments INNER JOIN vehicles ON appointments.vehicleId = vehicles.id LIMIT 20";
$resultset = mysqli_query($connection, $sqlEvents) or die("database error:". mysqli_error($connection);
$calendar = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {	
	// convert  date to milliseconds
	$start = strtotime($rows['date']) * 1000;
	
    
	$calendar[] = array(
        'id' =>$rows['id'],
        'title' => $rows['plateNumber'],
        'url' => "#",
		"class" => 'event-important',
        'start' => "$start",
        
    );
>>>>>>> 191bbce37952a0c034c75508f3aff0ffa18340fb
}
$calendarData = array(
	"success" => 1,	
    "result"=>$calendar);
echo json_encode($calendarData);
exit;
?>
