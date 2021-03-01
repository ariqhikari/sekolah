<?php
include "lib/library.php";

if (checkLogin() == false) {
    header("Location: login.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nis = @$_POST["nis"];
    $name = @$_POST["name"];
    $gender = @$_POST["gender"];
    $address = @$_POST["address"];
    $phone_number = @$_POST["phone_number"];
    $class_id = @$_POST["class_id"];
    $avatar = @$_FILES["avatar"];

    empty($nis) ? flash("error", "Mohon masukkan NIS") : null;
    empty($name) ? flash("error", "Mohon masukkan Nama Lengkap") : null;
    empty($gender) ? flash("error", "Mohon masukkan Jenis Kelamin") : null;
    empty($address) ? flash("error", "Mohon masukkan Alamat") : null;
    empty($phone_number) ? flash("error", "Mohon masukkan Nomor Telepon") : null;
    empty($class_id) ? flash("error", "Mohon masukkan Kelas") : null;

    if (!empty($nis) && !empty($name) && !empty($gender) && !empty($address) && !empty($address) && !empty($phone_number) && !empty($class_id)) {
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

        flash("success", "Siswa berhasil dibuat!");
        header("Location: index.php");
    }
}

// Ambil pesan-pesan error
$errors = flash("error");

// Ambil Data Kelas
$query = "SELECT * FROM classes";
$result = $mysqli->query($query);

include "views/insert.php";
