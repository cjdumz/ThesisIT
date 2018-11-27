<?php
session_start();
require "require/dataconf.php"; //datebase connection

	if(isset($_POST["previous"])){
	$deleteuser = $connection->prepare("DELETE FROM `personalinfo` WHERE personalinfo.personalId = LAST_INSERT_ID();");

		if($deleteuser->execute()){
			header("Location: ../adduser.php");	
		}
	}

?>