<?php
$conn = mysqli_connect('localhost', 'root', '', 'labwork');
if (!$conn) {
    die("connection failed") . mysqli_connect_error();
}
?>
<?php
if (extract($_POST)) {
    foreach ($fav as $fav_language) {
        $fav_data .= $fav_language . " ";
        if (empty($_POST["fav_data"])) {
            $fav_data = "";
        } else {
            $fav_data;
        }
    }

    if (empty($_POST["blood"])) {
        $blood = "";
    } else {
        $blood;
    }
    if (empty($_POST["gender"])) {
        $gender = "";
    } else {
        $gender;
    }

    // $fav_data = serialize($fav);
    // echo $fav_data;
    $sql = "INSERT INTO student6(fname,lname,email,s_id,department,phone,birthday,p_address,per_address,religion,gender,blood,fav_language,password,c_password)
        VALUES('$fname','$lname','$email','$s_id','$department','$phone','$birthday','$p_address','$per_address','$religion','$gender','$blood','$fav_data','$password','$c_password')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Insert data in database successfully";
    } else {
        echo "Insert failed info in db ";
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
    <?php $empty = ""; ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <h1 style="text-align: center;">Student's Profile Form</h1>
        <table align="center">
            <tr>
                <td>First Name: </td>
                <td><input type="text" name="fname" id="fname" required></td>
            </tr>
            <tr>
                <td>Last Name: </td>
                <td><input type="text" name="lname" id="lname"></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="email" name="email" id="email"></td>
            </tr>
            <tr>
                <td>Student Id: </td>
                <td><input type="number" name="s_id" id="s_id"></td>
            </tr>
            <tr>
                <td>Department: </td>
                <td><input type="text" name="department" id="department"></td>
            </tr>
            <tr>
                <td>Phone: </td>
                <td><input type="number" name="phone" id="phone"></td>
            </tr>
            <tr>
                <td>Date of Birth: </td>
                <td><input type="date" name="birthday" id="birthday"></td>
            </tr>
            <tr>
                <td>Present Address: </td>
                <td><input type="text" name="p_address" id="p_address"></td>
            </tr>
            <tr>
                <td>Permanent Address: </td>
                <td><input type="text" name="per_address" id="per_address"></td>
            </tr>
            <tr>
                <td>Religion</td>
                <td>
                    <select name="religion" id="religion">
                        <option value="Islam">Islam</option>
                        <option value="Hinduism">Hinduism</option>
                        <option value="Buddhism">Buddhism</option>
                        <option value="Christianity">Christianity</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Gender: </td>
                <td>
                    <input type="radio" name="gender" id="gender" value="male">Male
                    <input type="radio" name="gender" id="gender" value="female">Female
                    <input type="radio" name="gender" id="gender" value="others">Others
                </td>
            </tr>
            <tr>
                <td>Blood Group: </td>
                <td>
                    <input type="radio" name="blood" id="blood" value="A+">A+
                    <input type="radio" name="blood" id="blood" value="A-">A-
                    <input type="radio" name="blood" id="blood" value="AB+">AB+
                    <input type="radio" name="blood" id="blood" value="AB-">AB-
                    <input type="radio" name="blood" id="blood" value="O+">O+
                    <input type="radio" name="blood" id="blood" value="O-">O-
                </td>
            </tr>
            <tr>
                <td>Favorite Language: </td>
                <td>
                    <input type="checkbox" name="fav[]" value="HTML" id="html">HTML
                    <input type="checkbox" name="fav[]" value="PHP" id="php">PHP
                    <input type="checkbox" name="fav[]" value="REACT" id="react">REACT
                    <input type="checkbox" name="fav[]" value="JAVA" id="java">JAVA
                    <input type="checkbox" name="fav[]" value="PYTHON" id="python">PYTHON
                </td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td>Confirm Password: </td>
                <td><input type="password" name="c_password" id="c_password"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="submit"></td>
            </tr>
        </table>
    </form>
</body>

</html>