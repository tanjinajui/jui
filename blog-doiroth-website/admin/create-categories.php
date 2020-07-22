<?php include "includes/header.php"; ?>

<!-- container-fluid -->
        <div class="container-fluid">
          <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="row">
                	<div class="col-12 text-center">
                		<div class="p-5 m-auto" style="max-width:600px">
                			<div class="text-center">
                				<h1 class="h4 text-gray-900 mb-4">Create New Category!</h1>
                			</div>
                			<form action="" method="POST" enctype="multipart/form-data">
                				<div class="form-group">
                					<input type="text" name="category_name" class="form-control" id="category_name" placeholder="Category Name" autocomplete="off" required="required">
                				</div>
                				<div class="form-group">
                					<input type="text" name="category_url" class="form-control" id="category_url" placeholder="Category URL" autocomplete="off" required="required">
                				</div>
                				<div class="form-group">
                					<textarea class="form-control" name="category_description" id="category_description" rows="3" placeholder="Description"></textarea>
                				</div>
                				<div class="form-group">
                					<input type="text" name="category_keyword" class="form-control" id="category_keyword" placeholder="Key Words" autocomplete="off" required="required">
                				</div>
                				<div class="custom-file form-group text-left">
                					<input type="file" class="custom-file-input" id="category_image" name="category_image">
                					<label class="custom-file-label">Image</label>
                				</div>
                				<div class="form-group">
                					<input type="text" name="category_color" class="form-control mt-3" id="category_color" placeholder="Color Value (Hex Value e.g: #000)" autocomplete="off">
                				</div>
                				<input type="submit" name="create_category" class="btn btn-primary btn-user btn-block mt-5" value="Create Category">
                			</form>
                		</div>
                	</div>
                </div>
              </div>
            </div>
 		</div>
 		<?php
 			if (isset($_POST['create_category'])) {
 				$category_name        = $_POST['category_name'];
 				$category_url 		  = $_POST['category_url'];
 				$category_description = $_POST['category_description'];
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
        			$query = "INSERT INTO category (category_name, category_url, category_description, category_keyword, category_image, category_color) VALUES ('$category_name', '$category_url', '$category_description', '$category_keyword', '$category_image', '$category_color')";

		        		$add_new_category = mysqli_query($connect, $query);
				    		if(!$add_new_category)
				    		{
				    			die("Query Failed!" . mysqli_error($connect));
				    		}else
				    		{
				    			header("Location: all-categories.php");
				    		}
                echo $query;
		        }
 			}
 		?>
 <!-- container-fluid -->
 <?php include "includes/footer.php";?>