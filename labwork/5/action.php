<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Database Connection -->
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "labwork";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $email = $_POST['email'];
        $education = $_POST['education'];
        $roll = $_POST['roll'];
        $department = $_POST['dname'];
        $session = $_POST['session'];
        $address = $_POST['address'];
        $blood_grp = $_POST['blood'];




        $sql = "INSERT INTO student (name, fname, mname, email, education_level, roll, department, session, address, blood_group)
          VALUES ('$name', '$fname','$mname','$email', '$education', '$roll', '$department', '$session', '$address', '$blood_grp')";
        if ($conn->query($sql)) {
            echo "Data created Successfully";
        } else {
            echo "Data created failed!!!";
        }
    } else {
        $_SESSION['error'] = 'Fill up add form first';
    }
    ?>
</body>

</html>