<?php include"includes/header.php"?>

        <!-- START mainbar --> 
        <?php include"includes/side_nav.php"?>

        <!-- /.sidebar --> 
        <!-- END mainbar --> 
        <!-- START mainbar --> 
        
        <?php include"includes/main_nav.php"?>
        <!-- /.top-bar --> 
            <div class="mainbar-body"> 
                <div class="section-reviews">
                    <div class="section-header"> 
                        <h2 class="title"> Active Listings </h2> 
                    </div> 
                    <table class="table-panel footable table-listings"> 

                        <?php

                            $query = "SELECT * FROM businessnye";
                            $result = mysqli_query($conn,$query);

                            if (!$result) {
                                
                                die("cannot fetch required informations from the database" . mysqli_error($conn));
                            }

                            while ($row = mysqli_fetch_assoc($result)) {

                                $businessId = $row['id'];
                                $businessImage = $row['bus_image'];
                                $businessName = $row['bus_name'];
                                $businessCategory = $row['bus_category'];
                                $businessAddress = $row['bus_address'];
                                $bus_status = $row['bus_status'];

                        ?>
                        <tr> 
                            <td data-title="Preview" data-breakpoints="xs" data-type="html" class="preview"> 
                            <?php

                            echo"
                                <a href='#' class='link'> 
                                    <img class='image-preview preview-95x88' src='uploads/$businessImage' alt='$businessName'> 
                                </a> 
                            </td> ";
                            ?>
                            <td class="preview-mobile" data-type="html"> 
                                <div> 
                                    <a href="#" class="listing-link"><?php echo $businessName?></a>
                                     <?php

                                        if ($bus_status == 'approved') {
                                            echo "<i class='fa fa-certificate' style='color: blue; font-size: 20px;'></i>";
                                        }else{

                                            echo"";
                                        }

                                    ?>
                                </div> 
                                <div> 
                                    <span class="rating"> 
                                        4.5 
                                        <i class="icon-star-ratings-4-5"></i> 
                                    </span> 
                                    <span class="listing-tags tags"> 
                                        <a href="map-side-list.html">Category</a> : <a href="map-side-list.html"><?php echo $businessCategory?></a> 
                                    </span> 
                                </div> 
                            </td> 
                            <td data-title="Address" data-breakpoints="xs" data-type="html" class="location-cell"> 
                                <i class="ion-ios-location-outline"></i><span class="address" title="31 Crosby St, New York"><?php echo $businessAddress?></span> 
                            </td> 
                            <td data-title="" data-breakpoints="xs" data-type="html"> 
                               
                            <?php  echo" <a href='listings.php?source=edit_business&&edit_id=$businessId' class='btn btn-listing btn-default'>
                               <i class='ion-ios-compose-outline'></i> Edit </a> ";?>
                            </td>
                            <td data-title="" data-breakpoints="xs" data-type="html"> 
                               
                            <?php  echo" <a href='view_all_listings.php?delete_id=$businessId' class='btn btn-listing btn-default'>
                               <i class='fa fa-trash'></i> Remove </a> ";?>
                            </td>
                            <?php

                        if (isset($_GET['delete_id'])) {
                            
                            $the_delete_id = $_GET['delete_id'];


                            $query = "DELETE FROM `business` WHERE bus_id = {$the_delete_id} ";
                            $result = mysqli_query($conn,$query);

                            if ($result) {

                                header("Location: view_all_listings.php");
                            }else{
                                echo"Unable to process request";
                            }
                        }



                    ?> 
                        </tr> 
                    <?php } ?>
                       
                    </table> 


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