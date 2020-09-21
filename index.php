<?php
include "db_config.php";
include "land_includes/get_blog_business.php";
// include "land_includes/search.php";
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Welcome to NYE</title>
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

                

                            <a href="signup.php" id="signup" class="btn">Sign Up</a>
                        </div>
                    </ul>
                </nav>
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
        <div class="slider-area hero-bg1 hero-overly">
            <div class="single-slider hero-overly  slider-height1 d-flex align-items-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-10 col-lg-10">
                            <!-- Hero Caption -->
                            <div class="hero__caption pt-100">
                                <h1 style="font-size: 35px;">Welcome to NACCIMA Youth Enterpreneur  Site</h1>
                                <p>Your journey to be noticed online begins with us</p>
                            </div>
                            <!--Hero form -->
                            <form action="" method="post" class="search-box mb-100">
                                <div class="input-form" style="width: 70%;">
                                    <input type="text" name = "user_inputnye" placeholder="Find a business">
                                </div>
                             
                                <div class="search-form">
                                    <!-- <a href="" name="search"><i class="ti-search"></i> Search</a> -->
                                    
                                    <button style="background-color:#B367FF; border-radius:7px; height:50px; width:60%;" type="submit" name="search"><i class="ti-search"></i> Search</button>
                                    <!-- <button type="submit" name="search"><a href=""><i class="ti-search"></i> Search</a></button> -->
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Hero Area End-->


                <?php


if(isset($_POST['search'])){
    $keywordnye = $_POST['user_inputnye'];
    $sql= $conn->prepare(" SELECT* FROM businessnye WHERE bus_name like '%".$keywordnye."%' 
     AND  bus_status = 'approved'
     OR bus_category like '%".$keywordnye."%' 
     AND  bus_status = 'approved'
     OR bus_name like '%".$keywordnye."%'
     AND  bus_status = 'approved'
     OR bus_category like '%".$keywordnye."%'
     AND  bus_status = 'approved'
     OR bus_name like '%".$keywordnye."%'
     AND  bus_status = 'approved'
     OR bus_location like '%".$keywordnye."%' AND  bus_status = 'approved' ");
    $sql->execute();
    $the_result = $sql->get_result();
    ?>


    <div class="popular-directorya-area  border-bottom section-padding40 fix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Section Tittle -->
                        <div class="section-tittle text-center mb-80">
                        <h2>Your Search Results</h2>
                        <h3>No result? You may search again</h3>
                        </div>
                    </div>
                </div>
                <div class="directory-active">


                    <?php
                // $the_result->fetch_array()
                if(empty($the_result)){ 
                    echo "No result";
                }
                    else{
              while($search_row = mysqli_fetch_array($the_result)){
    $bus_image = $search_row['bus_image'];
    $bus_category = $search_row['bus_category'];
    $bus_name = $search_row['bus_name'];
    $bus_description = $search_row['bus_description'];
    $bus_address = $search_row['bus_address']; ?>


<div class="properties pb-20">
        <div class="properties__card">
            <div class="properties__img overlay1">
                <a href="#"><img src="" alt="Business Image"></a>

            </div>
            <div class="properties__caption">
                <h3><a href="login.php"><?php echo $bus_name?></a></h3>
                <p><?php echo $bus_description?></p>
            </div>
            <div class="properties__footer d-flex justify-content-between align-items-center">
                <div class="restaurant-name">
                    <h3><i class="fa fa-tag"></i><?php echo $bus_category?></h3>
                </div>
                <div class="heart">
                    <i class="fa fa-map-marker"><?php echo $bus_address?></i>
                </div>
            </div>
        </div>
    </div>

    <?php

    }  

}
   
   ?>
   
   </div>
            </div>
        </div>
   
   <?php
}
                                     
  ?>        

<div id="search_result" class="popular-directorya-area  border-bottom section-padding40 fix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Section Tittle -->
                        <div class="section-tittle text-center mb-80">
                            <h2>Popular Businesses</h2>
                            <p>Looking for a vendor? Here is the best place to get one!</p>
                        </div>
                    </div>
                </div>
                <div class="directory-active">

  <?php
                    
                        while($nye_row = $business_result->fetch_array()){
                            if(!empty($nye_row)){
                    $bus_image = $nye_row['bus_image'];
                    $bus_category = $nye_row['bus_category'];
                    $bus_name = $nye_row['bus_name'];
                    $bus_description = $nye_row['bus_description'];
                    $bus_address = $nye_row['bus_address'];

                    ?>
                    <div class="properties pb-20">
                        <div class="properties__card">
                            <div class="properties__img overlay1">
                                <a href="#"><img src="" alt="Business Image"></a>

                            </div>
                            <div class="properties__caption">
                                <h3><a href="login.php"><?php echo $bus_name?></a></h3>
                                <p><?php echo $bus_description?></p>
                            </div>
                            <div class="properties__footer d-flex justify-content-between align-items-center">
                                <div class="restaurant-name">
                                    <h3><i class="fa fa-tag"></i><?php echo $bus_category?></h3>
                                </div>
                                <div class="heart">
                                    <i class="fa fa-map-marker"><?php echo $bus_address?></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } 
                    else{
                        echo "No business available";
                    }
                }
                    ?>
                   
                    
                </div>
            </div>
        </div>
        <!--? Popular Directory End -->
        <!--? Want To work 01-->
        <section class="wantToWork-area">
            <div class="container">
                <div class="wants-wrapper w-padding2">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-xl-7 col-lg-9 col-md-8">
                            <div class="wantToWork-caption wantToWork-caption2">
                                <h2>How our platform works</h2>
                              
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4">
                            <a href="#" class="btn f-right sm-left">Available Businesses</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Want To work End -->
        <!--? Our Services Start -->
        <div class="our-services  border-bottom">
            <div class="container">
                <div class="row">
                    <div class=" col-lg-4 col-md-6 col-sm-6">
                        <div class="single-services mb-30">
                            <div class="services-ion">
                                <span>01</span>
                            </div>
                            <div class="services-cap">
                                <h5><a href="#">Become a member</a></h5>
                                <p>Your first step in gaining a vast online presence is to become one of us. 
                                    Becoming a member gives you the privildege to display your many busisses and many more. 
                                    <a href="signup.php" style="color: blue;">Signup now</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-4 col-md-6 col-sm-6">
                        <div class="single-services mb-30">
                            <div class="services-ion">
                                <span>02</span>
                            </div>
                            <div class="services-cap">
                                <h5><a href="#">Register Your Business(es)</a></h5>
                                <p>As our main priority is for you to be found online, 
                                    we love that you advertise your many businesses on our platform as long as you are a member.
                                    Your clients await you!
                                    
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-4 col-md-6 col-sm-6">
                        <div class="single-services mb-30">
                            <div class="services-ion">
                                <span>03</span>
                            </div>
                            <div class="services-cap">
                                <h5><a href="#">Find a Business</a></h5>
                                <p>looking to hire a vendor? Only here can you locate the best vendors in town. 
                                    The connection is rapid and you determine the way you wish to interact with your chosen vendors  </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Services End -->
        <!--? Popular Directory Start -->
        <div class="popular-directorya-area section-padding40 border-bottom fix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Section Tittle -->
                        <div class="section-tittle text-center mb-80">
                            <h2>Blog Items</h2>
                            <p>Check out some of our posts</p>
                        </div>
                    </div>
                </div>
                <div class="directory-active">
                    <!-- Single -->
                    <?php
                    while($blog_row = $blog_result->fetch_array()){
                        if(!empty($blog_row)){

                            $posts_image = $blog_row['posts_image'];
                            $posts_title = $blog_row['posts_title'];
                            $posts_content = $blog_row['posts_content'];
                            $posts_author = $blog_row['posts_author'];
                            

                            ?>
                    <div class="properties pb-20">
                        <div class="properties__card">
                            <div class="properties__img overlay1">
                                <a href="#"><img src="" alt="Blog Image"></a>

                            </div>
                            <div class="properties__caption">
                                <h3><a href="#"><?php echo $posts_title?></a></h3>
                                <p><?php echo $posts_content?></p>
                            </div>
                            <div class="properties__footer d-flex justify-content-between align-items-center">
                                <div class="restaurant-name">
                                    <i class="fa fa-user" style="color: black;"> </i>
                                    <h3><?php echo $posts_author?></h3>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php
                    }else{

                         ?> <h2 style="color:black"><?php echo "No blog available";?></h2>
                        <?php
                    }
                }
                    ?>
                    

                </div>
            </div>
        </div>
        <!-- Popular Directory End -->
        
        <!-- Popular Locations End -->
        <!--? Want To work 02-->
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
                                    <p>
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made by <a href="https://complanettechnologies.com.ng" target="_blank">Complanet Technologies</a>
  </p>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    


    
    </body>
</html>
