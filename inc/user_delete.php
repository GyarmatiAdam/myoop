<?php session_start();

if(isset($_POST["user_id"]))
{
 foreach($_POST["user_id"] as $user_id)
 {
    include_once "class.user.php";
    $user = new User();
    $delete = $user->delete_from('users', 'user_id', $user_id);
 }    
}
?>