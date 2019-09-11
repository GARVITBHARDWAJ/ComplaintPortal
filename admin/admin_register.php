<?php
session_start();
$_SESSION['Register'] = 1;
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Register</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style/login.css">
    </head>
    <body>
    <nav class="navbar bg-light">
        <a class="navbar-brand" href="#">BrandName</a>
        <a class="nav-item" href="#">About Us</a>
    </nav>
    
    <div class="login_form jumbotron">
        <form method="post" action="<?php echo 'main.php'; ?>">
            <div class="form-group">
                <label for="roll_num">Roll Number</label>
                <input type="number" class="form-control" id="roll_num" placeholder="171112256" required name="id">
            </div>
            <div class="form-group">
                <label for="name">First Name</label>
                <input type="text" class="form-control" id="name" placeholder="Saksham Khatwani" required name="fname">
            </div>
            <div class="form-group">
                <label for="name">Last Name</label>
                <input type="text" class="form-control" id="name" placeholder="Saksham Khatwani" required name="lname">
            </div>
            <div class="form-group">
                <label for="department">Department</label>
                <select class="form-control" name="department"> 
                    <option>CSE</option>
                    <option>ECE</option>
                    <option>EE</option>
                    <option>MECH</option>
                    <option>CIVIL</option>
                </select>
            </div>
            <div class="form-group">
                <label for="password">Choose a Password</label>
                <input type="password" required class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary" name="register">Register</button>
        </form>
    </div>
    </body>
</html>