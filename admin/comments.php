<?php include "../includes/db.php";?>
<?php ob_start(); ?>
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





                                                            <?php 
                                    if (isset($_GET['source'])) {
                                        $source = $_GET['source'];
                                        # code...
                                    }else{
                                        $source = '';
                                    }

                                    switch ($source) {
                                        case 'Add_comments':
                                        include "Add_comments.php";   # code...
                                            break;

                                            case 'Edit_comments':
                                       include "Edit_comments.php";   # code...
                                            break;

                                        case '200':
                                        echo "Nice 200";    # code...
                                            break;
                                        
                                        
                                        default:
                                        include"View_All_Comments.php";
                                            # code...
                                            break;
                                    }
                                    ?>
                        






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