<?php session_start();
include_once "class.user.php";

if ($_GET["user_id"]) {
    $user_id = $_GET['user_id'];
$user = new User();
$delete = $user->delete_from('users', 'user_id', $user_id);
header('Location: ../admin.php');
}
?>