<?php include "includes/header.php"; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Manage Your Profile</h1>
         <div class="row">
          <!-- Profile card -->
           <div class="col-md-5">
             <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Your Profile</h6>
                </div>
                <div class="card-body user-profile">
                  <!-- Category form Start -->
                  <?php
                    $the_user_id = $_SESSION['user_id'];
                    $query = "SELECT * FROM users WHERE user_id = '$the_user_id'";
                    $the_user = mysqli_query($connect,$query);
                    while ($row = mysqli_fetch_assoc($the_user)) {
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
                      $join_date    = $row['join_date'];                        
                      }
                  ?>
                  <?php
                    if (!empty($user_avater)) 
                    {?>
                      <img class="img-fluid" src="img/users_avater/<?php echo $user_avater; ?>">
                   <?php }
                    else
                    {?>
                      <img class="img-fluid" src="img/users_avater/default.png">
                   <?php }
                    ?>
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
                  <!-- Category form End -->
                </div>
              </div>
           </div>
           <!-- Profile update -->
           <div class="col-md-7">
             <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Your Profile</h6>
                </div>
                <div class="card-body user-profile">
                  <!-- Category form Start -->
                  <?php
                    $the_user_id = $_SESSION['user_id'];
                    $query = "SELECT * FROM users WHERE user_id = '$the_user_id'";
                    $the_user = mysqli_query($connect,$query);
                    while ($row = mysqli_fetch_assoc($the_user)) {
                      $user_id      = $row['user_id'];
                      $name         = $row['name'];
                      $username     = $row['username'];
                      $password     = $row['password'];                      
                      $user_email   = $row['user_email'];
                      $user_phone   = $row['user_phone'];
                      $user_address = $row['user_address'];
                      $user_avater  = $row['user_avater']; 
                      ?> 
                      <div class="row">
                        <div class="col-md-6">
                        <!-- Form Part Start -->
                        <form action="" method="POST" enctype="multipart/form-data">
                          <!-- Name Field-->
                            <div class="form-group">
                              <label for = "name">Full Name</label>
                              <input type="text" name="name" class="form-control" autocomplete="off" required="required" value="<?php echo $name; ?>">
                            </div>
                            <!-- Username Field-->
                            <div class="form-group">
                              <label for = "username">Username</label>
                              <input name="username" class="form-control" autocomplete="off" required="required" value="<?php echo $username; ?>" readonly>
                            </div>                           
                             <!-- User Email Field-->
                            <div class="form-group">
                              <label for = "user_email">Email Address</label>
                              <input name="email" class="form-control" autocomplete="off" required="required" value="<?php echo $user_email; ?>" readonly>
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
                          <!-- User Avater Field-->
                          <div class="form-group">
                            <label>Profile Picture </label><br>
                            <?php
                              if (!empty($user_avater)) 
                                {?>
                                <img src="img/users-avater/<?php echo $user_avater; ?>" width = "35"><br>
                             <?php }
                            ?>
                            
                            <input type="file" name="avater" class="form-control-file">
                          </div>
                          <!-- Add new user Button Field-->
                          <div class="form-group">
                          <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                              <input type="submit" name="submit" value="Save Changes" class="btn btn-primary btn-flat btn-sm">
                          </div>
                  </form>
                  <!-- Form Part End -->                    
                        </div>
                      </div>                     
                     
                     <?php }
                  ?>
                  
                  <!-- Category form End -->
                </div>
           </div>
         </div>
         <?php
            if (isset($_POST['submit'])) {
              $update_user = $_POST['user_id'];
              $name = $_POST['name'];
              $phone = $_POST['phone'];
              $user_address = $_POST['user_address'];
              $avater      = $_FILES['avater'];
              $avater_name  = $_FILES['avater'] ['name'];
              $avater_size  = $_FILES['avater'] ['size'];
              $avater_type = $_FILES['avater'] ['type'];
              $avater_tmp  = $_FILES['avater'] ['tmp_name'];
              $avaterAllowedExtension = array('jpg', 'jpeg', 'png');
              $avaterExtension        = strtolower(end(explode('.', $avater_name)));
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
                $query = "UPDATE users SET name = '$name', user_phone = '$phone', user_address = '$user_address', user_avater = '$avater' WHERE user_id = '$update_user' ";
                //echo $query;
                $update_user = mysqli_query($connect,$query);
                $update_user = mysqli_query($connect,$query);
                if (!$update_user) {
                  die("Query Failed!" . mysqli_error($connect));;
                }
                else{
                   header("Location: profile.php");
                }
                }
                else
                {
                $query = "UPDATE users SET name = '$name', user_phone = '$phone', user_address = '$user_address' WHERE user_id = '$update_user' ";                            
                $update_user = mysqli_query($connect,$query);
                if (!$update_user) {
                  die("Query Failed!" . mysqli_error($connect));;
                }
                else{
                    header("Location: profile.php");
                }
              }                
            }
         ?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php include "includes/footer.php";?>                  