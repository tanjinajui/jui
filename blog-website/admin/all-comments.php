<?php include "includes/header.php"; ?>
    <?php
      //Editor access 2 part
      if ($_SESSION['user_role'] == 0) 
      {?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">View All Comments Details</h1>
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
                  <!-- All Comments Table Start -->
                  <table class="table table-striped">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Sl.</th>
                    <th scope="col">Post Title</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email Id</th>
                    <th scope="col">Comments</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
              <?php
              //View All Users Codes Are Here---
                $query = "SELECT * FROM comments WHERE cmt_status = 0 OR cmt_status = 1 ORDER BY cmt_id DESC";
                $select_all_comments = mysqli_query($connect, $query);
                $i= 0;
                while ($row = mysqli_fetch_assoc($select_all_comments)) {
                  $cmt_id           = $row['cmt_id'];
                  $cmt_description  = $row['cmt_description'];
                  $cmt_post_id      = $row['cmt_post_id'];
                  $cmt_author       = $row['cmt_author'];
                  $cmt_author_email = $row['cmt_author_email'];
                  $cmt_status       = $row['cmt_status'];
                  $cmt_date         = $row['cmt_date'];
                  $i++;
                ?>
                <tr>
                <th scope="row"><?php echo $i ?></th>
                <td>
                  <?php
                   $query = "SELECT * FROM posts WHERE post_id = '$cmt_post_id'";
                   $post_title_by_id = mysqli_query($connect, $query);
                   while ($row = mysqli_fetch_assoc($post_title_by_id)) {
                     $post_id = $row ['post_id'];
                     $post_title = $row ['post_title'];
                     echo $post_title;
                   }
                  ?>
                  
                </td>
                <td><?php echo $cmt_author ?></td>
                <td><?php echo $cmt_author_email ?></td>             
                <td><?php echo $cmt_description ?></td>           
                <td>
                  <?php 
                    if ($cmt_status == 0) {
                      echo '<span class = "badge badge-warning">Draft</span>';
                    }
                    else if ($cmt_status == 1) {
                      echo '<span class = "badge badge-success">Published</span>';
                    }
                    else if ($cmt_status == 2){
                      echo '<span class = "badge badge-danger">Suspended</span>';
                    }
                 ?>                 
                 </td>
                <td><?php echo $cmt_date ?></td>               
                <td> 
                  <div class="action-bar">
                    <ul> 
                      <li><a href="all-comments.php?do=Edit&update=<?php echo $cmt_id; ?>"><i class="fa fa-edit"></i></a></li>
                      <li><i class="fa fa-trash" data-toggle="modal" data-target="#exampleModal<?php echo $cmt_id;?>"></i></li>
                    </ul>
                  </div>
                  <!-- Delete Users confirmation Modal -->
                  <div class="modal fade" id="exampleModal<?php echo $cmt_id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Do you want to comments?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="container">
                            <div class="row">
                              <div class="col-md-12 text-center">
                                <a href="all-comments.php?do=Delete&delete=<?php echo $cmt_id; ?>" class= "btn btn-danger">Yes</a>
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
                  <!-- All comments Table End -->
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
                $the_comment_id = $_GET['update'];
                //echo $the_user_id;
                $query = "SELECT * FROM comments WHERE cmt_id = $the_comment_id";
                $update_comment = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_assoc($update_comment)) {
                  //print_r($row);
                  $cmt_id       = $row['cmt_id'];
                  $cmt_status       = $row['cmt_status'];
                //echo $user_id;?>
          <div class="row">
            <div class="col-lg-12">
              <!-- Add New User Field Start -->
              <div class="card shadow mb-4">
                <!-- Card Section Title-->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Draft / Published Comment</h6>
                </div>
                <!-- Card Section Body-->
                <div class="card-body">               
                  <!-- Add User Form Start -->
                  <div class="container">
                    <div class="row">
                      <div class="col-md-12">
                        <!-- Form Part Start -->
                        <form action="?do=Update" method="POST" enctype="multipart/form-data">
                         <!-- User role Field-->
                              <div class="form-group">
                                <label for = "cmt_status">Comment Status</label>
                                  <select class="form-control" name="comment_status">
                                    <option>Please Select Comment Status</option>
                                    <option value="0" <?php if ($cmt_status == 0){echo 'selected';}?>>Draft</option>
                                    <option value="1" <?php if ($cmt_status == 1){echo 'selected';}?>>Published</option>
                                    <option value="2" <?php if ($cmt_status == 2){echo 'selected';}?>>Deleted</option>
                                  </select>
                              </div>
                              <!-- Update new comment Button Field-->
                              <div class="form-group">
                                <input type="hidden" name="cmt_id" value="<?php echo $cmt_id; ?>">
                                    <input type="submit" name="submit" value="save changes" class="btn btn-primary btn-flat btn-sm">
                              </div> 
                        </form>  
                      </div>
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
                      <h6 class="m-0 font-weight-bold text-primary">Update Comment Information</h6>
                  </div>
                    <!-- Card Section Body-->
                    <div class="card-body">
                       <?php
                      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $update_comment_id = $_POST['cmt_id'];
                        //echo $update_comment_id ;
                        $comment_status    = $_POST['comment_status'];
                        $query = "UPDATE comments SET cmt_status = '$comment_status' WHERE cmt_id = '$update_comment_id' ";
                        //echo $query;
                        $update_comment = mysqli_query($connect,$query);
                        if (!$update_comment) {
                             die("Query Failed!" . mysqli_error($connect));
                        }
                        else{
                              header("Location: all-comments.php?do=Manage");
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
                $delete_comment_id = $_GET['delete'];
                $query = "UPDATE comments SET cmt_status = 2 WHERE cmt_id = '$delete_comment_id' ";
                //echo $query;
                $update_comment_status = mysqli_query($connect,$query);
                if (!$update_comment_status) {
                             die("Query Failed!" . mysqli_error($connect));
                }
                else{
                    header("Location: all-comments.php?do=Manage");
                } 
                
              }
            }
          ?>

        </div>
        <!-- /.container-fluid -->
      <?php }?>
        <?php include "includes/footer.php";?>