<?php include "header.php"; ?>
<?php include "db.php"; ?>
<?php include "function.php"; ?>
	

<?php

//To read all the information of an user--
if (isset($_GET['update'])) {
	$user_id = $_GET['update'];
	//$_GET method a data check--
	//echo $user_id;
	$query = "SELECT * FROM user WHERE user_id = $user_id";
	$select_user_id = mysqli_query($connect, $query);

	while ($row = mysqli_fetch_assoc($select_user_id)) {
		$user_id = $row['user_id'];
		$username = $row['username'];
		$password = $row['password'];
		$user_email = $row['user_email'];
		$user_phone = $row['user_phone'];
		$user_address = $row['user_address'];

		echo $user_id . "<br>". $username . "<br>". $user_email;


?>

	<section class="registraion-section">
		<div class="container">
			<div class="row">
				<div class="col-md-4 offset-md-4">
					<div class="registration-box">
						<h3>Update Users Informations</h3>
					<form action="" method="POST">
						<!-- Username field -->
						<div class="form-group">
							<label>User Name</label>
							<input type="text" name="username" class="form-control" value="<?php echo $username?>" autocomplete="off" required="required">
						</div>

						<!-- Password field -->
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" value="<?php echo $password?>" autocomplete="off" required="required">
						</div>

						<!-- Email Address field -->
						<div class="form-group">
            				<label>Email Address</label>
            				<input type="text" name="email" class="form-control" value="<?php echo $user_email?>" autocomplete="off" required="required">
          				</div>

          				<!-- User Phone Number field -->
          				<div class="form-group">
            				<label>Phone Number</label>
            				<input type="text" name="phone" class="form-control" value="<?php echo $user_phone?>" autocomplete="off" required="required">
          				</div>

          				<!-- User Address field -->
          				<div class="form-group">
            				<label>Address</label>
            				<input type="text" name="address" class="form-control" value="<?php echo $user_address?>" autocomplete="off" required="required">
          				</div> 

          				<!-- Register button field -->
						<div class="form-group">
							<button type="submit" class="btn btn-primary" name="update">Update new users info</button>
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
updateUser();?>




<?php include "footer.php"; ?>


