<?php  
session_start();

include 'db/db.php';

$email = $_POST['login_email'];
$password = $_POST['login_pwd'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = '';
	$missing_email = '<p>Email field cannot be blank</p>';
	$missing_pwd = '<p>Password field cannot be blank</p>';
	$invalid_email = '<p>Sorry! The email address is not registered. Please <a href="signup.php">Register</a> first. </p>';
	$wrong_pwd = '<p>Wrong Email &amp; Password combination. Please ensure you typed in the correct login details.</p>';

	if (empty($email)) {
		$errors .= $missing_email;
	} else {
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	}

	if (empty($password)) {
		$errors .= $missing_pwd;
	} else {
		$password = filter_var($password, FILTER_SANITIZE_STRING);
	}

	if ($errors) {
		$result_message = "<div class='alert alert-danger'>{$errors}</div>";
		echo $result_message;
	} 
	else {
		$email = mysqli_real_escape_string($link, $email);
		$password = mysqli_real_escape_string($link, $password);
		$password = hash('sha256', $password);

		$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password' AND activation = 'activated'";
		$result = mysqli_query($link, $sql);

		if (mysqli_num_rows($result) === 0) {
			echo "<div class='alert alert-danger'>{$wrong_pwd}</div>";
		} else {
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

			$_SESSION['username'] = $row['username'];
	    $_SESSION['email'] = $row['email'];
	    $_SESSION['password'] = $row['password'];
	    $_SESSION['user_id'] = $row['id'];

	    echo 'success';
		}
	}
}


?>