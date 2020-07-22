<?php include "includes/header.php"; ?>
  <!-- Begin Page Content -->
  <div class="container-fluid">

  	<?php
  		if ( $_SESSION['role']  == 0 ){
  	?>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">View All Comments</h1>

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
						      <th scope="col">Post Title</th>
						      <th scope="col">Full Name</th>
						      <th scope="col">Email ID</th>
						      <th scope="col">Comments</th>
						      <th scope="col">Status</th>
						      <th scope="col">Date</th>
						      <th scope="col">Action</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php

						  		$query = "SELECT * FROM comments WHERE cmt_status = 0 OR cmt_status = 1 ORDER BY cmt_id DESC";
						  		$all_comments = mysqli_query($connect, $query);
						  		$i=0;
						  		while ( $row = mysqli_fetch_assoc($all_comments) ) {
						  			$cmt_id 			= $row['cmt_id'];
						  			$cmt_desc 			= $row['cmt_desc'];
						  			$cmt_post_id 		= $row['cmt_post_id'];
						  			$cmt_author 		= $row['cmt_author'];
						  			$cmt_author_email  	= $row['cmt_author_email'];
						  			$cmt_status  		= $row['cmt_status'];
						  			$cmt_date  			= $row['cmt_date'];
						  			$i++; 
						  		?>
						  			<tr>
								      <th scope="row"><?php echo $i; ?></th>
								      <td>
								      	<?php 
								      		$sql = "SELECT * FROM posts WHERE post_id = '$cmt_post_id'";
								      		$post_title_by_id = mysqli_query($connect, $sql);
								      		while ( $row = mysqli_fetch_assoc($post_title_by_id) ) {
								      		 	$post_id 		= $row['post_id'];
								      		 	$post_title 	= $row['post_title'];	      		 		
								      		 		echo $post_title;								      		
								      		 	} 
								      	?>    									      	
								      </td>
								      <td><?php echo $cmt_author; ?></td>
								      <td><?php echo $cmt_author_email; ?></td>
								      <td><?php echo $cmt_desc; ?></td>
								      <td>
								      	<?php
								      		if ( $cmt_status == 0 ){
								      			echo '<span class="badge badge-warning">Draft</span>';
								      		}
								      		else if ( $cmt_status == 1 ){
								      			echo '<span class="badge badge-success">Published</span>';
								      		}
								      		else if ( $cmt_status == 2 ){
								      			echo '<span class="badge badge-danger">Suspended</span>';
								      		}
								      	?>
								      </td>
								      <td><?php echo $cmt_date; ?></td>
								      <td>
								      	<div class="action-bar">
								      		<ul>
									      		<li><a href="allcomments.php?do=Edit&update=<?php echo $cmt_id; ?>"><i class="fa fa-edit"></i></a></li>
									      		<li><i class="fa fa-trash" data-toggle="modal" data-target="#exampleModal<?php echo $cmt_id; ?>"></i></li>
									      	</ul>
								      	</div>								      	

								      	<!-- Delete Users Confirmation Modal -->
										<div class="modal fade" id="exampleModal<?php echo $cmt_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLabel">Do You Want to Delete this Comment?</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										        <div class="container">
										        	<div class="row">
										        		<div class="col-md-12 text-center">
										        			<a href="allcomments.php?do=Delete&delete=<?php echo $cmt_id; ?>" class="btn btn-danger">Yes</a>
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
    			</div>
    		</div>

    	<?php }
    	
    	
    	else if ( $do == "Edit" ){ 
    		if ( isset($_GET['update']) ){
    			$the_comment_id = $_GET['update'];

    			$query = "SELECT * FROM comments WHERE cmt_id = '$the_comment_id'";
    			
    			$update_user = mysqli_query($connect, $query);
    			while( $row = mysqli_fetch_assoc($update_user) ){
    				$cmt_id 			= $row['cmt_id'];
    				$cmt_status  		= $row['cmt_status'];
	  			?>

  			<div class="row">
    			<div class="col-md-12">
    				<div class="card shadow mb-4">
		                <div class="card-header py-3">
		                  <h6 class="m-0 font-weight-bold text-primary">Draft / Published Comment</h6>
		                </div>
		                <div class="card-body">
		                	<div class="container">
		                		<div class="row">
		                			<div class="col-md-12">
		                				<form action="?do=Update" method="POST" enctype="multipart/form-data">
					                		
					                		<div class="form-group">
					                			<label>User Role</label>
					                			<select class="form-control" name="cmt_status">
					                				<option>Please Select Comment Status</option>
					                				<option value="0" <?php if ( $cmt_status == 0 ){ echo 'selected'; } ?>>Draft</option>
					                				<option value="1" <?php if ( $cmt_status == 1 ){ echo 'selected'; } ?>>Published</option>
					                				<option value="2" <?php if ( $cmt_status == 2 ){ echo 'selected'; } ?>>Deleted</option>
					                			</select>
					                		</div>

					                		<div class="form-group">
					                			<input type="hidden" name="cmt_id" value="<?php echo $cmt_id; ?>">
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

		                			$update_comment_id = $_POST['cmt_id'];
		                			
		                			$cmt_status 			= $_POST['cmt_status'];
		    						
		                			$query = "UPDATE comments SET cmt_status='$cmt_status' WHERE cmt_id = '$update_comment_id' ";
	    							$update_comment_status = mysqli_query($connect, $query);

	    							if ( !$update_comment_status ){
    									die( "Query Failed ". mysqli_error($connect) );
	    							}
	    							else{
	    								header("Location: allcomments.php?do=Manage");
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
    			$the_delete_comment_id = $_GET['delete'];

    			
				$query = "UPDATE comments SET cmt_status=0 WHERE cmt_id = '$the_delete_comment_id' ";
				$update_comment_status = mysqli_query($connect, $query);				

				if ( !$update_comment_status ){
					die( "Query Failed ". mysqli_error($connect) );
				}
				else{
					header("Location: allcomments.php?do=Manage");
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

      