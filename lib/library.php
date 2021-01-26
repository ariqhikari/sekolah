<?php

session_start();

function base_url()
{
    return "http://localhost/pwpb/semester2/praktikum1";
}

function flash($tipe, $pesan = "")
{
    if (empty($pesan)) {
        $pesan = @$_SESSION[$tipe];
        unset($_SESSION[$tipe]);
    } else {
        $_SESSION[$tipe] = $pesan;
    }
}

function checkLogin()
{
    $username = @$_SESSION["username"];
    $level = @$_SESSION["level"];

    if (empty($username) and empty($level)) {
        header("Location: login.php");
    }
}

function sudahLogin()
{
    $username = @$_SESSION["username"];
    $level = @$_SESSION["level"];

    if (!empty($username) and !empty($level)) {
        header("Location: index.php");
    }
}
