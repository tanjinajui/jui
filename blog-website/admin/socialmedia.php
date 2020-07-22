<?php include "includes/header.php"; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">View All User Details</h1>
          <div class="row">
            <div class="col-md-12">
              <!-- Add New Category Field Start -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Manage Social Media URL's</h6>
              </div>
              <div class="card-body">
                  <!-- Social media Facebook Starts -->
                  <form action="" method="POST">
                    <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Facebook</label>
                    <div class="col-sm-8">
                      <?php
                      //Social Media code Read
                        $query = "SELECT * FROM socialmedia WHERE s_id = 1";
                        $read_url = mysqli_query($connect, $query);
                        while ($row = mysqli_fetch_assoc($read_url)) 
                        {
                          $s_link = $row['s_link'];
                          if ($s_link == "") 
                          {?>
                           <input type="text" class="form-control" name="url_link" placeholder="Facebook URL">
                         <?php }
                          else
                          {?>
                            <input type="text" class="form-control" name="url_link" value="<?php echo $s_link; ?>">
                         <?php }
                        }
                      ?>
                      
                    </div>
                    <div class="col-sm-2">
                      <input type="submit" name="facebook-save" value="Save" class="btn btn-primary btn-flat btn-sm">
                    </div>
                  </div>
                  </form>
                  <?php
                  //Social Media code database save
                    if (isset($_POST['facebook-save'])) {
                     $url_link = $_POST['url_link'];
                     $query = "UPDATE socialmedia SET s_link = '$url_link' WHERE s_id = 1";
                     $updateLink = mysqli_query($connect, $query);
                     if (!$updateLink) {die("Operation Failed");}
                     else{header("Location: socialmedia.php");}
                    }
                  ?>
                  <!-- Social media Facebook End -->
                  <!-- Social media Twitter Starts -->
                  <form action="" method="POST">
                    <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Twitter</label>
                    <div class="col-sm-8">
                       <?php
                        $query = "SELECT * FROM socialmedia WHERE s_id = 2";
                        $read_url = mysqli_query($connect, $query);
                        while ($row = mysqli_fetch_assoc($read_url)) 
                        {
                          $s_link = $row['s_link'];
                          if ($s_link == "") 
                          {?>
                            <input type="text" class="form-control" name="url_link" placeholder="Twitter URL">
                         <?php }
                          else
                          {?>
                            <input type="text" class="form-control" name="url_link" value="<?php echo $s_link; ?>">
                         <?php }
                        }
                      ?>
                    </div>
                    <div class="col-sm-2">
                      <input type="submit" name="twitter-save" value="Save" class="btn btn-primary btn-flat btn-sm">
                    </div>
                  </div>
                  </form>
                   <?php
                    if (isset($_POST['twitter-save'])) {
                     $url_link = $_POST['url_link'];
                     $query = "UPDATE socialmedia SET s_link = '$url_link' WHERE s_id = 2";
                     $updateLink = mysqli_query($connect, $query);
                     if (!$updateLink) {die("Operation Failed");}
                     else{header("Location: socialmedia.php");}
                    }
                  ?>
                  <!-- Social media Twitter End -->
                  <!-- Social media Linkedin Starts -->
                  <form action="" method="POST">
                    <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Linkedin</label>
                    <div class="col-sm-8">
                      <?php
                        $query = "SELECT * FROM socialmedia WHERE s_id = 3";
                        $read_url = mysqli_query($connect, $query);
                        while ($row = mysqli_fetch_assoc($read_url)) 
                        {
                          $s_link = $row['s_link'];
                          if ($s_link == "") 
                          {?>
                            <input type="text" class="form-control" name="url_link" placeholder="Linkedin URL">
                         <?php }
                          else
                          {?>
                            <input type="text" class="form-control" name="url_link" value="<?php echo $s_link; ?>">
                         <?php }
                        }
                      ?>
                    </div>
                    <div class="col-sm-2">
                      <input type="submit" name="linkedin-save" value="Save" class="btn btn-primary btn-flat btn-sm">
                    </div>
                  </div>
                  </form>
                   <?php
                    if (isset($_POST['linkedin-save'])) {
                     $url_link = $_POST['url_link'];
                     $query = "UPDATE socialmedia SET s_link = '$url_link' WHERE s_id = 3";
                     $updateLink = mysqli_query($connect, $query);
                     if (!$updateLink) {die("Operation Failed");}
                     else{header("Location: socialmedia.php");}
                    }
                  ?>
                  <!-- Social media Linkedin End -->
                  <!-- Social media Youtube Starts -->
                  <form action="" method="POST">
                    <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Youtube</label>
                    <div class="col-sm-8">
                       <?php
                        $query = "SELECT * FROM socialmedia WHERE s_id = 4";
                        $read_url = mysqli_query($connect, $query);
                        while ($row = mysqli_fetch_assoc($read_url)) 
                        {
                          $s_link = $row['s_link'];
                          if ($s_link == "") 
                          {?>
                            <input type="text" class="form-control" name="url_link" placeholder="Youtube URL">
                         <?php }
                          else
                          {?>
                            <input type="text" class="form-control" name="url_link" value="<?php echo $s_link; ?>">
                         <?php }
                        }
                      ?>
                    </div>
                    <div class="col-sm-2">
                      <input type="submit" name="youtube-save" value="Save" class="btn btn-primary btn-flat btn-sm">
                    </div>
                  </div>
                  </form>
                   <?php
                    if (isset($_POST['youtube-save'])) {
                     $url_link = $_POST['url_link'];
                     $query = "UPDATE socialmedia SET s_link = '$url_link' WHERE s_id = 4";
                     $updateLink = mysqli_query($connect, $query);
                     if (!$updateLink) {die("Operation Failed");}
                     else{header("Location: socialmedia.php");}
                    }
                  ?>
                  <!-- Social media Youtube End -->
                  <!-- Social media Behance Starts -->
                  <form action="" method="POST">
                    <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Behance</label>
                    <div class="col-sm-8">
                      <?php
                        $query = "SELECT * FROM socialmedia WHERE s_id = 5";
                        $read_url = mysqli_query($connect, $query);
                        while ($row = mysqli_fetch_assoc($read_url)) 
                        {
                          $s_link = $row['s_link'];
                          if ($s_link == "") 
                          {?>
                            <input type="text" class="form-control" name="url_link" placeholder="Behance URL">
                         <?php }
                          else
                          {?>
                            <input type="text" class="form-control" name="url_link" value="<?php echo $s_link; ?>">
                         <?php }
                        }
                      ?>
                    </div>
                    <div class="col-sm-2">
                      <input type="submit" name="behance-save" value="Save" class="btn btn-primary btn-flat btn-sm">
                    </div>
                  </div>
                  </form>
                   <?php
                    if (isset($_POST['behance-save'])) {
                     $url_link = $_POST['url_link'];
                     $query = "UPDATE socialmedia SET s_link = '$url_link' WHERE s_id = 5";
                     $updateLink = mysqli_query($connect, $query);
                     if (!$updateLink) {die("Operation Failed");}
                     else{header("Location: socialmedia.php");}
                    }
                  ?>
                  <!-- Social media Behance End -->
                  <!-- Social media Dibble Starts -->
                  <form action="" method="POST">
                    <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Dibble</label>
                    <div class="col-sm-8">
                      <?php
                        $query = "SELECT * FROM socialmedia WHERE s_id = 6";
                        $read_url = mysqli_query($connect, $query);
                        while ($row = mysqli_fetch_assoc($read_url)) 
                        {
                          $s_link = $row['s_link'];
                          if ($s_link == "") 
                          {?>
                            <input type="text" class="form-control" name="url_link" placeholder="Dibble URL">
                         <?php }
                          else
                          {?>
                            <input type="text" class="form-control" name="url_link" value="<?php echo $s_link; ?>">
                         <?php }
                        }
                      ?>
                    </div>
                    <div class="col-sm-2">
                      <input type="submit" name="dibble-save" value="Save" class="btn btn-primary btn-flat btn-sm">
                    </div>
                  </div>
                  </form>
                   <?php
                    if (isset($_POST['dibble-save'])) {
                     $url_link = $_POST['url_link'];
                     $query = "UPDATE socialmedia SET s_link = '$url_link' WHERE s_id = 6";
                     $updateLink = mysqli_query($connect, $query);
                     if (!$updateLink) {die("Operation Failed");}
                     else{header("Location: socialmedia.php");}
                    }
                  ?>
                  <!-- Social media Dibble End -->
                  <!-- Social media Instagram Starts -->
                  <form action="" method="POST">
                    <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Instagram</label>
                    <div class="col-sm-8">
                      <?php
                        $query = "SELECT * FROM socialmedia WHERE s_id = 7";
                        $read_url = mysqli_query($connect, $query);
                        while ($row = mysqli_fetch_assoc($read_url)) 
                        {
                          $s_link = $row['s_link'];
                          if ($s_link == "") 
                          {?>
                            <input type="text" class="form-control" name="url_link" placeholder="Instagram URL">
                         <?php }
                          else
                          {?>
                            <input type="text" class="form-control" name="url_link" value="<?php echo $s_link; ?>">
                         <?php }
                        }
                      ?>
                    </div>
                    <div class="col-sm-2">
                      <input type="submit" name="instagram-save" value="Save" class="btn btn-primary btn-flat btn-sm">
                    </div>
                  </div>
                  </form>
                   <?php
                    if (isset($_POST['instagram-save'])) {
                     $url_link = $_POST['url_link'];
                     $query = "UPDATE socialmedia SET s_link = '$url_link' WHERE s_id = 7";
                     $updateLink = mysqli_query($connect, $query);
                     if (!$updateLink) {die("Operation Failed");}
                     else{header("Location: socialmedia.php");}
                    }
                  ?>
                  <!-- Social media Instagram End -->
              </div>
            </div>
            </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php include "includes/footer.php";?>