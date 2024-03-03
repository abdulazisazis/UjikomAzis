<div class=" container mt-1">

    <form class="d-flex form mb-3" method="GET" action="">

        <div class="me-2">
            <input type="date" class="form-control rounded-1" name="start_date">
        </div>

        <div class="ms-2">
            <input type="date" class="form-control rounded-1" name="end_date">
        </div>

        <div class="ms-3">
            <button type="submit" class="btn btn-primary rounded-1">Search</button>
        </div>

        <div class="ms-auto">
            <button class="btn fs-1" onclick="printDiv('div1')"><i class="bi bi-printer-fill"></i></button>
        </div>

    </form>
</div>

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
                tanggal LIKE '%$searchTerm%' OR
                waktu LIKE '%$searchTerm%')";

        if (!empty($startDate) && !empty($endDate)) {
            $query .= " AND tanggal BETWEEN '$startDate' AND '$endDate'";
        }

        $result = $konek->query($query);
        ?>

    <div class="col" style="margin: 10px;">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Data Warga</h5>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Tempat/TanggalLahir</th>
                                <th scope="col">No KK</th>
                                <th scope="col">Agama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">tanggal</th>
                                <th scope="col">umur</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
while ($s = $result->fetch_assoc()) {
    @$no++;
    
?>

                            <tr>
                                <td><?php echo $no;  ?></td>
                                <td><?php echo $s['nama']?></td>
                                <td><?php echo $s['jeniskelamin']?></td>
                                <td><?php echo $s['tempat_tanggallahir']?></td>
                                <td><?php echo $s['no_kk']?></td>
                                <td><?php echo $s['agama']?></td>
                                <td><?php echo $s['alamat']?></td>
                                <td><?php echo $s['tanggal']?></td>
                                <td><?php echo $s['umur']?></td>
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