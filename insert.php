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
    $class_id = $_POST["class_id"];
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

    $query = "INSERT INTO students (nis, name, gender, address, phone_number, class_id, avatar) 
        VALUES ('$nis', '$name', '$gender', '$address', '$phone_number', '$class_id', '$avatar')";

    $mysqli->query($query) or die($mysqli->error);

    header("Location: index.php");
}

// Ambil Data Kelas
$query = "SELECT * FROM classes";
$result = $mysqli->query($query);

include "views/insert.php";
