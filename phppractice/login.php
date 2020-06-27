<?php include "db.php";?>
<?php include "header.php";?>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<h1>Administrator Login</h1>
					<form action="thankyou.php" method="POSt">
						<div class="form-group">
							<label>User Name</label>
							<input type="text" name="username" class="form-control" autocomplete="off" required="required">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="text" name="password" class="form-control" autocomplete="off" required="required">
						</div>
						<div class="form-group">
							<button type="login" class="btn btn-primary" name = "login-btn">Login</button>

						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

<?php include "footer.php";?>