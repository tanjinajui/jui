<?php include "header.php"; ?>
<?php include "db.php"; ?>
<?php include "function.php"; ?>
	

	<section class="registraion-section">
		<div class="container">
			<div class="row">
				<div class="col-md-4 offset-md-4">
					<div class="registration-box">
						<h3>Register New User</h3>
					<form action="" method="POST">
						<!-- Username field -->
						<div class="form-group">
							<label>User Name</label>
							<input type="text" name="username" class="form-control" autocomplete="off" required="required">
						</div>

						<!-- Password field -->
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" autocomplete="off" required="required">
						</div>

						<!-- Email Address field -->
						<div class="form-group">
            				<label>Email Address</label>
            				<input type="text" name="email" class="form-control" autocomplete="off" required="required">
          				</div>

          				<!-- User Phone Number field -->
          				<div class="form-group">
            				<label>Phone Number</label>
            				<input type="text" name="phone" class="form-control" autocomplete="off" required="required">
          				</div>

          				<!-- User Address field -->
          				<div class="form-group">
            				<label>Address</label>
            				<input type="text" name="address" class="form-control" autocomplete="off" required="required">
          				</div> 

          				<!-- Register button field -->
						<div class="form-group">
							<button type="submit" class="btn btn-primary" name="register">Submit</button>
						</div>
					</form>
					 <?php createUser();
					 header("Location: admin-login.php");
					 ?>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php include "footer.php"; ?>


