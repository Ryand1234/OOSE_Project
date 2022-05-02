<?php

//PRODUCTION
define('DB_USER', 'root');
define('DB_HOST', 'localhost');
define('DB_PASS', 'Riyan1234@');
define('DB_NAME', 'world');

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if($connection == false){
    die("Service Temporarily Unavailable");
}

?>