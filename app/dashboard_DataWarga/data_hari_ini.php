<?php
include "../boot.php";
$date= date('Y-m-d');
?>
<div class="col">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data Warga Hari Ini</h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat/Tanggal Lahir</th>
                            <th>No KK</th>
                            <th>Agama</th>
                            <th>Alamat</th>
                            <th>Tanggal</th>
                            <th>Umur</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "../koneksi.php";
                        $query = "SELECT * FROM datawarga WHERE tanggal LIKE '%$date%'";
                        $result = $konek->query($query);

                        if ($result->num_rows > 0) {
                            $no = 1;
                            while ($row = $result->fetch_assoc()) {
                                ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['jeniskelamin']; ?></td>
                            <td><?php echo $row['tempat_tanggallahir']; ?></td>
                            <td><?php echo $row['no_kk']; ?></td>
                            <td><?php echo $row['agama']; ?></td>
                            <td><?php echo $row['alamat']; ?></td>
                            <td><?php echo $row['tanggal']; ?></td>
                            <td><?php echo $row['umur']; ?></td>
                        </tr>
                        <?php
                                $no++;
                            }
                        } else {
                            ?>
                        <tr>
                            <td colspan="9" class="text-center">Tidak ada data yang ditemukan.</td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>