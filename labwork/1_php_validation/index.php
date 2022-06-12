<?php
$fname = $lname = $email = $s_id = $department = $phone = $birthday = $p_address = $per_address = $religion = $gender = $blood = $fav = $password = $c_password = $file = "";
$fnameErr = $lnameErr = $emailErr = $s_idErr = $departmentErr = $phoneErr = $birthdayErr = $p_addressErr = $per_addressErr = $religionErr = $genderErr = $bloodErr = $favErr = $passwordErr = $c_passwordErr = $fileErr = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $s_id = $_POST['s_id'];
    $department = $_POST['department'];
    $phone = $_POST['phone'];
    $birthday = $_POST['birthday'];
    $p_address = $_POST['p_address'];
    $per_address = $_POST['per_address'];
    $religion = $_POST['religion'];
    if (isset($_POST['gender'])) {
        $gender = $_POST['gender'];
    }
    if (isset($_POST['blood'])) {
        $blood = $_POST['blood'];
    }
    // $fav = $_POST['fav'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $file = $_FILES['file']['name'];
    //fname validation
    if (empty($fname)) {
        $fnameErr = "*Must be filled";
    } else {
        $fname_val = "/['A-Za-z']{4}/";
        if (!preg_match($fname_val, $fname)) {
            $fnameErr = "*Must filled at least 4 letters";
        } else {
            $fnameErr = "";
            $fname;
        }
    }
    //lname validation
    if (empty($lname)) {
        $lnameErr = "*Must be filled";
    } else {
        $lname_val = "/['A-Za-z']{4}/";
        if (!preg_match($lname_val, $lname)) {
            $lnameErr = "*Must filled at least 4 letters";
        } else {
            $lnameErr = "";
            $lname;
        }
    }
    //email validation
    if (empty($email)) {
        $emailErr = "*Must be filled";
    } else {
        $email_val = "/^\w+@\w+(\.\w{2,3})+$/";
        if (!preg_match($email_val, $email)) {
            $emailErr = "*Invalid Email";
        } else {
            $emailErr = "";
            $email;
        }
    }
    //student id validation
    if (empty($s_id)) {
        $s_idErr = "*Must be filled";
    } else {
        $s_id_val = "/^\(?([0-9]{8})\)?$/";
        if (!preg_match($s_id_val, $s_id)) {
            $s_idErr = "*Must be 8 digits";
        } else {
            $s_idErr = "";
            $s_id;
        }
    }
    //department validation
    if (empty($department)) {
        $departmentErr = "*Must be filled";
    } else {
        $departmentErr = "";
        $department;
    }
    //phone number validation
    if (empty($phone)) {
        $phoneErr = "*Must be filled";
    } else {
        $phone_val = "/^\(?([0][1][0-9]{9})?$/";
        if (!preg_match($phone_val, $phone)) {
            $phoneErr = "*Must be 11 digits & start with 01";
        } else {
            $phoneErr = "";
            $phone;
        }
    }
    //present address validation
    if (empty($p_address)) {
        $p_addressErr = "*Must be filled";
    } else {
        $p_addressErr = "";
        $p_address;
    }
    //permanent address validation
    if (empty($per_address)) {
        $per_addressErr = "*Must be filled";
    } else {
        $per_addressErr = "";
        $per_address;
    }
    //religion validation
    if ($religion == "") {
        $religionErr = "*Must be filled";
    } else {
        $religionErr = "";
        $religion;
    }

    //birthday validation
    $today = date("Y-m-d");
    $date = $_POST['birthday'];
    // echo $date;
    if (empty($date)) {
        $birthdayErr = "*Must be filled";
    } else {
        if ($today < $date) {
            $birthdayErr = "*Birthday must be greater than today";
        } else {
            $birthdayErr = "";
            $birthday = $date;
        }
    }
    //gender validation
    if (empty($gender)) {
        $genderErr = "*Must be filled";
    } else {
        $genderErr = "";
        $gender;
    }
    //blood group validation
    if (empty($blood)) {
        $bloodErr = "*Must be filled";
    } else {
        $bloodErr = "";
        $blood;
    }
    //password validation
    if (empty($password)) {
        $passwordErr = "*Must be filled";
    } else {
        $password_val = "/^\(?([A-Za-z0-9]{6,})\)?$/";
        if (!preg_match($password_val, $password)) {
            $passwordErr = "*Must filled at least 6 letters or numerics";
        } else {
            $passwordErr = "";
            $password;
        }
    }
    //confirm password validation
    if (empty($c_password)) {
        $c_passwordErr = "*Must be filled";
    } else {
        if ($c_password != $password) {
            $c_passwordErr = "*Password match failed";
        } else {
            $c_passwordErr = "";
            $c_password;
        }
    }
    //file validation
    if (empty($file)) {
        $fileErr = "*Must be filled";
    } else {

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES['file']['name']);
        $fileUploadOk = 0;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


        // $check = getimagesize($_FILES['file']['tmp_name']);
        // if ($check !== false) {
        //     $fileErr = "File is an image";
        //     $fileUploadOk = 1;
        // } else {
        //     echo "File is not an image";
        //     $fileUploadOk = 0;
        // }

        $filesize = round(($_FILES['file']['size']) / (1024 * 1024), 2);
        // echo $filesize;
        if ($filesize > 2) {
            $fileErr = "*File must be greater than 2 mb";
            $fileUploadOk = 0;
        } else {
            $fileErr = "";
            $fileUploadOk = 1;
        }

        if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
            $fileErr = "*File must be jpg/jpeg formatted";
            $fileUploadOk = 0;
        } else {
            $fileErr = "";
            $fileUploadOk = 1;
        }

        if ($fileUploadOk == 0) {
            echo "File uploaded failed";
        } else {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
                echo "File uploaded successfully";
            } else {
                echo "File uploaded failed";
            }
        }
    }
}


?>
<!DOCTYPE HTML>
<html>

<head>
</head>

<body>
    <h2 style="text-align: center;">PHP Form Validation</h2>
    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
        <!-- <form method="POST" action="action.php" enctype="multipart/form-data" onsubmit="return func()"> -->
        <table align="center">
            <tr>
                <td>First Name: </td>
                <td><input type="text" name="fname" id="fname" value="<?php echo $fname ?>"><span style="color: red;"><?php echo $fnameErr ?></span></td>
            </tr>
            <tr>
                <td>Last Name: </td>
                <td><input type="text" name="lname" id="lname" value="<?php echo $lname ?>"><span style="color: red;"><?php echo $lnameErr ?></span></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="email" name="email" id="email" value="<?php echo $email ?>"><span style="color: red;"><?php echo $emailErr ?></span></td>
            </tr>
            <tr>
                <td>Student Id: </td>
                <td><input type="number" name="s_id" id="s_id" value="<?php echo $s_id ?>"><span style="color: red;"><?php echo $s_idErr ?></span></td>
            </tr>
            <tr>
                <td>Department: </td>
                <td><input type="text" name="department" id="department" value="<?php echo $department ?>"><span style="color: red;"><?php echo $departmentErr ?></span></td>
            </tr>
            <tr>
                <td>Phone: </td>
                <td><input type="text" name="phone" id="phone" value="<?php echo $phone ?>"><span style="color: red;"><?php echo $phoneErr ?></span></td>
            </tr>
            <tr>
                <td>Date of Birth: </td>
                <td><input type="date" name="birthday" id="birthday" value="<?php echo $birthday ?>"><span style="color: red;"><?php echo $birthdayErr ?></span></td>
            </tr>
            <tr>
                <td>Present Address: </td>
                <td><input type=" text" name="p_address" id="p_address" value="<?php echo $p_address ?>"><span style="color: red;"><?php echo $p_addressErr ?></span></td>
            </tr>
            <tr>
                <td>Permanent Address: </td>
                <td><input type="text" name="per_address" id="per_address" value="<?php echo $per_address ?>"><span style="color: red;"><?php echo $per_addressErr ?></span></td>
            </tr>
            <tr>
                <td>Religion</td>
                <td>
                    <select name="religion" id="religion">
                        <option value="">None</option>
                        <option value="Islam" <?php if (isset($religion) && $religion == "Islam") echo "selected"; ?>>Islam</option>
                        <option value="Hinduism" <?php if (isset($religion) && $religion == "Hinduism") echo "selected"; ?>>Hinduism</option>
                        <option value="Buddhism" <?php if (isset($religion) && $religion == "Buddhism") echo "selected"; ?>>Buddhism</option>
                        <option value="Christianity" <?php if (isset($religion) && $religion == "Christianity") echo "selected"; ?>>Christianity</option>
                    </select><span style="color: red;"><?php echo $religionErr ?></span>
                </td>
            </tr>
            <tr>
                <td>Gender: </td>
                <td>
                    <input type="radio" name="gender" id="gender" value="Male" <?php if (isset($gender) && $gender == "Male") echo "checked" ?>>Male
                    <input type="radio" name="gender" id="gender" value="Female" <?php if (isset($gender) && $gender == "Female") echo "checked" ?>>Female
                    <input type="radio" name="gender" id="gender" value="Others" <?php if (isset($gender) && $gender == "Others") echo "checked" ?>>Others
                    <span style="color: red;"><?php echo $genderErr ?></span>
                </td>
            </tr>
            <tr>
                <td>Blood Group: </td>
                <td>
                    <input type="radio" name="blood" id="blood" value="A+" <?php if (isset($blood) && $blood == "A+") echo "checked" ?>>A+
                    <input type="radio" name="blood" id="blood" value="A-" <?php if (isset($blood) && $blood == "A-") echo "checked" ?>>A-
                    <input type="radio" name="blood" id="blood" value="B+" <?php if (isset($blood) && $blood == "B+") echo "checked" ?>>B+
                    <input type="radio" name="blood" id="blood" value="B-" <?php if (isset($blood) && $blood == "B-") echo "checked" ?>>B-
                    <input type="radio" name="blood" id="blood" value="AB+" <?php if (isset($blood) && $blood == "AB+") echo "checked" ?>>AB+
                    <input type="radio" name="blood" id="blood" value="AB-" <?php if (isset($blood) && $blood == "AB-") echo "checked" ?>>AB-
                    <input type="radio" name="blood" id="blood" value="O+" <?php if (isset($blood) && $blood == "O+") echo "checked" ?>>O+
                    <input type="radio" name="blood" id="blood" value="O-" <?php if (isset($blood) && $blood == "O-") echo "checked" ?>>O-
                    <span style="color: red;"><?php echo $bloodErr ?></span>
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
                    <span style="color: red;"><?php echo $favErr ?></span>
                </td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="password" id="password" value="<?php echo $password ?>"><span style="color: red;"><?php echo $passwordErr ?></span></td>
            </tr>
            <tr>
                <td>Confirm Password: </td>
                <td><input type="password" name="c_password" id="c_password" value="<?php echo $c_password ?>"><span style="color: red;"><?php echo $c_passwordErr ?></span></td>
            </tr>
            <tr>
                <td>Photo: </td>
                <td><input type="file" name="file" id="file" value="<?php echo $file ?>"><span style="color: red;"><?php echo $fileErr ?></span></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="submit"></td>
            </tr>
        </table>
    </form>
    <?php

    if ($fnameErr == "" && $lnameErr == "" && $emailErr == "" && $s_idErr == "" && $departmentErr == "" && $phoneErr == "" && $birthdayErr == "" && $p_addressErr == "" && $per_addressErr == "" && $religionErr == "" && $genderErr == "" && $bloodErr == "" && $passwordErr == "" && $c_passwordErr == "") {
        echo "<h4>First name: " . $fname . "</h4>" .
            "<h4>Last name: " . $lname . "</h4>" .
            "<h4>Email: " . $email . "</h4>" .
            "<h4>Student Id: " . $s_id . "</h4>" .
            "<h4>Department: " . $department . "</h4>" .
            "<h4>Phone: " . $phone . "</h4>" .
            "<h4>Birthday: " . $birthday . "</h4>" .
            "<h4>Present Address: " . $p_address . "</h4>" .
            "<h4>Permanent Address: " . $per_address . "</h4>" .
            "<h4>Religion: " . $religion . "</h4>" .
            "<h4>Gender: " . $gender . "</h4>" .
            "<h4>Blood group: " . $blood . "</h4>" .
            "<h4>Password: " . $password . "</h4>" .
            "<h4>Photo: " . $file . "</h4>";
    }

    ?>
    <img src="./uploads/<?php echo $_FILES['file']['name'] ?>" alt="">

</body>

</html>