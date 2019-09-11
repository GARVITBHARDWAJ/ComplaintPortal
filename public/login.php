<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $con1 = mysqli_connect("localhost","root","", "project");
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $department = $_POST['department'];
    $password = $_POST['password'];
    $password_1 = md5($password);
    $query1 = "INSERT INTO student_record (id, fname, lname, department, password) VALUES('$id', '$fname', '$lname', '$department', '$password_1');";
    $temp = mysqli_query($con1, $query1);
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style/login.css">
    </head>
    <body>
    <nav class="navbar bg-light">
        <a class="navbar-brand" href="#">BrandName</a>
        <a class="nav-item" href="#">About Us</a>
    </nav>
    
    <div class="login_form jumbotron">
        <form method="post" action="main.php">
            <div class="form-group">
                <label for="roll_num">Roll Number</label>
                <input type="number" class="form-control" id="roll_num" placeholder="171112256" required name="roll">
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