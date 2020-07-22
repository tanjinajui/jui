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

  <title>Doiroth</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/custom.css" rel="stylesheet" type="text/css">

</head>

<body class="bg-gradient-primary">

  <div class="container">
  <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="container">
        <div id="login-box" class="card o-hidden border-0 shadow-lg my-5 mx-auto" style="max-width: 450px">
          <div class="card-body py-5 px-3">
            <!-- Nested Row within Card Body -->
            <div class="m-auto w-100">
              <div class="text-center">
                <h1 class="title text-gray-900 mb-4">Login</h1>
              </div>
                  <form class="user" action="" method="POST">
                    <div class="form-group">
                      <input type="email" class="form-control text-center form-control-user" name="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control text-center form-control-user" name="password" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <input type="submit" name="login" class="btn btn-login btn-user btn-block" value="Login">
                    <hr>
                    <a href="index.html" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a>
                  </form>
                  <?php
                    if (isset($_POST['login'])) {
                     //SQL injection function
                      $email       = mysqli_real_escape_string($connect,$_POST['email']);
                      $password    = mysqli_real_escape_string($connect,$_POST['password']);
                      //Encrypted password
                      $hassedPass = sha1($password);
                     // $hassedPass = sha1($re_password);
                      $query = "SELECT * FROM users WHERE user_email = '$email'";
                      $auth_user = mysqli_query($connect, $query);
                      while ($row = mysqli_fetch_array($auth_user)) {
                        //SESSION super global variable
                        $_SESSION['user_id']      = $row['user_id'];
                        $_SESSION['first_name']   = $row['first_name'];
                        $_SESSION['last_name']    = $row['last_name'];
                        $_SESSION['name']         = $row['name'];
                        $password                 = $row['password'];                      
                        $_SESSION['user_email']   = $row['user_email'];
                        $_SESSION['user_phone']   = $row['user_phone'];
                        $_SESSION['user_avater']  = $row['user_avater'];
                        $_SESSION['user_type']    = $row['user_type'];
                        $_SESSION['added_by']     = $row['added_by'];
                        if ($email == $_SESSION['user_email'] && $hassedPass == $password) 
                        {
                          header("Location: dashboard.php");
                        }
                        else if($email!=$_SESSION['user_email'] || $hassedPass != $password)
                        {
                          header("Location: index.php");
                        }
                        else
                        {
                          header("Location: index.php");
                        }
                      }
                    }
                  ?>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        

        </div>
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
