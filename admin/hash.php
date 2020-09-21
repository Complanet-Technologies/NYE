<?php

$pass = 'akin';

       $hashed =  password_hash($pass,PASSWORD_DEFAULT);



        echo 'Hashed = '.$hashed;

?>