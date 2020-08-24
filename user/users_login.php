<?php
include "db.php";
function response($msg){
    echo '<script>alert("'.$msg.'")</script>';
}
session_start();
if(isset($_POST['nye_login'])){
    $_SESSION['email'] = $_POST['email_addressnye'];
    $email = $_SESSION['email'];
    $passwordnye = $_POST['passwordnye'];

    $protect_passwordnye = md5($passwordnye);

        $query_check = "SELECT* FROM `nye_users` WHERE email_addressnye = '$email'";
        $query = mysqli_query($connectionnye, $query_check);
        $row = mysqli_fetch_array($query);
        $db_email = $row['email_addressnye'];
        $pass = $row['passwordnye'];
        if($email == $db_email){

            if($protect_passwordnye == $pass){
                echo "<script>location.href='dashtest.php'</script>";
                $_SESSION['first_namenye'] = $row['first_namenye'];
                $_SESSION['last_namenye'] = $row['last_namenye'];
                $_SESSION['phone_nonye'] = $row['phone_nonye'];
                $_SESSION['picturenye'] = $row['picturenye'];

                $query_business = "SELECT* FROM `businessesnye` WHERE email_addressnye = '$email'";
                $result = mysqli_query($connectionnye, $query_check);
                $result_row = mysqli_fetch_array($query);
                if(empty($result_row)){
                    echo "You have no registered business";
                }else{
                    $_SESSION['business_namenye'] = $result_row['business_namenye'];
                    $_SESSION['categorynye'] = $result_row['categorynye'];
                    $_SESSION['locationnye'] = $result_row['locationnye'];
                    $_SESSION['hotlinenye'] = $result_row['hotlinenye'];
                    $_SESSION['display_picturenye'] = $result_row['display_picturenye'];
                }
            }else{
                response("Inavalid login");
                
            }

        }else{
            response("Invalid login");
        }
        
}

?>