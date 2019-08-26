<?php 
include_once "inc/navbar.php";
include_once "inc/class.user.php";
    $user_id = $_GET["user_id"];
    $user = new User();
    $data = $user->check_more_credentials('users', 'user_id', 'pass', 'email', $user_id);
?>
<div class="container" style="margin-top:5rem">
    <div class="row">
        <div class="col-sm-2">

        </div>
        <div class="col-sm-8">
        <h1>Update User data</h1>
        <?php foreach($data as $row){ ?>
            <form method="POST" action="inc/action_user_update.php" id="update" class="form">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" required>
                    <input type="hidden" name="user_id" value="<?php echo $row['user_id']?>"/>
                </div>
                <!-- error message -->
                <span id='error_message'></span>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
                <!-- <?php echo "<a href='inc/action_user_update.php?user_id=" .$row['user_id']."'><button class='btn btn-primary' type='button'>Update</button></a>"; ?> -->
                <a href="admin.php"><button type="button" class="btn btn-secondary">Back</button></a>
            </form>
            <?php }?>
        </div>
        <div class="col-sm-2">

        </div>
    </div>
</div>
<?php

include_once "inc/footer.php";
?>