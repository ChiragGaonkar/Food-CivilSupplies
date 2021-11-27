<?php
include "config.php";
require "mail_sender.php";
error_reporting(0);
session_start();

if (isset($_POST['areg_submit'])) {
    $aid = mysqli_escape_string($connection, $_POST['AID']);
    $afname = mysqli_escape_string($connection, $_POST['AFNAME']);
    $alname = mysqli_escape_string($connection, $_POST['ALNAME']);
    $aemail = mysqli_escape_string($connection, $_POST['AEMAIL']);
    $apassword = mysqli_escape_string($connection, md5($_POST['APASSWORD']));
    $aconfirm_password = mysqli_escape_string($connection, md5($_POST['ACPASSWORD']));
    $adistrict = mysqli_escape_string($connection, $_POST['ADISTRICT']);
    $aaadharnum = mysqli_escape_string($connection, $_POST['AAADHARNUM']);

    if ($apassword === $aconfirm_password) {
        $sql = "SELECT * FROM admin_data WHERE AEMAIL = '$aemail'";
        $result = mysqli_query($connection, $sql);
        if (!mysqli_num_rows($result) > 0) {
            $sql = "INSERT INTO admin_data (AID,AFNAME,ALNAME,AEMAIL,APASSWORD,ADISTRICT,AAADHARNUM) 
            VALUES ($aid,'$afname','$alname','$aemail','$apassword','$adistrict',$aaadharnum)";
            $result = mysqli_query($connection, $sql);
            if ($result) {
                echo "<script>alert('Successfully Registered')</script>";
                header("location:alogin.php");
            } else {
                echo "<script>alert('Whoops!! Something Went Wrong.')</script>";
            }
        } else {
            echo "<script>alert('Email Id Already Exists.')</script>";
        }
    } else {
        echo "<script>alert('Password Not Matched')</script>";
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

    <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
    .inputs {
        margin-top: 5px;
    }

    .myform {
        border: 0px solid;
        width: auto;
        padding: 30px;
        border-radius: 8px;
        background-image: linear-gradient(to bottom right, green, white);
    }
    </style>

    <script>
    function validate() {
        var aid = document.forms['myform']['AID'].value;
        var aadhar = document.forms['myform']['AAADHARNUM'].value;
        var lenaid = aid.length;
        var lenaadhar = aadhar.length;
        if (lenaid != 8) {
            alert("Admin ID must be a 8 Digit Number.");
            return false;
        }
        if (lenaadhar != 12) {
            alert("Aadhar Card Number must be a 12 Digit Number");
            return false;
        }

    }
    </script>

    <title>Register</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" style="padding: 10px 30px 10px 30px">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">
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
                        <a class="nav-link" style="margin-right: 20px;" aria-current="page" href="home.php">Home</a>
                    </li>

                    <!-- Log In -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="margin-right: 10px;" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Log-In
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="alogin.php">
                                    <img src="images/AdminLogo.png" style="width: 40px;" alt="Admin">
                                    Admin
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item" href="#">
                                    <img src="images/UserLogo.png" style="width: 40px;" alt="Admin">
                                    Customer
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item" href="#">
                                    <img src="images/DeliveryLogo.png" style="width: 40px;" alt="Admin">
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
                                <a class="dropdown-item" href="aregister.php">
                                    <img src="images/AdminLogo.png" style="width: 40px;" alt="Admin">
                                    Admin
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <img src="images/UserLogo.png" style="width: 40px;" alt="Admin">
                                    Customer
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <img src="images/DeliveryLogo.png" style="width: 40px;" alt="Admin">
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
    <div class="container-fluid" style="background-color: #49d590; max-width: 100%; height:auto;">
        <div class="row justify-content-center align-items-center">
            <img src="images/RegAdmin.svg" class="col-md-4 img-fluid" alt="" style="margin: 100px 0px 0px 0px;">
            <form name="myform" action="" method="POST" class="col-md-4 myform" style="margin: 30px 0px 0px 0px;"
                onsubmit="return validate()">
                <h4 class="text-center">Admin Registration</h4>
                <hr>
                <div class="form-group row">
                    <div class="input-group inputs" style="width: auto;">
                        <span class="input-group-text" style="width: 160px;">Admin ID</span>
                        <input type="number" class="form-control" name="AID" autofocus required>
                    </div>
                    <div class="input-group inputs" style="width: auto;">
                        <span class="input-group-text" style="width: 160px;">Aadhar Number</span>
                        <input type="number" class="form-control" name="AAADHARNUM" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="input-group inputs" style="width: auto;">
                        <span class="input-group-text" style="width: 160px;">First Name</span>
                        <input type="text" class="form-control" name="AFNAME" required>
                    </div>
                    <div class="input-group inputs" style="width: auto;">
                        <span class="input-group-text" style="width: 160px;">Last Name </span>
                        <input type="text" class="form-control" name="ALNAME" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="input-group inputs" style="width: auto;">
                        <span class="input-group-text" style="width: 160px;">Email-ID</span>
                        <input type="email" class="form-control" name="AEMAIL" required>
                    </div>
                    <div class="input-group inputs" style="width: auto;">
                        <span class="input-group-text" style="width: 160px;">District</span>
                        <select class="form-select" id="inputGroupSelect01" style="width: 206px;" name="ADISTRICT">
                            <option value="North-Goa" name="ADISTRICT">North Goa</option>
                            <option value="South-Goa" name="ADISTRICT">South Goa</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="input-group inputs" style="width: auto;">
                        <span class="input-group-text" style="width: 160px;">Password</span>
                        <input type="password" class="form-control" name="APASSWORD" required>
                    </div>
                    <div class="input-group inputs" style="width: auto;">
                        <span class="input-group-text" style="width: 160px;">Confirm Password</span>
                        <input type="password" class="form-control" name="ACPASSWORD" required>
                    </div>
                </div>
                <div class="d-grid gap-2 inputs">
                    <input class="btn btn-success" type="submit" name="areg_submit" value="Register">
                </div>
                <h6 class="text-center inputs">or</h6>
                <h6 class="text-center inputs"><a href="alogin.php" style="color: black; text-decoration: none;">Already
                        Registered? Log-In</a>
                </h6>
            </form>
        </div>
        <div class=" row">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#ffffff" fill-opacity="1" d="M0,32L11.4,58.7C22.9,85,46,139,69,170.7C91.4,203,
                    114,213,137,192C160,171,183,117,206,112C228.6,107,251,
                    149,274,165.3C297.1,181,320,171,343,144C365.7,117,389,75,
                    411,53.3C434.3,32,457,32,480,42.7C502.9,53,526,75,549,
                    112C571.4,149,594,203,617,202.7C640,203,663,149,686,149.3C708.6,149,
                    731,203,754,186.7C777.1,171,800,85,823,69.3C845.7,53,869,107,
                    891,144C914.3,181,937,203,960,213.3C982.9,224,1006,224,1029,224C1051.4,
                    224,1074,224,1097,218.7C1120,213,1143,203,1166,186.7C1188.6,171,1211,149,
                    1234,117.3C1257.1,85,1280,43,1303,74.7C1325.7,107,1349,213,1371,229.3C1394.3,
                    245,1417,171,1429,133.3L1440,96L1440,320L1428.6,320C1417.1,320,1394,
                    320,1371,320C1348.6,320,1326,320,1303,320C1280,320,1257,320,1234,
                    320C1211.4,320,1189,320,1166,320C1142.9,320,1120,320,1097,320C1074.3,
                    320,1051,320,1029,320C1005.7,320,983,320,960,320C937.1,320,914,320,891,
                    320C868.6,320,846,320,823,320C800,320,777,320,754,320C731.4,320,709,320,
                    686,320C662.9,320,640,320,617,320C594.3,320,571,320,549,320C525.7,320,503
                    ,320,480,320C457.1,320,434,320,411,320C388.6,320,366,320,343,320C320,320,297,
                    320,274,320C251.4,320,229,320,206,320C182.9,320,160,320,137,320C114.3,320,91,
                    320,69,320C45.7,320,23,320,11,320L0,320Z">
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