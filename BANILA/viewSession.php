<?php

session_start();
$username = $_SESSION["username"];
$password = $_SESSION["password"];

echo $username, ' ', $password;


?>