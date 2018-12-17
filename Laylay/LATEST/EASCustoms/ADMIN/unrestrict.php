<?php
    
        include_once("process/require/dataconf.php");
        
        $id = $_GET['id'];
            $query = $connection->prepare("Delete From daterestricted where id = ?;");
            $query->bind_param('i', $id);
            $query->execute();
            header("Location: restrictdate.php");

?>