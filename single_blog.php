<?php include "./includes/blog_header.php"; ?>
<?php include "./includes/db.php"; ?>
      <!-- Hero End -->
      <!--? Blog Area Start -->


         
      <section class="blog_area single-post-area section-padding">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 posts-list">
               <?php    

               if (isset($_GET['p_id'])) {
               $the_posts_id = $_GET['p_id'];
                                             # code...
                                                                  
              $query ="SELECT * FROM posts WHERE posts_id = '{$the_posts_id}' ";
              $select_all_posts_query = mysqli_query($connection,$query);

              while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                  $posts_image = $row['posts_image'];
                  $posts_date = $row['posts_date'];
                  $posts_title = $row['posts_title'];
                  $my_content = $row['my_content'];
                  $posts_tag = $row['posts_tag'];
                  $posts_comment = $row['posts_comment_count'];
                  ?>

                  <div class="single-post">
                     <div class="feature-img">
                        <img class="img-fluid" src="./assets/img/blog/<?php echo "$posts_image";?>" alt="">
                     </div>
                     <div class="blog_details">
                        <?php echo "<h2 style='color: #2d2d2d;'>$posts_title</h2>";?>
                        <ul class="blog-info-link mt-3 mb-4">
                          <?php echo "<li><a href='#'><i class='fa fa-user'></i>$posts_tag</a></li>";?>
                          
                        </ul>
                       <?php echo"<p>$my_content</p>"; ?>  
                     </div>
                  </div>
                  <?php } } ?>


                  <div class="navigation-top">
                     <div class="d-sm-flex justify-content-between text-center">
                       <!--  <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily and 4
                           people like this</p> -->
                        <div class="col-sm-4 text-center my-2 my-sm-0">
                           
                        </div>
                        <!-- <ul class="social-icons">
                           <li><a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a></li>
                           <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                           <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                           <li><a href="#"><i class="fab fa-behance"></i></a></li>
                        </ul> -->
                     </div>
                     <div class="navigation-area">
                        <div class="row">
                           <div
                              class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                              <div class="thumb">
                                <!--  <a href="#">
                                    <img class="img-fluid" src="assets/img/post/preview.png" alt="">
                                 </a> -->
                              </div>
                              <div class="arrow">
                                 <a href="#">
                                    <span class="lnr text-white ti-arrow-left"></span>
                                 </a>
                              </div>
                              <!-- <div class="detials">
                                 <p>Prev Post</p>
                                 <a href="#">
                                    <h4 style="color: #2d2d2d;">Space The Final Frontier</h4>
                                 </a>
                              </div> -->
                           </div>
                           <div
                              class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                              <!-- <div class="detials">
                                 <p>Next Post</p>
                                 <a href="#">
                                    <h4 style="color: #2d2d2d;">Telescopes 101</h4>
                                 </a>
                              </div> -->
                              <div class="arrow">
                                 <a href="#">
                                    <span class="lnr text-white ti-arrow-right"></span>
                                 </a>
                              </div>
                              <div class="thumb">
<!--                                  <a href="#">
                                    <img class="img-fluid" src="assets/img/post/next.png" alt="">
                                 </a> -->
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="comments-area">

                  <?php 
                  $query = "SELECT * FROM comments WHERE comments_posts_id = {$the_posts_id} ";
                  $query .="AND comments_status = 'Approved' ";
                  $query .="ORDER BY comments_id DESC ";
                  $select_comments = mysqli_query($connection,$query);
                  while ($row = mysqli_fetch_assoc($select_comments)) {
                    $comments_content = $row['comments_content'];
                    $comments_author = $row['comments_author'];
                    $comments_date = $row['comments_date'];
                    # code...
                  
                  ?>

                     <h4>Comments</h4>
                     <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                           <div class="user justify-content-between d-flex">
                              <div class="thumb">
                                 <img src="assets/img/blog/single_blog_5.PNG" alt="">
                              </div>
                              <div class="desc">
                                <?php echo "<p class='comment'>$comments_content</p>";?>
                                 <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                       <h5>
                                          <?php echo "<a href='#'>$comments_author</a>";?>
                                       </h5>
                                       <?php echo "<p class='date'>$comments_date</p>";?>
                                    </div>
                                    <div class="reply-btn">
                                       <a href="#" class="btn-reply text-uppercase">reply</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php } ?>
                     
                  <div class="comment-form">

                  <?php 

                  if (isset($_POST['submit'])) {
                   $the_posts_id = $_GET['p_id'];
                   $comments_content = $_POST['comments_content'];
                   $comments_author = $_POST['comments_author'];
                   $comments_email = $_POST['comments_email'];

                   $query = "INSERT INTO comments(comments_posts_id, comments_author, comments_email, comments_content, comments_status, comments_date) ";
                   $query .= "VALUES({$the_posts_id}, '{$comments_author}', '{$comments_email}', '{$comments_content}', 'Unapproved', now()) "; 
                   $comment_query = mysqli_query($connection,$query); 
                   if (!$comment_query) {
                    die("query failed".mysqli_error($connection));
                                     
                                    }    


                         $query = "UPDATE posts SET posts_comment_count = posts_comment_count + 1 ";
                         $query .= "WHERE posts_id = $the_posts_id ";
                         $comment_count_query = mysqli_query($connection,$query);


                                       }
                    ?>

                     <h4>Leave a Reply</h4>
                     <form class="form-contact comment_form" action="" id="commentForm" method="post" enctype="multipart/form-data">
                        <div class="row">
                           <div class="col-12">
                              <div class="form-group">
                                 <textarea class="form-control w-100" name="comments_content" id="comment" cols="30" rows="9"
                                    placeholder="Write Comment"></textarea>
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <input class="form-control" name="comments_author" id="name" type="text" placeholder="Name">
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <input class="form-control" name="comments_email" id="email" type="email" placeholder="Email">
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <button type="submit" name="submit" class="button button-contactForm btn_1 boxed-btn">Post Comment</button>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="blog_right_sidebar">
                     <aside class="single_sidebar_widget search_widget">
                        <!-- <form action="#">
                           <div class="form-group">
                              <div class="input-group mb-3">
                                 <input type="text" class="form-control" placeholder='Search Keyword'
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                                 <div class="input-group-append">
                                    <button class="btns" type="button"><i class="ti-search"></i></button>
                                 </div>
                              </div>
                           </div>
                           <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                              type="submit">Search</button>
                        </form> -->
                     </aside>
                     <aside class="single_sidebar_widget post_category_widget">
                       <!--  <h4 class="widget_title" style="color: #2d2d2d;">Category</h4>
                        <ul class="list cat-list">
                           <li>
                              <a href="#" class="d-flex">
                                 <p>Resaurant food</p>
                                 <p>(37)</p>
                              </a>
                           </li>
                           <li>
                              <a href="#" class="d-flex">
                                 <p>Travel news</p>
                                 <p>(10)</p>
                              </a>
                           </li>
                           <li>
                              <a href="#" class="d-flex">
                                 <p>Modern technology</p>
                                 <p>(03)</p>
                              </a>
                           </li>
                           <li>
                              <a href="#" class="d-flex">
                                 <p>Product</p>
                                 <p>(11)</p>
                              </a>
                           </li>
                           <li>
                              <a href="#" class="d-flex">
                                 <p>Inspiration</p>
                                 <p>(21)</p>
                              </a>
                           </li>
                           <li>
                              <a href="#" class="d-flex">
                                 <p>Health Care</p>
                                 <p>(21)</p>
                              </a>
                           </li>
                        </ul> -->
                     </aside>
                     <aside class="single_sidebar_widget popular_post_widget">
                        <!-- <h3 class="widget_title" style="color: #2d2d2d;">Recent Post</h3>
                        <div class="media post_item">
                           <img src="assets/img/post/post_1.png" alt="post">
                           <div class="media-body">
                              <a href="blog_details.html">
                                 <h3 style="color: #2d2d2d;">From life was you fish...</h3>
                              </a>
                              <p>January 12, 2019</p>
                           </div>
                        </div>
                        <div class="media post_item">
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
                        </div> -->
                     </aside>
                     <aside class="single_sidebar_widget tag_cloud_widget">
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
                       <!--  <h4 class="widget_title" style="color: #2d2d2d;">Instagram Feeds</h4>
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
                           </li>
                        </ul>
                     </aside>
                     <aside class="single_sidebar_widget newsletter_widget">
                        <h4 class="widget_title" style="color: #2d2d2d;">Newsletter</h4>
                        <form action="#">
                           <div class="form-group">
                              <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                 onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                           </div>
                           <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Subscribe</button>
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
         <!-- <div class="container">
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
                    <!--  <div class="col-xl-2 col-lg-3 col-md-4">
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