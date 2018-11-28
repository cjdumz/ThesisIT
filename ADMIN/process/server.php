<?php
require "require/dataconf.php"; //datebase connection

if(isset($_POST['command1'])){
  $action = $connection->real_escape_string($_POST["command1"]);
  $id = $connection->real_escape_string($_POST["id1"]);
  if(isset($_POST['message'])){
    $message = $connection->real_escape_string($_POST["message"]);
  }else{
    $message = "";
  }

  if($action=='accept'){
    $actions_command = $connection->prepare("UPDATE `appointments` SET `status` = 'Accepted', `modified` = now() WHERE `appointments`.`id` = $id;");
  }else{
    if($action=='deny'){
      $actions_command = $connection->prepare("UPDATE `appointments` SET `status` = 'Reschedule', `modified` = now() WHERE `appointments`.`id` =  $id");
    }else{
      if($action=='decline'){
        $actions_command = $connection->prepare("UPDATE `appointments` SET `status` = 'Declined', `additionalMessage` = '$message', `modified` = now() WHERE `appointments`.`id` =  $id");
      }
    }
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
  $message = $connection->real_escape_string($_POST["message"]);
  $location = $connection->real_escape_string($_POST["location"]);
  $actions_command = $connection->prepare("UPDATE `appointments` SET `date` = '$update' , `status`= 'Rescheduled', `additionalMessage` = '$message' WHERE `appointments`.`id` = $id;");
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

  $update = $connection->prepare("UPDATE `personalinfo` SET `firstName`= ?,
  `lastName`= ?,`middleName`= ?,`suffix`= ?,`address`= ?,`mobileNumber`= ?,`telephoneNumber`= ?,
  `email`= ?, `modified`= NOW() WHERE `personalId` = ?");

  $update->bind_param("ssssssssi", $first, $last, $middle, $suffix, $address, $mobile, $telephone, $email, $id);
  if($update->execute()){ 
    header("Location: ../user.php?id=$id");
    echo "Gumana";
  }else{  
    header("Location: ../error.php");
    exit();
  }
}

if(isset($_POST["submit-vehicle"])){
  $plate = $connection->real_escape_string($_POST["plate"]);
  $bodyType = $connection->real_escape_string($_POST["bodyType"]);
  $yearModel = $connection->real_escape_string($_POST["yearModel"]);
  $chasisNumber = $connection->real_escape_string($_POST["chasisNumber"]);
  $numberOfCylinders = $connection->real_escape_string($_POST["numberOfCylinders"]);
  $make = $connection->real_escape_string($_POST["make"]);
  $series = $connection->real_escape_string($_POST["series"]);
  $color = $connection->real_escape_string($_POST["color"]);
  $typeOfDriveTrain = $connection->real_escape_string($_POST["typeOfDriveTrain"]);
  $typeOfEngine = $connection->real_escape_string($_POST["typeOfEngine"]);
  $engineClassification = $connection->real_escape_string($_POST["engineClassification"]);
  $engineDisplacement = $connection->real_escape_string($_POST["engineDisplacement"]);
  $engineNumber = $connection->real_escape_string($_POST["engineNumber"]);

  $update = $connection->prepare("UPDATE `vehicles` SET `bodyType`= ?,`yearModel`= ?,
  `chasisNumber`= ?,`engineClassification`= ?,`numberOfCylinders`= ?,
  `typeOfDriveTrain`= ?,`make`= ?,`series`= ?,`color`= ?,`engineNumber`= ?,
  `typeOfEngine`= ?,`engineDisplacement`=?,`modified`= NOW() WHERE `plateNumber`  = ?");

  $update->bind_param("siisissssisss",$bodyType,$yearModel,$chasisNumber,$engineClassification,$numberOfCylinders,
  $typeOfDriveTrain,$make,$series,$color,$engineNumber,$typeOfEngine,$engineDisplacement,$plate);
  if($update->execute()){ 
    header("Location: ../viewVehicle.php?plate=$plate");
    echo "Gumana";
  }else{  
    header("Location: ../error.php");
    exit();
  }
}

if(isset($_POST["start"])){

  $app = $connection->real_escape_string($_POST["app_id"]);

  $query1 = $connection->prepare("UPDATE `appointments` SET `status`= 'In-Progress',`modified`= now() WHERE appointments.id = $app");
  $query1->execute();

  $data = $connection->prepare("SELECT * FROM appointments WHERE status = 'In-Progress' AND appointments.id = $app");
  if($data->execute()){
      $values = $data->get_result();
      while($row = $values->fetch_assoc()){
          $services = $row['serviceId'];
          $id = $row['id'];

          if($row['otherServices'] != ""){
            $other = $row['otherService'];
            $query2 = $connection->prepare("INSERT INTO `task`(`service`, `appointmentID`, `modified`)
            VALUES ('$other', $id, now() )");
            $query2->execute();
          }

          $task = explode(",", $services);
          for ($i = 0; $i < count($task); $i++) {
              echo  $task[$i];
              $query3 = $connection->prepare("INSERT INTO `task`(`service`, `appointmentID`, `modified`)
               VALUES ('$task[$i]', $id, now() )");
               if($query3->execute()){ 
                  header("Location: ../records.php?id=$app");
                }else{  
                  header("Location: ../error.php");
                }

          }

          echo '<br>';
      }
  }
}

if(isset($_POST["startTask"])){
  $task = $connection->real_escape_string($_POST["task_id"]);
  $app = $connection->real_escape_string($_POST["app_id"]);
  $start_task = $connection->prepare("UPDATE `task` SET `dateStart` = NOW() WHERE `task`.`id` = $task;");
  if($start_task->execute()){
    header("Location: ../records.php?id=$app");
  }else{
    header("Location: ../error.php");
  }

}

if(isset($_POST["finishTask"])){
  $task = $connection->real_escape_string($_POST["task_id"]);
  $app = $connection->real_escape_string($_POST["app_id"]);
  $start_task = $connection->prepare("UPDATE `task` SET `dateEnd` = NOW(),`status`= 'Done' WHERE `task`.`id` = $task;");
  if($start_task->execute()){
    header("Location: ../records.php?id=$app");
  }else{
    header("Location: ../error.php");
  }

}

if(isset($_POST["toggle"])){
  $plate = $connection->real_escape_string($_POST["plate"]);
  $stat = $connection->real_escape_string($_POST["stat"]);
  echo $stat;
  if($stat == 'Active'){
    $changeStatus = $connection->prepare("UPDATE `vehicles` SET `status` = 'Deactivated' WHERE `vehicles`.`plateNumber` = '$plate';");
    if($changeStatus->execute()){
      header("Location: ../viewVehicle.php?plate=$plate");
    }else{
      header("Location: ../error.php");
    }
  }else{
    $changeStatus = $connection->prepare("UPDATE `vehicles` SET `status` = 'Active' WHERE `vehicles`.`plateNumber` = '$plate';");
    if($changeStatus->execute()){
      header("Location: ../viewVehicle.php?plate=$plate");
    }else{
      header("Location: ../error.php");
    }
  }
}


if(isset($_POST["changeUser"])){
  $plate = $connection->real_escape_string($_POST["plate"]);
  $user = $connection->real_escape_string($_POST["group"]);
  $start_task = $connection->prepare("UPDATE `vehicles` SET `personalId` = '$user' WHERE `vehicles`.`plateNumber` = '$plate';");
  if($start_task->execute()){
    header("Location: ../viewVehicle.php?plate=$plate");
  }else{
    header("Location: ../error.php");
  }

}
?>
