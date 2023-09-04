




<?php
include('connection.php');

$CampsiteID = $_REQUEST['SID'];
$select = "SELECT * FROM Campsite WHERE CampsiteID='$CampsiteID'";
$statement = mysqli_query($connect, $select);
$row = mysqli_fetch_array($statement);
$name = $row['CampsiteName'];
$id = $row['CampsiteID'];
$location = $row['Location'];

if (isset($_POST['btnupdate'])) {
    $SID = $_POST['txtsiteID'];
    $SName = $_POST['txtsitename'];
    $Slocation = $_POST['txtlocation'];

    // Sanitize inputs to prevent SQL injection
    $SName = mysqli_real_escape_string($connect, $SName);
    $Slocation = mysqli_real_escape_string($connect, $Slocation);

    $update = "UPDATE Campsite SET CampsiteName='$SName', Location='$Slocation' WHERE CampsiteID='$SID'";
    $Ustatement = mysqli_query($connect, $update);

    if ($Ustatement) {
        echo "Update Successful";
        echo "<script>window.location='site-entry.php'</script>";
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
    <form action="siteupdate.php" method="post">
        <input type="hidden" name="txtsiteID" value="<?php echo $id; ?>"> <br>

        <input type="text" name="txtsitename" value="<?php echo $name; ?>"> <br>

        <input type="text" name="txtlocation" value="<?php echo $location; ?>"><br>

        <input type="submit" name="btnupdate" value="Update">
    </form>
</body>
</html>
