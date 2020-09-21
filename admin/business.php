<?php ob_start(); ?>

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
<li> 
<a href="dashboard.php">
<i class="nav-icon ion-android-color-palette"></i>
<span class="nav-label">Dashboard</span>
</a> 
</li> 
<!-- <li class="active"> 
<a href="business.php">
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
<a href="members.php">
<i class="nav-icon ion-person"></i>
<span class="nav-label">Members</span>
</a>
</li>
<li>
<a href="profile.php">
<i class="nav-icon ion-person"></i>
<span class="nav-label">Profile</span>
</a> 
</li>
<li> 
<a href="blog.php">
<i class="nav-icon ion-android-star"></i>
<span class="nav-label">Blog</span>
</a> 
</li> 
<li> 
<a href="./login/login.php"><i class="nav-icon ion-android-exit"></i>
<span class="nav-label">Log Out</span>
</a> 
</li>
</ul> 
</div> 
<div class="copyright">Local&#169;2020. Designed by <br> Complanet Technologies</div>
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
                <div class="section-reviews">
                    <div class="section-header"> 
                        <h2 class="title"> Available Businesses </h2> 
                    </div> 
                     <?php

                    if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                    $page_no = $_GET['page_no'];
                    } else {
                    $page_no = 1;
                    }

                    $total_records_per_page = 5;
                    $offset = ($page_no-1) * $total_records_per_page;
                    $previous_page = $page_no - 1;
                    $next_page = $page_no + 1;
                    $adjacents = "2"; 

                    $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `nye_users`");
                    $total_records = mysqli_fetch_array($result_count);
                    $total_records = $total_records['total_records'];
                    $total_no_of_pages = ceil($total_records / $total_records_per_page);
                    $second_last = $total_no_of_pages - 1; // total page minus 1

            $query = "SELECT * FROM business LIMIT $offset, $total_records_per_page" ;
            $select_business = mysqli_query($conn, $query);

            while($row = mysqli_fetch_assoc($select_business)){

                $bus_id = $row['bus_id'];
                $bus_name= $row['bus_name'];
                $bus_category= $row['bus_category'];
                $bus_email= $row['bus_email'];
                $bus_add= $row['bus_add'];
                $bus_image = $row['bus_image'];
                $bus_contact= $row['bus_contact'];
                $bus_status  =$row['bus_status'];


                                 if(isset($_GET['approve'])){

                                $approve_bus = $_GET['approve'];
                                $query = "UPDATE business SET bus_status = 'approved' WHERE bus_id = '$approve_bus' ";
                                $approve_query = mysqli_query($conn, $query);

                                if($approve_query){
                                    header("Location: business.php");
                                }else{

                                    echo "server couldn't process request";
                                  }
                                
                                }


                                if(isset($_GET['unapprove'])){
                                $unapprove_bus = $_GET['unapprove'];

                                $query = "UPDATE business SET bus_status = 'unapproved' WHERE bus_id = '$unapprove_bus' ";
                                $approve_query = mysqli_query($conn, $query);
                                if($approve_query){

                                    header("Location: business.php");
                                // echo "<script>document.getElementById('cross').style.display = 'block';</script>";
                                // echo "<script>document.getElementById('mark').style.display = 'none';</script>";
                                  }else{

                                    echo "server couldn't process request";
                                  }

                                // header("Location:admin_2.php");
                                }





                    ?>
                    <table class="table-panel footable table-listings"> 
                        <tr> 
                            <td data-title="Preview" data-breakpoints="xs" data-type="html" class="preview"> 
                                <a href="#" class="link"> 
                                    <img class="image-preview preview-95x88" src="../users/uploads/<?php echo $bus_image; ?>" alt=""> 
                                </a> 
                            </td> 
                            <td class="preview-mobile" data-type="html"> 
                                <div> 
                                    <a href="#" class="listing-link"><?php echo $bus_name;?></a> 
                                    <?php

                                        if ($bus_status == 'approved') {
                                            echo "<i class='fa fa-certificate' style='color: blue; font-size: 20px;'></i>";
                                        }else{

                                            echo"";
                                        }

                                    ?>
                                    
                                </div> 


                                <div> 
                                    <!-- <span class="rating"> 5.0
                                         
                                        <i class="icon-star-ratings-5"></i> 
                                    </span>  -->
                                    <span class="listing-tags tags"> 
                                        Category: <a href=""><?php echo $bus_category; ?></a>
                                    </span> 
                                    <br>
                                    <i class="fa fa-phone blue-color" title=""><?php echo " " .$bus_contact; ?></i><br>
                                    <p><i class="fa fa-envelope"><?php echo " " .$bus_email; ?></i></p>
                                </div> 
                            </td> 
                            <td data-title="Address" data-breakpoints="xs" data-type="html" class="location-cell"> 
                                <i class="ion-ios-location-outline"></i><span class="address" title="31 Crosby St, New York"><?php echo $bus_add; ?></span> 
                            </td> 
                            <!-- <td data-title="" data-breakpoints="xs" data-type="html"> 
                                <a href="edit_business.html" class='btn btn-listing btn-default'><i class="ion-ios-compose-outline"></i> Edit</a> 
                            </td>  -->
                            <td data-title="" data-breakpoints="xs" data-type="html"> 
                                <a  href="business.php?approve=<?php echo $bus_id ?>" class='btn btn-listing btn-default'><i></i>Approve</a>
                            </td> 

                            <td data-title="" data-breakpoints="xs" data-type="html"> 
                                <a href="business.php?unapprove=<?php echo $bus_id ?>" class='btn btn-listing btn-default'><i class=""></i>Unapprove</a> 
                               
                            </td>
                             <td data-title="" data-breakpoints="xs" data-type="html"> 
                                <a href='business.php?delete=<?php echo $bus_id ?>'style='margin-bottom:5%;' class='btn btn-listing btn-default'></i>Delete</a> 
                                <p><i class=""></i></p>
                            </td> 
                        </tr> 
                    </table>
             <?php } ?> 
            </div> 
     
            <?php 
            //approve code
            // if(isset($_GET['approve'])){

            // $approve_bus = $_GET['approve'];
            // $query = "UPDATE business SET bus_status = 'approved' WHERE bus_id = '$approve_bus' ";
            // $approve_query = mysqli_query($conn, $query);

            // if($approve_query){
            //      echo "<script>document.getElementById('mark').style.display = 'block';</script>";
            // }

            // // header("Location:admin_2.php");
            // }


             //Unapprove code
            

            // <!--  DELETE CODE -->
            if(isset($_GET['delete'])){
                $delete_bus_id = $_GET['delete'];

            $query = "DELETE FROM business WHERE bus_id = {$delete_bus_id}";
            $delete_query = mysqli_query($conn, $query);
            header("location:admin_2.php");

             }
            ?>

             <ul class="pagination">
    <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
    <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
    <a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
    </li>
       
    <?php 
    if ($total_no_of_pages <= 10){       
        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
            if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }
        }
    }
    elseif($total_no_of_pages > 10){
        
    if($page_no <= 4) {         
     for ($counter = 1; $counter < 8; $counter++){       
            if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }
        }
        echo "<li><a>...</a></li>";
        echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
        echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
        }

     elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {         
        echo "<li><a href='?page_no=1'>1</a></li>";
        echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {         
           if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }                  
       }
       echo "<li><a>...</a></li>";
       echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
       echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
        
        else {
        echo "<li><a href='?page_no=1'>1</a></li>";
        echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }                   
                }
            }
    }
?>
    
    <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
    <a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
    </li>
    <?php if($page_no < $total_no_of_pages){
        echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
        } ?>
</ul>

           
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