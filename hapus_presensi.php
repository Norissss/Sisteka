<?php

include("koneksi.php");

if( isset($_GET['id_presensi']) ){

    // ambil id dari query string
    $id_presensi = $_GET['id_presensi'];

    // buat query hapus
    $sql = "DELETE FROM presensi WHERE id_presensi='$id_presensi'";
    $query = mysqli_query($koneksi, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: dashboard_admin.php?pesan=update');
    } else {
        header('Location: dashboard_admin.php?pesan=gagalupdate');
    }

} else {
    die("akses dilarang...");
}

?>