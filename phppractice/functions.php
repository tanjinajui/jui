<?php include "db.php"?>
<?php
	//Register a New user To Our Platform---
    //$successmessage = "";
	$message = "";
	function createUser(){
	global $connect;
	$max 	 = 12;
	$min     = 4;
	if (isset($_POST['register'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email 	  = $_POST['email'];
		$phone    = $_POST['phone'];
		$address  = $_POST['address'];

		$username = mysqli_real_escape_string($connect, $username);
		$password = mysqli_real_escape_string($connect, $password);
		$email = mysqli_real_escape_string($connect, $email);
		$phone = mysqli_real_escape_string($connect, $phone);
		$address = mysqli_real_escape_string($connect, $address);

		//Encrypted Password (sha1 dile password secure)
		$hassedPass = sha1($password);

		//PHP a database connect check query
		$query = "INSERT INTO users (username, password, user_email, user_phone, user_address) VALUES ('$username', '$hassedPass', '$email', '$phone', '$address')";
		$create_new_user = mysqli_query($connect, $query);
		if (!$create_new_user) {
			die("Query Faild!" . mysqli_error($connect));
		}else{
			//Register Success message---
			//$successmessage = '<div class = "alert alert-success">Congratulations! New User Registration Successfully.</div>';
			header("Location: all_users.php");
		}
		//Username validation--
		if (strlen($username) < $min) {
			$message = '<div class = "alert alert-danger">Username is too small</div>';
		}
		if (strlen($username) > $max) {
			$message = '<div class = "alert alert-danger">Username is too Big</div>';
		}
	}
}
	 
		echo $message;
		//echo $successmessage;
//Delete User Information form the all users table--
function deleteUser(){
	global $connect;
	if (isset($_GET['delete'])) {
		$the_user_id = $_GET['delete'];
		$query = "DELETE FROM users WHERE user_id = $the_user_id";
		$delete_user = mysqli_query($connect, $query);
		header ("Location: all_users.php");
	}
}

//To Update the User Info Into the Database
/*function updateUser(){
	global $connect;
	if (isset($_POST['update'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		//Encrypted Password
		$hassedPass = sha1($password);
		$query = "UPDATE users SET username = '$username', password = '$hassedPass', user_email = '$email', user_phone = '$phone', user_address = '$address' WHERE 	user_id = '$user_id'";
		$update_query = mysqli_query($connect, $query);
		if (!$update_query) {
			die("Query Failed". mysqli_error($connect));
		}else{
			header("Location: all_users.php");
			}
		}
	}*/
?>
	