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
<?php
$name         = $_POST['name'];
                          $username     = $_POST['username'];                        
                          $email        = $_POST['email'];
                          $phone        = $_POST['phone'];
                          $user_address = $_POST['user_address'];
                          $user_role    = $_POST['user_role'];
                          $password     = $row['password'];
                          $re_password  = $row['re_password'];
                          $avater       = $_FILES['avater'];
                          $avater_name  = $_FILES['avater'] ['name'];
                          $avater_size  = $_FILES['avater'] ['size'];
                          $avater_type  = $_FILES['avater'] ['type'];
                          $avater_tmp   = $_FILES['avater'] ['tmp_name'];             

                          $avaterAllowedExtension = array('jpg', 'jpeg', 'png');
                          $avaterExtension        = strtolower(end(explode('.', $avater_name)));

                          $formErrors = array();
                          if (strlen($username) < 4) {
                            $formErrors = 'Username is too Small';
                          }
                          if ($password != $re_password) {
                            $formErrors = 'Password Doesn\'t Match';
                          }
                          if (!empty($avater_name) && !in_array($avaterExtension, $avaterAllowedExtension)) {
                            $formErrors = 'Please Upload Valid Image Format';
                          }
                          if (!empty($avater_size) && $avater_size > 2097152) {
                            $formErrors = 'Image Size is larger then 2MB';
                          }
                          foreach ($formErrors as $error) {
                            echo '<div class = "alert alert-danger">' . $error . '</div>';
                          }
                          if (empty($formErrors)) {                           
                            $avater = rand(0,200000) . '_' . $avater_name;
                            move_uploaded_file($avater_tmp, "img\users_avater\\" . $avater);
                            // Delete the users existing image from folder--                            
                            $delete_img_query = "SELECT * FROM users WHERE user_id = '$user_id' ";
                            $delete_img = mysqli_query($connect, $delete_img_query);
                            while ($row = mysqli_fetch_assoc($delete_img)) {
                              $user_avater  = $row['user_avater'];
                            }
                            unlink("img/users_avater/". $user_avater);
                            $query = "UPDATE users SET name = '$name', username = '$username', user_email = '$email', user_phone = '$phone', user_address = '$user_address', user_avater = '$avater', user_role = '$user_role' WHERE user_id = '$update_user_id' "; 
                            $update_user = mysqli_query($connect,$query);                
                            if (!$update_user) {
                              die("Query Failed!" . mysqli_error($connect));;
                            }
                            else{
                              header("Location: users.php?do=Manage");
                            }
                          }
?>