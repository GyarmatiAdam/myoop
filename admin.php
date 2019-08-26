<?php
include_once "inc/navbar.php";
include_once "inc/class.user.php";
$user = new User();
$data = $user->select_from('users');
?>
<div class="container" style="margin-top:5rem; margin-bottom:5rem;">
    <div class="row">
        <div class="col-sm-2">

        </div>
        <div class="col-sm-8">
        <?php foreach($data as $row){  ?> 
            <table id="<?php echo $row["user_id"]; ?>" class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><?php echo $row['email'];?></td>
                    <td><small>Choose to delete: </small><input type="checkbox" name="user_id" value="<?php echo $row["user_id"]; ?>"></td>
                    <td><?php echo "<a href='user_update.php?user_id=" .$row['user_id']."'><button class='btn btn-warning' type='button'>Edit</button></a>"; ?></td>
                    </tr>
                </tbody>
            </table>
            <?php
            };//foreach close tag
            ?>
        </div>
        <div class="col-sm-2">
        <button class="btn btn-danger" type="button" name="delete" id="delete">Delete</button>
        </div>
    </div>
</div>
<?php
include_once "inc/footer.php";
?>