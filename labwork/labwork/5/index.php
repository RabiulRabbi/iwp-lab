<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>php form</title>
  <style>
    h1 {
      text-align: center;
      color: crimson;
    }

    th {
      padding: 15px;
    }

    td {
      padding: 0px 10px;
    }

    input,
    select {
      border: none;
      padding: 10px;
    }

    .item {
      color: chocolate;
      font-weight: 700;
    }

    .center {
      margin: auto;
    }

    button {
      padding: 10px;
    }
  </style>
</head>

<body>
  <form action="action.php" method="POST" enctype="multipart/form-data">
    <table class="center" border="1" width="50%">
      <h1>Student Information Form</h1>
      <tr>
        <th>Item</th>
        <th>Value</th>
      </tr>
      <tr>
        <td class="item">Name</td>
        <td>
          <input type="text" value="" name="name" placeholder="Enter name.." autofocus />
        </td>
      </tr>
      <tr>
        <td class="item">Father's Name</td>
        <td>
          <input type="text" value="" name="fname" placeholder="Enter father's name.." />
        </td>
      </tr>
      <tr>
        <td class="item">Mother's Name</td>
        <td>
          <input type="text" value="" name="mname" placeholder="Enter mother's name.." />
        </td>
      </tr>
      <tr>
        <td class="item">Email</td>
        <td>
          <input type="email" value="" name="email" placeholder="Enter email.." />
        </td>
      </tr>
      <tr>
        <td class="item">Education Level</td>
        <td>
          <select name="education" id="education">
            <option value="">None</option>
            <option value="SSC">SSC</option>
            <option value="HSC">HSC</option>
            <option value="BSc">BSc</option>
            <option value="MSc">MSc</option>
            <option value="PhD">PhD</option>
          </select>
        </td>
      </tr>
      <tr>
        <td class="item">Roll</td>
        <td>
          <input type="number" value="" name="roll" placeholder="Enter roll.." />
        </td>
      </tr>
      <tr>
        <td class="item">Department</td>
        <td>
          <input type="text" value="" name="dname" placeholder="Enter department name.." />
        </td>
      </tr>
      <tr>
        <td class="item">Session</td>
        <td>
          <select name="session" id="session">
            <option value="">None</option>
            <option value="2016-17">2016-17</option>
            <option value="2017-18">2017-18</option>
            <option value="2018-19">2018-19</option>
            <option value="2019-20">2019-20</option>
            <option value="2020-21">2020-21</option>
          </select>
        </td>
      </tr>
      <tr>
        <td class="item">Address</td>
        <td>
          <input type="text" name="address" id="address" placeholder="Enter address.." />
        </td>
      </tr>
      <tr>
        <td class="item">Blood Group</td>
        <td>
          <input type="radio" name="blood" id="blood" value="A+" />A+
          <input type="radio" name="blood" id="blood" value="A-" />A-
          <input type="radio" name="blood" id="blood" value="B+" />B+
          <input type="radio" name="blood" id="blood" value="B-" />B-
          <input type="radio" name="blood" id="blood" value="AB+" />AB+
          <input type="radio" name="blood" id="blood" value="AB-" />AB-
          <input type="radio" name="blood" id="blood" value="O+" />O+
          <input type="radio" name="blood" id="blood" value="O-" />O-
        </td>
      </tr>
      <tr>
        <td class="item">Photo</td>
        <td><input type="file" name="fileToUpload" id="fileToUpload" /></td>
      </tr>
      <tr>
        <td></td>
        <td><button type="submit" name="submit">Submit</button></td>
      </tr>
    </table>
  </form>
</body>

</html>