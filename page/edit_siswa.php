<?php
require_once "config/koneksi.php";

/** @var mysqli $koneksi */
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Mata Pelajaran</h1>
            </div>
        </div>
    </div>
</div>

<?php
$kd = $_GET['kd'];
$edit = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_siswa WHERE Nis='$kd' "));

if(isset($_POST['tambah'])){
    $nis = $_POST['Nis'];
    $id_user = $_POST['Id_user'];
    $nm_siswa = $_POST['Nm_siswa'];
    $jenkel = $_POST['Jenkel'];
    $hp = $_POST['Hp'];
    $id_kelas = $_POST['Id_kelas'];

    $insert = mysqli_query($koneksi, "UPDATE tabel_siswa SET 
        Id_user='$id_user',
        Nm_siswa='$nm_siswa',
        Jenkel='$jenkel',
        Hp='$hp',
        Id_kelas='$id_kelas'
    WHERE Nis='$nis'");
    
    if ($insert) {
        echo '<div class="alert alert-info-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i> Info </h5>
            <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=siswa">';
    } else {
        echo '<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i> Info </h5>
            <h4>Gagal Disimpan</h4></div>';
    }
}
?>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="card-body p-2">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="Nis">Nis</label>
                            <input type="number" name="Nis" value="<?= $edit['Nis']; ?>" 
                                class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="Id_user">Id user</label>
                            <input type="number" name="Id_user" id="Id_user"  value="<?= $edit['Id_user']; ?>" 
                                placeholder="Id User" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Nm_siswa">Nama Siswa</label>
                            <input type="text" name="Nm_siswa" id="Nm_siswa"  value="<?= $edit['Nm_siswa']; ?>" 
                                placeholder="Nama Siswa" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Jenkel">Jenis Kelamin</label>
                            <select name="Jenkel" id="Jenkel" class="form-control">
                                <option value="">-- Pilih --</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Hp">Hp</label>
                            <input type="number" name="Hp" id="Hp"  value="<?= $edit['Hp']; ?>" 
                                placeholder="Hp" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Id_kelas">ID Kelas</label>
                            <select type="text" name="Id_kelas" id="Id_kelas" class="form-control">
                                <option value="">-- Pilih --</option>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM tabel_kelas");
                                while ($result = mysqli_fetch_array($query)) {
                                    echo "<option value='" . $result['Id_kelas'] . "'>" . $result['Nm_kelas'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" name="tambah" value="simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>