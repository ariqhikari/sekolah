<?php

include "db/koneksi.php";

// Check apakah sudah login atau belum, jika sudah
// sistem akan me-redirect ke halaman index.php
if (checkLogin()) {
    header("Location: index.php");
}

// Jika terdapat request dengan method 'POST'
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Sistem akan mencari users dengan username dan password sesuai input user
    $query = "SELECT * FROM users
            WHERE username = '$username'
            AND password = SHA1('$password');";

    $data = $mysqli->query($query) or die($mysql->error);

    // Check apakah users tersebut terdaftar atau tidak
    if ($data->num_rows != 0) {
        $row = mysqli_fetch_object($data);
        $_SESSION["username"] = $row->username;
        $_SESSION["level"] = $row->level;

        header("Location: index.php");
    } else {
        $error = "Username atau Password salah";
    }
}

include "views/login.php";
