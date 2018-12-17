<?php
    if (isset($_POST['submit'])){
        include_once("dataconf.php");
        $id = $_GET['id'];
        $totalPrice= $_GET['totalPrice'];
        $payment = $_POST['payment'];
        $newTotal = $totalPrice - $payment;
            $query = $connection->prepare("Update chargeinvoice set totalPrice = ? where id = ?");
            $query->bind_param('ii', $newTotal, $id);
            $query->execute();
            header('Location: chargeinvoice.php');
    }else{
        exit();
    }
?>