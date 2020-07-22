<?php include "includes/header.php"; ?>

<!-- container-fluid -->
        <div class="container-fluid">
          <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="row">
                	<div class="col-12 text-center">
                		<div class="p-5 m-auto" style="max-width:600px">
                			<div class="text-center">
                				<h1 class="h4 text-gray-900 mb-4">Edit Category!</h1>
                			</div>
                            <?php
                            //To read all the information of an user
                                if (isset($_GET['update'])) {
                                    $the_category_id = $_GET['update'];
                                    $query = "SELECT * FROM category WHERE category_id = $the_category_id";
                                    $select_category_id = mysqli_query($connect, $query);
                                    while ($row = mysqli_fetch_assoc($select_category_id)) {
                                        $category_id = $row['category_id'];
                                        $category_name = $row['category_name'];
                                        $category_url = $row['category_url'];
                                        $category_description = $row['category_description'];
                                        $category_keyword = $row['category_keyword'];
                                        $category_image = $row['category_image'];
                                        $category_color = $row['category_color'];
                                        //echo $category_id;
                                        ?>
                                <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" name="category_name" class="form-control" id="category_name" placeholder="Category Name" value="<?php echo $category_name ?>" autocomplete="off" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="category_url" class="form-control" id="category_url" placeholder="Category URL" value="<?php echo $category_url ?>" autocomplete="off" required="required">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="category_description" id="category_description" rows="3" placeholder="Description"><?php echo $category_description ?></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="category_keyword" class="form-control" id="category_keyword" placeholder="Key Words" value="<?php echo $category_keyword ?>" autocomplete="off" required="required">
                                </div>
                                <div class="custom-file form-group text-left">
                                    <input type="file" class="custom-file-input" id="category_image" name="category_image">
                                    <img src="img/category_image/<?php echo $category_image; ?>" width = "200">
                                    <label class="custom-file-label">Image</label>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="category_color" class="form-control mt-3" id="category_color" placeholder="Color Value (Hex Value e.g: #000)" value="<?php echo $category_color ?>" autocomplete="off">
                                </div>
                                <input type="submit" name="update_category" class="btn btn-primary btn-user btn-block mt-5" value="Update Category">
                            </form>
                             <?php }
                                }
                            ?>
                			
                		</div>
                	</div>
                </div>
              </div>
            </div>
 		</div>
 		<?php
 			if (isset($_POST['update_category'])) {
 				$category_name        = mysqli_real_escape_string($connect, $_POST['category_name']);
 				$category_url 		  = mysqli_real_escape_string($connect, $_POST['category_url']);
 				$category_description = mysqli_real_escape_string($connect, $_POST['category_description']);
 				$category_keyword 	  = $_POST['category_keyword'];
 				$category_color 	  = $_POST['category_color'];
 				//image upload--
        		$category_image 	  = $_FILES['category_image'];
        		$category_image_name  = $_FILES['category_image']['name'];
        		$category_image_size  = $_FILES['category_image']['size'];
        		$category_image_temp  = $_FILES['category_image']['tmp_name'];
        		$category_image_type  = $_FILES['category_image']['type'];
        		$categoryAllowedExtension = array("jpg", "jpeg", "png");
        		$categoryExtension        = strtolower(end(explode('.',$category_image_name)));

        		$formErrors = array();
        		if (strlen($category_name)<10) {
        			$formErrors = 'Category name is too Small';
        		}
        		if (empty($category_image_name)) {
        			$formErrors = 'Please Upload Blog Category Image';
        		}if (!empty($category_image_name) && !in_array($categoryExtension, $categoryAllowedExtension)) {
        			$formErrors = 'Please Upload JPG, JPEG or PNG Image';
        		}
        		foreach ($formErrors as $error) {
                    echo '<div class = "alert alert-warning">' . $formErrors . '</div>';
                }

        		if (!empty($category_image_name)){
        			$category_image = rand(0,100000) . '_' . $category_image_name;
        			//image Upload Function
        			move_uploaded_file($category_image_temp, "img/category_image/$category_image");
                    $delete_img_query = "SELECT * FROM category WHERE category_id = '$category_id'";
                    $delete_img = mysqli_query($connect, $delete_img_query);
                    while ($row = mysqli_fetch_assoc($delete_img)) {
                        $category_image = $row['category_image']; 
                    }
                    //Image Delete function
                    unlink("img/category_image/". $category_image);

        			$query = "UPDATE category SET category_name = '$category_name', category_url = '$category_url', category_description = '$category_description', category_keyword = '$category_keyword', category_image = '$category_image', category_color = '$category_color' WHERE category_id = '$category_id'";
                    //echo $query;
		        		$update_category = mysqli_query($connect, $query);
				    		if(!$update_category)
				    		{
				    			die("Query Failed!" . mysqli_error($connect));
				    		}else
				    		{
				    			header("Location: all-categories.php");
				    		}
		                  }else
                          {
                            $query = "UPDATE category SET category_name = '$category_name', category_url = '$category_url', category_description = '$category_description', category_keyword = '$category_keyword', category_color = '$category_color' WHERE category_id = '$category_id'";
                    //echo $query;
                        $update_category = mysqli_query($connect, $query);
                            if(!$update_category)
                            {
                                die("Query Failed!" . mysqli_error($connect));
                            }else
                            {
                                header("Location: all-categories.php");
                            }
                          }
 			}
 		?>
 <!-- container-fluid -->
 <?php include "includes/footer.php";?>