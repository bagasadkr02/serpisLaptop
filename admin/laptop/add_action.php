<?php

session_start();
if ($_SESSION['status'] != "login") {
    header("location: ../../login/index.php");
}

// koneksi database
include '../../conn.php';

// menginput data ke database
$name = $_POST['nama_laptop'];
$kerusakan = $_POST['kerusakan'];
$pemilik = $_POST['pemilik'];


$set = mysqli_query($mysqli, "INSERT INTO laptop VALUES('', '$name', '$kerusakan','$pemilik')");
// mengalihkan halaman kembali ke index.php
header("location:index.php");
