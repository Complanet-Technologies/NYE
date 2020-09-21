  <?php

    $dbhost = 'localhost';
    $dbun = 'lynkus';
    $dbpass = 'Lynk/*2020*/';
    $dbname = 'lynkus_lynkus';

    if (isset($_POST['submit'])){
        
    $name = $_POST['name'];
    $emailadd = $_POST['emailadd'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $to = "connect@lynkus.xyz";
    
    
    $header = 'MIME-Version: 1.0' . "\r\n";
    $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $header .= 'From: ' . $name. ' <' . $emailadd .'> ' . "\r\n" . 
            'Reply-To: '. $emailadd . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
    
            
    
    function phpAlert($msg){
   echo '<script type="text/javascript">alert("'.$msg .'")</script>';
      }

    if(mail($to,$subject,$message,$header)){
    ?>

        <?php
   
phpAlert("Your message has been sent, we will get back to you soon!");
    ?>
<?php
} else{
    phpAlert("There was an error sending your message");
}

    $conn = mysqli_connect($dbhost, $dbun, $dbpass, $dbname);
    mysqli_query($conn, "INSERT INTO `contact`(name, emailadd, subject,message) VALUES('$name', '$emailadd', '$subject','$message')") or die(mysqli_error($conn));
}

  ?>