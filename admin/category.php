<?php include "../db_config.php"; ?>
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
<!-- <li> 
<a href="admin_2.php">
<i class="nav-icon ion-android-clipboard"></i>
<span class="nav-label">Businesses</span>
</a>
</li> -->
<li class="has_submenu">
                                        <a href="#">
                                            <i class="nav-icon ion-flag"></i>
                                            <span class="nav-label">Business</span>
                                        </a>
                                        <ul> 
                                            <li>
                                                <a href="business.php">
                                                <i class="nav-icon ion-person"></i>
                                                <span class="nav-label">View All business</span>
                                                </a> 
                                            </li>
                                            <li>
                                                <a href="category.php"><i class="nav-icon ion-person"></i>
                                                <span class="nav-label">Add Category</span>
                                                </a> 
                                            </li> 
                                        </ul> 
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
    <a href="add_mem.php" class="btn btn-transparent pull-right">Categories</a>
    </div>


    <!-- /.top-bar --> 
    <div class="mainbar-body"> 
        <div class="section-form section"> 
            <div class="section-header"> 
                <h2 class="title"> Add Business Category </h2> 
            </div> 
            <div class="box-content">
                <div class="row">
                    <div class="col-md-6">
                        <?php

                            if (isset($_POST['submit'])) {
                                $businessCategory = $_POST['businessCategory'];

                                $categoryAvatar = $_FILES['categoryAvatar']['name'];
                                $tmpcategoryAvatar = $_FILES['categoryAvatar']['tmp_name'];

                                                if ($categoryAvatar != '') {
            
                                                    $ext = pathinfo($categoryAvatar, PATHINFO_EXTENSION);
                                                    $allowed = ['png','jpg','jpeg'];

                                                    if (in_array($ext, $allowed)) {
                                                        
                                                        $path = 'uploads/';

                                                        move_uploaded_file($tmpcategoryAvatar,($path.$categoryAvatar));


                                $query = "INSERT INTO business_category(category,category_avatar) VALUES ('{$businessCategory}','{$categoryAvatar}')";
                                $result = mysqli_query($conn,$query);

                                if ($result) {
                                    echo "<h2>Category Added Successfully</h2>";
                                }else {
                                    die("Unable to add category" . mysqli_error($conn));
                                }
                            }
                                }
                            }
                        ?>
                <form method="post" action="" enctype="multipart/form-data">      
                    <div class="form-section"> 
                        <div class="row"> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label for="fieldPhone">Category Name</label> 
                                <input value="" name="businessCategory" type="text" class="form-control" placeholder="Agriculture">
                            </div>
                            <div class="form-group"> 
                                <input type="file" class="hidden" id="input_file2" name="categoryAvatar">
                                <button class="btn btn-image-upload" data-inputype-file="input_file2"><i class="ion-upload"></i> Upload Avatar</button> 
                            </div>  
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-lg btn-danger btn-local-danger">Add Category</button>
                                </div>
                            </div>
                        </div>                       
                    </div>         
                </form>
                </div> <!-- 
                </div>
                <div class="box-content"> -->   
                <div class="col-md-6"> 
                    <?php
                        if (isset($_GET['edit'])) {
                            $the_edit_id = $_GET['edit'];

                            $query = "SELECT category FROM business_category WHERE cat_id = '{$the_edit_id}' ";
                            $select_query = mysqli_query($conn, $query);
                            
                            $row = mysqli_fetch_assoc($select_query);
                                $category = $row['category'];
                            

                            if (isset($_POST['update'])) {
                                $updateCategory = $_POST['updateCategory'];

                                $categoryAvatar = $_FILES['categoryAvatar']['name'];
                                $tmpcategoryAvatar = $_FILES['categoryAvatar']['tmp_name'];

                                                if ($categoryAvatar != '') {
            
                                                    $ext = pathinfo($categoryAvatar, PATHINFO_EXTENSION);
                                                    $allowed = ['png','jpg','jpeg'];

                                                    if (in_array($ext, $allowed)) {
                                                        
                                                        $path = 'uploads/';

                                                        move_uploaded_file($tmpcategoryAvatar,($path.$categoryAvatar));

                            

                            $query = "UPDATE business_category SET category = '{$updateCategory}' AND category_avatar = '{$categoryAvatar}' WHERE cat_id = '{$the_edit_id}' ";
                            $update_query = mysqli_query($conn,$query);

                            if ($update_query) {
                                echo "<h3>Category Successfully Updated</h3>";
                            }else{
                                die("Unable to update" . mysqli_error($conn));
                            }

                            
                            }
                      }
                  }

                    ?>
             <form method="post" action="" enctype="multipart/form-data">      
                    <div class="form-section"> 
                        <div class="row"> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label for="fieldPhone">Edit Category Name</label> 
                                <input name="updateCategory" value="<?php echo $category?>" type="text" class="form-control" id="fieldLocation">
                            </div>
                            <div class="form-group"> 
                                <input type="file" class="hidden" id="input_file2" name="categoryAvatar">
                                <button class="btn btn-image-upload" data-inputype-file="input_file2"><i class="ion-upload"></i> Upload Avatar</button> 
                            </div>  
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <button type="submit" name="update" class="btn btn-lg btn-danger btn-local-danger">Update Category</button>
                                </div>
                            </div>
                        </div>                       
                    </div>         
                </form>
                 <?php  }?>
            </div>
               
                </div>  
                 <table class="table table-bordered">
                    <tr>
                       <th>#Id</th>
                        <th>Category</th>
                    </tr>
                        <?php 

                            $query = "SELECT * FROM business_category";
                            $select_cat_query = mysqli_query($conn,$query);

                            while ($row = mysqli_fetch_assoc($select_cat_query)) {
                                $cat_id = $row['cat_id'];
                                $category = $row['category'];
                                $categoryAvatar = $row['category_avatar'];

                                if (isset($_GET['delete'])) {
                                    $the_delete_id = $_GET['delete'];
                                
                            $query = "DELETE FROM `business_category` WHERE cat_id = '{$the_delete_id}' ";
                            $delete_query = mysqli_query($conn,$query);
                            if ($delete_query) {
                                
                                header("Location: category.php");
                            }

                            }

                        ?>
                    <tr>
                        <td><?php echo $cat_id?></td>
                        <td><?php echo $category?></td>
                        <?php echo"<td><img src='uploads/$categoryAvatar' width='50px' height='50px'></td>"; ?>
                       <?php echo" <td><a href='category.php?edit=$cat_id'><i class='fa fa-edit'></i></a></td>";?>
                       <?php echo" <td><a href='category.php?delete=$cat_id'><i class='fa fa-trash'></i></a></td>";?>
                    </tr>
                <?php }  ?>
                </table>

            </div> 
                        </div> 
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