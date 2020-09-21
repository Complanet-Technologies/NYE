<?php include "../db_config.php"; ?>

<?php include "includes/header.php"; ?>
 
<!-- START mainbar --> 
<?php include "includes/sidebar.php"; ?>
<!-- /.sidebar --> <!-- END mainbar --> <!-- START mainbar --> 

<?php

        $email = $_SESSION['email'];

                    $mysqli = "SELECT * FROM admin_profilenye WHERE email_address = '$email'";
                    $select_profile = mysqli_query($conn, $mysqli);

                  $row4 = mysqli_fetch_assoc($select_profile);
                    // $id = $row['id_nye'];
                   $lastname = $row4['last_name'];
                   $firstname = $row4['first_name'];
                   $email = $row4['email_address'];
                   $phone = $row4['phone'];
                   $info = $row4['info'];
                   $image = $row4['image'];

                   ?>
                   
<div class="mainbar">
<div class="bar-head top-bar clearfix">
<div class="profile-card pull-right">
<a href="profile.php" class="profile-card-image">
    <img src="assets/img/<?php echo $image; ?>" alt=""> 
    </a> 
    <div class="profile-body"> <?php echo $firstname; ?></div> 
    
</div>
<!-- /.profile-card --> 
<a href="add_mem.php" class="btn btn-transparent pull-right">Add Member</a>
</div>
<?php 

$query = "SELECT count(*) as total FROM usersnye";
$count_query = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($count_query);

// echo $count = $row['total'];


$sql = "SELECT count(*) as addition FROM blog_postsnye";
$all_query = mysqli_query($conn, $sql);

$row1 = mysqli_fetch_assoc($all_query);



$query1 = "SELECT count(*) as count FROM businessnye";
$bus_query = mysqli_query($conn, $query1);

$row2 = mysqli_fetch_assoc($bus_query);

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
         <span class="count color-yellow"><?php echo $bus = $row2['count'];?></span>
         <span class="title">Businesses</span>
    </div> 
</div> 
</div> 
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
 <div class="box-shortcut"> 
     <a href="View_All_Posts.php" class="shortcut-btn"></a> 
     <div class="box-shortcut-body">
         <span class="count color-red"><?php echo $alls = $row1['addition'];?></span>
        
         <span class="title">Blog Posts</span>
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
      <h2 class="title"> Businesses </h2> 
</div> 
<div  class="table-responsive" style="width: 100%; height: 800px;">

<div  class="table-responsive" id="columnchart_material" style=" margin: auto; width: 100%; height: 450px;"></div>
</div>

 <div class="">
      <h2 class="title"> Members </h2>
       <div id="piechart" style="width: 900px; height: 500px;"></div> 
</div> 
<table class="table-panel footable table-review"> 

            <?php

            //         if (isset($_GET['page_no']) && $_GET['page_no']!="") {
            //         $page_no = $_GET['page_no'];
            //         } else {
            //         $page_no = 1;
            //         }

            //         $total_records_per_page = 7;
            //         $offset = ($page_no-1) * $total_records_per_page;
            //         $previous_page = $page_no - 1;
            //         $next_page = $page_no + 1;
            //         $adjacents = "2"; 

            //         $result_count = mysqli_query($connection,"SELECT COUNT(*) As total_records FROM `businessnye`");
            //         $total_records = mysqli_fetch_array($result_count);
            //         $total_records = $total_records['total_records'];
            //         $total_no_of_pages = ceil($total_records / $total_records_per_page);
            //         $second_last = $total_no_of_pages - 1; // total page minus 1

            // $query = "SELECT * FROM business LIMIT $offset, $total_records_per_page" ;
            // $query = "SELECT * FROM businessnye WHERE bus_status = 'approved' LIMIT $offset, $total_records_per_page";
            // $select_app_query = mysqli_query($connection, $query);

            // while( $row = mysqli_fetch_assoc($select_app_query)){

            //                 $bus_id = $row['id'];
            //                 $bus_name= $row['bus_name'];
            //                 $bus_category= $row['bus_category'];
            //                 $bus_email= $row['bus_email'];
            //                 $bus_add= $row['bus_address'];
            //                 $bus_image = $row['bus_image'];
            //                 $bus_contact= $row['bus_contact'];
            //                 $bus_status  =$row['bus_status'];

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
    <span ><?php echo $bus_email; ?></span> 
    </td> 
    <td data-title="Date" data-breakpoints="xs" data-type="html"> 
        <span class="date"><?php echo $bus_contact; ?></span> 
    </td>
    <!--  <td data-title="Close" data-breakpoints="xs" data-type="html"> 
         <button class='btn-clear'><i class="ion-close-round"></i></button>
     </td>  -->
    </tr> 

         </table> 
          <ul class="pagination">
    <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
   <!--  <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
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
        } ?> -->
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











                       <!--  // <script src="../lib/jquery/jquery.min.js"></script> -->

  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="../include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../lib/jquery.scrollTo.min.js"></script>
  <script src="../lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="../lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="../lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="../lib/sparkline-chart.js"></script>
  <script src="../lib/zabuto_calendar.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Welcome to Dashio!',
        // (string | mandatory) the text inside the notification
        text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo.',
        // (string | optional) the image to display on the left
        image: 'img/ui-sam.jpg',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });
  </script>
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
                        
                        <!-- End footable-jquery --> 
                    
                    </body>
                    
<!-- Mirrored from geniuscript.com/local/admin_1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Aug 2020 08:49:51 GMT -->
</html>