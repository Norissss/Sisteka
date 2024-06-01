<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $id_presensi = $_POST['id_presensi'];
    $data_kehadiran = $_POST['data_kehadiran'];
   

    $cekid = "SELECT * from presensi where id_presensi = '$id_presensi'";

    $querycekid = mysqli_query($koneksi, $cekid);


    if ($querycekid) {

        $updatepresensi = "UPDATE presensi set data_kehadiran = '$data_kehadiran' where id_presensi = '$id_presensi'";

        $updatequery = mysqli_query($koneksi, $updatepresensi);

        if ($updatequery) {

            header("Location:dashboard_admin.php?pesan=update");

        }else {
            header('Location: dashboard_admin.php?pesan=gagalupdate');
        }
    

    }else {
        header('Location: dashboard_admin.php?pesan=gagalupdate');
    }
}
?>