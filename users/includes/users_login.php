<?php
include "db_config.php";
function response($msg){
    echo '<script>alert("'.$msg.'")</script>';
}
session_start();
// if(isset($_SESSION['statusnye']) && isset($_SESSION['pay_email'])){
//     $statusnye = $_SESSION['statusnye'];
//     $pay_email = $_SESSION['pay_email'];
//     $update_status = $conn->prepare("UPDATE usersnye SET payment_status=? WHERE email_addressnye =?");
//     $update_status->bind_param('ss',$statusnye,$pay_email);
//     $status_result = $update_status->execute();
// }
if(isset($_POST['nye_login'])){
    $email = $_POST['email_addressnye'];
    $passwordnye = $_POST['passwordnye'];
    $protect_passwordnye = password_hash($passwordnye, PASSWORD_DEFAULT);
        $query_check = $conn->prepare("SELECT* FROM `usersnye` WHERE email_address =?");
        $query_check->bind_param('s',$email);
        $query_check->execute();
        $result = $query_check->get_result();
        $row = $result->fetch_array();
        if(!empty($row)){
        $db_email = $row['email_address'];
        $pass = $row['password'];
        if($email == $db_email){
            // password_verify($passwordnye, $pass)
            // $passwordnye == $pass
            if(password_verify($passwordnye, $pass)){              
                $_SESSION['first_namenye'] = $row['first_name'];
                $_SESSION['last_namenye'] = $row['last_name'];
                $_SESSION['phone_nonye'] = $row['phone'];
                $_SESSION['picturenye'] = $row['image'];
                $_SESSION['email'] = $row['email_address'];
         
                header("Location:./users/index.php?".$_SESSION['first_namenye'].$_SESSION['last_namenye']);
            }else{
                response("Inavalid login");         
            }

        }else{
            response("Invalid login");
        }
    }else{
        response("Invalid login");
    }
        
}

?>