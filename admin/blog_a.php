<?php ob_start(); ?>

<?php include "../includes/db.php"; ?>


<?php include "includes/header.php"; ?>
 
<!-- START mainbar --> 
<?php include "includes/sidebar.php"; ?>
<!-- /.sidebar --> <!-- END mainbar --> <!-- START mainbar --> 
<div class="mainbar">
<div class="bar-head top-bar clearfix">
<div class="profile-card pull-right">
<a href="" class="profile-card-image">
     <img src="assets/img/pic/agents/<?php echo $_SESSION['image']; ?>" alt=""> 
    </a> 
    <div class="profile-body"> <?php echo $_SESSION['firstname']; ?></div> 
    
</div>
                        <!-- /.profile-card --> 
 <a href="add_mem.php" class="btn btn-transparent pull-right">Add Member</a>
                        </div>
                <!-- /.top-bar --> 
                
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
        <!-- End Bootstrap --> <!-- Start Template files --> 
        <script src="assets/js/admin-local.js"></script> 
        <!-- End Template files --> 
        <!-- Start custom styles --> 
        <script src="assets/js/jquery.helpers.js" type="text/javascript"></script> 
        <!-- End custom styles --> 
        <script src="assets/js/moment-with-locales.min.js" type="text/javascript">
        </script> <script src="assets/js/moment-timezone-with-data.js" type="text/javascript"></script> 
        <!-- Start footable-jquery --> 
        <script src="assets/libraries/footable-jquery/js/footable.js"></script> 
        <script src="assets/js/footable_custom.js"></script> 
        <!-- End footable-jquery --> 
    </body>
<!-- Mirrored from geniuscript.com/local/admin_5.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Aug 2020 08:51:06 GMT -->
</html>