<?php include "db.php";
// $id = $_GET['msg'];
// echo $id;
?>
<?php
$sql = "SELECT* FROM product";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {

?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>ProductShow</title>
        <!-- Latest compiled and minified CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .flex-container {
                display: flex;
            }

            .product_box {
                border: 2px solid red;
                margin: 10px;
            }

            span {
                font-weight: 700;
            }

            .product_bottom {
                background-color: yellow;
            }
        </style>
    </head>

    <body>

        <h2>Product List:</h2>


        <div class="flex-container">
            <?php while ($row = mysqli_fetch_assoc($result)) {
                // $productName = $row['productName'];
                // $description = $row['description'];
                // echo $productName;
            ?>
                <div class="product_box">
                    <img width="200px" height="200px" src="./uploads/<?php echo $row['photo'] ?>" alt="image"><br>
                    <div class="product_bottom">
                        <span>Product Title: </span><?php echo $row['productName'] ?><br>
                        <span>Quantity: </span><?php echo $row['quantity'] ?><br>
                        <span>Description: </span><?php echo $row['description'] ?><br>
                    </div>
                </div>
        <?php
            }
        }
        ?>
        </div>

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>