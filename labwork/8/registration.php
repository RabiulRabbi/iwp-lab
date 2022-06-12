<?php
$conn = mysqli_connect('localhost', 'root', '', 'labwork');
if (!$conn) {
    echo "Database connection failed!!!";
}

?>
<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO st_reg (username, email, password)
        VALUES('$username','$email','$password')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Information updated Successfully!!!!";
        header("location: login.php");
    } else {
        echo "Information updated failed!!!";
        header("location: registration.php");
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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

            <h2>Student Registration</h3>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" id="username" placeholder="username..."></td>
                </tr>
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
                    <td><input type="submit" value="submit" name="submit"></td>
                </tr>
                <tr>
                    <td><a href="login.php">Log In</a></td>
                </tr>
        </table>
    </form>
</body>

</html>