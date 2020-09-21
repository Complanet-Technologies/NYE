   
                                        <div class="mainbar-body"> 
                                                    <div class="section-form section"> 
                                                        <div class="section-header"> 
                                                            <h2 class="title"> Edit Post </h2> 
                                                        </div> 
                                                        <div class="box-content"> 

                                                                      
                                        <?php 
                                        if (isset($_GET['p_id'])) {
                                            $the_posts_id = $_GET['p_id'];

                                            $query = "SELECT * FROM posts WHERE posts_id = '{$the_posts_id}'";
                                            $edit_query = mysqli_query($connection,$query);
                                            while($row = mysqli_fetch_assoc($edit_query)){
                                            $posts_id = $row['posts_id'];
                                            $posts_category_id = $row['posts_category_id'];
                                            $posts_title = $row['posts_title'];
                                            $posts_author = $row['posts_author'];
                                            $posts_date = $row['posts_date'];
                                            $posts_image = $row['posts_image'];
                                            $my_content = $row['my_content'];
                                            $posts_tag = $row['posts_tag'];
                                            $posts_comment_count = $row['posts_comment_count'];
                                            $posts_status = $row['posts_status'];
                                                # code...
                                        }

                                        }


                                    if (isset($_POST['edit_post'])) {
                                    $posts_title = $_POST['posts_title'];
                                    $posts_author = $_POST['posts_author'];
                                    $posts_image = $_FILES['image']['name'];
                                    $posts_temp_image = $_FILES['image']['tmp_name'];
                                    $my_content = $_POST['my_content'];
                                    $posts_tag = $_POST['posts_tag'];
                                    $posts_status = $_POST['posts_status'];

                                     move_uploaded_file( $posts_temp_image,"../assets/img/blog/$posts_image");
                                     if (empty($posts_image)) {
                                    $query = "SELECT * FROM posts WHERE posts_id = '{$the_posts_id}'";
                                    $select_image = mysqli_query($connection,$query);  
                                    while($row = mysqli_fetch_array($select_image)){
                                        $posts_image = $row['posts_image'];
                                    }
                                          # code...
                                    }

                                       // $query = "UPDATE posts SET ";
                                       // $query .= "posts_title = '{$posts_title}', ";
                                       // $query .= "posts_author = '{$posts_author}', ";
                                       // $query .= "posts_date = now(), ";
                                       // $query .= "posts_image = '{$posts_image}', ";
                                       // $query .= "posts_content = '{$posts_content}', ";
                                       // $query .= "posts_tag = '{$posts_tag}', ";
                                       // $query .= "posts_status = '{$posts_status}' ";
                                       // $query .= "WHERE posts_id = {$the_posts_id} ";

$query = mysqli_query($connection, "UPDATE posts SET posts_title = '$posts_title', posts_author = '$posts_author', posts_date = now(), posts_image = '$posts_image', posts_tag = '$posts_tag', posts_status = '$posts_status', my_content = '$my_content' WHERE posts_id = '$the_posts_id' ");
    // ,posts_author = '$posts_author',
    // posts_date = now(),posts_image = '$posts_image',posts_content 
    // = '$posts_content',posts_tag = '$posts_tag', posts_status = '$posts_status' WHERE posts_id = '$the_posts_id' ");

                                        // $update_query = mysqli_query($connection,$query);
                                        if (!$query) {
                                            echo $my_content."<br>";
                                            echo $posts_tag."<br>";
                                            echo $posts_author."<br>";
                                            echo $posts_image."<br>";
                                            echo $posts_status."<br>";
                                            echo $posts_title."<br>";
                                            echo $the_posts_id."<br>";
                                        die("Query Failed".mysqli_error($connection));
                                    }
                                    # code...
                                        }
                                    
                                        ?>




                                    <form action="" method="post" enctype="multipart/form-data"> 
                                        <div class="form-section"> 
                                            <div class="row"> 
                                                <div class="col-md-4"> 
                                                    <div class="form-group"> 
                                                        <label for="fieldListingName">Title</label> 
                                                        <input type="text" value="<?php echo "$posts_title"; ?>" class="form-control" pattern = "[a-z A-Z -]+" name="posts_title" placeholder="Your Listing name"> </div> 
                                                    </div> 
                                                    <div class="col-md-4"> 
                                                        <div class="form-group"> 
                                                            <label for="fieldCategory">Category</label> 
                                                            <select id="posts_category_id" class="form-control">
                                                             
                                                                 <?php 
                                                                 $query = "SELECT * FROM category ";
                                                                 $category_query = mysqli_query($connection,$query);
                                                                 while ($row = mysqli_fetch_assoc($category_query)) {
                                                                    $cat_id = $row['cat_id'];
                                                                    $cat_title = $row['cat_title'];

                                                                    echo "<option value = ''>{$cat_title}</option>";
                                                                     # code...
                                                                 }

                                                                 ?>
                                                            
                                                             
                                                            </select> 
                                                            </div> 
                                                            </div> 
                                                            <div class="col-md-4"> <div class="form-group"> 
                                                                <label for="fieldKeywords">Author</label>
                                                                <input type="text" value="<?php echo "$posts_author"; ?>" class="form-control" pattern = "[a-z A-Z -]+" name="posts_author" placeholder="Enter Keywords"> 
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
                                                                <input type="file" class="hidden" value="<?php echo "$posts_image"; ?>" name="image" id="input_file1"> 
                                                                <button type="button" class="btn btn-danger btn-lg btn-block btn-local-danger" data-inputype-file="input_file1">
                                                                    Browse Files
                                                                </button> 
                                                            </div> 
                                                        </div> 
                                                    </div> 
                                                </div>
                                                <div class="form-section"> 
                                                    <div class="row"> 
                                                        <div class="col-md-6"> 
                                                            <div class="form-group"> 
                                                                <label for="fieldPhone">Tag</label> 
                                                                <input type="text" value="<?php echo "$posts_tag"; ?>" class="form-control" pattern = "[a-z A-Z - ,]+" name="posts_tag" placeholder="tag"> </div> 
                                                            </div> 
                                                            <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                    <label for="fieldWebsite">Status</label> 
                                                                    <input type="text" value="<?php echo "$posts_status"; ?>" class="form-control" pattern = "[a-z A-Z -]+" name="posts_status" placeholder="//"> 
                                                                </div> 
                                                            </div> 
                                                        
                                                        </div> 
                                                    </div> 
                                                    <div class="row"> 
                                                        <div class="col-md-12"> 
                                                            <div class="form-group"> 
                                                                <label for="fieldDesription">Content</label> 
                                                                <textarea class="form-control" pattern = "[a-z A-Z -]+" name="my_content" rows="8">
                                                                <?php echo "$my_content"; ?>
                                                                </textarea> 
                                                            </div> 
                                                        </div> 
                                                    </div> 

                                                    <div class="form-section"> 
                                                    <div class="row"> 
                                                        <div class="col-md-6">   
                                                            <div class="form-group">
                                                                <input type="submit" pattern class="btn-btn-primary" name="edit_post" value="Edit post">
                                                            </div>
                                                </form>

                                            </div> 
                                        </div> 