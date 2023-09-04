<?php
session_start();
include ('connection.php');


if(!isset($_SESSION['sid'])){
        echo "<script>window.alert('Admin Login Failed')</script>";
        echo "<script>window.location='AdminLogin.php'</script>";
}

if(isset($_POST['btnsubmit'])){
    $Sname=$_POST['txtsitename'];
    $location=$_POST['txtlocation'];

    $check ="SELECT * FROM Campsite WHERE CampsiteName ='$Sname' AND Location='$location' ";

    $query =mysqli_query($connect,$check);
 
    $count=mysqli_num_rows($query);

    if ($count > 0) {
        echo "<script>window.alert('Admin Login Failed')</script>";
        echo "<script>window.location='site-entry.php'</script>";
    } else {
        // $result = mysqli_query($connect, $checkemail);
        $insert = "INSERT INTO Campsite(CampsiteName,Location) Values ('$Sname','$location')";
        $finalresult = mysqli_query($connect, $insert);
    
        if ($finalresult) {
            echo "<script>window.alert('Successfully Data Inserted')</script>";
            echo "<script>window.location='site-entry.php'</script>";
        }
    }
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Campsite</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h2>Add Campsite</h2>
        <form action="site-entry.php" method="post">
            <label for="txtsitename">Campsite Name</label><br>
            <input type="text" id="txtsitename" name="txtsitename" placeholder="Enter Campsite Name" required><br>

            <label for="txtlocation">Location</label><br>
            <input type="text" id="txtlocation" name="txtlocation" placeholder="Enter Location" required><br>

            <input type="submit" name="btnsubmit" value="Save">
        </form>
    </div>


    <table border="1px">
        <legend>Campsite Listing</legend> 
        <?php

            $select="SELECT * FROM Campsite";
            $query=mysqli_query($connect,$select);
            $count=mysqli_num_rows($query);

            if($count==0){
                echo "<p>No Record</p>";
            }



            ?>        
    
   
    <table border="1px">
        <tr>
            <th>ID</th>
            <th>Campsite Name</th>
            <th>Location</th>
            <th>Action</th>
        </tr>

        <?php

            for ($i=0; $i < $count ; $i++) { 
                $row=mysqli_fetch_array($query);
                $id =$row['CampsiteID'];
                $name= $row['CampsiteName'];
                $location=$row['Location'];

                echo "<tr>";

                echo "<td>$id</td>";
                echo "<td>$name</td>";
                echo "<td>$location</td>";
                echo "<td>
                    <a href='sitedelete.php?SID=$id'>Delete</a>
                    <a href='siteupdate.php?SID=$id'>Update</a>
                   
                </td>";

                echo "</tr>";


            }
        ?>

    </table>

</table>
</body>
</html>
