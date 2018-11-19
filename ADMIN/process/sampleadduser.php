<?php
require "require/dataconf.php"; //datebase connection

if(isset($_POST['command1'])){
  $action = $connection->real_escape_string($_POST["command1"]);
  $id = $connection->real_escape_string($_POST["id1"]);

  if($action=='accept'){
    $actions_command = $connection->prepare("UPDATE `appointments` SET `status` = 'Accepted' WHERE `appointments`.`id` = $id;");
  }else{
    $actions_command = $connection->prepare("UPDATE `appointments` SET `status` = 'Reschedule' WHERE `appointments`.`id` =  $id");
  }
  if($actions_command ->execute()){
    $MSG = "succesully approved appointment";
    header("Refresh: 0; url=../appointments.php");
  }else{
    $MSG = "there was an error while updating the data..";
  }

}

if(isset($_POST['resubmit'])){
  $update = $connection->real_escape_string($_POST["update"]);
  $id = $connection->real_escape_string($_POST["id"]);
  $location = $connection->real_escape_string($_POST["location"]);
  $actions_command = $connection->prepare("UPDATE `appointments` SET `date` = '$update' , `status`= 'Rescheduled' WHERE `appointments`.`id` = $id;");
  if($actions_command ->execute()){
    if($location == 'appointment'){
      $MSG = "succesully approved appointment";
      header("Refresh: 0; url=../appointments.php");
    }else{
      header("Refresh: 0; url=../reschedule.php");
    }

  }else{
    $MSG = "there was an error while updating the data..";
  }
}

if(isset($_POST["submit-user"])){
  $id = $connection->real_escape_string($_POST["id"]);
  $first = $connection->real_escape_string($_POST["first"]);
  $middle = $connection->real_escape_string($_POST["middle"]);
  $last = $connection->real_escape_string($_POST["last"]);
  $suffix = $connection->real_escape_string($_POST["suffix"]);
  $address = $connection->real_escape_string($_POST["address"]);
  $email = $connection->real_escape_string($_POST["email"]);
  $mobile = $connection->real_escape_string($_POST["mobile"]);
  $telephone = $connection->real_escape_string($_POST["telephone"]);

  echo $id,", ", $first,", ", $middle,", ", $last, ", ",$suffix,", ", $address,", ", $email,", ", $mobile,", ", $telephone;

  $adduser = $connection->prepare("INSERT `personalinfo` SET `firstName`= ?,
  `lastName`= ?,`middleName`= ?,`suffix`= ?,`address`= ?,`mobileNumber`= ?,`telephoneNumber`= ?,
  `email`= ?, `modified`= NOW() WHERE `personalId` = ?");

  $adduser->bind_param("ssssssssi", $first, $last, $middle, $suffix, $address, $mobile, $telephone, $email, $id);
  if($adduser->execute()){ 
    // header("Location: ../user.php?id=$id");
    echo "Gumana";
  }else{
    header("Location: ../error.php");
    exit();
}
}
?>

<input type="text" name="phone" value="<?php $phone ?>">
<textarea name="message" id="" cols="30" rows="10"></textarea>