<?php include "includes/header.php"; ?>
  	<!-- Begin Page Content -->
  	<div class="container-fluid">
	    <!-- Page Heading -->
	    <h1 class="h3 mb-4 text-gray-800">Update Post Content</h1>

	    <div class="row">
	    	<div class="col-md-12">
	    		<div class="card shadow mb-4">
	    			<!-- Card Section Title -->
	                <div class="card-header py-3">
	                  <h6 class="m-0 font-weight-bold text-primary">Update Post Content</h6>
	                </div>


	                <?php
	                	if (isset($_GET['update'])){

	                		$the_post_id = $_GET['update'];

	                		$query = "SELECT * FROM posts WHERE post_id = '$the_post_id'";

	                		$post_existing_content = mysqli_query($connect, $query);

	                		while ($row = mysqli_fetch_assoc($post_existing_content)) {
	                			$post_id 			= $row['post_id'];
								$post_title 		= $row['post_title'];
								$post_description 	= $row['post_description'];
								$post_author 		= $row['post_author'];
								$post_thumb 		= $row['post_thumb'];
								$post_category 		= $row['post_category'];
								$post_tags 			= $row['post_tags'];
								$post_date 			= $row['post_date'];

							?>


					<!-- Card Section Body -->
	                <div class="card-body">
	                	<!-- Add Post Form Start --> 
	                	<form action="" method="POST" enctype="multipart/form-data">
	                		<div class="form-group">
	                			<label for="title">Post Title</label>
	                			<input type="text" name="post-title" class="form-control" autocomplete="off" value="<?php echo $post_title; ?>">
	                		</div>

	                		<div class="form-group">
	                			<label for="description">Description</label>
	                			<textarea name="post-desc" class="form-control" rows="7"><?php echo $post_description; ?></textarea>
	                		</div>

	                		<div class="form-group">
	                			<label for="post-thumbnail">Post Thumbnail</label><br>
	                			<img src="img/posts-thumbnail/<?php echo $post_thumb; ?>" width="200">
	                			<input type="file" name="image" class="form-control-file">
	                		</div>

	                		<div class="form-group">
	                			<label for="post-category">Post Category</label>
	                			<select class="form-control" name="post-category">
	                				<option>Please Select the Post Category</option>
	                				<?php
	                					$query = "SELECT * FROM categories";
								  		$the_cat = mysqli_query($connect, $query);
								  		while ( $row=mysqli_fetch_assoc($the_cat) ) {
								  			$cat_id 	= $row['cat_id'];
								  			$cat_name 	= $row['cat_name'];
								  			?>
								  			<option value="<?php echo $cat_id; ?>" <?php if ( $post_category == $cat_id ){ echo 'selected'; } ?>><?php echo $cat_name; ?></option>
								  	<?php	}	?>	                				
	                			</select>


	                			
	                		</div>

	                		<div class="form-group">
	                			<label for="tags">Tags</label>
	                			<input type="text" name="post-tags" class="form-control" autocomplete="off" value="<?php echo $post_tags; ?>">
	                		</div>

	                		<div class="form-group">
	                			<input type="submit" name="update-post" value="Update Post" class="btn btn-primary">
	                		</div>
	                	</form>
	                	<!-- Add Post Form End -->                   	
	                </div>




	                	<?php	}

	                	}
	                ?>
	            </div>
	    	</div>
	    </div>
    </div>
    <!-- /.container-fluid -->


    <?php

    	// Add New Blog Post Functions
    	if ( isset($_POST['update-post']) ){
    		$post_title 		= mysqli_real_escape_string($connect, $_POST['post-title']);
    		$post_desc 			= mysqli_real_escape_string($connect, $_POST['post-desc']);

    		$post_category 		= $_POST['post-category'];
    		$post_tags 			= $_POST['post-tags'];

    		$post_image 		= $_FILES['image'];
    		$post_image_name 	= $_FILES['image']['name'];
    		$post_image_temp 	= $_FILES['image']['tmp_name'];

    		if ( !empty($post_image_name) )
    		{
    			$post_image = rand(0,100000) . '_' . $post_image_name;
				move_uploaded_file($post_image_temp, "img/posts-thumbnail/$post_image");

				$sql = "SELECT * FROM posts where post_id = '$post_id'";
				$unlink_img = mysqli_query($connect, $sql);
				while ( $row = mysqli_fetch_assoc($unlink_img) ) {
					$the_image = $row['post_thumb'];
				}
				unlink("img/posts-thumbnail/". $the_image);

	    		$query = "UPDATE posts SET post_title='$post_title', post_description='$post_desc', post_thumb='$post_image', post_category='$post_category', post_tags='$post_tags' WHERE post_id='$post_id' ";

	    		$update_post = mysqli_query($connect, $query);

	    		if ( !$update_post ){
	    			die("Query Failed" . mysqli_error($connect));
	    		}
	    		else{
	    			header("Location: allposts.php");
	    		}
    		}
    		else
    		{
    			$query = "UPDATE posts SET post_title='$post_title', post_description='$post_desc', post_category='$post_category', post_tags='$post_tags' WHERE post_id='$post_id' ";

	    		$update_post = mysqli_query($connect, $query);

	    		if ( !$update_post ){
	    			die("Query Failed" . mysqli_error($connect));
	    		}
	    		else{
	    			header("Location: allposts.php");
	    		}
    		}

    	}

    ?>

  </div>
  <!-- End of Main Content -->

<?php include "includes/footer.php"; ?>

      