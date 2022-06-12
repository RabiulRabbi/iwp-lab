<?php
// echo '<pre>';
// print_r($_POST);
// echo '<pre>';
?>

<?php
// echo '<pre>';
// print_r($_POST);
//Let global variable to empty
$name = $fname = $mname = $email = $phone = $id = $birthday = $fav_language = $hobby = $hobbies = $gender = $department = $photo = "";
$nameErr = $fnameErr = $mnameErr = $emailErr = $phoneErr = $idErr = $birthdayErr = $fav_languageErr = $hobbyErr = $hobbiesErr = $gendeErr = $departmentErr = $photoErr = "";
if (isset($_POST['submit'])) {
  if (empty($_POST['name'])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST['name']);
  }

  // echo $name;
  if (empty($_POST['fname'])) {
    $fnameErr = "Fathers name is required";
  } else {
    $fname = test_input($_POST['fname']);
  }
  $mname = test_input($_POST['mname']);
  $email = test_input($_POST['email']);
  $phone = test_input($_POST['phone']);
  $id = test_input($_POST['id']);
  $birthday = test_input($_POST['birthday']);
  if (empty($_POST['fav_language'])) {
    $fav_languageErr = "fav_language is required";
  } else {
    $fav_language = test_input($_POST['fav_language']);
  }

  $hobbies = $_POST['hobby'];

  if (empty($_POST['gender'])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST['gender']);
  }
  $department = test_input($_POST['department']);
}

function test_input($data)
{
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Student form design</title>
  <style>
    span {
      color: red;
    }
  </style>
</head>

<body>
  <form action="action.php" method="POST" onsubmit="return validateForm()" enctype="multipart/form-data">
    <!-- <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data"> -->
    <h1 style="text-align: center">Php Form validation</h1>
    <table align="center">
      <tr>
        <td></td>
        <td><span>* Required field</span></td>
      </tr>
      <tr>
        <td>Name:</td>
        <td><input type="text" id="name" name="name" /><span>* <?php echo $nameErr ?></span><br /></td>
      </tr>
      <tr>
        <td>Fathers Name:</td>
        <td>
          <input type="text" id="fname" name="fname" /><span>* <?php echo $fnameErr ?></span><br />
        </td>
      </tr>
      <tr>
        <td>Mothers Name:</td>
        <td>
          <input type="text" id="mname" name="mname" /><span>* <?php echo $mnameErr ?></span><br />
        </td>
      </tr>
      <tr>
        <td>Email:</td>
        <td><input type="email" id="email" name="email" /><span>* <?php echo $emailErr ?></span><br /></td>
      </tr>
      <tr>
        <td>Phone:</td>
        <td>
          <input type="number" id="phone" name="phone" /><span>* <?php echo $phoneErr ?></span><br />
        </td>
      </tr>
      <tr>
        <td>Student Id:</td>
        <td><input type="number" id="id" name="id" /><span>* <?php echo $idErr ?></span><br /></td>
      </tr>
      <tr>
        <td>Birthday:</td>
        <td>
          <input type="date" id="birthday" name="birthday" /><span>* <?php echo $birthdayErr ?></span><br />
        </td>
      </tr>
      <tr>
        <td>Choose your favourite language:</td>
        <td>
          <input type="radio" value="html" id="html" name="fav_language" />
          <label for="html">HTML</label>
          <input type="radio" value="css" id="css" name="fav_language" />
          <label for="css">CSS</label>
          <input type="radio" value="javascript" id="javascript" name="fav_language" />
          <label for="javascript">JavaScript</label>
          <input type="radio" value="php" id="php" name="fav_language" />
          <label for="php">PHP</label><br />
          <span>* <?php echo $fav_languageErr ?></span>
        </td>
      </tr>
      <tr>
        <td>Choose your hobby:</td>
        <td>
          <input type="checkbox" name="hobby[]" value="Writing" />
          <label for="writing">Writing</label><br />
          <input type="checkbox" name="hobby[]" value="Reading" />
          <label for="reading">Reading</label><br />
          <input type="checkbox" name="hobby[]" value="Gardening" />
          <label for="gardening">Gardening</label><br />
          <input type="checkbox" name="hobby[]" value="Car Driving" />
          <label for="driving">Car Driving</label><br />
          <span>* <?php echo $hobbyErr ?></span>
        </td>
      </tr>
      <tr>
        <td>Select Gender:</td>
        <td>
          <select id="gender" name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="others">Others</option>
          </select><br />
        </td>
      </tr>
      <tr>
        <td>Choose Department:</td>
        <td>
          <select id="department" name="department">
            <option value="cse">CSE</option>
            <option value="eee">EEE</option>
            <option value="ese">ESE</option>
          </select><br />
        </td>
      </tr>
      <tr>
        <td>Photo:</td>
        <td>
          <input type="file" name="photo" id="photo" /><br />
        </td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" value="submit" name="submit" /></td>
      </tr>
    </table>
  </form>
</body>

</html>