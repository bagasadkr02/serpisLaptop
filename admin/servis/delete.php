<?php
include '../../conn.php';
session_start();
if ($_SESSION['status'] != "status") {
    header("location:../login/login.php");
}
$id = $_GET['id'];

mysqli_query($mysqli, "DELETE FROM detail_service WHERE id='$id'");

header("location:index.php");
