<?php
include "./conn.php";

?>

<body>
    <h4>Electronic Products List</h4>
    <div style="display: flex;" class="products">
        <?php
        $sql = "SELECT * FROM eproducts";
        $result = mysqli_query($conn, $sql);
        if (!mysqli_num_rows($result) > 0) {
            echo "No File in database";
        } else {
            while ($rows = mysqli_fetch_assoc($result)) {
        ?>

                <div style="padding: 5px;margin: 5px; background-color: lightgray;">
                    <a href="./eproduct_detail.php?id=<?php echo $rows['id'] ?>">
                        <img style="width: 150px;" src="./uploads/<?php echo $rows['photo']; ?>" alt=""><br>
                        <p style="text-align: center;"><?php echo $rows['products_name']; ?></p>
                    </a>
                </div>
        <?php
            }
        }

        ?>
    </div>
    <h4><a href="./index.php">Add New Products</a></h4>
</body>