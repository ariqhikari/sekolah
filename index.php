<?php

include "db/koneksi.php";

$success = flash("success");
$error = flash("error");

checkLogin();

// Membuat Query SQL mengambil data siswa
$query = "SELECT * FROM students";
$result = $mysqli->query($query);

include "views/index.php";
