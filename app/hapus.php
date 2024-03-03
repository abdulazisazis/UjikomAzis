<?php
include "koneksi.php";
$id = $_GET['id'];
$hapus = $konek->query("delete from datawarga where no='$id'");

?>
<script>
    document.location.href='tampil.php';
</script>