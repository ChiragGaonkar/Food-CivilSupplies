<?php
include "../config.php";
session_start();
error_reporting(0);
if (isset($_SESSION['UAADHAR'])) {
    if (isset($_POST['uproduct'])) {
        $pid = mysqli_escape_string($connection, $_POST['uproduct']);
        $uaadhar = $_SESSION['UAADHAR'];
        $sql1 = "SELECT CART_QUANTITY FROM cart_data WHERE PID = $pid AND UAADHAR = $uaadhar";
        $result1 = mysqli_query($connection, $sql1);
        $row = mysqli_fetch_assoc($result1);
        $quantity = $row['CART_QUANTITY'] + 1;
        if (mysqli_num_rows($result1) > 0) {
            $sql2 = "UPDATE cart_data SET CART_QUANTITY = $quantity WHERE PID = $pid AND UAADHAR = $uaadhar";
            $result2 = mysqli_query($connection, $sql2);
        } else {
            $sql3 = "INSERT INTO cart_data(PID, UAADHAR, CART_QUANTITY) VALUES ($pid,$uaadhar, $quantity)";
            $result3 = mysqli_query($connection, $sql3);
        }
        header('location:uproductpage.php');
        return;
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="ustyle.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Cabin&display=swap');
    </style>
    <title>Buy Products</title>
</head>
<style>
img {
    margin-top: 10px;
}
</style>

<body style="overflow-x: hidden;">
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav" style="margin-left: auto;">
                    <!-- Personal Info -->
                    <li class="nav-item">
                        <a class="nav-link" style="margin-right: 20px;" aria-current="page"
                            href="upersonal.php">Personal Info</a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link active" style="margin-right: 20px;" aria-current="page"
                            href="uproductpage.php">Buy Products</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" style="margin-right: 20px;" aria-current="page" href="ucart.php">My Cart</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" style="margin-right: 20px;" aria-current="page"
                            href="uorderstatus.php">Order Status</a>
                    </li>

                    <!-- Contact Us -->
                    <li class="nav-item">
                        <a class="nav-link" style="margin-right: 10px;" href="#">Contact Us</a>
                    </li>

                    <!-- LogOut -->
                    <li class="nav-item">
                        <a class="nav-link" style="margin-right: 10px;" href="ulogout.php">Log-Out</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- End of Navbar -->
    <!-- Product Details -->
    <?php
    if (isset($_SESSION['UAADHAR'])) {
        $sql = "SELECT * FROM product_data";
        $result = mysqli_query($connection, $sql);
        echo "<div class='row d-flex justify-content-center outerproductcard'>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <div class='card productcard mt-auto' style='width: 20rem;'>
            <hr><h5 class='card-title text-center'>{$row['PNAME']}</h5><hr>
                <img src='../Images/Wheat.jpg' class='card-img-top' alt='...'>
                <div class='card-body'>
                    <table class='table table-borderless' style='margin:20px'>
                        <tbody>
                            <tr>
                                <td>Quantity</td>
                                <td>{$row['QUANTITY']}  {$row['PTYPE']}</td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td>₹ {$row['PRICE']}</td>
                            </tr>
                        </tbody>
                    </table>
                    <form method='POST'>
                    <div class='d-grid gap-2'>
                        <button class='btn btn-success shadow-none' type='submit' name='uproduct' value={$row['PID']}
                            style='background-color: #F92C85; border:#F92C85; color:#fdf5df'>Add to cart</button>
                    </div>
                    </form>
                </div>
            </div>
            ";
        }
        echo "</div>";
    } else {
        echo "
            <div>
                <img src='../Images/PageNotFound.svg' class='img-fluid mx-auto d-block' alt='' style='max-width:40%; margin: 80px 0px 80px 0px'>
            </div>
            ";
    }
    ?>

    <!-- Footer -->
    <div class="bg-dark text-secondary px-4 py-5 text-center" style="margin-top: 20px;">
        <div class="py-5">
            <h1 class="display-5 fw-bold text-white">Food & Civil Supplies</h1>
            <div class="col-lg-6 mx-auto">
                <p class="fs-5 mb-4">Department of Goa</p>
                <hr>
                <a href="#" class="fs-5 mb-4"><img src="https://img.icons8.com/nolan/64/instagram-new.png" /></a>
                <a href="#" class="fs-5 mb-4" style="margin-right: 20px; margin-left: 20px;"><img
                        src="https://img.icons8.com/nolan/64/twitter.png" /></a>
                <a href="#" class="fs-5 mb-4"><img src="https://img.icons8.com/nolan/64/whatsapp.png" /></a>
            </div>
        </div>
    </div>
    <!-- End of Footer -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>