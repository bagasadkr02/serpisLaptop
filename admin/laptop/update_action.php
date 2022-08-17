<?php
include '../../conn.php';

session_start();
if ($_SESSION['status'] != "login") {
    header("location: ../../login/index.php");
}

$id = $_POST['id_detail_laptop'];
$name = $_POST['nama_laptop'];
$kerusakan = $_POST['kerusakan'];
$pemilik = $_POST['pemilik'];


//query update
mysqli_query($mysqli, "update laptop set nama_laptop='$name', kerusakan='$kerusakan', pemilik='$pemilik' WHERE id_detail_laptop='$id' ");

header("location:index.php");
