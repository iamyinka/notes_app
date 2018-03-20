<?php  

session_start();

if (!isset($_SESSION['username']) || $_GET['logout'] == 1) {
	session_destroy();
} else {
	header('Location: mainpage.php');
}

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Notes App</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<link rel="stylesheet" href="css/main.css">
	</head>
	<body>

				        
		<nav class="navbar navbar-expand-md navbar-dark bg-primary mb-4">
			<a class="navbar-brand" href="./">Writer's App</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="./">Home <span class="sr-only">(current)</span></a>
					</li>
					<!-- <li class="nav-item">
						<a class="nav-link" href="#">Link</a>
					</li> -->
					
				</ul>

				<ul class="navbar-nav navbar-right">
					<li class="nav-item">
						<a class="nav-link" href="#" data-target="#loginForm" data-toggle="modal" data-dismiss="modal">Log In</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Contact</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Help</a>
					</li>
				</ul>
					
			</div>
		</nav>

		<section class="hero">
			<div class="container">
				<div class="intro">
					<h1>Online Writer's App</h1>

					<p>Your notes with you everywhere you go!</p>

					<p>Easy to you! Security for all your important notes</p>
					<a href="" class="btn btn-custom" data-target="#signUpForm" data-toggle="modal">Get Started &raquo;</a>
				</div>
			</div>
		</section>


		<!-- Sign Up Form -->
			
		<div class="modal fade" id="signUpForm">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									<span class="sr-only">Close</span>
								</button>
								<h4 class="modal-title">Sign up to get started</h4>
							</div>
							<div class="modal-body">
								<div id="signUpMsg">
									<!-- Sign Up Alert Messages Here -->
								</div>
								<form method="post" id="signUpForm1">
									<fieldset class="form-group">
										<label for="username">Username</label>
										<input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
									</fieldset>

									<fieldset class="form-group">
										<label for="email">Email</label>
										<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address">
									</fieldset>

									<fieldset class="form-group">
										<label for="pwd">Password</label>
										<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter Password">
									</fieldset>

									<fieldset class="form-group">
										<label for="pwd2">Confirm Password</label>
										<input type="password" class="form-control" id="pwd2" name="pwd2" placeholder="Enter Password Again">
									</fieldset>

									<input type="submit" class="btn btn-primary" value="Sign Up" name="submit">
								</form>
							</div>
							<div class="modal-footer">
								<!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Exit</button> -->
								<button type="button" class="btn btn-success" data-target="#loginForm" data-toggle="modal" data-dismiss="modal">Log In</button>
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->


				<!-- Login Form -->

				<div class="modal fade" id="loginForm">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									<span class="sr-only">Close</span>
								</button>
								<h4 class="modal-title">Sign In</h4>
							</div>
							<div class="modal-body">
								<div id="loginMsg">
									<!-- Log In Alert Messages Here -->
								</div>
								<form method="post" id="loginForm1">
									<fieldset class="form-group">
										<label for="login_username">Email</label>
										<input type="email" class="form-control" id="login_email" name="login_email" placeholder="Enter Email">
									</fieldset>

									<fieldset class="form-group">
										<label for="login_pwd">Password</label>
										<input type="password" class="form-control" id="login_pwd" name="login_pwd" placeholder="Enter Password">
									</fieldset>

									<div class="checkbox">
										<label>
											<input type="checkbox" id="rememberme" name="rememberme"> Remember Me
										</label>
									</div>

									<input type="submit" class="btn btn-primary" value="Log In" name="login_btn" id="login_btn">

								</form>
							</div>
							<div class="modal-footer d-flex justify-content-center">
								<a href="#" data-dismiss="modal" data-target="#forgotPwdForm" data-toggle="modal">Forgot Your Password?</a>
								<button type="button" class="btn btn-secondary" data-dismiss="modal" data-target="#signUpForm" data-toggle="modal">Sign Up</button>
								
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
				


				<!-- Forgot Password Form -->

				<div class="modal fade" id="forgotPwdForm">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									<span class="sr-only">Close</span>
								</button>
								<h4 class="modal-title">Reset Your Password</h4>
							</div>
							<div class="modal-body">
								<div id="forgotPwdMsg">
									<!-- Forgot Password Alert Messages Here -->
								</div>
								<form method="POST" id="forgotPwdForm1">
									<fieldset class="form-group">
										<label for="forgetPwdEmail">Email</label>
										<input type="email" class="form-control" id="forgetPwdEmail" name="forgetPwdEmail" placeholder="Enter Your Email">
									</fieldset>
									<input type="submit" class="btn btn-primary" value="Send My Password">
								</form>
							</div>
							<div class="modal-footer d-flex justify-content-center">
								<button type="button" class="btn btn-secondary" data-dismiss="modal" data-target="#loginForm" data-toggle="modal">Log in</button>
								
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->

		<footer>
			<div class="container">
				<p><a href="https://iamyinka.com">Yinka Ashafa</a> &copy; 2018 &mdash; All Rights Reserved</p>
			</div>
		</footer>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
		<script type="text/javascript" src="js/app.js"></script>
	</body>
</html>