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
					      <th scope="col">Sl.</th>
					      <th scope="col">Title</th>
					      <th scope="col">Author</th>
					      <th scope="col">Post Category</th>
					      <th scope="col">Post Status</th>
					      <th scope="col">Post Date</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>

					  	<?php
					  	//View All Posts Codes Are Here---
					  		$query = "SELECT * FROM posts";
					  		$select_all_post = mysqli_query($connect, $query);
					  		$i= 0;
					  		while ($row = mysqli_fetch_assoc($select_all_post)) {
					  			$post_id    	    = $row['post_id'];
					  			$post_title 	    = $row['post_title'];
					  			$post_description   = $row['post_description'];
					  			$post_author 	    = $row['post_author'];
					  			$post_thumb 	    = $row['post_thumb'];
					  			$post_category   = $row['post_category'];
					  			$post_tags 		    = $row['post_tags'];
					  			$post_status        = $row['post_id'];
					  			$post_date          = $row['post_date'];
					  			$i++;
					  		
					  	  echo '<tr>';
					      echo '<th scope="row">'. $i .'</th>';
					      echo '<td>' . $post_title . '</td>';
					      echo '<td>' . $post_author . '</td>';
					      echo '<td>' . $post_category . '</td>';
					      echo '<td>' . $post_status . '</td>';
					      echo '<td>' . $post_date . '</td>';
					      echo '<td> 
					      	<div class="btn-group">
					      					<a href="" class="btn btn-primary btn-sm">Update</a>
					      					<a href="" class="btn btn-danger btn-sm">Delete</a>	
					      				</div>
					       </td>';
					      echo '</tr>';

					  		}
					  	?>
					   
					  </tbody>
				 </table>
                  <!-- Blog Post List Table Start -->
                </div>
              </div>
          	</div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php include "includes/footer.php";?>