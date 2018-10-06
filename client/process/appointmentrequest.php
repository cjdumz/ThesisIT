<?php
session_start();
if(isset($_POST["submit"])){
$id = $_SESSION['id'];
$pdo = new PDO('mysql:host=localhost;dbname=thesis', 'root', '');
$result = $pdo->query("select personalId from personalinfo where user_id = '$id'")->fetchColumn();    
$serviceId = $_POST["service"];
$vehicleId = $_POST["vehicle"];
$personalId = $result;
$date = $_POST["date"];
$time = $_POST["time"];
$otherService = $_POST["otherService"];
$additionalMessage = $_POST["additionalMessage"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thesis";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "INSERT INTO appointments (serviceId, vehicleId, personalId, otherService, additionalMessage, status,date,time) VALUES ('$serviceId','$vehicleId','$personalId', '$otherService', '$additionalMessage', 'pending', '$date','$time')";

if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
            } 
            if (mysqli_query($conn, $sql)) {
               echo "New record created successfully";
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
            $conn->close();
}
else{
    echo "Palpak!!";
}

?>