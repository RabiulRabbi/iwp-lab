<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "labwork");
if (!$conn) {
    echo "Database connection failed!!!!!";
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    // echo $email, $password;


    $sql = "SELECT * FROM st_reg where email = '$email' and password ='$password'";
    $result = mysqli_query($conn, $sql);
    // print_r($result);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            // echo $_SESSION['email'];
            header("location: home.php");
        }
    } else {
        $_SESSION['error'] = "Can't find any email !!!!!";
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
        h2 {
            text-align: center;
            color: green;
        }

        tr {
            line-height: 35px;
        }


        input {
            border-radius: 5px;
            padding: 5px;
        }

        table {
            border: 2px solid darkgreen;
            background-color: lightgreen;
            border-radius: 10px;
            padding: 30px 10px;
        }

        a:hover {
            color: black;
        }
    </style>
</head>

<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <table align="center" border="0">

            <h2>Student Login</h3>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" placeholder="email..."></td>
                </tr>
                <tr>
                    <td>password: </td>
                    <td><input type="password" name="password" placeholder="password..."></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="login" name="login"></td>
                </tr>
                <tr>
                    <td><a href="registration.php">Registration</a></td>
                </tr>
        </table>
    </form>
</body>

</html>