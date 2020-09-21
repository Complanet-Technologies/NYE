<?php
$email = $_SESSION['email'];

$picturenye = $_SESSION['picturenye'];
$first_namenye = $_SESSION['first_namenye'];
$last_namenye = $_SESSION['last_namenye'];

$query_check = $conn->prepare("SELECT* FROM `usersnye` WHERE email_address =?");
$query_check->bind_param('s',$email);
$query_check->execute();
$result = $query_check->get_result();
$row = $result->fetch_array();
$status = $row['payment_status'];
$veri_status = $row['verification_status'];

?>