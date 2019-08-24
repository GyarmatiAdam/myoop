<?php
include_once "inc/navbar.php";
include_once "inc/class.user.php";
$user = new User();
$data = $user->select_from('users');
foreach($data as $row){ 

?>
<div class="container" style="margin-top:5rem; margin-bottom:5rem;">
    <div class="row">
        <div class="col-sm-2">

        </div>
        <div class="col-sm-8">
            <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><?php echo $row['email'];?></td>
                    <?php echo '<td><a href="inc/user_delete.php?user_id='.$row['user_id'].'">';?>
                        <button class="btn btn-danger" id="delete" type="submit">Delete</button></a>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-2">

        </div>
    </div>
</div>
<?php
};//foreach close tag
include_once "inc/footer.php";
?>