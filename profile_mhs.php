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
            <li class="nav-item ">
                <a class="nav-link" href="dashboard_mhs.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Presensi
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="data_presensi_mhs.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Presensi</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Informasi
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="kontak_dosen.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Kontak Dosen</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="halaman_bantuan_mhs.php">
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
                                <a class="dropdown-item" href="profile_mhs.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="berhasil"){
			echo "<div class='alert alert-primary' id='message'>Profil/Password berhasil diubah.</div>";
			echo "<script>
				setTimeout(function() {
					document.getElementById('message').style.display='none';
				}, 3000);
			</script>";
		}
	}
	?>
                <?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert alert-danger' id='message'>Profil/Password gagal diubah.</div>";
			echo "<script>
				setTimeout(function() {
					document.getElementById('message').style.display='none';
				}, 3000);
			</script>";
		}
	}
	?>
                <div class="mdk-header-layout js-mdk-header-layout" data-has-scrolling-region="">
                    <?php
        include 'koneksi.php';
        $no=1;
        $sql=mysqli_query($koneksi,"SELECT * FROM mahasiswa where nim='$_SESSION[id_pengguna]'");
        while ($data=mysqli_fetch_array($sql)) {
            ?>
                    <div class="card">
                        <div class="row no-gutters">
                            <div class="col-md-3 mt-5 ml-5 my-5">
                                <img src="<?php echo "img/".$data['foto']?>" class="card-img rounded"
                                    style="background-position: center; background-repeat: no-repeat; background-size: cover;"
                                    alt="HEHE MASIH KOSONG FOTONYA">
                            </div>
                            <div class="col-md-7 mt-5 ml-5">
                                <h5 class="card-title"><b>
                                        <center>DATA DIRI MAHASISWA</center>
                                    </b></h5>
                                <hr>
                                <table>
                                    <tbody>

                                        <tr>
                                            <td width="30%">NIM</td>
                                            <td>:</td>
                                            <td><?php echo $data['nim']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td><?php echo $data['nama_mahasiswa']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>:</td>
                                            <td><?php echo $data['email_mahasiswa'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Program Studi</td>
                                            <td>:&nbsp;&nbsp;</td>
                                            <td><?php echo $data['prodi'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Kelas</td>
                                            <td>:&nbsp;&nbsp;</td>
                                            <td><?php echo $data['kode_kelas'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Ubah Password ?</td>
                                            <td>:&nbsp;&nbsp;</td>
                                            <td><a data-toggle="modal" data-target="#ubahpwModal"
                                                    class="btn btn-primary">
                                                    Klik Disini
                                                </a></td>
                                        </tr>
                                        <tr>
                                            <td>Ubah Foto & Email ?</td>
                                            <td>:&nbsp;&nbsp;</td>
                                            <td><a data-toggle="modal" data-target="#changepicModal"
                                                    class="btn btn-primary">Klik Disini</a></td>
                                        </tr>
                                        <?php
        }
        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



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
    <!-- Modal for changing picture and email -->
    <div class="modal fade" id="changepicModal" tabindex="-1" role="dialog" aria-labelledby="changepicModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changepicModalLabel">Ubah Foto & Email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="ganti_profile.php" method="post" enctype="multipart/form-data">
                <?php
        include 'koneksi.php';
        $no=1;
        $sql=mysqli_query($koneksi,"SELECT * FROM mahasiswa where nim='$_SESSION[id_pengguna]'");
        while ($data=mysqli_fetch_array($sql)) {
            ?>
                    <div class="modal-body">
                        <input type="hidden" name="nim" value="<?php echo $data['nim']; ?>">
                        <input type="file" name="foto" class="form-control">
                        <br>
                        <input type="email" name="email_mahasiswa" class="form-control"
                            placeholder="Masukkan email baru">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    <?php
        }
        ?>
                </form>
            </div>
        </div>
    </div>
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
    <div class="modal fade" id="ubahpwModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">FORM UBAH Password</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                        <table>

                            <form action="proses_ubah_pw.php" method="POST" onsubmit="return showPopup()">

                                <tr>
                                    <td>ID PENGGUNA :</td>
                                    <td><input type="hidden" name="id_pengguna" id="id_pengguna"
                                            value="<?php echo $_SESSION['id_pengguna']; ?>" /><?php echo $_SESSION['id_pengguna']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Password <strong>Lama</strong>:</td>
                                    <td><input type="password" name="passwordlama" id="passwordlama" required /></td>
                                </tr>

                                <tr>
                                    <td>Password <strong>Baru</strong>:</td>
                                    <td><input type="password" name="passwordbaru" id="passwordbaru" required /></td>
                                </tr>

                                <tr>
                                    <td>Konfirmasi <strong>Password Baru</strong>:</td>
                                    <td><input type="password" name="konfirmasipassword" id="konfirmasipassword"
                                            required /></td>
                                </tr>
                    </center>
                    <div class="modal-footer">

                        <tr>
                            <td></td>
                            <td><button class="btn btn-secondary" type="button"
                                    data-dismiss="modal">Batal</button><input class="btn btn-primary" type="submit"
                                    name="change" value="Kirim" /></td>
                        </tr>
                        </form>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Get the message element
        var message = document.getElementById('message');

        // Set the timeout to hide the message after 5 seconds
        setTimeout(function () {
            message.style.display = 'none';
        }, 3000);
    </script>

    <script>
        function showPopup() {
            // Display the pop-up
            confirm("Ubah Password ?");

            // Return true to submit the form
            return true;
        }
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
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