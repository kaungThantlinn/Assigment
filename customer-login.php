<?php

session_start();
include ('./connection.php');


if(isset($_POST['btnlogin']))
{
   $email = $_POST['txtcemail'];
   $password = $_POST['txtcpassword'];

   $check ="SELECT * FROM Customers WHERE Email ='$email' AND Password='$password' ";

   $query =mysqli_query($connect,$check);

   $count=mysqli_num_rows($query);

   if($count>0)

        
   {

    $update ="UPDATE Customers set Viewcount=Viewcount + 1 
    WHERE Email ='$email' AND Password='$password'";
        mysqli_query($connect,$update);
        $array = mysqli_fetch_array($query);

        $cid = $array['CustomerID'] ;
        $cfname =$array['CustomerFirstName'];
        $csname =$array['CustomerSurname'];
        $email =$array['Email'];

        $_SESSION['cid'] =$cid;
        $_SESSION['cfname'] =$cfname;
        $_SESSION['csname'] =$csname;
        $_SESSION['cemail'] =$email;

        
        echo "<script>window.alert('Customer Login Successfully')</script>";
        echo "<script>window.location='Home.php'</script>";
   }
   else
   {
        // echo "<script>window.alert('Staff Login Unsuccessfully!')</script>";
        if (isset($_SESSION['loginError'])) 
        {
            $counterror = $_SESSION['loginError'];
            
            if($counterror == 1)
            {
                $_SESSION['loginError']=2;
                echo "<script>window.alert('Login Attempt Two ')</script>";
            }
            elseif ($counterror == 2) 
            {
                echo "<script>window.alert('Login Attempt Three ')</script>";

                echo "<script>window.location ='LoginTimer.php '</script>";
            }
            
        }
        else
        {
            $_SESSION['loginError']=1;
            echo "<script>window.alert('Login Failed Attempt One')</script>";
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
  <title>Admin Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
    }

    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #ffffff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    h1 {
      text-align: center;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    label {
      margin-bottom: 5px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="password"],
    input[type="email"] {
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    input[type="submit"] {
      background-color: #007BFF;
      color: #fff;
      border: none;
      padding: 10px;
      border-radius: 3px;
      cursor: pointer;
      font-weight: bold;
      transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
    }

    .error-message {
      color: red;
      margin-top: 10px;
      text-align: center;
    }
  </style
</head>
<body>
<div class="container">
    <form action="customer.php" method="post">
      <h1>Customer Login</h1>
      <label for="txtcemail">Customer Email</label>
      <input type="email" name="txtcemail" id="txtcemail" placeholder="Enter Your Registered Email" required>

      <label for="txtcpassword">Customer Password</label>
      <input type="password" name="txtcpassword" id="txtcpassword" placeholder="Enter Your Password" required>

      <input type="submit" name="btnlogin" value="Login">
    </form>
</div>
</body>
</html>
