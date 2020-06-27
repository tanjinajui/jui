<?php include "db.php";?>
<?php include "header.php";?>

	<?php

	$message = "";
	$welcome = "";
	$max = 12;
	$min = 4;

	//Let's think about that this are the admin users who already registered in our platform.....
	$users = array("admin", "robot", "tanjinajui", "tanjina", "rayhan", "students" ); 

	if (isset($_POST['login-btn'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		//Validation---konkiso check korte
		if (strlen($username)< $min) {
			$message = '<div class = "alert alert-danger">Username is too Small</div>';
		}
		if (strlen($username)> $max) {
			$message = '<div class = "alert alert-danger">Username is too Big</div>';
		}
		if (!in_array($username, $users)) {
			$welcome = '<div class = "alert alert-danger">Username does not exist</div>';
		}else{
			$welcome = '<div class = "alert alert-success">Welcome to the Dashboard ' . $username .' </div>';
		}
	}
	?>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<?php
						echo $message;
						echo $welcome;
					?>
				</div>
			</div>
		</div>
	</section>


<?php include "footer.php";?>