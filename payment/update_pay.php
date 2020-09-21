<?php
include "../db_config.php";
function response($msg){
    echo '<script>alert("'.$msg.'")</script>';
}
session_start();
if(isset($_SESSION['statusnye']) && isset($_SESSION['email'])){
    $statusnye = $_SESSION['statusnye'];
    $pay_email = $_SESSION['email'];
    $update_status = $conn->prepare("UPDATE usersnye SET payment_status=? WHERE email_address =?");
    $update_status->bind_param('ss',$statusnye,$pay_email);
    $status_result = $update_status->execute();
    echo "<script>location.href='../users/indextest.php'</script>";
}