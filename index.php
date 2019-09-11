<?php
session_start();
//echo phpinfo();
if(isset($_SESSION['id']))
{
    session_destroy();
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login/Register</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <nav class="navbar bg-light">
            <a class="navbar-brand" href="">Complaint Portal</a>
        </nav>
        
        <div class="jumbotron options">
            <button class="btn btn-primary opt"><a class="anchor" href="admin/admin_login.php">Admin Login</a></button>
            <button class="btn btn-primary opt"><a href="public/Login.php" class="anchor">Student Login</a></button>
            <button class="btn btn-primary opt"><a href="public/Register.php" class="anchor">Student Register</a></button>
        </div>
    </body>
</html>