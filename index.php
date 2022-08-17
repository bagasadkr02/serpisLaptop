<?php
include 'conn.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="assets/css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-light bg-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">Laptop D komputer</a>
            <?php
            session_start();
            if (isset($_SESSION['status']) == "login") :
            ?>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Admin
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="admin/logout.php">Logout</a>
                        </li>
                        <li><a class="dropdown-item" href="admin/index.php">Dashboard</a></li>
                    </ul>
                </div>

            <?php else : ?>
                <a class="btn btn-primary" href="login/index.php">Login admin</a>
            <?php endif; ?>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="text-center text-white">
                        <!-- Page heading-->
                        <h1 class="mb-5">Web untuk memantau perkembangan service latop anda!</h1>

                        <!-- <form class="form-subscribe" id="contactForm"> -->
                        <!-- resi input-->
                        <form action="data_tercari.php" method="post">
                            <div class="row">
                                <div class="col">
                                    <input class="form-control form-control-lg" id="keyword" name="keyword" type="text" value="" placeholder="Masukan nomor resi" data-sb-validations="required" />
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-primary btn-lg" type="submit">Cari</button>
                                </div>
                            </div>
                        </form>

                        <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Icons Grid-->
    <section class="features-icons bg-light text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="bi-window m-auto text-primary"></i></div>
                        <h3>Web Full responsive</h3>
                        <p class="lead mb-0">Web ini akan terlihat bagus di perangkat apa pun, berapa pun ukurannya!</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class=" bi-hourglass-split m-auto text-primary"></i>
                        </div>
                        <h3>Update Realtime</h3>
                        <p class="lead mb-0">Info laptop anda akan di update terus secara real time!</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="bi-emoji-smile m-auto text-primary"></i></div>
                        <h3>Easy to Use</h3>
                        <p class="lead mb-0">Aplikasi ini mudah untuk di gunakan, hanya masukan nomor resi dan data akan
                            keluar!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Image Showcases-->
    <section class="showcase">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('assets/img/bg-showcase-2.jpg')"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>Fully Responsive Design</h2>
                    <p class="lead mb-0">Aplikasi kami memiliki design yang responsive sehingga bisa di buka di
                        perangkat manapun dengan tampilan yang tetap baik!</p>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-lg-6 text-white showcase-img" style="background-image: url('assets/img/bg-showcase-1.jpg')"></div>
                <div class="col-lg-6 my-auto showcase-text">
                    <h2>Updated Realtime</h2>
                    <p class="lead mb-0">Perkembangan service laptop anda akan di update secara realtime oleh tim kami,
                        sehingga anda tidak perlu khawatir dan tetap bisa memantau kondisi laptop anda!</p>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('assets/img/bg-showcase-3.jpg')"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>Easy to Use</h2>
                    <p class="lead mb-0">Aplikasi kami di design untuk mudah di gunakan oleh semua pengguna jadi anda
                        hanya dengan memasukan nomor resi bisa langsung melihat data perkembangan laptop anda!</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Team-->
    <section class="testimonials text-center bg-light">
        <div class="container">
            <h2 class="mb-5">Our Team</h2>
            <div class="row">
                <div class="col-lg-4">
                    <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                        <img class="img-fluid rounded-circle mb-3" src="assets/img/benget-1.jpg" alt="..." />
                        <h5>Bagas Adikara</h5>
                        <p class="font-weight-light mb-0">"anak hilmi"</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                        <img class="img-fluid rounded-circle mb-3" src="assets/img/benget-2.jpg" alt="..." />
                        <h5>Bayu Afriyadi</h5>
                        <p class="font-weight-light mb-0">"anak dadi"</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                        <img class="img-fluid rounded-circle mb-3" src="assets/img/benget-3.jpg" alt="..." />
                        <h5>Vidi Anandisa</h5>
                        <p class="font-weight-light mb-0">"anak yatim"</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-start my-auto">

                    <p class="text-muted small mb-4 mb-lg-0">&copy; Laptop D Computer 2022.</p>
                </div>
                <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item me-4">
                            <a href="#!"><i class="bi-facebook fs-3"></i></a>
                        </li>
                        <li class="list-inline-item me-4">
                            <a href="#!"><i class="bi-twitter fs-3"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!"><i class="bi-instagram fs-3"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>

    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>