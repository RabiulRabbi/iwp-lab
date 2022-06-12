<?php include "db.php"; ?>
<?php
// echo $_SERVER['PHP_SELF'];
$id = $_GET['id'];
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $department = $_POST['department'];
    $address = $_POST['address'];
    $photo = $_FILES['fileToUpload']['name'];
    // echo "<pre>";
    // print_r($photo);
    // echo $id, $name, $department, $address;
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($photo);

    if ($photo && move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
        move_uploaded_file($_FILES['fileToUpload']['tmp_name'], 'uploads/' . $photo);
        $filename = $photo;
    }

    $sql = "UPDATE teacher SET name = '$name', department = '$department', address = '$address', photo = '$filename' where id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $msg = "update successfully!!!!";
        // header("location: show.php?msg=$msg");
        echo "update!!!!!";
    } else {
        echo "Failed!!!!!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Students Info</title>
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
    <h2>Update teacher's info into database</h2>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <table align="center" border="0">
            <?php
            $id = $_GET['id'];
            // echo $id;
            $sql = "SELECT * FROM teacher where id = '$id'";
            $result = mysqli_query($conn, $sql);
            // print_r($result);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // echo $row['name'];
            ?>
                    <tr>
                        <td>Name: </td>
                        <td><input type="text" name="name" id="name" value="<?php echo $row['name'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Department: </td>
                        <td><input type="text" name="department" id="department" value="<?php echo $row['department'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Address: </td>
                        <td><input type="text" name="address" id="address" value="<?php echo $row['address'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Photo: </td>
                        <td><input type="file" name="fileToUpload" id="fileToUpload" value="<?php echo $row['photo'] ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="update" name="update"></td>
                    </tr>
                    <tr>
                        <td><a href="show.php">Show teacher's</a></td>
                    </tr>
            <?php
                }
            }

            ?>
        </table>
    </form>
</body>

</html>