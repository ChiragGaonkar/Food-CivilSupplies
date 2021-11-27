<?php
include "../config.php";
session_start();
error_reporting(0);
if (isset($_POST['alogin_submit'])) {
    $aid = $_POST['AID'];
    $apassword = md5($_POST['APASSWORD']);
    $sql = "SELECT * FROM admin_data WHERE AID = $aid AND APASSWORD = '$apassword'";
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['AID'] = $row['AID'];
        header("refresh:5;url=apersonal.php");
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'
            style='max-width: 70%; position: absolute; top: 10%;' >
            Logged In Successfully.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'
            style='max-width: 70%; position: absolute; top: 10%;' >
            Admin Id/Password may be Incorrect! Try Again.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
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

    <link rel="stylesheet" href="astyle.css">
    <script>
    function validate() {
        var aid = document.forms["myform"]["AID"].value;
        var lenaid = aid.length;
        if (lenaid != 8) {
            alert("Admin Id must be a 8 Digit Number");
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
                    <!-- Home -->
                    <li class="nav-item">
                        <a class="nav-link" style="margin-right: 20px;" aria-current="page" href="../home.php">Home</a>
                    </li>

                    <!-- Log In -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" style="margin-right: 10px;" href="#"
                            id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Log-In
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="alogin.php">
                                    <img src="../Images/AdminLogo.png" style="width: 40px;" alt="Admin">
                                    Admin
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item" href="../UserAuth/ulogin.php">
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
                        <a class="nav-link dropdown-toggle" style="margin-right: 10px;" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Register
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="aregister.php">
                                    <img src="../Images/AdminLogo.png" style="width: 40px;" alt="Admin">
                                    Admin
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="../UserAuth/uregister.php">
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

    <!-- Log-In Form -->
    <div class="container-fluid" style="background-color: #8AA899; max-width: 100%; height:auto;">
        <div class="row justify-content-center align-items-center">
            <form action="" name="myform" method="POST" class="col-md-4 myform" style="margin: 50px 0px 0px 0px;"
                onsubmit="return validate()">
                <h4 class="text-center">Admin Log-In</h4>
                <hr>
                <div class="form-group row">
                    <div class="input-group inputs" style="width: auto;">
                        <span class="input-group-text" style="width: 160px;">Admin ID</span>
                        <input type="text" class="form-control" name="AID" autofocus required>
                    </div>
                    <div class="input-group inputs" style="width: auto;">
                        <span class="input-group-text" style="width: 160px;">Password</span>
                        <input type="password" class="form-control" name="APASSWORD" required>
                    </div>
                </div>
                <div class="d-grid gap-2 inputs">
                    <input class="btn btn-success" type="submit" name="alogin_submit" value="Log-In"
                        style="background-color: #F2D349; border:#F2D349">
                </div>
                <h6 class="text-center inputs">or</h6>
                <h6 class="text-center inputs">
                    <a href="aregister.php" style="color: black; text-decoration: none;">Not a User? Register Now </a>
                    <a href="aforgotpassword.php" style="color: black; text-decoration: none;">| Forgot Password</a>
                </h6>
            </form>
            <img src="../Images/LogAdmin.svg" class="col-md-4 img-fluid" alt="" style="margin: 50px 0px 0px 0px;">
        </div>
        <div class="row">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#ffffff" fill-opacity="1" d="M0,192L11.4,181.3C22.9,171,46,149,69,128C91.4,107,114,85,137,117.3C160,
                    149,183,235,206,234.7C228.6,235,251,149,274,128C297.1,107,320,149,343,
                    176C365.7,203,389,213,411,202.7C434.3,192,457,160,480,176C502.9,192,526,
                    256,549,256C571.4,256,594,192,617,181.3C640,171,663,213,686,224C708.6,235,
                    731,213,754,213.3C777.1,213,800,235,823,213.3C845.7,192,869,128,891,112C914.3,
                    96,937,128,960,154.7C982.9,181,1006,203,1029,208C1051.4,213,1074,203,1097
                    ,181.3C1120,160,1143,128,1166,112C1188.6,96,1211,96,1234,96C1257.1,96,1280,
                    96,1303,90.7C1325.7,85,1349,75,1371,85.3C1394.3,96,1417,128,1429,144L1440,
                    160L1440,320L1428.6,320C1417.1,320,1394,320,1371,320C1348.6,320,1326,320,
                    1303,320C1280,320,1257,320,1234,320C1211.4,320,1189,320,1166,320C1142.9,320,
                    1120,320,1097,320C1074.3,320,1051,320,1029,320C1005.7,320,983,320,960,320C937.1,
                    320,914,320,891,320C868.6,320,846,320,823,320C800,320,777,320,754,320C731.4,
                    320,709,320,686,320C662.9,320,640,320,617,320C594.3,320,571,320,549,320C525.7,
                    320,503,320,480,320C457.1,320,434,320,411,320C388.6,320,366,320,343,320C320,320
                    ,297,320,274,320C251.4,320,229,320,206,320C182.9,320,160,320,137,320C114.3,320,
                    91,320,69,320C45.7,320,23,320,11,320L0,320Z">
                </path>
            </svg>
        </div>
    </div>
    <!-- End of Log-In Form -->

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