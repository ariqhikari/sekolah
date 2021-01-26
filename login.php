<?php

include "db/koneksi.php";

sudahLogin();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users
            WHERE username = '$username'
            AND password = SHA1('$password');";

    $data = $mysqli->query($query) or die($mysql->error);

    if ($data->num_rows != 0) {
        $row = mysqli_fetch_object($data);
        $_SESSION["username"] = $row->username;
        $_SESSION["password"] = $row->password;

        header("Location: index.php");
    } else {
        $error = "Username atau Password salah";
    }
}

include "views/login.php";
