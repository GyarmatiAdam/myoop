<?php 
include_once "inc/navbar.php";
include_once "inc/class.user.php";
?>
<div class="container" style="margin-top:5rem;margin-bottom:5rem;">
    <div class="row">
        <div class="col-sm-2">

        </div>
        <div class="col-sm-8">
        <h1>You can change your personal data here</h1>
        <?php foreach($loggedin_data as $row){ ?>
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
                    <input type="hidden" class="form-control" name="user_role" value="<?php echo $row['user_role']; ?>" required>
                    <input type="hidden" class="form-control" name="user_status" value="<?php echo $row['user_status']; ?>" required>
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