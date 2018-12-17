<?php
    $id = $_SESSION['id'];
    $pdo = new PDO('mysql:host=localhost;dbname=thesis', 'root', '');
    $result = $pdo->query("select personalId from personalinfo where user_id = '$id'")->fetchColumn(); 
    $sql = "SELECT * FROM vehicles where personalId = '$result'";
    $_SESSION['personalId'] = $result;
    $stmt = $pdo->prepare($sql); 
    $stmt->execute(); 
    $vehicles = $stmt->fetchAll();  

 
?>