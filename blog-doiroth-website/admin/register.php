<?php 
ob_start();
session_start();
include "../includes/db.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

 <div class="container">
    <div class="col-md-12">
                  <!-- Add New User Field Start -->                
                  <div class="card o-hidden border-0 shadow-lg my-5">
                    <!-- Card Section Body-->
                    <div class="card-body p-0">
                      <!-- Add User Form Start -->
                      <div class="row">
                        <div class="col-12 text-center">
                          <div class="p-5 m-auto" style="max-width:600px">
                            <!-- Card Section Title-->
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                          <!-- Post Method-->
                          <!-- Form Part Start-->
                          <form action="?do=Insert" method="POST" enctype="multipart/form-data">
                              <div class="form-group row">
                                <!-- First Name Field-->
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control " name="first_name" id="first_name" placeholder="First Name" required="required" autocomplete="off">
                                    </div>
                                    <!-- Last Name Field-->
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control " name="last_name" id="last_name" placeholder="Last Name" required="required" autocomplete="off">
                                    </div>
                                </div>
                                <!-- Email Field-->
                                <div class="form-group">
                                    <input type="email" class="form-control " name="email" id="email" placeholder="Email Address" required="required" autocomplete="off">
                                </div>
                                <!-- Phone Number Field-->
                                <div class="form-group">
                                    <input type="text" class="form-control " name="phone_number" id="phone_number" placeholder="Phone Number" required="required" autocomplete="off">
                                </div>
                                <div class="form-group row">
                                  <!-- Password Field-->
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control " id="password" placeholder="Minimum 8 characters" required="required" autocomplete="off" >
                                    </div>
                                    <!-- Re Password Field-->
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" id="password-confirm" name="repeat_password" placeholder="Repeat Password" required="required" autocomplete="off">
                                    </div>
                                </div>
                                <!-- Profile-picture Field-->
                                <div class="custom-file form-group text-left">
                                    <input type="file" class="custom-file-input mt-3" id="profile_picture"
                                           name="profile_picture">
                                    <label class="custom-file-label" for="customFile">Profile Picture</label>
                                </div>
                                <input type="submit" name="register" value="Register Account" class="btn btn-primary btn-user btn-block mt-4">
                              </form>
                            <?php 
                              if (isset($_POST['register'])) {
                                $first_name = mysqli_real_escape_string($connect, $_POST['first_name']);
                                $last_name = mysqli_real_escape_string($connect, $_POST['last_name']);
                                $email = mysqli_real_escape_string($connect, $_POST['email']);
                                $phone_number = mysqli_real_escape_string($connect, $_POST['phone_number']);
                                $password = mysqli_real_escape_string($connect, $_POST['password']);
                                $repeat_password = mysqli_real_escape_string($connect, $_POST['repeat_password']);
                                $profile_picture      = $_FILES['profile_picture'];
                                $profile_picture_name = $_FILES['profile_picture'] ['name'];
                                $profile_picture_size = $_FILES['profile_picture'] ['size'];
                                $profile_picture_type = $_FILES['profile_picture'] ['type'];
                                $profile_picture_tmp  = $_FILES['profile_picture'] ['tmp_name'];             

                                $profile_pictureAllowedExtension = array('jpg', 'jpeg', 'png');
                                $profile_pictureExtension        = strtolower(end(explode('.', $profile_picture_name)));

                                $formErrors = array();
                                if (strlen($password) < 8) {
                                  $formErrors = 'Password Minimum 8 Character';
                                }
                                if ($password != $repeat_password) {
                                  $formErrors = 'Password Doesn\'t Match';
                                }
                                if (!empty($profile_picture_name) && !in_array($profile_pictureExtension, $profile_pictureAllowedExtension)) {
                                  $formErrors = 'Please Upload Valid Image Format';
                                }
                                if (!empty($profile_picture_size) && $profile_picture_size > 2097152) {
                                  $formErrors = 'Image Size is larger then 2MB';
                                }
                                foreach ($formErrors as $error) {
                                  echo '<div class = "alert alert-danger">' . $error . '</div>';
                                }                                
                                if ($password == $repeat_password) {
                                  //Encrypted Password
                                  $hassedPass = sha1($password);
                                  }
                                if (empty($formErrors)) {
                                $name = $first_name . $last_name;
                                $profile_picture = rand(0,200000) . '_' . $profile_picture_name;
                                move_uploaded_file($profile_picture_tmp, "img\users_profile_image\\" . $profile_picture);
                                $query = "INSERT INTO users (first_name, last_name, name, password, user_email, user_phone, user_avater) VALUES ('$first_name', '$last_name', '$name', '$hassedPass', '$email', '$phone_number', '$profile_picture')";
                                //echo $query;
                                $register_user = mysqli_query($connect,$query);
                                if (!$register_user) {
                                  die("Registration Failed!");
                                }
                                else{
                                  header("Location: index.php");
                                }
                              }
                                
                              }
                             ?>
                       </div>
                    </div>
                    <!-- Col-12 end-->
                    </div>
                    <!-- Row end-->
                   </div> 
                   <!-- Card Section Body-->
                  </div>
                </div>
              </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
<?php ob_end_flush(); ?>
