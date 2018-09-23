<?php
    require "require/dataconf.php";
    session_start(); 
    if(isset($_POST['login'])){

        $username = $connection->real_escape_string($_POST["username"]);
        $password = sha1($connection->real_escape_string($_POST["password"]));
        
        $data = $connection->query("
        select username, password from 
        user where username='$username' and password='$password' and status = 'active';
        ");

        if($data->num_rows == 1){

          $sql = "SELECT * FROM user where username='$username' and password ='$password'";
          $result = $connection->query($sql);
          if($result->num_rows == 1){
              $row = $result->fetch_assoc();
              $_SESSION['name'] = $row['complete_name'];
              $_SESSION['id'] = $row['user_id'];
              $_SESSION['type'] = $row['type'];
              $_SESSION['username'] = $username;
              $_SESSION['password'] = $password;
          }
            
            header("Location: ../dashboard.php");
            exit();
        }else{
            header("Location: ../index.php");
            exit();
        } 
    }
    
?>