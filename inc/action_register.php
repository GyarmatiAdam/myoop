<?php
session_start();

if(isset($_SESSION['user'])!="") {
    header("Location: login.php");
    exit;
}
include_once "class.user.php";
$user = new User();

$first_name = $user->protect_input($first_name, 'first_name');
$last_name = $user->protect_input($last_name, 'last_name');
$username = $user->protect_input($username, 'username');
$dob = $user->protect_input($dob, 'dob');
$email = $user->protect_input($email, 'email');
$check = $user->check_credentials('users', 'email', $email);
$pass =$user->protect_input($pass, 'pass');
    $passhash = hash('sha256', $pass);
//prevent from insertion if there is a match
if($check > 0){
    $error = "This email already exists!";
}else{
    $form_data = array(
        'email'=>$email,
        'pass'=>$passhash,
        'first_name'=>$first_name,
        'last_name'=>$last_name,
        'username'=>$username,
        'dob'=>$dob,
        'user_role'=>3,
        'user_status'=>'Active'
    );
//insert into database
    $data = $user->insert_into('users', $form_data);
}
?>