<?php
session_start();
error_reporting(0);
include "connect.php";
if (isset($_POST["submit"])) {
    $pid = $_POST["pid"];
    $pname = $_POST["pname"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];
    $md = $_POST["date1"];
    $ed = $_POST["date2"];
    $district = $_SESSION['DISTRICT'];
    $image=$_POST['img_uplaod'];

    $sql = "insert into `products` (Pid,Pname,Quantity,Price,Manu_date,Expiry_date,district,image) values ($pid,'$pname',$quantity,$price,'$md','$ed','$district','$image')";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "<script>alert('Product added successfully')</script>";
    } else {
        echo "<script>alert('Product id already exists')</script>";
        //echo "die(mysqli_error($con))";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <title>Add Ration</title>
</head>

<body>
    <div class="container">
        <form method="post" name="myform" onsubmit="return validate()">
            <div class="form-group">
                <label>Product ID</label>
                <br>
                <input type="pid" placeholder="Enter the product id" name="pid" autocomplete="off" required><br>
                <span id="pid"></span>
                <br><br>
            </div>
            <div class="form-group">
                <label>Product Name</label>
                <br>
                <input type="pname" placeholder="Enter product name" name="pname" autocomplete="off" required><br>
                <span id="pname"></span>
                <br><br>
            </div>
            <div class="form-group">
                <label>Quantity</label>
                <br>
                <input type="quantity" placeholder="Enter the quantity" name="quantity" autocomplete="off" required><br>
                <span id="quantity"></span>
                <br><br>
            </div>
            <div class="form-group">
                <label>Price</label>
                <br>
                <input type="price" placeholder="Enter the price" name="price" autocomplete="off" required><br>
                <span id="price"></span>
                <br><br>
            </div>
            <div class="form-group">
                <label>Manufacturing Date</label>
                <br>
                <input type="date" placeholder="Enter the Manufacturing Date" name="date1" autocomplete="off" required>
                <br><br>
            </div>
            <div class="form-group">
                <label>Expiry Date</label>
                <br>
                <input type="date" placeholder="Enter the Expiry Date" name="date2" autocomplete="off" required><br>
                <span id="date2"></span><br>
            </div>
            <div>
                <label>Product Image</label>
                <br>
                <input type="file" name="img_upload"><br>
                <span id="img_upload"></span>
            </div>
            <br>
            <button type="reset" name="Reset">Reset</button>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>

    <script>
        function validate() {


            var pid = document.forms['myform']['pid'].value;
            var pname = document.forms['myform']['pname'].value;
            var quan = document.forms['myform']['quantity'].value;
            var pprice = document.forms['myform']['price'].value;
            var img=document.forms['myform']['img_upload'];
            var md = new Date(document.forms['myform']['date1'].value);
            var ed = new Date(document.forms['myform']['date2'].value);
            let current = new Date();
            var er = /^-?[0-9]+$/;
            var RegExpression = /^[a-zA-Z\s]*$/;
            var validExt=["jpeg","png","jpg"];




            //Checking whether id is less than 0

            if (pid<=0) {
                document.getElementById('pid').innerHTML = "*Product Id cannot be negative";
                return false;
            }


            //Validating product name

            if (!er.test(pid)) {
                document.getElementById('pid').innerHTML = "*Enter an integer value";
                return false;
            }
            if (!/\S/.test(pname)) {
                document.getElementById("pname").innerHTML = "*Please enter a valid product name";
                return false;
           }
            if (!RegExpression.test(pname)) {
                document.getElementById("pname").innerHTML = "*Please enter a valid product name";
                return false;
            }


            //validating quantity

            if (quan <= 0) {
                document.getElementById('quantity').innerHTML = "*Quantity cannot be less than 1";
                return false;
            }
            if (!er.test(quan)) {
                document.getElementById('quantity').innerHTML = "*Enter an integer value";
                return false;
            }

        
            //validating price

            if (pprice <= 0) {
                document.getElementById('price').innerHTML = "*Price should be less than zero";
                return false;
            }
            if (!er.test(pprice)) {
                document.getElementById('price').innerHTML = "*Enter an integer value";
                return false;
            }




            //validating manfacturing date and expiry date

            if (md > ed) {
                document.getElementById('date2').innerHTML = "*Expiry date is less than Manufacturing date";
                return false;
            }
            if (current > ed) {
                document.getElementById('date2').innerHTML = "*Expiry date is less than current date";
                return false;
            }



            

            //validating image 

            if (img.value!='') {

                var img_ext=img.value.substring(img.value.lastIndexOf('.')+1);

                var result=validExt.includes(img_ext);
                if (result==false) {
                    document.getElementById('img_upload').innerHTML = "*Invalid file extension";
                    return false;
                } else {
                    if (pasreflaot(img.files[0].size/(1024*1024)>=1)) {
                        document.getElementById('img_upload').innerHTML = "*File should be less than 1MB";
                        return false;
                    }
                }
                
            } else {
                document.getElementById('img_upload').innerHTML = "*Please select an image";
                return false;
            }



            return true;
        }
    </script>
</body>

</html>