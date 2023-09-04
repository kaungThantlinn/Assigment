<?php
session_start();

include ('./connection.php');


if(!isset($_SESSION['sid'])){
        echo "<script>window.alert('Admin Login Failed')</script>";
        echo "<script>window.location='AdminLogin.php'</script>";
}

if(isset($_POST['btnsubmit'])){
    $type=$_POST['txttype'];
    

    $check ="SELECT * FROM PitchType WHERE PitchTypeName ='$type'  ";

    $query =mysqli_query($connect,$check);
 
    $count=mysqli_num_rows($query);

    if ($count > 0) {
        echo "<script>window.alert('Admin Login Failed')</script>";
        echo "<script>window.location='pitch-type.php'</script>";
    } else {
        // $result = mysqli_query($connect, $checkemail);
        $insert = "INSERT INTO PitchType(PitchTypeName) Values ('$type')";
        $finalresult = mysqli_query($connect, $insert);
    
        if ($finalresult) {
            echo "<script>window.alert('Successfully Data Inserted')</script>";
            echo "<script>window.location='pitch-type.php'</script>";
        }
    }
}


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add PitchType</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="form-container">
        <h2>Add PitchType</h2>
        <form action="pitch-type.php" method="post">
            <label for="txttype">PitchType Name</label><br>
            <input type="text" id="txttype" name="txttype" required><br>

            <input type="submit" name="btnsubmit" value="Save">
        </form>
    </div>
   


<table border="1px">
        <legend>PitchType Listing</legend> 
        <?php

            $select="SELECT * FROM PitchType";
            $query=mysqli_query($connect,$select);
            $count=mysqli_num_rows($query);

            if($count==0){
                echo "<p>No Record</p>";
            }



            ?>        
    
   
    <table border="1px">
        <tr>
            <th>ID</th>
            <th>PitchType Name</th>
            <th>Action</th>
        </tr>

        <?php

            for ($i=0; $i < $count ; $i++) { 
                $row=mysqli_fetch_array($query);
                $id =$row['PitchTypeID'];
                $name= $row['PitchTypeName'];

                echo "<tr>";

                echo "<td>$id</td>";
                echo "<td>$name</td>";
                echo "<td>
                    <a href='pitchtype-update.php?PtID=$id'>Update</a>
                    <a href='pitchtypedelete.php?PtID=$id'>Delete</a>
                   
                </td>";

                echo "</tr>";


            }
        ?>

    </table>

</table>



   
</body>
</html>
