<?php

if(isset($_POST["send-sms"])){
    $phone = $_POST["phone"];
    $sms = $_POST["message"];

    $result = itexmo($phone,$sms,"TR-THESI550423_6HH8A");
if ($result == ""){
echo "iTexMo: No response from server!!!
Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
Please CONTACT US for help. ";	
}else if ($result == 0){
echo "Message Sent!";
header("Location: ../accountmanagement.php");
}
else{	
echo "Error Num ". $result . " was encountered!";
}
}



function itexmo($number,$message,$apicode){
$url = 'https://www.itexmo.com/php_api/api.php';
$itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
$param = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($itexmo),
    ),
);
$context  = stream_context_create($param);
return file_get_contents($url, false, $context);}

?>