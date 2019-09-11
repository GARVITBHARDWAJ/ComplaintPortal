<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Delete</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style/admin_login.css">
    </head>
    <body>
    <nav class="navbar bg-light">
        <a class="navbar-brand" href="#">BrandName</a>
        <a class="nav-item" href="#">About Us</a>
    </nav>
    
    <div class="login_form jumbotron">
        <form method="post" action="admin_main.php">
			<div class="form-group">
                <label for="heading">Name of complaint</label>
                <input type="text" class="form-control" id="heading" placeholder="Test" required name="heading">
            </div>
            <div class="form-group">
                <label for="delete">Confirm Delete?</label>
            </div>
            <button type="submit" class="btn btn-primary" name="yes">YES</button>
			<button type="submit" class="btn btn-primary" name="no">NO</button>
        </form>
    </div>
    </body>
</html>