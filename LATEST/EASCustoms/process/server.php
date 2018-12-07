<?php

// initializing variables
$username = "";
$email    = "";
$firstName    = "";
$middleName = "";
$lastName    = "";
$contactNumber = "";
$address = "";
$errors = array(); 
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'thesis');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
  $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
  $middleName = mysqli_real_escape_string($db, $_POST['middleName']);
  $mobileNumber = mysqli_real_escape_string($db, $_POST['mobileNumber']);
  $address = mysqli_real_escape_string($db, $_POST['address']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if ($password_1 != $password_2) {
  array_push($errors, '<div class="alert alert-danger fade in align="center">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong> Notice </strong> There are still problems in the form.
  </div>');
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $personalinfo_check_query = "SELECT * FROM personalinfo WHERE email= '$email' OR mobileNumber= '$mobileNumber' LIMIT 1";
  $result = mysqli_query($db, $personalinfo_check_query);
  $personalinfo = mysqli_fetch_assoc($result);
  
  if ($personalinfo) { // if user exists
    
    if ($personalinfo['email'] === $email) {
      array_push($errors, '<div class="alert alert-danger fade in" align="center">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong> Notice</strong> Email already exist.</div> ');
    }
  
    if ($personalinfo['contactNumber'] === $contactNumber) {
      array_push($errors, '<div class="alert alert-danger fade in" align="center">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong> Notice</strong> The Contact Number already exists.</div> ');
    }
  }

  $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
 
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, '<div class="alert alert-danger fade in" align="center">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong> Notice</strong> Username already exist.</div> ');
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = password_hash($password_1, PASSWORD_DEFAULT);//encrypt the password before saving in the database

    $query = "INSERT INTO users (username, password) 
          VALUES('$username', '$password')";
    mysqli_query($db, $query);
    $last_id = mysqli_insert_id($db); 

    $query1 = "INSERT INTO personalinfo (firstName, lastName, middleName, email, contactNumber, address, user_id) 
          VALUES('$firstName', '$lastName', '$middleName', '$email', '$contactNumber', '$address', '$last_id')";
    mysqli_query($db, $query1);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: home.php');
  }
}
// ...

if (isset($_POST['login_user'])) {
  $error = 0;
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  if (empty($username)) {
     $_SESSION['emptyusername'] = '<div class="alert alert-warning fade in" align="center">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <i class="fas fa-exclamation-circle"></i><strong> Notice</strong> Username is empty.
    </div>';
    $error++;  
  }
  if (empty($password)) {
     $_SESSION['emptypassword'] = '<div class="alert alert-warning fade in" align="center">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <i class="fas fa-exclamation-circle"></i><strong> Notice</strong> Password is empty.
    </div>';
    $error++;
  }
  if (empty($password) && empty($username)) {
     $_SESSION['emptypassword'] = '<div class="alert alert-warning fade in" align="center">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <i class="fa fa-check-circle" aria-hidden="true"></i> <strong> Notice </strong> Username or Password is empty.
    </div>';
    $error++;
  }

    if(count($errors)== 0){
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($db, $query);
      if ($row = mysqli_fetch_assoc($result)){
        //De hash Password
        $hashedPwdCheck = password_verify($password, $row['password']);
        if($hashedPwdCheck == false){
          header('location: login.php');
          exit();
        }elseif ($hashedPwdCheck == true){
         if($row['type'] == 'admin'){
              $_SESSION['id'] = $row['id'];
              $_SESSION['type'] = $row['type'];
              $_SESSION['username'] = $username;
              $_SESSION['password'] = $password;
              header("Location: ADMIN/dashboard.php");
              exit();
         }else{
          //Login the user here
          $_SESSION['type'] = $row['type'];
          $_SESSION['username'] = $row['username'];
          $_SESSION['id'] = $row['id'];
          $_SESSION['last_login_timestamp'] = time();  
          //$_SESSION['success'] = '<div class="alert alert-success fade in" align="center">
          //<a href="#" class="close" data-dismiss="alert">&times;</a>
          //<i class="fa fa-check-circle" aria-hidden="true"></i> <strong>Notice</strong> Login Successfully.
          //</div>';
          header('location: vehiclesinfo.php');
          exit();
            }
          }
    }

  }
}

if (isset($_POST['account_edit'])) { 
  $db = mysqli_connect('localhost', 'eas', '', 'thesis');
  $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
  $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
  $middleName = mysqli_real_escape_string($db, $_POST['middleName']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $contactNumber = mysqli_real_escape_string($db, $_POST['contactNumber']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
   $query  = "UPDATE personalinfo SET firstName = '$firstName', lastName ='$lastName', middleName = '$middleName', email = '$email', mobileNumber = '$contactNumber', address = '$address', modified = now() WHERE user_id = '$user_id'";
    mysqli_query($db, $query);
    $_SESSION['success'] = '<div class="alert alert-success fade in" align="center">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong> Notice</strong> Changes saved Successfully.
    </div>';
     header('location: accountsettings.php');
     exit();
  }

  if (isset($_POST['vehiclesinfo_edit'])) { 
  $db = mysqli_connect('localhost', 'eas', '', 'thesis');
  $plateNumber = mysqli_real_escape_string($db, $_POST['plateNumber']);
  $make = mysqli_real_escape_string($db, $_POST['make']);
  $yearModel = mysqli_real_escape_string($db, $_POST['yearModel']);
  $series = mysqli_real_escape_string($db, $_POST['series']);
  $color = mysqli_real_escape_string($db, $_POST['color']);
  $vehicleid = mysqli_real_escape_string($db, $_POST['vehicleid']);

   $query  = "UPDATE vehicles SET plateNumber = '$plateNumber', yearModel = '$yearModel', make = '$make',  series = '$series', color = '$color',  modified = now() WHERE id = '$vehicleid'";
    if (mysqli_query($db, $query) == true) {
    $_SESSION['success_edit'] = '<div class="alert alert-success fade in" align="center">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong> Notice</strong> Changes saved Successfully.
    </div>';

     header('location: vehiclesinfo.php');
     exit();
    }
  }

  if (isset($_POST['vehicle_add'])) { 
  $db = mysqli_connect('localhost', 'eas', '', 'thesis');
  $plateNumber1 = mysqli_real_escape_string($db, $_POST['plateNumber1']);
  $yearModel = mysqli_real_escape_string($db, $_POST['yearModel']);
  $make = mysqli_real_escape_string($db, $_POST['make']);
  $series = mysqli_real_escape_string($db, $_POST['series']);
  $othermake = mysqli_real_escape_string($db, $_POST['othermake']);
  $otherseries = mysqli_real_escape_string($db, $_POST['otherseries']);
  $color = mysqli_real_escape_string($db, $_POST['color']);
  $personalId = mysqli_real_escape_string($db, $_POST['personalId']);
  
  if (isset($_POST["make"]) && isset($_POST["series"])) {
  $query  = "INSERT INTO vehicles (personalId, plateNumber, make, series, color, yearModel) VALUES ('$personalId','$plateNumber1', '$make', '$series', '$color', '$yearModel')";
    if (mysqli_query($db, $query) == true) {
    $_SESSION['vehicle_add'] = '<div class="alert alert-success fade in" align="center">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong> Notice</strong> ' .$make.' '.$series.' was added successfully </div>';
     header('location: vehiclesinfo.php');
     exit();
    }else {
        echo "Error: " . $query . "<br>" . $db->error;
    }
  }else if(isset($_POST["othermake"]) && isset($_POST["otherseries"])){
    $query  = "INSERT INTO vehicles (personalId, plateNumber, make, series, color, yearModel) VALUES ('$personalId','$plateNumber1', '$othermake', '$otherseries', '$color', '$yearModel')";
  if (mysqli_query($db, $query) == true) {
  $_SESSION['vehicle_add'] = '<div class="alert alert-success fade in" align="center">
  <a href="#" class="close" data-dismiss="alert">&times;</a>
  <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong> Notice</strong> ' .$othermake.' '.$otherseries.' was added successfully </div>';
   header('location: vehiclesinfo.php');
   exit();
  }else {
      echo "Error: " . $query . "<br>" . $db->error;
  }
  }
    $db->close();     
  }

  //Insert Appointment
  if(isset($_POST["vehicle"]))
  {
   $vehicle = mysqli_real_escape_string($connect, $_POST["vehicle"]);
   $personalId = mysqli_real_escape_string($connect, $_POST["personalId"]);
   $additionalMessage = mysqli_real_escape_string($connect, $_POST["additionalMessage"]);
   $service = mysqli_real_escape_string($connect, $_POST["service"]);
   $date = mysqli_real_escape_string($connect, $_POST["date"]);
   $query = "
   INSERT INTO appointments(serviceId, vehicleId, personalId, otherService, date, status, notification )
   VALUES ('$service', '$vehicle', '$personalId', '$additionalMessage', '$date', 'Pending', '0')
   ";
   mysqli_query($db, $query);
  }

  if(isset($_POST["appointmentDelete"]))
  {
   $appointmentId = $_POST['appointmentId'];
   $plateNumber = $_POST['appointmentId'];
   $make = $_POST['make'];
   $series = $_POST['series'];
   $yearModel = $_POST['yearModel'];
   $query = "DELETE FROM appointments WHERE id = $appointmentId";
   mysqli_query($db, $query);
  $_SESSION['appointment_delete'] = '<div class="alert alert-danger fade in" align="center">
  <a href="#" class="close" data-dismiss="alert">&times;</a>
  <i class="fas fa-trash-alt"></i> <strong> Notice</strong> ' .$plateNumber.' '.$make.' '.$series.' was deleted successfully </div>';
   header('location: ../requeststatus.php');
   exit();
  }

  if(isset($_POST["appointmentAccepted"]))
  {
   $appointmentId = $_POST['appointmentId'];
   $plateNumber = $_POST['plateNumber'];
   $make = $_POST['make'];
   $series = $_POST['series'];
   $yearModel = $_POST['yearModel'];
   $query = "UPDATE appointments SET status= 'Accepted' , created= now()  WHERE id = $appointmentId";
   $_SESSION['appointment_accepted'] = '<div class="alert alert-success fade in" align="center">
   <a href="#" class="close" data-dismiss="alert">&times;</a>
   <i class="fas fa-check"></i> <strong> Notice</strong>' .$plateNumber.' '.$make.' '.$series.' was added successfully </div>';
   mysqli_query($db, $query);
   header('location: ../requeststatus.php');
   exit();
  }




?>
