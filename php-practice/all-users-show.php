<?php include "db.php";?>
<?php include "header.php";?>
<?php include "function.php";?>


<?php 
$query = "SELECT * FROM user";
$select_all_users = mysqli_query($connect, $query);
?>
 

<section class="login-section">
  <div class="container">
    <div class="row">
        <h2>All Registered Users</h2>

        <table class="table table-striped table-dark table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">Serial</th>
                      <th scope="col">User Name</th>
                      <th scope="col">User ID</th>
                      <th scope="col">Email Address</th>
                      <th scope="col">Password</th>
                      <th scope="col">Address</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
           <?php
           $user_serial=0;
           while ($row = mysqli_fetch_assoc($select_all_users)) {
            $user_serial++;
            $username = $row ['username'];
            $user_id  = $row ['user_id'];
            $email    = $row ['user_email'];
            $phone    = $row ['user_phone'];
            $address    = $row ['user_address'];
           ?>
           <tr>
                      <th scope="row"><?php echo $user_serial?></th>
                      <td><?php echo $username?></td>
                      <td><?php echo $user_id?></td>
                      <td><?php echo $email?></td>
                      <td><?php echo $phone?></td>
                      <td><?php echo $address?></td>
                      <td>
                        <div class="btn btn-group">
                          <!-- Update Button field-->
                          <a href="update-users.php?update=<?php echo $user_id; ?>" class="btn btn-primary">Update</a>
                          <!-- Delete Button field-->
                          <a href="all-users-show.php?delete=<?php echo $user_id; ?>" class="btn btn-danger">Delete</a>
                        </div>
                      </td>
                    </tr>  
                    <?php                                       
                    }
                    ?>                                      
                  </tbody>
                </table>
    
    </div>
  </div>
</section>
  <?php

//Delete User Information form the all users Table

// if (isset($_GET['delete'])) {
//   $the_user_id = $_GET['delete'];
//   $query = "DELETE FROM user WHERE user_id = $the_user_id";
//   $delete_user = mysqli_query($connect, $query);
//   header("Location: all-users-show.php");
// }

?>
<?php deleteUser();?>

<!-- Footer include -->
<?php include "footer.php";?>