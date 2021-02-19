<?php
include "lib/library.php";

if (checkLogin() == false) {
    header("Location: login.php");
}

$nis = $_GET["nis"];

if (empty($nis)) header("Location: index.php");

$query = "DELETE FROM students WHERE nis = '$nis'";

// Cek jika query berhasil maka tampilkan 1, jika gagal 0
if ($mysqli->query($query)) {
    echo 1;
} else {
    echo 0;
};
