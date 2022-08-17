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

// function query($query)
// {
//   global $mysqli;
//   $result = mysqli_query($mysqli, $query);
//   $rows = [];
//   while ($row = mysqli_fetch_assoc($result)) {
//     $rows[] = $row;
//   }
//   return $rows;
// }

// function cariResi($keyword)
// {
//   $query = "SELECT ds.resi, l.nama_laptop, l.kerusakan, l.pemilik, ds.status, t.nama
//             FROM detail_service AS ds JOIN teknisi AS t
//             ON ds.id_teknisi=t.id_teknisi JOIN laptop as l ON ds.id_detail_laptop=l.id_detail_laptop where
// 			  ds.resi = '$keyword' 
// 			";
//   return query($query);
// }
