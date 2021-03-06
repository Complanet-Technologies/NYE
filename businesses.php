<?php include"db_config.php"?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>DirectoryListing</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

	<!-- CSS here -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/progressbar_barfiller.css">
    <link rel="stylesheet" href="assets/css/gijgo.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/animated-headline.css">
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
	<link rel="stylesheet" href="assets/css/themify-icons.css">
	<link rel="stylesheet" href="assets/css/slick.css">
	<link rel="stylesheet" href="assets/css/nice-select.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/" alt="NYE logo">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area header-transparent">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper d-flex align-items-center justify-content-between">
                        <!-- Logo -->
                        <div class="logo">
                        <a href="index.php"><img src="" alt="NYE logo"></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu f-right d-none d-lg-block">
                        <nav>
                                <ul id="navigation">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="about.php">About </a></li> 
                                    <li><a href="members.php">Members</a></li>
                                    <li><a href="blog.php">Blog</a></li>
                                    <li><a href="businesses.php">Businesses</a></li>
                                    <li><a href="contact.php">Contact Us</a></li>
                                    <li></li><a href="login.php"class="mr-40"><i class="ti-user"></i> Log in</a>
                        </div>          
                        <!-- Header-btn -->
                         <div class="header-btns d-none d-lg-block f-right">

                

                            <a href="#" id="signup" class="btn">Sign Up</a>
                        </div>
                    </ul>
                </nav>
                        </div>          
                        <!-- Header-btn -->
                       
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <main>
    <!--? Hero Area Start-->
    <div class="slider-area hero-bg2 hero-overly">
        <div class="single-slider hero-overly  slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-10">
                        <!-- Hero Caption -->
                        <div class="hero__caption hero__caption2 pt-200">
                            <h1>Explore what you are finding</h1>
                        </div>
                        <!--Hero form -->
                        <?php

                        if (isset($_POST['businessName'])) {
                    
                            $businessName = $_POST['businessName'];
                            $businessCategory = $_POST['category'];

                            $query = "SELECT * FROM businessnye WHERE bus_name LIKE '%$businessName' ";
                            $result = mysqli_query($conn,$query);

                            if ($result) {
                                echo"result found";
                            }else{

                                die("couldnt run query" . mysqli_error($conn));
                            }

                        
                        }


                        ?>

                        <form action="" class="search-box mb-100" method="post">
                            <div class="input-form">
                                <input type="text" name="businessName" placeholder="What are you finding?">
                            </div>
                            <div class="select-form">
                                <div class="select-itms">
                                      <select name='category' id='select1'>
                                    <option value='Nil'>Choose business category</option>
                                    <?php
                                        $query = "SELECT category FROM business_categorynye";
                                        $select_query = mysqli_query($conn, $query);
                                        
                                      while ( $row = mysqli_fetch_assoc($select_query)) {
                                         
                                            $category = $row['name'];

                                   echo"
                                  
                                        
                                        <option value='$category'>$category</option>

                                    ";
                                }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="search-form">
                                <button name="search" class="btn"><i class="ti-search"></i>Search</button>
                            </div>	
                        </form>	

                    </div>
                </div>
            </div>
        </div>
    </div>
   


  <!-- listing Area Start -->
  <div class="listing-area pt-120 pb-120">
    <div class="container">
        <div class="row">
            <!--? Left content -->
            
            <!--?  Right content -->
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="count mb-35">
                            <?php 

                                $query = "SELECT count(*) as total FROM businessnye";
                                $result = mysqli_query($conn,$query);

                                $row1 = mysqli_fetch_assoc($result);
                                    $count = $row1['total'];
                                echo"<span>Total listings available = $count </span>";
                               ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="count mb-35">
                            <?php 

                                $query = "SELECT count(*) as total FROM business WHERE bus_status = 'approved'";
                                $result = mysqli_query($conn,$query);

                                if($result>0){

                                $row1 = mysqli_fetch_assoc($result);
                                    $count = $row1['total'];
                                echo"<span>Total approved listings = $count</span>";
                                }
                                else{
                                    echo"<span>Total approved listings = 0</span>";
                                }



                               ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="count mb-35">
                            <?php 

                                $query = "SELECT count(*) as total FROM businessnye WHERE bus_status = 'unapproved'";
                                $result = mysqli_query($conn,$query);

                                $row1 = mysqli_fetch_assoc($result);
                                    $count = $row1['total'];
                                echo"<span>Unapproved listings = $count</span>";
                               ?>
                        </div>
                    </div>
                </div>
                <hr>
                <!--? Popular Directory Start -->
                <div class="popular-directorya-area fix">
                        <div class="row">

                            <?php 
                            $query = "SELECT * FROM businessnye";
                            $result = mysqli_query($conn,$query);

                            if (!$result) {
                                
                                die("cannot fetch required informations from the database" . mysqli_error($conn));
                            }

                            while ($row = mysqli_fetch_assoc($result)) {

                                $businessId = $row['id'];
                                $businessImage = $row['bus_image'];
                                $businessName = $row['bus_name'];
                                $businessCategory = $row['bus_category'];
                                $businessDescription =substr($row['bus_description'], 0,100) ;
                                $businessAddress = $row['bus_address'];
                                 $businessStatus = $row['bus_status'];

                            ?>
                            <div class="col-lg-4">
                                <!-- Single -->
                                <div class="properties properties2 mb-30">
                                    <div class="properties__card">
                                        <div class="properties__img overlay1">
                                            <a href="#"><img src="users/uploads/<?php echo$businessImage?>" alt=""></a>
                                            <div class="img-text">
                                                
                                                <?php

                                        if ($businessStatus == 'approved') {
                                            echo "<i class='fa fa-certificate' style='color:blue; font-size: 30px;;'></i>";
                                        }else{

                                            echo"";
                                        }

                                    ?>
                                            </div>
                                            <div class="icon">
                                                <img src="users/uploads/<?php echo$businessImage?>" alt=""> 
                                            </div>
                                        </div>
                                        <div class="properties__caption">
                                            <h3><a href="#"><?php echo $businessName?></a></h3>

                                            <p><?php echo $businessDescription?></p>
                                            <h4><i class="fa fa-map-marker" style="padding-right: 10px;"></i><?php echo" ".  $businessAddress?></h4>
                                        </div>
                                        <div class="properties__footer d-flex justify-content-between align-items-center">
                                            <div class="restaurant-name">
                                                
                                                <!-- <img src="assets/img/gallery/restaurant-icon.png" alt=""> -->
                                                <h3><i class="fa fa-cogs" style="padding-right: 10px;"></i><?php echo"  ".  $businessCategory?></h3>
                                            </div>
                                            <div class="heart">
                                                <img src="assets/img/gallery/heart1.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                </div>
                <!--? Popular Directory End -->
                <!--Pagination Start  -->
                <div class="pagination-area text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="single-wrap d-flex justify-content-center">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-start " id="myDIV">
                                            <li class="page-item"><a class="page-link" href="#"><span class="ti-angle-left"></span></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                            <li class="page-item"><a class="page-link" href="#">02</a></li>
                                            <li class="page-item"><a class="page-link" href="#">03</a></li>
                                            <li class="page-item"><a class="page-link" href="#"><span class="ti-angle-right"></span></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Pagination End  -->
            </div>
        </div>
    </div>
</div>
<!-- listing-area Area End -->



    <!--? Popular Locations Start 01-->
    
    <!-- Popular Locations End -->
    <!--? Want To work 02-->
    <section class="wantToWork-area">
        <div class="container">
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
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="explore.html">Explore</a></li> 
                                        <li><a href="pages.html">Pages</a></li>
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4">
                        <a href="#" class="btn f-right sm-left">Add Listing</a>
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
    <!-- Progress -->
    <script src="./assets/js/jquery.barfiller.js"></script>
    
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
