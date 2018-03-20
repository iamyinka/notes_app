<?php 

include 'db/db.php'; 


// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$errors = '';
	$missing_email = '<p>Recovery Email field cannot be blank</p>';

	if ($_POST['forgetPwdEmail'] == '') {
		$errors .= $missing_email;
	} else {
		$recovery_email = filter_var($_POST['forgetPwdEmail'], FILTER_SANITIZE_EMAIL);
	}

	if (!empty($errors)) {
		$result_message = "<div class='alert alert-danger'>{$errors}</div>";
		echo $result_message;
	} else {
		$recovery_email = mysqli_real_escape_string($link, $recovery_email);

		$sql = "SELECT * FROM users WHERE email = '$recovery_email'";
		$result = mysqli_query($link, $sql);

		if (!$result) {
			echo "<div class='alert alert-danger'>Error Occured! Please try again later.</div>";
		} else {
			$count = mysqli_num_rows($result);

			if (!$count) {
				echo "<div class='alert alert-danger'>Sorry! This is not a registered email on this site.</div>";
			} else {
				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				$user_id = $row['id'];
				$reset_key = bin2hex(openssl_random_pseudo_bytes(20));
				$updated_at = time();
				$status = 'pending';

				$sql = "INSERT INTO forgotpassword(user_id, resetkey, updated_at, status) VALUES('$user_id', '$reset_key', '$updated_at', '$status')";
				$result = mysqli_query($link, $sql);

				if(!$result) {
					echo "<div class='alert alert-danger'>Error Occured! Please try again later.</div>";
					echo "Error: " . mysqli_error($link);
				} else {
					$message = "Please follow the link below to reset your account access\n\n";
					$message .= "http://sandbox.me/notes_app/resetpassword.php?user_id=$user_id&activation=$reset_key";

					if (mail($recovery_email, "Reset Your Account Access", $message, "From: netguru@netguru.com")) {
						echo "<div class='alert alert-success'>Yay! A password reset link has been sent to your email. Please follow the link to recover your password.</div>";
					} else {
						echo "<div class='alert alert-danger'>Error: Your request could not be processed.</div>";
					}
				}
			}
		}
	}

	
	// $recovery_email = mysqli_real_escape_string($link, $recovery_email);

	// $sql = "SELECT * FROM users WHERE email = '$recovery_email'";
	// $result = mysqli_query($link, $sql);

	// if (!$result) {
	// 	echo "<div class='alert alert-danger'>Error Occured! Please try again later.</div>";
	// }

	// $count = mysqli_num_rows($result);

	// if (!$count) {
	// 	echo "<div class='alert alert-danger'>Sorry! This is not a registered email on this site.</div>";
	// }

	// $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	// $user_id = $row['id'];
	// $reset_key = bin2hex(openssl_random_pseudo_bytes(20));
	// $updated_at = time();
	// $status = 'pending';

	// $sql = "INSERT INTO forgotpassword(`user_id`, `resetkey`, `time`, `status`) VALUES('$user_id', '$reset_key', '$updated_at', '$status')";
	// $result = mysqli_query($link, $sql);

	// if(!$result) {
	// 	echo "<div class='alert alert-danger'>Error Occured! Please try again later.</div>";
	// } else {
	// 	$message = "Please follow the link below to reset your account access\n\n";
	// 	$message .= "http://sandbox.me/notes_app/resetpassword.php?email=" . urlencode($recovery_email) . "&activation=$new_activation_key";

	// 	if (mail($recovery_email, "Reset Your Account Access", $message, "From: netguru@netguru.com")) {
	// 		echo "<div class='alert alert-success'>Yay! A password reset link has been sent to your email. Please follow the link to recover your password.</div>";
	// 	} else {
	// 		echo "<div class='alert alert-danger'>Error: Your request could not be processed.</div>";
	// 	}
	// }


	// if (!$result) {
	// 	echo "<div class='alert alert-danger'>Error Occured!</div>";
	// } else {
	// 	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	// 	$email = $row['email'];

	// 	if ($recovery_email !== $email) {
	// 		echo "<div class='alert alert-danger'>Sorry! This is not a registered email on this site.</div>";
	// 	} else {
	// 			$message = "Please follow the link below to reset your account access\n\n";
	// 			$message .= "http://sandbox.me/notes_app/resetpassword.php?email=" . urlencode($recovery_email) . "&activation=$new_activation_key";

	// 			if (mail($recovery_email, "Reset Your Account Access", $message, "From: netguru@netguru.com")) {
	// 				echo "<div class='alert alert-success'>Yay! A password reset link has been sent to your email. Please follow the link to recover your password.</div>";		
	// 			}
	// 		}
	// }

// }

?>