<?php
require("../mail_sender.php");
include "../config.php";
error_reporting(0);
session_start();

$uaadhar = $_SESSION['uaadharnum'];
$uemail = $_SESSION['uemail'];
$ufname = $_SESSION['ufname'];
$ulname = $_SESSION['ulname'];
$ugender = $_SESSION['ugender'];
$udob = $_SESSION['udob'];
$upassword = $_SESSION['upassword'];
$uaddress = $_SESSION['uaddress'];
$uphone = $_SESSION['uphone'];
$udistrict = $_SESSION['udistrict'];
$otp = $_SESSION['otp'];

// INSERTING DATA
$uotp = mysqli_escape_string($connection, $_POST['UOTP']);
if (isset($_POST['ureg_otp'])) {
    if ($otp == $uotp) {
        $sql = "INSERT INTO user_data (UAADHAR,UEMAIL,UFNAME,ULNAME,UDOB,UGENDER,UPASSWORD,UADDRESS,UDISTRICT,UPHONE) 
                VALUES ($uaadhar,'$uemail','$ufname','$ulname','$udob','$ugender','$upassword','$uaddress','$udistrict',$uphone)";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            header("refresh:5;url=ulogin.php");
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'
            style='max-width: 70%; position: absolute; top: 10%;' >
            Congrats You have Successfully Registered.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        } else {
            header("refresh:5;url=aregister.php");
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'
            style='max-width: 70%; position: absolute; top: 10%;' >
            Admin Id/Aadhar Number already exists.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
    } else {
        //header("refresh:5;url=aotpreg.php");
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'
            style='max-width: 70%; position: absolute; top: 10%;' >
            Please enter a Correct OTP.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    }
}


// END OF INSERTING DATA
//$sql = "INSERT INTO generated_otp(OTP,ISSUETIME) VALUES ($otp,ADDTIME(CURRENT_STAMP(),001500))";
//$result = mysqli_query($connection, $sql);
//if ($result) {
//}

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

    <title>Register</title>
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav" style="margin-left: auto;">
                    <!-- Home -->
                    <li class="nav-item">
                        <a class="nav-link" style="margin-right: 20px;" aria-current="page" href="../index.php">Home</a>
                    </li>

                    <!-- Log In -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="margin-right: 10px;" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Log-In
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="../AdminAuth/alogin.php">
                                    <img src="../Images/AdminLogo.png" style="width: 40px;" alt="Admin">
                                    Admin
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item" href="ulogin.php">
                                    <img src="../Images/UserLogo.png" style="width: 40px;" alt="Admin">
                                    Customer
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item" href="../CourierAuth/clogin.php">
                                    <img src="../Images/DeliveryLogo.png" style="width: 40px;" alt="Admin">
                                    Deliveryman
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Register -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" style="margin-right: 10px;" href="#"
                            id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Register
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="../AdminAuth/aregister.php">
                                    <img src="../Images/AdminLogo.png" style="width: 40px;" alt="Admin">
                                    Admin
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="ulogin.php">
                                    <img src="../Images/UserLogo.png" style="width: 40px;" alt="Admin">
                                    Customer
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="../CourierAuth/cregister.php">
                                    <img src="../Images/DeliveryLogo.png" style="width: 40px;" alt="Admin">
                                    Deliveryman
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" style="margin-right: 10px;" href="#">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End of Navbar -->

    <!-- Registration Form -->
    <div class="container-fluid" style="background-color: #FDF5DF; max-width: 100%; height:auto;">
        <div class="row justify-content-center align-items-center">
            <img src="../Images/UserOTP.svg" class="col-md-4 img-fluid" alt="" style="margin: 100px 0px 0px 0px;">
            <form name="myform" action="" method="POST" class="col-md-4 myform" style="margin: 30px 0px 0px 0px;">
                <div class="form-group row">
                    <div class="input-group inputs" style="width: auto;">
                        <span class="input-group-text" style="width: 160px;">One Time Password</span>
                        <input type="number" class="form-control" name="UOTP" required>
                    </div>
                </div>
                <div class="d-grid gap-2 inputs">
                    <input class="btn btn-success" type="submit" name="ureg_otp" value="Register"
                        style="background-color: #F92C85; border:#F92C85">
                </div>
            </form>
        </div>
        <div class=" row">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#ffffff" fill-opacity="1" d="M0,128L17.1,106.7C34.3,85,69,43,103,69.3C137.1,
                    96,171,192,206,197.3C240,203,274,117,309,106.7C342.9
                    ,96,377,160,411,160C445.7,160,480,96,514,64C548.6,
                    32,583,32,617,32C651.4,32,686,32,720,37.3C754.3,43
                    ,789,53,823,90.7C857.1,128,891,192,926,192C960,192,
                    994,128,1029,133.3C1062.9,139,1097,213,1131,202.7C1165.7
                    ,192,1200,96,1234,58.7C1268.6,21,1303,43,1337,42.7C1371.4
                    ,43,1406,21,1423,10.7L1440,0L1440,320L1422.9,320C1405.7,
                    320,1371,320,1337,320C1302.9,320,1269,320,1234,320C1200,
                    320,1166,320,1131,320C1097.1,320,1063,320,1029,320C994.3,
                    320,960,320,926,320C891.4,320,857,320,823,320C788.6,320,
                    754,320,720,320C685.7,320,651,320,617,320C582.9,320,549,
                    320,514,320C480,320,446,320,411,320C377.1,320,343,320,309,
                    320C274.3,320,240,320,206,320C171.4,320,137,320,103,
                    320C68.6,320,34,320,17,320L0,320Z">
                </path>
            </svg>
        </div>
    </div>
    <!-- End of Registration Form -->

    <!-- Footer -->
    <div class="bg-dark text-secondary px-4 py-5 text-center">
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