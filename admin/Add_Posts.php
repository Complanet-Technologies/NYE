 <?php include "../includes/db.php";?>
 <!DOCTYPE html><html lang="en"> 
<!-- Mirrored from geniuscript.com/local/admin_3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Aug 2020 08:50:55 GMT -->
<head> 
    <meta charset="UTF-8">
     <title>Admin 3</title> 
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" /> 
     <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon" /> 
     <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900%7COpen+Sans" rel="stylesheet" /> 
     <link rel="stylesheet" href="assets/libraries/font-awesome/css/font-awesome.min.css" /> 
     <link rel="stylesheet" href="assets/libraries/ionicons-2.0.1/css/ionicons.min.css" />
      <!-- Start BOOTSTRAP --> 
      <link rel="stylesheet" href="assets/libraries/bootstrap/dist/css/bootstrap.min.css" /> 
      <link rel="stylesheet" href="assets/css/bootstrap-select.min.css" />
       <!-- End Bootstrap --> 
      <link rel="stylesheet" href="assets/css/map.css" />
       <!-- Start Template files --> 
      <link rel="stylesheet" href="assets/css/admin-local.css" /> 
      <link rel="stylesheet" href="assets/css/admin-local-media.css" /> 
      <!-- End Template files --> 
      <!-- End custom styles --> 
      <script src="assets/js/modernizr.custom.js">
    </script> 
    </head> 
    <body>
         <div class="page-wrapper">
              <!-- START mainbar -->
               <?php include "../includes/sidebar.php"; ?>
                    <!-- /.sidebar -->
                    <!-- END mainbar -->
                    <!-- START mainbar --> 
                    <div class="mainbar">
                        <div class="bar-head top-bar clearfix"> 
                            <div class="profile-card pull-right"> 
                                <a href="#" class="profile-card-image"> 
                                    <img src="assets/img/pic/agents/agentm-1.jpg" alt=""> 
                                </a> 
                                <div class="profile-body"> Angela Devis </div> 
                            </div>
                            <!-- /.profile-card --> 
                            <a href="admin_3.html" class="btn btn-transparent pull-right">Add Listing</a> 
                        </div>
                        <!-- /.top-bar --> 

 <div class="mainbar-body"> 
                            <div class="section-form section"> 
                                <div class="section-header"> 
                                    <h2 class="title"> Add Post </h2> 
                                </div> 
                                <div class="box-content"> 



                                <?php 

                                if (isset($_POST['add_post'])) {
                                    $posts_title = $_POST['posts_title'];
                                    $posts_category_id = $_POST['posts_category_id'];
                                    $posts_author = $_POST['posts_author'];
                                    $posts_content = $_POST['my_content'];
                                    $posts_status = $_POST['posts_status'];


                                    $posts_image = $_FILES['image']['name'];
                                    $posts_image_temp= $_FILES['image']['tmp_name'];
                                    



                                    $posts_date = date('d-m-y');
                                    $posts_tag = $_POST['posts_tag'];

                                    $my_content = $_POST['my_content'];

                                    move_uploaded_file($posts_image_temp, "../assets/img/blog/$posts_image");

                                    $query = "INSERT INTO posts(posts_category_id,posts_title,posts_author,my_content, posts_date,posts_image,posts_tag,posts_status)";
                                    $query .= "VALUES ('{$posts_category_id}','{$posts_title}','{$posts_author}','{$my_content}', now(),'{$posts_image}','{$posts_tag}','{$posts_status}')";
                                    $add_post_query = mysqli_query($connection,$query);
                                    if(!$add_post_query) {
                                        die("query failed!".mysqli_error($connection));
                                        # code...
                                    }
                                    # code...
                                }

                                ?>

                                <form action="Add_posts.php" method="post" enctype="multipart/form-data"> 
                                        <div class="form-section"> 
                                            <div class="row"> 
                                                <div class="col-md-4"> 
                                                    <div class="form-group"> 
                                                        <label for="fieldListingName">Title</label> 
                                                        <input type="text" pattern="[a-z A-Z -]+" required class="form-control" name="posts_title" placeholder="Your Listing name"> </div> 
                                                    </div> 
                                                    <div class="col-md-4"> 
                                                        <div class="form-group"> 
                                                            <label for="fieldCategory">Category</label> 
                                                            <select name ="posts_category_id" id="">
                                                             
                                                                 <?php 
                                                                 $query = "SELECT * FROM category ";
                                                                 $category_query = mysqli_query($connection,$query);
                                                                 while ($row = mysqli_fetch_assoc($category_query)) {
                                                                    $cat_id = $row['cat_id'];
                                                                    $cat_title = $row['cat_title'];

                                                                    echo "<option value = ''>{$cat_title}</option>";
                                                                     # code...
                                                                 }

                                                                 ?>
                                                            
                                                             
                                                            </select> 
                                                            </div> 
                                                            </div> 
                                                            <div class="col-md-4"> <div class="form-group"> 
                                                                <label for="fieldKeywords">Author</label>
                                                                <input type="text" pattern="[a-z A-Z -]+" class="form-control" name="posts_author" placeholder="Enter Keywords"> 
                                                            </div> 
                                                        </div> 
                                                    </div> 
                                                </div> 
                                                <div class="form-section"> 
                                                    <div class="row"> 
                                                        <div class="col-md-12"> 
                                                            <div class="form-group"> 
                                                                <label for="input_file1">Image 
                                                                    <span class="option"></span>
                                                                </label> 
                                                                <input type="file" name="image" class="" id="input_file1"> 
                                                                <button type="button" class="btn btn-danger btn-lg btn-block btn-local-danger" data-inputype-file="input_file1">
                                                                    Browse Files
                                                                </button> 
                                                            </div> 
                                                        </div> 
                                                    </div> 
                                                </div>
                                                <div class="form-section"> 
                                                    <div class="row"> 
                                                        <div class="col-md-6"> 
                                                            <div class="form-group"> 
                                                                <label for="fieldPhone">Tag</label> 
                                                                <input type="text" pattern="[a-z A-Z - ,]+" class="form-control" name="posts_tag" placeholder="tag"> </div> 
                                                            </div> 
                                                            <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                    <label for="fieldWebsite">Status</label> 
                                                                    <input type="text" pattern="[a-z A-Z -]+" class="form-control" name="posts_status" placeholder="status"> 
                                                                </div> 
                                                            </div> 
                                                        
                                                        </div> 
                                                    </div> 
                                                    <div class="row"> 
                                                        <div class="col-md-12"> 
                                                            <div class="form-group"> 
                                                                <label for="fieldDesription">Content</label> 
                                                                <textarea class="form-control" pattern="[a-z A-Z -]+" name="my_content" rows="8">
                                                                </textarea> 
                                                            </div> 
                                                        </div> 
                                                    </div> 

                                                    <div class="form-section"> 
                                                    <div class="row"> 
                                                        <div class="col-md-6">   
                                                            <div class="form-group">
                                                                <input type="submit" class="btn-btn-primary" name="add_post" value="Add post">
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