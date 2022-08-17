<html lang="en">
<?php
if ($_SESSION['status'] != "login") {
    header("location: ../../login/index.php");
}
?>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="../../assets/css/dashboard.css" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="../index.php">SHEESHHHh</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-1" href="../logout.php">Sign out</a>
            </div>
        </div> -->
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">
                                <span data-feather="user" class="align-text-bottom"></span>
                                Data Laptop
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../teknisi/index.php">
                                <span data-feather="file" class="align-text-bottom"></span>
                                Data Teknisi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../servis/index.php">
                                <span data-feather="book" class="align-text-bottom"></span>
                                Service
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php">
                                <span data-feather="log-out" class="align-text-bottom active"></span>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                </div>
                <form class="d-flex" role="search" method="GET" action="index.php">
                    <input class="form-control mt-1 form-control-white" type="text" value="<?php if (isset($_GET['search'])) {
                                                                                                echo $_GET['search'];
                                                                                            } ?>" placeholder="Search" name="search">
                    <button class="btn btn-primary mt-1" type="submit">Search</button>
                </form>
                <h2>Admin Data</h2>
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Tambah Data
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Laptop Kostumer</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="add_action.php">
                                    <table>
                                        <tr>
                                            <td>Nama Laptop</td>
                                            <td><input type="text" name="nama_laptop"></td>
                                        </tr>
                                        <tr>
                                            <td>Kerusakan</td>
                                            <td><input type="text" name="kerusakan"></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Pemilik Laptop</td>
                                            <td><input type="text" name="pemilik"></td>
                                        </tr>

                                    </table>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Nama laptop</th>
                                <th scope="col">Kerusakan laptop</th>
                                <th scope="col">Nama pemilik laptop</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../../conn.php';
                            $no = 1;
                            $data = mysqli_query($mysqli, "select * from laptop");
                            while ($d = mysqli_fetch_array($data)) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $d['nama_laptop']; ?></td>
                                    <td><?= $d['kerusakan']; ?></td>
                                    <td><?= $d['pemilik']; ?></td>
                                    <td>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdropEdit<?php echo $d['id_detail_laptop']; ?>">EDIT</a>

                                        <!-- Modal edit -->
                                        <div class="modal fade" id="staticBackdropEdit<?php echo $d['id_detail_laptop']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">

                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Data Users</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php
                                                        include '../../conn.php';
                                                        $id = $d['id_detail_laptop'];
                                                        $query_edit  = mysqli_query($mysqli, "select * from laptop where id_detail_laptop='$id'");
                                                        while ($dEdit = mysqli_fetch_array($query_edit)) {
                                                        ?>
                                                            <form method="post" action="update_action.php">
                                                                <table>
                                                                    <tr>
                                                                        <td>Nama laptop</td>
                                                                        <td>
                                                                            <input type="hidden" name="id_detail_laptop" value="<?php echo $dEdit['id_detail_laptop']; ?>">
                                                                            <input type="text" name="nama_laptop" value="<?php echo $dEdit['nama_laptop']; ?>">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Kerusakan laptop</td>
                                                                        <td>
                                                                            <input type="text" name="kerusakan" value="<?php echo $dEdit['kerusakan']; ?>">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Pemilik laptop</td>
                                                                        <td>
                                                                            <input type="text" name="pemilik" value="<?php echo $dEdit['pemilik']; ?>">
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                                </div>
                                                            </form>
                                                    </div>
                                                <?php
                                                        }
                                                ?>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="delete.php?id_detail_laptop=<?= $d['id_detail_laptop']; ?>" onclick="return confirm('Are you sure ?')">HAPUS</a>

                                        <div class="modal fade" id="staticBackdropPass<?php echo $d['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">

                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Password Users</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php
                                                        include '../../conn.php';
                                                        $id = $d['id_detail_laptop'];
                                                        $query_password  = mysqli_query($mysqli, "select * from laptop where id_detail_laptop='$id'");
                                                        while ($dPassword = mysqli_fetch_array($query_password)) {
                                                        ?>
                                                            <form method="post" action="update_action.php">
                                                                <table>
                                                                    <tr>
                                                                        <td>Edit password user <?php echo $dPassword['nama']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>password</td>
                                                                        <td>
                                                                            <input type="hidden" name="password" value="<?php echo $dPassword['password']; ?>">
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                                </div>
                                                            </form>
                                                    </div>
                                                <?php
                                                        }
                                                ?>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="../../js/dashboard.js"></script>
</body>

</html>