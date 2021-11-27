<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "food_civil_supplies";

$connection = mysqli_connect($server, $username, $password, $database);

if (!$connection) {
    die("<script>alert('Connection Not Established.')</script>");
}