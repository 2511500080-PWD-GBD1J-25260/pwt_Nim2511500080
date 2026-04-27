<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Siswa</h1>
            </div>
        </div>
    </div>
</div>

<?php
//kode otomatis
$carikode = mysqli_query($koneksi, "select max(Nis) from siswa") or die (
    mysqli_error($koneksi));
$datakode = mysqli_fetch_array($carikode);
if($datakode[0] != NULL) {
    $nilaikode = substr($datakode[0], 3);
    $kode = (int) $nilaikode;
    $kode = $kode + 1;
    $hasilkode = "M-".str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
    $hasilkode = "M-001";
}
$_SESSION["KODE"] = $hasilkode;

if(isset($_POST['tambah'])){
    $nis = $_POST['Nis'];
    $nm_siswa = $_POST['Nm_siswa'];
    $jenkel = $_POST['Jenkel'];
    $hp = $_POST['Hp'];
    $id_kelas = $_POST['Id_kelas'];

    $insert = mysqli_query($koneksi, "INSERT INTO siswa values ('$nis','$nm_siswa','$jenkel','$hp','$id_kelas')");
    
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
                            <input type="text" name="Nis"
                                placeholder="Nis" class="form-control">
                        </div>
    
                        <div class="form-group">
                            <label for="Nm_siswa">Nama Siswa</label>
                            <input type="text" name="Nm_siswa" id="Nm_siswa" 
                                placeholder="Nama Siswa" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Jenkel">Jenis Kelamin</label>
                            <select type="text" name="Jenkel" id="Jenkel" class="form-control">
                            <option value="">pilih</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Hp">Hp</label>
                            <input type="number" name="Hp" id="Hp" 
                                placeholder="Hp" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="id_kelas">Id kelas</label>
                            <div class="form-group">
                            <select class="form-control" name="Id_kelas" required>
                                <option value="Pilih Kelas" disible selected>..Pilih Kelas..</option>
                                <?php
                                $getkelas = mysqli_query($koneksi,"SELECT * FROM kelas");
                                while ($returnkelas = mysqli_fetch_array($getkelas)) {
                                    ?>

                                    <option value="<?= $returnkelas['Id_kelas']?>"><?= $returnkelas['nama_kelas']?></option>

                                    <?php } ?>
                                </select>
                            </div>
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