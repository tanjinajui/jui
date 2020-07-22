<?php include "includes/header.php"; ?>
  	<!-- Begin Page Content -->
  	<div class="container-fluid">
	    <!-- Page Heading -->
	    <h1 class="h3 mb-4 text-gray-800">Publish Another New Post</h1>

	    <div class="row">
	    	<div class="col-md-12">
	    		<div class="card shadow mb-4">
	    			<!-- Card Section Title -->
	                <div class="card-header py-3">
	                  <h6 class="m-0 font-weight-bold text-primary">Add New Post</h6>
	                </div>

	                <!-- Card Section Body -->
	                <div class="card-body">
	                	<!-- Add Post Form Start --> 
	                	<form action="" method="POST" enctype="multipart/form-data">
	                		<div class="form-group">
	                			<label for="title">Post Title</label>
	                			<input type="text" name="post-title" class="form-control" autocomplete="off">
	                		</div>

	                		<div class="form-group">
	                			<label for="description">Description</label>
	                			<textarea name="post-desc" class="form-control" rows="7"></textarea>
	                		</div>

	                		<div class="form-group">
	                			<label for="post-thumbnail">Post Thumbnail</label>
	                			<input type="file" name="image" class="form-control-file">
	                		</div>

	                		<div class="form-group">
	                			<label for="post-category">Post Category</label>
	                			<select class="form-control" name="post_category">
	                				<option>Please select the Post Category</option>
	                				<?php
	                					$query = "SELECT * FROM categories";
	                					$all_cat = mysqli_query($connect, $query);
	                					while ( $row = mysqli_fetch_assoc($all_cat) ) {
	                						$cat_id 	= $row['cat_id'];
	                						$cat_name 	= $row['cat_name']; ?>

	                						<option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>
	                				<?php	}
	                				?>
	                			</select>
	                		</div>

	                		<div class="form-group">
	                			<label for="tags">Tags</label>
	                			<input type="text" name="post-tags" class="form-control" autocomplete="off">
	                		</div>

	                		<div class="form-group">
	                			<input type="submit" name="addpost" value="Publish Post" class="btn btn-primary">
	                		</div>
	                	</form>
	                	<!-- Add Post Form End -->                   	
	                </div>
	            </div>
	    	</div>
	    </div>
    </div>
    <!-- /.container-fluid -->


    <?php

    	// Add New Blog Post Functions
    	if ( isset($_POST['addpost']) ){
    		$post_title 		= $_POST['post-title'];
    		$post_desc 			= $_POST['post-desc'];
    		$post_author 		= $_SESSION['name'];
    		$post_category 		= $_POST['post_category'];
    		$post_tags 			= $_POST['post-tags'];

    		$post_image 		= $_FILES['image'];
    		$post_image_name 	= $_FILES['image']['name'];
    		$post_image_size	= $_FILES['image']['size'];
    		$post_image_temp 	= $_FILES['image']['tmp_name'];
    		$post_image_type 	= $_FILES['image']['type'];    		

    		$postAllowedExtension = array("jpg", "jpeg", "png");
    		$postExtension = strtolower( end( explode('.', $post_image_name) ) );

    		$formErrors = array();

    		if ( strlen($post_title) < 10 ){
    			$formErrors = 'Post Thumbnail is too Small';
    		}
    		if ( empty($post_image_name) ){
    			$formErrors = 'Please Upload Blog Post Thumbnail';
    		}
    		if ( !empty($post_image_name) && !in_array($postExtension, $postAllowedExtension) ){
    			$formErrors = 'Please Upload JPG, JPEG or PNG Image';
    		}
    		foreach ($formErrors as $error) {
    			echo '<div class="alert alert-warning">' . $formErrors . '</div>';
    		}


    		if ( !empty($post_image_name) ){
    			$post_image = rand(0,100000) . '_' . $post_image_name;
    			move_uploaded_file($post_image_temp, "img/posts-thumbnail/$post_image");

    			$query = "INSERT INTO posts ( post_title, post_description, post_author, post_thumb, post_category, post_tags, post_date) VALUES ('$post_title', '$post_desc', '$post_author', '$post_image', '$post_category', '$post_tags', now())";

	    		$add_new_post = mysqli_query($connect, $query);

	    		if ( !$add_new_post ){
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

      