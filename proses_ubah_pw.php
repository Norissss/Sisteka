<?php

// Include database connection file
include 'koneksi.php';

// Get form field values
$passwordlama = $_POST['passwordlama'];
$passwordbaru = $_POST['passwordbaru'];
$konfirmasipassword = $_POST['konfirmasipassword'];
$id_pengguna = $_POST['id_pengguna'];

// Check if the old password is correct
$cekuser = "SELECT * FROM user WHERE id_pengguna = '$id_pengguna' AND password = '$passwordlama'";
$querycekuser = mysqli_query($koneksi, $cekuser);
$count = mysqli_num_rows($querycekuser);

if ($count >= 1) {
  // Update the password if the old password is correct
  $updatepassword = "UPDATE user SET password = '$passwordbaru' WHERE id_pengguna = '$id_pengguna'";
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