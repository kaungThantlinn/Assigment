
<?php
session_start();
include ('./connection.php');

if(!isset($_SESSION['sid']))
{
    echo "<script>window.alert('Admin Login Again')</script>" ;
    echo "<script>window.location='AdminLogin.php'</script>" ;   
}

if(isset($_POST['btnsubmit']))
{
    $pname =$_POST['txtpname'];
    $pimage =$_FILES['txtpimage']['name'];
    $folder ="images/";
    $filename =$folder."-".$pimage;

    $copy=copy($_FILES['txtpimage']['tmp_name'],$filename);

    if(!$copy){
        echo "<p>Cannot Upload Image</p>";
        exit;
    }

    $location =$_POST['txtlocation'];
    $facilities1 =$_POST['txtfacilities1'];
    $facilities2 =$_POST['txtfacilities2'];
    $facilities3 =$_POST['txtfacilities3'];

    $localname1=$_POST['txtlocalname1'];
    $localname2=$_POST['txtlocalname2'];
    $localname3=$_POST['txtlocalname3'];


    $localimage1 =$_FILES['txtlocalimg1']['name'];
    $folder ="images/";
    $filename1 =$folder."-".$localimage1;

    $copy=copy($_FILES['txtlocalimg1']['tmp_name'],$filename1);

    if(!$copy){
        echo "<p>Cannot Upload Image</p>";
        exit;
    }

    $localimage2 =$_FILES['txtlocalimg2']['name'];
    $folder ="images/";
    $filename2 =$folder."-".$localimage2;

    $copy=copy($_FILES['txtlocalimg2']['tmp_name'],$filename2);

    if(!$copy){
        echo "<p>Cannot Upload Image</p>";
        exit;
    }


    $localimage3 =$_FILES['txtlocalimg3']['name'];
    $folder ="images/";
    $filename3 =$folder."-".$localimage3;

    $copy=copy($_FILES['txtlocalimg3']['tmp_name'],$filename3);

    if(!$copy){
        echo "<p>Cannot Upload Image</p>";
        exit;
    }


    $price =$_POST['txtprice'];
    $description = $_POST['txtdescription'];
    $status="Active";

    $cbosite =$_POST['cbosite'];
    $cbopitch=$_POST['cbopitch'];

    $check="SELECT * FROM Pitchs WHERE PackageName ='$pname' ";
    $query=mysqli_query($connect,$check);
    $count =mysqli_num_rows($query);

    if($count > 0)
    {
        echo "Duplicate";
        echo "<script>window.location='packages.php'</script>" ; 
    }
    else{
        $insert = "INSERT INTO Pitchs(PackageName,PackageImage,Location,FacilitiesName1,FacilitiesName2,FacilitiesName3,Localname1,Localname2,Localname3,localimg1,localimg2,localimg3,Price,Description,Status) Values ('$pname','$$pimage','$location','$facilities1','$facilities2','$facilities3','$localname1','$localname2','$Localname3','$localimage1','$localimage2','$localimage3','$price','$description','$status')";
        $finalresult = mysqli_query($connect, $insert);
    
        if ($finalresult) {
            echo "<script>window.alert('Successfully Data Inserted')</script>";
            echo "<script>window.location='packages.php'</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }

        input[type="file"] {
            margin-top: 5px;
        }

        select {
            height: 35px;
        }

        input[type="submit"] {
            display: block;
            width: 100%;
            background-color: #3498db;
            color: #ffffff;
            padding: 10px;
            border: none;
            border-radius: 3px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 5px;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <h1>Package Information</h1>
    <form action="packages.php" method="post" enctype="multipart/form-data">
        <label for="txtname">Package Name:</label>
        <input type="text" id="txtname" name="txtpname" required>

        <label for="txtpimage">Pitch Image:</label>
        <input type="file" id="txtpimage" name="txtpimage" accept="image/*" required>

        <label for="txtlocation">Location:</label>
        <input type="text" id="txtlocation" name="txtlocation" required>

        <label for="txtfacilities1">Facilities Name 1:</label>
        <input type="text" id="txtfacilities1" name="txtfacilities1" required>

        <label for="txtfacilities2">Facilities Name 2:</label>
        <input type="text" id="txtfacilities2" name="txtfacilities2" required>

        <label for="txtfacilities3">Facilities Name 3:</label>
        <input type="text" id="txtfacilities3" name="txtfacilities3" required>

        <label for="txtlocalname1">Local Name 1:</label>
        <input type="text" id="txtlocalname1" name="txtlocalname1" required>

        <label for="txtlocalname2">Local Name 2:</label>
        <input type="text" id="txtlocalname2" name="txtlocalname2" required>

        <label for="txtlocalname3">Local Name 3:</label>
        <input type="text" id="txtlocalname3" name="txtlocalname3" required>

        <label for="txtlocalimg1">Local Image 1:</label>
        <input type="file" id="txtlocalimg1" name="txtlocalimg1" accept="image/*" required>

        <label for="txtlocalimg2">Local Image 2:</label>
        <input type="file" id="txtlocalimg2" name="txtlocalimg2" accept="image/*" required>

        <label for="txtlocalimg3">Local Image 3:</label>
        <input type="file" id="txtlocalimg3" name="txtlocalimg3" accept="image/*" required>

        <label for="txtprice">Price:</label>
        <input type="number" id="txtprice" name="txtprice" required>

        <label for="txtdescription">Description:</label>
        <textarea id="txtdescription" name="txtdescription" rows="4" required></textarea>

        <label for="cbosite">Choose Campsite Name:</label>
        <select id="cbosite" name="cbosite">
        <?php

                $select="SELECT * FROM Campsite" ;
                $run=mysqli_query($connect,$select);
                $count=mysqli_num_rows($run);

                for ($i=0; $i < $count; $i++) { 
                $data=mysqli_fetch_array($run);
                $RID=$data['CampsiteID'];
                $RN =$data['CampsiteName'];

                echo "<option value='$RID'>$RN</option>";
                }

        ?>
        </select>

        <label for="cbopitch">Choose Pitch Type Name:</label>
        <select id="cbopitch" name="cbopitch">
        <?php

            $select="SELECT * FROM PitchType" ;
            $run=mysqli_query($connect,$select);
            $count=mysqli_num_rows($run);

            for ($i=0; $i < $count; $i++) { 
            $data=mysqli_fetch_array($run);
            $PID=$data['PitchTypeID'];
            $PN =$data['PitchTypeName'];

            echo "<option value='$PID'>$PN</option>";
            }

        ?>
        </select>

        <input type="submit" name="btnsubmit" value="Save">
    </form>
</body>
</html>



<iframe src="<?php echo $location ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
