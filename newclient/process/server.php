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
    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong>Notice</strong> There are still problems in the form.
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
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  if (empty($username)) {
    array_push($errors, '<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> Username is required</div>');
  }
  if (empty($password)) {
    array_push($errors, '<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> Password is required</div>');
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
          //Login the user here
          $_SESSION['username'] = $row['username'];
          $_SESSION['id'] = $row['id'];
          $_SESSION['last_login_timestamp'] = time();  
          $_SESSION['success'] = '<div class="alert alert-success fade in" align="center">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <i class="fa fa-check-circle" aria-hidden="true"></i> <strong>Notice</strong> Login Successfully.
  </div>';
          header('location: home.php');
          exit();
        }
      } 

  }
}

if (isset($_POST['account_edit'])) { 
  $db = mysqli_connect('localhost', 'root', '', 'thesis');
  $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
  $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
  $middleName = mysqli_real_escape_string($db, $_POST['middleName']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $contactNumber = mysqli_real_escape_string($db, $_POST['contactNumber']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
   $query  = "UPDATE personalinfo SET firstName = '$firstName', lastName ='$lastName', middleName = '$middleName', email = '$email', contactNumber = '$contactNumber', address = '$address', modified = now() WHERE user_id = '$user_id'";
    mysqli_query($db, $query);
    $_SESSION['success'] = '<div class="alert alert-success fade in" align="center">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong>Notice</strong> Changes saved Successfully.
    </div>';
     header('location: accountsettings.php');
     exit();
  }

  if (isset($_POST['vehiclesinfo_edit'])) { 
  $db = mysqli_connect('localhost', 'root', '', 'thesis');
  $plateNumber = mysqli_real_escape_string($db, $_POST['plateNumber']);
  $bodyType = mysqli_real_escape_string($db, $_POST['bodyType']);
  $yearModel = mysqli_real_escape_string($db, $_POST['yearModel']);
  $chasisNumber = mysqli_real_escape_string($db, $_POST['chasisNumber']);
  $numberOfCylinders = mysqli_real_escape_string($db, $_POST['numberOfCylinders']);
  $typeOfDriveTrain = mysqli_real_escape_string($db, $_POST['typeOfDriveTrain']);
  $make = mysqli_real_escape_string($db, $_POST['make']);
  $series = mysqli_real_escape_string($db, $_POST['series']);
  $color = mysqli_real_escape_string($db, $_POST['color']);
  $engineDisplacement = mysqli_real_escape_string($db, $_POST['engineDisplacement']);
  $engineClassification = mysqli_real_escape_string($db, $_POST['engineClassification']);
  $typeOfEngine = mysqli_real_escape_string($db, $_POST['typeOfEngine']);
  $vehicleid = mysqli_real_escape_string($db, $_POST['vehicleid']);
  $engineNumber = mysqli_real_escape_string($db, $_POST['vehicleid']);
   $query  = "UPDATE vehicles SET plateNumber = '$plateNumber', bodyType ='$bodyType', yearModel = '$yearModel', chasisNumber = '$chasisNumber', engineClassification = '$engineClassification', numberOfCylinders = '$numberOfCylinders', typeOfDriveTrain = '$typeOfDriveTrain', make = '$make',  series = '$series', color = '$color', engineNumber = '$engineNumber', typeOfEngine = '$typeOfEngine', engineDisplacement = '$engineDisplacement',  modified = now() WHERE id = '$vehicleid'";
    if (mysqli_query($db, $query) == true) {
    $_SESSION['success_edit'] = '<div class="alert alert-success fade in" align="center">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong>Notice</strong> Changes saved Successfully.
    </div>';

     header('location: vehiclesinfo.php');
     exit();
    }
  }

  if (isset($_POST['vehicle_add'])) { 
  $db = mysqli_connect('localhost', 'root', '', 'thesis');
  $plateNumber = mysqli_real_escape_string($db, $_POST['plateNumber']);
  $yearModel = mysqli_real_escape_string($db, $_POST['yearModel']);
  $make = mysqli_real_escape_string($db, $_POST['make']);
  $series = mysqli_real_escape_string($db, $_POST['series']);
  $color = mysqli_real_escape_string($db, $_POST['color']);
  $personalId = mysqli_real_escape_string($db, $_POST['personalId']);
  $query  = "INSERT INTO vehicles (personalId, plateNumber, make, series, color, yearModel) VALUES ('$personalId','$plateNumber', '$make', '$series', '$color', '$yearModel')";
    if (mysqli_query($db, $query) == true) {
    $_SESSION['vehicle_add'] = '<div class="alert alert-success fade in" align="center">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong>Notice</strong> ' .$make.' '.$series.'was added successfully </div>';
     header('location: vehiclesinfo.php');
     exit();
    }else {
        echo "Error: " . $query . "<br>" . $db->error;
    }
    $db->close();     
  }

  if (isset($_POST['vehicle_delete'])) { 
  $db = mysqli_connect('localhost', 'root', '', 'thesis');
  $vehicleId = mysqli_real_escape_string($db, $_POST['vehicleId']);
  $query  = "DELETE FROM vehicles WHERE id = $vehicleId"; 
    if (mysqli_query($db, $query) == true) {
    $_SESSION['delete'] = '<div class="alert alert-warning fade in" align="center">
    <a href="#" class="close" data-dismiss="alert" >&times;</a>
    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <strong>Notice</strong> Vehicle data deleted successfully </div>';
     header('location: vehiclesinfo.php');
     exit();
    }else {
        echo "Error: " . $query . "<br>" . $db->error;
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



?>