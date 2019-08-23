<?php
include_once "inc/navbar.php";
?>
<div class="container" style="margin-top:5rem">
    <div class="row">
        <div class="col-sm-2">
            <h1>Login</h1>
        </div>
        <div class="col-sm-8">
            <form method="POST" action="inc/action_login.php" class="form">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="pass" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="register.php" class="btn btn-warning">Register</a>
            </form>
        </div>
        <div class="col-sm-2">

        </div>
    </div>
</div>
<?php
include_once "inc/footer.php";
?>