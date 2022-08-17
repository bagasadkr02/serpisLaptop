<?php
// mengaktifkan session
session_start();
if ($_SESSION['status'] != "login") {
    header("location: ../../login/index.php");
}

// menghapus semua session
session_destroy();

// mengalihkan halaman sambil mengirim pesan logout
header("location:../index.php?pesan=logout");
