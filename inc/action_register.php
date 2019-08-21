<?php
include_once "class.user.php";

$user = new User();
$email = $_POST['email'];
$pass = $_POST['pass'];

$form_data = array(
    'email'=>$email,
    'pass'=>$pass
);

$data = $user->insert_into('users', $form_data);

?>