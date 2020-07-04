<?php include "includes/header.php"; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Web Site Settings</h1>
          <div class="row">
            <div class="col-md-6">
              <!-- Add New Category Field Start -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Manage Website Logo and Favicon</h6>
              </div>
                <div class="card-body">
                  <!-- Website logo and favicon upload Starts -->
                  <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Upload Logo (250x150)</label><br><br>
                      <?php
                        $query = "SELECT * FROM settings";
                        $all_media = mysqli_query($connect, $query);
                        while ($row = mysqli_fetch_assoc($all_media)) 
                        {
                         $logo = $row['logo'];
                         $favicon = $row['favicon'];
                        }
                        if (!empty($logo)) 
                        {?>
                          <img src="img/<?php echo $logo;?>" width="250" class="media_settings"><br><br>
                       <?php }
                      ?>
                      <input type="file" name="logo" class="form-control-file">
                    </div>
                    <div class="form-group">
                      <label>Upload Fabicon(32x32)</label><br><br>
                      <?php
                        $query = "SELECT * FROM settings";
                        $all_media = mysqli_query($connect, $query);
                        while ($row = mysqli_fetch_assoc($all_media)) 
                        {
                         $logo = $row['logo'];
                         $favicon = $row['favicon'];
                        }
                        if (!empty($favicon)) 
                        {?>
                          <img src="img/<?php echo $favicon;?>" width="250" class="media_settings"><br><br>
                       <?php }
                      ?>
                      <input type="file" name="favicon" class="form-control-file">
                    </div>
                    <div class="form-group">
                      <input type="submit" name="addSettings" value="Save" class="btn btn-primary btn-flat btn-sm">
                    </div>
                  </form>
                  <!-- Website logo and favicon upload Starts -->
                </div>
            </div>
            <?php
              if (isset($_POST['addSettings'])) {
                $logo         = $_FILES['logo'];                
                $logo_name    = $_FILES['logo'] ['name'];
                $logo_tmp     = $_FILES['logo'] ['tmp_name'];
                
                $favicon      = $_FILES['favicon'];
                $favicon_name = $_FILES['favicon'] ['name'];  
                $favicon_tmp  = $_FILES['favicon'] ['tmp_name'];
                $logoFile = rand(0,200000) . '_' . $logo_name;
                $faviconFile = rand(0,200000) . '_' . $favicon_name;
                move_uploaded_file($logo_tmp, "img\\" . $logoFile);
                move_uploaded_file($favicon_tmp, "img\\" . $favicon_name);
                $query = "UPDATE settings SET logo = '$logoFile', favicon = '$faviconFile' WHERE set_id = 1";
                $all_media = mysqli_query($connect, $query);
                if (!$all_media) {
                  die("Operation Failed!");
                }
                else
                {
                  header("Location: settings.php");
                }
              }
            ?>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php include "includes/footer.php";?>