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
<?php include "includes/footer.php";?>
<?php
if ($password == $re_password) {
                                  $hassedPass = sha1($password);
                                  $query = "INSERT INTO users (name, username, password, user_email, user_phone, user_address, user_avater, user_role, is_active, join_date) VALUES ('$name', '$username', '$hassedPass', '$email', '$phone', '', '', 1, 0, now())";
                                  $register_user = mysqli_query($connect,$query);
                                  if (!$register_user) {
                                    die("Registration Failed");
                                  }
                                  else{
                                    header("Location: index.php");
                                  }
                                  ?>