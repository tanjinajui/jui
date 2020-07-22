                    <!-- Latest News -->
                    <div class="widget">
                        <h4>Latest News</h4>
                        <div class="title-border"></div>
                        
                        <!-- Sidebar Latest News Slider Start -->
                        <div class="sidebar-latest-news owl-carousel owl-theme">
                            
                        <?php
                            $sql = "SELECT * FROM posts ORDER BY post_id DESC LIMIT 3";
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

                            <!-- Latest News Start -->
                            <div class="item">
                                <div class="latest-news">
                                    <!-- Latest News Slider Image -->
                                    <div class="latest-news-image">
                                        <a href="single.php?id=<?php echo $post_id; ?>">
                                            <img src="admin/img/posts-thumbnail/<?php echo $post_thumb; ?>">
                                        </a>
                                    </div>
                                    <!-- Latest News Slider Heading -->
                                    <h5>
                                        <a href="single.php?id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                                    </h5>
                                    <!-- Latest News Slider Paragraph -->
                                    <p><?php echo substr($post_description, 0, 175); ?></p>
                                </div>
                            </div>
                            <!-- Latest News End -->
                        <?php    }
                        ?>     
                            
                        </div>
                        <!-- Sidebar Latest News Slider End -->
                    </div>


                    <!-- Search Bar Start -->
                    <div class="widget"> 
                            <!-- Search Bar -->
                            <h4>Blog Search</h4>
                            <div class="title-border"></div>
                            <div class="search-bar">
                                <!-- Search Form Start -->
                                <form action="search.php" method="POST">
                                    <div class="form-group">
                                        <input type="text" name="search" placeholder="Search Here" autocomplete="off" class="form-input" required="required">
                                        <input type="submit" name="doSearch" value="Search" class="btn-main">
                                    </div>
                                </form>
                                <!-- Search Form End -->
                            </div>
                    </div>
                    <!-- Search Bar End -->

                    <!-- Recent Post -->
                    <div class="widget">
                        <h4>Recent Posts</h4>
                        <div class="title-border"></div>
                        <div class="recent-post">
                            
                        <?php
                            $sql = "SELECT * FROM posts ORDER BY post_id DESC LIMIT 5";
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

                            <!-- Recent Post Item Content Start -->
                            <div class="recent-post-item">
                                <div class="row">
                                    <!-- Item Image -->
                                    <div class="col-md-4">
                                        <img src="admin/img/posts-thumbnail/<?php echo $post_thumb; ?>">
                                    </div>
                                    <!-- Item Tite -->
                                    <div class="col-md-8 no-padding">
                                        <h5>
                                            <a href="single.php?id=<?php echo $post_id; ?>"><?php echo $post_title; ?>
                                            </a>
                                        </h5>
                                        <ul>
                                            <li><i class="fa fa-clock-o"></i><?php echo $post_date; ?></li>
                                            <?php
                                                $sql = "SELECT * FROM comments WHERE cmt_post_id = '$post_id' AND cmt_status = 1";
                                                $read_commets = mysqli_query($connect, $sql);
                                                $total_comments = mysqli_num_rows($read_commets);
                                            ?>
                                            <li><i class="fa fa-comment-o"></i><?php echo $total_comments; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Recent Post Item Content End -->


                        <?php    }
                        ?>   


                            


                        </div>
                    </div>

                    <!-- All Category -->
                    <div class="widget">
                        <h4>Blog Categories</h4>
                        <div class="title-border"></div>
                        <!-- Blog Category Start -->
                        <div class="blog-categories">
                            <ul>

                                <?php
                                    $sql = "SELECT * FROM categories ORDER BY cat_name ASC LIMIT 6";
                                    $nav_items = mysqli_query($connect, $sql);
                                    while ( $row = mysqli_fetch_assoc($nav_items) ) {
                                        $cat_id     = $row['cat_id'];
                                        $cat_name   = $row['cat_name'];

                                        $query = "SELECT * FROM posts WHERE post_category = '$cat_id'";
                                        $all_cat = mysqli_query($connect, $query);
                                        $result = mysqli_num_rows($all_cat);

                                    ?>
                                        <!-- Category Item -->
                                        <li>
                                            <i class="fa fa-check"></i>
                                                <a href="category.php?id=<?php echo $cat_id; ?>">
                                                    <?php echo $cat_name; ?>
                                                </a>
                                            <span>[<?php echo $result; ?>]</span>
                                        </li>

                                    <?php }
                                ?>



                                
                                
                            </ul>
                        </div>
                        <!-- Blog Category End -->
                    </div>

                    <!-- Recent Comments -->
                    <div class="widget">
                        <h4>Recent Comments</h4>
                        <div class="title-border"></div>
                        <div class="recent-comments">
                            

                            <?php
                                $sql = "SELECT * FROM comments WHERE cmt_status = 1 ORDER BY cmt_id DESC LIMIT 5";
                                $latest_comments = mysqli_query($connect, $sql);
                                while( $row = mysqli_fetch_assoc($latest_comments) ){
                                    $cmt_id             = $row['cmt_id'];
                                    $cmt_desc           = $row['cmt_desc'];
                                    $cmt_post_id        = $row['cmt_post_id'];
                                    $cmt_author         = $row['cmt_author'];
                                    $cmt_author_email   = $row['cmt_author_email'];
                                    $cmt_status         = $row['cmt_status'];
                                    $cmt_date           = $row['cmt_date'];
                                ?>

                                    <!-- Recent Comments Item Start -->
                                    <div class="recent-comments-item">
                                        <div class="row">
                                            <!-- Comments Thumbnails -->
                                            <div class="col-md-4">
                                                <i class="fa fa-comments-o"></i>
                                            </div>
                                            <!-- Comments Content -->
                                            <div class="col-md-8 no-padding">
                                                <h5><?php echo $cmt_desc; ?></h5>
                                                <!-- Comments Date -->
                                                <ul>
                                                    <li>
                                                        <i class="fa fa-clock-o"></i><?php echo $cmt_date; ?>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Recent Comments Item End -->


                            <?php    }    
                            ?>
                        </div>
                    </div>



                    <!-- Meta Tag -->
                    <div class="widget">
                        <h4>Tags</h4>
                        <div class="title-border"></div>
                        <!-- Meta Tag List Start -->
                        <div class="meta-tags">
                            <span>Business</span>
                            <span>Technology</span>
                            <span>Corporate</span>
                            <span>Web Design</span>
                            <span>Development</span>
                            <span>Graphic</span>
                            <span>Digital Marketing</span>
                            <span>SEO</span> 
                            <span>Social Media</span>          
                        </div>
                        <!-- Meta Tag List End -->
                    </div>