<?php
session_start();
include_once "../inc/class.user.php";
$user = new User();

$fk_user_id = $_POST['fk_user_id'];
$fk_group_id = $_POST['fk_group_id'];

$gruser_data = array(
        'fk_group_id'=>$fk_group_id,
        'fk_user_id'=>$fk_user_id,
        'gruser_role'=>'Member',
        'gruser_status'=>'verified'
);

    $gruser_data = $user->insert_into('grusers', $gruser_data);
?>