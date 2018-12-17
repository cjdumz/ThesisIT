<?php
    if (isset($_POST['submit'])){
        include_once("process/require/dataconf.php");
        
        $rdate = $_POST['rdate'];
        $status = 'Accepted';
            $query = $connection->prepare("Insert into daterestricted(date,status) values (?,?); ");
            $query->bind_param('ss', $rdate, $status);
            $query->execute();
            header("Location: restrictdate.php");
    }else{
        exit();
    }
?>