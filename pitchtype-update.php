<?php 

include ("connection.php");

    $PTID=$_REQUEST['PtID'];
    $select = "SELECT * FROM PitchType WHERE PitchTypeID='$PTID'";

    $statement = mysqli_query($connect,$select);
    $row =mysqli_fetch_array($statement);

    $name = $row['PitchTypeName'];
    $ID =$row['PitchTypeID'];

    if(isset($_POST['btnupdate']))
    {
        $UpitchID=$_POST['txtpitchID'];
        $UpitchName=$_POST['txtpitname'];


        $update ="UPDATE PitchType set PitchTypeName='$UpitchName' WHERE PitchTypeID='$$UpitchID' ";

        $Ustatement = mysqli_query($connect,$update);

        if($Ustatement)
     
        {
             echo "Update Successful";
             echo "<script>window.location='pitch-type.php'</script>";
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
    <form action="pitchtype-update.php" method="post">
        <input type="hidden" name="txtpitchID" value="<?php echo $ID ;  ?>"> <br>

        <input type="text" name="txtpitname " value="<?php  echo $name;    ?>"> <br>

        <input type="submit" name="btnupdate" value="Update">
    </form>
</body>
</html>