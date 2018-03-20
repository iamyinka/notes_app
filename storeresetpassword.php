<?php  

include 'db/db.php';

// Declare Variables

$user_id = $_POST['user_id'];
$reset_key = $_POST['resetkey'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

// Define Errors

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$errors = '';
	$missing_pwd = "<p><strong>Password field cannot be blank</strong></p>";
	$invalid_pwd = "<p><strong>Password cannot be less than 6 letters &amp; numbers (including at least a Captial letter and a number)</strong></p>";
	$missing_pwd2 = "<p><strong>Password Confirmation field cannot be blank</strong></p>";
	$different_pwd = "<p><strong>Password &amp; Password Confirmation field does not match.</strong></p>";

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
	} else {

		// Clean Variables for SQL Process
		$user_id = mysqli_real_escape_string($link, $user_id);
		$password = mysqli_real_escape_string($link, $password);
		$password = hash('sha256', $password);

		// PREPARE QUERY
		$sql = "UPDATE users SET password = '$password' WHERE id = '$user_id'";
		$result = mysqli_query($link, $sql);

		if (!$result) {
			echo "<div class='alert alert-danger'>Error Occured</div>";
			echo "Error: " . mysqli_error($link);
		} else {
			$sql = "UPDATE forgotpassword SET status = 'used', resetkey = 'nulled' WHERE user_id = '$user_id'";
			$result = mysqli_query($link, $sql);
			if (!$result) {
				echo "<div class='alert alert-danger'>Error Occured</div>";
				echo "Error: " . mysqli_error($link);
			} else {
				echo "<div class='alert alert-success'>Password Reset Successful. Please proceed to <a href='./'>Log In</a></div>";
			}
		}

	}
}



 

// CHECK RESULT

// UPDATE USER's PASSWORD


?>