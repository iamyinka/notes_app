<?php
session_start();

include 'db/db.php';

$login_email = $_POST['login_username'];
$login_pwd = $_POST['login_pwd'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$errors = '';
	$missing_email = '<p>Email field cannot be blank</p>';
	$missing_pwd = '<p>Password field cannot be blank</p>';
	$invalid_email = '<p>Sorry! The email address is not registered. Please <a href="signup.php">Register</a> first. </p>';
	$wrong_pwd = '<p>Wrong Email &amp; Password combination. Please ensure you typed in the correct password.</p>';

	if (empty($login_email)) {
		$errors .= $missing_email;
	} else {
		$login_email = filter_var($login_email, FILTER_SANITIZE_EMAIL);
	}

	if (empty($login_pwd)) {
		$errors .= $missing_pwd;
	}

	if ($errors) {
		$result_message = "<div class='alert alert-danger'>{$errors}</div>";
		echo $result_message;
	}

	else {
		$login_email = mysqli_real_escape_string($link, $login_email);
		$login_pwd = mysqli_real_escape_string($link, $login_pwd);
		$login_pwd = hash('sha256', $login_pwd);

		$sql = "SELECT * FROM users WHERE activation = 'activated'";
		$result = mysqli_query($link, $sql);

		while ($row = mysqli_fetch_array($result)) {
		    if ($login_email !== $row['email']) {
		    	echo "<div class='alert alert-danger'>{$invalid_email}</div>";
		    } elseif ($login_pwd !== $row['password']) {
		    	echo "<div class='alert alert-danger'>{$wrong_pwd}</div>";
		    } else {
		    	$_SESSION['user_id'] = $row['id'];
		    	$_SESSION['username'] = $row['username'];
		    	$_SESSION['email'] = $row['email'];

		    	if (!isset($_POST['rememberme'])) {
		    		echo 'success';
		    	} else {

		    	}
		    }
		}

	}
	

	
}

?>