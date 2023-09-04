<?php

include('./connection.php');


if (isset($_POST['btnregister'])) {
    $name = $_POST['txtSname'];
    $email = $_POST['txtemail'];
    $phone = $_POST['txtphone'];
    $password = $_POST['txtpassword'];
    $position = $_POST['txtposition'];

    $checkemail = "Select * from Admin Where Email ='$email'";
    $result = mysqli_query($connect, $checkemail);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        echo "<script>window.alert('Admin Email already Exist!')</script>";
        echo "<script>window.location='admin.php'</script>";
    } else {
        $result = mysqli_query($connect, $checkemail);
        $insert = "INSERT INTO Admin(AdminName,Email,PhoneNo,Password,Position) Values (' $name','$email','$phone','$password','$position')";
        $finalresult = mysqli_query($connect, $insert);

        if ($finalresult) {
            echo "<script>window.alert('Admin Register Successfully')</script>";
            echo "<script>window.location='admin.php'</script>";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Admin Registration</title>
</head>
<body>
  <div class="container">
    <form action="./admin.php" method="post">
      <h1>Admin Registration Form</h1>
      <div class="input_box">
        <input type="text" name="txtSname" placeholder="Enter Your Full Name" required>
      </div>
      <div class="input_box">
        <input type="email" name="txtemail" placeholder="Enter Your Email" required>
      </div>
      <div class="input_box">
        <input type="text" name="txtphone" placeholder="Enter Your PhoneNo" required>
      </div>
      <div class="input_box">
        <input type="password" name="txtpassword" placeholder="Enter Your Password" required>
      </div>
      <div class="input_box">
        <input type="text" name="txtposition" placeholder="Enter Your Position" required>
      </div>
      <input type="submit" name="btnregister" value="Register">
      <input type="reset" value="Clear">
    </form>
  </div>
</body>
</html>
