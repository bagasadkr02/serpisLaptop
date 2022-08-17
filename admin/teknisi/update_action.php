<?php
include '../../conn.php';

session_start();
if ($_SESSION['status'] != "login") {
    header("location: ../../login/index.php");
}

$id = $_POST['id_teknisi'];
$name = $_POST['nama'];
$telp = $_POST['telp'];


//query update
mysqli_query($mysqli, "update teknisi set nama='$name', telp='$telp' WHERE id_teknisi='$id' ");

header("location:index.php");
