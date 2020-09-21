<?php include"includes/header.php"?>
<?php include"includes/side_nav.php"?>
                 <!-- /.sidebar --> <!-- END mainbar --> <!-- START mainbar --> 
    <?php include"includes/main_nav.php"?>
         <!-- /.top-bar --> 
                <!-- /.top-bar --> 
                <div class="mainbar-body"> 
                    <div class="section-reviews"> 
                        <div class="section-header"> 
                            <h2 class="title"> Recent Reviews</h2> 
                        </div> 
                        <table class="table-panel footable table-listings"> 
                            <?php 



                                $query = "SELECT * FROM review WHERE user_id = 0 ORDER BY rid DESC ";
                                    $result = mysqli_query($conn,$query);

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        
                                        $businessId = $row['bus_id'];
                                        $reviewName = $row['rname'];
                                        $reviewMessage = $row['rcomment'];
                                        $reviewDate = $row['rdate'];




                            ?>
                            <tr> 
                                <td data-title="Preview" data-breakpoints="xs" data-type="html" class="preview"> 
                                    <a href="#" class="link"> 
                                        <img class="image-preview preview-75x70" src="assets/img/pic/agents/agentm-1_75x70.html" alt=""> 
                                    </a> 
                                </td> 
                                <td class="preview-mobile" data-type="html"> 
                                    <div class="reviews-box"> 
                                        <div class="header"> 
                                            <b>Catie Holmes</b> for 
                                            <a href="#" class="link"> 

                                                <?php

                                                    $query = "SELECT * FROM business WHERE bus_id = $businessId";
                                                    $select_query = mysqli_query($conn,$query);

                                                    $row = mysqli_fetch_array($select_query);

                                                    echo $row['bus_name'];

                                                ?>

                                            </a> 
                                        </div> 
                                        <p class="description"> <?php echo $reviewMessage?></p> 
                                        <div> 
                                            <span class="rating"> 4.5 
                                                <i class="icon-star-ratings-4-5"></i> 
                                            </span> 
                                        </div> 
                                    </div> 
                                </td> 
                                <td data-title="Date" data-breakpoints="xs" data-type="html" class="date-cell"> 
                                    <span class="date"><?php echo $reviewDate?></span> 
                                </td> 
                               <!--  <td data-title="" data-breakpoints="xs" data-type="html"> <a href="#" class='btn btn-listing btn-default'>Reply</a> --> 
                                </td> 
                                <td data-title="" data-breakpoints="xs" data-type="html"> 
                                    <button class='btn-clear'><i class="ion-close-round"></i>
                                    </button> 
                                </td> 
                            </tr>  

                        <?php } ?>
                        <div class="panel-group" id="accordionThree">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordionThree" href="#collapse3a">
                                                        Layout dolor sit amet
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse3a" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <img src="images/prv/wk-big-img-5.html" alt="" class="img-responsive" />
                                                        </div>
                                                        <div class="col-md-8">
                                                            <p>
                                                                Layout dolor sit amet, consectetur adipisicing elit...
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                        </table> 

                        
                                
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