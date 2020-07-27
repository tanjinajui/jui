<?php include "includes/header.php"; ?>
    <?php
      //Editor access 2 part
     // if ($_SESSION['user_role'] == 0) 
     // {?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">View All Author Details</h1>
          <?php
            $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
            if ($do == 'Manage') {?>
              <div class="row">
                <div class="col-md-12">
                  <div class="card shadow mb-4">
                  <!-- Card Section Title-->
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Author List</h6>
                      <div class="search-bar">
                        <!-- Search Form Start -->
                        <form action="" method="GET">
                            <div class="form-group form-group float-right">
                                <input type="text" name="search" placeholder="Search Here" autocomplete="off" class="form-input" required="required">
                                <input type="submit" name="doSearch" value="Search" class="btn-main">
                            </div>
                        </form>
                         
                      <!-- Search Form End -->
                      </div>
                     
                    </div>

                  <!-- Card Section Body-->
                <div class="card-body">               
                  <!-- All User Table Start -->
                  <!--id="tableSorting" add search datatable-->
                <table  class="table table-striped">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Sl.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">User Type</th>
                    <th scope="col">Added By</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  //search
                      // if (isset($_GET['doSearch'])) {
                      // $search_content = $_GET['search'];
                      // $query = "SELECT * FROM users WHERE name LIKE '%$search_content%'";
                      // //echo $query ;
                      // $all_search_author = mysqli_query($connect, $query);
                      // $totalAuthor = mysqli_num_rows($all_search_author);
                      // if ($totalAuthor == 0 || $totalAuthor < 0) 
                      // {
                      //     echo '<div class="alert alert-warning">No Found In This Author</div>';
                      // }
                      // else
                      // {
                      //   $sql = "SELECT * FROM users WHERE name LIKE '%$search_content%' ORDER BY user_id  DESC";
                      //   $all_blogs = mysqli_query($connect, $sql);
                      //   while ( $row = mysqli_fetch_assoc($all_blogs) ) {
                      //   $user_id      = $row['user_id'];
                      //   $first_name   = $row['first_name'];
                      //   $last_name    = $row['last_name'];
                      //   $name         = $row['name'];
                      //   $password     = $row['password'];
                      //   $user_email   = $row['user_email'];
                      //   $user_phone   = $row['user_phone'];
                      //   $user_avater  = $row['user_avater'];
                      //   $user_type    = $row['user_type'];
                      //   $added_by     = $row['added_by'];
                      //       }
                      //       }
                      //       } 
                               ?>
              <?php
              //View All Users Codes Are Here---
                $query = "SELECT * FROM users WHERE user_type = 1 OR user_type = 2 OR user_type = 3 ORDER BY user_id DESC";
                $select_all_user = mysqli_query($connect, $query);
                $i= 0;
                while ($row = mysqli_fetch_assoc($select_all_user)) {
                  $user_id      = $row['user_id'];
                  $first_name   = $row['first_name'];
                  $last_name    = $row['last_name'];
                  $name         = $row['name'];
                  $password     = $row['password'];
                  $user_email   = $row['user_email'];
                  $user_phone   = $row['user_phone'];
                  $user_avater  = $row['user_avater'];
                  $user_type    = $row['user_type'];
                  $added_by     = $row['added_by'];
                  $i++;
                ?>
                <tr>
                <th scope="row"><?php echo $i ?></th>
                <td><?php echo $name ?></td>
                <td><?php echo $user_email ?></td>       
                <td><?php echo $user_phone ?></td>          
                <td>
                  <?php 
                    if ($user_type == 1) {
                      echo '<span class = "badge badge-success">Administrator</span>';
                    }
                    else if ($user_type == 2) {
                      echo '<span class = "badge badge-primary">Editor</span>';
                    }
                    else if ($user_type == 3) {
                      echo '<span class = "badge badge-primary">Contributor</span>';
                    }
                    else if ($user_type == 4){
                      echo '<span class = "badge badge-danger">Suspended</span>';
                    }
                 ?>                 
                 </td> 
                 <td><?php echo $added_by ?></td>           
                <td> 
                  <div class="action-bar">
                    <ul>
                      <li><i class="fa fa-eye" data-toggle="modal" data-target="#userProfile<?php echo $user_id;?>"></i></li>
                      <li><a href="users.php?do=Edit&update=<?php echo $user_id; ?>"><i class="fa fa-edit"></i></a></li>
                      <li><i class="fa fa-trash" data-toggle="modal" data-target="#exampleModal<?php echo $user_id;?>"></i></li>
                    </ul>
                  </div>
                  <!-- Users Profile confirmation Modal -->
              <div class="modal fade" id="userProfile<?php echo $user_id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">                   
                    <div class="modal-body">
                      <div class="container">
                        <div class="row">
                          <div class="col-md-12 text-center">
                            <img src="img/users_avater/<?php echo $user_avater; ?>" class="user-profile-modal" >
                          </div>
                          <div class="col-md-12">
                            <table class="table table-striped table-bordered">                  
                          <tbody>
                            <tr>
                                <th scope="col">Full Name</th>    
                                <td><?php echo $name; ?></td>       
                            </tr>
                            <tr>
                                <th scope="row">Username</th> 
                                <td><?php echo $username; ?></td>         
                            </tr> 
                            <tr>
                                <th scope="row">Email Address</th>
                                <td><?php echo $user_email; ?></td>           
                            </tr> 
                            <tr>
                                <th scope="row">Phone No.</th>
                                <td><?php echo $user_phone; ?></td>           
                            </tr> 
                            <tr>
                                <th scope="row">User Role</th>
                                <td>
                                  <?php 
                                    if ($user_role == 0) {
                                      echo '<p class = "">Administrator</p>';
                                    }
                                    else if ($user_role == 1) {
                                      echo '<p class = "">Editor</p>';
                                    }
                                    else{
                                      echo '<p class = "">Suspended</p>';
                                    }
                                 ?>
                                </td>           
                            </tr>
                            <tr>
                                <th scope="row">Join Date</th>
                                <td><?php echo $join_date; ?></td>            
                            </tr>                               
                          </tbody>
                        </table>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
                  <!-- Delete Users confirmation Modal -->
              <div class="modal fade" id="exampleModal<?php echo $user_id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Do you want to user?</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="container">
                        <div class="row">
                          <div class="col-md-12 text-center">
                            <a href="users.php?do=Delete&delete=<?php echo $user_id; ?>" class= "btn btn-danger">Yes</a>
                          <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                     
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
                 </td>
                </tr>
                <?php
                }
              ?>   
          </tbody>
         </table>
                  <!-- All User Table End -->
                </div>
                <div class="add-btn-box">
                <a href="users.php?do=Create" class="btn btn-primary btn-flat btn-sm">CREATE AUTHOR</a>
              </div>
                <!-- Card Section Body-->
                </div>
                </div>
              </div>  
           <?php }
            else if ($do == "Create") {?>
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
                                <!-- User type Field-->
                                <div class="form-group">
                                    <select class="form-control" name="user_type" id="user_type" required>
                                        <option selected disabled>Select user type</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Editor</option>
                                        <option value="3">Contributor</option>
                                    </select>
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
                                <input type="submit" value="Register Account" class="btn btn-primary btn-user btn-block mt-4">
                              </form>
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
           <?php }
            else if ($do == "Insert") {?>
             <div class="row">
                <div class="col-md-12">
                  <?php
                  //Server Request Method
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                          $first_name       = $_POST['first_name'];
                          $last_name        = $_POST['last_name'];
                          $password         = $_POST['password'];
                          $repeat_password  = $_POST['repeat_password'];
                          $email            = $_POST['email'];
                          $phone_number     = $_POST['phone_number'];
                          $user_type        = $_POST['user_type'];
                          
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
                          if (empty($formErrors)) {
                            $name = $first_name  . $last_name;
                            //Encrypted Password
                            $hassedPass = sha1($password);

                            if (!empty($profile_picture_name)) {
                             $profile_picture = rand(0,200000) . '_' . $profile_picture_name;
                            move_uploaded_file($profile_picture_tmp, "img\users_profile_image\\" . $profile_picture);
                            $query = "INSERT INTO users (first_name, last_name, name, password, user_email, user_phone, user_avater, user_type) VALUES ('$first_name', '$last_name', '$name', '$hassedPass', '$email', '$phone_number', '$profile_picture', '$user_type')";
                            echo $query;
                            $add_user = mysqli_query($connect,$query);
                            if (!$add_user) {
                              die("Query Failed!" . mysqli_error($connect));;
                            }
                            else{
                              header("Location: users.php?do=Manage");
                            }
                            }
                            else{
                              $query = "INSERT INTO users (first_name, last_name, name, password, user_email, user_phone, user_type) VALUES ('$first_name', '$last_name', '$name', '$hassedPass', '$email', '$phone_number', '$user_type')";
                            echo $query;
                            $add_user = mysqli_query($connect,$query);
                            if (!$add_user) {
                              die("Query Failed!" . mysqli_error($connect));;
                            }
                            else{
                              header("Location: users.php?do=Manage");
                            }
                            }
                            
                          }
                          } 
                  ?>
                </div>
              </div>
           <?php }
            //To Read all the information of an user
            //Get Method
            else if ($do == "Edit") {
              if (isset($_GET['update'])) {
                $the_user_id = $_GET['update'];
                //echo $the_user_id;
                $query = "SELECT * FROM users WHERE user_id = $the_user_id";
                $update_user = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_assoc($update_user)) {
                  //print_r($row);
                  $user_id      = $row['user_id'];
                  $first_name   = $row['first_name'];
                  $last_name    = $row['last_name'];
                  $name         = $row['name'];
                  $password     = $row['password'];
                  $user_email   = $row['user_email'];
                  $user_phone   = $row['user_phone'];
                  $user_avater  = $row['user_avater'];
                  $user_type    = $row['user_type'];
                  $added_by     = $row['added_by'];
                //echo $user_id;?>
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block" style="padding-top: 15%">
                        <img src="img/users_profile_image/egiyecholo.png" style="width: 450px">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Update User Info</h1>
                            </div>
                            <!-- Form Part Start-->
                          <form action="?do=Update" method="POST" enctype="multipart/form-data">
                              <div class="form-group row">
                                <!-- First Name Field-->
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control " name="first_name" id="first_name" placeholder="First Name" required="required" autocomplete="off" value="<?php echo $first_name; ?>">
                                    </div>
                                    <!-- Last Name Field-->
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control " name="last_name" id="last_name" placeholder="Last Name" required="required" autocomplete="off" value="<?php echo $last_name; ?>">
                                    </div>
                                </div>
                                <!-- Email Field-->
                                <div class="form-group">
                                    <input type="email" class="form-control " name="email" id="email" placeholder="Email Address" required="required" autocomplete="off" value="<?php echo $user_email; ?>">
                                </div>
                                <!-- Phone Number Field-->
                                <div class="form-group">
                                    <input type="text" class="form-control " name="phone_number" id="phone_number" placeholder="Phone Number" required="required" autocomplete="off" value="<?php echo $user_phone; ?>">
                                </div>
                                <!-- User type Field-->
                                <div class="form-group">
                                    <select class="form-control" name="user_type" id="user_type" required>
                                        <option>Select user type</option>
                                        <option value="1" <?php if ($user_type == 1){echo 'selected';}?>>Admin</option>
                                        <option value="2" <?php if ($user_type == 2){echo 'selected';}?>>Editor</option>
                                        <option value="3" <?php if ($user_type == 3){echo 'selected';}?>>Contributor</option>
                                    </select>
                                </div>
                                <!-- Profile-picture Field-->
                                <div class="custom-file form-group text-left">
                                    <input type="file" class="custom-file-input mt-3" id="profile_picture" name="profile_picture">
                                    <label class="custom-file-label" for="customFile"><?php echo $user_avater; ?></label>
                                </div>
                                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                <input type="submit" value="Update" class="btn btn-primary btn-user btn-block mt-4">
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

                <?php
                }
              }
            }  
            else if ($do == "Update") {?>
            <div class="row">
              <div class="col-lg-12">
                <div class="card shadow mb-4">
                  <!-- Card Section Title-->
                  <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Update Users Information</h6>
                  </div>
                    <!-- Card Section Body-->
                    <div class="card-body">
                      <?php
                      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $update_user_id = $_POST['user_id'];
                        //echo $update_user_id ;
                          $first_name       = $_POST['first_name'];
                          $last_name        = $_POST['last_name'];
                          $email            = $_POST['email'];
                          $phone_number     = $_POST['phone_number'];
                          $user_type        = $_POST['user_type'];
                          
                          $profile_picture      = $_FILES['profile_picture'];
                          $profile_picture_name = $_FILES['profile_picture'] ['name'];
                          $profile_picture_size = $_FILES['profile_picture'] ['size'];
                          $profile_picture_type = $_FILES['profile_picture'] ['type'];
                          $profile_picture_tmp  = $_FILES['profile_picture'] ['tmp_name'];             

                          $profile_pictureAllowedExtension = array('jpg', 'jpeg', 'png');
                          $profile_pictureExtension        = strtolower(end(explode('.', $profile_picture_name)));

                          $formErrors = array();
                          if (!empty($profile_picture_name) && !in_array($profile_pictureExtension, $profile_pictureAllowedExtension)) {
                            $formErrors = 'Please Upload Valid Image Format';
                          }
                          if (!empty($profile_picture_size) && $profile_picture_size > 2097152) {
                            $formErrors = 'Image Size is larger then 2MB';
                          }
                          foreach ($formErrors as $error) {
                            echo '<div class = "alert alert-danger">' . $error . '</div>';
                          }
                          if (empty($formErrors)) { 
                            if (!empty($profile_picture_name)) 
                            {
                              $profile_picture = rand(0,200000) . '_' . $profile_picture_name;
                              //Image upload Function
                             move_uploaded_file($profile_picture_tmp, "img\users_profile_image\\" . $profile_picture);
                              //Delete the existing image to the folder
                              $delete_img_query = "SELECT * FROM users WHERE user_id = '$update_user_id'";
                              $delete_img = mysqli_query($connect, $delete_img_query);
                              while ($row = mysqli_fetch_assoc($delete_img)) {
                                $existing_avater  = $row['user_avater'];
                              }
                              //Image Delete function
                              unlink("img/users_profile_image/". $existing_avater);
                              $query = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', user_email = '$email', user_phone = '$phone_number', user_avater = '$profile_picture', user_type = '$user_type' WHERE user_id = '$update_user_id'";
                              //echo $query;
                              $update_user = mysqli_query($connect,$query);
                              if (!$update_user) {
                                die("Query Failed!" . mysqli_error($connect));
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
                            }
                          }
                      }
                      ?>
                    </div>
                     <!-- Card Section Body-->
                </div>
              </div>
            </div>      
           <?php }
            else if ($do == "Delete") {
              if (isset($_GET['delete'])) {
                $delete_user_id = $_GET['delete'];
                //echo $delete_user_id;
                //Delete the existing image to the folder
                $query = "SELECT * FROM users WHERE user_id = '$delete_user_id'";
                $delete_user = mysqli_query($connect, $query);
                  while ($row = mysqli_fetch_assoc($delete_user)) {
                    $existing_avater = $row ['user_avater'];
                        }
                    unlink("img/users_profile_image/". $existing_avater);
                    $delete_query = "DELETE FROM users WHERE user_id = '$delete_user_id'";
                    $delete_done = mysqli_query($connect,$delete_query);
                            if (!$delete_done) {
                              die("Query Failed!" . mysqli_error($connect));;
                            }
                            else{
                              header("Location: users.php?do=Manage");
                            }
              }
            }
          ?>

        </div>
        <!-- /.container-fluid -->
      <?php //}?>
        <?php include "includes/footer.php";?>