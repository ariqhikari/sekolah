<?php
include "lib/library.php";

if (checkLogin() == false) {
    header("Location: login.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nis = $_POST["nis"];
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $phone_number = $_POST["phone_number"];
    $class = $_POST["class"];

    $query = "INSERT INTO students (nis, name, gender, address, phone_number, class) 
        VALUES ('$nis', '$name', '$gender', '$address', '$phone_number', '$class')";

    $mysqli->query($query) or die($mysqli->error);

    header("Location: index.php");
}

include "views/insert.php";
