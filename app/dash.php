<?php

include "boot.php";
$date= date('Y-m-d');
?>
<div class="container m-5 row ">

    <div class="col">
        <div class="card" style="width: 15rem;">
            <img src="../img/Warga.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <a href="dashboard_DataWarga/data_hari_ini.php" class="text-dark" style="text-decoration: none;">
                    <p class="card-text">Hari ini : </p>
                </a>
                <?php
    include "koneksi.php";
    $lihat = $konek->query("select waktu from datawarga where tanggal like '%$date%'");
    $jumlah = $lihat->num_rows;
    echo $jumlah;
    ?>

            </div>
        </div>
    </div>

    <div class="col">
        <div class="card" style="width: 15rem;">
            <img src="../img/Warga.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <a href="dashboard_DataWarga/data_bulan_ini.php" class="text-dark" style="text-decoration: none;">
                    <p class="card-text">Bulan ini : </p>
                </a>
                <?php
                $date1=date('Y-m');
    include "koneksi.php";
    $lihat = $konek->query("select waktu from datawarga where waktu like '%$date1%'");
    $jumlah = $lihat->num_rows;
    echo $jumlah;
    ?>

            </div>
        </div>
    </div>

    <div class="col">
        <div class="card" style="width: 15rem;">
            <img src="../img/Warga.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <a href="dashboard_DataWarga/data_tahun_ini.php" class="text-dark" style="text-decoration: none;">
                    <p class="card-text">Tahun ini : </p>
                </a>
                <?php
                $date2=date('Y');
    include "koneksi.php";
    $lihat = $konek->query("select waktu from datawarga where waktu like '%$date2%'");
    $jumlah = $lihat->num_rows;
    echo $jumlah;
    ?>

            </div>
        </div>
    </div>

</div>