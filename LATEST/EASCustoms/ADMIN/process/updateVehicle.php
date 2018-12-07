<?php
    require "require/dataconf.php";

    if(isset($_POST['updateVehicle'])){ 
        if(!isset($_POST['owner'])){
            $owner = $connection->real_escape_string($_POST["altowner"]);
        }else{
            $owner = $connection->real_escape_string($_POST["owner"]);
        }
        $ID = $connection->real_escape_string($_POST["userID"]);
        $id = $connection->real_escape_string($_POST["vehicleID"]);
        $plate = $connection->real_escape_string($_POST["plate"]);
        $status = $connection->real_escape_string($_POST["status"]);
        $btype = $connection->real_escape_string($_POST["btype"]);
        $ymodel = $connection->real_escape_string($_POST["ymodel"]);
        $chassis = $connection->real_escape_string($_POST["chassis"]);
        $engineClass = $connection->real_escape_string($_POST["engineClass"]);
        $cylinderNum = $connection->real_escape_string($_POST["cylinderNum"]);
        $terain = $connection->real_escape_string($_POST["terain"]);
        $make = $connection->real_escape_string($_POST["make"]);
        $series = $connection->real_escape_string($_POST["series"]);
        $color = $connection->real_escape_string($_POST["color"]);
        $engineNum = $connection->real_escape_string($_POST["engineNum"]);
        $engineType = $connection->real_escape_string($_POST["engineType"]);
        $displacement = $connection->real_escape_string($_POST["displacement"]);

        $update = $connection->prepare("UPDATE `vehicles` SET `personalId`= ?,
        `plateNumber`= ?,`bodyType`= ?,`yearModel`= ?,`chasisNumber`= ?,
        `engineClassification`= ?,`numberOfCylinders`= ?,`typeOfDriveTrain`= ?,
        `make`= ?,`series`= ?,`color`= ?,`engineNumber`= ?,`typeOfEngine`= ?,
        `engineDisplacement`= ?,`status`= ?,`modified`= NOW() WHERE `vehicles`.`id` = ?;");

        // echo $ID, $plate, $btype, $ymodel, $chassis, $engineClass, $cylinderNum, $terain,
        // $make, $series, $color, $engineNum, $engineType, $displacement, $status, $id;

        $update->bind_param("issiisissssisssi", $owner, $plate, $btype, $ymodel, $chassis, $engineClass, $cylinderNum, $terain,
                            $make, $series, $color, $engineNum, $engineType, $displacement, $status, $id);
                            
        if($update->execute()){ 
            header("Location: ../viewvehicle.php?plate=$plate");
            echo "Gumana";
        }else{
            header("Location: ../error.php");
            exit();
        }
    }else{
        header("Location: ../error.php");
        exit();
    }

?>