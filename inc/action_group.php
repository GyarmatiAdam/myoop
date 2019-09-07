<?php
session_start();

if(isset($_SESSION['user'])!="") {
    header("Location: login.php");
    exit;
}
include_once "class.user.php";
$user = new User();

$group_name = $user->protect_input($group_name, 'group_name');
$group_desc = $user->protect_input($group_desc, 'group_desc');
$vacancy_number = $user->protect_input($vacancy_number, 'vacancy_number');
$vacancy_desc = $user->protect_input($vacancy_desc, 'vacancy_desc');
$check = $user->check_credentials('groups', 'group_name', $group_name);
//prevent from insertion if there is a match
if($check > 0){
    $error = "This group name already exists!";
}else{
    $form_data = array(
        'group_name'=>$group_name,
        'group_desc'=>$group_desc,
        'vacancy_number'=>$vacancy_number,
        'vacancy_desc'=>$vacancy_desc
    );
//insert into database
    $data = $user->insert_into('groups', $form_data);
}
?>