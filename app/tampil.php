<?php
include "boot.php";
include "koneksi.php";

$searchTerm = isset($_POST['q']) ? $_POST['q'] : '';

$results_per_page = 5;

$total_results = $konek->query("SELECT COUNT(*) as total FROM datawarga WHERE
nama LIKE '%$searchTerm%' OR
jeniskelamin LIKE '%$searchTerm%' OR
tempat_tanggallahir LIKE '%$searchTerm%' OR
no_kk LIKE '%$searchTerm%' OR
agama LIKE '%$searchTerm%' OR
alamat LIKE '%$searchTerm%' OR
umur LIKE '%$searchTerm%' OR
waktu LIKE '%$searchTerm%'")->fetch_assoc()['total'];

// Tentukan jumlah halaman
$num_of_pages = ceil($total_results / $results_per_page);

// Tentukan halaman saat ini
$current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Hitung offset untuk kueri SQL
$offset = ($current_page - 1) * $results_per_page;

// Kueri SQL dengan batasan jumlah data per halaman dan offset
$query = "SELECT * FROM datawarga WHERE
nama LIKE '%$searchTerm%' OR
jeniskelamin LIKE '%$searchTerm%' OR
tempat_tanggallahir LIKE '%$searchTerm%' OR
no_kk LIKE '%$searchTerm%' OR
agama LIKE '%$searchTerm%' OR
alamat LIKE '%$searchTerm%' OR
umur LIKE '%$searchTerm%' OR
waktu LIKE '%$searchTerm%'
ORDER BY waktu DESC
LIMIT $results_per_page OFFSET $offset";

$result = $konek->query($query);
?>

<div class="d-flex align-items-center mt-3">

     <a href="input.php" class="btn btn-primary rounded-3 btn-sm" style="margin-left: 10px;">+ Data Warga</a>

     <form id="searchForm" class="d-flex ms-auto" action="" method="post" role="search" style="margin-right: 25px;">
          <input id="searchInput" class="form-control rounded-1" type="search" name="q" placeholder="Search"
               aria-label="Search" style="margin-right: 10px;">
          <button id="searchButton" class="btn btn-outline-light btn-primary rounded-1" type="submit"><i
                    class="bi bi-search"></i></button>
     </form>
</div>



<div class="col mt-2 shadow-lg" style="margin: 10px;">
     <div class="card">
          <div class="card-body">
               <h5 class="card-title text-center">Data Warga</h5>
               <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="dataTable" style="font-size: 15px;">
                         <thead>
                              <tr>
                                   <th scope="col" width="5%">No</th>
                                   <th scope="col" width="10%">Nama</th>
                                   <th scope="col" width="5%">JK</th>
                                   <th scope="col" width="15%">TTL</th>
                                   <th scope="col">No KK</th>
                                   <th scope="col">Agama</th>
                                   <th scope="col" width="10%">Alamat</th>
                                   <th scope="col" width="10%">Umur</th>
                                   <th scope="col" width="10%">Waktu</th>
                                   <th scope="col" width="12%">Aksi</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php
                        // Hitung nomor urut untuk setiap data
                        $start_number = ($current_page - 1) * $results_per_page + 1;
                        while ($s = $result->fetch_assoc()) {
                        ?>
                              <tr>
                                   <td><?php echo $start_number; ?></td>
                                   <td><?php echo $s['nama'] ?></td>
                                   <td><?php echo $s['jeniskelamin'] ?></td>
                                   <td><?php echo $s['tempat_tanggallahir'] ?></td>
                                   <td><?php echo $s['no_kk'] ?></td>
                                   <td><?php echo $s['agama'] ?></td>
                                   <td><?php echo $s['alamat'] ?></td>
                                   <td><?php echo $s['umur'] ?></td>
                                   <td><?php echo $s['waktu'] ?></td>
                                   <td>
                                        <button class="btn btn-danger btn-sm rounded-0"
                                             onclick="document.location.href='hapus.php?id=<?php echo $s['no'] ?>'">
                                             <i class="bi bi-trash3 text-light"></i>
                                        </button>
                                        <button class="btn btn-info btn-sm rounded-0"
                                             onclick="document.location.href='update.php?id=<?php echo $s['no'] ?>'">
                                             <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm rounded-0"
                                             onclick="document.location.href='read.php?id=<?php echo $s['no'] ?>'">
                                             <i class="bi bi-search"></i>
                                        </button>
                                   </td>
                              </tr>
                              <?php
                            $start_number++;
                        }
                        ?>
                         </tbody>
                    </table>
               </div>

               <!-- Pagination -->
               <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                         <li class="page-item <?php if($current_page == 1) echo 'disabled'; ?>">
                              <a class="page-link" href="?page=<?php echo ($current_page - 1); ?>" tabindex="-1"
                                   aria-disabled="true">Sebelumnya</a>
                         </li>
                         <?php for($page = 1; $page <= $num_of_pages; $page++): ?>
                         <li class="page-item <?php if($page == $current_page) echo 'active'; ?>">
                              <a class="page-link" href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
                         </li>
                         <?php endfor; ?>
                         <li class="page-item <?php if($current_page == $num_of_pages) echo 'disabled'; ?>">
                              <a class="page-link" href="?page=<?php echo ($current_page + 1); ?>">Selanjutnya</a>
                         </li>
                    </ul>
               </nav>
               <!-- penutup Pagination -->
               
          </div>
     </div>
</div>


<script>
document.getElementById("searchInput").addEventListener("keyup", function(event) {
     event.preventDefault();
     if (event.keyCode === 13) {
          document.getElementById("searchForm").submit();
     }
});
</script>