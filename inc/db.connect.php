<?php
$host = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "mymvc"; 

$connect = new  mysqli($host, $username, $password, $dbname); 

if($connect->connect_error) {
    die("connection failed: " . $connect->connect_error);
} else {
    //echo "Successfully Connected";
}
?>