<?php
include '../../conn.php';
session_start();
if ($_SESSION['status'] != "login") {
    header("location: ../../login/index.php");
}
$id = $_GET['id_detail_laptop'];

mysqli_query($mysqli, "DELETE FROM laptop WHERE id_detail_laptop='$id'");

header("location:index.php");
