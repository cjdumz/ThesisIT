<?php
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
    header("Location: ../accountmanagement.php");
  }else{
    header("Location: ../error.php");
    exit();
}
}
?>