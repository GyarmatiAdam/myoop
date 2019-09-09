<?php session_start();

if(isset($_POST["cat_id"]))
{
 foreach($_POST["cat_id"] as $cat_id)
 {
    include_once "../inc/class.user.php";
    $user = new User();
    $delete_events = $user->delete_from('events', 'fk_cat_id', $cat_id);
    $delete_groups = $user->delete_from('groups', 'fk_cat_id', $cat_id);
    $delete_categories = $user->delete_from('categories', 'cat_id', $cat_id);
 }    
}
?>