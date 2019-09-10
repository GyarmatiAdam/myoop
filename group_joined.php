<?php 
include_once "inc/navbar.php";
    $group_id = $_GET["group_id"];
    $group = $user->check_all_credentials('groups', 'group_id', $group_id);
    $member = $user->check_all_credentials('grusers', 'fk_group_id', $group_id);
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
        <?php foreach($group as $group_row){ ?>
            <marquee><h1>We are <?php echo $group_row['group_name']; ?></h1></marquee>
            <div class="form">
                <img class="img-fluid" style="max-width:30%;" src="<?php if(!$group_row['groups_pic']){echo 'images/group.jpg';} else {echo 'images/'.$group_row['groups_pic'];}?>" />
                <h3 style="float:right;"><?php echo $group_row['group_desc']; ?></h3>
            </div>
        <?php }?>
        <?php foreach($member as $member_row){ ?>
            <div class="form">
                <p>(<?php echo $member_row['gruser_role']; ?>)</p>
            </div>
        <?php }?>
        </div>
    </div>
</div>
<?php

include_once "inc/footer.php";
?>