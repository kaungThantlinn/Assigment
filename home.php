<?php
session_start();
include ("connection.php");

if(!isset($_SESSION['cid'])){
    echo "<script>window.alert('Login Again')</script>";
    echo "<script>window.location='customer-login.php'</script>";

}
else
{
    $customer = $_SESSION['cid'];
    $select ="SELECT * FROM Customer WHERE CustomerID = $customer";
    $query = mysqli_query($connect,$select);
    $count = mysqli_num_rows($query);

    if($count > 0){
        $data = mysqli_fetch_array($query);
        $view = $data['Viewcount'];
        echo "Viewcount:".$view;
    }
}

?>