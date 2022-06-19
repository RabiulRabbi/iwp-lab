<html>

<head>
    <title>Form Validation</title>
    <script type="text/javascript">
    </script>
</head>

<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" name="myForm" onsubmit="return validate();">
        <table border="0">

            <tr>
                <td align="right">Name</td>
                <td><input type="text" id="name" name="name" onkeyup="onkeyup()" /><span style="color: red;" id="n"></span></td>
            </tr>

            <tr>
                <td align="right">EMail</td>
                <td><input type="text" name="EMail" /></td>
            </tr>

            <tr>
                <td align="right">Zip Code</td>
                <td><input type="text" name="Zip" /></td>
            </tr>

            <tr>
                <td align="right">Country</td>
                <td>
                    <select name="Country">
                        <option value="-1" selected>[choose yours]</option>
                        <option value="1">USA</option>
                        <option value="2">UK</option>
                        <option value="3">INDIA</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td align="right"></td>
                <td><input type="submit" value="Submit" /></td>
            </tr>

        </table>
    </form>




    <script type="text/javascript">
        function onkeyup() {

        }


        // Form validation code will come here.
        function validate() {
            // var regName = /^[a-zA-Z]+ [a-zA-Z]+$/;
            var s_name = document.forms["myForm"]["name"].value;
            // console.log(s_name);
            // if (!regName.validate(s_name))
            //     alert("Must be filled out");
            if (s_name == "") {
                document.getElementById("n").innerHTML = "*must be filled";
                return false;
            }
        }
    </script>
</body>

</html>