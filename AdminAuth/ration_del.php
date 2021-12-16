<?php
include "../config.php";
echo "<script>alert('Click OK to delete')</script>";

if (isset($_GET["deleteid"])) {
    $id=$_GET["deleteid"];

    $sql = "Select *from `product_data` where Pid = $id";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    $pname = $row["PNAME"];
    $quantity = $row["QUANTITY"];
    $price = $row["PRICE"];
    $ptype = $row['PTYPE'];
    $md = $row["MANU_DATE"];
    $ed = $row["EXP_DATE"];
    $district = $row['DISTRICT'];
    $img_upload_path = $row['IMAGE'];

    $sql = "INSERT INTO discarded_data(PID,PNAME,QUANTITY,PTYPE,PRICE,MANU_DATE,EXP_DATE,DISTRICT,IMAGE) values ($id,'$pname',$quantity,'$ptype',$price,'$md','$ed','$district','$img_upload_path')";
    $result = mysqli_query($connection, $sql);

    $sql="delete from `products` where Pid=$id";

    $result1=mysqli_query($connection,$sql);
    if ($result) {
        if ($result1) {
            echo "<script>alert('Deleted Successfully')</script>";
            header("location:dis.php");
        }
    }else {
        echo "<script>alert('Error Please Try Again')</script>";
        header("location:dis.php");
       // die(mysqli_error($con));
    }
}
?>
