<?php

    include "db.php";

    function response($msg){
        echo '<script>alert("'.$msg.'")</script>';
    }

    if(isset($_POST['signupnye'])){
        $first_namenye = $_POST['first_namenye'];
        $last_namenye = $_POST['last_namenye'];
        $email_addressnye = $_POST['email_addressnye'];
        $phone_nonye = $_POST['phone_nonye'];
        $passwordnye = $_POST['passwordnye'];
        $picturenye = $_FILES['picturenye']['name'];
        $tempnye = $_FILES['picturenye']['tmp_name'];

        $protect_passwordnye = md5($passwordnye);

        $query_check = "SELECT* FROM `nye_users` WHERE email_addressnye = '$email_addressnye'";
        $query = mysqli_query($connectionnye, $query_check);
        $row = mysqli_fetch_array($query);

        if(empty($row)){

            move_uploaded_file($tempnye, "images/users/$picturenye");
            $query = $connectionnye->prepare("INSERT INTO nye_users(first_namenye,last_namenye,email_addressnye,phone_nonye,passwordnye,picturenye) VALUES(?,?,?,?,?,?)");
            $query->bind_param("ssssss",$first_namenye,$last_namenye,$email_addressnye,$phone_nonye,$protect_passwordnye,$picturenye);
            $query->execute();
            if($query){
                response("Success!");
                $query->close();
                echo "<script>location.href='../login.php'</script>";
            }else{
                response("Try again please!");
            }

        }else{
            response("Email address in use already!");
        }

    }


?>