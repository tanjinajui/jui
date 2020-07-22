<?php include "includes/header.php"; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="col-lg-12">
            <!-- Page Heading -->
            <h3 class="h3 mb-4 text-gray-800">Sub Category List</h3>
          	<div class="card shadow mb-4">
                <!-- Card Section Body-->
                <div class="card-body">               
                  <!-- Blog Category List Table Start -->
                  <table class="table table-striped table-sm table-light">
			            
			            <thead class="thead-dark">
							<tr>
				                <th scope="col">SL.</th>
				                <th scope="col">CATEGORY NAME</th>
				                <th scope="col">SUB CATEGORY NAME</th>
				                <th scope="col">SUB CAT IN ENG</th>
				                <th scope="col" style="width: 520px;">DESCRIPTION</th>
				                <th scope="col">IMAGE</th>
				                <th scope="col">ACTIONS</th>
				            </tr>
						  </thead>
						  <tbody>
						<?php
	                      $query = "SELECT * FROM sub_category";
	                      $select_category_list = mysqli_query($connect, $query);
	                      $i= 0;
			                while ($row = mysqli_fetch_assoc($select_category_list)) {
			                  //print_r($row);
			                  $sub_category_id         	= $row['sub_category_id'];
			                  $sub_category     	    = $row['sub_category'];
			                  $sub_category_name        = $row['sub_category_name'];
			                  $sub_category_in_english  = $row['sub_category_url'];
			                  $sub_category_description = $row['sub_category_description'];         
			                  $sub_category_image       = $row['sub_category_image'];
			                  $i++;
			                    ?>
		                   <tr>
			                <th scope="row"><?php echo $i; ?></th>
			                <td>
			                	<?php
                                    $query = "SELECT * FROM category WHERE category_id = '$sub_category'";
                                    $all_category = mysqli_query($connect, $query);
                                    while ($row = mysqli_fetch_assoc($all_category)) {
                                      $category_id = $row['category_id'];
                                      $category_name = $row['category_name'];
                                      }
                                      echo $category_name;                   
                                  ?>
			                </td>
			                <td><?php echo $sub_category_name; ?></td>
			                <td><?php echo $sub_category_in_english; ?></td>
			                <td><?php echo $sub_category_description; ?></td>
			                <td><?php echo $sub_category_image; ?></td>
			                <td> 
			                  <div class="btn-group">
			                          <a href="update-sub-category.php?update=<?php echo $sub_category_id; ?>" class="btn btn-primary btn-sm">Update</a>
			                          <a href="all-sub-categories.php?delete=<?php echo $sub_category_id; ?>" class="btn btn-danger btn-sm">Delete</a>  
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
        		$delete_img_query = "SELECT * FROM sub_category WHERE sub_category_id = '$delete_category_id'";
        		$delete_img = mysqli_query($connect, $delete_img_query);
        		while ($row = mysqli_fetch_assoc($delete_img)) {
        			$sub_category_image = $row['sub_category_image'];
        		}

        		//Image Delete function
                unlink("img/sub_category_image/". $sub_category_image);
        		//Database post delele
        		$query = "DELETE FROM sub_category WHERE sub_category_id = '$delete_category_id'";
        		$delete_category = mysqli_query($connect, $query);
        		if (!$delete_category) {
			        die ("Query Failed!" . mysqli_error($connect));
			      }else{
			        header("Location: all-sub-categories.php");
			      } 
        	}
        ?>      
        <?php include "includes/footer.php";?>   