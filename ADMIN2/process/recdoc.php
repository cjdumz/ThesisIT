<?php
require "require/dataconf.php";

if(isset($_POST['recdoc'])){
  $docname = $connection->real_escape_string($_POST["docname"]);
  $status = $connection->real_escape_string($_POST["status"]);
  $type = $connection->real_escape_string($_POST["type"]);
  $descript = $connection->real_escape_string($_POST["descript"]);
  $date_recieved = $connection->real_escape_string($_POST["date_recieved"]);
  echo $docname, $status, $type, $descript, $date_recieved;

  function generateRandomString($length = 16) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }
  $controlnumber = generateRandomString();
  echo "$controlnumber  - ";
  $controlnumber1 = substr($controlnumber, 0, 4);
  $controlnumber2 = substr($controlnumber, 4, 4);
  $controlnumber3 = substr($controlnumber, 8, 4);
  $controlnumber4 = substr($controlnumber, 12, 4);
  $controlnumber =  "$controlnumber1-$controlnumber2-$controlnumber3-$controlnumber4";

  $recdoc = $connection->prepare("INSERT INTO `document`(`doc_name`, `type`, `status`, `description`, `date_recieved`, `serialNumber`)
                                  VALUES (?, ?, ?, ?, ?,?)");
  $recdoc->bind_param("ssssss",$docname, $type, $status, $descript, $date_recieved,$controlnumber);
  if($recdoc->execute()){
    header("Location: ../documents.php");
  }else{
    header("Location: dashboard.php");
  }



}

?>