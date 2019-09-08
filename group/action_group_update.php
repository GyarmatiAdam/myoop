<?php session_start();
include_once "../inc/class.user.php";

$group_id = $_POST["group_id"];

$user = new User();
$group_name = $user->protect_input($group_name, 'group_name');
$group_desc = $user->protect_input($group_desc, 'group_desc');
$vacancy_number = $user->protect_input($vacancy_number, 'vacancy_number');
$vacancy_desc = $user->protect_input($vacancy_desc, 'vacancy_desc');

$data = array(
    'group_name'=>$group_name,
    'group_desc'=>$group_desc,
    'vacancy_number'=>$vacancy_number,
    'vacancy_desc'=>$vacancy_desc
);
$update = $user->update_where('groups', $data, "WHERE group_id = '$group_id'");
?>