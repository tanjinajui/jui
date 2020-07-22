<?php include "includes/header.php"; ?>
  <!-- Begin Page Content -->
  <div class="container-fluid">

  	<?php
  		if ( $_SESSION['role']  == 0 ){
  	?>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">View All Users</h1>

    <?php
    	$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

    	if ( $do == 'Manage' ){ ?>
    			
    		<div class="row">
    			<div class="col-md-12">
    				<!-- All Users Table Start -->	
	              <div class="card shadow mb-4">
	                <div class="card-header py-3">
	                  <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
	                </div>
	                <div class="card-body">
	                	<table class="table">
						  <thead class="thead-dark">
						    <tr>
						      <th scope="col">Sl.</th>
						      <th scope="col">Avater</th>
						      <th scope="col">Full Name</th>
						      <th scope="col">Username</th>
						      <th scope="col">Email ID</th>
						      <th scope="col">Phone</th>
						      <th scope="col">Role</th>
						      <th scope="col">Status</th>
						      <th scope="col">Action</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php

						  		$query = "SELECT * FROM users";
						  		$all_users = mysqli_query($connect, $query);
						  		$i=0;
						  		while ( $row = mysqli_fetch_assoc($all_users) ) {
						  			$id 			= $row['id'];
						  			$name 			= $row['name'];
						  			$username 		= $row['username'];
						  			$password 		= $row['password'];
						  			$email  		= $row['email'];
						  			$phone  		= $row['phone'];
						  			$address  		= $row['address'];
						  			$avater  		= $row['avater'];
						  			$role  			= $row['role'];
						  			$is_active  	= $row['is_active'];
						  			$join_date  	= $row['join_date'];
						  			$i++; 
						  		?>
						  			<tr>
								      <th scope="row"><?php echo $i; ?></th>
								      <td>
								      	<?php
								      		if ( !empty($avater) )
								      		{ ?>
								      			<img src="img/users-avater/<?php echo $avater; ?>" class="user-avater">
								      		<?php }
								      		else
								      		{ ?>
								      			<img src="img/users-avater/default.png" class="user-avater">
								      		<?php }
								      	?>
								      	
								      </td>
								      <td><?php echo $name; ?></td>
								      <td><?php echo $username; ?></td>
								      <td><?php echo $email; ?></td>
								      <td><?php echo $phone; ?></td>
								      <td>
								      	<?php
								      		if ( $role == 0 ){
								      			echo '<span class="badge badge-success">Administrator</span>';
								      		}
								      		else if ( $role == 1 ){
								      			echo '<span class="badge badge-primary">Editor</span>';
								      		}
								      		else{
								      			echo '<span class="badge badge-danger">Suspended</span>';
								      		}
								      	?>
								      </td>
								      <td>
								      	<?php
								      		if ( $is_active == 0 ){
								      			echo '<span class="badge badge-danger">Inactive</span>';
								      		}
								      		else if ( $is_active == 1 ){
								      			echo '<span class="badge badge-success">Active</span>';
								      		}
								      		else{
								      			echo '<span class="badge badge-danger">Suspended</span>';
								      		}
								      	?>
								      </td>
								      <td>
								      	<div class="action-bar">
								      		<ul>
									      		<li><i class="fa fa-eye" data-toggle="modal" data-target="#userProfile<?php echo $id; ?>"></i></li>
									      		<li><a href="users.php?do=Edit&update=<?php echo $id; ?>"><i class="fa fa-edit"></i></a></li>
									      		<li><i class="fa fa-trash" data-toggle="modal" data-target="#exampleModal<?php echo $id; ?>"></i></li>
									      	</ul>
								      	</div>
								      	<!-- User Profile Modal Modal -->
										<div class="modal fade" id="userProfile<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										        <div class="modal-body">
											        <div class="container">
											        	<div class="row">
											        		<div class="col-md-12 text-center">
											        			 <img src="img/users-avater/<?php echo $avater; ?>" class="user-modal-img">												
											        		</div>

											        		<div class="col-md-12">
											        			<table class="table table-dark table-striped table-bordered">
																  <tbody>
																  	<tr>
																      <th scope="col">Full Name</th>
																      <td><?php echo $name; ?></td>
																    </tr>
																    <tr>
																      <th scope="row">Username</th>
																      <td><?php echo $username; ?></td>
																    </tr>	
																    <tr>
																      <th scope="row">Email Address</th>
																      <td><?php echo $email; ?></td>
																    </tr>	
																    <tr>
																      <th scope="row">Phone No.</th>
																      <td><?php echo $phone; ?></td>
																    </tr>
																    <tr>
																      <th scope="row">User Role</th>
																      <td>
																      	<?php 
																	      	if ( $role == 0 ){
																	      			echo '<p class="">Administrator</p>';
																      		}
																      		else if ( $role == 1 ){
																      			echo '<p class="">Editor</p>';
																      		}
																      		else{
																      			echo '<p class="">Suspended</p>';
																      		}
																      	?>
																      	</td>
																    </tr>		
																    <tr>
																      <th scope="row">Join Date</th>
																      <td><?php echo $join_date; ?></td>
																    </tr>									    
																  </tbody>
																</table>
											        		</div>
											        	</div>
											        </div>
										      	</div>
										     </div>
										  </div>
										</div>

								      	<!-- Delete Users Confirmation Modal -->
										<div class="modal fade" id="exampleModal<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLabel">Do You Want to Delete this User?</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										        <div class="container">
										        	<div class="row">
										        		<div class="col-md-12 text-center">
										        			<a href="users.php?do=Delete&delete=<?php echo $id; ?>" class="btn btn-danger">Yes</a>
										        			<button type="button" class="btn btn-primary" data-dismiss="modal">No</button>        													
										        		</div>
										        	</div>
										        </div>
										      </div>
										     </div>
										  </div>
										</div>
								      </td>
								    </tr>

						  		<?php }	?>
						    
						  </tbody>
						</table>
	                </div>
	            </div>
	            <!-- All Users Table End -->
	            <div class="add-btn-box">
	            	<a href="users.php?do=Add" class="btn btn-primary btn-flat btn-sm">Add New User</a>
	            </div>
    			</div>
    		</div>

    	<?php }
    	else if ( $do == "Add" ){ ?>
    		
    		<div class="row">
    			<div class="col-md-12">
    				<div class="card shadow mb-4">
		                <div class="card-header py-3">
		                  <h6 class="m-0 font-weight-bold text-primary">Add New Users</h6>
		                </div>
		                <div class="card-body">
		                	<div class="container">
		                		<div class="row">
		                			<div class="col-md-6">
		                				<form action="?do=Insert" method="POST" enctype="multipart/form-data">
					                		<div class="form-group">
					                			<label>Full Name</label>
					                			<input type="text" name="name" class="form-control" required="required" autocomplete="off">
					                		</div>

					                		<div class="form-group">
					                			<label>Username</label>
					                			<input type="text" name="username" class="form-control" required="required" autocomplete="off">
					                		</div>

					                		<div class="form-group">
					                			<label>Password</label>
					                			<input type="password" name="password" class="form-control" required="required" autocomplete="off">
					                		</div>

					                		<div class="form-group">
					                			<label>Re-Type Password</label>
					                			<input type="password" name="re_password" class="form-control" required="required" autocomplete="off">
					                		</div>

					                		<div class="form-group">
					                			<label>Email Address</label>
					                			<input type="email" name="email" class="form-control" autocomplete="off">
					                		</div>	
		                			</div>

		                			<div class="col-md-6">
		                				<div class="form-group">
					                			<label>Phone No.</label>
					                			<input type="text" name="phone" class="form-control" autocomplete="off">
					                		</div>

					                		<div class="form-group">
					                			<label>Address</label>
					                			<input type="text" name="address" class="form-control" autocomplete="off">
					                		</div>

					                		<div class="form-group">
					                			<label>User Role</label>
					                			<select class="form-control" name="role">
					                				<option>Please Select User Role</option>
					                				<option value="0">Administrator</option>
					                				<option value="1">Editor</option>
					                			</select>
					                		</div>

					                		<div class="form-group">
					                			<label>Profile Picture</label>
					                			<input type="file" name="avater" class="form-control-file">
					                		</div>

					                		<div class="form-group">
					                			<input type="submit" name="submit" value="Add New User" class="btn btn-primary btn-flat btn-sm">
					                		</div>
					                	</form>
		                			</div>
		                		</div>
		                	</div>
		                </div>
		            </div>
    			</div>
    		</div>

    	<?php }
    	else if ( $do == "Insert" ){ ?>
    		
    		<div class="row">
    			<div class="col-md-12">
    				<?php

    					if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){

    						$name 			= $_POST['name'];
    						$username 		= $_POST['username'];
    						$password 		= $_POST['password'];
    						$re_password 	= $_POST['re_password'];
    						$email 			= $_POST['email'];
    						$phone 			= $_POST['phone'];
    						$address 		= $_POST['address'];
    						$role 			= $_POST['role'];

    						$avater 		= $_FILES['avater'];
    						$avaterName 	= $_FILES['avater']['name'];
    						$avaterSize 	= $_FILES['avater']['size'];
    						$avaterType 	= $_FILES['avater']['type'];
    						$avaterTmp	 	= $_FILES['avater']['tmp_name'];

    						$avaterAllowedExtension 	= array("jpg", "jpeg", "png");
    						$avaterExtension 			= strtolower( end( explode('.', $avaterName) ) );

    						$formErrors = array();

    						if ( strlen($username) < 4 ){
    							$formErrors = 'Username is too Small';
    						}
    						if ( $password != $re_password ){
    							$formErrors = 'Password Doesnt Match';
    						}
    						if ( !empty($avaterName) ){
    							if ( !empty($avaterName) && !in_array($avaterExtension, $avaterAllowedExtension) ){
	    							$formErrors = 'Please Upload Valid Image Format';
	    						}
	    						if ( !empty($avaterSize) && $avaterSize > 2097152 ){
	    							$formErrors = 'Image size is larger then 2MB';
	    						}
    						}
    						

    						foreach ( $formErrors as $error ) {
    							echo '<div class="alert alert-danger">' . $error . '</div>';
    						}

    						if ( empty($formErrors) ){
    							// Encrypted Password
    							$hassedPass = sha1($password);

    							$avater = rand(0,200000). '_' . $avaterName;
    							move_uploaded_file($avaterTmp, "img\users-avater\\" . $avater);

    							$query = "INSERT INTO users ( name, username, password, email, phone, address, avater, role, join_date) VALUES ('$name', '$username', '$hassedPass', '$email', '$phone', '$address', '$avater', '$role', now())";

    							// echo $query;

    							$add_user = mysqli_query($connect, $query);

    							if ( !$add_user ){
    								die( "Query Failed ". mysqli_error($connect) );
    							}
    							else{
    								header("Location: users.php?do=Manage");
    							}
    						}


    					}

    				?>
    			</div>
    		</div>

    	<?php }
    	else if ( $do == "Edit" ){ 
    		if ( isset($_GET['update']) ){
    			$the_user = $_GET['update'];

    			$query = "SELECT * FROM users WHERE id = '$the_user'";
    			$update_user = mysqli_query($connect, $query);
    			while( $row = mysqli_fetch_assoc($update_user) ){
    				$user_id 			= $row['id'];
		  			$name 			= $row['name'];
		  			$username 		= $row['username'];
		  			$password 		= $row['password'];
		  			$email  		= $row['email'];
		  			$phone  		= $row['phone'];
		  			$address  		= $row['address'];
		  			$avater  		= $row['avater'];
		  			$role  			= $row['role'];
		  			$is_active  	= $row['is_active'];
		  			$join_date  	= $row['join_date'];
		  			?>

  			<div class="row">
    			<div class="col-md-12">
    				<div class="card shadow mb-4">
		                <div class="card-header py-3">
		                  <h6 class="m-0 font-weight-bold text-primary">Update User Information</h6>
		                </div>
		                <div class="card-body">
		                	<div class="container">
		                		<div class="row">
		                			<div class="col-md-6">
		                				<form action="?do=Update" method="POST" enctype="multipart/form-data">
					                		<div class="form-group">
					                			<label>Full Name</label>
					                			<input type="text" name="name" class="form-control" required="required" autocomplete="off" value="<?php echo $name; ?>">
					                		</div>

					                		<div class="form-group">
					                			<label>Username</label>
					                			<input type="text" name="username" class="form-control" required="required" autocomplete="off" value="<?php echo $username; ?>">
					                		</div>

					                		<div class="form-group">
					                			<label>Email Address</label>
					                			<input type="email" name="email" class="form-control" autocomplete="off" value="<?php echo $email; ?>">
					                		</div>	

					                		<div class="form-group">
					                			<label>Phone No.</label>
					                			<input type="text" name="phone" class="form-control" autocomplete="off" value="<?php echo $phone; ?>">
					                		</div>

					                		<div class="form-group">
					                			<label>Address</label>
					                			<input type="text" name="address" class="form-control" autocomplete="off" value="<?php echo $address; ?>">
					                		</div>
		                			</div>

		                			<div class="col-md-6">					                		

					                		<div class="form-group">
					                			<label>User Role</label>
					                			<select class="form-control" name="role">
					                				<option>Please Select User Role</option>
					                				<option value="0" <?php if ( $role == 0 ){ echo 'selected'; } ?>>Administrator</option>
					                				<option value="1" <?php if ( $role == 1 ){ echo 'selected'; } ?>>Editor</option>
					                			</select>
					                		</div>

					                		<div class="form-group">
					                			<label>Active Status</label>
					                			<select class="form-control" name="is_active">
					                				<option>Please Select User Status</option>
					                				<option value="0" <?php if ( $is_active == 0 ){ echo 'selected'; } ?>>Inactive</option>
					                				<option value="1" <?php if ( $is_active == 1 ){ echo 'selected'; } ?>>Active</option>
					                			</select>
					                		</div>

					                		<div class="form-group">
					                			<label>Profile Picture</label><br>
					                			<?php
										      		if ( !empty($avater) )
										      		{ ?>
										      			<img src="img/users-avater/<?php echo $avater; ?>" class="user-avater">
										      		<?php }
										      		else
										      		{ ?>
										      			<img src="img/users-avater/default.png" class="user-avater">
										      		<?php }
										      	?>
					                			<input type="file" name="avater" class="form-control-file">
					                		</div>

					                		<div class="form-group">
					                			<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
					                			<input type="submit" name="submit" value="Save Changes" class="btn btn-primary btn-flat btn-sm">
					                		</div>
					                	</form>
		                			</div>
		                		</div>
		                	</div>
		                </div>
		            </div>
    			</div>
    		</div>

    		<?php	}
    		}
    	}
    	else if ( $do == "Update" ){ ?>
    		
    		<div class="row">
    			<div class="col-md-12">
    				<div class="card shadow mb-4">
		                <div class="card-header py-3">
		                  <h6 class="m-0 font-weight-bold text-primary">Update User Information</h6>
		                </div>
		                <div class="card-body">
		                	<?php
		                		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){

		                			$update_user_id = $_POST['user_id'];
		                			
		                			$name 			= $_POST['name'];
		    						$username 		= $_POST['username'];
		    						$password 		= $_POST['password'];
		    						$re_password 	= $_POST['re_password'];
		    						$email 			= $_POST['email'];
		    						$phone 			= $_POST['phone'];
		    						$address 		= $_POST['address'];
		    						$role 			= $_POST['role'];
		    						$is_active 		= $_POST['is_active'];

		    						$avater 		= $_FILES['avater'];
		    						$avaterName 	= $_FILES['avater']['name'];
		    						$avaterSize 	= $_FILES['avater']['size'];
		    						$avaterType 	= $_FILES['avater']['type'];
		    						$avaterTmp	 	= $_FILES['avater']['tmp_name'];

		    						$avaterAllowedExtension 	= array("jpg", "jpeg", "png");
		    						$avaterExtension 			= strtolower( end( explode('.', $avaterName) ) );

		    						$formErrors = array();

		    						if ( strlen($username) < 4 ){
		    							$formErrors = 'Username is too Small';
		    						}
		    						if ( $password != $re_password ){
		    							$formErrors = 'Password Doesnt Match';
		    						}
		    						if ( !empty($avaterName) ){
		    							if ( !empty($avaterName) && !in_array($avaterExtension, $avaterAllowedExtension) ){
			    							$formErrors = 'Please Upload Valid Image Format';
			    						}
			    						if ( !empty($avaterSize) && $avaterSize > 2097152 ){
			    							$formErrors = 'Image size is larger then 2MB';
			    						}
		    						}
		    						
		    						foreach ( $formErrors as $error ) {
		    							echo '<div class="alert alert-danger">' . $error . '</div>';
		    						}

		    						if ( empty($formErrors) ){
		    							
		    							if ( !empty($avaterName) )
		    							{
		    								$avater = rand(0,200000). '_' . $avaterName;
		    								move_uploaded_file($avaterTmp, "img\users-avater\\" . $avater);

			    							// Delete the Users existing image from folder
			    							$sec_query = "SELECT * FROM users WHERE id = '$update_user_id'";
			    							$select_user = mysqli_query($connect, $sec_query);
			    							while ( $row = mysqli_fetch_assoc($select_user) ) {
			    								$existing_avater  = $row['avater'];
			    							}
			    							unlink("img/users-avater/". $existing_avater);


			    							$query = "UPDATE users SET name='$name', username='$username', email='$email', phone='$phone', address='$address', avater='$avater', role='$role', is_active='$is_active' WHERE id = '$update_user_id' ";
			    							$update_user = mysqli_query($connect, $query);

			    							if ( !$update_user ){
		    									die( "Query Failed ". mysqli_error($connect) );
			    							}
			    							else{
			    								header("Location: users.php?do=Manage");
			    							}
		    							}
		    							else{
		    								$query = "UPDATE users SET name='$name', username='$username', email='$email', phone='$phone', address='$address', role='$role', is_active='$is_active' WHERE id = '$update_user_id' ";
			    							$update_user = mysqli_query($connect, $query);

			    							if ( !$update_user ){
			    								die( "Query Failed ". mysqli_error($connect) );
			    							}
			    							else{
			    								header("Location: users.php?do=Manage");
			    							}
		    							}
		    							
		    						}

		                		}
		                	?>
		                </div>
		            </div>
		        </div>
		    </div>

    	<?php }
    	else if( $do == "Delete" ){
    		
    		if ( isset($_GET['delete']) ){
    			$the_delete_user = $_GET['delete'];

    			// Delete the Users existing image from folder
				$query = "SELECT * FROM users WHERE id = '$the_delete_user'";
				$select_user = mysqli_query($connect, $query);
				while ( $row = mysqli_fetch_assoc($select_user) ) {
					$existing_avater  = $row['avater'];
				}
				unlink("img/users-avater/". $existing_avater);

				$delete_query = "DELETE FROM users WHERE id = '$the_delete_user' ";
				$delete_done = mysqli_query($connect, $delete_query);

				if ( !$delete_done ){
					die( "Query Failed ". mysqli_error($connect) );
				}
				else{
					header("Location: users.php?do=Manage");
				}

    		}
    	 }
    ?>

	<?php } ?>
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

<?php include "includes/footer.php"; ?>

      