<?php
$databaseHost = 'localhost:3307'; //port bagas
// $databaseHost = 'localhost';
$databaseName = 'servislaptop';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if (!$mysqli) {
    die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
}
