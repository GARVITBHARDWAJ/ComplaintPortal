<?php
session_start();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login/Register</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style/login.css">
    </head>
    <body>
    <nav class="navbar bg-light">
        <a class="navbar-brand" href="">Complaint Portal</a>
    </nav>
    
    <div class="login_form jumbotron">
        <form method="post" action="main.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="Title">Heading</label>
                <input required type="text" class="form-control" placeholder="Title" id="Title" name="title">
            </div>
            
            <div class="form-group">
                <label for="content">Content</label>
                <textarea required type="text" class="form-control" id="content" placeholder="complaint" name="content"></textarea>
            </div>
            
            <div class="form-group">
                <label for="image-input">Image related to problem<small>  (optional)</small></label>
                <input type="file" class="form-control-file" id="image-input" name="image">
            </div>
            <button type="submit" class="btn btn-primary" name="complaint">Post Complaint</button>
        </form>
    </div>
    </body>
</html>