<?php
session_start();
// print_r($_SESSION);
$conn = mysqli_connect("localhost", "root", "", "labwork");

if (!isset($_SESSION['email'])) {
    header("location: login.php");
}

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("location: login.php");
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
        h1,
        p,
        form {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $sql = "SELECT * FROM st_reg where email = '$email'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
    ?>
                <h1>This is the Home page</h1>
                <p>Username: <?php echo $row['username'] ?></p>
                <p>Email: <?php echo $row['email'] ?></p>
    <?php
            }
        }
    }
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="submit" value="logout" name="logout">
    </form>
</body>

</html>