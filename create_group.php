<?php
include_once "inc/navbar.php";
$data = $user->select_from('groups');
$category = $user->select_from('categories');
?>
<div class="container">
    <div class="row">
        <div class="col-sm-1">
            <button class="btn btn-danger" type="button" name="delete_group" id="delete_group">Delete</button>
        </div>
        <div class="col-sm-10">
        <h2>My groups:</h2>
            <div class="d-flex flex-wrap justify-content-center">
                <?php foreach($data as $row){  ?> 
                    <div class="group_card card" style="width: 15rem;" id="<?php echo $row["group_id"]; ?>">
                    <img class="card-img-top" src="<?php if(!$row['groups_pic']){echo 'images/group.jpg';} else {echo 'images/'.$row['groups_pic'];}?>" />
                        <div class="card-body">
                            <h5 class="text-center card-title"><?php echo $row['group_name'];?></h5>
                            <small>Choose to delete: </small><input type="checkbox" name="group_id" value="<?php echo $row["group_id"]; ?>">
                            <?php echo "<a href='group_update.php?group_id=" .$row['group_id']."'><button class='btn-block btn btn-warning' type='button'>Edit Group</button></a>"; ?>
                        </div>
                    </div>
                <?php
                };//foreach close tag
                ?>
            </div>
            <h1>Create new group:</h1>
            <form method="POST" id="GroupForm" class="form">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text">Category</label>
                        </div>                        
                        <select class="custom-select" name="fk_cat_id">
                        <?php foreach($category as $cat_row){  ?>
                            <option value="<?php echo $cat_row["cat_id"]; ?>"><?php echo $cat_row["cat_type"]; ?></option>
                        <?php
                        };//foreach close tag
                        ?>
                        </select>
                    </div>
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