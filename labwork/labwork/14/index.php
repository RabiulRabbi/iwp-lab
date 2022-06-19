//without form validation

<?php
$conn = mysqli_connect("localhost", "root", "", "labwork");
if (!$conn) {
    echo "Database connection error.";
}

if (extract($_POST)) {
    // echo $fname;

    $sql = "INSERT INTO graduate (fname,lname,fathers_name,mothers_name,email,birthdate,ssc_roll,ssc_reg,ssc_board,hsc_roll,hsc_reg,hsc_board,photo) VALUES('$fname','$lname','$fathers_name','$mname','$email','$birthdate','$ssc_roll','$ssc_reg','$ssc_board','$hsc_roll','$hsc_reg','$hsc_board','default.jpg')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "successfully inserted";
        if (isset($_FILES['file'])) {
            $file_name = $_FILES['file']['name'];
            $tmp_name = $_FILES['file']['tmp_name'];
            $last_id = mysqli_insert_id($conn);
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $new_name = $last_id . "." . $file_ext;

            $target_dir = "./uploads/";
            $target_file = $target_dir . $new_name;
            move_uploaded_file($tmp_name, $target_file);
            $sql = "UPDATE graduate SET photo = '$new_name' WHERE id = '$last_id'";
            if (mysqli_query($conn, $sql)) {
                echo "successfully uploaded";
                header("location: show.php?msg='Updated successfully'");
            } else {
                echo "upload Failed";
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
    <style>
        table {
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="application-form">
        <h2 style="text-align: center;">Graduate application Form</h2>
        <form name="myForm" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
            <table border="0" align="center">
                <tr>
                    <td>
                        <h4>General Informations: </h4>
                    </td>
                </tr>
                <tr>
                    <td>First Name: </td>
                    <td><input type="text" name="fname" id="fname"></td>
                    &nbsp;
                    <td>Last Name: </td>
                    <td><input type="text" name="lname" id="lname"></td>
                </tr>
                <tr>
                    <td>Fathers Name: </td>
                    <td><input type="text" name="fathers_name" id="fatherName"></td>
                    <td>Mothers Name: </td>
                    <td><input type="text" name="mname" id="mname"></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><input type="email" name="email" id="email"></td>
                    <td>Birthdate: </td>
                    <td><input type="date" name="birthdate" id="birthdate"></td>
                </tr>
                <tr>
                    <td>
                        <h4>Requirements for SSC: </h4>
                    </td>
                </tr>
                <tr>
                    <td>Roll: </td>
                    <td><input type="number" name="ssc_roll" id="sroll"></td>
                    <td>Registration: </td>
                    <td><input type="number" name="ssc_reg" id="sreg"></td>
                </tr>
                <tr>
                    <td>Board: </td>
                    <td><select name="ssc_board" id="ssc_board">
                            <option value="">None</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Mymensingh">Mymensingh</option>
                        </select></td>
                </tr>
                <tr>
                    <td>
                        <h4>Requirements for HSC: </h4>
                    </td>
                </tr>
                <tr>
                    <td>Roll: </td>
                    <td><input type="number" name="hsc_roll" id="hroll"></td>
                    <td>Registration: </td>
                    <td><input type="number" name="hsc_reg" id="hreg"></td>
                </tr>
                <tr>
                    <td>Board: </td>
                    <td><select name="hsc_board" id="hsc_board">
                            <option value="">None</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Mymensingh">Mymensingh</option>
                        </select></td>
                </tr>
                <tr>
                    <td>
                        <h4>Photos:</h4>
                    </td>
                </tr>
                <tr>
                    <td>Photo: </td>
                    <td><input type="file" name="file" id="file"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" value="submit" name="submit"></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <h3><a style="color: red" href="./show.php">Show Applicants</a></h3>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>