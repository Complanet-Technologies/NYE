<?php include"../db_config.php"?>
<!DOCTYPE html>
<html lang="en"> 
<!-- Mirrored from geniuscript.com/local/homepage-business.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Aug 2020 08:32:09 GMT -->
<head> 
	<meta charset="UTF-8" /> 
	<title>NYE :: Users Dashboard</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" /> 
	<link rel="icon" href="assets/img/favicon.ico" type="image/x-icon" /> 
	<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900%7COpen+Sans" rel="stylesheet" /> 
	<link rel="stylesheet" href='assets/libraries/font-awesome/css/font-awesome.min.css' /> 
	<link rel="stylesheet" href='assets/libraries/ionicons-2.0.1/css/ionicons.min.css' /> 
	<link rel="stylesheet" href='assets/cache/css.min.css'/> 
	<body class=""> 
		<header class="header"> 
		<div class="container container-palette top-bar affix-menu"> 
			<div class="container-top"> 
				<div class="clearfix"> 
					<div class="clearfix"> 
					<div class="pull-left logo"><a href="./index.php">NYE</a></div> 
					<div class="top-bar-btns"> 
						<ul class="nav-items"> 
							<li><a href="listings.php?source=add_business" class="btn btn-custom-primary">Add Business</a></li> 
							<li><a href="index.php" class="btn btn-custom-default">Back to dashboard <i class="fa fa-arrow-right"></i></a></li>
						</ul> 
						<button type="button" class="navbar-toggle" id="navigation-toogle"> 
							<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> 
							<span class="icon-bar"></span> <span class="icon-bar"></span> 
						</button> 
					</div> 
					<div class="pull-right navigation-wrapper"> 
						<a href="#" class="button-close"></a> 
						<div class="logo"><a href="#">NYE</a></div> 
						<ul class="lang-menu-mobile"> 
							<li><a href="listings.php?source=add_business" class="btn btn-custom-primary">Add Listing</a></li> 
							<li><a href="index.php"  class="btn btn-custom-default"><i class="fa fa-arrow-right"></i>Back to dashboard</a></li> 
							</ul> 
						</div> 
					</div> 
				</div> 
			</div> 
		</header>
        <!-- /.header --> 
        <main class="main container container-palette">
        <?php

        	if (isset($_GET['businessid'])) {
        		
        			$the_business_id = $_GET['businessid'];

        					$query = "SELECT * FROM business WHERE bus_id = $the_business_id";
                            $result = mysqli_query($conn,$query);

                            if (!$result) {
                                
                                die("cannot fetch required informations from the database" . mysqli_error($conn));
                            }

                            while ($row = mysqli_fetch_assoc($result)) {

                                $businessId = $row['bus_id'];
                                $businessImage = $row['bus_image'];
                                $businessName = $row['bus_name'];
                                $businessCategory = $row['bus_category'];
                                $businessContact = $row['bus_contact'];
                                $businessAddress = $row['bus_add'];
                                $businessDescription = $row['business_descrip'];
                                $bus_status = $row['bus_status'];
                                $open_days = $row['open_days'];
                                $businessWebsite = $row['bus_website'];


        ?> 
            <div class="widget container container-palette listing-gallery"> `z
                    <div class="content"> 
                        <div class="row-s"> 
                            <div class="col-sm-12">
                            	<a href="assets/img/pic/places/listing-2.jpg" class="image-cover-div">
                            		<?php echo"<img src='uploads/$businessImage' alt='' /></a>";?>
                            </div> 
                        </div> 
                    </div> 
                </div> 
            </div> 
            <div class="widget container container-palette widget-listing-title"> 
                <div class="container wb"> 
                    <div class="options"> 
                        <div class="type-box"><i class="ion-android-bar"></i></div> 
                        <div class="options-body"> 
                            <h1 class="title"><?php echo $businessName?></h1> 
                            <div class="ratings"> 
                                4.5 
                                <i class="icon-star-ratings-4-5"></i> 
                            </div> 
                            <div class="types"> 
                                <?php echo $businessCategory?>       
                            </div> 
                        </div> 
                    </div> 
                    <div class="actions"> 
                        <a href="#write_review" class="btn btn-custom-s btn-custom-secondary"><i class="ion-ios-star"></i>Write a Review</a> 
                        <a href="#" id="add_to_favorites" class="btn btn-custom-s btn-custom-default"><i class="ion-heart"></i>Save</a> <a class="btn btn-custom-s btn-custom-default" href="https://www.facebook.com/share.php?u=//test.com&amp;title=" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="ion-share"></i>Share</a> 
                    </div> 
                </div> 
            </div> 
            <div class="container container-palette widget"> 
                <div class="container"> 
                    <div class="row">
                        <div class="col-sm-9"> 
                            <div class="widget-styles"> 
                                <div class="content-box"> <?php echo $businessDescription?> </div> 
                            </div> 
                            <!-- <div class="widget-styles widget-animities"> 
                                <div class="content-box"> 
                                    <ul class="list-animities"> 
                                        <li><i class="ion-card"></i>Accepts Credit Cards</li> 
                                        <li><i class="ion-ios-paw"></i>Pets Friendly</li> 
                                        <li><i class="ion-pricetag"></i>Offering a Deal</li> 
                                        <li><i class="ion-android-car"></i>Parking </li> 
                                        <li><i class="ion-android-wifi"></i>Wireless Internet</li> 
                                        <li><i class="ion-social-apple"></i>Apple Pay</li> 
                                    </ul> 
                                </div> 
                            </div> --> 
                            <div class="widget-styles"> 
                                <div class="header content t-left"><h2>Reviews & Tips</h2></div> 
                                <ul class="list-reviews">
                                <?php

                                	$query = "SELECT * FROM review WHERE bus_id = $the_business_id ORDER BY rid DESC LIMIT 6 ";
                                	$result = mysqli_query($conn,$query);

                                	while ($row = mysqli_fetch_assoc($result)) {
                                		
                                		$reviewName = $row['rname'];
                                		$reviewMessage = $row['rcomment'];
                                	
                                ?> 
                                    <li class="content-box"> 
                                        <a href="page_profile.html"> 
                                            <img src="assets/img/pic/agent-7.jpg" alt="" /> 
                                        </a> 
                                        <div class="list-reviews-body"> 
                                            <div class="list-reviews-title"> 
                                                <h2><a href="#"><?php echo $reviewName?></a></h2> 
                                            </div> 
                                            <div class="raiting"><i class="icon-star-ratings-4"></i></div> 
                                            <div class="description"><?php echo$reviewMessage?></div> 
                                        </div> 
                                    </li> 

                                    <?php } ?>                                  
                                    </ul> 
                                    <div class="caption-title t-left content" id="write_review">Rate and Write a Review</div> 
                                    <div class="content-box"> 
                                    	<?php 

                                    		if (isset($_POST['submit'])) {
                                    			


                                    			$reviewEmail = $_POST['mail'];
                                    			$reviewName = $_POST['name'];
                                    			$reviewMessage = $_POST['message'];
                                    			$reviewavatar = "images";
                                                $reviewDate = date('d-m-y');


                                    			$query = "INSERT INTO `review`(`bus_id`, `rname`, `remail`, `ravatar`, `rcomment`, `ratings`,`rdatae`) VALUES ($the_business_id,'{$reviewName}','{$reviewEmail}','{$reviewavatar}','{$reviewMessage}',7,now())";
                                    			$result = mysqli_query($conn,$query);


                                    			if ($result) {
                                    				
                                    				echo "submitted successfully";
                                    			}else {
                                    				
                                    				die("query failed" . mysqli_error($conn));
                                    			}

                                    			
                                    		}


                                    	?>
                                        <form action="" class="local-form" method="post" enctype=""> 
                                            <div class="row"> 
                                                <div class="col-xs-12"> 
                                                    <div class="form-group"> 
                                                        <div class="rating-action"> 
                                                            <i class="fa fa-star" value="1"></i> 
                                                            <i class="fa fa-star" value="1"></i> 
                                                            <i class="fa fa-star"></i> 
                                                            <i class="fa fa-star"></i> 
                                                            <i class="fa fa-star"></i> 
                                                        </div> 
                                                        Select Your Rating 
                                                    </div> 
                                                </div> 
                                                <div class="col-sm-6 col-xs-6"> 
                                                    <div class="form-group"> 
                                                        <input type="email" class="form-control" name="mail" placeholder="Email Address" /> 
                                                    </div> 
                                                </div> 
                                                <div class="col-sm-6 col-xs-6"> 
                                                    <div class="form-group"> 
                                                        <input type="text" class="form-control" name="name" value="Your Name" /> 
                                                    </div> 
                                                </div> 
                                                <div class="col-xs-12"> 
                                                    <div class="form-group"> 
                                                        <textarea name="message" class="form-control" rows="10">Help other to choose perfect place</textarea> 
                                                    </div> 
                                                </div> 
                                            </div> 
                                            <div class="cliearfix"> 
                                                <button type="submit"  name="submit" class="btn btn-custom btn-custom-secondary">Submit Review</button> 
                                            </div> 
                                        </form> 
                                    </div> 
                                </div> 
                            </div> 
                            <div class="col-sm-3"> 
                                <div class="widget-styles widget-listing-map"> 
                                    <div class="body"> 
                                        <div class="map" id="property-map"></div> 
                                    </div> 
                                    <div class="content-box"> 
                                        <ul class="list-contact"> 
                                            <li class="icon address"><?php echo$businessAddress?></li> 
                                            <?php echo"<li class='icon phone'><a href='tel:$businessContact'>$businessContact</a></li>"; ?>
                                            <li class="icon clock multi">
                                                <div class="title">Opening days</div> 
                                                <ul> 
                                                    <li class="fill column">
                                                        <span><?php echo $open_days?></span> 
                                                       <!--  <span>7:00 AM - 6:00 PM</span> -->
                                                    </li>
                                                </ul> 
                                            </li> 
                                            <?php echo"<li class='icon earth'><a href='$businessWebsite'> $businessWebsite</a></li>"?> 
                                        </ul> 
                                    </div> 
                                </div> 
                                <div class="widget-styles agent-box"> 
                                    <div class="content"> 
                                        <div class="preview-image">
                                            <a href="page_profile.html">
                                                <img src="assets/img/pic/agent-3.jpg" alt="" />
                                            </a>
                                        </div> 
                                        <div class="content-box"> 
                                            <h2 class="title">
                                                <a href="page_profile.html">
                                                    James Gordon
                                                </a>
                                            </h2> 
                                            <div class="description">Aenean sollicitudin, lorem quis bibe ndum auctor, nisi elit consequat ipsum nec sagittis sem nibh id elit. </div> 
                                            <a href="mailto:james@local.com" class="btn btn-custom btn-custom-secondary btn-wide">
                                                <i class="ion-email"></i>
                                            </a> 
                                        </div> 
                                    </div> 
                                </div> 
                                <div class="widget widget-other-location"> 
                                    <h2 class="widget-title content t-left">You might also like</h2> 
                                    <div class="content">
                                    <?php

                                    	$query = "SELECT * FROM business ORDER BY bus_id desc LIMIT 2";
                            $result = mysqli_query($conn,$query);

                            if (!$result) {
                                
                                die("cannot fetch required informations from the database" . mysqli_error($conn));
                            }

                            while ($row = mysqli_fetch_assoc($result)) {

                                $businessId = $row['bus_id'];
                                $businessImage = $row['bus_image'];
                                $businessName = $row['bus_name'];
                                $businessCategory = $row['bus_category'];
                                $businessContact = $row['bus_contact'];
                                $businessAddress = $row['bus_add'];
                                $bus_status = $row['bus_status'];
                                $open_days = $row['open_days'];
                                $businessWebsite = $row['bus_website'];


                                    ?> 
                                        <div class="location-box"> 
                                            <a href="listing.html" class="preview-image image-cover-div">
                                                <img src="assets/img/pic/places/contraband-coffe.jpg" alt="" />
                                            </a> 
                                            <div class="location-box-content"> 
                                                <h3 class="title">
                                                    <?php echo"<a href='business_details.php?businessid=$businessId'>$businessName</a>";?>
                                                </h3> 
                                                <div class="ratings">
                                                     4.5 
                                                     <i class="icon-star-ratings-4-5"></i> 
                                                    </div> 
                                                    <div class="types"> <?php echo $businessCategory?> </div> 
                                                </div> 
                                            </div>
                                            <?php } ?> 
                                        </div> 
                                    </div> 
                                    <div class="widget widget-styles widget-form"> 
                                        <h2 class="widget-title text-center content">Contact Us</h2> 
                                        <div class="content-box"> 
                                            <form action="#" class="local-form"> 
                                                <div class="form-group"> 
                                                    <input type="text" class="form-control" placeholder="Your Name" /> 
                                                </div> 
                                                <div class="form-group"> 
                                                    <input type="email" class="form-control" placeholder="Email Address" /> 
                                                </div> 
                                                <div class="form-group"> 
                                                    <textarea name="message" class="form-control" rows="10">Message</textarea> 
                                                </div> 
                                                <button type="submit" class="btn btn-custom btn-custom-grey btn-wide">Send Message</button> 
                                            </form> 
                                        </div> 
                                    </div> 
                                    <div class="widget widget-ads"> 
                                        <a href="#"><img src="assets/img/placeholder/ads.jpg" alt="" /></a> 
                                    </div> 
                                </div> 
                            </div> 
                        </div> 
                    </div> 
                <?php }} ?>
                </main> 
                <footer class="footer container container-palette"> 
                    <div class="footer-content section"> 
                        <div class="container">
                            <div class="row footer-results"> 
                                <div class="col-md-3 col-sm-6 logo hidden-sm"> 
                                    <a href="#">Local</a> 
                                </div> 
                                <div class="col-md-3 col-sm-6 f-box"> 
                                    <div class="title">Useful Links</div> 
                                    <ul class="list-f"> 
                                        <li><a href="#">About Local</a></li> 
                                        <li><a href="#">Work With Us</a></li> 
                                        <li><a href="#">Advertising</a></li> 
                                        <li><a href="#">Reviews</a></li> 
                                    </ul> 
                                </div> 
                                <div class="col-md-3 col-sm-6 f-box"> 
                                    <div class="title">Top Places</div> 
                                    <ul class="list-f"> 
                                        <li><a href="listing.html">Saturdays Surf</a></li> 
                                        <li><a href="listing.html">Purl Soho</a></li> 
                                        <li><a href="listing.html">Sam Brocato Salon</a></li> 
                                        <li><a href="listing.html">Judd Foundation</a></li> 
                                    </ul> 
                                </div> 
                                <div class="col-md-3 col-sm-6 f-box"> 
                                    <div class="title">Follow Us</div> 
                                    <ul class="list-social"> 
                                        <li>
                                            <a href="https://www.facebook.com/share.php?u=//test.com&amp;title=" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="facebook"><i class="fa fa-facebook">
                                            </i>
                                        </a>
                                    </li>
                                     <li>
                                         <a href="https://plus.google.com/share?url=//test.com" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="google-plus"><i class="fa fa-google-plus"></i></a></li> 
                                         <li><a href="https://twitter.com/intent/tweet?text=Hello%20world" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="twitter"><i class="fa fa-twitter"></i></a></li> 
                                         <li><a href="http://pinterest.com/pin/create/button/?url=//test.com" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="twitter"><i class="fa fa-pinterest-p"></i></a></li> 
                                         <li><a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=&amp;title=&amp;summary=&amp;source=" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="linkedin"><i class="fa fa-linkedin"></i></a></li> 
                                    </ul> 
                                </div> 
                            </div> 
                        </div> 
                    </div> 
                    <div class="footer-bottom"> 
                        <div class="container"> 
                            <span>Local&#169;2017. Made in NYC</span> 
                        </div> 
                    </div> 
                </footer>
                <!-- /.custom-palette -->
                 <!-- /.footer --> 
                 <div class="modal fade modal-form" id="login-modal" tabindex="-1" role="dialog"> 
                     <div class="modal-dialog" role="document"> 
                         <div class="modal-content"> 
                             <div class="modal-header"> 
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                                 <h4 class="modal-title">Log in to Local</h4> 
                                </div> 
                                <div class="modal-body search-form"> 
                                    <form> 
                                        <div class="form-group"> 
                                            <input type="text" class="form-control" name="mail" placeholder="Mail" /> 
                                        </div> 
                                        <div class="form-group"> 
                                            <input type="text" class="form-control" name="password" placeholder="Password" /> 
                                        </div> 
                                        <div class="form-group"> 
                                            <button type="button" class="btn btn-custom btn-custom-secondary btn-wide">Sign In</button>
                                        </div> 
                                    </form> 
                                </div> 
                                <div class="modal-footer"> 
                                    <div class="form-group"> 
                                        <a href="#" class="btn btn-custom btn-custom-primary btn-wide">Log In With Facebook</a> 
                                    </div> 
                                    <div class="bottom-actions"> New to Local? 
                                        <a href="#" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#creataccount-modal" class="link">Create an account</a> 
                                    </div> 
                                    <div class="bottom-actions"> Forgot Password? 
                                        <a href="#" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#forgot-password-modal" class="link">Reset password</a> 
                                    </div> 
                                </div> 
                            </div>
                            <!-- /.modal-content --> 
                        </div>
                        <!-- /.modal-dialog --> 
                    </div>
                    <!-- /.modal --> 
                    <div class="modal fade modal-form" id="creataccount-modal" tabindex="-1" role="dialog"> 
                        <div class="modal-dialog" role="document"> 
                            <div class="modal-content"> 
                                <div class="modal-header"> 
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                                    <h4 class="modal-title">Sign Up for Local</h4> 
                                </div> 
                                <div class="modal-body search-form"> 
                                    <form> 
                                        <div class="form-group"> 
                                            <input type="text" class="form-control" name="name" placeholder="Name" /> 
                                        </div> 
                                        <div class="form-group"> 
                                            <input type="email" class="form-control" name="mail" placeholder="Email Address" /> 
                                        </div> 
                                        <div class="form-group"> 
                                            <button type="button" class="btn btn-custom btn-custom-secondary btn-wide">Create Account</button> 
                                        </div> 
                                    </form> 
                                </div> 
                                <div class="modal-footer"> 
                                    <div class="form-group"> 
                                        <a href="#" class="btn btn-custom btn-custom-primary btn-wide">Sign Up With Facebook</a> 
                                    </div>  
                                    <div class="bottom-actions"> Already on Local? 
                                        <a href="#" class="link">Log In</a> 
                                    </div> 
                                </div> 
                            </div>
                            <!-- /.modal-content --> 
                        </div>
                        <!-- /.modal-dialog --> 
                    </div>
                    <!-- /.modal --> 
                    <div class="modal fade modal-form" id="forgot-password-modal" tabindex="-1" role="dialog"> 
                        <div class="modal-dialog" role="document"> 
                            <div class="modal-content"> 
                                <div class="modal-header"> 
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                                    <h4 class="modal-title">Forgot Password</h4> 
                                </div> 
                                <p class="notice">Please enter your email address and we will send you an email about how to reset your password.</p> 
                                <div class="modal-body search-form"> 
                                    <form> 
                                        <div class="form-group"> 
                                            <input type="email" class="form-control" name="mail" placeholder="Email Address" /> 
                                        </div> 
                                        <div class="form-group"> 
                                            <button type="button" class="btn btn-custom btn-custom-secondary btn-wide">Reset Password</button> 
                                        </div> 
                                    </form> 
                                </div> 
                            </div>
                            <!-- /.modal-content --> 
                        </div> 
                    </div> 
                    <div class="se-pre-con"></div> 
                    <script src="http://maps.googleapis.com/maps/api/js?v=3&amp;libraries=weather,geometry,visualization,places,drawing&amp;&amp;key=AIzaSyD95zDTtfBmAopNLYu3nBKVTLEBanURbM8" type="text/javascript"></script> 
                    <script async src='assets/cache/js.min.js'></script> 
                </body>
<!-- Mirrored from geniuscript.com/local/listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Aug 2020 08:47:54 GMT -->
</html>