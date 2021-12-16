<?php
include "../config.php";

$rid = $_GET["updateid"];
$rrid = $_GET["updatedid"];

if($rid!=NULL){
    $sql = "UPDATE `order_data` SET STATUS = 'Shipped' WHERE REFERENCEID = $rid";
}
if ($rrid!=NULL) {
        $sql = "UPDATE `order_data` SET STATUS = 'Discarded' WHERE REFERENCEID = $rrid";
}

$result = mysqli_query($connection, $sql);
    if ($result) {
        echo "<script>confirm('Product updated successfully')</script>";
    } else {
        echo "<script>alert('Error! Please try again')</script>";
        //die(mysqli_error($con));
    }
    header("location:order_display.php");

?>
