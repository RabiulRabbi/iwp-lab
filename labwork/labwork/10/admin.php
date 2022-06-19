<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("location:index.php");
}

if (isset($_POST["submit"])) {
    session_destroy();
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-dark p-3" style="background-color: #e3f2fd;">
        <div></div>
        <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
            <input class="btn btn-primary" type="submit" name="submit" value="Logout">
        </form>
    </nav>
    <div class="p-4 text-center">
        <h1 class="text-center">Admin Panel</h1>
        <p><b>User: </b><?php echo $_SESSION["name"] ?></p>
        <p><b>Email: </b><?php echo $_SESSION["email"] ?></p>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>