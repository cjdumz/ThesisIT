<?php
require "require/dataconf.php"; //datebase connection

// Accepting and Denying of Appointments
if(isset($_POST['commands1'])){
  $action = $connection->real_escape_string($_POST["command1"]);
  $id = $connection->real_escape_string($_POST["id1"]);

  if($action=='accept'){
    $actions_command = $connection->prepare("UPDATE `appointments` SET `status` = 'Accepted', `modified` = NOW() WHERE `appointments`.`id` = $id ;");
  }else{
    $actions_command = $connection->prepare("UPDATE `appointments` SET `status` = 'Declined', `modified` = NOW() WHERE `appointments`.`id` = $id ;");
  }
  if($actions_command ->execute()){
    $MSG = "succesully approved appointment";
  }else{
    $MSG = "there was an error while updating the data..";
  }
}

// if(isset($_POST['commands1'])){
//   echo $_POST['commands1'];
// }

//Accepting and Denying of Appointments
// if(isset($_POST['commands2'])){
//   $action = $connection->real_escape_string($_POST["command2"]);
//   $id = $connection->real_escape_string($_POST["id2"]);

//   if($action=='accept'){
//     $actions_command = $connection->prepare("UPDATE `appointments` SET `status` = 'Accepted', `modified` = NOW() WHERE `appointments`.`id` = $id ;");
//   }else{
//     $actions_command = $connection->prepare("UPDATE `appointments` SET `status` = 'Declined', `modified` = NOW() WHERE `appointments`.`id` = $id ;");
//   }
//   if($actions_command ->execute()){
//     $MSG = "succesully approved appointment";
//     // header("Refresh: 0; url=../appointments.php");
//   }else{
//     $MSG = "there was an error while updating the data..";
//   }
// }
?>