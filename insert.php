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
    $avatar = $_FILES["avatar"];

    if (!empty($avatar) and $avatar["error"] == 0) {
        $path = "./assets/img/students/";
        $upload = move_uploaded_file($avatar["tmp_name"], $path . $avatar["name"]);

        if (!$upload) {
            flash("error", "Upload file gagal!");
            header("Location: index.php");
        }

        $avatar = $avatar["name"];
    } else {
        $avatar = "default.jpg";
    }

    $query = "INSERT INTO students (nis, name, gender, address, phone_number, class, avatar) 
        VALUES ('$nis', '$name', '$gender', '$address', '$phone_number', '$class', '$avatar')";

    $mysqli->query($query) or die($mysqli->error);

    header("Location: index.php");
}

include "views/insert.php";
