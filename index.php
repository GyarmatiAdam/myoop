<?php
if(isset($_SESSION['user'])!="") {
    header("Location: login.php");
    exit;
}
include_once "inc/navbar.php";
include_once "inc/class.user.php";

$user = new User();
$data = $user->select_from('users');
foreach($data as $row){ 
?>
<div class="container" style="margin-top:5rem">
    <div class="row">
        <div class="col-sm-2">
            <h1>Home</h1>
        </div>
        <div class="col-sm-8">
            <?php
            echo $row['email'];
            echo $row['pass'];
            ?>
        </div>
        <div class="col-sm-2">

        </div>
    </div>
</div>
<?php
};//foreach close tag
include_once "inc/footer.php";
?>