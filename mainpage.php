<?php  

session_start();

if (!isset($_SESSION['username'])) {
	header('Location: index.php');
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
						<a class="nav-link" href="#">Logged in as: <span style="color: #000;"><?php echo $_SESSION['username']; ?></span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php?logout=1">Log Out</a>
					</li>
				</ul>
					
			</div>
		</nav>

		<section class="note_section">
			<div class="container">
				<div class="row">
					<div class="col-9 mx-auto">
						<div class="notepad">
							<div class="actionBtns d-flex justify-content-between">
								<button type="button" class="btn btn-primary" id="add_note">Add New Note</button>
								<button type="button" class="btn btn-warning" id="edit_note">Edit</button>
								<button type="button" class="btn btn-danger" id="del_note">Delete</button>
								<button type="button" class="btn btn-success" id="all_done">Done</button>
							</div>
						</div>

						<div class="textArea">
							<form>
								<textarea name="" id=""></textarea>
							</form>
						</div>

						<div class="all_notes" id="notes">
							<!-- Add Ajax Call to PHP -->
							<!-- <div class="note">
								<p>
									<strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, obcaecati?</strong>
									<small>&mdash; May 30, 2018 @ 07:10:59 PM</small>
								</p>

								<p>
									<strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, obcaecati?</strong>
									<small>&mdash; May 30, 2018 @ 07:10:59 PM</small>
								</p>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</section>


		
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