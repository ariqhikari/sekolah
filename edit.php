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

    $query = "UPDATE students SET
        nis = '$nis',
        name = '$name',
        gender = '$gender',
        address = '$address',
        phone_number = '$phone_number',
        class = '$class',
    ";

    $mysqli->query($query) or die($mysqli->error);

    header("Location: index.php");
}

$nis = $_GET["nis"];

if (empty($nis)) header("Location: index.php");

$query = "SELECT * FROM students WHERE nis = '$nis'";
$result = $mysqli->query($query);
$student = $result->fetch_assoc();

if (empty($student)) header("Location: index.php");

include "views/insert.php";
