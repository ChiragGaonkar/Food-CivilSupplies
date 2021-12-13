<?php
include '../config.php';

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $ID=$_POST['CID'];
}
$table="courier_data";
$sql="select * from $table where CID=$ID";
$display=mysqli_query($connection,$sql);

$num=mysqli_num_rows($display);

if($num==0)
{
    die("<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Invalid Login or Password!!!</strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>");
}

$row=mysqli_fetch_assoc($display);

?>
