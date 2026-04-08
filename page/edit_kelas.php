<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Data Kelas</h1>
            </div>
        </div>
    </div>
</div>

<?php
// Mengambil ID dari URL
$id = $_GET['id'];
$edit = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas='$id' "));

if(isset($_POST['simpan'])){
    $id_kelas     = $_POST['id_kelas'];
    $nama_kelas   = $_POST['nama_kelas'];
    $wali_kelas   = $_POST['wali_kelas'];
    $jumlah_siswa = $_POST['jumlah_siswa'];
    $keterangan   = $_POST['keterangan'];

    // Query Update
    $update = mysqli_query($koneksi, "UPDATE kelas SET 
        nama_kelas   = '$nama_kelas', 
        wali_kelas   = '$wali_kelas', 
        jumlah_siswa = '$jumlah_siswa', 
        keterangan   = '$keterangan' 
        WHERE id_kelas = '$id_kelas' ");
    
    if ($update) {
        echo '<div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i> Info </h5>
            <h4>Berhasil Diperbarui</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=kelas">';
    } else {
        echo '<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Info </h5>
            <h4>Gagal Diperbarui</h4></div>';
    }
}
?>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="">
                    <input type="hidden" name="id_kelas" value="<?= $edit['id_kelas']; ?>">

                    <div class="form-group">
                        <label for="nama_kelas">Nama Kelas</label>
                        <input type="text" name="nama_kelas" value="<?= $edit['nama_kelas']; ?>" 
                               id="nama_kelas" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="wali_kelas">Wali Kelas</label>
                        <input type="text" name="wali_kelas" value="<?= $edit['wali_kelas']; ?>" 
                               id="wali_kelas" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="jumlah_siswa">Jumlah Siswa</label>
                        <input type="number" name="jumlah_siswa" value="<?= $edit['jumlah_siswa']; ?>" 
                               id="jumlah_siswa" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control" rows="3"><?= $edit['keterangan']; ?></textarea>
                    </div>
                    
                    <div class="card-footer px-0">
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan Perubahan</button>
                        <a href="index.php?page=kelas" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>