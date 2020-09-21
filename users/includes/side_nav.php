<?php include "status_check.php"; ?>
<div class="page-wrapper"> 
<div class="sidebar"> 
                 <div class="bar-head">
                      <div class="logo"> 
                          <a href="#" class="link">NYE</a> 
                          <a href="#" class="link-mobile">N<br>Y<br>E</a> 
                        </div> 
                    </div> 
                    <div class="widget left-menu">
                         <button type="button" class="navbar-toggle" id="navigation-toogle"> <span class="sr-only">Toggle navigation</span> 
                            <span class="icon-bar"></span>
                             <span class="icon-bar"></span>
                              <span class="icon-bar"></span> 
                            </button> 
                            <ul class="nav-side">
                                 <li class=""> 
								 <?php
								if($veri_status == 'verified'){
								if($status == 'paid'){
									?>
									
                                     <a href="index.php">
                                         <i class="nav-icon ion-android-color-palette"></i>
                                         <span class="nav-label">Dashboard</span>
                                        </a> 
                                    </li> 
                                    <li class="has_submenu">
                                        <a href="businesses.php">
                                            <i class="nav-icon ion-flag"></i>
                                            <span class="nav-label">Business</span>
                                        </a>
										<ul> 
											<li>
												<a href="listings.php?source=add_business">
												<i class="nav-icon ion-person"></i>
												<span class="nav-label">Add Business</span>
												</a> 
											</li>
											<li>
											  	<a href="listings.php?source=all_business"><i class="nav-icon ion-person"></i>
											   	<span class="nav-label">All Businesses</span>
												</a> 
											</li> 
											<li>
											  	<a href="listings.php?source=view_all_businesses"><i class="nav-icon ion-person"></i>
											   	<span class="nav-label">Check Businesses</span>
												</a> 
											</li> 
										</ul> 
									</li>
                                    <li>
	                                    <a href="profile.php">
	                                        <i class="nav-icon ion-person"></i>
	                                        <span class="nav-label">Profile</span>
	                                    </a> 
	                                </li>
	                                <li> 
                                        <a href="reviews.php">
                                            <i class="nav-icon ion-android-star"></i>
                                            <span class="nav-label">Reviews</span>
                                        </a> 
									</li>
									
								<?php }
									else{//if user has not paid
										?>

									
									<a href="index.php">
                                         <i class="nav-icon ion-android-color-palette"></i>
                                         <span class="nav-label">Dashboard</span>
                                        </a> 
                                    </li> 
                                    <li class="has_submenu">
                                        <a href="">
                                            <i class="nav-icon ion-flag"></i>
                                            <span class="nav-label">Business</span>
                                        </a>
										<ul> 
											<li>
												<a href="">
												<i class="nav-icon ion-person"></i>
												<span class="nav-label">Add Business</span>
												</a> 
											</li>
											<li>
											  	<a href=""><i class="nav-icon ion-person"></i>
											   	<span class="nav-label">All Businesses</span>
												</a> 
											</li> 
											<li>
											  	<a href=""><i class="nav-icon ion-person"></i>
											   	<span class="nav-label">Check Businesses</span>
												</a> 
											</li> 
										</ul> 
									</li>
                                    <li>
	                                    <a href="profile.php">
	                                        <i class="nav-icon ion-person"></i>
	                                        <span class="nav-label">Profile</span>
	                                    </a> 
	                                </li>
	                                <li> 
                                        <a href="reviews.php">
                                            <i class="nav-icon ion-android-star"></i>
                                            <span class="nav-label">Reviews</span>
                                        </a> 
									</li>


									<?php }
								}
								// If user is not verified
								else{?>

										<a href="index.php">
                                         <i class="nav-icon ion-android-color-palette"></i>
                                         <span class="nav-label">Dashboard</span>
                                        </a> 
                                    </li> 
                                    <li class="has_submenu">
                                        <a href="">
                                            <i class="nav-icon ion-flag"></i>
                                            <span class="nav-label">Business</span>
                                        </a>
										<ul> 
											<li>
												<a href="">
												<i class="nav-icon ion-person"></i>
												<span class="nav-label">Add Business</span>
												</a> 
											</li>
											<li>
											  	<a href=""><i class="nav-icon ion-person"></i>
											   	<span class="nav-label">All Businesses</span>
												</a> 
											</li> 
											<li>
											  	<a href=""><i class="nav-icon ion-person"></i>
											   	<span class="nav-label">Check Businesses</span>
												</a> 
											</li> 
										</ul> 
									</li>
                                    <li>
	                                    <a href="profile.php">
	                                        <i class="nav-icon ion-person"></i>
	                                        <span class="nav-label">Profile</span>
	                                    </a> 
	                                </li>
	                                <li> 
                                        <a href="reviews.php">
                                            <i class="nav-icon ion-android-star"></i>
                                            <span class="nav-label">Reviews</span>
                                        </a> 
									</li>


								<?php }
									?>
									<li> 
									    <a href="./includes/logout.php"><i class="nav-icon ion-android-exit"></i>
									        <span class="nav-label">Log Out</span>
									    </a> 
									</li>
								</ul> 
							</div> 
							<div class="copyright">NYE&#169;2020. Developed by Complanet Technologies</div>
							</div>