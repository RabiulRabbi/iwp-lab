<?php
session_start();
// db connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "labwork";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_SESSION['admin'])) {
    $sql = "SELECT * FROM admin WHERE id = '" . $_SESSION['admin'] . "'";
    $query = $conn->query($sql);
    $voter = $query->fetch_assoc();
} else {
    header('location: index2.php');
    exit();
}

if (isset($_POST['submit'])) {
    $uname = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO admin (username, password)
        VALUES ('$uname', '$password')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $_SESSION['success'] = 'Successfully registered';
    } else {
        echo "Data created failed!!!";
    }
} else {
    $_SESSION['error'] = 'Fill up add form first';
}
header('location: index2.php');
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
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <table>
            <h1>Registration form: </h1>
            <tr>
                <td>Username: <input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password: <input type="text" name="password"></td>
            </tr>
            <tr>
                <td><input style="float: right;" type="submit" name="submit" value="submit"></td>
            </tr>
        </table>
    </form>
    <a style="border: 2px solid blue;" href="index.php">Login</a>
</body>

</html>