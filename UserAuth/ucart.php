<?php
include "../config.php";
session_start();
error_reporting(0);
if (isset($_SESSION['UAADHAR'])) {
    $sql = "SELECT * FROM user_data WHERE UAADHAR = {$_SESSION['UAADHAR']}";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    $fname = $row['UFNAME'];
    $lname = $row['ULNAME'];
    $dob = $row['UDOB'];
    $address = $row['UADDRESS'];
    $district = $row['UDISTRICT'];
    $email = $row['UEMAIL'];
    $phone = $row['UPHONE'];
    $aadhar = $row['UAADHAR'];
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

                    <!-- User & Courier Details-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" style="margin-right: 10px;" href="#"
                            id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            My Fair Price Shop
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="uproductpage.php">
                                    <img src="../Images/BuyProducts.png" style="width: 40px;" alt="Admin">
                                    Buy Awesome Products
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="ucart.php">
                                    <img src="../Images/AddToCart.png" style="width: 40px;" alt="Admin">
                                    Check my Cart
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="uorderstatus.php">
                                    <img src="../Images/OrderStatus.png" style="width: 40px;" alt="Admin">
                                    Check my Order Status
                                </a>
                            </li>
                        </ul>
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

    <div class='row d-flex justify-content-center productcard'>
        <div class="card mb-3 mt-auto" style="max-width: 100%;background-color: #fdf5df;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="../Images/Wheat.jpg" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="text-center">Wheat</h2>
                        <hr>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th>Product ID</th>
                                    <th>23535</th>
                                </tr>
                                <tr>
                                    <th>Delivery ID</th>
                                    <th>28282</th>
                                </tr>
                                <tr>
                                    <th>Quantity</th>
                                    <th>200 kg</th>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <th>₹ 100</th>
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-grid gap-2">
                            <input class="btn btn-success " type="submit" name="ureg_otp" value="Remove From Cart"
                                style="background-color: #F92C85; border:#F92C85">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3 mt-auto" style="max-width: 100%; background-color: #fdf5df;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="../Images/Wheat.jpg" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="text-center">Wheat</h2>
                        <hr>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th>Product ID</th>
                                    <th>23535</th>
                                </tr>
                                <tr>
                                    <th>Delivery ID</th>
                                    <th>28282</th>
                                </tr>
                                <tr>
                                    <th>Quantity</th>
                                    <th>200 kg</th>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <th>₹ 100</th>
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-grid gap-2">
                            <input class="btn btn-success " type="submit" name="ureg_otp" value="Remove From Cart"
                                style="background-color: #F92C85; border:#F92C85">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

    <!-- <div class="container" style="max-width: 80%; background:chocolate">
        <div class="row">
            <div class="col">
                <img src="https://img.icons8.com/bubbles/300/000000/user.png" />
            </div>
            <div class="col">
                <div class="row">
                    <div class="col text-center">
                        <h4>{$fname} {$lname}</h4>
                    </div>
                    <div class="col text-center">
                        <h4>{$dob}</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <h4>{$address}</h4>
                    </div>
                    <div class="col text-center">
                        <h4>{$district}</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <h4>{$email}</h4>
                    </div>
                    <div class="col text-center">
                        <h4>{$phone}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- End of Personal Data -->


    <!-- <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg"
            role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777"
                dy=".3em">140x140</text>
        </svg>
    </div> -->

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