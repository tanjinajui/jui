<?php include "includes/header.php"; ?>

<!-- container-fluid -->
        <div class="container-fluid">
          <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="row">
                	<div class="col-12 text-center">
                		<div class="p-5 m-auto" style="max-width:600px">
                			<div class="text-center">
                				<h1 class="h4 text-gray-900 mb-4">Create New Sub Category!</h1>
                			</div>
                			<form action="" method="POST" enctype="multipart/form-data">
                				<div class="form-group">
                					<input type="text" name="sub_category_name" class="form-control" id="sub_category_name" placeholder="Sub Category Name" autocomplete="off" required="required">
                				</div>
                				<div class="form-group">
                					<input type="text" name="sub_category_in_english" class="form-control" id="sub_category_in_english" placeholder="Sub category name in english" autocomplete="off" required="required">
                				</div>
                				<div class="form-group">
                					<textarea class="form-control" name="sub_category_description" id="sub_category_description" rows="3" placeholder="Sub Category Description"></textarea>
                				</div>
                				<div class="custom-file form-group text-left">
                					<input type="file" class="custom-file-input" id="sub_category_image" name="sub_category_image">
                					<label class="custom-file-label">Sub Category Image</label>
                				</div>                			
                                <!-- Post-Category Field-->
                                <div class="form-group">
                                <select class="form-control" name="sub_category">
                                  <option>Please Select the Category</option>
                                  <?php
                                    $query = "SELECT * FROM category";
                                    $all_category = mysqli_query($connect, $query);
                                    while ($row = mysqli_fetch_assoc($all_category)) {
                                      $category_id = $row['category_id'];
                                      $category_name = $row['category_name'];
                                      ?>
                                      <option value="<?php echo $category_id;?>"><?php echo $category_name;?></option>
                                  <?php   
                                    }
                                  ?>
                                </select>
                                </div>
                				<input type="submit" name="create_sub_category" class="btn btn-primary btn-user btn-block mt-5" value="Create Sub Category">
                			</form>
                		</div>
                	</div>
                </div>
              </div>
            </div>
 		</div>
 		<?php
 			if (isset($_POST['create_sub_category'])) {
 				$sub_category_name        = $_POST['sub_category_name'];
 				$sub_category_in_english  = $_POST['sub_category_in_english'];
 				$sub_category_description = $_POST['sub_category_description'];
 				$sub_category 	          = $_POST['sub_category'];
 				//image upload--
        		$sub_category_image 	  = $_FILES['sub_category_image'];
        		$sub_category_image_name  = $_FILES['sub_category_image']['name'];
        		$sub_category_image_size  = $_FILES['sub_category_image']['size'];
        		$sub_category_image_temp  = $_FILES['sub_category_image']['tmp_name'];
        		$sub_category_image_type  = $_FILES['sub_category_image']['type'];
        		$categoryAllowedExtension = array("jpg", "jpeg", "png");
        		$categoryExtension        = strtolower(end(explode('.',$sub_category_image_name)));

        		$formErrors = array();
        		if (strlen($sub_category_name)<10) {
        			$formErrors = 'Category name is too Small';
        		}
        		if (empty($sub_category_image_name)) {
        			$formErrors = 'Please Upload Blog Category Image';
        		}if (!empty($sub_category_image_name) && !in_array($categoryExtension, $categoryAllowedExtension)) {
        			$formErrors = 'Please Upload JPG, JPEG or PNG Image';
        		}
        		foreach ($formErrors as $error) {
                    echo '<div class = "alert alert-warning">' . $formErrors . '</div>';
                }

        		if (!empty($sub_category_image_name)){
        			$sub_category_image = rand(0,100000) . '_' . $sub_category_image_name;
        			//image Upload Function
        			move_uploaded_file($sub_category_image_temp, "img/sub_category_image/$sub_category_image");
        			$query = "INSERT INTO sub_category (sub_category_name, sub_category_url, sub_category_description, sub_category_image, sub_category) VALUES ('$sub_category_name', '$sub_category_in_english', '$sub_category_description', '$sub_category_image', '$sub_category')";

		        		$add_new_sub_category = mysqli_query($connect, $query);
				    		if(!$add_new_sub_category)
				    		{
				    			die("Query Failed!" . mysqli_error($connect));
				    		}else
				    		{
				    			header("Location: all-sub-categories.php");
				    		}
                //echo $query;
		        }
 			}
 		?>
 <!-- container-fluid -->
 <?php include "includes/footer.php";?>