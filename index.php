<?php

include "lib/library.php";

// Check apakah sudah login atau belum, jika belum
// sistem akan me-redirect ke halaman login.php
if (checkLogin() == false) {
    header("Location: login.php");
}

$success = flash("success");

// Membuat Query SQL mengambil data siswa
$query = "SELECT 
        -- kolom yg akan diambil
        students.nis,
        students.name,
        students.gender,
        students.address,
        students.phone_number,
        students.avatar,
        classes.name as class_name
        -- Tabel students INNER JOIN / relation dengan classes
        FROM students
        INNER JOIN classes
        ON students.class_id = classes.id";

// Searching
$search = @$_GET['search'];
if (!empty($search)) {
    $query .= " WHERE nis LIKE '%$search%' 
            OR name LIKE '%$search%'";
}

// Ordering
$order_field = @$_GET['sort']; // Mengambil field yang akan di sort
$order_mode = @$_GET['order']; // Mengambil modenya, asc / desc
if (!empty($order_field) && !empty($order_mode)) {
    $query .= " ORDER BY $order_field $order_mode";
}

$result = $mysqli->query($query);

include "views/index.php";
