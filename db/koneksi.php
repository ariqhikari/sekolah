<?php

include "lib/library.php";

$host = "localhost";
$user = "root";
$pass = "";
$db = "sekolah";

$mysqli = mysqli_connect($host, $user, $pass, $db) or die("Tidak dapat koneksi ke database");
