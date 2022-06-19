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

    <form name="myForm" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" onsubmit="return onsubmitFunc();">
        <table align="center" border="0">

            <h2>Student Registration</h3>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="uname" id="uname" placeholder="username..." oninput="validateUname()"><span id="unameErr"></span></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" placeholder="email..." oninput="validateEmail();"><span id="emailErr"></span></td>
                </tr>
                <tr>
                    <td>password: </td>
                    <td><input type="password" name="password" placeholder="password..." oninput="validatePassword();"><span id="passwordErr"></span></td>
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
<script>
    function validateUname() {
        const myForm = document.forms['myForm'];
        if (myForm['uname'].value == "") {
            document.getElementById("unameErr").innerHTML = "Must be filled";
        } else {
            const uname_val = /[A-Za-z0-9]{4}/;
            if (!myForm['uname'].value.match(uname_val)) {
                document.getElementById("unameErr").innerHTML = "Must be at least 4 characters";
                return false;
            } else {
                document.getElementById("unameErr").innerHTML = "OK";
                return true;
            }
        }
    }

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
        if (!validateUname() || !validateEmail() || !validatePassword()) {
            return false;
        } else {
            return true;
        }
    }
</script>