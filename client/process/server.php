<?php
session_start();
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

if(isset($_POST['update'])){
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$middlename = $_POST['middlename'];
$email = $_POST['email'];
$contactnumber = $_POST['contactnumber'];
$address = $_POST['address'];
$id = $_SESSION['id'];

$sql = "update personalinfo set firstName = '$firstname',lastName = '$lastname',middleName = '$middlename',address='$address',contactNumber='$contactnumber',email='$email' where user_id = '$id'";

$exec = mysqli_query($db,$sql);

}

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
  $contactNumber = mysqli_real_escape_string($db, $_POST['contactNumber']);
  $address = mysqli_real_escape_string($db, $_POST['address']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if ($password_1 != $password_2) {
	array_push($errors, '<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong>Notice</strong> The two passwords do not match.
  </div>');
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $personalinfo_check_query = "SELECT * FROM personalinfo WHERE email= '$email' OR contactNumber= '$contactNumber' LIMIT 1";
  $result = mysqli_query($db, $personalinfo_check_query);
  $personalinfo = mysqli_fetch_assoc($result);
  
  if ($personalinfo) { // if user exists
    
    if ($personalinfo['email'] === $email) {
      array_push($errors, '<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong> Notice</strong> Email already exist.</div> ');
    }
  
    if ($personalinfo['contactNumber'] === $contactNumber) {
      array_push($errors, '<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong> Notice</strong> The Contact Number already exists.</div> ');
    }
  }

  $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
 
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, '<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong> Notice</strong> Username already exist.</div> ');
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, password) 
  			  VALUES('$username', '$password')";
  	mysqli_query($db, $query);
    $last_id = mysqli_insert_id($db); 

    $query1 = "INSERT INTO personalinfo (firstName, lastName, middleName, email, contactNumber, address, user_id) 
          VALUES('$firstName', '$lastName', '$middleName', '$email', '$contactNumber', '$address', '$last_id')";
    mysqli_query($db, $query1);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: homepage.php');
  }
}

// ...

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, '<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong> Notice</strong> Username is required.</div> ');
  }
  if (empty($password)) {
    array_push($errors, '<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong> Notice</strong> Password is required.</div> ');
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";


      header('location: homepage.php');
    }else {
      array_push($errors, '<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong> Notice</strong> Wrong Username/Password combination.</div>' );
    }
  }
}