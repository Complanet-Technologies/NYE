<?php ob_start(); ?>

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
          <!-- /.top-bar --> 
            <div class="mainbar-body"> 
                <div class="section-reviews">
                    <div class="section-header"> 
                        <h2 class="title"> List of members </h2> 
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

                    $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `usersnye`");
                    $total_records = mysqli_fetch_array($result_count);
                    $total_records = $total_records['total_records'];
                    $total_no_of_pages = ceil($total_records / $total_records_per_page);
                    $second_last = $total_no_of_pages - 1; // total page minus 1


                    $query = "SELECT * FROM `usersnye` ORDER BY id LIMIT $offset, $total_records_per_page";
                    $select_query =  mysqli_query($conn, $query);

                    while( $row = mysqli_fetch_assoc($select_query)){

                            $idnye = $row['id'];
                            $first_namenye = $row['first_name'];
                            $last_namenye = $row['last_name'];
                            $email_addressnye = $row['email_address'];
                            $passwordnye = $row['password'];
                            $phone_nonye = $row['phone'];
                            $picturenye = $row['image'];
                            $specialty = $row['specialty'];
                            $payment_status = $row['payment_status'];

                            $name = $last_namenye . " " . $first_namenye;

                    ?>
                    <table class="table-panel footable table-listings"> 
                        <tr> 
                            <td data-title="Preview" data-breakpoints="xs" data-type="html" class="preview"> 
                                <a href="#" class="link"> 
                                    <img class="image-preview preview-95x88" src="images/<?php echo $picturenye ?>" alt=""> 
                                </a> 
                            </td> 
                            <td class="preview-mobile" data-type="html"> 
                                <div> 
                                    <a href="#" class="listing-link"><?php echo $name; ?></a> 
                                    <?php

                                    if($payment_status == 'paid'){
                                        echo "<i class='fa fa-check' style='color:green; font-size:20px;'></i>";
                                    }else{

                                         echo "<i class='fa fa-times' style='color:#f03744; font-size:20px;'></i>";
                                    }

                                    ?>
                                </div> 
                                <div> 
                                    
                                    <p><i class="fa fa-envelope"><?php echo " ".$email_addressnye; ?></i></p>
                                    <p><i class="fa fa-phone"><?php echo " ".$phone_nonye; ?></i> </p>
                                    <span class="listing-tags tags"> 
                                        <a href="map-side-list.html">Specialty</a> · <a href="map-side-list.html"><?php echo " ".$specialty; ?></a> 
                                    </span> 
                                </div> 
                            </td> 





                         <!--    <td class="preview-mobile" data-type="html"> 
                                <div> 
                                    <a href="#" class="listing-link">Contraband Coffee Bar</a> 
                                </div> 
                                <div> 
                                    <span class="rating"> 
                                        4.5 
                                        <i class="icon-star-ratings-4-5"></i> 
                                    </span> 
                                    <span class="listing-tags tags"> 
                                        <a href="map-side-list.html">Italian</a> · <a href="map-side-list.html">Grocery</a> 
                                    </span> 
                                </div> 
                            </td>  -->






                            
                           <!--  <td> 
                                <a href="admin_3.html" class='btn btn-listing btn-default'><i class="ion-ios-compose-outline"></i> Edit</a> 
                            </td> -->
                            <td>
                                <!-- <p ><?php echo $user_status; ?></p> -->
                            </td>
                            
                            <td data-title="" data-breakpoints="xs" data-type="html"> 
                                <a href="members.php?paid=<?php echo $idnye ?>" class='btn btn-listing btn-default'><i class=""></i>Approve</a> 
                            </td> 


                            <td data-title="" data-breakpoints="xs" data-type="html"> 
                                <a href="members.php?not_paid=<?php echo $idnye?>" class='btn btn-listing btn-default'><i class=""></i>Unaaprove</a> 
                            </td>
                             <td data-title="" data-breakpoints="xs" data-type="html"> 
                                <a href='members.php?delete=<?php echo $idnye ?>' class='btn btn-listing btn-default'></i>Delete</a> 
                            </td> 
                        </tr> 
                        
                    </table> 

                    <?php  } ?>
                </div> 

                <?php 
            //paid code
            if(isset($_GET['paid'])){

            $paid_mem = $_GET['paid'];
            $query = "UPDATE usersnye SET payment_status = 'paid' WHERE id = '$paid_mem' ";
            $paid_query = mysqli_query($conn, $query);

            header("Location: members.php");
            }


             //not_paid code
            if(isset($_GET['not_paid'])){
            $not_paid_mem = $_GET['not_paid'];

            $query = "UPDATE usersnye SET payment_status = 'not_paidd' WHERE id = '$not_paid_mem' ";
            $paid_query = mysqli_query($conn, $query);

             header("Location: members.php");
            }



            // <!--  DELETE CODE -->
            if(isset($_GET['delete'])){
                $delete_mem_id = $_GET['delete'];

            $query = "DELETE FROM usersnye WHERE id = {$delete_mem_id}";
            $delete_query = mysqli_query($conn, $query);
            header("location:members.php");

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