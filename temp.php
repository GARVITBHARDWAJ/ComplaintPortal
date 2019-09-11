<?php
session_start();
require("../test.php");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['register']))
        {
            $id = $_POST['id'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $department = $_POST['department'];
            $password = $_POST['password'];
            $password_1 = md5($password);
    //        echo "the values are".$id;
            $query = "INSERT INTO student_record (id, fname, lname, department, password) VALUES('$id', '$fname', '$lname', '$department', '$password_1');";
            $temp = mysqli_query($con, $query);
            $_SESSION['logged'] = 1;
        }
        else if(isset($_POST['login']))
        {
//            session_start();
            $id = $_POST['roll'];
            $password = $_POST['pass'];
            $password_1 = md5($password);
            $query = "SELECT * FROM student_record WHERE id = '$id' and password = '$password_1';";
            $temp = mysqli_query($con, $query);
            if(mysqli_num_rows($temp) == 1)
            {
                $_SESSION['logged'] = 1;
            }
            else{
                header("Location:../index.php");
                }
        }
        else if(isset($_POST['complaint']) && $_SESSION['logged'] == 1)
        {
            $title = $_POST['title'];
            $content = $_POST['content'];
            if(isset($_FILES['image'])){
//                echo "i am here";
//                echo $_FILES['image']['tmp_name'];
                $imageData = mysqli_real_escape_string($con, file_get_contents($_FILES['image']['tmp_name']));
//                echo $imageData;
                $query = "INSERT INTO complaint(heading, content, image, dt, status) VALUES('$title', '$content', '$imageData', NOW(), 'accepted');";
                $temp = mysqli_query($con, $query);
//                if($temp)
//                {
////                    echo "query is successful";
//                }
//                echo $imageData;
            
            }
        }
        
    }

    else if($_SESSION['logged'] == 1)
    {
        echo "i am working";
        
    }
    else{
        header("Location:../index.php");
    }

    function upvote($row, $con){
        $t = $row['upvote'] + 1;
        $i = $row['id'];
        $query3 = "UPDATE complaint SET upvote = '$t' WHERE id = '$i';";
//        if(mysqli_query($con, $query3))
//        {
//            header("Location: main.php");
//        }
    }

//    $query2 = "SELECT image FROM complaint WHERE id = '3';";
//    $r = mysqli_query($con, $query2);
//    $num = mysqli_num_rows($r);
//    if($num > 0)
//    {
//        $row = mysqli_fetch_assoc($r);
////        echo base64_encode($row['image']);
////        echo base64_decode($row['image']);
////        header("Content-type :image/jpg");
//    }
?>
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
            <a class="navbar-brand" href="#">BrandName</a>
            <a class="nav-item" href="complaint.php">Write a Complain</a>
            <a class="nav-item" href="../index.php">Logout</a>
        </nav>
        <?php
            $query2 = "SELECT * FROM complaint";
            $result2 = mysqli_query($con, $query2);
            while($row = mysqli_fetch_assoc($result2))
            {
        ?>
        <div class="blog_post">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['heading']; ?></h5>
                    <p class="card-text"><?php echo $row['content']; ?></p>
                    <small class="card-text">posted on <?php echo $row['dt'] ?></small><br>
                    <small class="card-text status">Status: <?php echo $row['status'] ?></small><br>
                    <small class="card-text upvotes">Upvotes: <?php echo $row['upvote'] ?></small>
                    <img src= "<?php echo "data:image/jpg;base64,".base64_encode($row['image']); ?>" class="card-image-top problem-image"> 
                    <button class="btn btn-primary" name="Upvote_button"><a href="main.php">Upvote</a></button>
                </div>
            </div>
        </div>
        <?php } ?>
        
    </body>
</html>