<?php session_start();
include_once "inc/class.user.php";
$user = new User();
//if statement to avoid error message after logout
if (isset($_SESSION['loggedin'])) {
$loggedin = $_SESSION['loggedin'];
$loggedin_data = $user->check_all_credentials('users', 'user_id', $loggedin);
} else{
unset($_SESSION['loggedin']);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- submit window style and script -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.13.0/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.13.0/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="inc/style.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
            </li>
        <?php if (!isset($_SESSION['loggedin'])){ ?>
            <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
        <?php }else{ ?>
            <li class="nav-item">
                <a class="nav-link" href="logout.php?logout">Logout</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="myprofile.php">MyProfile</a>
            </li>
        <?php } ?>
        <?php if (isset($_SESSION['admin'])){ ?>
            <li class="nav-item">
                <a class="nav-link" href="admin.php">Admin</a>
            </li>
        <?php } ?>
            </ul>
        <?php if (isset($_SESSION['loggedin'])){ ?>
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link">Welcome: 
        <?php foreach($loggedin_data as $loggedin_row){
                echo $loggedin_row['username']; }?>
                </a>
            </li>
            </ul>
        <?php } ?>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
