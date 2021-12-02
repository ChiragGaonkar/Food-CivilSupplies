<?php
include "../config.php";
session_start();
error_reporting(0);
if (isset($_SESSION['UAADHAR'])) {
    if (isset($_POST['uremoveproduct'])) {
        $pid = $_POST['uremoveproduct'];
        $uaadhar = $_SESSION['UAADHAR'];
        $sql = "DELETE FROM cart_data WHERE PID = $pid  AND UAADHAR = $uaadhar";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            header('location:ucart.php');
            return;
        } else {
        }
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
    <title>Cart</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" style="padding: 10px 30px 10px 30px">
        <div class="container-fluid">
            <a class="navbar-brand" href="../home.php">
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

                    <li class="nav-item">
                        <a class="nav-link" style="margin-right: 20px;" aria-current="page" href="uproductpage.php">Buy
                            Products</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" style="margin-right: 20px;" aria-current="page" href="ucart.php">My
                            Cart</a>
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

    <!-- Products which are added in Cart -->
    <?php
    if (isset($_SESSION['UAADHAR'])) {
        $uaadhar = $_SESSION['UAADHAR'];
        $sql1 = "SELECT product_data.PID,PNAME,QUANTITY,PTYPE,PRICE,CART_QUANTITY FROM product_data INNER JOIN cart_data ON product_data.PID = cart_data.PID WHERE UAADHAR = $uaadhar";
        $result1 = mysqli_query($connection, $sql1);
        echo "<div class='row d-flex justify-content-center outerproductcard'>";
        while ($row = mysqli_fetch_assoc($result1)) {
            echo "
        <div class='col-md-6'>
            <div class='card mb-3 mt-auto' style='max-width: 100%;background-color: #fdf5df;'>
                <div class='row g-0'>
                    <!-- <div class='col-md-4'>
                        <img src='../Images/Wheat.jpg' class='img-fluid rounded-start' alt='...'>
                    </div> -->
                    <!-- <div class='col-md-8'> -->
                    <div class='card-body'>
                        <h2 class='text-center'>{$row['PNAME']}({$row['CART_QUANTITY']} {$row['PTYPE']})</h2>
                        <hr>
                        <table class='table table-borderless'>
                            <tbody>
                                <tr>
                                    <th class='text-start'>Product ID</th>
                                    <th class='text-end'>{$row['PID']}</th>
                                </tr>
                                <tr>
                                    <th class='text-start'>Quantity</th>
                                    <th class='text-end'>{$row['QUANTITY']} {$row['PTYPE']}</th>
                                </tr>
                                <tr>
                                    <th class='text-start'>Price</th>
                                    <th class='text-end'>₹ {$row['PRICE']}</th>
                                </tr>
                            </tbody>
                        </table>
                        <form method='POST'>
                        <div class='d-grid gap-2'>
                        <button class='btn btn-success shadow-none' type='submit' name='uremoveproduct' value={$row['PID']}
                        style='background-color: #F92C85; border:#F92C85; color:#fdf5df'>Remove from Cart</button>
                        </div>
                        </form>
                    </div>
                    <!-- </div> -->
                </div>
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
    <!-- End of Products which are added in cart -->

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