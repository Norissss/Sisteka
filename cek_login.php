<?php 
// mengaktifkan session pada phpmahasiswa
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';
 
// menangkap data yang dikirim dari form login
$id_pengguna = $_POST['id_pengguna'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan id_pengguna dan password yang sesuai
$login = mysqli_query($koneksi,"SELECT * from user where id_pengguna='$id_pengguna' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah id_pengguna dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
	$nama_pengguna = $data['nama_pengguna'];
	// cek jika user login sebagai admin
	if($data['level']=="admin"){
 
		// buat session login dan id_pengguna
		$_SESSION['id_pengguna'] = $id_pengguna;
		$_SESSION['nama_pengguna'] = $nama_pengguna;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:dashboard_admin.php");
 
	// cek jika user login sebagai mahasiswa
	}else if($data['level']=="mahasiswa"){
		// buat session login dan id_pengguna
		$_SESSION['id_pengguna'] = $id_pengguna;
		$_SESSION['nama_pengguna'] = $nama_pengguna;
		$_SESSION['level'] = "mahasiswa";
		// alihkan ke halaman dashboard mahasiswa
		header("location:dashboard_mhs.php");
 
	// cek jika user login sebagai pengurus
	}else if($data['level']=="dosen"){
		// buat session login dan id_pengguna
		$_SESSION['id_pengguna'] = $id_pengguna;
		$_SESSION['nama_pengguna'] = $nama_pengguna;
		$_SESSION['level'] = "dosen";
		// alihkan ke halaman dashboard pengurus
		header("location:dashboard_ds.php");
 
	}else{
 
		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}	
}else{
	header("location:login.php?pesan=gagal");
}
 
?>