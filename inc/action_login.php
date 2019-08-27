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
    $data = $user->check_all_credentials('users', 'email', $email);
    foreach($data as $row){
        $password = $row['pass'];
        $user_id = $row['user_id'];
        $status = $row['user_status'];
        $role = $row['user_role'];
     }

    //set privileges
    if( $check == 1 && $password == $passhash && $status == 'Active' && $role == 3 ) {
        $_SESSION["user"] = $user_id;
        header("Location: ../index.php");
    } 
    if( $check == 1 && $password == $passhash && $status == 'Active' && $role == 2 ) {
        $_SESSION["group_user"] = $user_id;
        header("Location: ../index.php");
    } 
    if( $check == 1 && $password == $passhash && $status == 'Active' && $role == 1 ) {
        $_SESSION["admin"] = $user_id;
        header("Location: ../admin.php");
    } 
    if( $check == 1 && $password == $passhash && $status == 'Active' ) {
        $_SESSION["loggedin"] = $user_id;
    } else {
        header("Location: ../login.php");
        echo "Incorrect email or password";
    }
 
}//$_POST close tag