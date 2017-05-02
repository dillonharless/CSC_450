<html>
<body>
Hello:
<?php
    $name = $message = $email = "ll";
    if ($_SERVER["REQUEST_METHOD"] == "post") {
      $name = test_input($_POST["Name"]);
      $email = test_input($_POST["Email"]);
      $message = test_input($_POST["Mmail"]);
    }
    echo $name;
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
 ?>

</body>
</html>
