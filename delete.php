<?php
include "lib/library.php";

if (checkLogin() == false) {
    header("Location: login.php");
}

$nis = $_GET["nis"];

if (empty($nis)) header("Location: index.php");

$query = "DELETE FROM students WHERE nis = '$nis'";
$result = $mysqli->query($query);

$mysqli->query($query) or die($mysqli->error);

header("Location: index.php");
