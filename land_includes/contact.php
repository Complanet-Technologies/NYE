<?php

include "db_config.php";

if (isset($_POST['contact'])){
    
$namenye = $_POST['namenye'];
$email_addressnye = $_POST['email_addressnye'];
$subjectnye = $_POST['subjectnye'];
$messagenye = $_POST['messagenye'];
$to = "connect@nye.com";


// $header = 'MIME-Version: 1.0' . "\r\n";
// $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// $header .= 'From: ' . $namenye. ' <' . $email_addressnye .'> ' . "\r\n" . 
//         'Reply-To: '. $email_addressnye . "\r\n" .
//         'X-Mailer: PHP/' . phpversion();

        

function phpAlert($msg){
echo '<script type="text/javascript">alert("'.$msg .'")</script>';
  }

// if(mail($to,$subjectnye,$messagenye,$header)){

// phpAlert("Your message has been sent, we will get back to you soon!");

$stmt = $conn->prepare("INSERT INTO contactnye(name,email_address,subject,message) VALUES(?,?,?,?)");
$stmt->bind_param('ssss',$namenye,$email_addressnye,$subjectnye,$messagenye);
$stmt->execute() or die("Error!");
if ($stmt) {
	
	phpAlert("Submitted");
	echo "<script>location.href='contact.php'</script>";
}else{

	phpAlert("Not submitted");
}

// } 

// else{
// phpAlert("There was an error sending your message");
// }


}

?>