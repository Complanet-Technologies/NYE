<?php
$db_namenye = 'nye';
$db_usernamenye = 'root';
$db_hostnye = 'localhost';
$db_passwordnye = '';

$connectionnye = mysqli_connect($db_hostnye,$db_usernamenye,$db_passwordnye,$db_namenye);

if(!$connectionnye){
    echo "Connection failed!";
}
?>