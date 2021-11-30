<?php
include '../config.php';

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $ID=$_POST['CID'];
}
$table="courier_data";
$sql="select * from $table where CID=ID";
$display=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($display);

?>