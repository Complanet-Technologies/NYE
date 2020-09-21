<?php

    include "db_config.php";

    function response($msg){
        echo '<script>alert("'.$msg.'")</script>';
    }

    $statusnye = 'not_paid';
    if(isset($_POST['signupnye'])){
        $first_namenye = $_POST['first_namenye'];
        $last_namenye = $_POST['last_namenye'];
        $email_addressnye = $_POST['email_addressnye'];
        $raw = (int)$_POST['phone_nonye'];
        $phone_nonye = '+234'.$raw;
        $passwordnye = $_POST['passwordnye'];
        $picturenye = $_FILES['picturenye']['name'];
        $tempnye = $_FILES['picturenye']['tmp_name'];
        $veri_status = 'not_verified';

        $protect_passwordnye = password_hash($passwordnye, PASSWORD_DEFAULT);

        $query_check = $conn->prepare("SELECT* FROM `usersnye` WHERE email_address=?");
        $query_check->bind_param('s',$email_addressnye);
        $query_check->execute();
        $result = $query_check->get_result();
        $row = $result->fetch_array();

        if(empty($row)){
            $query_check->close();
            move_uploaded_file($tempnye, "users/images/$picturenye");
            $query = $conn->prepare("INSERT INTO usersnye(`first_name`,`last_name`,`email_address`,`phone`,`password`,`image`,`payment_status`,`verification_status`) VALUES(?,?,?,?,?,?,?,?)");
            $query->bind_param("ssssssss",$first_namenye,$last_namenye,$email_addressnye,$phone_nonye,$protect_passwordnye,$picturenye,$statusnye,$veri_status);
            $query->execute();
            if($query){
                response("Success!");
                $query->close();
                session_start();
                $_SESSION['verify_email'] = $email_addressnye; 
                echo "<script>location.href='./users/verification.php'</script>";
            }else{
                response("Try again please!");
            }

        }else{
            response("Email address in use already!");
        }

    }



    // if(isset($_POST['signup_paynye'])){
    //     $first_namenye = $_POST['first_namenye'];
    //     $last_namenye = $_POST['last_namenye'];
    //     $email_addressnye = $_POST['email_addressnye'];
    //     $phone_nonye = '+234'.$_POST['phone_nonye'];
    //     $passwordnye = $_POST['passwordnye'];
    //     $picturenye = $_FILES['picturenye']['name'];
    //     $tempnye = $_FILES['picturenye']['tmp_name'];

    //     $protect_passwordnye = password_hash($passwordnye, PASSWORD_DEFAULT);

    //     $query_check = $conn->prepare("SELECT* FROM `usersnye` WHERE email_address=?");
    //     $query_check->bind_param('s',$email_addressnye);
    //     $query_check->execute();
    //     $result = $query_check->get_result();
    //     $row = $result->fetch_array();

    //     if(empty($row)){
    //         $query_check->close();
    //         move_uploaded_file($tempnye, "users/images/$picturenye");
    //         $query = $conn->prepare("INSERT INTO usersnye(`first_name`,`last_name`,`email_address`,`phone`,`password`,`image`,`payment_status`) VALUES(?,?,?,?,?,?,?)");
    //         $query->bind_param("sssssss",$first_namenye,$last_namenye,$email_addressnye,$phone_nonye,$protect_passwordnye,$picturenye,$statusnye);
    //         $query->execute();
    //         if($query){
    //             response("Redirecting...!");
    //             $query->close();
    //             session_start();
    //             $_SESSION['statusnye'] = 'paid';
    //             $_SESSION['pay_email'] = $email_addressnye;
    //             echo "<script>location.href='payment/initializenye.php'</script>";
    //             // echo "hmmssss";
    //         }else{
    //             response("Try again please!");
    //         }

    //     }else{
    //         response("Email address in use already!");
    //     }

    // }


?>