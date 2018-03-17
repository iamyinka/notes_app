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
			<a class="navbar-brand" href="#">Writer's App</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="#">Profile</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Contact</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Help</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="#">Notes <span class="sr-only">(current)</span></a>
					</li>
					
				</ul>

				<ul class="navbar-nav navbar-right">
					
					<li class="nav-item">
						<a class="nav-link" href="#">Logged in as: <span style="color: #000;">netguru01</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Log Out</a>
					</li>
				</ul>
					
			</div>
		</nav>

		<section class="profile_section">
			<div class="container">
				<div class="row">
					<div class="col-6 mx-auto">
						<div class="profile">
							<h2>General Account Settings</h2>
							<table class="table table-responsive table-striped table-bordered table-hover">
								<tbody>
									<tr data-target="#updateUsername" data-toggle="modal">
										<th>Username</th>
										<td>Value</td>
									</tr>

									<tr data-target="#updateEmail" data-toggle="modal">
										<th>Email Address</th>
										<td>Value</td>
									</tr>

									<tr data-target="#updatePwd" data-toggle="modal">
										<th>Password</th>
										<td>Hidden</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Update username -->
				<div class="modal fade" id="updateUsername">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									<span class="sr-only">Close</span>
								</button>
								<h4 class="modal-title">Edit Username</h4>
							</div>
							<div class="modal-body">
								<form>
									<fieldset class="form-group">
										<label for="username">Username</label>
										<input type="text" class="form-control" id="username" placeholder="Username Value">
									</fieldset>
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<input type="submit" class="btn btn-primary" name="updateusername" value="Update Username">
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->


				<!-- Update Email -->
				<div class="modal fade" id="updateEmail">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									<span class="sr-only">Close</span>
								</button>
								<h4 class="modal-title">Edit Email</h4>
							</div>
							<div class="modal-body">
								<form>
									<fieldset class="form-group">
										<label for="email">Email</label>
										<input type="email" class="form-control" id="email" placeholder="Email Value">
									</fieldset>
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<input type="submit" class="btn btn-primary" name="update-email" value="Update Email">
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->


				<!-- Update Email -->
				<div class="modal fade" id="updatePwd">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									<span class="sr-only">Close</span>
								</button>
								<h4 class="modal-title">Edit Password</h4>
							</div>
							<div class="modal-body">
								<form>
									<fieldset class="form-group">
										<label for="current_password">Current Password</label>
										<input type="password" class="form-control" id="current_password" name="current_password" placeholder="Your Current Password">
									</fieldset>
								</form>

								<form>
									<fieldset class="form-group">
										<label for="password">New Password</label>
										<input type="password" class="form-control" id="password" name="password" placeholder="Your New Password">
									</fieldset>
								</form>

								<form>
									<fieldset class="form-group">
										<label for="password2">Confirm New Password</label>
										<input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Your New Password">
									</fieldset>
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<input type="submit" class="btn btn-primary" name="update-email" value="Update Password">
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
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
		<script type="text/javascript" src="js/app.js"></script>
	</body>
</html>