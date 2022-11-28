<?php

define('DB_HOST', 'db');
define('DB_USER', 'lamp_docker');
define('DB_PASS', 'password');
define('DB_NAME', 'lamp_docker');

$connect = new mysqli(DB_HOST, DB_USER,DB_PASS, DB_NAME);

if($connect->connect_error){
    die('connection failed'. $connect->connect_error);
}

?>