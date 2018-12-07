<?php
    if (isset($_POST['submit'])){
        include_once("dataconf.php");
        $pdo = new PDO('mysql:host=localhost;dbname=thesis', 'root', '');
        $vehicleId = $_POST['vehicleId'];
        $sparePartsId = implode(',', $_POST['spareParts']);
        $date = $_POST['date'];
        $total = $_POST['total'];
        $sql2 = "SELECT personalId From vehicles where id = '$vehicleId'";
        $service = implode(',', $_POST['service']);
            
            $stmt = $pdo->prepare($sql2);
            $stmt->execute();
            $row = $stmt->fetch();
        $personalId = $row[0];
            $query = $connection->prepare("INSERT INTO chargeinvoice (vehicleId,personalId,scopeId,sparepartsId,date,TotalPrice) values(?,?,?,?,?,?);");
            $query->bind_param('iisssi', $vehicleId, $personalId, $service,$sparePartsId, $date, $total);
            $query->execute();
            header('Location:chargeInvoice.php');
    }else{
        exit();
    }
?>