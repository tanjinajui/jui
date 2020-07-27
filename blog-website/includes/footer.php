<!-- :::::::::: Footer Buy Now Section Start :::::::: -->
    <section class="buy-now">
        <div class="container">
            <!-- But Now Row Start -->
            <div class="row">
                <!-- Left Side Content -->
                <div class="col-md-9">
                    <h4><span>Blue Chip</span> - Multipurpose Business Corporate Website Template</h4>
                </div>
                <!-- Right Side Button -->
                <div class="col-md-3">
                    <button type="button" class="btn-main"><i class="fa fa-cart-plus"></i> Buy Now</button>
                </div>
            </div>
            <!-- But Now Row End -->
        </div>
    </section>
    <!-- ::::::::::: Footer Buy Now Section End ::::::::: -->


    <!-- :::::::::: Footer Section Start :::::::: -->
    <footer>
        <!-- Footer Widget Section Start -->
        <div class="footer-widget background-img section">
            <div class="container">
                <div class="row">

                    <!-- Footer Widget One Start-->
                    <div class="col-md-3">
                        <div class="widget-title">
                            <h4><span>Blue</span> Chip</h4>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard Lorem Ipsum has been the</p>
                        <!-- Social Media -->
                        <div class="widget-title">
                            <h4><span>Social</span> Media</h4>
                        </div>

                        <div class="social-media">
                            <ul>
                                <?php  
                                    $sql = "SELECT * FROM socialmedia WHERE s_id = 1";
                                    $facebookLink = mysqli_query($connect, $sql);
                                    while ( $row = mysqli_fetch_array($facebookLink) ) {
                                        $s_name = $row['s_name'];
                                        $s_link = $row['s_link'];
                                        if ( !empty($s_link) ){ ?>
                                        <li>
                                            <a href="<?php echo $s_link; ?>"><i class="fa fa-facebook"></i></a>
                                        </li>
                                <?php } } ?>

                                <?php  
                                    $sql = "SELECT * FROM socialmedia WHERE s_id = 2";
                                    $twitterkLink = mysqli_query($connect, $sql);
                                    while ( $row = mysqli_fetch_array($twitterkLink) ) {
                                        $s_name = $row['s_name'];
                                        $s_link = $row['s_link'];
                                        if ( !empty($s_link) ){ ?>
                                        <li>
                                            <a href="<?php echo $s_link; ?>"><i class="fa fa-twitter"></i></a>
                                        </li>
                                <?php } } ?>

                                <?php  
                                    $sql = "SELECT * FROM socialmedia WHERE s_id = 3";
                                    $linkedinLink = mysqli_query($connect, $sql);
                                    while ( $row = mysqli_fetch_array($linkedinLink) ) {
                                        $s_name = $row['s_name'];
                                        $s_link = $row['s_link'];
                                        if ( !empty($s_link) ){ ?>
                                        <li>
                                            <a href="<?php echo $s_link; ?>"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                <?php } } ?>
                                
                                <?php  
                                    $sql = "SELECT * FROM socialmedia WHERE s_id = 5";
                                    $behancekLink = mysqli_query($connect, $sql);
                                    while ( $row = mysqli_fetch_array($behancekLink) ) {
                                        $s_name = $row['s_name'];
                                        $s_link = $row['s_link'];
                                        if ( !empty($s_link) ){ ?>
                                        <li>
                                            <a href="<?php echo $s_link; ?>"><i class="fa fa-behance"></i></a>
                                        </li>
                                <?php } } ?>

                                <?php  
                                    $sql = "SELECT * FROM socialmedia WHERE s_id = 7";
                                    $instagramlink = mysqli_query($connect, $sql);
                                    while ( $row = mysqli_fetch_array($instagramlink) ) {
                                        $s_name = $row['s_name'];
                                        $s_link = $row['s_link'];
                                        if ( !empty($s_link) ){ ?>
                                        <li>
                                            <a href="<?php echo $s_link; ?>"><i class="fa fa-instagram"></i></a>
                                        </li>
                                <?php } } ?>

                                <?php  
                                    $sql = "SELECT * FROM socialmedia WHERE s_id = 4";
                                    $youtubeLink = mysqli_query($connect, $sql);
                                    while ( $row = mysqli_fetch_array($youtubeLink) ) {
                                        $s_name = $row['s_name'];
                                        $s_link = $row['s_link'];
                                        if ( !empty($s_link) ){ ?>
                                        <li>
                                            <a href="<?php echo $s_link; ?>"><i class="fa fa-youtube"></i></a>
                                        </li>
                                <?php } } ?>
                            </ul>
                        </div>
                    </div>
                    <!-- Footer Widget One End-->

                    <!-- Footer Widget Two Start -->
                    <div class="col-md-3">
                        <div class="widget-title">
                            <h4><span>Useful</span> Links</h4>
                        </div>
                        <div class="useful-links">
                            <ul>
                                <li><a href="">About Us</a></li>
                                <li><a href="">Portfolio</a></li>
                                <li><a href="">Pages</a></li>
                                <li><a href="">FAQ</a></li>
                                <li><a href="">Terms of Use</a></li>
                                <li><a href="">Privacy Policy</a></li>
                                <li><a href="">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Footer Widget Two End -->

                    <!-- Footer Widget Three Start -->
                    <div class="col-md-3">
                        <div class="widget-title">
                            <h4><span>Contact</span> With Us</h4>
                        </div>
                        <div class="contact-with-us">
                            <ul>
                                <?php
                                    $query = "SELECT * FROM contacts WHERE id = 1";
                                    $all_contacts = mysqli_query($connect, $query);
                                    while( $row = mysqli_fetch_assoc($all_contacts) )
                                    {
                                        $address        = $row['address'];
                                        $email          = $row['email'];
                                        $p_one          = $row['p_one'];
                                        $p_two          = $row['p_two'];
                                        $office_time    = $row['office_time'];
                                    ?>
                                            <li>
                                                <a><i class="fa fa-home"></i><?php echo $address; ?></a>
                                            </li>
                                            <li>
                                                <a><i class="fa fa-envelope-o"></i><?php echo $email; ?></a>
                                            </li>
                                            <li>
                                                <a><i class="fa fa-fax"></i><?php echo $p_one; ?></a>
                                            </li>
                                            <li>
                                                <a><i class="fa fa-phone"></i><?php echo $p_two; ?></a>
                                            </li>
                                            <li>
                                                <a><i class="fa fa-clock-o"></i><?php echo $office_time; ?></a>
                                            </li>
                                    <?php } ?>                                
                            </ul>
                        </div>
                    </div>
                    <!-- Footer Widget Three End -->

                    <!-- Footer Widget Four Start -->
                    <div class="col-md-3">
                        <div class="widget-title">
                            <h4><span>Subscribe</span> Here</h4>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                        <!-- Subscribe From Start -->
                        <form action="" method="POST">
                            <div class="form-group ">
                                <input type="email" name="email" placeholder="Enter Your Email" autocomplete="off" class="form-input" required="required">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <!-- Subscribe Button -->
                            <div class="">
                                <button type="submit" name="subscribe" class="btn-main"><i class="fa fa-paper-plane-o"></i> Subscribe</button>
                            </div>
                        </form>

                        <?php
                            if ( isset($_POST['subscribe']) ){
                                $s_email = $_POST['email'];

                                $sql = "INSERT INTO subscription_list (subs_email, subs_date) VALUES ('$s_email', now())";
                                $add_subs = mysqli_query($connect, $sql);
                                if ( $add_subs ){
                                    header("Location: index.php");
                                }
                                else{
                                    die("Data not Inserted. " . mysqli_error($connect));
                                }

                            }
                        ?>
                        <!-- Subscribe From End -->
                    </div>
                    <!-- Footer Widget Four End -->

                </div>
            </div>
        </div>
        <!-- Footer Widget Section End -->


        <!-- CopyRight Section Start -->
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <!-- Copyright Left Content -->
                    <div class="col-md-6">
                        <p><a href="">Theme Express</a> © 2018 All rights reserved. Terms of use and Privacy Policy</p>
                    </div>

                    <!-- Copyright Right Footer Menu Start -->
                    <div class="col-md-6">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="">About</a></li>
                                <li><a href="">FAQ</a></li>
                                <li><a href="">Privacy Policy</a></li>
                                <li><a href="">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Copyright Right Footer Menu End -->
                </div>
            </div>
        </div>
        <!-- CopyRight Section End -->
    </footer>
    <!-- ::::::::::: Footer Section End ::::::::: -->


    <!-- JQuery Library File -->
    <script type="text/javascript" src="assets/js/jquery-1.12.4.min.js"></script>
    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script-->

    <!-- Bootstrap JS -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

    <!-- Owl Carousel JS -->
    <script src="assets/js/owl.carousel.min.js"></script>

    <!-- Isotop JS -->
    <script src="assets/js/isotop.min.js"></script>

    <!-- Fency Box JS -->
    <script src="assets/js/jquery.fancybox.min.js"></script>

    <!-- Easy Pie Chart JS -->
    <script src="assets/js/jquery.easypiechart.js"></script>

    <!-- JQuery CounterUp JS -->
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>

    <!-- BlueChip Extarnal Script -->
    <script type="text/javascript" src="assets/js/main.js"></script>

    <?php
        ob_end_flush();
    ?>

  </body>
</html>