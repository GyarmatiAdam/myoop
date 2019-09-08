<?php session_start();

if(isset($_POST["group_id"]))
{
 foreach($_POST["group_id"] as $group_id)
 {
    include_once "../inc/class.user.php";
    $user = new User();
    $delete_comments = $user->delete_from('comments', 'fk_group_id', $group_id);
    $delete_group_users = $user->delete_from('grusers', 'fk_group_id', $group_id);
    $delete_chats = $user->delete_from('chats', 'fk_group_id', $group_id);
    $delete_groups = $user->delete_from('groups', 'group_id', $group_id);
 }    
}
?>