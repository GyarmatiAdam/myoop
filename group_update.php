<?php 
include_once "inc/navbar.php";
    $group_id = $_GET["group_id"];
    $data = $user->check_all_credentials('groups', 'group_id', $group_id);
    $upload = $user->upload('groups', 'groups_pic', 'group_id', $group_id);
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
        <h1>Update group data:</h1>
        <?php foreach($data as $row){ ?>
            <div class="form" style="display: flex;">
                <img class="img-fluid" style="max-width:40%;" src="<?php if(!$row['groups_pic']){echo 'images/group.jpg';} else {echo 'images/'.$row['groups_pic'];}?>" />
                <form method="POST" action="" enctype="multipart/form-data" style="margin-left:2%;">
                    <div class="form-group">
                        <label>Upload image:</label><br>
                        <input type="file" name="file" /><br><br>
                        <input type="submit" onclick="document.location.reload(true);" value="Upload" name="upload" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <form method="POST" id="group_update" class="form">
                <div class="form-group">
                <label>Group name</label>
                    <input type="text" class="form-control" name="group_name" value="<?php echo $row['group_name']; ?>" required>
                </div>
                <div class="form-group">
                <label>Description</label>
                    <input rows="5" type="text" class="form-control" name="group_desc" value="<?php echo $row['group_desc']; ?>" required>
                </div>
                <div class="form-group">
                <label>Expected Group Member</label>
                    <input type="number" class="form-control" name="vacancy_number" value="<?php echo $row['vacancy_number']; ?>" required>
                </div>
                <div class="form-group">
                <label>Announcement</label>
                    <input rows="3" type="text" class="form-control" name="vacancy_desc" value="<?php echo $row['vacancy_desc']; ?>" required>
                    <input type="hidden" name="group_id" value="<?php echo $row['group_id']?>"/>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="create_group.php"><button type="button" class="btn btn-secondary">Back</button></a>
            </form>
            <?php }?>
        </div>
    </div>
</div>
<?php

include_once "inc/footer.php";
?>