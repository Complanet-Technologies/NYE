<?php 
 function response($msg){
    echo '<script>alert("'.$msg.'")</script>';
}
$email = $_SESSION['email'];
if(isset($_POST['update'])){
    $first_namenye = $_POST['first_namenye'];
    $last_namenye = $_POST['last_namenye'];
    $phone_nonye = $_POST['phone_nonye'];
    $picturenye = $_FILES['user_image']['name'];
    $temp = $_FILES['user_image']['tmp_name'];
    $update_query = $conn->prepare("UPDATE usersnye SET first_name=?,last_name=?,phone=? WHERE email_address=?");
    $update_query->bind_param('ssss',$first_namenye,$last_namenye,$phone_nonye,$email);
    $result = $update_query->execute();
   
    if($picturenye != ''){
    $update_photo = $conn->prepare("UPDATE usersnye SET `image`=? WHERE email_address =?");
    $update_photo->bind_param('ss',$picturenye,$email);
    $update_photo->execute();
    move_uploaded_file($temp,"images/$picturenye");
    $update_photo->close();
    }
    if($result){
        response("Update Successful!");
        echo "<script>location.href='profile.php'</script>";
        // $result->close();
    }else{
        response("There was an error, please try again");
    }
}
//checking if the change button for password is clicked
if(isset($_POST['change'])){

    $old_passwordnye = $_POST['old_passwordnye'];
    $new_passwordnye = $_POST['new_passwordnye'];
    $password_confirmnye = $_POST['password_confirmnye'];
    $pass_check = $conn->prepare("SELECT* FROM `usersnye` WHERE email_address=?");
    $pass_check->bind_param('s',$email);
    $pass_check->execute();
    $result = $pass_check->get_result();
    $row = $result->fetch_array();
    $dbold_passwordnye = $row['password'];
    if(password_verify($old_passwordnye,$dbold_passwordnye)){

    //if user enters an already used password
    if(password_verify($new_passwordnye,$dbold_passwordnye)){
        response("You can't use the same password you used before");
    } else{
    //checking if new passwords correlates with confirmation password
    if($new_passwordnye == $password_confirmnye){
    $hash_newnye = password_hash($new_passwordnye,PASSWORD_DEFAULT);
    $update_query = $conn->prepare("UPDATE usersnye SET `password`=? WHERE email_address=?");
    $update_query->bind_param('ss',$hash_newnye,$email);
    $result = $update_query->execute();
    if($result){
        response("Password successfully changed!");
    }else{
        response("Something went wrong, please try later");
    }
    }else{
        response("Password Mismatch");
    }
    }


    }else{
        response("Wrong Password");
    }
    
}

?>