<?php
  include "inc/header.php";
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage All Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage All Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

   


    <?php
    //ternal condition
    //$do = condition ? true : false;
      $do = isset($_GET['do']) ? $_GET['do'] : 'Manage' ;


      if ( $do == 'Manage' ){ ?>
          
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Manage ALl Users</h3>
                  </div>
                  
                  <div class="card-body">
                    <table id="tableSorting" class="table table-bordered table-hover table-striped">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">#SL.</th>
                          <th scope="col">Image</th>
                          <th scope="col">Fullname</th>
                          <th scope="col">Username</th>
                          <th scope="col">Email</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Address</th>
                          <th scope="col">Role</th>
                          <th scope="col">Status</th>
                          <th scope="col">Join Date</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>


                        <?php
                          // Read Data From Database
                          $sql = "SELECT * FROM users1";
                          $allUsers = mysqli_query($db, $sql);
                          $result = mysqli_num_rows($allUsers);
                          
                          if ( $result == 0 ){
                            echo "No Data Found In the Database";
                          }
                          else{
                            $i = 0;
                            while( $row = mysqli_fetch_assoc($allUsers) ){
                              //echo $row;
                              $id         = $row['id'];
                              $name       = $row['name'];
                              $username   = $row['username'];
                              $email      = $row['email'];
                              $password   = $row['password'];
                              $phone      = $row['phone'];
                              $address    = $row['address'];
                              $role       = $row['role'];
                              $status     = $row['status'];
                              $image      = $row['image'];
                              $join_date  = $row['join_date'];
                              $i++;
                              ?>


                              <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td>
                                  <?php
                                    if ( !empty($image) ){ ?>
                                      <img src="dist/img/users/<?php echo $image; ?>" width="30" height="30">
                                    <?php }
                                    else{ ?>
                                      <img src="dist/img/users/default.png" width="30" height="30">
                                    <?php }
                                  ?>
                                </td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $username; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $phone; ?></td>
                                <td><?php echo $address; ?></td>
                                <td>
                                  <?php 
                                    if ( $role == 1 ){ ?>
                                      <span class="badge badge-success">Admin</span>
                                    <?php }
                                    else if( $role == 2 ){ ?>
                                      <span class="badge badge-primary">Editor</span>
                                    <?php }
                                    else if ( $role == 3 ){ ?>
                                      <span class="badge badge-warning">Users</span>
                                    <?php }
                                  ?>
                                </td>

                                <td>
                                  <?php 
                                    if ( $status == 1 ){ ?>
                                      <span class="badge badge-primary">Active</span>
                                    <?php }
                                    else if( $status == 2 ){ ?>
                                      <span class="badge badge-danger">In-Active</span>
                                    <?php }
                                  ?>
                                </td>
                                <td><?php echo $join_date; ?></td>
                                <td>
                                  <div class="btn-group">
                                    <a href="users.php?do=Edit&id=<?php echo $id; ?>" class="btn btn-success btn-sm">Update</a>
                                    <a href="" data-toggle="modal" data-target="#delete<?php echo $id; ?>" class="btn btn-danger btn-sm">Delete</a>
                                  </div>
                                </td>
                                <!-- Delete Modal -->
                                <div class="modal fade" id="delete<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Do you confirm to delete this user?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="modal-action">
                                          <ul>
                                            <li><a href="users.php?do=Delete&id=<?php echo  $id; ?>" class="btn btn-danger">Confirm</a></li>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </tr>

                          <?php  }
                          }
                        ?>

                        
                        
                      </tbody>
                    </table>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </section>

      <?php }

      else if ( $do == 'Add' ){ ?>
          
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Add New User</h3>
                  </div>
                  
                  <div class="card-body">
                    <form action="users.php?do=Insert" method="POST" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" class="form-control" required="required" autocomplete="off">
                          </div>

                          <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" required="required">
                          </div>

                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required="required">
                          </div>

                          <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required="required">
                          </div>

                          <div class="form-group">
                            <label>Re-Type Password</label>
                            <input type="password" name="rePassword" class="form-control" required="required">
                          </div>

                        </div>

                      
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" required="required">
                          </div>

                          <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" required="required">
                          </div>

                          <div class="form-group">
                            <label>User Role</label>
                            <select class="form-control" name="role">
                              <option>Please Select Role</option>
                              <option value="1">Admin</option>
                              <option value="2">Editor</option>
                              <option value="3">Users</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label>Account Status</label>
                            <select class="form-control" name="status">
                              <option>Please Select Status</option>
                              <option value="1">Active</option>
                              <option value="2">In-Active</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label>Profile Picture</label>
                            <input type="file" name="image" class="form-control-file">
                          </div>

                          <div class="form-group">
                            <input type="submit" name="addUser" class="btn btn-primary" value="Register User">
                          </div>

                        </div>
                      </div>
                    </form>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </section>

      <?php }
      else if ( $do == 'Insert' ){
        
        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){
          $name         = $_POST['name'];
          $username     = $_POST['username'];
          $email        = $_POST['email'];
          $password     = $_POST['password'];
          $rePassword   = $_POST['rePassword'];
          $phone        = $_POST['phone'];
          $address      = $_POST['address'];
          $role         = $_POST['role'];
          $status       = $_POST['status'];

          $image        = $_FILES['image']['name'];
          $imageTmp     = $_FILES['image']['tmp_name'];


          
          if ( $password == $rePassword ) {
            // To check the Password Matched
            $hassedPass = sha1($password);


            if ( !empty($image) ){
                // Image Move and Rename
                $avater = rand(0,5000000) . '_' . $image;
                move_uploaded_file($imageTmp, "dist\img\users\\" . $avater);

                $sql = "INSERT INTO users1 (name, username, email, password, phone, address, role, status, image, join_date) VALUES ('$name', '$username', '$email', '$hassedPass', '$phone', '$address', '$role', '$status', '$avater', now() )";

                $registerUser = mysqli_query($db, $sql);
     
                if ( $registerUser ){
                  header("Location: users.php?do=Manage");
                }
                else{
                  die("Database Connection Failed." . mysqli_error($db) );
                }
            }
            else{
                $sql = "INSERT INTO users1 (name, username, email, password, phone, address, role, status, join_date) VALUES ('$name', '$username', '$email', '$hassedPass', '$phone', '$address', '$role', '$status', now() )";

                $registerUser = mysqli_query($db, $sql);
     
                if ( $registerUser ){
                  header("Location: users.php?do=Manage");
                }
                else{
                  die("Database Connection Failed." . mysqli_error($db) );
                }
            }
            
          }

        }

      }
      else if ( $do == 'Edit' ){
        if ( isset($_GET['id']) ){
          $update_id = $_GET['id'];

          $sql = "SELECT * FROM users1 WHERE id = '$update_id'";
          $read_user = mysqli_query($db, $sql);
          while( $row = mysqli_fetch_assoc($read_user) ){
            $id         = $row['id'];
            $name       = $row['name'];
            $username   = $row['username'];
            $email      = $row['email'];
            $password   = $row['password'];
            $phone      = $row['phone'];
            $address    = $row['address'];
            $role       = $row['role'];
            $status     = $row['status'];
            $image      = $row['image'];
            $join_date  = $row['join_date'];
            ?>
            <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Update User</h3>
                  </div>
                  
                  <div class="card-body">
                    <form action="users.php?do=Update" method="POST" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" class="form-control" required="required" autocomplete="off" value="<?php echo $name; ?>">
                          </div>

                          <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" required="required" value="<?php echo $username; ?>">
                          </div>

                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                          </div>

                          <div class="form-group">
                            <label>Password (Enter New Password)</label>
                            <input type="password" name="password" class="form-control" placeholder="*****">
                          </div>

                          <div class="form-group">
                            <label>Re-Type Password (Re-Enter New Password)</label>
                            <input type="password" name="rePassword" class="form-control" placeholder="*****">
                          </div>

                        </div>

                      
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" required="required" value="<?php echo $phone; ?>">
                          </div>

                          <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" required="required" value="<?php echo $address; ?>">
                          </div>

                          <div class="form-group">
                            <label>User Role</label>
                            <select class="form-control" name="role">
                              <option value="1" <?php if($role == 1){ echo 'selected'; } ?>>Admin</option>
                              <option value="2" <?php if($role == 2){ echo 'selected'; } ?>>Editor</option>
                              <option value="3" <?php if($role == 3){ echo 'selected'; } ?>>Users</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label>Account Status</label>
                            <select class="form-control" name="status">
                              <option value="1" <?php if( $status == 1 ){ echo 'selected'; } ?> >Active</option>
                              <option value="2" <?php if( $status == 2 ){ echo 'selected'; } ?> >In-Active</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label>Profile Picture</label><br>
                            <?php
                              if ( !empty($image) ){ ?>
                                <img src="dist/img/users/<?php echo $image; ?>" width="30" height="30">
                              <?php }
                              else{
                                echo 'Not Uploaded';
                              }
                            ?>
                            <br><br>
                            <input type="file" name="image" class="form-control-file">
                          </div>

                          <div class="form-group">
                            <input type="hidden" name="userID" value="<?php echo $id; ?>">
                            <input type="submit" name="updateUser" class="btn btn-primary" value="Save Changes">
                          </div>

                        </div>
                      </div>
                    </form>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </section>

        <?php  }
        }
      }
      else if ( $do == 'Update' ){
        
        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){
          $updateUserID = $_POST['userID'];

          $name         = $_POST['name'];
          $username     = $_POST['username'];
          $email        = $_POST['email'];
          $password     = $_POST['password'];
          $rePassword   = $_POST['rePassword'];
          $phone        = $_POST['phone'];
          $address      = $_POST['address'];
          $role         = $_POST['role'];
          $status       = $_POST['status'];

          $image        = $_FILES['image']['name'];
          $imageTmp     = $_FILES['image']['tmp_name'];

          //  Image + Password both Change
          if ( !empty($image) && !empty($password) ){
            $hassedPass = sha1($password);

            // Remove existing image FROM Folder if Image are available
            if ( !empty($image) ){
              $query = "SELECT * FROM users1 WHERE id = '$updateUserID'";
              $the_user = mysqli_query($db, $query);
              while( $row = mysqli_fetch_assoc($the_user) ){
                $existing_image = $row['image'];
              }
              unlink("dist/img/users/" . $existing_image );
            }

            // Image Move and Rename
            $avater = rand(0,5000000) . '_' . $image;
            move_uploaded_file($imageTmp, "dist\img\users\\" . $avater);

            $sql = "UPDATE users1 SET name='$name', username='$username', email='$email', password='$hassedPass', phone='$phone', address='$address', role='$role', status='$status', image='$avater' WHERE id = '$updateUserID'";

            $updateUser = mysqli_query($db, $sql);
 
            if ( $updateUser ){
              header("Location: users.php?do=Manage");
            }
            else{
              die("Database Connection Failed." . mysqli_error($db) );
            }
          }

          //  Image Change + Password Not Change
          else if ( !empty($image) && empty($password) ){
            // Remove existing image FROM Folder if Image are available
            if ( !empty($image) ){
              $query = "SELECT * FROM users1 WHERE id = '$updateUserID'";
              $the_user = mysqli_query($db, $query);
              while( $row = mysqli_fetch_assoc($the_user) ){
                $existing_image = $row['image'];
              }
              unlink("dist/img/users/" . $existing_image );
            }

            // Image Move and Rename
            $avater = rand(0,5000000) . '_' . $image;
            move_uploaded_file($imageTmp, "dist\img\users\\" . $avater);

            $sql = "UPDATE users1 SET name='$name', username='$username', email='$email', phone='$phone', address='$address', role='$role', status='$status', image='$avater' WHERE id = '$updateUserID'";

            $updateUser = mysqli_query($db, $sql);
 
            if ( $updateUser ){
              header("Location: users.php?do=Manage");
            }
            else{
              die("Database Connection Failed." . mysqli_error($db) );
            }
          }

          //  Image Not Change + Password Change
          else if ( empty($image) && !empty($password) ){
            $hassedPass = sha1($password);

            $sql = "UPDATE users SET name='$name', username='$username', email='$email', password='$hassedPass', phone='$phone', address='$address', role='$role', status='$status' WHERE id = '$updateUserID'";

            $updateUser = mysqli_query($db, $sql);
 
            if ( $updateUser ){
              header("Location: users.php?do=Manage");
            }
            else{
              die("Database Connection Failed." . mysqli_error($db) );
            }
          }


          //  Image + Password both are not Changed
          else if ( empty($image) && empty($password) ){
            $sql = "UPDATE users1 SET name='$name', username='$username', email='$email', phone='$phone', address='$address', role='$role', status='$status' WHERE id = '$updateUserID'";

            $updateUser = mysqli_query($db, $sql);
 
            if ( $updateUser ){
              header("Location: users.php?do=Manage");
            }
            else{
              die("Database Connection Failed." . mysqli_error($db) );
            }
          }




        }

      }
      else if ( $do == 'Delete' ){
        
        if ( isset($_GET['id']) ){
          $deleteUserID = $_GET['id'];

          // Remove existing image FROM Folder if Image are available
            if ( !empty($image) ){
              $query = "SELECT * FROM users1 WHERE id = '$deleteUserID'";
              $the_user = mysqli_query($db, $query);
              while( $row = mysqli_fetch_assoc($the_user) ){
                $existing_image = $row['image'];
              }
              unlink("dist/img/users/" . $existing_image );
            }

            // Hard Delete
             $sql = "DELETE FROM users1 WHERE id='$deleteUserID'";
            // Soft Delete
            //$sql = "UPDATE users1 SET soft_delete = '1' WHERE id = '$deleteUserID'";

            $deleteUser = mysqli_query($db, $sql);
            if ( $deleteUser ){
              header("Location: users.php?do=Manage");
            }
            else{
              die("Database Connection Failed." . mysqli_error($db) );
            }


        }

      }




    ?>


  

<?php
  include "inc/footer.php";
?>




<!-- Main content -->
  <!-- <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Title</h3>
            </div>
            
            <div class="card-body">
   
            </div>
          </div>

        </div>
      </div>
    </div>
  </section> -->
<!-- /.content -->