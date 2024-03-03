<?php
include "boot.php";
include "koneksi.php";


if(isset($_GET['id'])) {
    
    $id = $konek->real_escape_string($_GET['id']);

    $query = "SELECT * FROM datawarga WHERE no='$id'";
    $result = $konek->query($query);

    if($result->num_rows > 0) {
        
        $data = $result->fetch_assoc();
        ?>
        <div class="container mt-2">
            <h2>Detail Data</h2>
            <p><strong>Nama:</strong> <?php echo $data['nama']; ?></p>
            <p><strong>Jenis Kelamin:</strong> <?php echo $data['jeniskelamin']; ?></p>
            <p><strong>Alamat:</strong> <?php echo $data['alamat']; ?></p>
            <p><strong>Umur:</strong> <?php echo $data['umur']; ?></p>
            <p><strong>Tanggal Input:</strong> <?php echo $data['tanggal']; ?></p>
            <p><strong>Waktu:</strong> <?php echo $data['waktu']; ?></p>
            <a href="tampil.php"><button type="button" class="btn btn-secondary rounded-0">kembali</button></a>
            
        </div>
        <?php

    } else {
        echo "Data tidak ditemukan.";
    }

} else {
    echo "ID tidak diberikan.";
}

?>
