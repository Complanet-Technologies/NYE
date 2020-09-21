<?php include "../includes/db.php"; ?>
<?php include "includes/header.php"; ?>

<!-- START mainbar -->
<div class="sidebar"> 
<div class="bar-head">
<div class="logo"> 
<a href="#" class="link">NYE ADMIN</a> 
<a href="#" class="link-mobile">NYE ADMIN</a> 
</div> 
</div> 
<div class="widget left-menu">
<button type="button" class="navbar-toggle" id="navigation-toogle"> 
<span class="sr-only">Toggle navigation</span> 
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span> 
</button> 
<ul class="nav-side">
<li class="active"> 
<a href="admin_1.php">
<i class="nav-icon ion-android-color-palette"></i>
<span class="nav-label">Dashboard</span>
</a> 
</li> 
<li> 
<a href="admin_2.php">
<i class="nav-icon ion-android-clipboard"></i>
<span class="nav-label">Businesses</span>
</a>
</li>
<li> 
<a href="admin_6.php">
<i class="nav-icon ion-person"></i>
<span class="nav-label">Members</span>
</a>
</li>
<li>
<a href="admin_4.php">
<i class="nav-icon ion-person"></i>
<span class="nav-label">Profile</span>
</a> 
</li>
<li> 
<a href="admin_5.php">
<i class="nav-icon ion-android-star"></i>
<span class="nav-label">Blog</span>
</a> 
</li> 
<a href="./login/login.php"><i class="nav-icon ion-android-exit"></i>
<span class="nav-label">Log Out</span>
</a> 
</li>
</ul> 
</div> 
<div class="copyright">Local&#169;2017. Made in NYC</div>
</div>
<!-- /.sidebar --> <!-- END mainbar --> <!-- START mainbar --> 
<div class="mainbar">
<div class="bar-head top-bar clearfix">
<div class="profile-card pull-right">
<a href="admin_4.html" class="profile-card-image">
     <img src="assets/img/pic/agents/<?php echo $_SESSION['image']; ?>" alt=""> 
    </a> 
    <div class="profile-body"> <?php echo $_SESSION['firstname']; ?></div> 
    
</div>
    <!-- /.profile-card --> 
    <a href="add_mem.php" class="btn btn-transparent pull-right">Add Member</a>
    </div>


    <!-- /.top-bar --> 
    <div class="mainbar-body"> 
        <div class="section-form section"> 
            <div class="section-header"> 
                <h2 class="title"> Add Member </h2> 
            </div> 
            <div class="box-content"> 
                <form method="post" action="" enctype="multipart/form-data" > 

                
            <div class="form-section"> 
                <div class="row"> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 

                            <label for="fieldListingName">Name</label>
                            <input type="text"  name="first_namenye" class="form-control" id="fieldListingName" value="<?php echo $mem_namenye; ?>" placeholder="Enter name">
                            </div> 
                        </div> 
                        <div class="col-md-4"> 
                            <div class="form-group">

                                <label for="fieldCategory">Category</label> 
                                <select id="fieldCategory" class="form-control"> 
                                <option>Choose Your Business Category</option>
                                <option>House</option>
                                <option>Flat</option> 
                                </select>

                            </div> 
                            </div> 
                                 <div class="col-md-4">
                                 <div class="form-group"> 
                                    <label for="fieldKeywords">Phone 
                                        <span class="option"></span>
                                    </label> 
                    <input name="phone_nye" type="text" class="form-control" id="fieldKeywords" placeholder="Enter Phone Number" value="<?php echo $mem_phonenye; ?>"  
                                </div> 
                            </div> 
                        </div> 
                    </div> 
                    <div class="form-section"> 
                        <div class="row"> 
                            <div class="col-md-6"> 
                                <div class="form-group"> 
                                    <label for="input_file1">Image 
                                        <span class="option"></span>
                                    </label> 
                                    <input type="file" class="hidden" id="input_file1"> 
                                    <button name="" type="button" class="btn btn-danger btn-lg btn-block btn-local-danger" data-inputype-file="input_file1">
                                        Browse Files
                                    </button> 
                                </div> 
                            </div> 
                        </div> 
                    </div> 
                    <div class="form-section"> 
                        <div class="row"> 
                        <div class="col-md-5"> 
                            <div class="form-group"> 
                                <label for="fieldPhone">Location</label> 
                                <input value="<?php echo $mem_addnye; ?>" name="bus_add" type="text" class="form-control" id="fieldLocation" placeholder="e.g 13, Ijeun-Titun, Abeokuta Nigeria">
                            </div> 
                            </div>
                            <div class="col-md-4">
                            <div class="form-group"> 
                                <label for="fieldPhone">E-mail Address</label> 
                                <input value="<?php echo $mem_emailnye; ?>" name="email_email" type="mail" class="form-control" id="fieldLocation" placeholder="youremail@gmail.com">
                            </div> 
                            </div>
                        </div> 
                        </div> 
                        <div class="row"> 
                            <div class="col-md-12"> 
                                <div class="form-group"> 
                                    <label for="fieldDesription">Desription</label> 
                                    <textarea class="form-control" id="fieldDesription" rows="8"><?php echo $mem_desnye; ?>

                                    </textarea> 
                                </div> 
                            </div> 
                        </div>
                        <button type="submit" value="submit" name="submit" class="btn btn-xs btn-danger btn-local-danger">Submit </button> 
                    </form> 
                </div> 
            </div> 
                        </div> 
                    </form> 
                </div> 
            </div> 
        </div> 
    </div> 
    <!-- END mainbar --> 
</div> 
<!-- Start Jquery --> 

<script src="assets/js/jquery-2.2.1.min.js"></script> 

<script src="assets/libraries/jquery.mobile/jquery.mobile.custom.min.js"></script> 

<!-- End Jquery --> 

<!-- Start BOOTSTRAP --> 

<script src="assets/libraries/bootstrap/dist/js/bootstrap.min.js"></script> 

<script src="assets/js/bootstrap-select.min.js"></script> 

<!-- End Bootstrap --> 

<!-- Start JS MAP --> 
<script src="http://maps.googleapis.com/maps/api/js?v=3&amp;libraries=weather,geometry,visualization,places,drawing&amp;&amp;key=AIzaSyD95zDTtfBmAopNLYu3nBKVTLEBanURbM8" type="text/javascript"></script> 
<script type="text/javascript" src="assets/js/map_infobox.js"></script> 
<script type="text/javascript" src="assets/js/markerclusterer.js"></script> 
<script src="assets/js/map.js" type="text/javascript"></script> 
<script src='assets/js/gmap3/gmap3.min.js'></script> 
<!-- End JS MAP --> <!-- Start Template files --> 
<script src="assets/js/admin-local.js"></script> 
<!-- End Template files --> <!-- Start custom styles --> 
<script src="assets/js/jquery.helpers.js" type="text/javascript"></script> 
<!-- End custom styles --> <script src="assets/js/moment-with-locales.min.js" type="text/javascript"></script> 
<script src="assets/js/moment-timezone-with-data.js" type="text/javascript"></script> 
</body>
<!-- Mirrored from geniuscript.com/local/admin_3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Aug 2020 08:51:02 GMT -->
</html>