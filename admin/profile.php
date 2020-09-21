    <?php include "../db_config.php"; ?>

    <?php include "includes/header.php"; ?>
    <!-- START mainbar -->

<?php include "includes/sidebar.php"; ?>

<?php

        $email = $_SESSION['email'];

                    $query = "SELECT * FROM admin_profilenye WHERE email_address = '$email'";
                    $select_profile = mysqli_query($conn, $query);

                $row = mysqli_fetch_assoc($select_profile);
                    // $id = $row['id_nye'];
                   $lastname = $row['last_name'];
                   $firstname = $row['first_name'];
                   $email = $row['email_address'];
                   $phone = $row['phone'];
                   $info = $row['info'];
                   $image = $row['image'];

                   ?>
<!-- /.sidebar --> <!-- END mainbar --> <!-- START mainbar --> 
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

        // while($row = mysqli_fetch_assoc($select_profile)){

                   if(isset($_POST['submit'])){

                        $lastname = $_POST['lastname'];
                        $firstname = $_POST['firstname'];
                        $emailaddress = $_POST['emailaddress'];
                        $phonenum = $_POST['phonenum'];
                        $info = $_POST['info'];                 
                        $image = $_FILES['image']['name'];
                        $image_temp = $_FILES['image']['tmp_name'];

                        $lastname  = mysqli_real_escape_string($conn, $lastname);
                        $firstname = mysqli_real_escape_string($conn, $firstname);
                        $emailaddress = mysqli_real_escape_string($conn, $emailaddress);
                        $phonenum = mysqli_real_escape_string($conn, $phonenum);
                        $info  = mysqli_real_escape_string($conn, $info);


                        $query = "UPDATE admin_profilenye SET ";
                        $query .= "last_name  = '$lastname', ";
                        $query .= "first_name = '$firstname', ";
                        $query .= "email_address = '$emailaddress', ";
                        $query .= "phone = '$phonenum', ";
                        $query .= "info = '$info' ";
                        // $query .= "image_nye = '$image' ";
                        $query .= "WHERE email_address = '$emailaddress'";

                        $update_query = mysqli_query($conn, $query);
                        if(!empty($image)){
                            $query_img = "UPDATE admin_profilenye SET ";
                            $query_img .= "image = '$image' ";
                            $query_img .= "WHERE email_address = '$emailaddress'";
                            $update_query_img = mysqli_query($conn, $query_img);
                            move_uploaded_file($image_temp, "assets/img/$image");
                        }
                        if ($update_query) {
                         
                             header("Location:profile.php");
                        }else{
                            echo "404";
                        }
                         
                        
                   }
        // }

         ?>
    
    	 <!-- /.top-bar --> 
    	 <div class="mainbar-body"> 
    	 <div class="section-form section"> 
    	 		<div class="section-header"> <h2 class="title"> Update Profile </h2> 
    	 		</div> 
    	 <div class="box-content"> 
    	 <div class="profile-editor clearfix">
    	 <div class="profile-editor-side"> 
    	 <div class="profile-editor-preview"> 
         <img style="width:400px; height:250px;> " src="assets/img/<?php echo $image;?>"  alt=""> 
    	 </div> 
    	 <!-- <input type="file" name="image" class="" id="input_file2">
    	<button class="btn btn-image-upload" data-inputype-file="input_file2"><i class="ion-upload"></i> Upload Photo</button> --> 
    </div> 



    	<div class="profile-editor-main"> 

    	<form method="post" action="" enctype="multipart/form-data"> 

    	<div class="form-group form-xs-group nomargin"> 
    	<label>Main Details</label> 
    	<div class="row"> 
    	<div class="col-md-6"> 
    	<div class="form-group form-xs-group"> 
    	<input type="text" value="<?php echo $lastname;?>" name="lastname" class="form-control" placeholder="Last name"> 
    	</div> 
    	</div> 
    	<div class="col-md-6"> 
    	<div class="form-group form-xs-group"> 
    	<input type="text" value="<?php echo $firstname;?>" name="firstname" class="form-control" placeholder="First name"> 
    	</div> 
    	</div> 
    	<div class="col-md-6"> 
    	<div class="form-group form-xs-group"> 
    	<input type="email" value="<?php echo $email; ?>" name="emailaddress" class="form-control" placeholder="Email address"> 
    	</div> 
    	</div> 
    	<div class="col-md-6"> 
    	<div class="form-group form-xs-group"> 
    	<input type="text" value="<?php echo $phone;?>" name="phonenum" max-length="11" class="form-control" placeholder="Phone number"> 
    	</div> 
    	</div> 

    	<div class="col-md-12"> 
    	<div class="form-group form-xs-group"> 
    	<textarea class="form-control" id="fieldDesription" name="info" rows="5" placeholder="Short Info"> <?php echo $info; ?></textarea> 
    	</div> 
    	</div> 
        
    	</div> 
    	</div> 
        <input type="file" name="image" class="hidden" id="input_file2">
        <button class="btn btn-image-upload" data-inputype-file="input_file2"><i class="ion-upload"></i> Upload Photo</button>
    	<div class="form-group form-xs-group"> 
        
    	<button type="submit" value="submit" name="submit" class="btn btn-xs btn-danger btn-local-danger">Update Profile</button> 
    	</div> 
    	</form> 
        </div> 
    	</div> 
    	</div> 
        </div> 


    	<!-- <div class="section-form section"> 
    	<div class="section-header"> <h2 class="title"> Cahnge Password </h2> </div> 
    	<div class="box-content"> 
    	<form> 
    	<div class="row"> 
    	<div class="col-md-4"> 
    	<div class="form-group form-xs-group"> 
    	<input type="text" class="form-control" placeholder="Current Password"> 
    	</div> 
    	</div> 
    	<div class="col-md-4"> 
    	<div class="form-group form-xs-group"> 
    	<input type="text" class="form-control" placeholder="New Password"> 
    	</div> 
    	</div> 
    	<div class="col-md-4"> 
    	<div class="form-group form-xs-group"> 
    	<input type="text" class="form-control" placeholder="Repeat Password"> 
    	</div> 
    	</div> 
    	</div> 
    	<div class="form-group form-xs-group"> 
    	<button type="button" class="btn btn-xs btn-danger btn-local-black">Change Password</button> 
    	</div> 
    	</form> 
    	</div> 
    	</div>  -->

        
    	</div> 
    	</div> 
    	<!-- END mainbar --> 
    	</div> 
    	<!-- Start Jquery --> 
    	<script src="assets/js/jquery-2.2.1.min.js"></script> 
    	<script src="assets/libraries/jquery.mobile/jquery.mobile.custom.min.js"></script>
    	<!-- End Jquery --> <!-- Start BOOTSTRAP --> 
    	<script src="assets/libraries/bootstrap/dist/js/bootstrap.min.js"></script> 
    	<script src="assets/js/bootstrap-select.min.js"></script> 
    	<!-- End Bootstrap --> <!-- Start Template files --> 
    	<script src="assets/js/admin-local.js"></script> 
    	<!-- End Template files --> <!-- Start custom styles --> 
    	<script src="assets/js/jquery.helpers.js" type="text/javascript"></script> 
    	<!-- End custom styles --> 
    	<script src="assets/js/moment-with-locales.min.js" type="text/javascript"></script> 
    	<script src="assets/js/moment-timezone-with-data.js" type="text/javascript"></script> 
    </body>
<!-- Mirrored from geniuscript.com/local/admin_4.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Aug 2020 08:51:03 GMT -->
</html>