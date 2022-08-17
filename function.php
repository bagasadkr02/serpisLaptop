<?php
function query($query)
{
    global $mysqli;
    $result = mysqli_query($mysqli, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function cariResi($keyword)
{
    $query = "SELECT ds.resi, l.nama_laptop, l.kerusakan, l.pemilik, ds.status, t.nama
            FROM detail_service AS ds JOIN teknisi AS t
            ON ds.id_teknisi=t.id_teknisi JOIN laptop as l ON ds.id_detail_laptop=l.id_detail_laptop where
			  ds.resi = '$keyword' 
			";

    if (query($query)) {
        $_SESSION['keyword'] = ['type' => true, 'message' => 'Resi dengan no resi  ' . '<b> ' . $keyword . ' </b>' . ' Ditemukan' . '.'];
    } else {
        $_SESSION['keyword'] = ['type' => false, 'message' => 'Resi dengan no resi  ' . '<b> ' . $keyword . ' </b>' . ' Tidak Dapat Ditemukan' . '.'];
    }

    return query($query);
    return $_SESSION['keyword'];
}
