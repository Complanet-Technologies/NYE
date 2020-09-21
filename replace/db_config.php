<?php

$db['host'] = "localhost";
$db['user'] = "root";
$db['pass'] = "";
$db['name'] = "nye";

foreach ($db as $key => $value) {

	define(strtoupper($key), $value);

}


$conn = mysqli_connect(HOST,USER,PASS,NAME);

if (!$conn) {
	
	die("QUERY FAILED" . mysqli_error($conn));
}


?>