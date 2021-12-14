<?php
include "connect.php";
if (isset($_GET["deleteid"])) {
    $id=$_GET["deleteid"];

    $sql="delete from `products` where Pid=$id";
    $result=mysqli_query($con,$sql);
    if ($result) {
        header("location:ration_display.php");
    }else {
        die(mysqli_error($con));
    }
}
?>
