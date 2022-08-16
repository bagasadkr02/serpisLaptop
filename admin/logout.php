<?php
// mengaktifkan session
session_start();
if ($_SESSION['status'] != "status") {
    header("location:../login/login.php");
}

// menghapus semua session
session_destroy();

// mengalihkan halaman sambil mengirim pesan logout
header("location:../index.php?pesan=logout");
