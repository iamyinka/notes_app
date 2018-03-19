<?php  
session_start();
include 'db/db.php';



if (!isset($_GET['email']) || !isset($_GET['activation'])) {
	echo "Invalid Email / Activation Key";
} else {
	$email = $_GET['email'];
	$email = urldecode($email);
	$activation = $_GET['activation'];

	$email = mysqli_real_escape_string($link, $email);
	$activation = mysqli_real_escape_string($link, $activation);

	$sql = "UPDATE users SET activation = 'activated' WHERE (email = '$email' AND activation = '$activation') LIMIT 1";
	$result = mysqli_query($link, $sql);

	if ($result) {
		echo "<div class='alert alert-success'>Account Activation Successful. Please proceed to login</div>";
		echo '<a href="index.php">Log In &raquo;</a>';
	} else {
		echo "<div class='alert alert-danger'>An Error Occured! You account could not be activated. Please try again later." . mysqli_error($link) . "</div>";
	}
}

?>