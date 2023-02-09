<?php
session_start();

if (!isset($_SESSION['login'])) {

    header("Location: login.php");
}


require 'config/function.php';


if (isset($_POST['tSiswa'])) {

    tambahSiswa();
}

$id_petugas = $_SESSION['id_petugas'];


$user = query("SELECT * FROM  petugas WHERE id_petugas = '$id_petugas'")[0];

$siswa = query("SELECT * FROM siswa, kelas, spp WHERE siswa.id_kelas = kelas.id_kelas AND siswa.id_spp = spp.id_spp");



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SPP MUDA</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="asset/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="asset/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="asset/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href=" asset/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>SPP MUDA</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="asset/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <?php if ($user['level'] == 'admin') : ?>
                        <h6 class="mb-0">Administrator</h6>

                        <?php else : ?>
                        <h6 class="mb-0">Petugas</h6>


                        <?php endif;  ?>

                        <span><?= $user['nama_petugas'] ?></span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link active"><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

                    <?php if ($user['level'] == 'admin') : ?>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa fa-laptop me-2"></i>Data Master</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="siswa.php" class="dropdown-item">Siswa</a>
                            <a href="kelas.php" class="dropdown-item">Kelas</a>
                            <a href="spp.php" class="dropdown-item">Spp</a>
                        </div>
                    </div>
                    <a href="petugas.php" class="nav-item nav-link"><i class="fa fa-user me-2"></i>Petugas</a>
                    <?php endif; ?>
                    <a href="pembayaran.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Pembayaran</a>
                    <a href="laporan.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Laporan</a>
                    <a href="logout.php" class="nav-item nav-link"><i class="fa fa-sign-out-alt me-2"></i>Log Out</a>

                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <div class="content">

            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">



                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <img class="rounded-circle me-lg-2" src="asset/img/user.jpg" alt=""
                                    style="width: 40px; height: 40px;">
                                <span class="d-none d-lg-inline-flex">Administrator </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">

                                <a href="#" class="dropdown-item">Log Out</a>
                            </div>
                        </div>
                    </div>
            </nav>
            <!-- Navbar End -->


            <!-- content start -->

            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class=" bg-light rounded p-4 ">
                    <div class="col-md ">

                        <h3 class="my-3 text-center">Data Siswa</h3>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Tambah Siswa
                        </button>
                        <!-- end Button trigger modal -->


                        <!-- start table -->
                        <div class="col-12 mt-3">
                            <div class="bg-light rounded h-100 p-4">
                                <div class="table-responsive ">
                                    <table class="table text-center ">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">nisn</th>
                                                <th scope="col">Nama siswa </th>
                                                <th scope="col">kelas</th>
                                                <th scope="col">alamat</th>
                                                <th scope="col">No.telp</th>
                                                <th scope="col">SPP</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php $i = 1 ?>
                                            <?php foreach ($siswa as $siswaa) : ?>
                                            <tr>
                                                <th><?= $i ?></th>
                                                <td><?= $siswaa['nisn'] ?></td>

                                                <td><?= $siswaa['nama'] ?></td>
                                                <td><?= $siswaa['nama_kelas'] ?></td>
                                                <td><?= $siswaa['alamat'] ?></td>
                                                <td><?= $siswaa['no_telp'] ?></td>
                                                <td><?= $siswaa['tahun'] ?></td>

                                                <td>
                                                    <a href="" class="btn btn-primary">update</a>
                                                    <a href="hapusSiswa.php/?id=<?= $siswaa['nisn'] ?>"
                                                        class="btn btn-danger"
                                                        onclick="return confirm('Yakin Menghapus Data Ini');">hapus</a>
                                                </td>
                                            </tr>
                                            <?php $i++ ?>
                                            <?php endforeach; ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Table End -->
            </div>

            <!-- start card -->


            <!-- end Content -->



            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">spp muda</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">Restu Prayudha</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nisn" class="form-label">Nisn</label>
                            <input type="number" name="nisn" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="mb-3">
                            <label for="nis" class="form-label">Nis</label>
                            <input type="number" name="nis" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="mb-3">
                            <label for="id_kelas" class="form-label">Kelas</label>
                            <select class="form-select" name="id_kelas" aria-label="Default select example">
                                <option selected>-- Pilih Kelas --</option>
                                <option value="1">One</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1"
                                rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="no_telp" class="form-label">No Telp</label>
                            <input type="number" name="no_telp" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="mb-3">
                            <label for="id_spp" class="form-label">Tahun</label>
                            <select class="form-select" name="id_spp" aria-label="Default select example">
                                <option selected>-- Pilih Tahun --</option>
                                <option value="1">One</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="tSiswa">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="asset/lib/chart/chart.min.js"></script>
    <script src="asset/lib/easing/easing.min.js"></script>
    <script src="asset/lib/waypoints/waypoints.min.js"></script>
    <script src="asset/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="asset/lib/tempusdominus/js/moment.min.js"></script>
    <script src="asset/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="asset/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="asset/js/main.js"></script>
</body>

</html>