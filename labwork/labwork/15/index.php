<?php
include "conn.php";
if (extract($_POST)) {

    $sql = "INSERT INTO user (name,uname,email,contact,password) VALUES('$name','$uname','$email','$contact','$password')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Data inserted successfully";
    } else {
        echo "Insertion failed";
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
            <h1 style="text-align: center;">Registration Form</h1>
            <tr>
                <td>Name: </td>
                <td><input type="text" name="name" id="name" oninput="validateName()"><span id="nameErr"></span></td>
            </tr>
            <tr>
                <td>User Name: </td>
                <td><input type="text" name="uname" id="uname" oninput="validateUname()"><span id="unameErr"></span></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="email" name="email" id="email" oninput="validateEmail()"><span id="emailErr"></span></td>
            </tr>
            <tr>
                <td>Contact Number: </td>
                <td><input type="number" name="contact" id="contact" oninput="validateContact()"><span id="contactErr"></span></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="password" id="password" oninput="validatePassword()"><span id="passwordErr"></span></td>
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
    function validateName() {
        if (document.forms['myForm']['name'].value == "") {
            document.getElementById("nameErr").innerHTML = "Must be filled";
        } else {
            const name_validation = /[A-Za-z]{4,}/;
            if (!document.forms['myForm']['name'].value.match(name_validation)) {
                document.getElementById("nameErr").innerHTML = "Must be filled at least 4 letters";
                return false;
            } else {
                document.getElementById("nameErr").innerHTML = "";
                return true;
            }
        }
    }

    function validateUname() {
        if (document.forms['myForm']['uname'].value == "") {
            document.getElementById("unameErr").innerHTML = "Must be filled";
        } else {
            const uname_validation = /[A-Za-z0-9]{4,}/;
            if (!document.forms['myForm']['uname'].value.match(uname_validation)) {
                document.getElementById("unameErr").innerHTML = "Must be filled at least 4 characters";
                return false;
            } else {
                document.getElementById("unameErr").innerHTML = "";
                return true;
            }
        }
    }

    function validateEmail() {

        if (document.forms['myForm']['email'].value == "") {
            document.getElementById("emailErr").innerHTML = "Must be filled";
        } else {
            const email_validation = /^\w+@\w+\.\w{2,3}$/;
            if (!document.forms['myForm']['email'].value.match(email_validation)) {
                document.getElementById("emailErr").innerHTML = "Invalid Email";
                return false;
            } else {
                document.getElementById("emailErr").innerHTML = "";
                return true;
            }
        }
    }

    function validateContact() {
        if (document.forms['myForm']['contact'].value == "") {
            document.getElementById("contactErr").innerHTML = "Must be filled";
        } else {
            const contact_validation = /^\(?([0][1][0-9]{9})\)?$/;
            if (!document.forms['myForm']['contact'].value.match(contact_validation)) {
                document.getElementById("contactErr").innerHTML = "Number must be filled 11 numeric numbers & start with 01";
                return false;
            } else {
                document.getElementById("contactErr").innerHTML = "";
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
        if (!validateName() || !validateUname() || !validateEmail() || !validateContact() || !validatePassword) {
            return false;
        } else {
            return true;
        }
    }
</script>