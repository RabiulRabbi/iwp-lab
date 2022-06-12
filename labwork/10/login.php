<?php
session_start();

//db connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "labwork";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_POST['login'])) {
    $username = $_POST['username'];

    $sql = "SELECT * FROM admin WHERE username = '$username'";
    $query = mysqli_query($conn, $sql);

    if ($query->num_rows < 1) {
        $_SESSION['error'] = 'Cannot find username';
    } else {
    }
} else {
    $_SESSION['error'] = 'Error...';
}
// header('location: home.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Login Form</h1>
    <form action="<?php $_SERVER['PHP_SELF'] ?>">
        <table>
            <tr>
                <td>Username: <input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password: <input type="password" name="password"></td>
            </tr>
            <tr>
                <td><input style="float: right;" type="submit" name="login" value="login"></td>
            </tr>
        </table>
    </form>
    <a href="registration.php">Registration Now</a>
</body>

</html>