<?php session_start();
include_once "class.user.php";

$user_id = $_POST["user_id"];
$email = "";

$user = new User();
$email = $user->protect_input($email, 'email');

$data = array(
    'email'=>$email
);
$update = $user->update_where('users', $data, "WHERE user_id = '$user_id'");
?>