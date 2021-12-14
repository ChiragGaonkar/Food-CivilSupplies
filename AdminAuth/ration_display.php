<?php
include "connect.php";
session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Display Ration</title>

    <script src="https://kit.fontawesome.com/5019775b3a.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container">

        <div>
            <button><a href="ration_add.php" target="_blank">ADD PRODUCT</a></button>
        </div>

        <table>

            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Ouantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Manufacturing Date</th>
                    <th scope="col">Expiry Date</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $district = $_SESSION['DISTRICT'];
                $sql = "Select *from `products` where district = '$district'";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $pid = $row["Pid"];
                        $pname = $row["Pname"];
                        $quantity = $row["Quantity"];
                        $price = $row["Price"];
                        $md = $row["Manu_date"];
                        $ed = $row["Expiry_date"];

                        echo '<tr>
                    <th scope="row" >' . $pid . '</th>
                    <td>' . $pname . '</td>
                    <td>' . $quantity . '</td>
                    <td>' . $price . '</td>
                    <td>' . $md . '</td>
                    <td>' . $ed . '</td>
                    <td>
                    <button><a href="ration_update.php?updateid=' . $pid . '">Update</a></button>
                    <button><a href="ration_del.php?deleteid=' . $pid . '">Delete</a></button>
                    </td>
                </tr>';
                    }
                }


                ?>

            </tbody>

        </table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>