<?php
session_start();
// $_SESSION['email_verify'] = 'israelakinakinsanya@gmail.com';
if(isset($_SESSION['email'])){
$verify_email = $_SESSION['email'];
?>
<html>
    <head>
        <title>NYE Email Verification</title>
        <style>
            body{
                background:#F2F3F4;
            }
            .container{
                margin:auto;
                margin-top:40px;
                background:#E5E8E8;
                padding:30px;
                height:500px;
                width:80%;
            }
            .inner{
                margin:auto;
                padding:30px;
                height:90%;
                background:#EAEDED;
                text-align:center;
            }
            .nye{
                text-align:center;
                font-weight:bold;
                font-size:32px;
            }
            .image{
                font-size:15px;
                /* width:20%; */
                height:30px;
            }
            .appre{
                text-align:center;
            }
            .thanks{
                font-size:30px;
            }
            .sp{
                font-size:20px;
            }
            .you{
                color:#B367FF;
            }
            form{
                margin:auto;
                width:300px;
                height:100px;
                border:1px solid white;
                margin-top:50px;
                border-radius:5px;
                box-shadow:0px 0px 5px 5px grey;
            }
            .email{
                width: 100%;
                height:60%;
                text-align:center;
                border:0px;
            }
            .button{
                background:#B367FF;
                border:0px;
                width:100%;
                height:40%;
            }
            .error,.check{
                margin:auto;
                color:red;
                font-family:verdana;
                text-align:center;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="inner">
                <span class="nye"><img class="image" src="" alt="NYE logo"> NYE</span>
                <p class="appre">
                    <span class="thanks">Thanks for joining us!</span><br><br>
                    <span class="sp">
                        Please verify your email to have<br>
                         full control over your account, <br><span class="you">Thank You!</span>
                    </span>
                </p>
        <form method="POST">
            <input class="email" type="email" value="<?php echo $verify_email?>" name = "email" placeholder = "Your email address">
            <br>
            <input class="button" type="submit" name="verify" value="Verify Email">
        </form>
        

<?php
include "../db_config.php";



if (isset($_POST['verify'])){
    
$namenye = 'NACIMMA YOUTH ENTERPRENEUR (NYE)';
$email_addressnye = $_POST['email'];
$from = 'no-reply@nye.com';
$subjectnye = 'NYE Support';
$messagenye = "Hello! We are glad to know you joined our community.
You however need to take a step further, kindly activate your account using the link below

https://www.nye.com/verify.php?email='.$email_addressnye.'";

$messagenye.= 'Do ignore if you were not expecting this email'."<br>";
$to = $email_addressnye;
$header = 'MIME-Version: 1.0' . "\r\n";
$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$header .= 'From: ' . $namenye. ' <' . $from .'> ' . "\r\n" . 
        'Reply-To: '. $email_addressnye . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        

 function phpAlert($msg){
echo '<script type="text/javascript">alert("'.$msg .'")</script>'; 
    }

if(mail($to,$subjectnye,$messagenye,$header)){ ?>

<h3 class = "check">
 <?php 
echo "Check your email to verify";
?>
</h3>
 <?php 
 } 

 else{
   ?>

 <h4 class="error">
 <?php 
 die("Verification failed, try again please.".mysqli_error($conn));
 ?>
<h4>
</div>
        </div>
    </body>
</html>
<?php 
 }


 }

}else{
    echo "<script>location.href='../index.php'</script>";
}

?>