<?php
include_once "inc/navbar.php";
?>
<div class="container">
    <div class="row">
        <div class="col-sm-2">
            <h1>Register</h1>
        </div>
        <div class="col-sm-8">
            <form method="POST" id="registerForm" class="form">
                <div class="form-group">
                    <input type="text" class="form-control" name="first_name" placeholder="First name" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="last_name" placeholder="Last name" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="date" class="form-control" name="dob" placeholder="Date of borth" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="pass" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
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