<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Kelas</h1>
      </div>
    </div>
  </div>
</div>

<?php
if(isset($_GET['action'])) {
  if($_GET['action'] == "hapus") {
    $id = $_GET['id'];
    // Sesuaikan nama kolom primary key Anda, di sini saya gunakan id_kelas
    $query = mysqli_query($koneksi, "DELETE FROM kelas WHERE id_kelas = '$id' ");
    if ($query){
      echo '
      <div class="alert alert-warning alert-dismissible">
      Berhasil Di Hapus</div>';
      echo '<meta http-equiv="refresh" content="1;url=index.php?page=kelas">';
    }
  }
}
?>

<div class="content">
    <div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <a href="index.php?page=tambah_kelas" class="btn btn-primary btn-sm">
            Tambah Kelas</a>
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Kelas</th>
                        <th>Wali Kelas</th>
                        <th>Jumlah Siswa</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 0;
                $query = mysqli_query($koneksi, "SELECT * FROM kelas");
                while ($result = mysqli_fetch_array($query)) {
                    $no++;
                ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $result['nama_kelas']; ?></td>
                        <td><?= $result['wali_kelas']; ?></td>
                        <td><?= $result['jumlah_siswa']; ?></td>
                        <td><?= $result['keterangan']; ?></td>
                        <td>
                            <a href="index.php?page=kelas&action=hapus&id=<?= $result['id_kelas'] ?>" 
                               onclick="return confirm('Yakin ingin menghapus data ini?')" title="">
                                <span class="badge badge-danger">Hapus</span></a>
                            
                            <a href="index.php?page=edit_kelas&id=<?= $result['id_kelas'] ?>" title="">
                                <span class="badge badge-warning">Edit</span></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>