<?php
require_once "config/koneksi.php";

/** @var mysqli $koneksi */
?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Skripsi</h1>
      </div>
    </div>
  </div>
</div>

<?php
if(isset($_GET['action'])) {
  if($_GET['action'] == "hapus") {
    $kd = $_GET['kd'];
    $query = mysqli_query($koneksi, "DELETE FROM skripsi_2511500080 where id_skripsi080 = '$kd' ");
    if ($query){
      echo '
      <div class="alert alert-warning alert-dismissible">
      Berhasil Di Hapus</div>';
      echo '<meta http-equiv="refresh" content="1;url=index.php?page=skripsi_2511500080">';
    }
  }
}
?>

<div class="content">
    <div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <a href="index.php?page=tambah_skripsi2511500080" class="btn btn-primary btn-sm">
            Tambah Skripsi</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Skripsi</th>
                        <th>Judul Skripsi</th>
                        <th>Topik</th>
                        <th>Semester</th>
                        <th>Tahun Ajaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <?php
                $no = 0;
                $query = mysqli_query($koneksi, "SELECT * FROM skripsi_2511500080");
                while ($result = mysqli_fetch_array($query)) {
                    $no++;
                ?>

                <tbody>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $result['id_skripsi080']; ?></td>
                        <td><?= $result['judul_skripsi080']; ?></td>
                        <td><?= $result['topik_080']; ?></td>
                        <td><?= $result['semester080']; ?></td>
                        <td><?= $result['thn_ajaran080']; ?></td>
                        <td>
                            <a href="index.php?page=skripsi_2511500080&action=hapus&kd=<?= $result['id_skripsi080'] ?>">
                                <span class="badge badge-danger">Hapus</span></a>

                            <a href="index.php?page=edit_skripsi2511500080&kd=<?= $result['id_skripsi080'] ?>">
                                <span class="badge badge-warning">Edit</span></a>
                        </td>
                    </tr>
                </tbody>

                <?php } ?>
            </table>
        </div>
    </div>
</div>
</div>