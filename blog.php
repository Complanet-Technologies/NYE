<?php include "./includes/blog_header.php"; ?>
<?php include "./db_config.php"; ?>
        <!--? Blog Area Start-->
        <section class="blog_area section-padding">
            <div class="container">
                <div class="row">
                  <?php 

                    

                    if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                        $page_no = $_GET['page_no'];
                        } else {
                            $page_no = 1;
                            }

                        $total_records_per_page = 2;
                        $offset = ($page_no-1) * $total_records_per_page;
                        $previous_page = $page_no - 1;
                        $next_page = $page_no + 1;
                        $adjacents = "2"; 

                        $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `blog_postsnye`");
                        $total_records = mysqli_fetch_array($result_count);
                        $total_records = $total_records['total_records'];
                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                        $second_last = $total_no_of_pages - 1; // total page minus 1
    
                        $query = "SELECT * FROM blog_postsnye  WHERE posts_status = 'published' LIMIT $offset, $total_records_per_page ";
                        $posts_query = mysqli_query($conn,$query);
                        while ($row = mysqli_fetch_assoc($posts_query)) {
                            $posts_id = $row['posts_id'];
                            $posts_category_id = $row['posts_category_id'];
                            $posts_title = $row['posts_title'];
                            $posts_author = $row['posts_author'];
                            $posts_date = $row['posts_date'];
                            $posts_image = $row['posts_image'];
                            $my_content = $row['posts_content'];
                            $posts_tag = $row['posts_tag'];
                            $posts_comment_count = $row['posts_comment_count'];
                            $posts_status = $row['posts_status'];
                            # code...
                    


                        ?>
                    <div class="col-lg-4 mb-5 mb-lg-4">
                        <div class="blog_left_sidebar">

                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="assets/img/gallery/<?php echo "$posts_image";?> "alt="img">
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
                            
                           <!--  <nav class="blog-pagination justify-content-center d-flex">                                    
                            </nav> -->
<!-- <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div> -->
                        </div>
                    </div>
                    <?php } ?>
                 
                    
                    <div class="col-lg-4">

                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget search_widget">
                           
                                <form action="search.php" method="post">
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
                                $query = "SELECT * FROM blog_categoriesnye ";
                                $select_cat = mysqli_query($conn,$query);
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
                            $query = "SELECT * FROM blog_postsnye ";
                            $posts_query = mysqli_query($conn,$query);
                            while ($row = mysqli_fetch_assoc($posts_query)) {
                                 # code...
                            $posts_id = $row['posts_id'];
                            $posts_category_id = $row['posts_category_id'];
                            $posts_title = $row['posts_title'];
                            $posts_author = $row['posts_author'];
                            $posts_date = $row['posts_date'];
                            $posts_image = $row['posts_image'];
                            $my_content = $row['posts_content'];
                            $posts_tag = $row['posts_tag'];
                            $posts_comment_count = $row['posts_comment_count'];
                            $posts_status = $row['posts_status'];
                           
                            ?>

                                <div class="media post_item">
                                    <img src="assets/img/gallery/<?php echo "$posts_image"; ?>" width=80 alt="post">
                                    <div class="media-body">
                                        <a href="blog_details.html">
                                            <?php echo "<h3 style='color: #2d2d2d;'>$posts_title</h3>";?> 
                                        </a>
                                        <?php echo "<p>$posts_date</p>";?>
                                    </div>
                                </div>
                                <?php } ?>
                               
                            </aside>

                          
                        </div>
                    </div>
                </div>
                <ul class="pagination">
    <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
    <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
    <a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
    </li>
       
    <?php 
    if ($total_no_of_pages <= 10){       
        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
            if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }
        }
    }
    elseif($total_no_of_pages > 10){
        
    if($page_no <= 4) {         
     for ($counter = 1; $counter < 8; $counter++){       
            if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }
        }
        echo "<li><a>...</a></li>";
        echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
        echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
        }
}
     elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {         
        echo "<li><a href='?page_no=1'>1</a></li>";
        echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {         
           if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }                  
       }
       echo "<li><a>...</a></li>";
       echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
       echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
        
        else {
        echo "<li><a href='?page_no=1'>1</a></li>";
        echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }                   
                }
            }
    
?>
    
    <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
    <a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
    </li>
    <?php if($page_no < $total_no_of_pages){
        echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
        } ?>
</ul>
            </div>
        </section>
        <!-- Blog Area End -->
        <!-- Want To work 02-->
        <section class="wantToWork-area">
            <div class="container">
                <div class="wants-wrapper w-padding2">
                    <div class="row justify-content-between">
                        <div class="col-xl-8 col-lg-8 col-md-7">
                            <div class="wantToWork-caption wantToWork-caption2">
                                <img src="" alt=" NACIMA logo" class="mb-20">
                                <p>Connect with us</p>
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
            </div>
        </section>
        <!-- Want To work End -->
        <!--? Want To work 01-->
        <section class="wantToWork-area">
            <div class="container">
                <div class="wants-wrapper">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-xl-7 col-lg-9 col-md-8">
                            <div class="wantToWork-caption wantToWork-caption2">
                                <div class="main-menu2">
                                    <nav>
                                        <ul>
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="about.php">About </a></li> 
                                            <li><a href="members.php">Members</a></li>
                                            <li><a href="blog.php">Blog</a></li>
                                            <li><a href="businesses.php">Businesses</a></li>
                                            <li><a href="contact.php">Contact Us</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4">
                            <a href="signup.php" class="btn f-right sm-left">Sign Up</a>
                        </div>
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
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This Website is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://complanettechnologies.com.ng" target="_blank">Complanet technologies</a>
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