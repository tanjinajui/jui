<?php include "includes/header.php"; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="col-lg-12">
         		 <!-- Page Heading -->
          		<h3 class="h3 mb-4 text-gray-800">Publish Another New Post</h3>
         	</div>
         </div>

          <div class="row">
          	<div class="col-lg-12">
              <!-- Add New Category Field Start -->
              <div class="card shadow mb-4">
              	<!-- Card Section Title-->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Add New Post</h6>
                </div>
                <!-- Card Section Body-->
                <div class="card-body">
                
                  <!-- Add Post Form Start -->
                 <form action="" method="POST" enctype="multipart/form-data">
                 	<div class="form-group">
                 		<label for = "title">Title</label>
                 		<input type="text" name="post_title" class="form-control" autocomplete="off">
                 	</div>
                 	<div class="form-group">
                 		<label for = "description">Description</label>
                 		<textarea name="post_description" class="form-control" rows="7"></textarea>
                 	</div>
                 	<div class="form-group">
                 		<label for = "post-author">Post Author</label>
                 		<input type="text" name="post_author" class="form-control" autocomplete="off">
                 	</div>
                 	<div class="form-group">
                 		<label for = "post-thumbnail">Post Thumbnail</label>
                 		<input type="file" name="image" class="form-control-file">
                 	</div>
                 	<div class="form-group">
                 		<label for = "post-category">Post Category</label>
                 		<input type="text" name="post_category" class="form-control" autocomplete="off">
                 	</div>
                 	<div class="form-group">
                 		<label for = "tags">Tags</label>
                 		<input type="text" name="post_tags" class="form-control" autocomplete="off">
                 	</div>
                 	<div class="form-group">
                 		<input type="submit" name="add_post" value = "Publish Post"class="btn btn-primary">
                 	</div>                	
                 </form>
                  <!-- Add Post Form End -->
                </div>
              </div>
          	</div>
        </div>
        <!-- /.container-fluid -->

        <?php

        	//Add New Blog Post Functions
        	if (isset($_POST['add_post'])) {
        		$post_title       = $_POST['post_title'];
        		$post_description = $_POST['post_description'];
        		$post_author  	  = $_POST['post_author'];
        		//image upload--
        		$post_image 	  = $_FILES['image']['name'];
        		$post_image_temp  = $_FILES['image']['temp_name'];
        		$post_category    = $_POST['post_category'];
        		$post_tags        = $_POST['post_tags'];
        		move_uploaded_file($post_image_temp, "img/posts_thumbnail/$post_image");

        		$query = "INSERT INTO posts (post_title, post_description, post_author, post_thumb, post_category, post_tags, post_date) VALUES ('$post_title', '$post_description', '$post_author', '$post_image', '$post_category', '$post_tags', now())";

        		$create_new_post = mysqli_query($connect, $query);
    		if(!$create_new_post)
    		{
    			die("Query Failed!" . mysqli_error($connect));
    		}else
    		{
    			header("Location: all-posts.php");
    		}

        	}
        ?>
      </div>
      <!-- End of Main Content -->
<?php include "includes/footer.php";?>