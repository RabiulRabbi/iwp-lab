<?php
include "./conn.php";
$id = $_GET['id'];
$sql = "SELECT * FROM graduate where id = '$id'";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "query connection failed";
} else {
    if (!mysqli_num_rows($result) > 0) {
        echo "No data in database";
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            $fname = $row['fname'];
            // echo $fname;
?>
            <html>

            <head>
                <style>
                    th {
                        text-align: left;
                    }
                </style>
            </head>

            <body>
                <table style="border: 1px solid black; padding: 10px;" border="0" align="center">
                    <tr>
                        <td>
                            <h3>General Informations: </h3>
                        </td>
                    </tr>
                    <tr>
                        <td>Photo: </td>
                        <td><img width="200px" src="./uploads/<?php echo $row['photo'] ?>" alt=""></td>
                    </tr>
                    <tr>
                        <th>Name: </th>
                        <td><?php echo $row['fname'] . " " . $row['lname'] ?></td>
                    </tr>
                    <tr>
                        <th>Fathers Name: </th>
                        <td><?php echo $row['fathers_name'] ?></td>
                        <th>Mothers Name: </th>
                        <td><?php echo $row['mothers_name'] ?></td>
                    </tr>
                    <tr>
                        <th>Email: </th>
                        <td><?php echo $row['email'] ?></td>
                        <th>Birthdate: </th>
                        <td><?php echo $row['birthdate'] ?></td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Requirements for SSC: </h3>
                        </td>
                    </tr>
                    <tr>
                        <th>Roll: </th>
                        <td><?php echo $row['ssc_roll'] ?></td>
                        <th>Registration: </th>
                        <td><?php echo $row['ssc_reg'] ?></td>
                    </tr>
                    <tr>
                        <th>Board: </th>
                        <td><?php echo $row['ssc_board'] ?></td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Requirements for HSC: </h3>
                        </td>
                    </tr>
                    <tr>
                        <th>Roll: </th>
                        <td><?php echo $row['hsc_roll'] ?></td>
                        <th>Registration: </th>
                        <td><?php echo $row['hsc_reg'] ?></td>
                    </tr>
                    <tr>
                        <th>Board: </th>
                        <td><?php echo $row['hsc_board'] ?></td>
                    </tr>
                    <tr>
                        <td>
                            <h2><a style="color: red;" href="./show.php"><?php echo '<--' ?>Back</a></h2>
                        </td>
                    </tr>
                </table>
            </body>

            </html>

<?php
        }
    }
}
