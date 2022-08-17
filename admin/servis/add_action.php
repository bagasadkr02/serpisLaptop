<?php

session_start();
if ($_SESSION['status'] != "login") {
    header("location: ../../login/index.php");
}

// koneksi database
include '../../conn.php';

//inisialisasi
$resi = "";
$kar = "1234567890QWERTYUIOPASDFGHJKLZXCVBNM";
//membuat kode pesan acak
for ($x = 1; $x <= 7; $x++) {
    $resi .= $kar[rand(0, strlen($kar) - 1)];
}

// menginput data ke database
$id_teknisi = $_POST['id_teknisi'];
$id_detail_laptop = $_POST['id_detail_laptop'];

//SELECT teknisi.nama, laptop.nama_laptop, detail_service.resi, detail_service.status from teknisi inner join laptop INNER JOIN detail_service;

//kolom -> id, id_teknisi, id_detail_laptop, resi, status
// INSERT INTO detail_service
// SELECT '', '2','2','ASD123','B';

$set = mysqli_query($mysqli, "INSERT INTO detail_service SELECT '', '$id_teknisi','$id_detail_laptop','$resi','B';");
// mengalihkan halaman kembali ke index.php
header("location:index.php");
