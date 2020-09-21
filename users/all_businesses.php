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
					<div class="pull-left logo"><a href="./index.php">NYE</a></div> 
					<div class="top-bar-btns"> 
						<ul class="nav-items"> 
							<li><a href="listings.php?source=add_business" class="btn btn-custom-primary">Add Business</a></li> 
							<li><a href="index.php" data-toggle="modal" data-target="#login-modal" class="btn btn-custom-default">Back to dashboard <i class="fa fa-arrow-right"></i></a></li>
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
							<li><a href="index.php"  class="btn btn-custom-primary"><i class="fa fa-arrow-right"></i>Back to dashboard</a></li> 
							</ul> 
						</div> 
					</div> 
				</div> 
			</div> 
		</header>
		
		<main class="slim-sections"> 
			<section class="section container container-palette"> 
				<div class="container"> 
					<div class="section-title slim"> 
						<h2 class="title">Chose Category You Want</h2> 
					</div> 
					<div class="row">
					    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <!-- <ol class="carousel-indicators">
                                            <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>
                                        </ol> -->
                                        <div class="carousel-inner" role="listbox">

                                           	
                                           <div class="item active">

                                           	<?php 

                                        		$query = "SELECT * FROM business_category LIMIT 0,3";
                            					$select_cat_query = mysqli_query($conn,$query);

                           						 while ($row = mysqli_fetch_assoc($select_cat_query)) {
                               						$cat_id = $row['cat_id'];
                                					$category = $row['category'];
                                					$categoryAvatar = $row['category_avatar'];
                                				

                                        	?>
                                                <div class="col-md-4 col-sm-6"> 
													<figure class="card card-preview"> 
														<?php echo"<img src='../admin/uploads/$categoryAvatar' alt='' /> "?>
														<a href="" class="link"></a> 
													<figcaption class="description"> 
														<h2><?php echo $category?></h2><!--  <p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>  -->
													</figcaption> 
												</figure> 
												</div>
											<?php } ?>
                                            </div>
                                            <div class="item ">
                                            	<?php 

                                        		$query = "SELECT * FROM business_category LIMIT 4,6";
                            					$select_cat_query = mysqli_query($conn,$query);

                           						 while ($row = mysqli_fetch_assoc($select_cat_query)) {
                               						$cat_id = $row['cat_id'];
                                					$category = $row['category'];
                                					$categoryAvatar = $row['category_avatar'];
                                				

                                        	?>
                                                <div class="col-md-4 col-sm-6"> 
													<figure class="card card-preview"> 
														<?php echo"<img src='./admin/uploads/$categoryAvatar' alt='' /> "?>
														<a href="" class="link"></a> 
													<figcaption class="description"> 
														<h2><?php echo $category?></h2><!--  <p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>  -->
													</figcaption> 
												</figure> 
												</div>
											<?php } ?>
                                            </div>
                                        </div>
                                 
                        </div>  
					</div> 
				</div> 
			</section> 
			<!-- /. section preview category -->
		<!-- /. How it Works --> 
		<section class="section-picks section container container-palette"> 
			<div class="container"> 
				<div class="section-title slim"> 
					<h2 class="title">Popular Businesses</h2> 
				</div> 
				<div id="owl-carousel-items" class="owl-carousel-items owl-carousel owl-theme owl-carousel-property"> 
					<?php 

							$query = "SELECT * FROM business";
                            $result = mysqli_query($conn,$query);

                            if (!$result) {
                                
                                die("cannot fetch required informations from the database" . mysqli_error($conn));
                            }

                            while ($row = mysqli_fetch_assoc($result)) {

                                $businessId = $row['bus_id'];
                                $businessImage = $row['bus_image'];
                                $businessName = $row['bus_name'];
                                $businessCategory = $row['bus_category'];
                                $businessAddress = $row['bus_add'];
                                $bus_status = $row['bus_status'];
					
					?>
						<div class="item"> 
							<div class="thumbnail thumbnail-property"> 
								<div class="thumbnail-image"> 
									<img src="uploads/<?php echo$businessImage?>" alt="" /> 
									<a href="listing.html"></a> 
									<div class="icons"> 
										<a href="https://www.facebook.com/share.php?u=//test.com&amp;title="><i class="ion-android-share-alt"></i></a> 
										<a href="#" class='add_to_favorites'><i class="ion-android-favorite"></i></a> 
										<a href="#"><i class="ion-location"></i></a> 
										<a href="#"><i class="ion-forward"></i></a> 
									</div> 
								</div> 
								<div class="caption"> 
									<div class="caption-ls"> 
										<?php echo"<h3 class='thumbnail-title'><a href='business_details.php?businessid=$businessId'>$businessName</a></h3>"?>; 
										<span class="thumbnail-ratings"> 3.0 <i class="icon-star-ratings-3"></i> </span> 
										<span class="type"> <?php echo$businessCategory?> </span> 
									</div> 
									<div class="caption-rs"> 
										<a href="#" class="btn-marker"> 
											<span class="box"><i class="fa fa-map-marker"></i></span> 
											<span class="title">Location</span> 
										</a> 
									</div> 
								</div> 
							</div> 
						</div> 
					<?php } ?>
					</div> 
				</div> 
			</section> 
			<!-- /.section-picks --> 
		</main> 
		<section class="section container container-palette bg-mask section-inv" data-parallax="scroll" data-image-src="assets/img/pic/places/offers.jpg"> 
			<div class="container"> 
				<div class="inv-block"> 
					<h2 class="title">Start Exploring Today</h2> 
					<a href="map-small.html" class="btn btn-custom btn-custom-secondary">Search</a> 
				</div> 
			</div> 
		</section> 
		<footer class="footer container container-palette bg-first"> 
			<div class="container clearfix footer-inner-slim"> 
				<div class="copyright"> NYE&#169;2020. Designed by Complanet Technologies </div> 
				<div class="social"> 
					<ul class="list-social"> 
						<li><a href="https://www.facebook.com/share.php?u=//test.com&amp;title=" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="facebook"><i class="fa fa-facebook"></i></a></li> 
						<li><a href="https://plus.google.com/share?url=//test.com" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="google-plus"><i class="fa fa-google-plus"></i></a></li> 
						<li><a href="https://twitter.com/intent/tweet?text=Hello%20world" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="twitter"><i class="fa fa-twitter"></i></a></li> 
						<li><a href="http://pinterest.com/pin/create/button/?url=//test.com" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="twitter"><i class="fa fa-pinterest-p"></i></a></li> 
						<li><a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=&amp;title=&amp;summary=&amp;source=" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="linkedin"><i class="fa fa-linkedin"></i></a></li> 
					</ul> 
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
				<div cass="modal-content"> 
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
				</div><!-- /.modal-content --> 
			</div> 
		</div> 
		<div class="se-pre-con"></div> 
		<script src="http://maps.googleapis.com/maps/api/js?v=3&amp;libraries=weather,geometry,visualization,places,drawing&amp;&amp;key=AIzaSyD95zDTtfBmAopNLYu3nBKVTLEBanURbM8" type="text/javascript"></script> <script async src='assets/cache/js.min.js'></script> 
	</body>
<!-- Mirrored from geniuscript.com/local/homepage-business.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Aug 2020 08:35:00 GMT -->
</html>