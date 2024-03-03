<?php
include "boot.php";
include "koneksi.php";
?>

<div class="container border p-3">
     <div class="mb-5">
          <h3 class="text-center mb-4">Form Input Data</h3>
     </div>
     <div class="row input-group">
          <div class="col-6">
               <form class="form" action="prosesinput.php" method="post" onsubmit="return konfirmasiSubmit()" enctype="multipart/form-data">

                    <div class="mb-3">
                         <label for="exampleInputEmail1" class="form-label">Nama : </label>
                         <input class="form-control form-control-sm" type="text" aria-label=".form-control-sm example"
                            aria-describedby="emailHelp" name="nama" required>
                    </div>

                    <div class="mb-3">
                         <label for="jeniskelamin" class="form-label">Jenis Kelamin : </label>
                         <div class="d-flex">
                              <div class="form-check me-3">
                                   <input class="form-check-input" type="radio" name="jeniskelamin" id="pria"
                                        value="pria">
                                   <label class="form-check-label" for="pria">
                                        Laki-laki
                                   </label>
                              </div>
                              <div class="form-check">
                                   <input class="form-check-input" type="radio" name="jeniskelamin" id="wanita"
                                        value="wanita">
                                   <label class="form-check-label" for="wanita">
                                        Perempuan
                                   </label>
                              </div>
                         </div>
                    </div>


                    <div class="mb-3">
                         <label for="exampleInputEmail1" class="form-label">Tempat Tanggal Lahir : </label>
                         <input class="form-control form-control-sm" type="text" aria-label=".form-control-sm example"
                              aria-describedby="emailHelp" name="tempat_tanggallahir" required>
                    </div>

                    <div class="mb-3">
                         <label for="exampleInputEmail1" class="form-label">No Kartu Keluarga : </label>
                         <input type="text" class="form-control form-control-sm" id="exampleInputEmail1"
                              aria-describedby="emailHelp" name="no_kk" required>
                    </div>
          </div>

          <div class="col-6">
               <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Agama : </label>
                    <input type="text" class="form-control form-control-sm" id="exampleInputEmail1"
                         aria-describedby="emailHelp" name="agama" required>
               </div>

               <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Alamat : </label>
                    <input type="text" class="form-control form-control-sm" id="exampleInputEmail1"
                         aria-describedby="emailHelp" name="alamat" required>
               </div>

               <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Umur : </label>
                    <input type="text" class="form-control form-control-sm" id="exampleInputEmail1"
                         aria-describedby="emailHelp" name="umur" required>
               </div>

               <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tanggal Input: </label>
                    <input readonly type="date" class="form-control form-control-sm" id="exampleInputEmail1"
                         aria-describedby="emailHelp" name="tanggal" value="<?php echo date('Y-m-d'); ?>" required>
               </div>


               <div class="text-end">
                    <button type="submit" class="btn btn-primary rounded-1">Simpan</button>
               </div>
               </form>
          </div>
     </div>
</div>
