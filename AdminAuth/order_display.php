<?php
include "../config.php";
session_start();
error_reporting(0);
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

    <title>Ration</title>
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

    <!-- Display Orders -->
    <div class="container">

        <div>
            <h1 class="text-center" style="color: white;">ORDER DETAILS</h1>
        </div>

        <br>
        <div class="table-responsive">
            <table class="table table-bordered   text-center">

                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">REFERENCE ID</th>
                        <th scope="col">PID</th>
                        <th scope="col">UAADHAR</th>
                        <th scope="col">QUANTITY</th>
                        <th scope="col">ORDERDATE</th>
                        <th scope="col">DELIVERDATE</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">PAYMENT</th>
                        <th colspan="2">ACTION</th>
                    </tr>
                </thead>

                <tbody class="bg-dark text-white">
                    <?php
                    $district = $_SESSION['DISTRICT'];
                    $sql = "Select *from `order_data`,`user_data` where order_data.UAADHAR=user_data.UAADHAR AND UDISTRICT = '$district' ";
                    $result = mysqli_query($connection, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $rid = $row["REFERENCEID"];
                            $pid = $row["PID"];
                            $udhr = $row["UAADHAR"];
                            $quantity = $row['PRODUCT_QUANTITY'];
                            $orderdate = $row["ORDERDATE"];
                            $deliverdate = $row["DELIVERDATE"];
                            $status = $row["STATUS"];
                            $pay = $row["PAYMENT"];
                            


                            echo '<tr>
                                    <th scope="row" >' . $rid . '</th>
                                    <td>' . $pid . '</td>
                                    <td>' . $udhr . '</td>
                                    <td>' . $quantity . '</td>
                                    <td>' . $orderdate . '</td>
                                    <td>' . $deliverdate . '</td>
                                    <td>' . $status . '</td>
                                    <td>' . $pay . '</td>
                                    <td><a href="approve.php?updateid=' . $rid . '" data-toggle="tooltip" data-placement="bottom" title="Shipp"> <i class="fa fa-check" aria-hidden="true"></i></a></td>
                                    <td><a href="approve.php?updatedid=' . $rid . '" data-toggle="tooltip" data-placement="bottom" title="Discard"> <i class="fa fa-times" aria-hidden="true"></i></a></td>
                                    </td>
                                 </tr>';
                        }
                    }


                    ?>

                </tbody>

                

            </table>
        </div>

    </div>

    <!-- End Of Display products -->


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
