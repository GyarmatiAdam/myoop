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
                    <td><input type="checkbox" name="user_id" value="<?php echo $row["user_id"]; ?>"></td>
                    </td>
                    </tr>
                </tbody>
            </table>
            <?php
            };//foreach close tag
            ?>
        </div>
        <div class="col-sm-2">
        <button type="button" name="delete" id="delete">Delete</button>
        </div>
    </div>
</div>
<?php
include_once "inc/footer.php";
?>