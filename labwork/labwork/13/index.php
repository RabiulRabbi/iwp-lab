<?php
$conn = mysqli_connect("localhost", "root", "", "labwork");
$fileError =  "";
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $file_name = $_FILES['file']['name'];
    $file_type = $_FILES['file']['type'];
    $file_tmp_name = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    // echo $file_size / (1000 * 1000);
    // echo "<pre>";
    // print_r($_FILES['file']);

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES['file']['name']);
    $uploadOk = 1;

    if ($file_size / (1000 * 1000) > 4) {
        $fileError = "File must be less than 4 mb";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "File was not to be uploaded";
    } else {
        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
            echo "Image inserted successfully";

            $sql = "INSERT INTO gallery (title,photo) VALUES ('$title','$file_name')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "successfully uploaded";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
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
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .header {
            display: flex;
            justify-content: space-around;
        }

        .gallery {
            display: flex;
            flex-wrap: wrap;
            width: 90%;
            margin: auto;
        }

        .image-item {
            width: 19%;
            background-color: lightgray;
            padding: 10px;
            border: 1px solid green;
            margin: 6px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Gallery (Image)</h2>
        <div>
            <h3>Add image:</h3>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                <table align="center" border="0">
                    <tr>
                        <td>Title: </td>
                        <td><input type="text" name="title" id="title" required></td>
                    </tr>
                    <tr>
                        <td>Photo: </td>
                        <td><input type="file" name="file" id="file" required>
                            <br><span style="color: red;" id="fileError"><?php echo $fileError; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Add" name="submit"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <div class="gallery">
        <?php
        $sql = "SELECT * FROM gallery";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // echo "
                // <div class='image-item'>
                // <img style='width: 100%; padding: 10px;' src='./uploads/" . $row['photo'] . "' alt='photo'> " . "
                //     <h4>" . $row['title'] . "</h4>
                // </div>
                // ";
        ?>
                <div class="image-item">
                    <img style="width: 100%; padding: 10px;" src="./uploads/<?php echo $row['photo'] ?>" alt="photo">
                    <h4 style="text-align: center;"><?php echo $row['title'] ?></h4>
                </div>
        <?php
            }
        }
        ?>
    </div>
</body>

</html>