<?php
session_start();

include 'conn.php';


   $keyword = $_POST['keyword'];

//    if($keyword == ""){
//         echo "<script>alert('Resi Tidak di temukan');</script>";
//         echo "<script>location='index.php';</script>";
//    }
    
    if(isset($_POST['keyword'])){
        $data = cariResi($_POST["keyword"]);
    }

include 'conn.php';
require 'function.php';
$keyword = $_POST['keyword'];

if (isset($_POST['keyword'])) {
    $data = cariResi($_POST['keyword']);
}

if ($_POST['keyword'] === null) {
    header("location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"
        type="text/css" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <title>Document</title>
</head>

<body class="bg-primary">


    <nav class="navbar navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">Laptop D Computer</a>

            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Admin
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <form action="/logout" method="post">

                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                    <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                </ul>
            </div>

            <a class="btn btn-primary" href="/register">Login admin</a>


            <nav class="navbar navbar-dark bg-dark sticky-top">
                <div class="container">
                    <a class="navbar-brand" href="index.php">Laptop D Computer</a>

                </div>
            </nav>
            <?php if (isset($_SESSION['keyword'])) : ?>
            <?php if ($_SESSION['keyword']['type'] === true) : ?>
            <div class="alert alert-success border-2 d-flex align-items-center" role="alert">
                <div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
                <p class="mb-0 flex-1"><?= $_SESSION['keyword']['message'] ?></p>
                <a href="index.php"><button class="btn-close" type="button" data-bs-dismiss="alert"
                        aria-label="Close"></button></a>
            </div>
            <?php elseif ($_SESSION['keyword']['type'] === false) : ?>
            <div class="alert alert-danger border-2 d-flex align-items-center" role="alert">
                <div class="bg-danger me-3 icon-item"><span class="fas fa-times-circle text-white fs-3"></span></div>
                <p class="mb-0 flex-1"><?= $_SESSION['keyword']['message'] ?></p>
                <a href="index.php"><button class="btn-close" type="button" data-bs-dismiss="alert"
                        aria-label="Close"></button></a>
            </div>
            <?php endif; ?>
            <?php unset($_SESSION['keyword']); ?>
            <?php endif; ?>
            <section class="data-laptop">
                <div class="container">
                    <div class="row justify-content-center">
                        <?php foreach ($data as $row) : ?>

                        <div class="card text-bg-light mt-5 mb-5" style="width: 35rem;">
                            <div class="card-header">Nomor Resi: <?=$row["resi"];?></div>
                            <div class="card-body">
                                <h5>Nama Laptop: <?= $row["nama_laptop"]; ?></h5>
                                <p>Kerusakan: <?=$row["kerusakan"];?></p>
                                <p>Pemilik: <?=$row["pemilik"];?></p>
                                <p>Status: <?=$row["statuss"];?></p>
                                <p>Teknisi: <?=$row["nama"];?></p>
                            </div>
                            <a href="/" class="btn btn-primary mb-3">BACK TO SEARCH</a>
                        </div>

                        <div class="card text-bg-light mt-5 mb-5" style="width: 35rem;">
                            <div class="card-header">Nomor Resi: <?= $row["resi"]; ?></div>
                            <div class="card-body">
                                <h5>Nama Laptop: <?= $row["nama_laptop"]; ?></h5>
                                <p>Kerusakan: <?= $row["kerusakan"]; ?></p>
                                <p>Pemilik: <?= $row["pemilik"]; ?></p>
                                <p>Status:
                                    <?= $row["status"] == 'B' ? 'Belum selesai perbaikan' : 'Selesai perbaikan'; ?></p>
                                <p>Teknisi: <?= $row["nama"]; ?></p>
                            </div>
                            <a href="index.php" class="btn btn-primary mb-3">BACK TO SEARCH</a>
                        </div>

                        <?php endforeach; ?>
                    </div>
                </div>
        </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
            integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
            integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
        </script>
</body>

</html>