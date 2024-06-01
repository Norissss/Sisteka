<?php

// Include database connection file
include 'koneksi.php';

// Get form field values
$nidn = $_POST['nidn'];
$foto=$_FILES['foto']['name'];
$email_dosen = $_POST['email_dosen'];
$path="img/".$foto;

// Check if the old password is correct
$cekuser = "SELECT * FROM dosen WHERE nidn = '$nidn'";
$querycekuser = mysqli_query($koneksi, $cekuser);

if ($querycekuser) {
  // Update the password if the old password is correct
  $updatepassword = "UPDATE dosen SET foto = '$foto', email_dosen = '$email_dosen' where nidn = '$nidn' ";
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
