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
    <nav class="navbar bg-light">
        <a class="navbar-brand" href="#">BrandName</a>
    </nav>
    <form method="post" action="main.php" class="login_form jumbotron">
        <div class="form-group">
            <label for="confirm">which complaint do you want to upvote ?</label>
             <select class="form-control" name="choice">
                 <option>None</option>
            <?php
            $con = mysqli_connect("localhost","root","", "project");
            $query2 = "SELECT * FROM complaint ORDER BY id DESC";
            $result2 = mysqli_query($con, $query2);
            while($row = mysqli_fetch_assoc($result2))
            {
        ?>
                 <option><?php echo $row['heading'] ?></option>
                 <?php } ?>
            </select>
        </div>
        <button type="submit" name="confirmation">Submit</button>
    </form>
</html>