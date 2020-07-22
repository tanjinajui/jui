<?php include "includes/header.php"; ?>

<!-- container-fluid -->
        <div class="container-fluid">
          <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="row">
                	<div class="col-12">
                		<div class="p-5 m-auto">
                			<div class="text-center">
                				<h1 class="h4 text-gray-900 mb-4">Create New Post!</h1>
                			</div>
                			<form action="" method="POST" enctype="multipart/form-data">
                    			<div class="custom-file form-group text-left mb-3">
                                    <input type="file" class="custom-file-input" id="cover_image" name="cover_image">
                                    <label class="custom-file-label" for="cover_image">Featured image</label>
                                </div>
                                <div class="form-group">
                                    <label for="caption">Featured Image Caption</label>
                                    <input type="text" name="caption" class="form-control " id="caption"
                                           value="" placeholder="Feature image caption" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="title">Post Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control " id="title"
                                           value="" placeholder="Post Title" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="title_in_english">Post URL <span class="text-danger">*</span></label>
                                    <input type="text" name="title_in_english" class="form-control "
                                           id="title_in_english" value="" placeholder="Post URL" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="summary">Post Summary <span class="text-danger">*</span></label>
                                    <textarea class="form-control " id="summary" rows="3" placeholder="Write your post summary here..." name="summary"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="description">Post Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control ckeditor" id="description" rows="3" placeholder="Description" name="description"></textarea>
                                </div>
                    			<div class="row">
                                   <div class="col-sm-6 col-12">
                                    <div class="form-group mt-3">
                                        <label for="category_id">Select Category <span class="text-danger">*</span></label>
                                        <select class="form-control" name="post_category_id" id="category_id" required>
                                        <option selected disabled>Select Category</option>
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
                                </div>
                                <div class="col-sm-6 col-12">
                                    <div class="form-group mt-3">
                                        <label for="sub_category_id">Select sub Category</label>
                                        <select class="form-control" name="post_sub_category_id" id="sub_category_id">
                                            <option selected disabled>Select Sub Category</option>
                                            <?php
                                                $query = "SELECT * FROM sub_category";
                                                $all_sub_category = mysqli_query($connect, $query);
                                                while ($row = mysqli_fetch_assoc($all_sub_category)) {
                                                  $sub_category_id   = $row['sub_category_id'];
                                                  $sub_category_name = $row['sub_category_name'];
                                                  ?>
                                                  <option value="<?php echo $sub_category_id;?>"><?php echo $sub_category_name;?></option>
                                              <?php   
                                                }
                                              ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <div class="form-group mt-3">
                                        <label for="keywords">Key Word</label>
                                        <input name="keywords" id="keywords" type="text" class="form-control" placeholder="Keywords (a,b,c)" value="">
                                    </div>
                                </div>
                            <div class="col-sm-6 col-12">
                                <div class="form-group mt-3">
                                    <label for="reading_time">Reading Time</label>
                                    <input type="number" name="reading_time" id="reading_time" min="1"
                                           placeholder="Reading time" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user_id">Assign Author <span class="text-danger">*</span></label>
                            <select class="form-control selectpicker" name="user_author" id="user_id" data-live-search="true">
                                <option selected disabled>Select Author</option>
                                <?php
                                            $query = "SELECT * FROM users";
                                            $all_users = mysqli_query($connect, $query);
                                            while ($row = mysqli_fetch_assoc($all_users)) {
                                              $user_id = $row['user_id'];
                                              $name = $row['name'];
                                              ?>
                                              <option value="<?php echo $user_id;?>"><?php echo $name;?></option>
                                          <?php   
                                            }
                                          ?>
                                                                    
                            </select>
                        </div>
                        <hr class="mt-5">
                        <div class="meta-content">
                            <h5>Page SEO Content</h5>
                            <div class="form-group">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" name="meta_title" id="meta_title" class="form-control" placeholder="Meta Title" value="">
                            </div>
                            <div class="form-group">
                                <label for="meta_description">Meta Description</label>
                                <textarea name="meta_description" id="meta_description" class="form-control" placeholder="Meta Description"></textarea>
                            </div>
                        </div>
                        <hr>
                        <!--<div class="form-group" style="font-size: 18px">
                            <label for="is_ia" class="text-success">
                                <input type="checkbox" name="is_ia" value="1" id="is_ia">&nbsp;Add to instant article?
                            </label>
                        </div>-->
                        <div class="form-group text-center">
                            
                            <input type="submit" name="submitButton" id="2" value="SAVE AS DRAFT" value="0" class="btn btn-dark btn-user mx-2 mb-2" style="min-width: 150px">
                            <input type="submit" name="submitButton" value="PREVIEW" id="1" 
                                   class="btn btn-info btn-user mx-2 mb-2" style="min-width: 150px">
                            <input type="submit" name="submitButton" value="PUBLISH"  
                                   class="btn btn-success btn-user mx-2 mb-2" style="min-width: 150px">
                        </div>

                			</form>
                		</div>
                	</div>
                </div>
              </div>
            </div>
 		</div>
 		<?php
 			if (isset($_POST['submitButton'])) {
                //echo "yes";

                    if ($submitButton == 2) {
                      header("Location: draft-post.php");
                    }
                    else if ($submitButton == 1) {
                     header("Location: pending-post.php");
                    }
                    else if($submitButton == 0){
                      header("Location: published-post.php");
                    }else{

                      header("Location: create-posts.php");
                //how to show data in a table without login user in php stackoverflow
 				//image upload--
                    }
     //            $cover_image      = $_FILES['cover_image'];
     //            $cover_image_name  = $_FILES['cover_image']['name'];
     //            $cover_image_size  = $_FILES['cover_image']['size'];
     //            $cover_image_temp  = $_FILES['cover_image']['tmp_name'];
     //            $cover_image_type  = $_FILES['cover_image']['type'];
     //            $postAllowedExtension = array("jpg", "jpeg", "png");
     //            $postExtension        = strtolower(end(explode('.',$cover_image_name)));

     //            $caption              = $_POST['caption'];
 				// $title 		          = $_POST['title'];
 				// $title_in_english     = $_POST['title_in_english'];
 				// $summary 	          = $_POST['summary'];
 				// $description 	      = $_POST['description'];
     //            $post_category_id     = $_POST['post_category_id'];
     //            $post_sub_category_id = $_POST['post_sub_category_id'];
     //            $keywords             = $_POST['keywords'];
     //            $reading_time         = $_POST['reading_time'];
     //            $user_author          = $_POST['user_author'];
     //            $meta_title           = $_POST['meta_title'];
     //            $meta_description     = $_POST['meta_description'];
 				// $submitButton = "";
     //            if ($submitButton == 0) {
     //               echo "PUBLISH";
     //            }else if ($submitButton == 1) {
     //                echo "PREVIEW";
     //            }
        		// $formErrors = array();
        		// if (strlen($title)<10) {
        		// 	$formErrors = 'Title is too Small';
        		// }
        		// if (empty($cover_image_name)) {
        		// 	$formErrors = 'Please Upload Blog Category Image';
        		// }if (!empty($cover_image_name) && !in_array($postExtension, $postAllowedExtension)) {
        		// 	$formErrors = 'Please Upload JPG, JPEG or PNG Image';
        		// }
               
        		// foreach ($formErrors as $error) {
          //           echo '<div class = "alert alert-warning">' . $formErrors . '</div>';
          //       }

        		// if (!empty($cover_image_name)){
        		// 	$cover_image = rand(0,100000) . '_' . $cover_image_name;
        		// 	//image Upload Function
        		// 	move_uploaded_file($cover_image_temp, "img/post_image/$cover_image");
        		// 	$query = "INSERT INTO posts (post_featured_image, post_featured_image_cap, post_title,   post_url, post_summary, post_description, post_category, post_sub_category, post_keyword, post_reading_time, post_author, post_meta_title,  post_meta_description) VALUES ('$cover_image', '$caption', '$title', '$title_in_english', '$summary', '$description', '$post_category_id', '$post_sub_category_id', '$keywords', '$reading_time', '$user_author', '$meta_title', '$meta_description')";

		        // 		$add_new_category = mysqli_query($connect, $query);
				    		// if(!$add_new_category)
				    		// {
				    		// 	die("Query Failed!" . mysqli_error($connect));
				    		// }else
				    		// {
				    		// 	header("Location: all-categories.php");
				    		// }
                echo $query;
		        //}
 			}
 		?>
       
 <!-- container-fluid -->
 <?php include "includes/footer.php";?>