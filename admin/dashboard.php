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
<a href="dashboard.php">
<i class="nav-icon ion-android-color-palette"></i>
<span class="nav-label">Dashboard</span>
</a> 
</li> 
<li> 
<a href="business.php">
<i class="nav-icon ion-android-clipboard"></i>
<span class="nav-label">Businesses</span>
</a>
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
<?php 

$query = "SELECT count(*) as total FROM nye_users";
$count_query = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($count_query);

// echo $count = $row['total'];


$sql = "SELECT count(*) as count FROM business";
$all_query = mysqli_query($conn, $sql);

$row1 = mysqli_fetch_assoc($all_query);


// $sqll = "SELECT count(*) as add FROM business WHERE bus_status = 'unapproved' ";
// $add_query = mysqli_query($conn, $sqll);

// $row2 = mysqli_fetch_assoc($add_query);

// echo $count = $row['total'];
?>
<!-- /.top-bar -->
<div class="mainbar-body">
<div class="section-shortcut"> 
  <div class="row"> 
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4"> 
          <div class="box-shortcut"> 
              <a href="members.php" class="shortcut-btn"></a>
               <div class="box-shortcut-body">
                    <span class="count color-green"><?php echo $count = $row['total']; ?></span>
                    <span class="title">Members</span> 
                </div> 
            </div> 
        </div>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4"> 
<div class="box-shortcut">
     <a href="business.php" class="shortcut-btn"></a> 
     <div class="box-shortcut-body">
         <span class="count color-yellow"><?php echo $alls = $row1['count'];  ?></span>
         <span class="title">Businesses</span>
    </div> 
</div> 
</div> 
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
 <div class="box-shortcut"> 
     <a href="#" class="shortcut-btn"></a> 
     <div class="box-shortcut-body">
         <span class="count color-red">12</span>
        <!--  <?php echo $add = $row2['add'];  ?> -->
         <span class="title">Blog Post</span>
    </div> 
</div> 
</div> 
<!-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3"> 
<div class="box-shortcut">
     <a href="#" class="shortcut-btn"></a>
<div class="box-shortcut-body">
    <span class="count color-grey">54</span>
    <span class="title">Reviews</span>
</div> 
</div> 
</div> -->
</div> 
</div> 
<div class="row swap-md-down"> 
<div class="col-lg-9 swap-bottom"> 
<div class="section-reviews">
 <div class="section-header">
      <h2 class="title"> Approved Businesses </h2> 
</div> 
<table class="table-panel footable table-review"> 

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

                    $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `business`");
                    $total_records = mysqli_fetch_array($result_count);
                    $total_records = $total_records['total_records'];
                    $total_no_of_pages = ceil($total_records / $total_records_per_page);
                    $second_last = $total_no_of_pages - 1; // total page minus 1

            // $query = "SELECT * FROM business LIMIT $offset, $total_records_per_page" ;
            $query = "SELECT * FROM business WHERE bus_status = 'approved' LIMIT $offset, $total_records_per_page";
            $select_app_query = mysqli_query($conn, $query);

            while( $row = mysqli_fetch_assoc($select_app_query)){

                            $bus_id = $row['bus_id'];
                            $bus_name= $row['bus_name'];
                            $bus_category= $row['bus_category'];
                            $bus_email= $row['bus_email'];
                            $bus_add= $row['bus_add'];
                            $bus_image = $row['bus_image'];
                            $bus_contact= $row['bus_contact'];
                            $bus_status  =$row['bus_status'];

             ?>

    <tr> 
    <td data-title="Preview" data-breakpoints="xs" data-type="html" class="preview">
         <a href="#" class="link">
             <img class="image-preview preview-35x35" src="assets/img/pic/<?php echo $bus_image; ?>" alt="">
            </a>
    </td> 
    <td data-type="html">
         <b>Business</b> for <a href="#" class="link"><?php echo $bus_name; ?></a>
     </td> 
     <td data-title="Rating" data-breakpoints="xs" data-type="html"> 
    <span class="rating"> 5.0 <i class="icon-star-ratings-5"></i>
    </span> 
    </td> 
    <td data-title="Date" data-breakpoints="xs" data-type="html"> 
        <span class="date"><?php echo $bus_contact; ?></span> 
    </td>
    <!--  <td data-title="Close" data-breakpoints="xs" data-type="html"> 
         <button class='btn-clear'><i class="ion-close-round"></i></button>
     </td>  -->
    </tr> 
<?php } ?>
         </table> 
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
    <div class="col-lg-3 swap-top">
         <div class="m78 nomargin-md"></div> 
         <div class="alert-local alert alert-info fade in">
              <div class="header"> 
                  <span class="marker-box">
                      <i class="ion-ios-information-outline"></i>
                    </span> 
                    <div class="title"><span>Member</span>
                    </div> 
                    <a href="#" class="" data-dismiss="alert"></a> </div> 
                <div class="alert-body">You can add new members, view list of available members with their details and you can also Delete, Approve and Unapprove members. </div> 
            </div>
             <div class="alert-local alert alert-success fade in">
                  <div class="header"> 
                      <span class="marker-box"><i class="ion-ios-information-outline"></i>
                    </span> 
                    <span class="title">
                        <span>Business</span>
                    </span> 
                    <a href="#" class="" data-dismiss="alert"></a> </div> 
                    <div class="alert-body">You can view the list of available businesses & list of approved businesses on the dashboard. Businesses can be Approved, Unapproved and Deleted.</div>
                 </div> 
                 <div class="alert-local alert alert-warning fade in">
                      <div class="header"> 
                          <span class="marker-box">
                              <i class="ion-ios-information-outline"></i>
                            </span> 
                            <span class="title"><span>Profile</span>
                        </span> 
                        <a href="#" class="" data-dismiss="alert"></a> 
                    </div> 
                    <div class="alert-body"> You can view, edit and update your profile details such as Firstname, Lastnamee, Email, Phone number Picture and your information  </div>
                 </div> 
                 <!-- <div class="alert-local alert alert-danger fade in"> 
                     <div class="header"> 
                         <span class="marker-box">
                             <i class="ion-ios-information-outline"></i>
                            </span> 
                            <span class="title">
                                <span>Featured Tips</span>
                            </span>
                             <a href="#" class="close" data-dismiss="alert">&times;</a>
                             </div>
                              <div class="alert-body"> Duis sed odio amet nibh vulputate cursus asit amet ellite mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio felis tincidunt auctor elit. </div>
                             </div>
                             </div> 
                            </div>  -->
                        </div>
                     </div>
                      <!-- END mainbar --> 
                    </div> 
                    <!-- Start Jquery --> 
                    <script src="assets/js/jquery-2.2.1.min.js">
                    </script>
                     <script src="assets/libraries/jquery.mobile/jquery.mobile.custom.min.js">
                    </script> 
                    <!-- End Jquery --> <!-- Start BOOTSTRAP -->
                     <script src="assets/libraries/bootstrap/dist/js/bootstrap.min.js">
                    </script>
                     <script src="assets/js/bootstrap-select.min.js"></script>
                     
                      <!-- End Bootstrap --> <!-- Start Template files -->
                      
                      <script src="assets/js/admin-local.js"></script>
                      
                      <!-- End Template files --> <!-- Start custom styles --> 
                      
                      <script src="assets/js/jquery.helpers.js" type="text/javascript"></script>
                       <!-- End custom styles --> 
                       <script src="assets/js/moment-with-locales.min.js" type="text/javascript"></script>
                        <script src="assets/js/moment-timezone-with-data.js" type="text/javascript"></script>
                        
                        <!-- Start footable-jquery -->

                        <script src="assets/libraries/footable-jquery/js/footable.js"></script> 
                        <script src="assets/js/footable_custom.js"></script>
                        
                        <!-- End footable-jquery --> 
                    
                    </body>
                    
<!-- Mirrored from geniuscript.com/local/admin_1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Aug 2020 08:49:51 GMT -->
</html>