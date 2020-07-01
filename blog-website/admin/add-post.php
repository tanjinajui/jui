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
                <!-- Card Section Body start-->
                <div class="card-body">
                
                  <!-- Add Post Form Start -->
                 <form action="" method="POST" enctype="multipart/form-data">
                 	<!-- Post-Title Field-->
                 	<div class="form-group">
                 		<label for = "title">Title</label>
                 		<input type="text" name="post_title" class="form-control" autocomplete="off">
                 	</div>
                 	<!-- Post-Description Field-->
                 	<div class="form-group">
                 		<label for = "description">Description</label>
                 		<textarea name="post_description" class="form-control" rows="7"></textarea>
                 	</div>
                 	<!-- Post-Author Field-->
                 	<div class="form-group">
                 		<label for = "post-author">Post Author</label>
                 		<input type="text" name="post_author" class="form-control" autocomplete="off">
                 	</div>
                 	<!-- Post-Thumbnail Field-->
                 	<div class="form-group">
                 		<label for = "post-thumbnail">Post Thumbnail</label>
                 		<input type="file" name="image" class="form-control-file">
                 	</div>
                 	<!-- Post-Category Field-->
                 	<div class="form-group">
                 		<label for = "post-category">Post Category</label>
                 		<select class="form-control" name="post_category">
                      <option>Please Select the Post Category</option>
                      <?php
                        $query = "SELECT * FROM categories";
                        $all_category = mysqli_query($connect, $query);
                        while ($row = mysqli_fetch_assoc($all_category)) {
                          $cat_id = $row['cat_id'];
                          $cat_name = $row['cat_name'];
                          ?>
                          <option value="<?php echo $cat_id;?>"><?php echo $cat_name;?></option>
                      <?php   
                        
                        }

                      ?>
                    </select>
                 	</div>
                 	<!-- Post-Tags Field-->
                 	<div class="form-group">
                 		<label for = "tags">Tags</label>
                 		<input type="text" name="post_tags" class="form-control" autocomplete="off">
                 	</div>
                 	<!-- Post-Publish Button Field-->
                 	<div class="form-group">
                 		<input type="submit" name="add_post" value = "Publish Post"class="btn btn-primary">
                 	</div>                	
                 </form>
                  <!-- Add Post Form End -->
                </div>
                <!-- Card Section Body end-->
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
        		$post_image 	  = $_FILES['image'];
        		$post_image_name  = $_FILES['image']['name'];
        		$post_image_size  = $_FILES['image']['size'];
        		$post_image_temp  = $_FILES['image']['tmp_name'];
        		$post_image_type  = $_FILES['image']['type'];

        		$post_category    = $_POST['post_category'];
        		$post_tags        = $_POST['post_tags'];

        		$postAllowedExtension = array("jpg", "jpeg", "png");
        		$postExtension        = strtolower(end(explode('.', $post_image_name)));

        		$formErrors = array();
        		if (strlen($post_title)<10) {
        			$formErrors = 'Post Thumbnail is too Small';
        		}
        		if (empty($post_image_name)) {
        			$formErrors = 'Please Upload Blog Post Thumbnail';
        		}if (!empty($post_image_name) && !in_array($postExtension, $postAllowedExtension)) {
        			$formErrors = 'Please Upload JPG, JPEG or PNG Image';
        		}
        		foreach ($formErrors as $error) {
        			echo '<div class = "alert alert-warning">' . $formErrors . '</div>';
        		}

        		if (!empty($post_image_name)){
        			$post_image = rand(0,100000) . '_' . $post_image_name;
        			//image Upload Function
        			move_uploaded_file($post_image_temp, "img/posts_thumbnail/$post_image");

        		$query = "INSERT INTO posts (post_title, post_description, post_author, post_thumb, post_category, post_tags, post_date) VALUES ('$post_title', '$post_description', '$post_author', '$post_image', '$post_category', '$post_tags', now())";

		        		$add_new_post = mysqli_query($connect, $query);
		    		if(!$add_new_post)
		    		{
		    			die("Query Failed!" . mysqli_error($connect));
		    		}else
		    		{
		    			header("Location: all-posts.php");
		    		}
                //echo $query;
		        }
        		

        	}
        ?>
      </div>
      <!-- End of Main Content -->
<?php include "includes/footer.php";?>