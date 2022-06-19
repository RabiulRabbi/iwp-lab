<?php
include "./conn.php";
if (extract($_POST)) {
    // if (isset($_FILES['file'])) {
    //     $file_name = $_FILES['file']['name'];

    $sql = "INSERT INTO eproducts (products_name, products_description, quantity,photo) VALUES('$pname','$pDescription','$quantity','default.jpg')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Added successfully";
        if (isset($_FILES['file'])) {
            $file_name = $_FILES['file']['name'];
            $tmp_name = $_FILES['file']['tmp_name'];
            $last_id = mysqli_insert_id($conn);
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $new_name = $last_id . "." . $file_ext;

            $target_dir = "./uploads/";
            $target_file = $target_dir . $new_name;
            move_uploaded_file($tmp_name, $target_file);
            $sql = "UPDATE eproducts set photo = '$new_name' WHERE id = '$last_id'";
            if (mysqli_query($conn, $sql)) {
                echo "Insert successfully";
                header("location: show.php");
            } else {
                echo "Insertion  failed";
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
    <form name="myForm" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" onsubmit="return onsubmitFunc();">
        <h3 style="text-align: center;">New Product ADD</h3>
        <table border="0" align="center">
            <tr>
                <td>Product Name: </td>
                <td><input type="text" name="pname" id="pname" oninput="validateName();"> <span id="pnameErr"></span></td>
            </tr>
            <tr>
                <td>Product Description: </td>
                <td><input type="text" name="pDescription" id="pDescription" oninput="validateDescription();"><span id="descriptionErr"></span></td>
            </tr>
            <tr>
                <td>Quantity: </td>
                <td><input type="number" name="quantity" id="quantity" oninput="validateQuantity();"><span id="quantityErr"></span></td>
            </tr>
            <tr>
                <td>Photo</td>
                <td><input type="file" name="file" id="file"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="submit" name="submit"></td>
            </tr>
            <tr>
                <td>
                    <h3><a href="./show.php?">Show Products</a></h3>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
<script>
    function validateName() {
        if (document.forms['myForm']['pname'].value == "") {
            document.getElementById("pnameErr").innerHTML = "Must be filled";
        } else {
            const pname_val = /[A-Za-z]{4}/;
            if (!document.forms['myForm']['pname'].value.match(pname_val)) {
                document.getElementById("pnameErr").innerHTML = "Must be at least 4 characters";
                return false;
            } else {
                document.getElementById("pnameErr").innerHTML = "OK";
                return true;
            }
        }
    }

    function validateDescription() {
        if (document.forms['myForm']['pDescription'].value == "") {
            document.getElementById("descriptionErr").innerHTML = "Must be filled";
        } else {
            const description_val = /[A-Za-z]{10}/;
            if (!document.forms['myForm']['pDescription'].value.match(description_val)) {
                document.getElementById("descriptionErr").innerHTML = "Must be at least 10 characters";
                return false;
            } else {
                document.getElementById("descriptionErr").innerHTML = "OK";
                return true;
            }
        }
    }

    function validateQuantity() {
        if (document.forms['myForm']['quantity'].value == "") {
            document.getElementById("quantityErr").innerHTML = "Must be filled";
        } else {
            const quantity_val = /[0-9]{1,}/;
            if (!document.forms['myForm']['quantity'].value.match(quantity_val)) {
                document.getElementById("quantityErr").innerHTML = "Input value must be grater than 0";
                return false;
            } else {
                document.getElementById("quantityErr").innerHTML = "OK";
                return true;
            }
        }
    }

    function onsubmitFunc() {
        if (!validateName() || !validateDescription() || !validateQuantity()) {
            return false;
        } else {
            return true;
        }
    }
</script>