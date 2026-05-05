<?php
require_once "config/koneksi.php";

/** @var mysqli $koneksi */

// CEK LOGIN (PAKAI JAVASCRIPT, BUKAN HEADER)
if (!isset($_SESSION['Username'])) {
    echo "<script>window.location='login.php';</script>";
    exit;
}

// PROSES SIMPAN
if (isset($_POST['simpan'])) {

    $Username = $_SESSION['Username'];
    $p1 = $_POST['p1'];
    $pb = $_POST['pb'];

    // cek password lama
    $cek = mysqli_query($koneksi,
    "SELECT * FROM tabel_users WHERE Username='$Username' AND Password='$p1'");

    if (mysqli_num_rows($cek) > 0) {

        mysqli_query($koneksi,
        "UPDATE tabel_users SET Password='$pb' WHERE Username='$Username'");

        echo "<script>alert('Password berhasil diganti');</script>";

        // redirect sesuai role
        if ($_SESSION['role'] == "guru") {
            echo "<script>window.location='index.php?page=guru';</script>";
        } elseif ($_SESSION['role'] == "siswa") {
            echo "<script>window.location='index.php?page=siswa';</script>";
        } else {
            echo "<script>window.location='index.php?page=dashboard';</script>";
        }

        exit;

    } else {
        echo "<div class='alert alert-danger'>Password lama salah</div>";
    }
}
?>

<div class="content-header">
    <div class="container-fluid">
        <h1>Ganti Password</h1>
    </div>
</div>

<form method="POST">
    <input type="Password" name="p1" placeholder="Password Lama" class="form-control" required><br>
    <input type="Password" name="pb" placeholder="Password Baru" class="form-control" required><br>

    <button type="submit" name="simpan" class="btn btn-primary">
        Ganti Password
    </button>
</form>