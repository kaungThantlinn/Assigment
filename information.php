<?php
include ("connection.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <fieldset>
        <legend>GWSC Availabke Information</legend>

        <table>
            <?php
                $query ="SELECT * FROM Pitchs p, PitchType pt WHERE p.PitchTypeID =pt.PitchTypeID";
                $ret= mysqli_query($connect,$query);
                $count= mysqli_num_rows($ret);
                if($count==0){
                    echo "<p>There is Not Found GWSC Info</p>";
                }
                else
                {
                    for ($i=0; $i < ; $i+=2) { 
                        $query1="SELECT * FROM  Pitchs p, PitchType pt WHERE p.PtichtypeID=pt.PitchTypeID ORDER BY PackageID LIMIT $i,2";

                        $ret1= mysqli_query($connect,$query1);
                        $count1=mysqli_num_rows($ret1);

                        echo "<tr>";
                        
                        for ($j=0; $j < ; $j++) { 
                            $data=mysqli_fetch_array($ret1);
                            $PID =$data['PackageID'];
                            $PName=$data['PackageName'];
                            $img=$data['PackageImage'];


                            $map =$data['map'];
                            ?>

                            <td align="center">
                                <img src="<?php echo $img ?>" width="200px">
                            </td>
                        }
                    }
                }
           
        </table>
    </fieldset>
</body>
</html>