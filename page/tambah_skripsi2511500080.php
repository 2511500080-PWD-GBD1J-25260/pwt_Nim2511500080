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
//kode otomatis
$carikode = mysqli_query($koneksi, "select max(Id_skripsi080 ) from skripsi_2511500080") or die (
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
    $Id_skripsi080 = $_POST['id_skripsi080'];
    $Judul_skripsi080 = $_POST['judul_skripsi080'];
    $Topik_080 = $_POST['topik_080'];
    $Semester080 = $_POST['semester080'];
    $Thn_ajaran080 = $_POST['thn_ajaran080'];

    $insert = mysqli_query($koneksi, "INSERT INTO skripsi_2511500080 VALUES ('$Id_skripsi080','$Judul_skripsi080','$Topik_080','$Semester080','$Thn_ajaran080')");
    
    if ($insert) {
        echo '<div class="alert alert-info-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i> Info </h5>
            <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=skripsi_2511500080">';
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
                            <label for="id_skripsi080">Id Skripsi</label>
                            <input type="text" name="id_skripsi080" id="id_skripsi080"
                                placeholder="Id skripsi" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="judul_skripsi080">Judul Skripsi</label>
                            <input type="text" name="judul_skripsi080" id="judul_skripsi080"
                                placeholder="Judul skripsi" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="topik_080">Topik</label>
                            <input type="text" name="topik_080" id="topik_080"
                                placeholder="Topik" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="semester080">Semester</label>
                            <select type="text" name="semester080" id="semester080"
                                placeholder="Semester" class="form-control">
                                <option value="">-- Pilih --</option>
                                <option value="L">semester 2</option>
                                <option value="P">semester 4</option>
</select>
                        </div>
                        <div class="form-group">
                            <label for="thn_ajaran080">Tahun Ajaran</label>
                            <select type="text" name="thn_ajaran080" id="thn_ajaran080"
                                placeholder="Thn ajaran" class="form-control">
                                <option value="">-- Pilih --</option>
                                <option value="2022/2023">2022/2023</option>
                                <option value="2023/2024">2023/2024</option>
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