<?php
include_once "../inc/class.user.php";
header('Location: ../index.php');
$user = new User();
$cat_type = $user->protect_input($cat_type, 'cat_type');
$categories_pic = $_FILES['file']['name'];

if(isset($_POST['uploadBy'])){
    if(!$categories_pic){
        $data = array(
            'cat_type'=>$cat_type
        );

        $insert= $user->insert_into('categories',$data);
    }else{
        $form_data = array(
            'cat_type'=>$cat_type,
            'categories_pic'=>$categories_pic
        );

        $upload = $user->uploadBy('categories', $form_data);
    }
}

?>