<?php
session_start();

if(isset($_SESSION['user'])!="") {
    header("Location: login.php");
    exit;
}
include_once "class.user.php";
$user = new User();

//trim + strip_tag + htmlspecialchar
$email = $user->protect_input($email, 'email');
//compare imput with database
$check = $user->check_credentials('users', 'email', $email);
//hash password
$pass =$user->protect_input($pass, 'pass');
    $passhash = hash('sha256', $pass);
//prevent from insertion if there is a match
if($check > 0){
    $error = "This email is already exists!";
}else{
    $form_data = array(
        'email'=>$email,
        'pass'=>$passhash
    );
//insert into database
    $data = $user->insert_into('users', $form_data);
}
?>