<?php include "../db_config.php"; ?>

<?php include "includes/header.php"; ?>

<!-- START mainbar -->
<?php include "includes/sidebar.php"; ?>
<!-- /.sidebar --> <!-- END mainbar --> <!-- START mainbar --> 

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
    if(isset($_POST['submit'])){

        $firstname = $_POST['first_namenye'];
        $lastname = $_POST['last_namenye'];
        $raw_input = (int)$_POST['phone_nonye'];
        $phone_num = '+234'.$raw_input;
        $email_address = $_POST['email_addressnye'];
        $specialty = $_POST['specialty'];
        $password = $_POST['passwordnye'];


        $image = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];

        move_uploaded_file($image_temp, "images/$image");


        //cleaning of variables
        $firstname = mysqli_real_escape_string($conn, $firstname);
        $lastname  = mysqli_real_escape_string($conn, $lastname);
        $phone_num = mysqli_real_escape_string($conn, $phone_num);
        $email_address = mysqli_real_escape_string($conn, $email_address);
        $password = mysqli_real_escape_string($conn, $password);


        $hashformat = "$2y$10$";
        $salt = "iamgoingtobecomeabadassdevelpoer";
        $hashformat_and_salt = $hashformat .  $salt;
        $password = crypt($password, $hashformat_and_salt);

        
        $query = "INSERT INTO usersnye (first_name, last_name, phone, email_address, specialty, password, image)";
        $query .= "VALUES('{$firstname}', '{$lastname}', '{$phone_num}', '{$email_address}', '{$specialty}', '{$password}', '{$image}')";

        $query_addmember = mysqli_query($conn, $query); 

        if($query_addmember){

            echo "<script> alert('Member Successfully Added');</script>";
        }
    }



    ?>

    <!-- /.top-bar --> 
    <div class="mainbar-body"> 
        <div class="section-form section"> 
            <div class="section-header"> 
                <h2 class="title"> Add Member </h2> 
            </div> 
            <div class="box-content"> 
                <form method="post" action="" enctype="multipart/form-data" > 
            <div class="form-section"> 
                <div class="row"> 
                    <div class="col-md-6"> 
                        <div class="form-group"> 

                            <label for="firstname">First Name</label>
                            <input type="text"  name="first_namenye" class="form-control" id="fieldListingName" value="" required placeholder="John">
                        </div> 
                        </div> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 

                            <label for="lastname">Last Name</label>
                            <input type="text"  name="last_namenye" class="form-control" id="fieldListingName" value="" required placeholder="Johnson">
                        </div> 

                            </div>
                        </div> 
                    </div> 
                    <div class="form-section"> 
                        <div class="row"> 
                            <div class="col-md-12"> 
                                <div class="form-group"> 
                                    <label for="input_file1">Image 
                                        <span class="option"></span>
                                    </label> 
                                    <!-- style="color:#fff; background-color: #d9534f; border-color: #d43f3a;" -->
                                    <input name="image" value="" type="file" class="" id="input_file1"> 
                                    
                                   <!--  <button name="image" type="button" class="btn btn-danger btn-lg btn-block btn-local-danger" data-inputype-file="input_file1">
                                        Browse Files
                                    </button>  -->
                                </div> 
                            </div> 
                        </div> 
                    </div> 
                    <div class="form-section"> 
                        <div class="row"> 
                        <!-- <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="fieldPhone">Location</label> 
                                <input value="" name="" type="text" class="form-control" id="fieldLocation" placeholder="e.g 13, Ijeun-Titun, Abeokuta Nigeria">
                            </div> 
                        </div> -->
                            <div class="col-md-6">
                            <div class="form-group"> 
                                <label for="fieldPhone">E-mail Address</label> 
                                <input value="" name="email_addressnye" type="email" class="form-control" id="fieldLocation" required placeholder="youremail@gmail.com">
                            </div> 
                            </div>
                            <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label for="fieldPhone">Phone Number</label> 
                                <input name="num" value="+234" style="width:50%; visibility:hidden">
                                <!-- <select style="visibility:hidden"><option style="" class="hidden" name="num" value="+234"></option> </select> -->
                                <input maxlength="11" pattern="[0-9]{1nm }-[0-9]{2}-[0-9]{3}" value=""  name="phone_nonye" type="tel" class="form-control" id="fieldLocation" required placeholder="09068456700">
                            </div> 
                        </div>
                       <!--  <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="password">Password</label> 
                                <input value="" name="passwordnye" type="password" class="form-control" id="fieldLocation" required placeholder="Password">
                            </div> 
                        </div> -->
                        </div>
                        

                        </div>
                        <div class="form-section"> 
                        <div class="row"> 
                        <!-- <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="fieldPhone">Location</label> 
                                <input value="" name="" type="text" class="form-control" id="fieldLocation" placeholder="e.g 13, Ijeun-Titun, Abeokuta Nigeria">
                            </div> 
                        </div> -->
                            <div class="col-md-6">
                            <div class="form-group"> 
                                <label for="fieldPhone">Specialty</label> 
                                <input value="" name="specialty" type="text" class="form-control" id="fieldLocation" required placeholder="Programmer">
                            </div> 
                            </div>
                           <!--  <div class="col-md-"> 
                            <div class="form-group"> 
                                <label for="fieldPhone">Phone Number</label> 
                                <input name="num" value="+234" style="width:50%; visibility:hidden">
                                <select style="visibility:hidden"><option style="" class="hidden" name="num" value="+234"></option> </select>
                                <input maxlength="11" pattern="[0-9]{1nm }-[0-9]{2}-[0-9]{3}" value=""  name="phone_nonye" type="tel" class="form-control" id="fieldLocation" required placeholder="09068456700">
                            </div> 
                        </div> -->
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label for="password">Password</label> 
                                <input value="" name="passwordnye" type="password" class="form-control" id="fieldLocation" required placeholder="Password">
                            </div> 
                        </div>
                        </div>
                        

                        </div>
                          
                          
                        
                          
                        <!-- <div class="row"> 
                            <div class="col-md-12"> 
                                <div class="form-group"> 
                                    <label for="fieldDesription">Desription</label> 
                                    <textarea class="form-control" id="fieldDesription" rows="8">

                                    </textarea> 
                                </div> 
                            </div> 
                        </div> -->
                        <button type="submit" value="submit" name="submit" class="btn btn-xs btn-danger btn-local-danger">Submit </button> 
                    </form> 
                </div> 
            </div> 
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