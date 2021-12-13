<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="commonstyle.css">

    <title>Home Page</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding: 10px 30px 10px 30px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
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
                        <a class="nav-link active " style="margin-right: 20px;" aria-current="page"
                            href="index.php">Home</a>
                    </li>

                    <!-- Log In -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="margin-right: 10px;" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Log-In
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="AdminAuth/alogin.php">
                                    <img src="images/AdminLogo.png" style="width: 40px;" alt="Admin">
                                    Admin
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item" href="UserAuth/ulogin.php">
                                    <img src="images/UserLogo.png" style="width: 40px;" alt="Admin">
                                    Customer
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item" href="CourierAuth/clogin.php">
                                    <img src="images/DeliveryLogo.png" style="width: 40px;" alt="Admin">
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
                                <a class="dropdown-item" href="AdminAuth/aregister.php">
                                    <img src="images/AdminLogo.png" style="width: 40px;" alt="Admin">
                                    Admin
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="UserAuth/uregister.php">
                                    <img src="images/UserLogo.png" style="width: 40px;" alt="Admin">
                                    Customer
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="CourierAuth/cregister.php">
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

    <!-- Front Page -->
    <div class="container-fluid" style="background-color: #697bdf;">
        <div class="row row-cols-1 row-cols-md-2  myfont1" style="height:100vh">
            <div class="col" style="max-height:0px">
                <img src="Images/Front.jpeg" alt="" class="img-fluid float-center">
            </div>
            <div class="col" style="height: 0px;margin-top:50px;">
                <h1 class="text-center">Food & Civil Supplies</h1>
                <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis libero quod
                    quis neque ratione non
                    eveniet temporibus quasi dolores iusto quia obcaecati laborum vel perferendis dolor, ad repellat
                    praesentium nemo!</p>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-primary" type="button"
                        style="background-color: #f9e37a;border:#f9e37a;color:black;outline:none;box-shadow: none;">New
                        Scheme</button>
                    <button class="btn btn-primary" type="button"
                        style="background-color: #f99b55;border:#f99b55;color:black;outline:none;box-shadow: none;">
                        Customer
                        Feedback</button>
                </div>
            </div>

        </div>
    </div>
    <div class="container-fluid" style="background-color: tomato;">
        <div style="height:100vh">
            <h1>New Scheme</h1>
        </div>
    </div>
    <div class="container-fluid" style="background-color: green;">
        <div style="height:100vh">
            <h1>Customer Feedback</h1>
        </div>
    </div>

    <!-- End of Front Page -->

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