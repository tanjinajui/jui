<?php include "includes/header.php"; ?>
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Manage Your Profile</h1>

    <div class="row">
        <!-- Profile Card -->
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Your Profile</h6>
                </div>
                <div class="card-body user-profile">
                    <?php
                        $user_id = $_SESSION['id'];
                        $query = "SELECT * FROM users WHERE id = '$user_id'";
                        $the_user = mysqli_query($connect, $query);
                        while ( $row = mysqli_fetch_assoc($the_user) ) {
                            $id             = $row['id'];
                            $name           = $row['name'];
                            $username       = $row['username'];
                            $password       = $row['password'];
                            $email          = $row['email'];
                            $phone          = $row['phone'];
                            $address        = $row['address'];
                            $avater         = $row['avater'];
                            $role           = $row['role'];
                            $join_date      = $row['join_date'];
                         } 
                    ?>
                    
                    <?php
                      if ( !empty($avater) )
                      { ?>
                        <img class="img-fluid " src="img/users-avater/<?php echo $avater; ?>">
                      <?php }
                      else
                        { ?>
                          <img class="img-fluid" src="img/users-avater/default.png">
                        <?php }
                    ?>

                    <table class="table table-dark table-striped table-bordered">
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
                          <td><?php echo $email; ?></td>
                        </tr>   
                        <tr>
                          <th scope="row">Phone No.</th>
                          <td><?php echo $phone; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">User Role</th>
                          <td>
                            <?php 
                                if ( $role == 0 ){
                                        echo '<p class="">Administrator</p>';
                                }
                                else if ( $role == 1 ){
                                    echo '<p class="">Editor</p>';
                                }
                                else{
                                    echo '<p class="">Suspended</p>';
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

        <!-- Profile Update -->
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Your Profile</h6>
                </div>
                <div class="card-body user-profile">
                    <?php
                        $user_id = $_SESSION['id'];
                        $query = "SELECT * FROM users WHERE id = '$user_id'";
                        $the_user = mysqli_query($connect, $query);
                        while ( $row = mysqli_fetch_assoc($the_user) ) {
                            $the_id         = $row['id'];
                            $name           = $row['name'];
                            $username       = $row['username'];
                            $password       = $row['password'];
                            $email          = $row['email'];
                            $phone          = $row['phone'];
                            $address        = $row['address'];
                            $avater         = $row['avater'];
                            ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input type="text" name="name" class="form-control" required="required" autocomplete="off" value="<?php echo $name; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Username</label>
                                            <input name="username" class="form-control" required="required" autocomplete="off" value="<?php echo $username; ?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input name="email" class="form-control" autocomplete="off" value="<?php echo $email; ?>" readonly>
                                        </div>  

                                        <div class="form-group">
                                            <label>Phone No.</label>
                                            <input type="text" name="phone" class="form-control" autocomplete="off" value="<?php echo $phone; ?>">
                                        </div>                                        
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control" autocomplete="off" value="<?php echo $address; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Profile Picture</label><br>
                                        <?php
                                            if ( !empty($avater) )
                                            { ?>
                                                <img src="img/users-avater/<?php echo $avater; ?>" width="40"><br>
                                            <?php }
                                        ?>                                        
                                        <input type="file" name="avater" class="form-control-file">
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" name="user_id" value="<?php echo $the_id; ?>">
                                        <input type="submit" name="submit" value="Save Changes" class="btn btn-primary btn-flat btn-sm">
                                    </div>
                                </form>
                            </div>
                        </div>


                        <?php    }      ?>                    
                </div>
            </div>
        </div>
    </div>


    <?php
        if ( isset($_POST['submit']) )
        {
            $update_user    = $_POST['user_id'];
            $name           = $_POST['name'];
            $phone          = $_POST['phone'];
            $address        = $_POST['address'];

            $avater         = $_FILES['avater'];
            $avaterName     = $_FILES['avater']['name'];
            $avaterSize     = $_FILES['avater']['size'];
            $avaterType     = $_FILES['avater']['type'];
            $avaterTmp      = $_FILES['avater']['tmp_name'];
            $avaterAllowedExtension     = array("jpg", "jpeg", "png");
            $avaterExtension            = strtolower( end( explode('.', $avaterName) ) );


            if ( !empty($avaterName) )
            {
                $avater = rand(0,200000). '_' . $avaterName;
                move_uploaded_file($avaterTmp, "img\users-avater\\" . $avater);

                // Delete the Users existing image from folder
                $sec_query = "SELECT * FROM users WHERE id = '$update_user'";
                $select_user = mysqli_query($connect, $sec_query);
                while ( $row = mysqli_fetch_assoc($select_user) ) {
                    $existing_avater  = $row['avater'];
                }
                unlink("img/users-avater/". $existing_avater);

                $query = "UPDATE users SET name='$name', phone='$phone', address='$address', avater='$avater' WHERE id = '$update_user' ";
                $update_user = mysqli_query($connect, $query);

                if ( !$update_user ){
                    die( "Query Failed ". mysqli_error($connect) );
                }
                else{
                    header("Location: profile.php");
                }
            }
                                        
            else{
                $query = "UPDATE users SET name='$name', phone='$phone', address='$address' WHERE id = '$update_user' ";
                $update_user = mysqli_query($connect, $query);

                if ( !$update_user ){
                    die( "Query Failed ". mysqli_error($connect) );
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

<?php include "includes/footer.php"; ?>

      