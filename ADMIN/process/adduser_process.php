<?php
// Change this to your connection info.
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'thesis';
// Try and connect using the info above.
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if (isset($_POST['reg_user'])) {
if ($mysqli->connect_errno) {
	// If there is an error with the connection, stop the script and display the error.
	die ('Failed to connect to MySQL: ' . $mysqli->connect_errno);
}
// // Now we check if the data was submitted, isset will check if the data exists.
// if (!isset($_POST['username'], $_POST['password'])) {
// 	// Could not get the data that should have been sent.
// 	die ('Please complete the registration form.<br><a href="../accountmanagement.php">Back</a>');
// }
// // Make sure the submitted registration values are not empty.
// if (empty($_POST['username']) || empty($_POST['password'])) {
// 	// One or more values are empty...
// 	die ('Please complete the registration form.<br><a href="../accountmanagement.php">Back</a>');
// }
//Additional Validators
	//ivalid characters validator
	if (preg_match('/[A-Za-z0-9]+/', $_POST['bodyType']) == 0) {
    	die ('<a href="../accountmanagement.php">Back</a>');
	}
	//password length validator
	if (strlen($_POST['password']) > 12 || strlen($_POST['password']) < 5) {
		die ('Password must be between 5 and 12 characters long.<br><a href="../accountmanagement.php">Back</a>');
	}

	//username lenghth validator
	if (strlen($_POST['username']) > 12 || strlen($_POST['username']) < 3) {
		die ('Username must be between 3 and 12 characters long.<br><a href="../accountmanagement.php">Back</a>');
	}
	//invalid names validator
	if (preg_match('/[A-Za-z]+/', $_POST['firstName']) == 0) {
    	die ('First Name is not valid!<br><a href="../accountmanagement.php">Back</a>');
	}
	if (preg_match('/[A-Za-z]+/', $_POST['middleName']) == 0) {
    	die ('Middle Name is not valid!<br><a href="../accountmanagement.php">Back</a>');
	}
	if (preg_match('/[A-Za-z]+/', $_POST['lastName']) == 0) {
    	die ('Last Name is not valid!<br><a href="../accountmanagement.php">Back</a>');
	}

	//email validator
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	die ('Email is not valid!<br><a href="../accountmanagement.php">Back</a>');
	}
	

// We need to check if the account with that username exists
if ($stmt = $mysqli->prepare('SELECT id, password FROM users WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute(); 
	$stmt->store_result(); 
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		echo 'Username exists, please choose another!<br><a href="accountmanagement.html">Back</a>';
	} else {
		// Username doesnt exists, insert new account
		
		if ($stmt = $mysqli->prepare('INSERT INTO users (username, password) VALUES (?, ?)')) {
			// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$stmt->bind_param('ss', $_POST['username'], $password);
			$stmt->execute();
			header("Location: ../login.php");
		} else {
			echo 'Could not prepare statement!';
		}
	}
	$stmt->close();
} else {
	echo 'Could not prepare statement!';
}

if($stmt = $mysqli->prepare('INSERT INTO personalinfo (user_id, firstName, middleName, lastName, address, email,  contactNumber) VALUES (LAST_INSERT_ID(),?, ?, ?, ?, ?, ?)')) {
			$stmt->bind_param('ssssss', $_POST['firstName'], $_POST['middleName'], $_POST['lastName'], $_POST['address'], $_POST['email'], $_POST['contactNumber']);
			$stmt->execute();
			header("Location: ../login.php");
		} else {
			echo 'Could not prepare statement!';
		}


$mysqli->close();
}
?>