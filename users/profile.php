		<?php include"includes/header.php";
		include "includes/update.php";
		$email = $_SESSION['email'];

		if(isset($email)){
		$query_check = $conn->prepare("SELECT* FROM `usersnye` WHERE email_address =?");
		$query_check->bind_param('s',$email);
		$query_check->execute();
		$result = $query_check->get_result();
		$row = $result->fetch_array();
		$picturenye = $row['image'];
		$first_namenye = $row['first_name'];
		$last_namenye = $row['last_name'];
		$phone_nonye = $row['phone'];
	   
	    include"includes/side_nav.php";
		
		include"includes/main_nav.php";
		
		?>
    	 <!-- /.top-bar --> 
    	 <div class="mainbar-body"> 
    	 <div class="section-form section"> 
    	 		<div class="section-header"> <h2 class="title"> Update Profile </h2> 
    	 		</div> 
    	 <div class="box-content"> 
    	 <div class="profile-editor clearfix">
    	 <div class="profile-editor-side"> 
    	 <div  class="profile-editor-preview"> <img style="height:300px; width:100%;" src="images/<?php echo $picturenye;?>" alt="My Image"> 
    	 </div> 
    	 <!-- <input type="file" name = "user_image" class="" id="input_file2">
    	<button class="btn btn-image-upload" data-inputype-file="input_file2"><i class="ion-upload"></i> Upload Photo</button>  -->
    </div> 
    	<div class="profile-editor-main"> 
    	<form action="" method="post" enctype="multipart/form-data"> 
    	<div class="form-group form-xs-group nomargin"> 
    	<label>Main Details</label> 
    	<div class="row"> 
    	<div class="col-md-6"> 
    	<div class="form-group form-xs-group"> 
    	<input type="email" readonly class="form-control" value="<?php echo $email?>" placeholder=""> 
    	</div> 
    	</div> 
    	<div class="col-md-6"> 
    	<div class="form-group form-xs-group"> 
    	<input type="text" name = "first_namenye" class="form-control" value="<?php echo $first_namenye?>" placeholder=""> 
    	</div> 
    	</div> 
    	<div class="col-md-6"> 
    	<div class="form-group form-xs-group"> 
    	<input type="text" name = "last_namenye" class="form-control" value="<?php echo $last_namenye?>" placeholder=""> 
    	</div> 
    	</div> 
    	<div class="col-md-6"> 
    	<div class="form-group form-xs-group"> 
    	<input type="text" name = "phone_nonye" class="form-control" value="<?php echo $phone_nonye?>" placeholder=""> 
    	</div> 
        </div> 
        <input type="file" name = "user_image" class="hidden" id="input_file2">
    	<button class="btn btn-image-upload" data-inputype-file="input_file2"><i class="ion-upload"></i>Change Photo</button>
    	<div class="col-md-12"> 
    	<div class="form-group form-xs-group"> 
    	 
    	</div> 
    	</div> 
    	</div> 
    	</div>  
    	<div class="form-group form-xs-group"> 
    	<button type="submit" name = "update" class="btn btn-xs btn-danger btn-local-danger">Update Profile</button> 
    	</div> 
    	</form> 
    </div> 
    	</div> 
    	</div> 
        </div> 
    	<div class="section-form section"> 
    	<div class="section-header"> <h2 class="title"> Change Password </h2> </div> 
    	<div class="box-content"> 
    	<form action="" method="post"> 
    	<div class="row"> 
    	<div class="col-md-4"> 
    	<div class="form-group form-xs-group"> 
    	<input type="text" name="old_passwordnye" class="form-control" placeholder="Current Password"> 
    	</div> 
    	</div> 
    	<div class="col-md-4"> 
    	<div class="form-group form-xs-group"> 
    	<input type="text" name="new_passwordnye" class="form-control" placeholder="New Password"> 
    	</div> 
    	</div> 
    	<div class="col-md-4"> 
    	<div class="form-group form-xs-group"> 
    	<input type="text" name="password_confirmnye" class="form-control" placeholder="Repeat Password"> 
    	</div> 
    	</div> 
    	</div> 
    	<div class="form-group form-xs-group"> 
    	<button type="submit" name="change" class="btn btn-xs btn-danger btn-local-black">Change Password</button> 
    	</div> 
    	</form> 
    	</div> 
    	</div> 
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

<?php
	}else{
		header("location:../index.php");
	}
?>