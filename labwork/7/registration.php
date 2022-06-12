<?php include "db.php"; ?>
<?php
if (isset($_POST['submit'])) {
    $photo = $_FILES['fileToUpload']['name'];
    // echo "<pre>";
    // print_r($photo);

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($photo);
    $uploadOk = 1;

    if ($uploadOk = 0) {
        echo "Upload photo failed!!!!!";
    } else {
        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
            echo "Photo uploaded successfully!!!!!!";
        } else {
            echo "Photo uploaded failed!!!!!";
        }
    }
}
?>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $department = $_POST['department'];
    $address = $_POST['address'];
    $photo = $_FILES['fileToUpload']['name'];

    $sql = "INSERT INTO teacher (name, department, address, photo)
        VALUES('$name','$department','$address','$photo')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $msg = "Teacher's Information Added Successfully!!!!";
        header("location: show.php?msg=$msg");
        // echo " add!! ";
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

    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <table align="center" border="0">

            <h2>Registration Teacher's profile</h3>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name" id="name" placeholder="name..."></td>
                </tr>
                <tr>
                    <td>Department:</td>
                    <td><input type="text" name="department" placeholder="dept name..."></td>
                </tr>
                <tr>
                    <td>Address: </td>
                    <td><input type="text" name="address" placeholder="address..."></td>
                </tr>
                <tr>
                    <td>Photo: </td>
                    <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="submit" name="submit"></td>
                </tr>
                <tr>
                    <td><a href="show.php">Show teacher's</a></td>
                </tr>
        </table>
    </form>
</body>

</html>