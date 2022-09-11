<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
   <div class="row mb-2">
      <!-- selamat datang -->

      <!-- total data user -->
      <div class="col-lg-4">
         <div class="card mb-3">
            <div class="row g-0">
               <div class="col-md-8">
                  <div class="card-body">
                     <h5 class="card-title text-primary">Jumlah User</h5>
                     <p class="card-text"><?= esc($totalUsers) ?><p class="card-text">
                  </div>
               </div>
               <div class="col-md-4 px-2 py-2">
                  <img class="card-img card-img-right-center" src="../assets/img/icons/unicons/man.png"
                     alt="Card image" />
               </div>
            </div>
         </div>
      </div>

      <!-- total permintaan -->
      <div class="col-lg-4">
         <div class="card mb-3">
            <div class="row g-0">
               <div class="col-md-8">
                  <div class="card-body">
                     <h5 class="card-title text-primary">Jumlah Pengajuan</h5>
                     <p class="card-text"><?= esc($totalPengajuan) ?><p class="card-text">
                  </div>
               </div>
               <div class="col-md-4 px-2 py-2">
                  <img class="card-img card-img-right" src="../assets/img/icons/unicons/checklist.png"
                     alt="Card image" />
               </div>
            </div>
         </div>
      </div>

      <!--/ Total data barang -->
      <div class="col-lg-4">
         <div class="card mb-3">
            <div class="row g-0">
               <div class="col-md-8">
                  <div class="card-body">
                     <h5 class="card-title text-primary">Jumlah Barang</h5>
                     <p class="card-text"><?= esc($totalBarang) ?><p class="card-text">
                  </div>
               </div>
               <div class="col-md-4 px-2 py-2">
                  <img class="card-img card-img-right" src="../assets/img/icons/unicons/box.png" alt="Card image" />
               </div>
            </div>
         </div>
      </div>
      <!-- row -->
   </div>

   <!-- Total pengajuan -->
   <div class="col-xxl">
      <div class="card mb-4">
         <div class="card-header d-flex align-items justify-content-between">
            <h5 class="mb-0">Daftar Pengajuan <br>
               <small class="text-muted">Proses Dikirim</small>
            </h5>
            <!-- <small class="text-muted ">Default label</small> -->
         </div>
         <div class="table-responsive text-nowrap">
            <table class="table">
               <thead>
                  <tr>
                     <th>Nama Barang</th>
                     <th>Satuan</th>
                     <th>Tanggal Pengajuan</th>
                     <th>Unit / Prodi</th>
                  </tr>
               </thead>
               <tbody class="table-border-bottom-0">
                  <?php foreach($pengajuan as $row): ?>
                  <tr>
                     <td><?= esc($row['barang']) ?> </td>
                     <td><?= esc($row['satuan']) ?> </td>
                     <td><?= esc($row['tanggal']) ?> </td>
                     <td><?= esc($row['unit_prodi']) ?> </td>
                  </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
      <!--/ Small table -->
      <!-- Content wrapper -->
   </div>


</div>
</div>