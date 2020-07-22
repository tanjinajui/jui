<?php include "includes/header.php"; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="col-lg-12">
         		 <!-- Page Heading -->
          		<h3 class="h3 mb-4 text-gray-800">Blog Posts</h3>
         	</div>
         </div>

          <div class="row">
          	<div class="col-lg-12">
              <!-- Add New Category Field Start -->
              <div class="card shadow mb-4">
              	<!-- Card Section Title-->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">All Blog Posts</h6>
                </div>
                <!-- Card Section Body-->
                <div class="card-body">               
                  <!-- Blog Post List Table Start -->
                  <table class="table table-striped">
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col">SL.</th>
					      <th scope="col">TITLE</th>
					      <th scope="col">CATEGORY</th>
					      <th scope="col">POST VIEW</th>
					      <th scope="col">IS IA?</th>
					      <th scope="col">AUTHOR</th>
					      <th scope="col">ACTIONS</th>
					    </tr>
					  </thead>
					  <tbody>

					  	<?php
					  	//View All Posts Codes Are Here---
					  		$query = "SELECT * FROM posts";
					  		$select_all_post = mysqli_query($connect, $query);
					  		$i= 0;
					  		while ($row = mysqli_fetch_assoc($select_all_post)) {
					  			$post_id    	= $row['post_id'];
					  			$post_title 	= $row['post_title'];
					  			$post_category  = $row['post_category'];
					  			$post_view 	    = $row['post_view'];
					  			$is_active 	    = $row['is_active'];
					  			$post_author    = $row['post_author'];
					  			$i++;
					  		?>
					  	  <tr>
					      <th scope="row"><?php echo $i; ?></th>
					      <td><?php echo $post_title; ?></td>
					      <td>
					      	<?php 
					      	//All_Post page category name show code
					      	 	$query = "SELECT * FROM categories WHERE cat_id = '$post_category'";
					      	 	$all_category = mysqli_query($connect, $query);
					      	 	while ($row = mysqli_fetch_assoc($all_category)) {
					      	 		$cat_id = $row ['cat_id'];
					      	 		$cat_name = $row ['cat_name'];
					      	 	}
					      	 	echo $cat_name;
					      	 ?>	 	
					      </td>
					      <td><?php echo $post_view; ?></td>
					      <td><?php echo $is_active; ?></td>
					      <td><?php echo $post_author; ?></td>
					      <td> 
					      	<div class="btn-group">
					      					<a href="update-post.php?update=<?php echo $post_id; ?>" class="btn btn-primary btn-sm">Update</a>
					      					<a href="published-post.php?delete=<?php echo $post_id; ?>" class="btn btn-danger btn-sm">Delete</a>	
					      				</div>
					       </td>
					      </tr>
					      <?php
					  		}
					  	?>
					   
					  </tbody>
				 </table>
                  <!-- Blog Post List Table Start -->
                </div>
                <!-- Card Section Body-->
              </div>
          	</div>
        </div>
        <!-- /.container-fluid -->

        <?php 
        	if (isset($_GET['delete'])) {
        		$delete_post_id = $_GET['delete'];

        		//delete image query
        		$delete_img_query = "SELECT * FROM posts WHERE post_id = '$delete_post_id'";
        		$delete_img = mysqli_query($connect, $delete_img_query);
        		while ($row = mysqli_fetch_assoc($delete_img)) {
        			$thumbnail = $row ['post_thumb'];
        		}

        		//Delete Image php Function
        		unlink("img/posts_thumbnail/". $thumbnail);
        		//Database post delele
        		$query = "DELETE FROM posts WHERE post_id = $delete_post_id";
        		$delete_posts = mysqli_query($connect, $query);
        		if (!$delete_posts) {
			        die ("Query Failed!" . mysqli_error($connect));
			      }else{
			        header("Location: all-posts.php");
			      } 
        	}
        ?>
      </div>
      <!-- End of Main Content -->
<?php include "includes/footer.php";?>