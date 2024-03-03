<?php
session_start();
$user=$_SESSION['user'];

if ($user==""){
  ?>
<script>
document.location.href = '../index.php';
</script>
<?php
}else{

}
include "boot.php";
?>



<body>


    <!-- navbar -->
    <style>
    .navbar-nav {
        flex-direction: column;
    }

    .navbar-nav .nav-item {
        margin-right: 0;
    }
    </style>


    </head>

    <body>


        <nav class="navbar bg-body-secondary">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1 ps-3">Data Warga</span>
                <span id="clock" class="navbar-text"></span>
            </div>
        </nav>
        <script>
        function getTime() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var timeString = padZero(hours) + ":" + padZero(minutes) + " WIB";
            return timeString;
        }

        function padZero(num) {
            return (num < 10) ? "0" + num : num;
        }

        function updateClock() {
            var clockElement = document.getElementById("clock");
            if (clockElement) {
                clockElement.textContent = getTime();
                clockElement.style.color = "black";
            }
        }
        setInterval(updateClock, 1000);
        </script>


        <!-- navbar penutup -->


        <!-- Menu Sidebar -->
        <div class="row mt-2 ps-3">
            <div class="col-3 shadow-lg" role="">

                <ul class="list-group list-group-fluish rounded">
                    <a href="dash.php" target="konten" style="text-decoration: none;">
                        <li class="list-group-item list-group-item-action d-flex align-items-center"
                            data-bs-toggle="list" role="tab">
                            <img src="../img/dashboard.png" alt="" class="me-3" style="width: 25px; height: 25px;">
                            <span>Dashboard</span>
                        </li>
                    </a>

                    <a class="text-decoration-none" href="input.php" target="konten">
                        <li class="list-group-item list-group-item-action d-flex align-items-center"
                            data-bs-toggle="list" role="tab">
                            <img src="../img/create-list.png" alt="" class="me-2" style="width: 30px; height: 30px;">
                            <span>input data Warga</span>
                        </li>
                    </a>

                    <a href="tampil.php" target="konten" style="text-decoration: none;">
                        <li class="list-group-item list-group-item-action d-flex align-items-center"
                            data-bs-toggle="list" role="tab">
                            <img src="../img/form.png" alt="" class="mr-2" style="width: 25px; height: 25px;">
                            <span>Data Warga</span>
                        </li>
                    </a>

                    <a href="rekap.php" target="konten" style="text-decoration: none;">
                        <li class="list-group-item list-group-item-action d-flex align-items-center"
                            data-bs-toggle="list" role="tab">
                            <img src="../img/jurnal.png" alt="" class="mr-2" style="width: 25px; height: 25px;">
                            <span>Rekap</span>
                        </li>
                    </a>

                    <a href="log_out.php" style="text-decoration: none;">
                        <li class="list-group-item list-group-item-action d-flex align-items-center"
                            data-bs-toggle="list" role="tab"><img src="../img/keluar.png" alt="" class="mr-2"
                                style="width: 25px; height: 25px;"><span>Keluar</span>
                        </li>
                    </a>
                </ul>
                
            </div>
            <!-- penutup sidebar -->


            <!-- konten -->
            <div class="col">
                <iframe src="dash.php" name="konten" frameborder="0" width="100%" height="800"></iframe>
            </div>
            <!-- penutup konten -->

        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    </body>

    </html>