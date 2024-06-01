<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SISITEKA</title>
    <link rel="icon" href="img/logo.jpeg" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div id='alert-danger' class='alert alert-danger'>Id Pengguna atau Password tidak sesuai !</div>";
			echo "<script>
				setTimeout(function() {
					document.getElementById('alert-danger').style.display = 'none';
				}, 2000);
			</script>";
		}
	}
?>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h3 text-black-900 mb-4">Sistem Presensi Teknik Informatika<br>
                                            <hr>
                                        </h1>
                                    </div>
                                    <div class="container-fluid">
                                        <div class="row justify-content-center">
                                            <div class="col-md-6 col-lg-12">
                                                <form action="cek_login.php" method="POST" class="user">
                                                    <div class="input-group form-group">
                                                        <input type="text" name="id_pengguna"
                                                            class="form-control form-control-md form-control-user"
                                                            placeholder="ID PENGGUNA" required="required">
                                                    </div>
                                                    <div class="input-group form-group">
                                                        <input type="password" name="password"
                                                            class="form-control form-control-md form-control-user"
                                                            placeholder="Password" required="required">
                                                    </div>
                                                    <hr>
                                                    <div class="input-group">
                                                        <input type="submit"
                                                            class="btn btn-primary btn-md btn-user btn-block"
                                                            value="LOGIN">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
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

</body>

</html>