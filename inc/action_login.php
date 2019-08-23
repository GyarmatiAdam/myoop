<?php session_start();
include_once "class.user.php";

$user = new User();

if(isset($_POST['submit'])) {

    //set variables empty to avoid header error
    $email ="";
    $pass ="";
    //protect from malicious insertation
    $email = $user->protect_input($email, 'email');
    $pass = $user->protect_input($pass, 'pass');
        $passhash = hash('sha256', $pass);

    //check if data is already in database
    $check = $user->check_credentials('users', 'email', $email);
    $data = $user->check_more_credentials('users', 'email', 'pass', 'user_id', $email);
    foreach($data as $row){
        $password = $row['pass'];
        $user = $row['user_id'];
     }

    if( $check == 1 && $password == $passhash ) {
        $_SESSION["user"] = $user;
        header("Location: ../index.php");
    } else {
        echo "Incorrect email or password";
    }
 
}//$_POST close tag