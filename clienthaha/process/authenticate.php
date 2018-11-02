<?php
session_start();
// Change this to your connection info.
include 'database.php';
$login = new database;
extract($_POST);


// Now we check if the data was submitted, isset will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	die ('Username and/or password does not exist!');
}
// Prepare our SQL 
if (empty($username) || empty($password)){
		$login->url("../index.php?login=empty");
		exit();
	}else{	
		$query = "SELECT * FROM users WHERE username = '$username'";
		$result = mysqli_query($login->conn, $query);
		$resultcheck = mysqli_num_rows($result);
		if ($resultcheck < 1){
			$login->url("../index.php?login=usernotidentified");
			exit();
		}else{
			if ($row = mysqli_fetch_assoc($result)){
				//De hash Password
				$hashedPwdCheck = password_verify($password, $row['password']);
				if($hashedPwdCheck == false){
					$login->url("../index.php?login=error");
					exit();
				}elseif ($hashedPwdCheck == true){
					//Login the user here
					$_SESSION['username'] = $row['username'];
					$_SESSION['id'] = $row['id'];
					$login->url("../home.php");
					exit();
				}
			}	
		}
	}

?>