<?php include "includes/header.php"; ?>
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Website Settings</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Manage Website Logo and Favicon</h6>
                </div>
                <div class="card-body">
                    <!-- Website Logo and Favicon Upload Start -->
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Upload Logo ( 250x150 )</label><br><br>

                            <?php
                                $sql = "SELECT * FROM settings";
                                $all_media = mysqli_query($connect, $sql);
                                while( $row = mysqli_fetch_assoc($all_media) )
                                {
                                    $logo       = $row['logo'];
                                    $favicon    = $row['favicon'];
                                }

                                if ( !empty($logo) )
                                { ?>
                                    <img src="img/<?php echo $logo; ?>" width="250" class="media-setting"><br><br>
                                <?php }
                            ?>

                            <input type="file" name="logo" class="form-control-file">
                        </div>

                        <hr>

                        <div class="form-group">
                            <label>Upload Favicon ( 32x32 )</label><br><br>
                            <?php
                                $sql = "SELECT * FROM settings";
                                $all_media = mysqli_query($connect, $sql);
                                while( $row = mysqli_fetch_assoc($all_media) )
                                {
                                    $logo       = $row['logo'];
                                    $favicon    = $row['favicon'];
                                }

                                if ( !empty($favicon) )
                                { ?>
                                    <img src="img/<?php echo $favicon; ?>" width="250" class="media-setting"><br><br>
                                <?php }
                            ?>
                            <input type="file" name="favicon" class="form-control-file">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="addSettings" value="Save" class="btn btn-primary btn-flat btn-sm">
                        </div>
                    </form>
                     <!-- Website Logo and Favicon Upload End -->
                </div>
            </div>

            <?php

                if ( isset($_POST['addSettings']) )
                {
                    $logo               = $_FILES['logo']['name'];
                    $logoTmp            = $_FILES['logo']['tmp_name'];

                    $favicon            = $_FILES['favicon']['name'];
                    $faviconTmp         = $_FILES['favicon']['tmp_name'];

                    if ( !empty($logo) && !empty($favicon) ){

                        $random_number = rand(0, 1000000);
                        $random_number_two = rand(0, 1000000);

                        $logoFile       = $random_number . '_' . $logo;
                        $faviconFile    = $random_number_two . '_' . $favicon;


                        move_uploaded_file($logoTmp, "img\\" . $logoFile);

                        move_uploaded_file($faviconTmp, "img\\" . $faviconFile);

                        $sql = "UPDATE settings SET logo = '$logoFile', favicon='$faviconFile' WHERE set_id = 1";
                        $add_media = mysqli_query($connect, $sql);

                        if ( ! $add_media )
                        {
                            die("Operation Faild");
                        }
                        else{
                            header("Location: settings.php");
                        }
                    }
                    else if ( !empty($logo) && empty($favicon) ){
                        $random_number = rand(0, 1000000);
                        $logoFile       = $random_number . '_' . $logo;

                        move_uploaded_file($logoTmp, "img\\" . $logoFile);
                        $sql = "UPDATE settings SET logo = '$logoFile' WHERE set_id = 1";
                        $add_media = mysqli_query($connect, $sql);

                        if ( ! $add_media )
                        {
                            die("Operation Faild");
                        }
                        else{
                            header("Location: settings.php");
                        }
                    }
                    else if ( empty($logo) && !empty($favicon) ){
                        $random_number_two = rand(0, 1000000);
                        $faviconFile    = $random_number_two . '_' . $favicon;                        

                        move_uploaded_file($faviconTmp, "img\\" . $faviconFile);


                        $sql = "UPDATE settings SET favicon='$faviconFile' WHERE set_id = 1";
                        $add_media = mysqli_query($connect, $sql);

                        if ( ! $add_media )
                        {
                            die("Operation Faild");
                        }
                        else{
                            header("Location: settings.php");
                        }
                    }

                    

                }

            ?>
        </div>
    </div>

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

<?php include "includes/footer.php"; ?>

      