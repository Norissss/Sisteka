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
  <link href="css/navbar.css" rel="stylesheet">

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
      <li class="nav-item active">
        <a class="nav-link " href="kontak_dosen.php">
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
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span
                  class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nama_pengguna']; ?></span>
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile_mhs.php">
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
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">KONTAK DOSEN</h1>
          </div>
          <hr>
          <div class="row">
            <div class="col-lg-12">
              <!-- Collapsable Card Example -->
              <div class="container px-4 py-5" id="custom-cards">
                <form action="" method="post">
                  <div class="form-row align-items-center">
                    <div class="col-auto">
                      <input type="text" class="form-control mb-2" name="keyword" placeholder="Cari nama dosen">
                    </div>
                    <div class="col-auto">
                      <button type="submit" class="btn btn-info mb-2 col-auto" name="search">Cari</button>
                    </div>
                  </div>
                </form>
                <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
                  <?php
  include 'koneksi.php';

  if (isset($_POST['search'])) {
    $keyword = $_POST['keyword'];
    $sql = "SELECT * FROM dosen WHERE nama_dosen LIKE '%$keyword%'";
  } else {
    $sql = "SELECT * FROM dosen INNER JOIN matakuliah ON dosen.nidn = matakuliah.kode_dosen";
  }

  $i = 1;
  $query = mysqli_query($koneksi, $sql);
  while ($kontak = mysqli_fetch_assoc($query)) {
?>
                  <div class="col">
                    <div class="card">
                      <div class="card__inner">
                        <div class="front face cardbg"
                          style="background-image: url('<?php echo "img/".$kontak['foto']?>'); background-position: center; background-repeat: no-repeat; background-size: cover;">
                          <div class="heading">
                            <h5><?php echo $kontak['nama_dosen'];?></h5>
                          </div>
                          <button class="flip btn btn-primary flip-me">Informasi</button>
                        </div>
                        <div class="back face bg-light">
                          <div class="heading">
                            <h5><?php  echo $kontak['nama_dosen'];?></h5>
                          </div>
                          <br>
                          
                          <table>
                                    <tbody>                                   
                                     
                                        <tr>
                                            <td width="30%">NIDN</td>
                                            <td>: </td>
                                            <td><?php echo $kontak['nidn']; ?></td>
                                        </tr>
                                        <tr><td>    </td></tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>: </td>
                                            <td><?php echo $kontak['email_dosen']; ?></td>
                                        </tr>
                                        <tr><td>    </td></tr>
                                        <tr>
                                            <td>MataKuliah</td>
                                            <td>: </td>
                                            <td><?php 
      $nidn = $kontak['nidn'];
      $sql2 = "SELECT nama_mk FROM matakuliah WHERE kode_dosen = '$nidn'";
      $query2 = mysqli_query($koneksi, $sql2);
      while($matkul = mysqli_fetch_assoc($query2)) {
        echo $matkul['nama_mk'] . " ";
      }
    ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                          <button class="flip return"><img src="img/undo.png" class="undo" alt="return"></button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php $i++;
      }

      ?>
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
      <script src="js/jquery-3.5.1.js"></script>
      <script src="js/script.js"></script>
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