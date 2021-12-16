<?php
include "../config.php";
require "../mail_sender.php";
error_reporting(0);
session_start();
if (isset($_SESSION['UAADHAR'])) {
    if (isset($_POST['feedback_btn'])) {
        echo "<script>alert('Hello Wolrd')</script>";
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

    <title>Feedback</title>
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
                        <a class="nav-link" style="margin-right: 20px;" aria-current="page" href="ucart.php">My Cart</a>
                    </li>

                    <!-- Contact Us -->
                    <li class="nav-item">
                        <a class="nav-link active" style="margin-right: 10px;" href="contactus.php">Feedback</a>
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
    <!-- Registration Form -->
    <div class="container-fluid" style="max-width: 100%; height:auto;">
        <div class="row justify-content-center align-items-center " style="margin: 20px 0px 20px 0px;">
            <div class="col-md-4 feedbackphoto">
                <h2 style="margin: 20px 0px 0px 40px;color:#008080"> <strong>Feel free to drop us your
                        feedback!</strong> </h2>
                <img src="../Images/Feedback.svg" class="col-md-4 img-fluid" alt=""
                    style="margin: 100px 0px 100px 0px; width:1000px">
            </div>
            <div class="col-md-4 feebackform">
                <form method="POST">
                    <h5 style="margin: 20px 0px 0px 40px;color:#008080">How satisfied are you overall with the support
                        of Food & Civil Supplies?</h5>
                    <div style="margin: 20px 0px 0px 40px;">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="rating" value="1">
                            <label class="form-check-label">Very unsatisfied</label>
                        </div>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="rating" value="2">
                            <label class="form-check-label">Somewhat unsatisfied</label>
                        </div>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="rating" value="3" checked>
                            <label class="form-check-label">Neither satisfied nor dissatisfied</label>
                        </div>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="rating" value="4">
                            <label class="form-check-label">Somewhat satisfied</label>
                        </div>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="rating" value="5">
                            <label class="form-check-label">Very satisfied</label>
                        </div>
                        <br>
                    </div>
                    <div class="form-floating" style="margin: 40px 0px 40px 0px;">
                        <textarea class="form-control feedbackmsg" placeholder="Leave a comment here"
                            id="floatingTextarea2" style="height: 100px" required></textarea>
                        <label for="floatingTextarea2">Please tell your reason's for giving this score here.</label>
                    </div>

                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-primary" type="submit" name="feedback_btn"
                            style="border-radius: #008080;background-color: #008080;">Send
                            Feedback</button>
                    </div>

                </form>

            </div>
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