<?php
include "./conn.php";
$id = $_GET['id'];
?>

<body>
    <h3 style="text-align: center;">Products Detail Information</h3>
    <?php
    $sql = "SELECT* FROM eproducts where id = '$id'";
    $result = mysqli_query($conn, $sql);
    if (!mysqli_num_rows($result) > 0) {
        echo "No data in database";
    } else {
        while ($rows = mysqli_fetch_assoc($result)) {
    ?>
            <table border="0" align="center">
                <tr>
                    <td>Photo</td>
                    <td><img style="width: 150px;" src="./uploads/<?php echo $rows['photo']; ?>" alt=""></td>
                </tr>
                <tr>
                    <td>Product Name: </td>
                    <td><?php echo $rows['products_name']; ?></td>
                </tr>
                <tr>
                    <td>Product Description: </td>
                    <td><?php echo $rows['products_description']; ?></td>
                </tr>
                <tr>
                    <td>Quantity: </td>
                    <td><?php echo $rows['quantity']; ?></td>
                </tr>
                <tr>
                    <td>
                        <h3><a href="./show.php">Show All Products</a></h3>
                    </td>
                </tr>
            </table>
    <?php
        }
    }
    ?>
</body>