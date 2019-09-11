<?php 
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST' && !(isset($_SESSION['id'])))
{
    $id = $_POST['roll'];
    $pass = $_POST['pass'];
    $pass_1 = md5($pass);
    //connecting to db
    $con = mysqli_connect("localhost","root","", "project");
    $query = "SELECT * FROM student_record WHERE id = '$id' and password = '$pass_1';";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) == 1)
    {
        $_SESSION['id'] = $_POST['roll'];
//        echo $_SESSION['id'];
//        echo "login successful !";
    }
//    else
//    {
//        echo "login failed !";
//    }
}
else if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['id']) && !(isset($_POST['confirmation'])))
{
//    echo "yes !";
    $con = mysqli_connect("localhost","root","", "project");
    $title = $_POST['title'];
    $content = $_POST['content'];
    if(isset($_FILES['image'])){
        $imageData = mysqli_real_escape_string($con, file_get_contents($_FILES['image']['tmp_name']));
        $query = "INSERT INTO complaint(heading, content, image, dt, status, upvote) VALUES('$title', '$content', '$imageData', NOW(), 'accepted', '0');";
        $temp = mysqli_query($con, $query);
    }
}

else if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['id']) && (isset($_POST['confirmation'])))
{
    $con = mysqli_connect("localhost","root","", "project");
    $choice = $_POST['choice'];
    $query = "UPDATE complaint SET upvote = upvote + 1 where heading = '$choice' ;";
    mysqli_query($con, $query);
}


else if(isset($_SESSION['id']))
{
//    if(isset($_))
//    echo $_SESSION['id'];
//    echo "login successful as well";
}
else
{
    header("Location: ../index.php");
}
?>
<!--
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login/Register</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style/main.css">
    </head>
    <body>
        <a href="../index.php">Log out</a>
    </body>
</html>-->

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login/Register</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style/main.css">
    </head>
    <body>
        <nav class="navbar bg-light">
            <a class="navbar-brand" href="">Complaint Portal</a>
            <a class="nav-item" href="upvoteconfirm.php">Upvote a complaint</a>
            <a class="nav-item" href="complaint.php">Write a Complain</a>
            <a class="nav-item" href="../index.php">Logout</a>
        </nav>
        <?php
            $con = mysqli_connect("localhost","root","", "project");
            $query2 = "SELECT * FROM complaint ORDER BY id DESC";
            $result2 = mysqli_query($con, $query2);
            while($row = mysqli_fetch_assoc($result2))
            {
        ?>
        <div class="blog_post">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['heading']; ?></h5>
                    <p class="card-text"><?php echo $row['content']; ?></p>
                    <small class="card-text">posted on: <?php echo $row['dt']; ?></small><br>
                    <small class="card-text status">Status: <?php echo $row['status']; ?></small><br>
                    <small class="card-text upvotes">Upvotes: <?php	echo $row['upvote']; ?></small>
                    <img src= "<?php echo "data:image/jpg;base64,".base64_encode($row['image']); ?>" class="card-image-top problem-image"> 
<!--                    <button type="submit" class="btn btn-primary" name="Upvote_button"><a href="upvoteconfirm.php">Upvote</a></button>-->
                </div>
            </div>
        </div>
        <?php  }  ?>    
    </body>
</html>