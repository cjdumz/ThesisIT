<?php
session_start();
require "require/dataconf.php"; //datebase connection

if(isset($_POST["submit-vehicle"])){  
  $personalId = $_SESSION['user_id'];
  $plateNumber = $connection->real_escape_string($_POST["plateNumber"]);
  $bodyType = $connection->real_escape_string($_POST["bodyType"]);
  $yearModel = $connection->real_escape_string($_POST["yearModel"]);
  $chasisNumber = $connection->real_escape_string($_POST["chasisNumber"]);
  $engineClassification = $connection->real_escape_string($_POST["engineClassification"]);
  $numberOfCylinders = $connection->real_escape_string($_POST["numberOfCylinders"]);
  $typeOfDriveTrain = $connection->real_escape_string($_POST["typeOfDriveTrain"]);
  $make = $connection->real_escape_string($_POST["make"]);
  $series = $connection->real_escape_string($_POST["series"]);
  $color = $connection->real_escape_string($_POST["color"]);
  $engineNumber = $connection->real_escape_string($_POST["engineNumber"]);
  $typeOfEngine = $connection->real_escape_string($_POST["typeOfEngine"]);
  $engineDisplacement = $connection->real_escape_string($_POST["engineDisplacement"]);
  

  // echo $first,", ", $middle,", ", $last, ", ",$suffix,", ", $address,", ", $email,", ", $mobile,", ", $telephone;

  $addvehicle = $connection->prepare("INSERT INTO `vehicles`(`personalId`, `plateNumber`, `bodyType`, `yearModel`, `chasisNumber`, `engineClassification`, `numberOfCylinders`, `typeOfDriveTrain`, `make`, `series`, `color`, `engineNumber`, `typeOfEngine`, `engineDisplacement`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
  
  $addvehicle->bind_param("ssssssssssssss", $personalId, $plateNumber, $bodyType, $yearModel, $chasisNumber, $engineClassification, $numberOfCylinders, $typeOfDriveTrain, $make, $series, $color, $engineNumber, $typeOfEngine, $engineDisplacement);

  if($addvehicle->execute()){ 
    header("Location: ../accountmanagement.php");
    exit();
  }
}
?>