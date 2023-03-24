<?php
session_start();

include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($name) && !empty($password)) {
        $query = "insert into users (user_name,password) values ('$name','$password')";

        mysqli_query($con, $query);
        echo "<script type='text/javascript'> alert('Successfully registered')</script>";
        header("Location: login.php");
    } else {
        echo "<script type='text/javascript'> alert('Please enter valid info')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>

<body>
    <style type="text/css">
        #text {
            height: 25px;
            border: solid thin #aaa;
            padding: 4px;
            width: 100%;
            border-radius: 10px;
            margin-bottom: 5px;
        }

        #button {
            padding: 10px;
            width: 100px;
            color: #fff;
            background-color: lightblue;
            border: none;
        }

        #box {
            background-color: grey;
            margin: auto;
            width: 300px;
            padding: 20px;

        }
    </style>

    <div id="box">
        <form action="" method="post">
            <div style="font-size:20px; margin:10px; color:#fff">Signup</div>
            <input id="text" type="text" name="user_name">
            <input id="text" type="password" name="password"><br><br>
            <input id="button" type="submit" value="Signup"> <br><br>
            <a href="login.php">Login</a>
        </form>
    </div>
</body>

</html>