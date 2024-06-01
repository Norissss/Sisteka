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


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Informasi
            </div>

            <li class="nav-item active">
                <a class="nav-link" href="dashboard_admin.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
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
                    <?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="update"){
			echo "<div class='alert alert-success' id='message'>Presensi Berhasil Diperbarui !</div>";
			echo "<script>
				setTimeout(function() {
					document.getElementById('message').style.display='none';
				}, 3000);
			</script>";
		} elseif($_GET['pesan']=="gagalupdate"){
			echo "<div class='alert alert-danger' id='message'>Presensi Gagal Diperbarui !</div>";
			echo "<script>
				setTimeout(function() {
					document.getElementById('message').style.display='none';
				}, 3000);
			</script>";
		}
	}
	?>
                    <!-- DataTales Example -->
                    <form method="POST" name="nilai">
                        <div class="container-fluid page__container">


                            <div class="col-lg-12 card-form_body">
                                <div class="table-responsive border-bottom">
                                    <table class="table table-striped table-bordered">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Kelas</th>
                                                    <th>Nim</th>
                                                    <th>Nama Mahasiswa</th>
                                                    <th>Nama Mata Kuliah</th>
                                                    <th>Tanggal Pertemuan</th>
                                                    <th>Waktu Presensi</th>
                                                    <th>Keterangan</th>
                                                    <th>Ubah</th>
                                                    <th>Hapus</th>
                                            </thead>
                                            <tbody>
                                                <?php
        include 'koneksi.php';
        $no=1;
        $sql=mysqli_query($koneksi,"SELECT * FROM presensi GROUP BY nim, tanggal_presensi  ORDER BY kode_kelas, nama_mk, waktu_presensi DESC, tanggal_presensi DESC,nim ASC");
        while ($data=mysqli_fetch_array($sql)) {
            ?>
            
                                                <tr>
                                                    <td><?php echo $data['kode_kelas'];?></td>
                                                    <td><?php echo $data['nim'];?></td>
                                                    <td><?php echo $data['nama_mahasiswa'];?></td>
                                                    <td><?php echo $data['nama_mk'];?></td>
                                                    <td><?php echo $data['tanggal_presensi'];?></td>
                                                    <td><?php echo $data['waktu_presensi'];?></td>
                                                    <td><?php echo $data['data_kehadiran'];?></td>
                                                    <td><a class="btn btn-success" data-toggle="modal" data-target="#ubahpresensiModal<?= $no ?>">EDIT</a>
                                                    </td>
                                                    <td><?php echo "<a href='hapus_presensi.php?id_presensi=".$data['id_presensi']."' class='btn btn-danger' onclick='return showPopup()'>Hapus</a>";?>
                                                    </td>
                                                </tr>
                                                <?php 
                                                $no++;
        }
        ?>
                                            </tbody>
                                        </table>
                                        <br>
                                </div> <br>
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
    <!-- Modal -->
    <?php
        include 'koneksi.php';
        $no=1;
        $sql=mysqli_query($koneksi,"SELECT * FROM presensi GROUP BY nim, tanggal_presensi  ORDER BY kode_kelas, nama_mk, waktu_presensi DESC, tanggal_presensi DESC,nim ASC");
        while ($data=mysqli_fetch_array($sql)) {
            ?>
    <div class="modal fade" id="ubahpresensiModal<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="ubahpresensiModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ubahpresensiModalLabel">Ubah Data Kehadiran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form to edit data_kehadiran field -->
                    <form action="update_presensi.php" method="POST">
                        <input type="hidden" name="id_presensi" value="<?php echo $data['id_presensi'];?>">
                        <div class="form-group">
                            <label for="data_kehadiran">Data Kehadiran :</label><br>
                            <input type="radio" name="data_kehadiran" id="data_kehadiran_hadir" value="Hadir" required>
                            Hadir<br>
                            <input type="radio" name="data_kehadiran" id="data_kehadiran_izin" value="Izin"> Izin<br>
                            <input type="radio" name="data_kehadiran" id="data_kehadiran_sakit" value="Sakit"> Sakit<br>
                            <input type="radio" name="data_kehadiran" id="data_kehadiran_alfa" value="Alfa"> Alfa
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php $no++;
        }
        ?>
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
    <script>
        function showPopup() {
            // Display the pop-up
            confirm("Hapus Presensi ?");

            // Return true to submit the form
            return true;
        }
    </script>
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