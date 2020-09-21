
                        <!-- /.top-bar --> 
                        <div class="mainbar-body"> 
                            <div class="section-form section"> 
                                <div class="section-header"> 
                                    <h2 class="title"> Edit Business</h2> 
                                </div> 
                                <div class="box-content"> 
                                	<?php

                                	if (isset($_GET['edit_id'])) {
		                               		
		                               		$the_edit_id = $_GET['edit_id'];

                                		if (isset($_POST['update'])) {
			                                	
                                	 			$businessName = $_POST['businessName'];
                                	 			$businessCategory = $_POST['businessCategory'];
                                	 			$businessCatId = 0 ; 
												$businessEmail = $_POST['businessEmail'];
												$businessAddress = $_POST['businessAddress'];
												$businessPhoneNo = $_POST['businessPhoneNo'];
												$businessDescription = $_POST['businessDescription'];


                                	 			$businessImage = $_FILES['businessImage']['name'];
                                	 			$tmpBusinessImage = $_FILES['businessImage']['tmp_name'];

                                	 			if ($businessImage != '') {
			
													$ext = pathinfo($businessImage, PATHINFO_EXTENSION);
													$allowed = ['png','jpg','jpeg'];

													if (in_array($ext, $allowed)) {
														
														$path = './uploads/';

														move_uploaded_file($tmpBusinessImage,($path.$businessImage));

												$daysOpen = $_POST['daysOpen'];
                                                $businessWebsite = $_POST['businessWebsite'];


												$businessName = mysqli_real_escape_string($conn, $businessName);
												$businessCategory = mysqli_real_escape_string($conn, $businessCategory);
												$businessEmail = mysqli_real_escape_string($conn, $businessEmail);
												$businessAddress = mysqli_real_escape_string($conn, $businessAddress);
												$businessPhoneNo = mysqli_real_escape_string($conn, $businessPhoneNo);
												$businessDescription = mysqli_real_escape_string($conn, $businessDescription);
												$daysOpen = mysqli_real_escape_string($conn, $daysOpen);
                                                $businessWebsite= mysqli_real_escape_string($conn, $businessWebsite);



												$query = "UPDATE `business` SET ";
												$query .= " `bus_name`= '{$businessName}', " ;
												$query .= "`bus_category`= '{$businessCategory}', ";
												$query .= "`bus_email`='{$businessEmail}', ";
												$query .= "`bus_add`='{$businessAddress}', ";
												$query .= "`bus_image`='{$businessImage}', "; 
												$query .= "`bus_contact`='{$businessPhoneNo}', ";
												$query .= "`business_descrip`='{$businessDescription}', ";
												$query .= "`open_days`='{$daysOpen}', ";
                                                $query .= "`bus_website`='{$businessWebsite}', "; 
												$query .= "`bus_status`='unapproved' ";
												$query .= " WHERE bus_id = $the_edit_id";

												$update_query = mysqli_query($conn,$query);

												if (!$update_query) {
													
													die("QUERY FAILED" . mysqli_error($conn));

												}else{

													echo "<h3>Update Successful</h3>";
												}

			                                }
			                                
			                            }
									}

                                	?>

                                	
                                    <form action="" method="post" enctype="multipart/form-data"> 
                                    	<?php 

                                		

		                               		$query = "SELECT * FROM business WHERE bus_id = '{$the_edit_id}' ";
		                               		$result = mysqli_query($conn,$query);


		                               		while ($row = mysqli_fetch_assoc($result)) {

			                                //$businessId = $row['bus_id'];
			                                $businessImage = $row['bus_image'];
			                                $businessName = $row['bus_name'];
			                                $businessCategory = $row['bus_category'];
			                                $businessAddress = $row['bus_add'];
			                                $businessPhoneNo = $row['bus_contact'];
			                                $businessEmail = $row['bus_email'];
			                                $businessDescription = $row['business_descrip'];
			                                $daysOpen = $row['open_days'];

           								?>
                                        <div class="form-section"> 
                                            <div class="row"> 
                                                <div class="col-md-7"> 
                                                    <div class="form-group"> 
                                                        <label for="fieldListingName">Listing Name</label> 
                                                        <input type="text" name="businessName" class="form-control" id="fieldListingName" placeholder="Your Listing name" value="<?php echo $businessName?>"> </div> 
                                                    </div> 
                                                    <div class="col-md-5"> 
                                                        <div class="form-group"> 
                                                            <label for="fieldCategory">Business Category</label> 
                                                            <select id="fieldCategory" name="businessCategory" class="form-control"> 
                                                            	<option value="<?php echo $businessCategory?>">Choose Your Business Category</option> 
                                                            	<option value="none">Choose Your Business Category</option> 
                                                            	<option value="agriculture">Agricultre</option> 
                                                            	<option value="realestate">Real estate</option>
                                                            	<option value="IT">IT</option> 
                                                            </select> 
                                                        </div> 
                                                    </div> 
                                                    </div> 
                                                </div> 
                                                <div class="form-section"> 
                                                    <div class="row"> 
                                                        <div class="col-md-6"> 
                                                            <div class="form-group"> 
                                                                <label for="input_file1">Gallery Images 
                                                                    <span class="option">(optional)</span>
                                                                </label> 
                                                                <input type="file" name="businessImage" class="hidden" id="input_file1"> 
                                                                <button type="button" class="btn btn-danger btn-lg btn-block btn-local-danger" data-inputype-file="input_file1">
                                                                    Browse Files
                                                                </button> 
                                                            </div> 
                                                        </div>
                                                        <div class="col-md-6"> 
                                                            <div class="form-group"> 
                                                             <label for="fieldPhone">Website Url</label> 
                                                            <input type="text" name="businessWebsite" class="form-control" placeholder="https://www.example.com">
                                                            </div> 
                                                        </div>
                                                    </div> 
                                                </div> 
                                                <div class="form-section"> 
                                                    <div class="row"> 
                                                        <div class="col-md-6"> 
                                                            <div class="form-group"> 
                                                                <label for="fieldPhone">Phone</label> 
                                                                <input type="text" name="businessPhoneNo" class="form-control" id="fieldPhone" placeholder="(234)701 635-3712" value="<?php echo $businessPhoneNo?>"> 
                                                            </div> 
                                                            </div> 
                                                            <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                    <label for="fieldWebsite">Email</label> <input type="email" class="form-control" name="businessEmail" id="fieldEmail" placeholder="example@email.com" value="<?php echo $businessEmail?>"> 
                                                                </div> 
                                                            </div> 
                                                        
                                                        </div> 
                                                    </div> 
                                                    <div class="row"> 
                                                        <div class="col-md-12"> 
                                                            <div class="form-group"> 
                                                                <label for="fieldDesription">Desription</label> 
                                                                <textarea class="form-control" name="businessDescription" id="fieldDesription" rows="8"><?php echo $businessDescription?></textarea> 
                                                            </div> 
                                                        </div> 
                                                    </div> 
                                                    <div class="row"> 
                                                        <div class="col-md-6"> 
                                                            <div class="form-group"> 
                                                                <label for="inputAddress">Location</label> 
                                                                <input type="text" name="businessAddress" class="form-control" id="inputAddress" placeholder="e.g. street Name,City,State." value="<?php echo $businessAddress?>"> 
                                                            </div> 
                                                        </div>

                                                        <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                	<label for="inputAddress">Days Open</label>
                                                                    <input type="text" name="daysOpen" class="form-control" placeholder="e.g. Monday-Friday" value="<?php echo $daysOpen?>">            
                                                                </div> 
                                                        </div>
                                                    </div> 
                                                    <div class="row">
                                                        <div class="col-md-12 ">
                                                        	<div class="form-group">
                                                        		<button type="submit" name="update" class="btn btn-lg btn-danger btn-local-danger">Update Listing</button>
                                                        	</div>
                                                        </div>
                                                    </div>
                                                    <?php } } ?>	
                                                </form> 
                                            
                                            </div> 
                                        </div> 
                                    </div> 
                                </div> 