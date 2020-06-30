<?php include "includes/header.php"; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="col-lg-12">
         		 <!-- Page Heading -->
          		<h3 class="h3 mb-4 text-gray-800">Update Post Content</h3>
         	</div>
         </div>
          <div class="row">
          	<div class="col-lg-12">
              <!-- Add New Category Field Start -->
              <div class="card shadow mb-4">
              	<!-- Card Section Title-->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Update Post Content</h6>
                </div>

                <?php
                    if (isset($_GET['update'])) {
                        $the_post_id = $_GET['update'];
                        $query = "SELECT * FROM posts WHERE post_id =$the_post_id";
                        $post_existing_content = mysqli_query($connect, $query);
                        while ($row = mysqli_fetch_assoc($post_existing_content)) {
                            $post_id            = $row['post_id'];
                            $post_title         = $row['post_title'];
                            $post_description   = $row['post_description'];
                            $post_author        = $row['post_author'];
                            $post_thumb         = $row['post_thumb'];
                            $post_category      = $row['post_category'];
                            $post_tags          = $row['post_tags'];
                            $post_date          = $row['post_date'];

                            ?>
                <!-- Card Section Body-->
                <div class="card-body">               
                  <!-- Add Post Form Start -->
                 <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <!-- Post-Title Field-->
                        <label for = "title">Title</label>
                        <input type="text" name="post_title" class="form-control" value="<?php echo $post_title; ?>" autocomplete="off">
                    </div>
                    <!-- Post-Description Field-->
                    <div class="form-group">
                        <label for = "description">Description</label>
                        <textarea name="post_description" class="form-control" rows="7"><?php echo $post_description; ?></textarea>
                    </div>
                    <!-- Post-Author Field-->
                    <div class="form-group">
                        <label for = "post-author">Post Author</label>
                        <input type="text" name="post_author" class="form-control" value="<?php echo $post_author; ?>" autocomplete="off">
                    </div>
                    <!-- Post-Thumbnail Field-->
                    <div class="form-group">
                        <label for = "post-thumbnail">Post Thumbnail</label><br>
                        <img src="img/posts_thumbnail/<?php echo $post_thumb; ?>" width = "200">
                        <input type="file" name="image" class="form-control-file">
                    </div>
                    <!-- Post-Category Field-->
                    <div class="form-group">
                        <label for = "post-category">Post Category</label>
                        <select class="form-control" name="post-category">
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
                        <input type="text" name="post_tags" class="form-control" value="<?php echo $post_tags; ?>" autocomplete="off">
                    </div>
                    <!-- Post-Update Button Field-->
                    <div class="form-group">
                        <input type="submit" name="update_post" value = "Update Post"class="btn btn-primary">
                    </div>                  
                 </form>
                  <!-- Add Post Form End -->
                </div>

        <?php            
                }
            }
         ?>               
              </div>
          	</div>
        </div>
        <!-- /.container-fluid -->
         </div>
      <!-- End of Main Content -->

        <?php

        	//Update New Blog Post Functions
        	if (isset($_POST['update_post'])) {
        		$post_title       = mysqli_real_escape_string($connect, $_POST['post_title']);
        		$post_description = mysqli_real_escape_string($connect, $_POST['post_description']);
        		$post_author  	  = $_POST['post_author'];
        		//image upload--
        		$post_image 	  = $_FILES['image']['name'];
        		$post_image_temp  = $_FILES['image']['tmp_name'];
        		$post_category    = $_POST['post_category'];
        		$post_tags        = $_POST['post_tags'];
        		move_uploaded_file($post_image_temp, "img/posts_thumbnail/$post_image");

        		$query = "UPDATE posts SET post_title = '$post_title', post_description = '$post_description', post_author = '$post_author', post_thumb = '$post_image',  post_category = '$post_category', post_tags = '$post_tags' WHERE post_id = $post_id  ";

                    //echo $query; 
        		$update_post = mysqli_query($connect, $query);
            		if(!$update_post)
            		{
            			die("Query Failed!" . mysqli_error($connect));
            		}else
            		{
            			header("Location: all-posts.php");
            		}

        	}
        ?>


     
<?php include "includes/footer.php";?>