<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "university";

    $conn = mysqli_connect($server, $user, $pass, $db);

    if($conn){
       
    }

    if(isset($_POST["submit"])){
        extract($_POST);

        $sql = "INSERT INTO imagegallery(title, image) VALUES('$title','default.jpg')";

        if(mysqli_query($conn, $sql)){
            if(isset($_FILES['image'])){
                $error = array();
                $last_id = mysqli_insert_id($conn);
                $file_name = $_FILES['image']['name'];
                $file_size =$_FILES['image']['size'];
                $file_tmp =$_FILES['image']['tmp_name'];
                $file_type=$_FILES['image']['type'];
        
                $file_ext=strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        
                $extensions= array("jpeg","jpg","png");
        
                if(in_array($file_ext,$extensions)=== false){
                    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                 }
                 
                 if($file_size > 10097152){
                    $errors[]='File size must be excately 10 MB';
                 }
                 
                 if(empty($errors)==true){
                    $new_name = $last_id.".".$file_ext;
                    move_uploaded_file($file_tmp,"uploads/".$new_name);
                    $sql = "UPDATE imagegallery SET image = '$new_name' WHERE id='$last_id'";
                    if(mysqli_query($conn, $sql)){
                        echo "Successfully data inserted!!";
                    }
                 }else{
                    print_r($errors);
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
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }
        .gallery-heading{
            padding:10px;
            background-color:#f7f7f7;
            display:flex;
            justify-content:space-between;
        }
        .gallery{
            display:flex;
            flex-wrap:wrap;
        }
        .image-item{
            width:20%;
            padding:10px;
        }
        .image-item h3{
            text-align: center;
            margin-top:20px;
        }
    </style>
</head>
<body>
    <div class="gallery-heading">
        <h1 class="title">Image Gallery</h1>
        <div>
         <form enctype="multipart/form-data" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <table align="center">
                <tr>
                    <td>Title:</td>
                    <td><input type="text" name="title" required></td>
                </tr>
                <tr>
                    <td>Upload Image:</td>
                    <td><input type="file" name="image" required></td>
                </tr>
                <tr>
                    <td><input type="submit" value="submit" name="submit"></td>
                    <td></td>
               </tr>
            </table> 
        </form>
        </div>
    </div>
    <div class="gallery">
        <?php
            $sql = "SELECT * FROM imagegallery";

            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($result)){
                echo "<div style='width:20%' class='image-item'>
                <div style='background-color:#ddd; padding:10px'>
                    <img style='width:100%' src='uploads/".$row['image']."'/>
                    <h3>".$row['title']."</h3>
                </div>
                </div>";
            }

        ?>
    </div>
</body>
</html>