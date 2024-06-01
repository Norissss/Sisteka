<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SISITEKA</title>
    <link rel="icon" href="https://www.polibatam.ac.id/wp-content/uploads/2021/09/logo.png" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/card.css" rel="stylesheet">

</head>

<body id="page-top">
    <?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:login.php?pesan=gagal");
	}

	?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <img src="img/logo.png" alt="logo" style="width: 90px; height: 90px;">
                <div class="sidebar-brand-text mx-3">SISITEKA</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard_ds.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Informasi
            </div>



            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="halaman_bantuan_ds.php">
                    <i class="fas fa-fw fa-comments"></i>
                    <span>Bantuan, Kritik & Saran</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nama_pengguna']; ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile_ds.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">DATA PRESENSI</h1>
                    <hr>

                    <!-- DataTales Example -->
                    <form method="POST" name="nilai">
                        <div class="container-fluid page__container">
                            <div class="col-lg-12 card-form_body">
                                <div class="table-responsive border-bottom">
                                    <!-- Search form -->
                                    <form method="POST" action="">
                                    <div class="form-row align-items-center">
                    <div class="col-auto">
                                        <input type="text" class="form-control mb-2" name="search" placeholder="TRPL-1B">
                                        </div>
                    <div class="col-auto">
                                        <button type="submit" class="btn btn-info mb-2 col-auto" name="submit_search">Cari Kode Kelas</button>
                                        </div>
                  </div>
                                    </form>
                                    <!-- End of search form -->
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Kelas</th>
                                                <th>Nim</th>
                                                <th>Nama Mahasiswa</th>
                                                <th>Tanggal Presensi</th>
                                                <th>Waktu Presensi</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                include 'koneksi.php';
                $no=1;

                // Check if search button was clicked
                if (isset($_POST['submit_search'])) {
                  // Get search value from form
                  $search = mysqli_real_escape_string($koneksi, $_POST['search']);

                  // Search for rows in presensi table where kode_kelas matches search value
                  $sql=mysqli_query($koneksi,"SELECT * FROM presensi where kode_dosen='$_SESSION[id_pengguna]'AND kode_kelas='$search' GROUP BY nim,tanggal_presensi ORDER BY tanggal_presensi DESC ,nim ASC ");
                } else {
                  // If search button was not clicked, display all rows in presensi table
                  $sql=mysqli_query($koneksi,"SELECT * FROM presensi where kode_dosen='$_SESSION[id_pengguna]'GROUP BY nim, tanggal_presensi  ORDER BY tanggal_presensi DESC,nim ASC");
                }
                while ($data=mysqli_fetch_array($sql)) {
              ?>
                                            <tr>
                                                <td><?php echo $data['kode_kelas'];?></td>
                                                <td><?php echo $data['nim'];?></td>
                                                <td><?php echo $data['nama_mahasiswa'];?></td>
                                                <td><?php echo $data['tanggal_presensi'];?></td>
                                                <td><?php echo $data['waktu_presensi'];?></td>
                                                <td><?php echo $data['data_kehadiran'];?></td>
                                            </tr>
                                            <?php
                }
              ?>
                                        </tbody>
                                    </table>
                                    <br>
                                </div>
                                <br>
                            </div>
                        </div>
                    </form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SISITEKA 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Keluar ?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Apakah anda yakin akan Keluar ?
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                            <a class="btn btn-primary" href="logout.php" method="POST">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/script.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>