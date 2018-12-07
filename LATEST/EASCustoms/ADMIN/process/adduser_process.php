
<?php
session_start();
require "require/dataconf.php"; //datebase connection

if(isset($_POST["submit-user"])){

  $first = $connection->real_escape_string($_POST["first"]);
  $middle = $connection->real_escape_string($_POST["middle"]);
  $last = $connection->real_escape_string($_POST["last"]);
  $suffix = $connection->real_escape_string($_POST["suffix"]);
  $address = $connection->real_escape_string($_POST["address"]);
  $email = $connection->real_escape_string($_POST["email"]);
  $mobile = $connection->real_escape_string($_POST["mobile"]);
  $telephone = $connection->real_escape_string($_POST["telephone"]);

  // echo $first,", ", $middle,", ", $last, ", ",$suffix,", ", $address,", ", $email,", ", $mobile,", ", $telephone;

  $adduser = $connection->prepare("INSERT INTO `personalinfo`(`firstName`, `lastName`, `middleName`, `suffix`, `address`, 
  `mobileNumber`, `telephoneNumber`, `email`) VALUES (?,?,?,?,?,?,?,?);");
  

  $adduser->bind_param("ssssssss", $first, $last, $middle, $suffix, $address, $mobile, $telephone, $email);
  if($adduser->execute()){ 
    $_SESSION['user_id'] = $adduser->insert_id;
    header("Location: ../addvehicle.php");
  }else{
    header("Location: ../error.php");
    exit();
  }
}

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

  $addvehicle = $connection->prepare("INSERT INTO `vehicles`(`personalId`, `plateNumber`, `bodyType`, `yearModel`, `chasisNumber`, `engineClassification`, `numberOfCylinders`, `typeOfDriveTrain`, `make`, `series`, `color`, `engineNumber`, `typeOfEngine`, `engineDisplacement`) VALUES (LAST_INSERT_ID(),?,?,?,?,?,?,?,?,?,?,?,?,?);");
  
  $addvehicle->bind_param($personalId, $plateNumber, $bodyType, $yearModel, $chasisNumber, $engineClassification, $numberOfCylinders, $typeOfDriveTrain, $make, $series, $color, $engineNumber, $typeOfEngine, $engineDisplacement);

  if($addvehicle->execute()){ 
    header("Location: ../accountmanagement.php");
    exit();
  }
}


?>