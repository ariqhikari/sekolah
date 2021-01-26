<?php

// Menghapus session sebelumnya
session_start();
session_destroy();

header("Location: index.php");
