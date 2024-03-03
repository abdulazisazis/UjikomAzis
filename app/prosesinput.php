<?php
include "koneksi.php";
$nama=$_POST['nama'];
$jk=$_POST['jeniskelamin'];
$ttl=$_POST['tempat_tanggallahir'];
$no_kk=$_POST['no_kk'];
$agama=$_POST['agama'];
$alamat=$_POST['alamat'];
$tanggal=$_POST['tanggal'];
$umur=$_POST['umur'];

if ($nama == "") {
    echo "maaf nama wajib diisi";
} else{
$input=$konek->query("insert into datawarga (nama,jeniskelamin,tempat_tanggallahir,no_kk,agama,alamat,tanggal,umur) values ('$nama','$jk','$ttl','$no_kk','$agama','$alamat','$tanggal','$umur')");
}

?>

<script>
    document.location.href = 'input.php';
</script>