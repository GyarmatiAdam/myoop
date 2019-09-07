<?php
include_once "inc/navbar.php";
$data = $user->select_from('groups');
?>
<div class="container" style="margin-top:5rem">
    <div class="row">
        <div class="col-sm-1">
            
        </div>
        <div class="col-sm-10">
        <h2>My groups:</h2>
            <div class="d-flex flex-wrap justify-content-center">
                <?php foreach($data as $row){  ?> 
                    <div id="group_card" class="card" style="width: 15rem;" id="<?php echo $row["group_id"]; ?>">
                    <img class="card-img-top" src="<?php if(!$row['groups_pic']){echo 'images/group.jpg';} else {echo 'images/'.$row['groups_pic'];}?>" />
                        <div class="card-body">
                            <h5 class="text-center card-title"><?php echo $row['group_name'];?></h5>
                            <!-- <small>Choose to delete: </small><input type="checkbox" name="group_id" value="<?php echo $row["group_id"]; ?>"> -->
                            <?php echo "<a href='group_update.php?group_id=" .$row['group_id']."'><button class='btn-block btn btn-warning' type='button'>Edit Group</button></a>"; ?>
                        </div>
                    </div>
                <?php
                };//foreach close tag
                ?>
            </div>
            <h1>Create new group:</h1>
            <form method="POST" id="GroupForm" class="form">
                <div class="form-group">
                    <input type="text" class="form-control" name="group_name" placeholder="Group name" required>
                </div>
                <div class="form-group">
                    <textarea rows="5" type="text" class="form-control" name="group_desc" placeholder="Description" required></textarea>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="vacancy_number" placeholder="Numbers of Member" required>
                </div>
                <div class="form-group">
                    <textarea rows="3" type="text" class="form-control" name="vacancy_desc" placeholder="Invitation" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Group</button>
            </form>
            
        </div>
        <div class="col-sm-1">

        </div>
    </div>
</div><br>
<?php
include_once "inc/footer.php";
?>