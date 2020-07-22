<?php include "includes/header.php"; ?>
    <?php
      //Editor access 2 part
      if ($_SESSION['user_role'] == 0) 
      {?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">View All User Details</h1>
          <?php
            $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
            if ($do == 'Manage') {?>
              <div class="row">
                <div class="col-md-12">
                  <div class="card shadow mb-4">
                  <!-- Card Section Title-->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
                </div>
                  <!-- Card Section Body-->
                <div class="card-body">               
                  <!-- All User Table Start -->
                  <table class="table table-striped">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Sl.</th>
                    <th scope="col">Avater</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email Id</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Role</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
              <?php
              //View All Users Codes Are Here---
                $query = "SELECT * FROM users";
                $select_all_user = mysqli_query($connect, $query);
                $i= 0;
                while ($row = mysqli_fetch_assoc($select_all_user)) {
                  $user_id      = $row['user_id'];
                  $name         = $row['name'];
                  $username     = $row['username'];
                  $password     = $row['password'];
                  $re_password  = $row['re_password'];
                  $user_email   = $row['user_email'];
                  $user_phone   = $row['user_phone'];
                  $user_address = $row['user_address'];
                  $user_avater  = $row['user_avater'];
                  $user_role    = $row['user_role'];
                  $is_active    = $row['is_active'];
                  $join_date    = $row['join_date'];
                  $i++;
                ?>
                <tr>
                <th scope="row"><?php echo $i ?></th>
                <td>
                  <?php
                  //Registration after default profile image set code
                    if (!empty($user_avater)) 
                    { ?>
                      <img src="img/users_avater/<?php echo $user_avater;?>" class="user-avater">
                    <?php }
                    else
                    { ?>
                      <img src="img/users_avater/default.png" class="user-avater">
                    <?php }
                  ?>
                  
                </td>
                <td><?php echo $name ?></td>
                <td><?php echo $username ?></td>              
                <td><?php echo $user_email ?></td>
                <td><?php echo $user_phone ?></td>           
                <td>
                  <?php 
                    if ($user_role == 0) {
                      echo '<span class = "badge badge-success">Administrator</span>';
                    }
                    else if ($user_role == 1) {
                      echo '<span class = "badge badge-primary">Editor</span>';
                    }
                    else{
                      echo '<span class = "badge badge-danger">Suspended</span>';
                    }
                 ?>                 
                 </td>
                 <td>
                  <?php 
                  //Registration after user active & inactive set code
                    if ($is_active == 0) {
                      echo '<span class = "badge badge-danger">Inactive</span>';
                    }
                    else if ($is_active == 1) {
                      echo '<span class = "badge badge-success">Active</span>';
                    }
                    else{
                      echo '<span class = "badge badge-danger">Suspended</span>';
                    }
                 ?>                 
                 </td>                
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
                <a href="users.php?do=Add" class="btn btn-primary btn-flat btn-sm">Add New User</a>
              </div>
                <!-- Card Section Body-->
                </div>
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
                  $name         = $row['name'];
                  $username     = $row['username'];
                  $password     = $row['password'];
                  $re_password  = $row['re_password'];
                  $user_email   = $row['user_email'];
                  $user_phone   = $row['user_phone'];
                  $user_address = $row['user_address'];
                  $user_avater  = $row['user_avater'];
                  $user_role    = $row['user_role'];
                  $is_active    = $row['is_active'];
                  $join_date    = $row['join_date'];
                //echo $user_id;?>
          <div class="row">
            <div class="col-lg-12">
              <!-- Add New User Field Start -->
              <div class="card shadow mb-4">
                <!-- Card Section Title-->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Update Users Information</h6>
                </div>
                <!-- Card Section Body-->
                <div class="card-body">               
                  <!-- Add User Form Start -->
                  <div class="container">
                    <div class="row">
                      <div class="col-md-6">
                        <!-- Form Part Start -->
                        <form action="?do=Update" method="POST" enctype="multipart/form-data">
                          <!-- Name Field-->
                            <div class="form-group">
                              <label for = "name">Full Name</label>
                              <input type="text" name="name" class="form-control" autocomplete="off" required="required" value="<?php echo $name; ?>">
                            </div>
                              <!-- Username Field-->
                              <div class="form-group">
                                <label for = "username">Username</label>
                                <input type="text" name="username" class="form-control" autocomplete="off" required="required" value="<?php echo $username; ?>">
                              </div>                           
                                 <!-- User Email Field-->
                                <div class="form-group">
                                  <label for = "user_email">Email Address</label>
                                  <input type="text" name="email" class="form-control" autocomplete="off" required="required" value="<?php echo $user_email; ?>">
                                </div>  
                                <!-- User Phone Field-->
                              <div class="form-group">
                                <label for = "user_phone">Phone No.</label>
                                <input type="text" name="phone" class="form-control" autocomplete="off" required="required" value="<?php echo $user_phone; ?>">
                              </div>      
                      </div>
                      <div class="col-md-6">
                             <!-- User Adddress Field-->
                              <div class="form-group">
                                <label for = "user_address"> Address</label>
                                <input type="text" name="user_address" class="form-control" autocomplete="off" required="required" value="<?php echo $user_address; ?>">
                              </div>
                              <!-- User role Field-->
                              <div class="form-group">
                                <label for = "user_role">User Role</label>
                                  <select class="form-control" name="user_role">
                                    <option>Please Select User Role</option>
                                    <option value="0" <?php if ($user_role == 0){echo 'selected';}?>>Administrtor</option>
                                    <option value="1" <?php if ($user_role == 1){echo 'selected';}?>>Editor</option>
                                  </select>
                              </div>
                              <!-- User Status Field-->
                              <div class="form-group">
                                <label for = "is_active">User Status</label>
                                  <select class="form-control" name="is_active">
                                    <option>Please Select User Status</option>
                                    <option value="0" <?php if ($is_active == 0){echo 'selected';}?>>Inactive</option>
                                    <option value="1" <?php if ($is_active == 1){echo 'selected';}?>>Active</option>
                                  </select>
                              </div>
                              <!-- User Avater Field-->
                              <div class="form-group">
                                <label for = "user_avater">Profile Picture </label><br>
                                <img src="img/users-avater/<?php echo $user_avater; ?>" width = "35"><br>
                                <input type="file" name="avater" class="form-control-file">
                              </div>
                              <!-- Add new user Button Field-->
                                <div class="form-group">
                                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                    <input type="submit" name="submit" value="Update user Info" class="btn btn-primary btn-flat btn-sm">
                                </div>
                            </div>
                        </form>  
                    </div>
                  </div> 
                </div>
                <!-- Card Section Body-->
              </div>
              <!-- Add New User Field Start -->
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
                          $name         = $_POST['name'];
                          $username     = $_POST['username'];
                          $password     = $_POST['password'];
                          $re_password  = $_POST['re_password'];
                          $email        = $_POST['email'];
                          $phone        = $_POST['phone'];
                          $user_address = $_POST['user_address'];
                          $user_role    = $_POST['user_role'];
                          $is_active    = $_POST['is_active'];
                          
                          $avater      = $_FILES['avater'];
                          $avater_name  = $_FILES['avater'] ['name'];
                          $avater_size  = $_FILES['avater'] ['size'];
                          $avater_type = $_FILES['avater'] ['type'];
                          $avater_tmp  = $_FILES['avater'] ['tmp_name'];             

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
                            if (!empty($avater_name)) 
                            {
                              $avater = rand(0,200000) . '_' . $avater_name;
                              //Image upload Function
                              move_uploaded_file($avater_tmp, "img\users_avater\\" . $avater);
                              //Delete the existing image to the folder
                              $delete_img_query = "SELECT * FROM users WHERE user_id = '$update_user_id'";
                              $delete_img = mysqli_query($connect, $delete_img_query);
                              while ($row = mysqli_fetch_assoc($delete_img)) {
                                $existing_avater = $row ['user_avater'];
                              }
                              //Image Delete function
                              unlink("img/users_avater/". $existing_avater);
                              $query = "UPDATE users SET name = '$name', username = '$username', user_email = '$email', user_phone = '$phone', user_address = '$user_address', user_avater = '$avater', user_role = '$user_role', is_active = '$is_active' WHERE user_id = '$update_user_id' ";
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
                              $query = "UPDATE users SET name = '$name', username = '$username', user_email = '$email', user_phone = '$phone', user_address = '$user_address', user_role = '$user_role', is_active = '$is_active' WHERE user_id = '$update_user_id' ";
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
                    unlink("img/users_avater/". $existing_avater);
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
      <?php }?>
        <?php include "includes/footer.php";?>