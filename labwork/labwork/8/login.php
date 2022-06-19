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
    <form name="myForm" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" onsubmit="return onsubmitFunc();">
        <table align="center" border="0">

            <h2>Student Login</h3>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" placeholder="email..." oninput="validateEmail();"><span id="emailErr"></span></td>
                </tr>
                <tr>
                    <td>password: </td>
                    <td><input type="password" name="password" placeholder="password..." oninput="validatePassword();"> <span id="passwordErr"></span></td>
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
<script>
    function validateEmail() {
        const myForm = document.forms['myForm'];
        if (myForm['email'].value == "") {
            document.getElementById("emailErr").innerHTML = "Must be filled";
        } else {
            const email_val = /^\w+@\w+(\.\w{2,3})+$/;
            if (!myForm['email'].value.match(email_val)) {
                document.getElementById("emailErr").innerHTML = "Email pattern mismatch";
                return false;
            } else {
                document.getElementById("emailErr").innerHTML = "OK";
                return true;
            }
        }
    }

    function validatePassword() {
        const myForm = document.forms['myForm'];
        if (myForm['password'].value == "") {
            document.getElementById("passwordErr").innerHTML = "Must be filled";
        } else {
            const password_val = /[A-Za-z0-9]{6}/;
            if (!myForm['password'].value.match(password_val)) {
                document.getElementById("passwordErr").innerHTML = "Must be at least 6 characters";
                return false;
            } else {
                document.getElementById("passwordErr").innerHTML = "OK";
                return true;
            }
        }
    }

    function onsubmitFunc() {
        if (!validateEmail() || !validatePassword()) {
            return false;
        } else {
            return true;
        }
    }
</script>