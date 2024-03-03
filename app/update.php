<?php
include "koneksi.php";
include "boot.php";
$id = $_GET['id'];
$panggil = $konek->query("select * from datawarga where no='$id'");
$a =$panggil->fetch_array();

?>


<div class="container border p-3">
     <div class="mb-5">
          <h3 class="text-center mb-4">Form Input Data</h3>
     </div>
     <div class="row input-group">
          <div class="col-6">
               <form class="form " action="prosesinput.php" method="post" onsubmit="return konfirmasiSubmit()">

                    <div class="mb-3">
                         <label for="exampleInputEmail1" class="form-label">Nama : </label>
                         <input class="form-control form-control-sm" type="text" aria-label=".form-control-sm example"
                              aria-describedby="emailHelp" name="nama" value="<?= $a['nama'] ?>" required>
                    </div>

                    <div class="mb-3">
                         <label for="jeniskelamin" class="form-label">Jenis Kelamin : </label>
                         <div class="d-flex">
                              <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="jeniskelamin" id="pria"
                                        value="pria" <?= ($a['jeniskelamin'] == 'pria') ? 'checked' : '' ?> required>
                                   <label class="form-check-label" for="pria">Laki-laki</label>
                              </div>
                              <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="jeniskelamin" id="wamita"
                                        value="wanita" <?= ($a['jeniskelamin'] == 'wanita') ? 'checked' : '' ?>
                                        required>
                                   <label class="form-check-label" for="wanita">Perempuan</label>
                              </div>
                         </div>
                    </div>


                    <div class="mb-3">
                         <label for="exampleInputEmail1" class="form-label">Tempat Tanggal Lahir : </label>
                         <input class="form-control form-control-sm" type="text" aria-label=".form-control-sm example"
                              aria-describedby="emailHelp" name="tempat_tanggallahir"
                              value="<?= $a['tempat_tanggallahir'] ?>" required>
                    </div>

                    <div class="mb-3">
                         <label for="exampleInputEmail1" class="form-label">NIK Kartu Keluarga : </label>
                         <input type="text" class="form-control form-control-sm" id="exampleInputEmail1"
                              aria-describedby="emailHelp" name="no_kk" value="<?= $a['no_kk'] ?>" required>
                    </div>
          </div>

          <div class="col-6">
               <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Agama : </label>
                    <input type="text" class="form-control form-control-sm" id="exampleInputEmail1"
                         aria-describedby="emailHelp" name="agama" value="<?= $a['agama'] ?>" required>
               </div>

               <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Alamat : </label>
                    <input type="text" class="form-control form-control-sm" id="exampleInputEmail1"
                         aria-describedby="emailHelp" name="alamat" value="<?= $a['agama'] ?>" required>
               </div>

               <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Umur : </label>
                    <input type="text" class="form-control form-control-sm" id="exampleInputEmail1"
                         aria-describedby="emailHelp" name="umur" value="<?= $a['umur'] ?>" required>
               </div>

               <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tanggal Input: </label>
                    <input readonly type="date" class="form-control form-control-sm" id="tanggalInput"
                         aria-describedby="emailHelp" name="tanggal" required>
               </div>



               <div class="text-end">
                    <button type="submit" class="btn btn-primary rounded-1">Simpan</button>
               </div>
               </form>
          </div>
     </div>
</div>



<!-- <?php
if (isset($_POST['simpan'])) {
@$ubah=$konek->query("update datawarga set nama='$_POST[nama]',jeniskelamin='$_POST[jeniskelamin]',tempat_tanggallahir='$_POST[tempat_tanggallahir]',tempat_tanggallahir='$_POST[tempat_tanggallahir]',agama='$_POST[agama]',alamat='$_POST[alamat]',umur='$_POST[umur]',tanggal='$_POST[tanggal]' where no='$id'");
?>
<script>
  document.location='tampil.php?notif=berhasil';
</script>
<?php
}

?> -->

<?php
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $tempat_tanggallahir = $_POST['tempat_tanggallahir'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $tanggal = $_POST['tanggal'];
    $umur = $_POST['umur'];

    if (!empty($nama) && !empty($jeniskelamin) && !empty($alamat) && !empty($umur) && !empty($tanggal)) {
        $query = "UPDATE datawarga SET ";
        $query .= "nama='$nama', ";
        $query .= "jeniskelamin='$jeniskelamin', ";
        $query .= "tempat_tanggallahir='$tempat_tanggallahir', ";
        $query .= "agama='$agama', ";
        $query .= "alamat='$alamat', ";
        $query .= "umur='$umur', ";
        $query .= "tanggal='$tanggal' ";
        $query .= "WHERE no='$id'";

        $ubah = $konek->query($query);

        if ($ubah) {
            echo "<script>alert('Berhasil mengubah data');</script>";
            echo "<script>document.location='tampil.php?notif=berhasil';</script>";
        } else {
            echo "<script>alert('Gagal mengubah data');</script>";
        }
    } else {
        echo "<script>alert('Perubahan gagal, pastikan semua input terisi');</script>";
    }
}
?>

<script>
    // Ambil elemen input tanggal
    var inputTanggal = document.getElementById('tanggalInput');

    // Buat objek tanggal dengan tanggal saat ini
    var tanggalSaatIni = new Date();

    // Format tanggal dengan format YYYY-MM-DD
    var tahun = tanggalSaatIni.getFullYear();
    var bulan = ('0' + (tanggalSaatIni.getMonth() + 1)).slice(-2); // Ingat bulan dimulai dari 0
    var tanggal = ('0' + tanggalSaatIni.getDate()).slice(-2);

    // Gabungkan tahun, bulan, dan tanggal menjadi format YYYY-MM-DD
    var tanggalFormat = tahun + '-' + bulan + '-' + tanggal;

    // Atur nilai input tanggal menjadi tanggal saat ini
    inputTanggal.value = tanggalFormat;
</script>
