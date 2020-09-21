
                        <!-- /.top-bar --> 
                        <div class="mainbar-body"> 
                            <div class="section-form section"> 
                                <div class="section-header"> 
                                    <h2 class="title"> Add Business</h2> 
                                </div> 
                                <div class="box-content"> 

                                	<?php 

                                	 	if (isset($_POST['submit'])) {
                                	 		
                                	 			$businessName = $_POST['businessName'];
                                	 			// $businessCategory = $_POST['businessCategory'];
                                                $businessCategory = $_POST['businessCategory'];
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



												$query = "INSERT INTO `business`(`bus_name`, `bus_category`, `bus_email`, `bus_add`, `bus_image`, `bus_contact`, `business_descrip`, `open_days`, `bus_status`) ";

												$query .= "VALUES ('{$businessName}','{$businessCategory}','{$businessEmail}','{$businessAddress}','{$businessImage}','{$businessPhoneNo}','{$businessDescription}','{$daysOpen}','{$businessWebsite}','Unapproved') ";


												$result = mysqli_query($conn,$query);

												if (!$result) {

													die("Server unable to receive details submitted" . mysqli_error($conn));

												}else{

													echo "details submitted successfully";
												}


													}else{

														echo "incorrect file extension";
													}
										        }
										    }




                                	?>
                                    <form action="" method="post" enctype="multipart/form-data"> 
                                        <div class="form-section"> 
                                            <div class="row"> 
                                                <div class="col-md-7"> 
                                                    <div class="form-group"> 
                                                        <label for="fieldListingName">Listing Name</label> 
                                                        <input type="text" name="businessName" class="form-control" id="fieldListingName" placeholder="Your Listing name"> </div> 
                                                    </div> 
                                                    <div class="col-md-5"> 
                                                        <div class="form-group"> 
                                                            <label for="fieldCategory">Business Category</label> 
                                                            <select id="fieldCategory" name="businessCategory" class="form-control">
                                                                <option value='none'>Choose Your Business Category</option>
                                                            <?php
                                                                $query = "SELECT * FROM business_category";
                                                                $select_cat_query = mysqli_query($conn,$query);

                                                                while ($row = mysqli_fetch_assoc($select_cat_query)) {
                                                                    // $cat_id = $row['cat_id'];
                                                                    $category = $row['category'];

                                                            
                                                            	echo "
                                                                        <option value='$category'>$category</option>  

                                                                    ";
                                                            	
                                                                }
                                                            ?>

                                                            </select> 
                                                        </div> 
                                                    </div> 
                                                    <!-- <div class="col-md-4"> 
                                                    	<div class="form-group"> 
                                                            <label for="fieldKeywords">Keywords 
                                                                <span class="option">(optional)</span>
                                                            </label> 
                                                                <input type="text" class="form-control" id="fieldKeywords" placeholder="Enter Keywords"> 
                                                            </div> 
                                                        </div> --> 
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
                                                                <input type="text" name="businessPhoneNo" class="form-control" id="fieldPhone" placeholder="(234)701 635-3712"> </div> 
                                                            </div> 
                                                            <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                    <label for="fieldWebsite">Email</label> <input type="email" class="form-control" name="businessEmail" id="fieldEmail" placeholder="example@email.com"> 
                                                                </div> 
                                                            </div> 
                                                        
                                                        </div> 
                                                    </div> 
                                                    <div class="row"> 
                                                        <div class="col-md-12"> 
                                                            <div class="form-group"> 
                                                                <label for="fieldDesription">Desription</label> 
                                                                <h5>Note: Make your business description as short as possible.</h5>
                                                                <textarea class="form-control" name="businessDescription" id="fieldDesription" cols="3" rows="4"></textarea> 
                                                            </div> 
                                                        </div> 
                                                    </div> 
                                                    <div class="row"> 
                                                        <div class="col-md-6"> 
                                                            <div class="form-group"> 
                                                                <label for="inputAddress">Location</label> 
                                                                <input type="text" name="businessAddress" class="form-control" id="inputAddress" placeholder="e.g. street Name,City,State."> 
                                                            </div> 
                                                        </div>

                                                        <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                	<label for="inputAddress">Days Open</label>
                                                                    <input type="text" name="daysOpen" class="form-control" placeholder="e.g. Monday-Friday">            
                                                                </div> 
                                                        </div>
                                                    </div> 
                                                    <div class="row">
                                                        <div class="col-md-12 ">
                                                        	<div class="form-group">
                                                        		<button type="submit" name="submit" class="btn btn-lg btn-danger btn-local-danger">Add Listings</button>
                                                        	</div>
                                                        </div>
                                                    </div>	
                                                </form> 
                                            </div> 
                                        </div> 
                                        <!-- <div class="section-form section"> 
                                            <div class="section-header"> 
                                                <h2 class="title"> Location </h2> 
                                            </div> 
                                            <div class="box-content"> 
                                                <form> 
                                                    <div class="row"> 
                                                        <div class="col-md-6"> 
                                                            <div class="form-group"> 
                                                                <label for="inputAddress">Location</label> <input type="text" class="form-control" id="inputAddress" placeholder="e.g. New York"> 
                                                            </div> 
                                                            </div> 
                                                            <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                    <label for="inputGps">GPS 
                                                                        <span class="option">(optional)</span>
                                                                    </label> 
                                                                    <input type="text" class="form-control" id="inputGps" placeholder="Enter Here"> 
                                                                </div> 
                                                            </div> 
                                                            <div class="col-md-12"> 
                                                                <div class="property-map" id="mapsAddress">

                                                                </div> 
                                                            </div> 
                                                        </div> l
                                                    </form> 
                                                </div> 
                                            </div>  -->
                                            <!-- <div class="section-form section"> 
                                                <div class="section-header"> 
                                                    <h2 class="title"> Open Hours </h2> 
                                                </div> <div class="box-content"> 
                                                    <form> <div class="form-group-in"> 
                                                        <label>Monday</label> 
                                                        <div class="row"> 
                                                            <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                    <input type="text" class="form-control" placeholder="Open"> 
                                                                </div> 
                                                            </div> 
                                                            <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                    <input type="text" class="form-control" placeholder="Close"> 
                                                                </div> 
                                                            </div> 
                                                        </div> 
                                                    </div> 
                                                    <div class="form-group-in"> 
                                                        <label>Tuesday</label> 
                                                        <div class="row"> 
                                                            <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                    <input type="text" class="form-control" placeholder="Open"> 
                                                                </div> 
                                                            </div> 
                                                            <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                    <input type="text" class="form-control" placeholder="Close"> 
                                                                </div> 
                                                            </div> 
                                                        </div> 
                                                    </div> 
                                                    <div class="form-group-in"> 
                                                        <label>Wednesday</label> 
                                                        <div class="row"> 
                                                            <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                    <input type="text" class="form-control" placeholder="Open"> 
                                                                </div> 
                                                            </div> 
                                                            <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                    <input type="text" class="form-control" placeholder="Close"> 
                                                                </div> 
                                                            </div> 
                                                        </div> 
                                                    </div> 
                                                    <div class="form-group-in"> 
                                                        <label>Thursday</label> 
                                                        <div class="row"> 
                                                            <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                    <input type="text" class="form-control" placeholder="Open"> 
                                                                </div> 
                                                            </div> 
                                                            <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                    <input type="text" class="form-control" placeholder="Close"> 
                                                                </div> 
                                                            </div> 
                                                        </div> 
                                                    </div> 
                                                    <div class="form-group-in"> 
                                                        <label>Friday</label> 
                                                        <div class="row"> 
                                                            <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                    <input type="text" class="form-control" placeholder="Open"> 
                                                                </div> 
                                                            </div> 
                                                            <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                    <input type="text" class="form-control" placeholder="Close"> 
                                                                </div> 
                                                            </div> 
                                                        </div> 
                                                    </div> 
                                                    <div class="form-group-in"> 
                                                        <label>Saturday</label> 
                                                        <div class="row"> 
                                                            <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                    <input type="text" class="form-control" placeholder="Open"> 
                                                                </div> 
                                                            </div> 
                                                            <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                    <input type="text" class="form-control" placeholder="Close"> 
                                                                </div> 
                                                            </div> 
                                                        </div> 
                                                    </div> 
                                                    <div class="form-group-in"> 
                                                        <label>Sunday</label> 
                                                        <div class="row"> 
                                                            <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                    <input type="text" class="form-control" placeholder="Open"> 
                                                                </div> 
                                                            </div> 
                                                            <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                    <input type="text" class="form-control" placeholder="Close"> 
                                                                </div> 
                                                            </div> 
                                                        </div> 
                                                    </div> 
                                                </form> 
                                            </div> 
                                        </div>  -->
                                    </div> 
                                </div> 