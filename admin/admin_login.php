<?php
session_start();
$_SESSION['Login'] = 1;
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style/admin_login.css">
    </head>
    <body>
    <nav class="navbar bg-light">
        <a class="navbar-brand" href="">Complaint Portal</a>
        <a class="nav-item" href="#">About Us</a>
    </nav>
    
    <div class="login_form jumbotron">
        <form method="post" action="admin_main.php">
            <div class="form-group">
                <label for="roll_num">Admin ID</label>
                <input type="number" class="form-control" id="roll_num" placeholder="12345" required name="id">
            </div>
            <div class="form-group">
                <label for="password">Enter Password</label>
                <input type="password" required class="form-control" name="pass">
            </div>
            <button type="submit" class="btn btn-primary" name="login">Login</button>
        </form>
    </div>
    </body>
</html>