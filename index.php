<?php

include "db/koneksi.php";

// Check apakah sudah login atau belum, jika belum
// sistem akan me-redirect ke halaman login.php
if (checkLogin() == false) {
    header("Location: login.php");
}

// Membuat Query SQL mengambil data siswa
$query = "SELECT * FROM students";
$result = $mysqli->query($query);

include "views/index.php";
