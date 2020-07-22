<?php include "includes/header.php"; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">View All User Details</h1>
          <?php
          	$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
          	if ($do == 'Manage') {
          		echo "All Users Page";
          	}
          	else if ($do == "Add") {
          		echo "Add New User Page";
          	}
          	else if ($do == "Insert") {
          		echo "Add New Users info into the DB";
          	}
          	else if ($do == "Edit") {
          		echo "User Profile Update Page";
          	}
          	else if ($do == "Update") {
          		echo "Update New Users info into the DB";
          	}
          	else if ($do == "Delete") {
          		echo "This is the user delete page";
          	}
          ?>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php include "includes/footer.php";?>
<?php include "includes/header.php"; ?>
<?php
        if (empty($formErrors)) {
                            if (!empty($profile_picture_name)) 
                            {
                            $profile_picture = rand(0,200000) . '_' . $profile_picture_name;
                            move_uploaded_file($profile_picture_tmp, "img\users_profile_image\\" . $profile_picture);
                            //Delete the existing image to the folder
                              $delete_img_query = "SELECT * FROM users WHERE user_id = '$update_user_id'";
                              $delete_img = mysqli_query($connect, $delete_img_query);
                              while ($row = mysqli_fetch_assoc($delete_img)) {
                                $existing_avater = $row ['user_avater'];
                              }
                              //Image Delete function
                              unlink("img\users_profile_image/". $existing_avater);
                              $query = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', user_email = '$email', user_phone = '$phone_number', user_avater = '$profile_picture', user_type = '$user_type' WHERE user_id = '$update_user_id'";
                              //echo $query;
                              $update_user = mysqli_query($connect,$query);
                              if (!$update_user) {
                                die("Query Failed!" . mysqli_error($connect));;
                              }
                              else{
                                header("Location: users.php?do=Manage");
                              }
                            }
                            else
                            {
                              $query = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', user_email = '$email', user_phone = '$phone_number', user_type = '$user_type' WHERE user_id = '$update_user_id'";
                              //echo $query;
                              $update_user = mysqli_query($connect,$query);
                              if (!$update_user) {
                                die("Query Failed!" . mysqli_error($connect));;
                              }
                              else{
                                header("Location: users.php?do=Manage");
                              }
                              ?>