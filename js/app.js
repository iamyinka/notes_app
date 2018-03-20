$(document).ready(function($) {
	// Sign Up Form
	$('#signUpForm1').submit(function(e) {
		// Prevent Default Form Process
		e.preventDefault();

		// Collect User Inputs
		var dataToPost = $(this).serializeArray();
		console.log(dataToPost);
		

		// AJAX call to Sign Up URL

		$.ajax({
			url: 'signup.php',
			type: 'POST',
			dataType: '',
			data: dataToPost,
		})

		// If Ajax Call Successful
		.done(function(data) {
			if(data) {
				$('#signUpMsg').html(data);
				// console.log("success");
			}
		})

		// If Ajax Call Unsuccessful
		.fail(function() {
			$('#signUpMsg').html("<div class='alert alert-danger'> There was an error with the AJAX call. Please try again later. </div>");
			// console.log("error");
		})
		
		
	});


	// LOG IN FORM
	$('#loginForm1').submit(function(event) {
		/* Act on the event */
		event.preventDefault();

		var loginData = $(this).serializeArray();

		// console.log(loginData);

		$.ajax({
			url: 'login.php',
			type: 'POST',
			dataType: '',
			data: loginData,
		})
		.done(function(data) {
			if(data == 'success'){
				window.location = 'mainpage.php';
				console.log("success");
			} else {
				$('#loginMsg').html(data);
			}
		})
		.fail(function() {
			$('#loginMsg').html("<div class='alert alert-danger'> There was an error with the AJAX call. Please try again later. </div>");
			console.log("error");
		})
		// .always(function() {
		// 	console.log("complete");
		// });
		
	});


	// FORGOT PASSWORD FORM

	$('#forgotPwdForm1').submit(function(event) {
		/* Act on the event */
		event.preventDefault();

		var dataToPost = $(this).serializeArray();

		$.ajax({
			url: 'forgotpassword.php',
			type: 'POST',
			dataType: '',
			data: dataToPost,
		})
		.done(function(data) {
			$('#forgotPwdMsg').html(data);
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});


	// RESET PASSWORD FORM

	$('#resetPwdForm').submit(function(event) {
		/* Act on the event */
		event.preventDefault();

		var dataToPost = $(this).serializeArray();

		$.ajax({
			url: 'storeresetpassword.php',
			type: 'POST',
			dataType: '',
			data: dataToPost,
		})
		.done(function(data) {
			$('#resetPwdFormMsg').html(data);
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});

});