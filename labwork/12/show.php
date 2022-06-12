<?php include "db.php";

if (isset($_GET['msg'])) {
    echo $_GET['msg'];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Students Info</title>
    <style>
        body {
            background-color: lightgray;
        }

        h1,
        td {
            text-align: center;
        }

        a {
            text-align: center;
            text-decoration: none;
            background-color: green;
            padding: 5px 10px;
            color: white;
            border-radius: 10px;
        }

        th {
            background-color: black;
            color: white;
        }

        th,
        td {
            padding: 10px 40px;
            margin: 5px;
        }

        img {
            width: 30px;
            height: 30px;
            border-radius: 20px;
        }
    </style>
</head>

<body>
    <h1 style="text-decoration: underline;">Show students info from database</h1>
    <table align="center">
        <tr>
            <td><a href="registration.php">Register new student</a></td>
        </tr>
    </table>
    <table align="center" border="1">
        <tr>
            <th>Name</th>
            <th>Department</th>
            <th>Adderss</th>
            <th>Photo</th>
            <th>Operations</th>
        </tr>
        <?php
        $sql = "SELECT * FROM student";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>

                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['department'] ?></td>
                    <td><?php echo $row['address'] ?></td>
                    <td><img src="<?php echo 'uploads/' . $row['photo'] ?>"></td>
                    <td><a href="update.php?id=<?php echo $row['id'] ?>">Update</a> | <a href="delete.php?id=<?php echo $row['id'] ?>">Delete</a></td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
</body>

</html>