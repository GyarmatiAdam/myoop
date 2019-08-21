<?php
include_once "inc/navbar.php";
?>
<div class="container" style="margin-top:5rem">
    <div class="row">
        <div class="col-sm-2">
            <h1>Register</h1>
        </div>
        <div class="col-sm-8">
            <form method="POST" id="registerForm" class="form">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="pass" placeholder="Password">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="login.php" class="btn btn-warning">Login</a>
            </form>
        </div>
        <div class="col-sm-2">

        </div>
    </div>
</div>
<?php
include_once "inc/footer.php";
?>