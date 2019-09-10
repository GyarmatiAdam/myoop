<?php
session_start();
include_once "../inc/class.user.php";
$user = new User();

$fk_user_id = $_POST['fk_user_id'];
$fk_group_id = $_POST['fk_group_id'];
global $connect;

$sql ="DELETE FROM grusers
WHERE fk_user_id = $fk_user_id
AND fk_group_id = $fk_group_id";

return mysqli_query($connect, $sql);
?>