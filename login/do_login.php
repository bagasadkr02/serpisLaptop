<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include '../conn.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($mysqli, "select * from users where username='$username' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = true;
    header("location:../admin/index.php");
} else {
    header("location:index.php?pesan=gagal");
}
