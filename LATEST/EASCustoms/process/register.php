<?php
if (isset($_POST['submit'])){

include 'database.php';
$register = new database;
extract($_POST);

// Now we check if the data was submitted, isset will check if the data exists.
if (!isset($_POST['username'], $_POST['password'], $_POST['firstName'], $_POST['middleName'], $_POST['lastName'], $_POST['address'], $_POST['contactNumber'], $_POST['email'])) {
	// Could not get the data that should have been sent.
	die ('Please complete the registration form.<br><a href="../register.php">Back</a>');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['firstName']) || empty($_POST['middleName']) || empty($_POST['lastName']) || empty($_POST['contactNumber']) || empty($_POST['email']) || empty($_POST['address'])) {
	// One or more values are empty...
	die ('Please complete the registration form.<br><a href="../register.php">Back</a>');
}
//Additional Validators
	//ivalid characters validator
	if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
    	die ('Username is not valid. Use characters from A-Z uppercase or Lower Case. Numbers are also allowed<br><a href="../register.php">Back</a>');
	}
	//password length validator
	if (strlen($_POST['password']) > 12 || strlen($_POST['password']) < 5) {
		die ('Password must be between 5 and 12 characters long.<br><a href="../register.php">Back</a>');
	}

	//username lenghth validator
	if (strlen($_POST['username']) > 12 || strlen($_POST['username']) < 3) {
		die ('Username must be between 3 and 12 characters long.<br><a href="../register.php">Back</a>');
	}
	//invalid names validator
	if (preg_match('/[A-Za-z]+/', $_POST['firstName']) == 0) {
    	die ('First Name is not valid!<br><a href="../register.php">Back</a>');
	}
	if (preg_match('/[A-Za-z]+/', $_POST['middleName']) == 0) {
    	die ('Middle Name is not valid!<br><a href="../register.php">Back</a>');
	}
	if (preg_match('/[A-Za-z]+/', $_POST['lastName']) == 0) {
    	die ('Last Name is not valid!<br><a href="../register.php">Back</a>');
	}

	//email validator
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	die ('Email is not valid!<br><a href="../register.php">Back</a>');
	}
	

// We need to check if the account with that username exists
	$query ="SELECT * FROM users WHERE username = '$username'"; 
	$result = mysqli_query($register->conn, $query);
	$resultcheck = mysqli_num_rows($result);
	
	if ($resultcheck > 0){
		// Username already exists
		$register->url("../signup.php?signup=usertaken");
		exit();
	} else {
		$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
		// Username doesnt exists, insert new account
		$query = "INSERT INTO users (username, password) VALUES ($username, $password)";
			// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.		
	}

	$query ="INSERT INTO personalinfo (user_id, firstName, middleName, lastName, address, email,  contactNumber) VALUES (LAST_INSERT_ID(),$firstName, $middleName, $lastName, $address, $email, $sontactNumber)";
			$result = mysqli_query($register->conn, $query);
			header("Location: ../login.php");
}else{
	$register->url("../register.php");
	exit();
}
?>
