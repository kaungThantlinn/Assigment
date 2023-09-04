<?php
include ('connection.php');

if(isset($_POST['btnregister']))
{
    $fname = $_POST['txtcfname'];
    $surname = $_POST['txtcsname'];
    $email =  $_POST['txtemail'];
    $address = $_POST['txtaddress'];
    $phone = $_POST['txtphone'];
    $password = $_POST['txtpassword'];

    $check = "SELECT * FROM Customers WHERE Email='$email'";
    
   
    $result = mysqli_query($connect, $check);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        echo "<script>window.alert('Customer Email already Exist!')</script>";
        echo "<script>window.location='customer.php'</script>";
    } else {
        $result = mysqli_query($connect, $check);
        $insert = "INSERT INTO Customers(CustomerFirstName,CustomerSurname,Email,Address,PhoneNo,Viewcount,Password) Values (' $fname','$surname','$email','$address','$phone',1,'$password')";
        $finalresult = mysqli_query($connect, $insert);

        if ($finalresult) {
            echo "<script>window.alert('Customer Register Successfully')</script>";
            echo "<script>window.location='customer.php'</script>";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <form action="customer.php" method="post" enctype="multipart/form-data">
      <h1>Customer Registration Form</h1>
      <div class="input_box">
        <input type="text" name="txtcfname" placeholder="Enter Your First Name" required>
      </div>

      <div class="input_box">
        <input type="text" name="txtcsname" placeholder="Enter Your Surname" required>
      </div>

      <div class="input_box">
        <input type="email" name="txtemail" placeholder="Enter Your Email" required>
      </div>

      <div class="input_box">
        <textarea name="txtaddress" placeholder="Enter Your Address"></textarea>
      </div>


      <div class="input_box">
        <input type="text" name="txtphone" placeholder="Enter Your PhoneNo" required>
      </div>


      <div class="input_box">
        <input type="password" name="txtpassword" placeholder="Enter Your Password" required>
      </div>

      <div class="capcha">
        <input type="checkbox" required>Confirm
        <img src="./images/download.png" alt="">
      </div>
      

      <input type="submit" name="btnregister" value="Register">
      <input type="reset" value="Clear">
    </form>
  </div>
</html>