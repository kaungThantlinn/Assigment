<?php
session_start();
include ('connection.php');
$Sname =$_SESSION['sname'] ;

?>





<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  
    <div class="content">
        <p>Welcome to the Admin Dashboard, <b><?php echo $Sname; ?></b></p>
        <h1>Manage Admin Processes</h1>
    </div>

    <nav class="navbar">
        <ul class="nav-list">
            <li><a href="#">Home</a></li>
            <li><a href="site-entry.php">Add Sites</a></li>
            <li><a href="pitch-type.php">Add PitchType</a></li>
            <li><a href="packagetype.php">Add Pitches</a></li>
            <li><a href="#">Add Packages</a></li>
        </ul>
    </nav>

 
</body> 
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <style>
        .navbar {
  background-color: #333;
  overflow: hidden;
}

.nav-list {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
}

.nav-list li {
  float: left;
}

.nav-list li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.nav-list li a:hover {
  background-color: #555;
}
    </style>
</head>
<body>
  
    <div class="content">
        <p>Welcome to the Admin Dashboard, <b><?php echo $Sname; ?></b></p>
        <h1>Manage Admin Processes</h1>
    </div>

    <nav class="navbar">
        <ul class="nav-list">
            <li><a href="#">Home</a></li>
            <li><a href="site-entry.php">Add Sites</a></li>
            <li><a href="pitch-type.php">Add PitchType</a></li>
            <!-- <li><a href="packagetype.php">Add Pitches</a></li> -->
            <li><a href="packages.php">Add Packages</a></li>
        </ul>
    </nav>

</body> 
</html>



