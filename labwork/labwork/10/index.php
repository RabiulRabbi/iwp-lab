<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'university');
if (!$conn) {
    echo "connection failed";
}


if (isset($_SESSION['uname'])) {
    header("location: adminHome.php");
}

if (isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin where uname = '$uname'|| email = '$uname'";
    $result = mysqli_query($conn, $sql);
    if (!mysqli_num_rows($result) > 0) {
        echo "No data in database";
        $msg = "Wrong password";
        header("location: index.php?msg=$msg");
    } else {
        //echo "ase";
        while ($row = mysqli_fetch_assoc($result)) {
            $email = $row['email'];
            // echo $email;
            if (($row['uname'] == $uname || $row['email'] == $email) && ($row['password'] == $password)) {
                $_SESSION['uname'] = $row['uname'];
                $_SESSION['email'] = $row['email'];
                echo "login successfully";
                header("location: adminHome.php");
            } else {
                echo "Login failed (worng username or password)";
            }
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .login {
            border: 1px solid lightgray;
            padding: 40px 20px;
            border-radius: 10px;
            background-color: #daedf5;
        }

        input {
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">

        <table border="0" align="center" class="login">
            <h2 style="text-align: center">Login to admin</h2>
            <p style="color: red; text-align: center"><?php

                                                        if (!isset($_GET['msg'])) {
                                                            echo "";
                                                        } else {
                                                            echo $_GET['msg'];
                                                        }
                                                        ?></p>
            <tr>
                <td>Username or Email: </td>
                <td><input type="text" name="uname" id="uname"></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="submit" name="submit"></td>
            </tr>
        </table>
    </form>
</body>

</html>