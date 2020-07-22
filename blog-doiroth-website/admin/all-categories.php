<?php include "includes/header.php"; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="col-lg-12">
         		 <!-- Page Heading -->
          		<h3 class="h3 mb-4 text-gray-800">Category List</h3>
          		<div class="card shadow mb-4">
                <!-- Card Section Body-->
                <div class="card-body">               
                  <!-- Blog Category List Table Start -->
                  <table class="table table-striped table-sm table-light">
			            
			            <thead class="thead-dark">
						    <tr>
						      <th scope="col">SL.</th>
		                      <th scope="col">CATEGORY NAME</th>
		                      <th scope="col">CAT NAME EN</th>
		                      <th scope="col" style="width: 520px;">DESCRIPTION</th>
		                      <th scope="col">IMAGE</th>
		                      <th scope="col">ACTIONS</th>
						    </tr>
						  </thead>
						  <tbody>
						<?php
                      $query = "SELECT * FROM category";
                      $select_category_list = mysqli_query($connect, $query);
                      $i= 0;
		                while ($row = mysqli_fetch_assoc($select_category_list)) {
		                  //print_r($row);
		                  $category_id          = $row['category_id'];
		                  $category_name        = $row['category_name'];
		                  $category_url         = $row['category_url'];
		                  $category_description = $row['category_description'];
		                  $category_keyword     = $row['category_keyword'];
		                  $category_image       = $row['category_image'];
		                  $category_color     	= $row['category_color'];
		                  $i++;
		                    ?>
		                   <tr>
			                <th scope="row"><?php echo $i; ?></th>
			                <td><?php echo $category_name; ?></td>
			                <td><?php echo $category_url; ?></td>
			                <td><?php echo $category_description; ?></td>
			                <td><?php echo $category_image; ?></td>
			                <td> 
			                  <div class="btn-group">
			                          <a href="update-category.php?update=<?php echo $category_id; ?>" class="btn btn-primary btn-sm">Update</a>
			                          <a href="all-categories.php?delete=<?php echo $category_id; ?>" class="btn btn-danger btn-sm">Delete</a>  
			                        </div>
			                 </td>
			                </tr>
			                <?php
			                }
			              ?>        
						   
						  </tbody>
				 </table>
                  <!-- Blog Category List Table Start -->
                </div>
                <!-- Card Section Body-->
              </div>
         	</div>
        <!-- /.container-fluid -->
       </div> 
       <?php 
        	if (isset($_GET['delete'])) {
        		$delete_category_id = $_GET['delete'];

        		//delete image query
        		$delete_img_query = "SELECT * FROM category WHERE category_id = '$delete_category_id'";
        		$delete_img = mysqli_query($connect, $delete_img_query);
        		while ($row = mysqli_fetch_assoc($delete_img)) {
        			$category_image = $row['category_image'];
        		}

        		//Image Delete function
                unlink("img/category_image/". $category_image);
        		//Database post delele
        		$query = "DELETE FROM category WHERE category_id = '$delete_category_id'";
        		$delete_category = mysqli_query($connect, $query);
        		if (!$delete_category) {
			        die ("Query Failed!" . mysqli_error($connect));
			      }else{
			        header("Location: all-categories.php");
			      } 
        	}
        ?>         
        <?php include "includes/footer.php";?>