<?php 
include_once "inc/navbar.php";
    $user_id = $_GET["user_id"];
    $data = $user->check_all_credentials('users', 'user_id', $user_id);
?>
<div class="container">
    <div class="row">
        <div class="col-sm-2">

        </div>
        <div class="col-sm-8">
        <h1>Update User data</h1>
        <?php foreach($data as $row){ ?>
            <form method="POST" id="update" class="form">
                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" required>
                    <input type="hidden" name="user_id" value="<?php echo $row['user_id']?>"/>
                </div>
                <div class="form-group">
                <label>First name</label>
                    <input type="text" class="form-control" name="first_name" value="<?php echo $row['first_name']; ?>" required>
                </div>
                <div class="form-group">                    
                <label>Last name</label>
                    <input type="text" class="form-control" name="last_name" value="<?php echo $row['last_name']; ?>" required>
                </div>
                <div class="form-group">
                <label>Username</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>" required>
                </div>
                <div class="form-group">
                <label>Date of borth</label>
                    <input type="date" class="form-control" name="dob" value="<?php echo $row['dob']; ?>" required>
                </div>
                <div class="form-group">
                    <label>User-role currently: 
                        <?php
                        if($row['user_role']==3){
                            echo "User";
                        }elseif($row['user_role']==2){
                            echo "Group user";
                        }else{
                            echo "Admin";
                        }
                        ?>
                    </label>
                    <select class="custom-select"  name="user_role" required>
                        <option value="3">User</option>
                        <option value="2">Group user</option>
                        <option value="1">Admin</option> 
                    </select>
                </div>
                <div class="form-group">
                    <label>User-status: currently: <?php echo $row['user_status']; ?></label>
                    <select class="custom-select" name="user_status">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
                <!-- error message -->
                <span id='error_message'></span>
                <button type="submit" class="btn btn-primary">Update</button>
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