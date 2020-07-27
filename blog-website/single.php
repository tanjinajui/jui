<?php
    include "includes/header.php";
?>

    
    <!-- :::::::::: Page Banner Section Start :::::::: -->
    <section class="blog-bg background-img">
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Single Blog Page</h2>
                    <!-- Page Heading Breadcrumb Start -->
                    <nav class="page-breadcrumb-item">
                        <ol>
                            <li><a href="index.html">Home <i class="fa fa-angle-double-right"></i></a></li>
                            <li><a href="">Blog <i class="fa fa-angle-double-right"></i></a></li>
                            <!-- Active Breadcrumb -->
                            <li class="active">Single Right Sidebar</li>
                        </ol>
                    </nav>
                    <!-- Page Heading Breadcrumb End -->
                </div>
                  
            </div>
            <!-- Row End -->
        </div>
    </section>
    <!-- ::::::::::: Page Banner Section End ::::::::: -->



    <!-- :::::::::: Blog With Right Sidebar Start :::::::: -->
    <section>
        <div class="container">
            <div class="row">
                <!-- Blog Single Posts -->
                <div class="col-md-8">

                    <?php
                        if ( isset($_GET['id']) )
                        {
                            $single_post_id = $_GET['id'];

                            $sql = "SELECT * FROM posts WHERE post_id = '$single_post_id'";
                            $read_post = mysqli_query($connect, $sql);
                            while ( $row = mysqli_fetch_assoc($read_post) ) {
                                $post_id            = $row['post_id'];
                                $post_title         = $row['post_title'];
                                $post_description   = $row['post_description'];
                                $post_author        = $row['post_author'];
                                $post_thumb         = $row['post_thumb'];
                                $post_category      = $row['post_category'];
                                $post_tags          = $row['post_tags'];
                                $post_date          = $row['post_date'];
                            ?>


                            <div class="blog-single">
                                <!-- Blog Title -->
                                <h3 class="post-title"><?php echo $post_title; ?></h3>

                                <!-- Blog Categories -->
                                <div class="single-categories">
                                    <?php
                                        $sql = "SELECT * FROM categories WHERE cat_id = '$post_category'";
                                        $the_category = mysqli_query($connect, $sql);
                                        while( $row = mysqli_fetch_assoc($the_category) ){
                                            $cat_id     = $row['cat_id'];
                                            $cat_name   = $row['cat_name'];
                                            ?>

                                            <h6> <span><?php echo $cat_name; ?></span></h6>
                                    <?php    }  ?>
                                </div>
                                
                                <!-- Blog Thumbnail Image Start -->
                                <div class="blog-banner">
                                    <img src="admin/img/posts_thumbnail/<?php echo $post_thumb; ?>">
                                </div>
                                <!-- Blog Thumbnail Image End -->

                                <!-- Blog Description Start -->
                                <p><?php echo $post_description; ?></p>
                                <!-- Blog Description End -->
                            </div>


                        <?php } 
                        }
                    ?>






                    <!-- Single Comment Section Start -->
                    <div class="single-comments">
                        <!-- Comment Heading Start -->
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                    $query = "SELECT * FROM comments WHERE cmt_post_id = '$post_id' AND cmt_status = 1 ";
                                    $read_commets = mysqli_query($connect, $query);
                                    $total_comments = mysqli_num_rows($read_commets);
                                ?>
                                <h4>All Latest Comments (<?php echo $total_comments; ?>)</h4>
                                <div class="title-border"></div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                            </div>
                        </div>
                        <!-- Comment Heading End -->

                        
                        <?php 
                            $sql = "SELECT * FROM comments WHERE cmt_post_id = '$post_id' AND cmt_status = 1 ORDER BY cmt_id DESC";
                            echo $sql;
                            $read_commets = mysqli_query($connect, $sql);

                            $result = mysqli_num_rows($read_commets);

                            if ( $result == 0 || empty($result) ){ ?>
                                <div class="alert alert-warning">No Comments Found in this Post!!!</div>
                            <?php }
                            else{
                                while( $row = mysqli_fetch_assoc($read_commets) ){
                                  $cmt_id           = $row['cmt_id'];
                                  $cmt_description  = $row['cmt_description'];
                                  $cmt_post_id      = $row['cmt_post_id'];
                                  $cmt_author       = $row['cmt_author'];
                                  $cmt_author_email = $row['cmt_author_email'];
                                  $cmt_status       = $row['cmt_status'];
                                  $cmt_date         = $row['cmt_date'];
                                    ?>

                                    <!-- Single Comment Post Start -->
                                    <div class="row each-comments">
                                        <!-- <div class="col-md-2">
                                            <div class="comments-person">
                                                <img src="assets/images/corporate-team/team-1.jpg">
                                            </div>
                                        </div> -->

                                        <div class="col-md-12 no-padding">
                                            <!-- Comment Box Start -->
                                            <div class="comment-box">
                                                <div class="comment-box-header">
                                                    <ul>
                                                        <li class="post-by-name"><?php echo $cmt_author; ?></li>
                                                        <li class="post-by-hour"><?php echo $cmt_date; ?></li>
                                                    </ul>
                                                </div>
                                                <p><?php echo $cmt_description; ?></p>
                                            </div>
                                            <!-- Comment Box End -->
                                        </div>
                                    </div>
                                    <!-- Single Comment Post End -->


                            <?php   }
                            }                            
                        ?>


                        

                        
                    </div>
                    <!-- Single Comment Section End -->


                    <!-- Post New Comment Section Start -->
                    <div class="post-comments">
                        <h4>Post Your Comments</h4>
                        <div class="title-border"></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        <!-- Form Start -->
                        <form action="" method="POST" class="contact-form">
                            <!-- Left Side Start -->
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- First Name Input Field -->
                                    <div class="form-group">
                                        <input type="text" name="username" placeholder="Your Name" class="form-input" autocomplete="off" required="required">
                                        <i class="fa fa-user-o"></i>
                                    </div>
                                </div>
                                <!-- Email Address Input Field -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Email Address" class="form-input" autocomplete="off" required="required">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- Left Side End -->

                            <!-- Right Side Start -->
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <!-- Comments Textarea Field -->
                                    <div class="form-group">
                                        <textarea name="comments" class="form-input" placeholder="Your Comments Here..."></textarea>
                                        <i class="fa fa-pencil-square-o"></i>
                                    </div>
                                    <!-- Post Comment Button -->
                                    <input type="submit" name="addComment" class="btn-main" value="Post Your Comments">
                                </div>
                            </div>
                            <!-- Right Side End -->
                        </form>
                        <!-- Form End -->
                    </div>
                    <!-- Post New Comment Section End -->              
                </div>

                <?php

                    if (isset($_POST['addComment'])) {
                     $username = $_POST['username'];
                     $email = $_POST['email'];
                     $comments = $_POST['comments'];
                     $query = "INSERT INTO comments (cmt_description, cmt_post_id, cmt_author, cmt_author_email, cmt_status, cmt_date) VALUES ('$comments', '$post_id', '$username', '$email', 0, now())";
                     $add_comment = mysqli_query($connect, $query);
                     if ($add_comment) {
                         header("Location: single.php?id=$post_id");
                     }
                     else{
                        die("Data not Inserted. " . mysqli_error($connect));
                     }
                    }

                ?>




                <!-- Blog Right Sidebar -->
                <div class="col-md-4">
                    <?php
                        include "includes/sidebar.php";
                    ?>
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </section>
    <!-- ::::::::::: Blog With Right Sidebar End ::::::::: -->
    


<?php
    include "includes/footer.php";
?>