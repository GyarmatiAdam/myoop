<?php
session_start();

if (!isset($_SESSION['user'])) {
 header( "Location: login.php");
} 

if (isset($_GET['logout'])) {
 unset($_SESSION['user']);
 unset($_SESSION['group_user']);
 unset($_SESSION['admin']);
 unset($_SESSION['loggedin']);
 session_unset();
 session_destroy();
 header("Location: login.php");
 exit;
}
?>