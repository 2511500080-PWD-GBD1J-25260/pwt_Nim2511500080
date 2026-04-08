<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Data Kelas</h1>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_POST['tambah'])){
    $nama_kelas   = $_POST['nama_kelas'];
    $wali_kelas   = $_POST['wali_kelas'];
    $jumlah_siswa = $_POST['jumlah_siswa'];
    $keterangan   = $_POST['keterangan'];

    // Karena id_kelas adalah AUTO_INCREMENT, kita masukkan NULL atau lewatkan kolomnya
    $insert = mysqli_query($koneksi, "INSERT INTO kelas (nama_kelas, wali_kelas, jumlah_siswa, keterangan) 
              VALUES ('$nama_kelas', '$wali_kelas', '$jumlah_siswa', '$keterangan')");
    
    if ($insert) {
        echo '<div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i> Info </h5>
            <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=kelas">';
    } else {
        echo '<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Info </h5>
            <h4>Gagal Disimpan: ' . mysqli_error($koneksi) . '</h4></div>';
    }
}
?>

<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
          <form method="POST" action="">
            <div class="form-group">
              <label for="nama_kelas">Nama Kelas</label>
              <input type="text" name="nama_kelas" id="nama_kelas" placeholder="Contoh: XI RPL 1" class="form-control" required>
            </div>
            
            <div class="form-group">
              <label for="wali_kelas">Wali Kelas</label>
              <input type="text" name="wali_kelas" id="wali_kelas" placeholder="Nama Guru Wali Kelas" class="form-control">
            </div>

            <div class="form-group">
              <label for="jumlah_siswa">Jumlah Siswa</label>
              <input type="number" name="jumlah_siswa" id="jumlah_siswa" placeholder="0" class="form-control">
            </div>

            <div class="form-group">
              <label for="keterangan">Keterangan</label>
              <textarea name="keterangan" id="keterangan" rows="3" placeholder="Keterangan tambahan..." class="form-control"></textarea>
            </div>

            <div class="card-footer px-0">
              <input type="submit" class="btn btn-primary" name="tambah" value="Simpan Data">
              <a href="index.php?page=kelas" class="btn btn-secondary">Kembali</a>
            </div>
          </form>
      </div>
    </div>
  </div>
</section>