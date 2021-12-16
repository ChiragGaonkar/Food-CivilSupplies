<?php
include "../config.php";
session_start();
error_reporting(0);

$pid = $_GET["updateid"];

$sql = "Select *from `products` where Pid = $pid";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
$pname = $row["Pname"];
$quantity = $row["Quantity"];
$price = $row["Price"];
$md = $row["Manu_date"];
$ed = $row["Expiry_date"];
//$old_img = $row['image'];


if (isset($_POST["submit"])) {
    $pid = $_POST["pid"];
    $pname = $_POST["pname"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];
    $md = $_POST["date1"];
    $ed = $_POST["date2"];
    $district = $_SESSION['DISTRICT'];

    /*$new_img = $_FILES['img_upload']['name'];
    

    $img_name = $_FILES['img_upload']['name'];
    $old_img = $_POST['img_upload_old'];

    if ($img_name!='') {
        $tmp_name = $_FILES['img_upload']['tmp_name'];
        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
        $img_upload_path = 'uploads/' . $img_name;
        move_uploaded_file($tmp_name, $img_upload_path);
    }else{
        $img_upload_path = $old_img;
    }*/

    //, image='$img_upload_path' 

    $sql = "UPDATE `products` SET Pid=$pid, Pname='$pname', Quantity=$quantity, Price=$price, Manu_date='$md', Expiry_date='$ed' where Pid=$pid";

    $result = mysqli_query($connection, $sql);

    if ($result) {
        echo "<script>confirm('Product updated successfully')</script>";
        header("location:dis.php");
    } else {
        echo "<script>alert('Error! Please try again')</script>";
        //die(mysqli_error($con));
    }
}

?>




<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/5019775b3a.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="astyle.css">

    <script>
        function validate() {

            var md = new Date(document.forms['myform']['date1'].value);
            var ed = new Date(document.forms['myform']['date2'].value);
            var img = document.forms['myform']['img_upload'];
            let current = new Date();
            var validExt=["jpeg","png","jpg","JPEG","PNG","JPG"];


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
                    if (img.files[0].size>1048576) {
                        document.getElementById('img_upload').innerHTML = "*File should be less than 1MB";
                        return false;
                    }
                }
            }



            return true;
        }
    </script>

    <title>Update Product</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" style="padding: 10px 30px 10px 30px">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">
                <!-- <img src="images/AdminLogo.png" style="width: 40px;" alt="Admin">
                <img src="images/UserLogo.png" style="width: 40px;" alt="Admin">
                <img src="images/DeliveryLogo.png" style="width: 40px;" alt="Admin"> -->
                Food & Civil Supplies
            </a>

            <!-- Button which pops when window is minimized -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav" style="margin-left: auto;">
                    <!-- Personal Info -->
                    <li class="nav-item">
                        <a class="nav-link active" style="margin-right: 20px;" aria-current="page" href="apersonal.php">Personal Info</a>
                    </li>

                    <!-- Ration Info -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="margin-right: 10px;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Ration
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="ration_add.php">
                                    ADD PRODUCT
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="ration_display.php">
                                    DISPLAY PRODUCT
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="ration_discard.php">
                                    DISCARDED PRODUCT
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Sales Info -->
                    <li class="nav-item">
                        <a class="nav-link" style="margin-right: 20px;" aria-current="page" href="order_display.php">Sales</a>
                    </li>

                    <!-- User & Courier Details-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="margin-right: 10px;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Details
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="aUserDetails.php">
                                    <img src="../Images/UserLogo.png" style="width: 40px;" alt="Admin">
                                    Customer Details
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="aCourierDetails.php">
                                    <img src="../Images/DeliveryLogo.png" style="width: 40px;" alt="Admin">
                                    Courier Details
                                </a>
                            </li>
                        </ul>
                    </li>



                    <!-- LogOut -->
                    <li class="nav-item">
                        <a class="nav-link" style="margin-right: 10px;" href="alogout.php">Log-Out</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- End of Navbar -->



    <!-- Update Product -->

    <div class="container">

        <div>
            <br><h1 class="text-center" style="color: white;">UPDATE RATION</h1><br>
        </div>
        <div class="col-lg-3 m-auto d-block">
            <form method="post" name="myform" onsubmit="return validate()" enctype="multipart/form-data" class="productadd" >
                <div class="form-group">
                    <label style="font-weight: bold;">PRODUCT ID:</label>
                    <br>
                    <input type="number" min="0" placeholder="Product Id" name="pid" autocomplete="off" required class="form-control" value=<?php echo $pid ?>>
                    <br><br>
                </div>
                <div class="form-group">
                    <label style="font-weight: bold;">PRODUCT NAME:</label>
                    <br>
                    <!-- <input type="text" placeholder="Product Name" name="" autocomplete="off" required> -->
                    <input type="text" placeholder="Product Name" name="pname" autocomplete="off" required class="form-control" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" value=<?php echo $pname ?>>
                    <br><br>
                </div>
                <div class="form-group">
                    <label style="font-weight: bold;">QUANTITY:</label>
                    <br>
                    <input type="number" min="1" placeholder="Quantity" name="quantity" autocomplete="off" required class="form-control" value=<?php echo $quantity ?>>
                    <br><br>
                </div>
                <div class="form-group">
                    <label style="font-weight: bold;">PRICE:</label>
                    <br>
                    <input type="number" step="0.01" min="0" max="100" placeholder="Price" name="price" autocomplete="off" required class="form-control" value=<?php echo $price ?>>
                    <br><br>
                </div>
                <div class="form-group">
                    <label style="font-weight: bold;">MANUFACTURING DATE:</label>
                    <br>
                    <input type="date" placeholder="Manufacturing Date" name="date1" autocomplete="off" required class="form-control" value=<?php echo $md ?>>
                    <br><br>
                </div>
                <div class="form-group">
                    <label style="font-weight: bold;">EXPIRY DATE:</label>
                    <br>
                    <input type="date" placeholder="Expiry Date" name="date2" autocomplete="off" required class="form-control" value=<?php echo $ed ?>><br>
                    <span id="date2"></span><br>
                </div>
                <!-- <div>
                    <label style="font-weight: bold;">PRODUCT IMAGE:</label>
                    <br>
                    <input type="file" name="img_upload" class="form-control">
                    <input type="hidden" name="img_upload_old" class="form-control" value="<//?php echo $old_img ?>">
                    <br>
                    <span id="img_upload"></span><br>
                </div> -->
                <br>
                <div class="m-auto">
                <button type="reset" name="Reset" value="Reset" class="btn btn-primary float-start" style="background-color:brown; border:brown"><a href="dis.php">Cancel</a></button>
                <button type="submit" name="submit" value="Submit" class="btn btn-primary float-end" style="background-color:brown;"><a href="dis.php">Submit</a></button>
                </div>
                
            </form>
        </div>
    </div>

    <!-- End of Update -->


    <!-- Footer -->
    <div class="bg-dark text-secondary px-4 py-5 text-center" style="margin-top: 20px;">
        <div class="py-5">
            <h1 class="display-5 fw-bold text-white">Food & Civil Supplies</h1>
            <div class="col-lg-6 mx-auto">
                <p class="fs-5 mb-4">Department of Goa</p>
                <hr>
                <a href="#" class="fs-5 mb-4"><img src="https://img.icons8.com/nolan/64/instagram-new.png" /></a>
                <a href="#" class="fs-5 mb-4" style="margin-right: 20px; margin-left: 20px;"><img src="https://img.icons8.com/nolan/64/twitter.png" /></a>
                <a href="#" class="fs-5 mb-4"><img src="https://img.icons8.com/nolan/64/whatsapp.png" /></a>
            </div>
        </div>
    </div>



    <!-- End of Footer -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>
