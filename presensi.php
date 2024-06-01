<?php include 'koneksi.php';
$data_kehadiran=$_POST['data_kehadiran'];
$nama_mk=$_POST['nama_mk'];
$kode_mk=$_POST['kode_mk'];
$nim=$_POST['nim'];
$nama_mahasiswa=$_POST['nama_mahasiswa'];
$kode_dosen=$_POST['kode_dosen'];
$tanggal_pertemuan=$_POST['tanggal_pertemuan'];
$waktu_presensi=$_POST['waktu_presensi'];
$kode_kelas=$_POST['kode_kelas'];
$id_presensi=$_POST['id_presensi'];

$input=mysqli_query($koneksi, "INSERT INTO presensi
VALUES('$data_kehadiran', '$nama_mk', '$kode_mk', '$nim', '$nama_mahasiswa', '$kode_dosen', '$tanggal_pertemuan', '$waktu_presensi', '$kode_kelas', '$id_presensi')") or die(mysqli_error());
if($input) {
          echo "Presensi Berhasil Direkam";
          header("location:dashboard_mhs.php?pesan=berhasil");
     }

     else {
          echo "Gagal Disimpan";
     }

     ?>