<?php
    include "includes/header.php";
?>

    
    <!-- :::::::::: Page Banner Section Start :::::::: -->
    <section class="blog-bg background-img">
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Blog Page</h2>
                    <!-- Page Heading Breadcrumb Start -->
                    <nav class="page-breadcrumb-item">
                        <ol>
                            <li><a href="index.html">Home <i class="fa fa-angle-double-right"></i></a></li>
                            <!-- Active Breadcrumb -->
                            <li class="active">Blog</li>
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
                <!-- Blog Posts Start -->
                <div class="col-md-8">

                    <?php
                        if (isset($_GET['id'])) {
                            $the_category_page_id = $_GET['id'];
                            $query = "SELECT * FROM posts WHERE post_category = '$the_category_page_id'";
                            $all_cat_post = mysqli_query($connect, $query);
                            $totalPost = mysqli_num_rows($all_cat_post);
                            if ($totalPost == 0 || $totalPost < 0) 
                            {
                                echo '<div class="alert alert-warning">No Post Found In This Category</div>';
                            }
                            else
                            {                   
                                $sql = "SELECT * FROM posts WHERE post_category = '$the_category_page_id' ORDER BY post_id DESC";
                                $all_blogs = mysqli_query($connect, $sql);
                                while ( $row = mysqli_fetch_assoc($all_blogs) ) {
                                        $post_id            = $row['post_id'];
                                        $post_title         = $row['post_title'];
                                        $post_description   = $row['post_description'];
                                        $post_author        = $row['post_author'];
                                        $post_thumb         = $row['post_thumb'];
                                        $post_category      = $row['post_category'];
                                        $post_tags          = $row['post_tags'];
                                        $post_date          = $row['post_date'];
                                    ?>

                                    <!-- Single Item Blog Post Start -->
                                    <div class="blog-post">
                                        <!-- Blog Banner Image -->
                                        <div class="blog-banner">
                                            <a href="#">
                                                <img src="admin/img/posts_thumbnail/<?php echo $post_thumb; ?>">
                                                <!-- Post Category Names -->
                                                <div class="blog-category-name">
                                                    <?php
                                                        $sql = "SELECT * FROM categories WHERE cat_id = '$post_category'";
                                                        $the_category = mysqli_query($connect, $sql);
                                                        while( $row = mysqli_fetch_assoc($the_category) ){
                                                            $cat_id     = $row['cat_id'];
                                                            $cat_name   = $row['cat_name'];
                                                            ?>

                                                            <h6><?php echo $cat_name ?></h6>
                                                    <?php    }
                                                    ?>
                                                    
                                                </div>
                                            </a>
                                        </div>
                                        <!-- Blog Title and Description -->
                                        <div class="blog-description">
                                            <a href="single.php?id=<?php echo $post_id; ?>">
                                                <h3 class="post-title"><?php echo $post_title; ?></h3>
                                            </a>
                                            <p><?php echo substr($post_description, 0, 175); ?></p>
                                            <!-- Blog Info, Date and Author -->
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="blog-info">
                                                        <ul>
                                                            <li><i class="fa fa-calendar"></i><?php echo $post_date; ?></li>
                                                            <li><i class="fa fa-user"></i>Published By - <?php echo $post_author; ?></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 read-more-btn">
                                                    <a href="single.php?id=<?php echo $post_id; ?>">
                                                        <button type="button" class="btn-main">Read More <i class="fa fa-angle-double-right"></i></button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Item Blog Post End -->

                            <?php    }    }}
                            ?>

                </div>



                <!-- Blog Right Sidebar -->
                <div class="col-md-4">

                    <?php
                        include "includes/sidebar.php";
                    ?>

                </div>
                <!-- Right Sidebar End -->
            </div>
        </div>
    </section>
    <!-- ::::::::::: Blog With Right Sidebar End ::::::::: -->

<?php
    include "includes/footer.php";
?>