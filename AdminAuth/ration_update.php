<?php
include "connect.php";

$pid = $_GET["updateid"];

$sql = "Select *from `products` where Pid = $pid";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$pname = $row["Pname"];
$quantity = $row["Quantity"];
$price = $row["Price"];
$md = $row["Manu_date"];
$ed = $row["Expiry_date"];

if (isset($_POST["submit"])) {
    $pname = $_POST["pname"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];
    $md = $_POST["date1"];
    $ed = $_POST["date2"];

    $sql = "update `products` set Pid=$pid, Pname='$pname', Quantity=$quantity, Price=$price, Manu_date='$md', Expiry_date='$ed' where Pid=$pid";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "<script>confirm('Product updated successfully')</script>";
        header("location:ration_display.php");
    } else {
        die(mysqli_error($con));
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <title>Update Ration</title>
</head>

<body>
    <div class="container">
        <form method="post" name="myform" onsubmit="return validate()">
            <div>
                <label>Product Name</label>
                <br>
                <input type="pname" placeholder="Enter product name" name="pname" autocomplete="off" value=<?php echo $pname ?>><br>
                <span id="pname"></span>
                <br><br>
            </div>
            <div>
                <label>Quantity</label>
                <br>
                <input type="quantity" placeholder="Enter the quantity" name="quantity" autocomplete="off" value=<?php echo $quantity ?>><br>
                <span id="quantity"></span>
                <br><br>
            </div>
            <div>
                <label>Price</label>
                <br>
                <input type="price" placeholder="Enter the price" name="price" autocomplete="off" value=<?php echo $price ?>><br>
                <span id="price"></span>
                <br><br>
            </div>
            <div>
                <label>Manufacturing Date</label>
                <br>
                <input type="date" placeholder="Enter the Manufacturing Date" name="date1" autocomplete="off" value=<?php echo $md ?>><br>
                <span id="date1"></span>
                <br><br>
            </div>
            <div>
                <label>Expiry Date</label>
                <br>
                <input type="date" placeholder="Enter the Expiry Date" name="date2" autocomplete="off" value=<?php echo $ed ?>><br>
                <span id="date2"></span>
                <br><br>
            </div>

            <button type="submit" name="submit">Update</button>
        </form>
    </div>


    <script>
        function validate() {

            var pname = document.forms['myform']['pname'].value;
            var quan = document.forms['myform']['quantity'].value;
            var pprice = document.forms['myform']['price'].value;
            var md = new Date(document.forms['myform']['date1'].value);
            var ed = new Date(document.forms['myform']['date2'].value);
            let current = new Date();
            var er = /^-?[0-9]+$/;
            var RegExpression = /^[a-zA-Z\s]*$/;

            if (!/\S/.test(pname)) {
                document.getElementById("pname").innerHTML = "*Please enter a valid product name";
                return false;
            }
            if (!RegExpression.test(pname)) {
                document.getElementById("pname").innerHTML = "*Please enter a valid product name";
                return false;
            }
            if (quan <= 0) {
                document.getElementById('quantity').innerHTML = "*Quantity cannot be less than 1";
                return false;
            }
            if (!er.test(quan)) {
                document.getElementById('quantity').innerHTML = "*Enter an integer value";
                return false;
            }
            if (pprice <= 0) {
                document.getElementById('price').innerHTML = "*Price should be less than zero";
                return false;
            }
            if (!er.test(pprice)) {
                document.getElementById('price').innerHTML = "*Enter an integer value";
                return false;
            }
            if (md > ed) {
                document.getElementById('date2').innerHTML = "*Expiry date is less than Manufacturing date";
                return false;
            }
            if (current > ed) {
                document.getElementById('date2').innerHTML = "*Expiry date is less than current date";
                return false;
            }

        }
    </script>

</body>

</html>