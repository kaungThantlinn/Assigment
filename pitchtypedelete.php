<?php 

include ('./connection.php');

$PitchTypeID=$_REQUEST['PtID'];

$delete ="DELETE FROM PitchType WHERE PitchTypeID='$PitchTypeID'";
$statement = mysqli_query($connect,$delete);

if ($statement) {

    echo "Delete Successful";
    echo "<script>window.location='pitch-type.php'</script>";
}
else{
    echo "Delete Unsuccessful";
    echo "<script>window.location='pitch-type.php'</script>";
}


?>