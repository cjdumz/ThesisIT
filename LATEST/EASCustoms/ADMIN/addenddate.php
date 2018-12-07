<?php
    if (isset($_POST['submit'])){
        include_once("process/require/dataconf.php");
        $id = $_GET['id'];
        
        $enddate = $_POST['enddate'];
            $query = $connection->prepare("UPDATE appointments SET targetEndDate=? WHERE id=?");
            $query->bind_param('si', $enddate, $id);
            $query->execute();
            header("Location: records.php?id=$id");
    }else{
        exit();
    }
?>