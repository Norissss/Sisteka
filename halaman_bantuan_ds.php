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

  <style>
    /* CSS untuk mengatur tampilan halaman FAQ */
    .question {
      font-size: 18px;
      font-family: Helvetica;
      font-display: bold;
      color: aliceblue;
    }

    .answer {
      font-size: 16px;
      font-family: Helvetica;
      color: aliceblue;
    }

    h1 {
      text-align: center;
      font-size: 28px;
      margin: 30px 0;
    }

    .question {
      font-weight: bold;
      margin: 30px 0;
    }

    .answer {
      margin-left: 20px;

    }

    h2 {
      text-align: center;
    }

    .box {
      background-color: #071e32;
      margin-left: 150px;
      margin-right: 150px;
      padding-left: 35px;
      padding-right: 35px;
      padding-top: 20px;
      padding-bottom: 20px;
      border-radius: 30px;
      box-shadow: 10px 10px 5px lightblue;


    }

    .button {
      display: inline-block;
      padding: 15px 25px;
      font-size: 24px;
      cursor: pointer;
      text-align: center;
      text-decoration: none;
      outline: none;
      color: #fff;
      background-color: #4650ac;
      border: none;
      border-radius: 15px;
      box-shadow: 0 9px #999;
    }

    .button:hover {
      background-color: #7a3e8e
    }

    .button:active {
      background-color: #695cb1;
      box-shadow: 0 5px #666;
      transform: translateY(4px);
    }
  </style>


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
                <img src="img/logo.png" alt="logo" style="width: 90px; height: 90px;" >
                <div class="sidebar-brand-text mx-3">SISITEKA</div>
            </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
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
      <li class="nav-item active">
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
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span
                  class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nama_pengguna']; ?></span>
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
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
<h1 class="h3 mb-2 text-gray-800">HALAMAN BANTUAN</h1>
<hr>

<!-- DataTales Example -->
  <div class="container-fluid page__container">


    <div class="col-lg-12 card-form_body">
      <div class="box">
        <!-- Pertanyaan dan jawaban 1 -->
        <h4 class="question">Apakah website ini gratis?</h4>
        <p class="answer">Ya, website ini gratis untuk digunakan.</p>
        <!-- Pertanyaan dan jawaban 3 -->
        <p class="question">Bagaimana cara mengakses akun saya?</p>
        <p class="answer">Untuk mengakses akun Anda, silakan klik tombol "Masuk" di halaman utama, kemudian
          masukkan email dan password yang telah Anda daftarkan sebelumnya.</p>
        <!-- Pertanyaan dan jawaban 4 -->
        <p class="question">Apakah ada batasan penggunaan website ini?</p>
        <p class="answer">Tidak ada batasan penggunaan website ini, Anda dapat menggunakannya sepuasnya sesuai
          kebutuhan.</p>
        <!-- Pertanyaan dan jawaban 5 -->
        <p class="question">Apakah ada layanan bantuan untuk menggunakan website ini?</p>
        <p class="answer">Ya, kami menyediakan layanan bantuan melalui fitur live chat yang tersedia di
          halaman utama website ini. Anda juga dapat menghubungi kami melalui email di [email protected]</p>
      </div>
      <div class="container mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div class="relative sm:order-1">
            <div class="c-feature-spot-image-single__text">
              <br>
              <br>
              <h2>Masih membutuhkan bantuan kami?</h2>
              <br>
              <br>
              <p style="text-align: center;">Silakan masukkan pertanyaan anda di bawah ini:</p>
              <form action="submit_saran.php" method="POST" class="mx-auto w-50 mt-5">
                <div class="form-group">
                  <label for="name">Nama:</label>
                  <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="saran">Saran:</label>
                  <textarea id="saran" name="saran" rows="5" cols="40" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim Saran</button>
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