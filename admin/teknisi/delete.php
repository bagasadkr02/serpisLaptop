<?php
include '../../conn.php';
session_start();
if ($_SESSION['status'] != "login") {
    header("location: ../../login/index.php");
}
$id = $_GET['id_teknisi'];

mysqli_query($mysqli, "DELETE FROM teknisi WHERE id_teknisi='$id'");

header("location:index.php");
