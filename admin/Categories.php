<?php include "../includes/db.php"; ?>
<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en"> 
<!-- Mirrored from geniuscript.com/local/admin_2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Aug 2020 08:50:42 GMT -->
<head> 
    <meta charset="UTF-8"> 
    <title>Admin 2</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" /> 
    <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon" /> 
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900%7COpen+Sans" rel="stylesheet" /> 
    <link rel="stylesheet" href="assets/libraries/font-awesome/css/font-awesome.min.css" /> 
    <link rel="stylesheet" href="assets/libraries/ionicons-2.0.1/css/ionicons.min.css" /> 
    <!-- Start BOOTSTRAP --> 
    <link rel="stylesheet" href="assets/libraries/bootstrap/dist/css/bootstrap.min.css" /> 
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css" /> 
    <!-- End Bootstrap --> 
    <!-- Start footable-jquery --> 
    <link rel="stylesheet" href="assets/libraries/footable-jquery/css/footable.bootstrap.min.css" /> 
    <!-- End footable-jquery --> 
    <!-- Start Template files --> 
    <link rel="stylesheet" href="assets/css/admin-local.css" /> 
    <link rel="stylesheet" href="assets/css/admin-local-media.css" /> 
    <!-- End Template files --> 
    <!-- End custom styles --> 
    <script src="assets/js/modernizr.custom.js"></script> 
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
            </div><!-- /.top-bar --> 
            <div class="mainbar-body"> 
                <div class="section-reviews">
                    <div class="section-header"> 
                       <!--  <h2 class="title"> Active Listings </h2>  -->
                    </div>


                    <div class ="col-xs-6">

                    <form action="" method="post">
                      <div class="form-group">
                      <label for="Add categories">Add categories</label>
                         <input class="form-control" type="text" name="cat_title">
                      </div>
                      <div class="form-group">
                         <input class="btn btn-primary" type="submit" name="submit" value="add category">
                      </div>
                    </form>


                    <?php 
                    if (isset($_GET['Edit'])) {
                        $cat_id = $_GET['Edit'];
                        # code...

                    if (isset($_POST['update'])) {
                        $cat_title = $_POST['cat_title'];

                        $query = "UPDATE category SET cat_title = '{$cat_title}' WHERE cat_id = '{$cat_id}'";
                        $update_query = mysqli_query($connection,$query);
                        if (!$update_query) {
                            die("Query Failed".mysqli_error($connection));
                            # code...
                        }

                        # code...
                    }
                    }

                    ?>


                    <?php
                    if (isset($_GET['Edit'])) {
                        $edit = $_GET['Edit'];

                        $query = "SELECT * FROM category WHERE cat_id = {$edit} ";
                        $edit_query = mysqli_query($connection,$query);
                        while ($row = mysqli_fetch_assoc($edit_query)) {
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];


                    ?>


                    <form action="" method="post">
                        <div class="form-group">
                            <label for="Edit category">Edit categories</label>
                            <input value="<?php if (isset($cat_title)){echo $cat_title;} ?>" class="form-control" type="text" name="cat_title">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="update" value="Edit">
                        </div>
                    </form>
                    <?php } } ?>
                    </div>




                    <div class="col_xs_6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                <?php 

$query = "SELECT * FROM category ";
$select_query = mysqli_query($connection,$query);
while ($row = mysqli_fetch_assoc($select_query)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
                                echo "<tr>";
                                echo "<td>$cat_id</td>";
                                echo "<td>$cat_title</td>";
                                echo "<td><a href='Categories.php?Edit={$cat_id}'>Edit</a></td>";
                                echo "<td><a href='Categories.php?delete={$cat_id}'>Delete</a></td>";
                                echo "</tr>";
                            }
                                ?>

                               <?php 
                                if (isset($_GET['delete'])) {
                                $the_cat_id = $_GET['delete'];
                                $query = "DELETE FROM category WHERE cat_id = {$the_cat_id} ";
                                $delete_query = mysqli_query($connection,$query);
                                header("Location:categories.php");
                                   # code...
                               }

                               ?>
                            </tbody>
                        </table>
                    </div>



 
                </div> 
            </div> 
        </div> 
        <!-- END mainbar --> 
    </div> <!-- Start Jquery --> 
    <script src="assets/js/jquery-2.2.1.min.js"></script> 
    <script src="assets/libraries/jquery.mobile/jquery.mobile.custom.min.js"></script> 
    <!-- End Jquery --> <!-- Start BOOTSTRAP --> 
    <script src="assets/libraries/bootstrap/dist/js/bootstrap.min.js"></script> 
    <script src="assets/js/bootstrap-select.min.js"></script> 
    <!-- End Bootstrap --> 
    <!-- Start Template files --> 
    <script src="assets/js/admin-local.js"></script> 
    <!-- End Template files --> 
    <!-- Start custom styles --> 
    <script src="assets/js/jquery.helpers.js" type="text/javascript"></script>
    <!-- End custom styles --> 
    <script src="assets/js/moment-with-locales.min.js" type="text/javascript"></script> 
    <script src="assets/js/moment-timezone-with-data.js" type="text/javascript"></script> 
    <!-- Start footable-jquery --> 
    <script src="assets/libraries/footable-jquery/js/footable.js"></script> 
    <script src="assets/js/footable_custom.js"></script> 
    <!-- End footable-jquery --> 
</body>
<!-- Mirrored from geniuscript.com/local/admin_2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Aug 2020 08:50:55 GMT -->
</html>