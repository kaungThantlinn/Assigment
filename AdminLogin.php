<?php

session_start();
include ('./connection.php');


if(isset($_POST['btnlogin']))
{
   $email = $_POST['txtsemail'];
   $password = $_POST['txtspassword'];

   $check ="SELECT * FROM Admin WHERE Email ='$email' AND Password='$password' ";

   $query =mysqli_query($connect,$check);

   $count=mysqli_num_rows($query);

   if($count>0)
   {
        $array = mysqli_fetch_array($query);

        $sid = $array['AdminID'] ;
        $sname =$array['AdminName'];
        $semail =$array['Email'];

        $_SESSION['sid'] =$sid;
        $_SESSION['sname'] =$sname;
        $_SESSION['semail'] =$semail;

        
        echo "<script>window.alert('Admin Login Successfully')</script>";
        echo "<script>window.location='Dashboard.php'</script>";
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
</head>
<body>
  <div class="container">
    <form action="AdminLogin.php" method="post">
      <h1>Admin Login</h1>
      <label for="txtsemail">Admin Email</label>
      <input type="email" name="txtsemail" id="txtsemail" placeholder="Enter Your Registered Email" required>

      <label for="txtspassword">Admin Password</label>
      <input type="password" name="txtspassword" id="txtspassword" placeholder="Enter Your Password" required>

      <input type="submit" name="btnlogin" value="Login">
      <a href="./admin.php">Register</a>
    </form>
  </div>
</body>
</html>
