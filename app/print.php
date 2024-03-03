<div id="div1">
    <!-- tampil  -->
    <?php
        include "boot.php";
        include "koneksi.php";

        $searchTerm = isset($_GET['q']) ? $_GET['q'] : '';
        $startDate = isset($_GET['start_date']) ? $_GET['start_date'] : '';
        $endDate = isset($_GET['end_date']) ? $_GET['end_date'] : '';

        $query = "SELECT * FROM datawarga WHERE
                (nama LIKE '%$searchTerm%' OR
                jeniskelamin LIKE '%$searchTerm%' OR
                tempat_tanggallahir LIKE '%$searchTerm%' OR
                no_kk LIKE '%$searchTerm%' OR
                agama LIKE '%$searchTerm%' OR
                alamat LIKE '%$searchTerm%' OR
                umur LIKE '%$searchTerm%' OR
                tanggal LIKE '%$searchTerm%')";

        if (!empty($startDate) && !empty($endDate)) {
            $query .= " AND tanggal BETWEEN '$startDate' AND '$endDate'";
        }

        $result = $konek->query($query);
        ?>
    <table class="table table-bordered mt-1" style="">
        <thead class="table-info">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Tempat TanggalLahir</th>
                <th scope="col">no KK</th>
                <th scope="col">Agama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Umur</th>
                <th scope="col">tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 0;
                while ($s = $result->fetch_assoc()) {
                    $no++;
                ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $s['nama'] ?></td>
                <td><?php echo $s['jeniskelamin'] ?></td>
                <td><?php echo $s['tempat_tanggallahir'] ?></td>
                <td><?php echo $s['no_kk'] ?></td>
                <td><?php echo $s['agama'] ?></td>
                <td><?php echo $s['alamat'] ?></td>
                <td><?php echo $s['umur'] ?></td>
                <td><?php echo $s['tanggal'] ?></td>
            </tr>
            <?php
                }
                ?>
        </tbody>
    </table>
</div>
</div>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
function printDiv(el) {
    var a = document.body.innerHTML;
    var b = document.getElementById(el).innerHTML;
    document.body.innerHTML = b;
    window.print();
    document.body.innerHTML = a;
}
</script>