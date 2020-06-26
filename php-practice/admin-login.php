<?php include "db.php";?>
<?php include "header.php";?>

<?php

	$message = "";
	$welcome = "";
	$max 	 = 12;
	$min     = 4;

	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		//Username Validation---
		if (strlen($username) < $min) {
			$message = '<div class = "alert alert-danger">Username is too small</div>';
		}
		if (strlen($username) > $max) {
			$message = '<div class = "alert alert-danger">Username is too Big</div>';
		}
	}
	?>
<section class="login-section">
	<div class="container">
		<div class="row">
			<div class="col-md-4 offset-md-4">
				<div class="login-box">
					<h3>Admin Login</h3>
					<form action="" method="POST">
						<!-- Username field -->
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" class="form-control">
						</div>

						<!-- Password field -->
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control">
						</div>
						<div class="form-group">
							<button type="login" class="btn btn-primary" name="login">Login</button>
						</div>
					</form>
					<?php
						echo $message;
					?>
				</div>
				
			</div>
		</div>
	</div>
</section>
<?php include "footer.php";?>