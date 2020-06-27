<?php include "db.php";?>
<?php include "header.php";?>
<?php include "functions.php";?>

			<?php
			  //To Read all the information of an user-----
			  if (isset($_GET['update'])) {
			  	$user_id = $_GET['update'];
			  	$query = "SELECT * FROM users WHERE user_id = $user_id";
			  	$select_user_id = mysqli_query($connect, $query);
			  	while ($row = mysqli_fetch_assoc($select_user_id)) {
			  		$user_id = $row ['user_id'];
			  		$username = $row ['username'];
			  		$password = $row ['password'];
			  		$user_email = $row ['user_email'];
			  		$user_phone = $row ['user_phone'];
			  		$user_address = $row ['user_address'];
			  		?>
<section class="login-section">
	<div class="container">
		<div class="row">
			<div class="col-md-4 offset-md-4">
				<div class="login-box">
					<h3>Update Users Informations</h3>
						<form action="" method="POST">
						<!-- Username field -->
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="username" class="form-control" value="<?php echo $username?>" autocomplete="off" required="required">
							</div>
							<!-- Password field -->
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control" value="<?php echo $password?>"autocomplete="off" required="required">
							</div>
							<!-- Email Address field -->
							<div class="form-group">
					            <label>Email Address</label>
					            <input type="text" name="email" class="form-control" value="<?php echo $user_email?>"autocomplete="off" required="required">
					        </div>
					        <!-- User Phone Number field -->
					         <div class="form-group">
					            <label>Phone Number</label>
					            <input type="text" name="phone" class="form-control" value="<?php echo $user_phone?>"autocomplete="off" required="required">
					        </div>
					        <!-- User Address field -->
					        <div class="form-group">
					           	<label>Address</label>
					            <input type="text" name="address" class="form-control" value="<?php echo $user_address?>"autocomplete="off" required="required">
					        </div> 
					        <!-- Register button field -->
							<div class="form-group">
							<input type="submit" name="update" class="btn btn-primary" value="Update User Info">
							</div>
					</form>										
				</div>						
			</div>
	    </div>
    </div>
</section>


			  		<?php
			  	}
			  }

			?>


<?php

	//updateUser();
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
?>


<?php include "footer.php";?>