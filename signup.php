<?php
session_start();  // Start Session

include 'db/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Create Variables for User Input
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['pwd'];
	$password2 = $_POST['pwd2'];

	// Variable for Possible Error Messages
	$missing_username = "<p><strong>Please provide a username</strong></p>";
	$invalid_username = "<p><strong>Username cannot be less than 6 &amp; more than 30 letters</strong></p>";
	$missing_email = "<p><strong>Email field cannot be blank</strong></p>";
	$invalid_email = "<p><strong>Please provide a valid email address</strong></p>";
	$missing_pwd = "<p><strong>Password field cannot be blank</strong></p>";
	$invalid_pwd = "<p><strong>Password cannot be less than 6 letters &amp; numbers (including at least a Captial letter and a number)</strong></p>";
	$missing_pwd2 = "<p><strong>Password Confirmation field cannot be blank</strong></p>";
	$different_pwd = "<p><strong>Password &amp; Password Confirmation field does not match.</strong></p>";

	
	$errors = '';

	// Possible Username Field Errors

	if (empty($username)) {
		$errors .= $missing_username;
	} else {
		if (strlen($username) < 6) {
			$errors .= $invalid_username;
		} else {
			$username = filter_var($username, FILTER_SANITIZE_STRING);
		}
	}

	// Possible Email Field Errors

	if (empty($email)) {
		$errors .= $missing_email;
	} else {
		$email = filter_var($email, FILTER_VALIDATE_EMAIL);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errors .= $invalid_email;
		}
	}

	// Possible Passwords Field Errors

	if (empty($password)) {
		$errors .= $missing_pwd;
	} elseif (!(strlen($password) > 6 && preg_match('/[A-Z]/', $password) && preg_match('/[0-9]/', $password))) {
		$errors .= $invalid_pwd;
	} else {
		$password = filter_var($password, FILTER_SANITIZE_STRING);
	}


	if (empty($password2)) {
		$errors .= $missing_pwd2;
	} else {
		$password2 = filter_var($password2, FILTER_SANITIZE_STRING);
		if ($password !==  $password2) {
			$errors .= $different_pwd;
		}
	}


	// If Any error Occured

	if ($errors) {
		$result_message = "<div class='alert alert-danger'>{$errors}</div>";
		echo $result_message;
	} 

	// If No Errors

	else {
		// CLEAN USER INPUTS FOR DATABASE ENTRY
		$username = mysqli_real_escape_string($link, $username);
		$email = mysqli_real_escape_string($link, $email);
		$password = mysqli_real_escape_string($link, $password);
		// $password = md5($password);
		$password = hash('sha256', $password);

		// PREPARE SQL QUERIES
		$sql = "SELECT * FROM users";
		$result = mysqli_query($link, $sql);

		// Check if username or email is already registered
		while ($row = mysqli_fetch_array($result)) {
		    if ($row['username'] === $username) {
		    	echo "<div class='alert alert-danger'>Sorry but this username already exists.</div>";
		    	exit;
		    }
		    if ($row['email'] === $email) {
		    	echo "<div class='alert alert-danger'>Email Address is already registered.</div>";
		    	exit;
		    }
		}


		$activation_key = bin2hex(openssl_random_pseudo_bytes(16));

		$sql = "INSERT into users(username, email, password, activation) VALUES('$username', '$email', '$password', '$activation_key')";
		$result = mysqli_query($link, $sql);

		if ($result) {
			$message = "Please click on the link below to complete the sign up process\n\n";
			$message .= "http://sandbox.me/notes_app/activate.php?email=" . urlencode($email) . "&activation=" . urlencode($activation_key);
			if (mail($email, "Sign Up Confirmation: Please Validate Your Account", $message, "From: netguru@netguru.com")) {
				$result_message = "<div class='alert alert-success'>Registration Successful. Please check your email to complete the registration process.</div>";
			}
			echo $result_message;
			exit;
		}
	}

}

?>