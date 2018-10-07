<?php
require "require/dataconf.php"; //datebase connection

//Accepting and Denying of Appointments
if(isset($_POST['commands'])){
  $action = $connection->real_escape_string($_POST["command"]);
  $id = $connection->real_escape_string($_POST["id"]);

  if($action=='accept'){
    $actions_command = $connection->prepare("UPDATE `appointments` SET `status` = 'Accepted' WHERE `appointments`.`id` = $id ;");
  }else{
    $actions_command = $connection->prepare("UPDATE `appointments` SET `status` = 'Declined' WHERE `appointments`.`id` = $id ;");
  }
  if($actions_command ->execute()){
    $MSG = "succesully approved appointment";
    header("Refresh: 0; url=../appointment.php?message='.$MSG.'");
  }else{
    $MSG = "there was an error while updating the data..";
  }
}

?>