<?php include "db.php" ?>
<?php

		function createUser(){
		global $connect;
		$successmessage = "";
		$message 		= "";
		$welcome = "";
		$max = 12;
		$min = 4;
		//Let's think about that this are the admin users who already registered in our platform.....
		$users = array("admin", "robot", "tanjinajui", "tanjina", "sayon", "students" ); 
		//Register to database data send---
		if (isset($_POST['register'])) {
			$username    = $_POST['username'];
			$password    = $_POST['password'];
			$email       = $_POST['email'];
			$phone       = $_POST['phone'];
			$address     = $_POST['address'];

			
			//Encrypted Password
			$hassedPass = sha1($password);

			//PHP a database connect check query

			$query = "INSERT INTO user(username, password, user_email, user_phone, user_address) VALUES ('$username', '$hassedPass', '$email', '$phone', '$address')";
			$create_new_user = mysqli_query($connect, $query);
			if (!$create_new_user) {
			die("Query Faild!" . mysqli_error($connect));

			}else{
			//Register Success message---
			$successmessage = '<div class = "alert alert-success">Congratulations! New User Registration Successfully.</div>';
				echo $successmessage;
		//User Name Validation ---	
		if (strlen($username)< $min) {
			$message = '<div class = "alert alert-danger">Username is too Small</div>';
			echo $message;
		}
		if (strlen($username)> $max) {
			$message = '<div class = "alert alert-danger">Username is too Big</div>';
			echo $message;
		}
		if (!in_array($username, $users)) {
			$welcome = '<div class = "alert alert-danger">Username does not exits</div>';
		}	
			echo $welcome;
			
		}

		}
		}



//To update the User Information into the Database
function updateUser(){
	global $connect;
	if (isset($_POST['update'])) {
	$username    = $_POST['username'];
	$password    = $_POST['password'];
	$email       = $_POST['email'];
	$phone       = $_POST['phone'];
	$address     = $_POST['address'];
	//Encrypted Password
	$hassedPass = sha1($password);

	$query = "UPDATE user SET username = '$username', password = '$hassedPass', user_email = '$email', user_phone = '$phone', user_address = '$address' WHERE user_id = '$user_id' ";

	$update_query = mysqli_query($connect, $query);

	if (!$update_query) {
		die("Query Failed" . mysqli_error($connect));
	}
	else{
		header("Location: all-users-show.php");
	}
}
}


function deleteUser(){
	global $connect;
	if (isset($_GET['delete'])) {
  $the_user_id = $_GET['delete'];
  $query = "DELETE FROM user WHERE user_id = $the_user_id";
  $delete_user = mysqli_query($connect, $query);
  header("Location: all-users-show.php");
}

}

	?>

	