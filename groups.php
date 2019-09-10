<?php
include_once "inc/navbar.php";
$cat_id = $_GET["cat_id"];
$data = $user->check_all_credentials('groups', 'fk_cat_id', $cat_id);
$category = $user->check_all_credentials('categories', 'cat_id', $cat_id);
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
        
        <?php foreach($category as $cat_row){  ?>
        <h2><?php echo $cat_row["cat_type"]; ?></h2>
        <?php } ?>
        <?php if (isset($_SESSION['admin'])){ ?>
            <button class="btn btn-danger" type="button" name="delete_group" id="delete_group">Delete</button>
        <?php } ?>
            <div class="d-flex flex-wrap justify-content-center">
                <?php foreach($data as $row){  ?>
                    <div class="group_card card" id="<?php echo $row["group_id"]; ?>">
                    <img class="card-img-top" src="<?php if(!$row['groups_pic']){echo 'images/group.jpg';} else {echo 'images/'.$row['groups_pic'];}?>" />
                        <div class="card-body">
                            <h5 class="text-center card-title"><?php echo $row['group_name'];?></h5>
                            <?php if (isset($_SESSION['loggedin'])){ ?>
                            <?php echo "<a href='group_joined.php?group_id=" .$row['group_id']."'><button class='btn-block btn btn-primary' type='button'>See more</button></a>"; ?>
                            <?php } ?>
                            <?php if (isset($_SESSION['admin'])){ ?>
                                <?php echo "<a href='group_update.php?group_id=" .$row['group_id']."'><button class='btn-block btn btn-warning' type='button'>Edit Group</button></a>"; ?>
                                <small>Choose to delete: </small><input type="checkbox" name="group_id" value="<?php echo $row["group_id"]; ?>">
                            <?php } ?>
                        </div>
                    </div>
                <?php
                };//foreach close tag
                ?>
            </div>
        </div>
    </div>
</div>
<?php
include_once "inc/footer.php";
?>