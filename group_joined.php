<?php 
include_once "inc/navbar.php";
    $group_id = $_GET["group_id"];
    $loggedin_id= $loggedin_row['user_id'];
    $group = $user->check_all_credentials('groups', 'group_id', $group_id);
    $grusers = $user->check_all_credentials('grusers', 'fk_group_id', $group_id);
        foreach($grusers as $gruser_row){
            $fk_user_id = $gruser_row['fk_user_id']; 
        }

    $users = $user->check_all_credentials('users', 'user_id', $fk_user_id);
        foreach($users as $user_row){
            $username = $user_row['username'];
        }
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
        <?php foreach($group as $group_row){ ?>
            <marquee><h1>We are <?php echo $group_row['group_name']; ?></h1></marquee>
            <?php if($loggedin_id !== $fk_user_id){ ?>
                <form method="POST" id="joinForm">
                    <input type="hidden"  name="fk_group_id" value="<?php echo $group_id ?>">
                    <input type="hidden"  name="fk_user_id" value="<?php echo $loggedin_id ?>">
                    <button type="submit" class="btn-block btn btn-primary">I want to JOIN this group</button>
                </form>
            <?php } else{?>
                <form method="POST" id="leaveGroup">
                    <input type="hidden"  name="fk_group_id" value="<?php echo $group_id ?>">
                    <input type="hidden"  name="fk_user_id" value="<?php echo $loggedin_id ?>">
                    <button type="submit" class="btn-block btn btn-danger">I want to Leave this group</button>
                </form>
            <?php } ?>
            <div class="form text-center">
                <p><img class="img-fluid rounded" src="<?php if(!$group_row['groups_pic']){echo 'images/group.jpg';} else {echo 'images/'.$group_row['groups_pic'];}?>" /></p>
            </div>
            <div class="form">
                <h6 class="text-justify"><?php echo $group_row['group_desc']; ?></h6>
            </div>
        <?php }?>
        <?php if($loggedin_id == $fk_user_id){ ?>
            <div class="form">
                <button class="btn-block btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseMember">Members</button>
                <div class="collapse" id="collapseMember">
                    <div class="card card-body">
                        <p><?php echo $username; ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</div>
<?php

include_once "inc/footer.php";
?>