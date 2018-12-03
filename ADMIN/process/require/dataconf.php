
<?php
    
    $connection = new mysqli("localhost","eas","","thesis");//make database connection
    
//trial
    $DB_host = "localhost";
    $DB_user = "eas";
    $DB_pass = "";
    $DB_name = "thesis";
    try
    {
        $db_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
        $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo "ERROR : ".$e->getMessage();
    }

?>

    
