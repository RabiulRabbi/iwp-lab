<?php
$conn = mysqli_connect("localhost", "root", "", "labwork");
if (isset($_GET['msg'])) {
    echo $_GET['msg'];
}
$sql = "SELECT * FROM graduate";
$result = mysqli_query($conn, $sql);
if (!mysqli_num_rows($result) > 0) {
    echo "No data in database.";
} else {
    echo "<h3>List of Applicants</h3>";
    while ($row = mysqli_fetch_assoc($result)) {
        // echo $row['fname'];
        // echo $row['lname'];
        // echo $row['fathers_name'];
?>
        <ul type="circle">
            <li>
                <h4><a style="text-decoration: none;" href="./showDetails.php?id=<?php echo $row['id'] ?>"><?php echo $row['fname'] . " " . $row['lname'] ?></a></h4>
            </li>
        </ul>
<?php
    }
    echo "<h3><a href='./index.php'>Back</a></h3>";
}
?>