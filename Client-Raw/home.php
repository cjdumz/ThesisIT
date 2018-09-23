<?php
// check to see if the user is logged in
if ($_SESSION['loggedin']) {
	// user is logged in
	echo 'Welcome ' . $_SESSION['name'] . '! how are you?';
} else {
	// user is not logged in, send the user to the login page
	header('Location: index.html');
}
?>