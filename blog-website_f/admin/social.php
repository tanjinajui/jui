<?php include "includes/header.php"; ?>
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">View All Users</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Manage Social Media ULR's</h6>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Facebook</label>
                            <div class="col-sm-8">
                                <?php
                                    $sql = "SELECT * FROM socialmedia WHERE s_id = 1";
                                    $read_url = mysqli_query($connect, $sql);
                                    while ( $row = mysqli_fetch_assoc($read_url) ) 
                                    {                                
                                        $s_link = $row['s_link'];                                  
                                    
                                        if ( $s_link == "" )
                                        { ?>
                                            <input type="text" class="form-control" name="url-link" placeholder="Facebook URL">
                                        <?php }
                                        else{ ?>
                                            <input type="text" class="form-control" name="url-link" value="<?php echo $s_link; ?>">
                                        <?php } }
                                ?>                                
                            </div>
                            <div class="col-sm-2">
                                <input type="submit" name="facebook-save" value="Save" class="btn btn-primary btn-flat btn-sm">
                            </div>
                        </div>                        
                    </form>

                    <?php
                        if ( isset($_POST['facebook-save']) )
                        {
                            $url_link = $_POST['url-link'];
                            $sql = "UPDATE socialmedia SET s_link = '$url_link' where s_id = 1";
                            $updateLink = mysqli_query($connect, $sql);
                            if ( !$updateLink ){ die("Operation Failed"); }
                            else{ header("Location: social.php"); }
                        }
                    ?>

                    <form action="" method="POST">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Twitter</label>
                            <div class="col-sm-8">
                              <?php
                                    $sql = "SELECT * FROM socialmedia WHERE s_id = 2";
                                    $read_url = mysqli_query($connect, $sql);
                                    while ( $row = mysqli_fetch_assoc($read_url) ) 
                                    {                                
                                        $s_link = $row['s_link'];                                  
                                    
                                        if ( $s_link == "" )
                                        { ?>
                                            <input type="text" class="form-control" name="url-link" placeholder="Twitter URL">
                                        <?php }
                                        else{ ?>
                                            <input type="text" class="form-control" name="url-link" value="<?php echo $s_link; ?>">
                                        <?php } }
                                ?> 
                            </div>
                            <div class="col-sm-2">
                                <input type="submit" name="twitter-save" value="Save" class="btn btn-primary btn-flat btn-sm">
                            </div>
                        </div>                        
                    </form>

                    <?php
                        if ( isset($_POST['twitter-save']) )
                        {
                            $url_link = $_POST['url-link'];
                            $sql = "UPDATE socialmedia SET s_link = '$url_link' where s_id = 2";
                            $updateLink = mysqli_query($connect, $sql);
                            if ( !$updateLink ){ die("Operation Failed"); }
                            else{ header("Location: social.php"); }
                        }
                    ?>

                    <form action="" method="POST">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Linkedin</label>
                            <div class="col-sm-8">
                              <?php
                                    $sql = "SELECT * FROM socialmedia WHERE s_id = 3";
                                    $read_url = mysqli_query($connect, $sql);
                                    while ( $row = mysqli_fetch_assoc($read_url) ) 
                                    {                                
                                        $s_link = $row['s_link'];                                  
                                    
                                        if ( $s_link == "" )
                                        { ?>
                                            <input type="text" class="form-control" name="url-link" placeholder="Linkedin URL">
                                        <?php }
                                        else{ ?>
                                            <input type="text" class="form-control" name="url-link" value="<?php echo $s_link; ?>">
                                        <?php } }
                                ?> 
                            </div>
                            <div class="col-sm-2">
                                <input type="submit" name="linkedin-save" value="Save" class="btn btn-primary btn-flat btn-sm">
                            </div>
                        </div>                        
                    </form>

                    <?php
                        if ( isset($_POST['linkedin-save']) )
                        {
                            $url_link = $_POST['url-link'];
                            $sql = "UPDATE socialmedia SET s_link = '$url_link' where s_id = 3";
                            $updateLink = mysqli_query($connect, $sql);
                            if ( !$updateLink ){ die("Operation Failed"); }
                            else{ header("Location: social.php"); }
                        }
                    ?>

                    <form action="" method="POST">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Youtube</label>
                            <div class="col-sm-8">
                                <?php
                                    $sql = "SELECT * FROM socialmedia WHERE s_id = 4";
                                    $read_url = mysqli_query($connect, $sql);
                                    while ( $row = mysqli_fetch_assoc($read_url) ) 
                                    {                                
                                        $s_link = $row['s_link'];                                  
                                    
                                        if ( $s_link == "" )
                                        { ?>
                                            <input type="text" class="form-control" name="url-link" placeholder="Youtube URL">
                                        <?php }
                                        else{ ?>
                                            <input type="text" class="form-control" name="url-link" value="<?php echo $s_link; ?>">
                                        <?php } }
                                ?> 
                            </div>
                            <div class="col-sm-2">
                                <input type="submit" name="youtube-save" value="Save" class="btn btn-primary btn-flat btn-sm">
                            </div>
                        </div>                        
                    </form>

                    <?php
                        if ( isset($_POST['youtube-save']) )
                        {
                            $url_link = $_POST['url-link'];
                            $sql = "UPDATE socialmedia SET s_link = '$url_link' where s_id = 4";
                            $updateLink = mysqli_query($connect, $sql);
                            if ( !$updateLink ){ die("Operation Failed"); }
                            else{ header("Location: social.php"); }
                        }
                    ?>

                    <form action="" method="POST">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Behance</label>
                            <div class="col-sm-8">
                                <?php
                                    $sql = "SELECT * FROM socialmedia WHERE s_id = 5";
                                    $read_url = mysqli_query($connect, $sql);
                                    while ( $row = mysqli_fetch_assoc($read_url) ) 
                                    {                                
                                        $s_link = $row['s_link'];                                  
                                    
                                        if ( $s_link == "" )
                                        { ?>
                                            <input type="text" class="form-control" name="url-link" placeholder="Behance URL">
                                        <?php }
                                        else{ ?>
                                            <input type="text" class="form-control" name="url-link" value="<?php echo $s_link; ?>">
                                        <?php } }
                                ?> 
                            </div>
                            <div class="col-sm-2">
                                <input type="submit" name="behance-save" value="Save" class="btn btn-primary btn-flat btn-sm">
                            </div>
                        </div>                        
                    </form>

                    <?php
                        if ( isset($_POST['behance-save']) )
                        {
                            $url_link = $_POST['url-link'];
                            $sql = "UPDATE socialmedia SET s_link = '$url_link' where s_id = 5";
                            $updateLink = mysqli_query($connect, $sql);
                            if ( !$updateLink ){ die("Operation Failed"); }
                            else{ header("Location: social.php"); }
                        }
                    ?>

                    <form action="" method="POST">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Dribbble</label>
                            <div class="col-sm-8">
                                <?php
                                    $sql = "SELECT * FROM socialmedia WHERE s_id = 6";
                                    $read_url = mysqli_query($connect, $sql);
                                    while ( $row = mysqli_fetch_assoc($read_url) ) 
                                    {                                
                                        $s_link = $row['s_link'];                                  
                                    
                                        if ( $s_link == "" )
                                        { ?>
                                            <input type="text" class="form-control" name="url-link" placeholder="Dribbble URL">
                                        <?php }
                                        else{ ?>
                                            <input type="text" class="form-control" name="url-link" value="<?php echo $s_link; ?>">
                                        <?php } }
                                ?> 
                            </div>
                            <div class="col-sm-2">
                                <input type="submit" name="dribbble-save" value="Save" class="btn btn-primary btn-flat btn-sm">
                            </div>
                        </div>                        
                    </form>

                    <?php
                        if ( isset($_POST['dribbble-save']) )
                        {
                            $url_link = $_POST['url-link'];
                            $sql = "UPDATE socialmedia SET s_link = '$url_link' where s_id = 6";
                            $updateLink = mysqli_query($connect, $sql);
                            if ( !$updateLink ){ die("Operation Failed"); }
                            else{ header("Location: social.php"); }
                        }
                    ?>

                    <form action="" method="POST">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Instagram</label>
                            <div class="col-sm-8">
                                <?php
                                    $sql = "SELECT * FROM socialmedia WHERE s_id = 7";
                                    $read_url = mysqli_query($connect, $sql);
                                    while ( $row = mysqli_fetch_assoc($read_url) ) 
                                    {                                
                                        $s_link = $row['s_link'];                                  
                                    
                                        if ( $s_link == "" )
                                        { ?>
                                            <input type="text" class="form-control" name="url-link" placeholder="Instagram URL">
                                        <?php }
                                        else{ ?>
                                            <input type="text" class="form-control" name="url-link" value="<?php echo $s_link; ?>">
                                        <?php } }
                                ?> 
                            </div>
                            <div class="col-sm-2">
                                <input type="submit" name="instagram-save" value="Save" class="btn btn-primary btn-flat btn-sm">
                            </div>
                        </div>                        
                    </form>

                    <?php
                        if ( isset($_POST['instagram-save']) )
                        {
                            $url_link = $_POST['url-link'];
                            $sql = "UPDATE socialmedia SET s_link = '$url_link' where s_id = 7";
                            $updateLink = mysqli_query($connect, $sql);
                            if ( !$updateLink ){ die("Operation Failed"); }
                            else{ header("Location: social.php"); }
                        }
                    ?>



                </div>
            </div>
        </div>
    </div>





    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

<?php include "includes/footer.php"; ?>

      