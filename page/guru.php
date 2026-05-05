<?php
require_once "config/koneksi.php";

/** @var mysqli $koneksi */
if ($_SESSION['level'] != 'guru' && $_SESSION['level'] != 'admin') {

    echo "<script>
    alert('Akses ditolak');
    window.location='login.php';
    </script>";

    exit;

}
?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data guru</h1>
      </div>
    </div>
  </div>
</div>

<?php
if(isset($_GET['action'])) {
  if($_GET['action'] == "hapus") {
    $kd = $_GET['kd'];
    $query = mysqli_query($koneksi, "DELETE FROM tabel_guru where Kd_guru= '$kd' ");
    if ($query){
      echo '
      <div class="alert alert-warning alert-dismissible">
      Berhasil Di Hapus</div>';
      echo '<meta http-equiv="refresh" content="1;url=index.php?page=guru">';
    }
  }
}
?>

<div class="content">
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <a href="index.php?page=tambah_guru" class="btn btn-primary btn-sm">
            Tambah guru</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Kd guru</th>
                        <th>Id user</th>
                        <th>Nama guru</th>
                        <th>Jenkel</th>
                        <th>Pendidikan terakhir</th>
                        <th>Hp</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                $no = 0;
                $query = mysqli_query($koneksi, "SELECT * FROM tabel_guru");
                while ($result = mysqli_fetch_array($query)) {
                    $no++
                ?>
                <tbody>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $result['Kd_guru']; ?></td>
                        <td><?= $result['Id_user']; ?></td>
                        <td><?= $result['Nm_guru']; ?></td>
                        <td><?= $result['Jenkel']; ?></td>
                        <td><?= $result['Pend_terakhir']; ?></td>
                        <td><?= $result['Hp']; ?></td>
                        <td><?= $result['Alamat']; ?></td>
                        <td>
                            <a href="index.php?page=guru&action=hapus&kd=<?= $result['Kd_guru'] ?>" title="">
                                <span class="badge badge-danger">Hapus</span></a>
                            <a href="index.php?page=edit_guru&kd=<?= $result['Kd_guru'] ?>" title="">
                                <span class="badge badge-warning">Edit</span></a>
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
</div>