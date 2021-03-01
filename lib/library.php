<?php
include "db/koneksi.php";

session_start();

function flash($tipe, $pesan = "")
{
    if (empty($pesan)) {
        // Get
        $pesan = @$_SESSION[$tipe];
        unset($_SESSION[$tipe]);

        return $pesan;
    } else {
        // Set
        $_SESSION[$tipe] = is_array(@$_SESSION[$tipe]) ? $_SESSION[$tipe] : [];
        array_push($_SESSION[$tipe], $pesan);
    }
}

function checkLogin()
{
    $username = @$_SESSION["username"];
    $level = @$_SESSION["level"];

    if (!empty($username) and !empty($level)) {
        return true;
    }

    return false;
}
