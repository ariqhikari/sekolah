<?php

session_start();

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

    if (!empty($username) and !empty($level)) {
        return true;
    }

    return false;
}
