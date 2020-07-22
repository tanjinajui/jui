<?php 
    ob_start();
    include "includes/db.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Website Description -->
    <meta name="description" content="Blue Chip: Corporate Multi Purpose Business Template" />
    <meta name="author" content="Blue Chip" />

    <!--  Favicons / Title Bar Icon  -->
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
            <link rel="shortcut icon" href="admin/img/<?php echo $favicon; ?>" />
        <?php }
        else { ?>
            <link rel="shortcut icon" href="assets/images/favicon/favicon.png" />
        <?php }
    ?>
    

    <title>Blue Chip | Blog Right Sidebar</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">

    <!-- Flat Icon CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/flaticon.css">

    <!-- Animate CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.min.css">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl.theme.default.min.css">

    <!-- Fency Box CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.min.css">

    <!-- Theme Main Style CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!-- Responsive CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
  </head>

  <body>
    <!-- :::::::::: Header Section Start :::::::: -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
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
                                <a class="navbar-brand" href="index.php">
                                    <img src="admin/img/<?php echo $logo; ?>" width="250" class="website-logo">
                                </a>
                            <?php }
                            else{ ?>
                                <a class="navbar-brand" href="index.php">
                                    Website Logo
                                </a>
                            <?php }
                        ?>
                      
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>

                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                          
                            <?php
                                $sql = "SELECT * FROM categories ORDER BY cat_name ASC";
                                $nav_items = mysqli_query($connect, $sql);
                                while ( $row = mysqli_fetch_assoc($nav_items) ) {
                                    $cat_id     = $row['cat_id'];
                                    $cat_name   = $row['cat_name'];
                                    ?>

                                    <li class="nav-item">
                                        <a class="nav-link" href="category.php?id=<?php echo $cat_id; ?>"><?php echo $cat_name; ?></a>
                                    </li>

                                <?php }
                            ?>
                          
                        </ul>
                      </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ::::::::::: Header Section End ::::::::: -->