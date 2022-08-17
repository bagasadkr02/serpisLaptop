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

include 'conn.php';
if (!empty($_FILES)) {
    // Validating SQL file type by extensions
    if (!in_array(strtolower(pathinfo($_FILES["backup_file"]["name"], PATHINFO_EXTENSION)), array(
        "sql"
    ))) {
        $response = array(
            "type" => "error",
            "message" => "Invalid File Type"
        );
    } else {
        if (is_uploaded_file($_FILES["backup_file"]["tmp_name"])) {
            move_uploaded_file($_FILES["backup_file"]["tmp_name"], $_FILES["backup_file"]["name"]);
            $response = restoreMysqlDB($_FILES["backup_file"]["name"], $mysqli);
        }
        $_SESSION['berhasil'] = ['type' => true, 'message' => 'Database berhasil dipulihkan.'];
    }
}

function restoreMysqlDB()
{
    include 'conn.php';
    if (isset($_POST['restore'])) {
        $sql = '';
        $error = '';
        if (file_exists(__DIR__ . '/_backup_.sql')) {
            // Deleting starts here
            $query_disable_checks = 'SET foreign_key_checks = 0';
            mysqli_query($mysqli, $query_disable_checks);
            $show_query = 'Show tables';
            $query_result = mysqli_query($mysqli, $show_query);
            $row = mysqli_fetch_array($query_result);
            while ($row) {
                $query = 'DROP TABLE IF EXISTS ' . $row[0];
                $query_result = mysqli_query($mysqli, $query);
                $show_query = 'Show tables';
                $query_result = mysqli_query($mysqli, $show_query);
                $row = mysqli_fetch_array($query_result);
            }
            $query_enable_checks = 'SET foreign_key_checks = 1';
            mysqli_query($conn, $query_enable_checks);
            // Deleting ends here
            $lines = file(__DIR__ . '/_backup_.sql');
            foreach ($lines as $line) {
                if (substr($line, 0, 2) == '--' || $line == '') {
                    continue;
                }
                $sql .= $line;
                if (substr(trim($line), -1, 1) == ';') {
                    $result = mysqli_query($conn, $sql);
                    if (!$result) {
                        $error .= mysqli_error($conn) . "\n";
                    }
                    $sql = '';
                }
            }
            if ($error) {
                $message = $error;
            } else {
                $message = "Database restored successfully";
            }
        } else {
            $message = "Uh Oh! No backup file found on the current directory!";
        }
    }
}

// function backup_db()
// {
//     header("location: ../../login/index.php");
// }
function backup_db()
{
    include 'conn.php';
    //get table list
    $queryTables    = $mysqli->query('SHOW TABLES');
    while ($row = $queryTables->fetch_row()) {
        $target_tables[] = $row[0];
    }
    //get table structure
    foreach ($target_tables as $table) {
        $result = $mysqli->query('SELECT * FROM ' . $table);
        $fields_amount = $result->field_count;
        $rows_num = $mysqli->affected_rows;
        $res = $mysqli->query('SHOW CREATE TABLE ' . $table);
        $TableMLine = $res->fetch_row();
        $content = (!isset($content) ?  '' : $content) . "\n\n" . $TableMLine[1] . ";\n";
        for ($i = 0, $st_counter = 0; $i < $fields_amount; $i++, $st_counter = 0) {
            while ($row = $result->fetch_row()) { //when started (and every after 100 command cycle):
                if ($st_counter % 100 == 0 || $st_counter == 0) {
                    $content .= "\nINSERT INTO " . $table . " VALUES";
                }
                $content .= "\n(";
                for ($j = 0; $j < $fields_amount; $j++) {
                    $row[$j] = str_replace(array("\r\n\r\n", "\n\r\n", "\r\n", "\n\n", "\n"), array("\\r\\n", "\\r\\n", "\\r\\n", "\\r\\n", "\\r\\n"), addslashes($row[$j]));
                    if (isset($row[$j])) {
                        $content .= '"' . $row[$j] . '"';
                    } else {
                        $content .= '""';
                    }
                    if ($j < ($fields_amount - 1)) {
                        $content .= ',';
                    }
                }
                $content .= ")";
                //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
                if ((($st_counter + 1) % 100 == 0 && $st_counter != 0) || $st_counter + 1 == $rows_num) {
                    $content .= ";";
                } else {
                    $content .= ",";
                }
                $st_counter = $st_counter + 1;
            }
        }
    }
    // save as .sql file
    //give additional description
    $content_ = "\n-- Database Backup --\n";
    $content_ .= "-- Ver. : 1.0.1\n";
    $content_ .= "-- Host : 127.0.0.1\n";
    $content_ .= "-- Generating Time : " . date("M d") . ", " . date("Y") . " at " . date("H:i:s:") . date("A") . "\n";
    $content_ .= $content;
    //save the file
    $backup_file_name = $db_name .  ".sql";
    $fp = fopen($backup_file_name, 'w+');
    $result = fwrite($fp, $content_);
    fclose($fp);
    //download file directly from browser
    $file_path = $backup_file_name;
    if (!empty($file_path) && file_exists($file_path)) {
        header("Pragma:public");
        header("Expired:0");
        header("Cache-Control:must-revalidate");
        header("Content-Control:public");
        header("Content-Description: File Transfer");
        header("Content-Type: application/octet-stream");
        header("Content-Disposition:attachment; filename= " . $file_path . "");
        header("Content-Transfer-Encoding:binary");
        header("Content-Length:" . filesize($file_path));
        flush();
        readfile($file_path);
        $folder = "";
        unlink($folder . $backup_file_name);
        // exit();
    }
}
