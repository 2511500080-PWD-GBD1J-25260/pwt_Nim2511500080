<?php
session_start();
require_once "config/koneksi.php";

// cek parameter
if (isset($_GET['kd'])) {

    // amankan input
    $kd = mysqli_real_escape_string($koneksi, $_GET['kd']);

    // query hapus
    $query = mysqli_query($koneksi, "DELETE FROM skripsi_2511500080 WHERE id_skripsi080 = '$kd'");

    if ($query) {
        echo "<script>
            alert('Data berhasil dihapus');
            window.location='index.php?page=skripsi_2511500080';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal dihapus');
            window.location='index.php?page=skripsi_2511500080';
        </script>";
    }

} else {
    // kalau tidak ada parameter
    echo "<script>
        alert('ID tidak ditemukan');
        window.location='index.php?page=skripsi_2511500080';
    </script>";
}
?>