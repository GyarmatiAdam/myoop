<?php
session_start();
include_once "../inc/class.user.php";
$user = new User();

$fk_user_id = $_POST['fk_user_id'];
$fk_cat_id = $_POST['fk_cat_id'];
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
        'fk_cat_id'=>$fk_cat_id,
        'group_desc'=>$group_desc,
        'vacancy_number'=>$vacancy_number,
        'vacancy_desc'=>$vacancy_desc
    );

    $data = $user->insert_into('groups', $form_data);
} 

    $group = $user->check_all_credentials('groups', 'group_name', $group_name);
    foreach($group as $group_row){
        $fk_group_id = $group_row['group_id'];
    }
    $gruser_data = array(
        'fk_group_id'=>$fk_group_id,
        'fk_user_id'=>$fk_user_id,
        'gruser_role'=>'Group admin',
        'gruser_status'=>'verified'
    );

    $gruser_data = $user->insert_into('grusers', $gruser_data);
?>