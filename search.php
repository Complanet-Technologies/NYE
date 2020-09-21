<?php include "./includes/blog_header.php"; ?>
<?php include "./includes/db.php"; ?>
        <!--? Blog Area Start-->
        <section class="blog_area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="blog_left_sidebar">



                        <?php 
                            if (isset($_POST['submit'])) {
                                $search = $_POST['search'];
                                $query = "SELECT * FROM posts WHERE posts_tag LIKE '%$search%' ";
                                $search_query = mysqli_query($connection,$query);
                                $count = mysqli_num_rows($search_query);
                                if ($count == 0 ) {
                                    echo "No Result!";
                                    # code...
                                }else{
                        while ($row = mysqli_fetch_assoc($search_query)) {
                            $posts_id = $row['posts_id'];
                            $posts_category_id = $row['posts_category_id'];
                            $posts_title = $row['posts_title'];
                            $posts_author = $row['posts_author'];
                            $posts_date = $row['posts_date'];
                            $posts_image = $row['posts_image'];
                            $my_content = $row['my_content'];
                            $posts_tag = $row['posts_tag'];
                            $posts_comment_count = $row['posts_comment_count'];
                            $posts_status = $row['posts_status'];
                            # code...
                    


                        ?>


                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="assets/img/blog/<?php echo "$posts_image";?> "alt="img">
                                    <a href="#" class="blog_item_date">
                                        <?php echo "<h3>$posts_date</h3>";?>
                                        
                                    </a>
                                </div>
                                <div class="blog_details">
                                    <a class="d-inline-block" href="single_blog.php?p_id=<?php echo"$posts_id";?>">
                                        <?php echo"<h2 class='blog-head' style='color: #2d2d2d';>$posts_title</h2>";?>
                                    </a>
                                   <?php echo"<p>$my_content</p>"; ?>
                                    <ul class="blog-info-link">
                                        <?php echo "<li><a href='#''><i class='fa fa-user'></i>$posts_tag</a></li>";?>
                                        <?php echo"<li><a href='#'><i class='fa fa-comments'></i>$posts_comment_count</a></li>";?>
                                    </ul>
                                </div>
                            </article>
                            <?php } 
                                }
                            }
                            ?>


                       
                            <nav class="blog-pagination justify-content-center d-flex">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a href="#" class="page-link" aria-label="Previous">
                                            <i class="ti-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#" class="page-link">1</a>
                                    </li>
                                    <li class="page-item active">
                                        <a href="#" class="page-link">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#" class="page-link" aria-label="Next">
                                            <i class="ti-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-4">




                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget search_widget">
                           
                                <form action="blog.php" method="post">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="search" placeholder='Search Keyword'
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Search Keyword'">
                                            <div class="input-group-append">
                                                <button class="btns" type="button"><i class="ti-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                        type="submit" name="submit" >Search</button>
                                </form>
                            </aside>

                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title" style="color: #2d2d2d;">Categories</h4>
                                <ul class="list cat-list">
                                <?php
                                $query = "SELECT * FROM category ";
                                $select_cat = mysqli_query($connection,$query);
                                while ($row = mysqli_fetch_assoc($select_cat)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                    # code...
                                
                                    echo "<li><a href ='blog.php?category=$cat_id'>{$cat_title}</a></li>";
                                    }
                                    ?>
                                </ul>
                            </aside>


                            <aside class="single_sidebar_widget popular_post_widget">
                          
                                <h3 class="widget_title" style="color: #2d2d2d;">Recent Post</h3>
                                  <?php
                            $query = "SELECT * FROM posts ";
                            $posts_query = mysqli_query($connection,$query);
                            while ($row = mysqli_fetch_assoc($posts_query)) {
                                 # code...
                            $posts_id = $row['posts_id'];
                            $posts_category_id = $row['posts_category_id'];
                            $posts_title = $row['posts_title'];
                            $posts_author = $row['posts_author'];
                            $posts_date = $row['posts_date'];
                            $posts_image = $row['posts_image'];
                            $my_content = $row['my_content'];
                            $posts_tag = $row['posts_tag'];
                            $posts_comment_count = $row['posts_comment_count'];
                            $posts_status = $row['posts_status'];
                           
                            ?>

                                <div class="media post_item">
                                    <img src="assets/img/blog/<?php echo "$posts_image"; ?>" width=80 alt="post">
                                    <div class="media-body">
                                        <a href="blog_details.html">
                                            <?php echo "<h3 style='color: #2d2d2d;'>$posts_title</h3>";?> 
                                        </a>
                                        <?php echo "<p>$posts_date</p>";?>
                                    </div>
                                </div>
                                <?php } ?>
                                <!-- <div class="media post_item">
                                    <img src="assets/img/post/post_2.png" alt="post">
                                    <div class="media-body">
                                        <a href="blog_details.html">
                                            <h3 style="color: #2d2d2d;">The Amazing Hubble</h3>
                                        </a>
                                        <p>02 Hours ago</p>
                                    </div>
                                </div>
                                <div class="media post_item">
                                    <img src="assets/img/post/post_3.png" alt="post">
                                    <div class="media-body">
                                        <a href="blog_details.html">
                                            <h3 style="color: #2d2d2d;">Astronomy Or Astrology</h3>
                                        </a>
                                        <p>03 Hours ago</p>
                                    </div>
                                </div>
                                <div class="media post_item">
                                    <img src="assets/img/post/post_4.png" alt="post">
                                    <div class="media-body">
                                        <a href="blog_details.html">
                                            <h3 style="color: #2d2d2d;">Asteroids telescope</h3>
                                        </a>
                                        <p>01 Hours ago</p>
                                    </div>
                                </div>
                            </aside>
                            <aside class="single_sidebar_widget tag_cloud_widget"> -->
                                <!-- <h4 class="widget_title" style="color: #2d2d2d;">Tag Clouds</h4>
                                <ul class="list">
                                    <li>
                                        <a href="#">project</a>
                                    </li>
                                    <li>
                                        <a href="#">love</a>
                                    </li>
                                    <li>
                                        <a href="#">technology</a>
                                    </li>
                                    <li>
                                        <a href="#">travel</a>
                                    </li>
                                    <li>
                                        <a href="#">restaurant</a>
                                    </li>
                                    <li>
                                        <a href="#">life style</a>
                                    </li>
                                    <li>
                                        <a href="#">design</a>
                                    </li>
                                    <li>
                                        <a href="#">illustration</a>
                                    </li>
                                </ul> -->
                            </aside>

                            <aside class="single_sidebar_widget instagram_feeds">
                                <!-- h4 class="widget_title" style="color: #2d2d2d;">Instagram Feeds</h4>
                                <ul class="instagram_row flex-wrap">
                                    <li>
                                        <a href="#">
                                            <img class="img-fluid" src="assets/img/post/post_5.png" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img class="img-fluid" src="assets/img/post/post_6.png" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img class="img-fluid" src="assets/img/post/post_7.png" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img class="img-fluid" src="assets/img/post/post_8.png" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img class="img-fluid" src="assets/img/post/post_9.png" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img class="img-fluid" src="assets/img/post/post_10.png" alt="">
                                        </a>
                                    </li> -->
                                </ul>
                            </aside>
                            <aside class="single_sidebar_widget newsletter_widget">
                                <!-- <h4 class="widget_title" style="color: #2d2d2d;">Newsletter</h4>
                                <form action="#">
                                    <div class="form-group">
                                        <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                                    </div>
                                    <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                        type="submit">Subscribe</button>
                                </form> -->
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Area End -->
        <!-- Want To work 02-->
        <section class="wantToWork-area">
          <!--   <div class="container">
                <div class="wants-wrapper w-padding2">
                    <div class="row justify-content-between">
                        <div class="col-xl-8 col-lg-8 col-md-7">
                            <div class="wantToWork-caption wantToWork-caption2">
                                <img src="assets/img/logo/logo2_footer.png" alt="" class="mb-20">
                                <p>Users and submit their own items. You can create different packages and by connecting with your
                                    PayPal or Stripe account charge users for registration to your directory portal.</p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-5">
                            <div class="footer-social f-right sm-left">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="https://bit.ly/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </section>
        <!-- Want To work End -->
        <!-- Want To work 01-->
        <section class="wantToWork-area">
            <div class="container">
                <div class="wants-wrapper">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-xl-7 col-lg-9 col-md-8">
                            <div class="wantToWork-caption wantToWork-caption2">
                                <div class="main-menu2">
                                    <nav>
                                        <!-- <ul>
                                            <li><a href="index.html">Home</a></li>
                                            <li><a href="explore.html">Explore</a></li> 
                                            <li><a href="pages.html">Pages</a></li>
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                        </ul> -->
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-xl-2 col-lg-3 col-md-4">
                            <a href="#" class="btn f-right sm-left">Add Listing</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Want To work End -->
    </main>
    <footer>
        <div class="footer-wrapper pt-30">
            <!-- footer-bottom -->
            <div class="footer-bottom-area">
                <div class="container">
                    <div class="footer-border">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-xl-10 col-lg-9 ">
                                <div class="footer-copy-right">
                                   <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>
      <!-- JS here -->

      <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
      <!-- Jquery, Popper, Bootstrap -->
      <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
      <script src="./assets/js/popper.min.js"></script>
      <script src="./assets/js/bootstrap.min.js"></script>
      <!-- Jquery Mobile Menu -->
      <script src="./assets/js/jquery.slicknav.min.js"></script>

      <!-- Jquery Slick , Owl-Carousel Plugins -->
      <script src="./assets/js/owl.carousel.min.js"></script>
      <script src="./assets/js/slick.min.js"></script>
      <!-- One Page, Animated-HeadLin -->
      <script src="./assets/js/wow.min.js"></script>
      <script src="./assets/js/animated.headline.js"></script>
      <script src="./assets/js/jquery.magnific-popup.js"></script>

      <!-- Date Picker -->
      <script src="./assets/js/gijgo.min.js"></script>
      <!-- Nice-select, sticky -->
      <script src="./assets/js/jquery.nice-select.min.js"></script>
      <script src="./assets/js/jquery.sticky.js"></script>
      
      <!-- counter , waypoint,Hover Direction -->
      <script src="./assets/js/jquery.counterup.min.js"></script>
      <script src="./assets/js/waypoints.min.js"></script>
      <script src="./assets/js/jquery.countdown.min.js"></script>
      <script src="./assets/js/hover-direction-snake.min.js"></script>

      <!-- contact js -->
      <script src="./assets/js/contact.js"></script>
      <script src="./assets/js/jquery.form.js"></script>
      <script src="./assets/js/jquery.validate.min.js"></script>
      <script src="./assets/js/mail-script.js"></script>
      <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
      
      <!-- Jquery Plugins, main Jquery -->	
      <script src="./assets/js/plugins.js"></script>
      <script src="./assets/js/main.js"></script>


     
    </body>
</html>