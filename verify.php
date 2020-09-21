<?php
include "./db_config.php";
$email = $_GET['email'];
$_SESSION['email_verify'] = $email;
$verified = 'verified';
$update_query = $conn->prepare("UPDATE usersnye SET verification_status=? WHERE email_address=?");
$update_query->bind_param('ss',$verified,$email);
$result = $update_query->execute();
if($result){
    echo "<script>alert('Your verificaton is successful')</script>";
    echo "<script>location.href='./login.php'</script>";
}else{
    echo "<script>alert('Your verificaton failed, please try again')</script>";
    echo "<script>location.href='./users/verification.php'</script>";
}
?>