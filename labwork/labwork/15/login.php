<?php
session_start();
include "conn.php";
if (isset($_SESSION["email"])) {
    header("location: home.php");
}
// $id = $uname= $password = "";
if (extract($_POST)) {

    $sql = "SELECT* FROM user where uname = '$unameEmail' || email = '$unameEmail'";
    $result = mysqli_query($conn, $sql);
    // echo $result;
    if (mysqli_num_rows($result) < 1) {
        echo "No data in database";
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $email = $row['email'];
            echo $email;
            // echo $id;
            if (($row['uname'] == $uname || $row['email'] == $email) && ($row['password'] == $password)) {
                echo "login successfully";
                $_SESSION["email"] = $row['email'];
                header("location: home.php");
            } else {
                echo "failed";
                header("location: login.php");
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
</head>

<body>
    <form name="myForm" action="<?php $_SERVER["PHP_SELF"] ?>" method="POST" onsubmit="return onsubmitFunc()">
        <table border="0" align="center">
            <tr>
                <td>Username/Email: </td>
                <td><input type="text" name="unameEmail" id="unameEmail" oninput=validateUnameEmail();><span id="unameEmailErr"></span></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="password" id="password" oninput="validatePassword()"><span id="passwordErr"></span></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="login" name="login"></td>
            </tr>
            <tr>
                <td><a href="index.php">Registration</a></td>
            </tr>
        </table>
    </form>
</body>

</html>
<script>
    function validateUnameEmail() {
        if (document.forms['myForm']['unameEmail'].value == "") {
            document.getElementById("unameEmailErr").innerHTML = "Must be filled";
        } else {
            const uname_validation = /[A-Za-z0-9]{4,}/;
            const email_validation = /^\w+@\w+\.\w{2,3}$/;
            if (!document.forms['myForm']['unameEmail'].value.match(email_validation) && !document.forms['myForm']['unameEmail'].value.match(uname_validation)) {
                document.getElementById("unameEmailErr").innerHTML = "Invalid Username or Email";
                return false;
            } else {
                document.getElementById("unameEmailErr").innerHTML = "";
                return true;
            }
        }
    }

    function validatePassword() {
        if (document.forms['myForm']['password'].value == "") {
            document.getElementById("passwordErr").innerHTML = "Must be filled";
        } else {
            const password_validation = /^\(?([A-Za-z0-9]{4,})\)?$/;
            if (!document.forms['myForm']['password'].value.match(password_validation)) {
                document.getElementById("passwordErr").innerHTML = "Password must be filled at least 4 characters";
                return false;
            } else {
                document.getElementById("passwordErr").innerHTML = "";
                return true;
            }
        }
    }

    function onsubmitFunc() {
        if (!validateUnameEmail() || !validatePassword()) {
            return false;
        } else {
            return true;
        }
    }
</script>


<!-- if(in_array("morning",$arr)){
    echo "checked";
} -->