<?php include "db.php" ?>


<?php
if (isset($_POST['submit'])) {
    $photo = $_FILES['fileToUpload']['name'];
    // echo "<pre>";
    // print_r($photo);
    // echo $photo;

    $sql = "INSERT INTO student (photo)
            VALUES('$photo')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "File uploaded successfully!!!!";
    } else {
        echo "File uploaded failed!!!";
    }
}

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

<html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File upload</title>
</head>

<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <table border="0" align="center">
            <tr>
                <td>Upload File: </td>
                <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="submit" name="submit"></td>
            </tr>
        </table>
    </form>
</body>

</html>