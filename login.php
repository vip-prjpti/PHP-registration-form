<?php
session_start();

include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($name) && !empty($password)) {
        $query = "select * from users where user_name = '$name' limit 1";
        $result = mysqli_query($con, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                if ($user_data['password'] === $password) {
                    header("Location:index.php");
                    die;
                }

            }

        }
        echo "<script type='text/javascript'> alert('Wrong username or password')</script>";
    } else {
        echo "<script type='text/javascript'> alert('Wrong username or password')</script>"; 


    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            <div style="font-size:20px; margin:10px; color:#fff">Login</div>
            <input id="text" type="text" name="user_name">
            <input id="text" type="password" name="password"><br><br>
            <input id="button" type="submit" value="Login"> <br><br>
            <a href="signup.php">Signup</a>
        </form>
    </div>
</body>

</html>