<?php
    $connection = new mysqli("localhost","root","","thesis");//make database connection
    $data = $connection->prepare("SELECT * FROM appointments WHERE status = 'Accepted' AND id = 74");
    if($data->execute()){
        $values = $data->get_result();
        while($row = $values->fetch_assoc()){
            $services = $row['serviceId'];
            $other = $row['otherService'];
            $id = $row['id'];

            $query1 = $connection->prepare("INSERT INTO `task`(`service`, `appointmentID`, `modified`)
            VALUES ('$other', $id, now() )");
            $query1->execute();

            $task = explode(",", $services);
            for ($i = 0; $i < count($task); $i++) {
                echo  $task[$i];
                $query = $connection->prepare("INSERT INTO `task`(`service`, `appointmentID`, `modified`)
                 VALUES ('$task[$i]', $id, now() )");
                 if($query->execute()){ 
                    echo "Gumana";
                  }else{  
                    echo "Palpak";
                  }

            }

            echo '<br>';
        }
    }







?>