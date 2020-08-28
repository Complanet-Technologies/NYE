<?php include"includes/header.php"?>
       <?php include"includes/side_nav.php"?>
           
                    <!-- /.sidebar -->
                    <!-- END mainbar -->
                    <!-- START mainbar --> 
                   <?php include"includes/main_nav.php"?>
                        <!-- /.top-bar --> 
                        

                        <?php

                            if (isset($_GET['source'])) {
                                
                                $source = $_GET['source'];

                            }else{

                                $source = '';
                            }

                            switch ($source) {

                                case'add_business':
                                include "includes/add_business.php";
                                break;

                                default:
                                header("Location: view_all_listings.php");
                                break;
                            }






                        ?>
































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