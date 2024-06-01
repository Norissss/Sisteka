<?php

// Include database connection file
include 'koneksi.php';

// Get form field values
$nim = $_POST['nim'];
$foto=$_FILES['foto']['name'];
$email_mahasiswa = $_POST['email_mahasiswa'];
$path="img/".$foto;

// Check if the old password is correct
$cekuser = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
$querycekuser = mysqli_query($koneksi, $cekuser);

if ($querycekuser) {
  // Update the password if the old password is correct
  $updatepassword = "UPDATE mahasiswa SET foto = '$foto', email_mahasiswa = '$email_mahasiswa' where nim = '$nim' ";
  $updatequery = mysqli_query($koneksi, $updatepassword);

  if ($updatequery) {
    // Redirect to previous page and display success message
    $prev_page = $_SERVER['HTTP_REFERER'];
    header("Location: $prev_page?pesan=berhasil");
  } else {
    // Redirect to previous page and display failure message
    $prev_page = $_SERVER['HTTP_REFERER'];
    header("Location: $prev_page?pesan=gagal");
  }
} else {
  // Redirect to previous page and display failure message
  $prev_page = $_SERVER['HTTP_REFERER'];
  header("Location: $prev_page?pesan=gagal");
}

?>
