<?php 

include ('./connection.php');

$CampsiteID=$_REQUEST['SID'];

$delete ="DELETE FROM Campsite WHERE CampsiteID='$CampsiteID'";
$statement = mysqli_query($connect,$delete);

if ($statement) {

    echo "Delete Successful";
    echo "<script>window.location='site-entry.php'</script>";
}
else{
    echo "Delete Unsuccessful";
    echo "<script>window.location='site-entry.php'</script>";
}


?>