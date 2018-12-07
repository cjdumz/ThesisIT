<?php
    require "require/dataconf.php";
    session_start(); 
    if(isset($_POST['login'])){

        $username = $connection->real_escape_string($_POST["username"]);
        $password = sha1($connection->real_escape_string($_POST["password"]));
        
        $data = $connection->query("
        select username, password from 
        admin where username='$username' and password='$password';
        ");

        //print_r($_POST);die();

        if($data->num_rows == 1){

          $sql = "SELECT * FROM admin where username='$username' and password ='$password'";
          $result = $connection->query($sql);
          if($result->num_rows == 1){
              $row = $result->fetch_assoc();
              $_SESSION['id'] = $row['id'];
              $_SESSION['username'] = $username;
              $_SESSION['password'] = $password;
              $_SESSION['name'] = $row['firstName'];

          }
            
            header("Location: ../dashboard.php");
            exit();
        }else{
            header("Location: ../index.php?message=0");
            exit();
        } 
    }
    
?>
