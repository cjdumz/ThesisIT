<?php

 
if (isset($_POST['submit'])){

	include_once 'database.php';
  	$feedback = new database;
  	extract($_POST);

$query ="INSERT INTO feedback (name, email, phoneNumber, message, date) VALUES ('$name', '$email', '$phoneNumber', '$message', now())";
if($feedback->feedback($query)){
	$feedback->url("../index.php");
	}
}
?>