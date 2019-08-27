<?php session_start();
include_once "class.user.php";

$user_id = $_POST["user_id"];
//$email = "";

$user = new User();
$first_name = $user->protect_input($first_name, 'first_name');
$last_name = $user->protect_input($last_name, 'last_name');
$username = $user->protect_input($username, 'username');
$dob = $user->protect_input($dob, 'dob');
$email = $user->protect_input($email, 'email');
$user_role = $user->protect_input($user_role, 'user_role');
$user_status = $user->protect_input($user_status, 'user_status');

$data = array(
    'first_name'=>$first_name,
    'last_name'=>$last_name,
    'username'=>$username,
    'dob'=>$dob,
    'email'=>$email,
    'user_role'=>$user_role,
    'user_status'=>$user_status
);
$update = $user->update_where('users', $data, "WHERE user_id = '$user_id'");
?>