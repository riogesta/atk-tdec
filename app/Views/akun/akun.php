<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
   <!-- Small table -->

   <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
         <h5 class="mb-0">Akun</h5>
         <button type="button" class="tambah_ btn rounded-pill btn-primary float-end" data-bs-target="#tambah-akun"
            data-bs-toggle="modal">
            <i class='bx bx-plus-circle'></i>
            Tambah
         </button>
         <!-- <small class="text-muted ">Default label</small> -->
      </div>
      <div class="table-responsive">
         <table class="table align-items-center mb-0">
            <thead>
               <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">No
                  </th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Unit / Prodi
                  </th>
                  <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">...
                  </th>
               </tr>
            </thead>
            <tbody class="table-border-bottom-0">
               <?php
         		$i = 1;
               foreach($user as $val): ?>
               <tr>
                  <td class="text-xs text-center"><strong><?= $i++ ?></strong></td>
                  <td class="text-xs"><?= esc($val['username']) ?></td>
                  <td class="text-xs"><?= esc($val['unit_prodi']) ?></td>
                  <td class="text-xs text-center">
                     <a href="akun/<?= esc($val['username'], 'url')?>"
                        class="bx bxs-cog rounded-pill btn btn-sm btn-success"></a>
                     <button type="button" data-val="<?= esc($val['id_user']) ?>"
                        class="hapus bx bxs-trash rounded-pill btn btn-sm btn-danger"></button>
                  </td>
               </tr>
               <?php endforeach; ?>

            </tbody>
         </table>
      </div>
   </div>
   <!-- modal tambah akun -->
   <div class="modal modal-top fade" id="tambah-akun" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5>Tambah Akun</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form action="/akun" method="post">
                  <?= csrf_field() ?>
                  <div class="mb-2">
                     <label for="username" class="form-label">Username</label>
                     <input type="text" name="username" class="form-control" id="username" placeholder="Username"
                        style="text-transform:lowercase">
                     <div class="invalid-feedback username"></div>
                  </div>
                  <div class="mb-2">
                     <label for="password" class="form-label">Password</label>
                     <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                     <div class="invalid-feedback password"></div>
                  </div>
                  <div class="mb-2">
                     <label for="unit-prodi" class="form-label">Unit / Prodi</label>
                     <select id="unit-prodi" class="select2 form-select" name="unit-prodi" data-allow-clear="true">
                        <option value=""></option>
                        <?php foreach($unit_prodi as $val): ?>
                        <option value="<?= esc($val['id_unit_prodi']) ?>"><?= esc($val['unit_prodi']) ?>
                        </option>
                        <?php endforeach; ?>
                     </select>
                     <div class="invalid-feedback unit-prodi"></div>
                  </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!-- / modal tambah barang -->

   <!--/ Small table -->
   <!-- Content wrapper -->
</div>

<script>
   $(document).ready(function () {
      $('select.select2.form-select').select2({
         placeholder: "Pilih Unit / Prodi",
         dropdownParent: $("div#tambah-akun"),
      })
   });


   // sweatalert2
   // simpan/update alert
   let isSave = '<?= session()->getFlashdata("msg") ?>'
   if (isSave != '') {
      $(document).ready(function () {
         Swal.fire(
            '<?= session()->getFlashdata('msg') ?>',
            '',
            'success'
         )
         $(".swal2-container.swal2-backdrop-show").css('z-index', '9999'); //changes the color of the overlay
      })
   }

   // hapus alert
   $('button.hapus').click(function () {
      Swal.fire({
         title: 'Data Akan dihapus!',
         text: "apakah kamu yakin?",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Hapus',
         cancelButtonText: 'Batal'
      }).then((result) => {
         if (result.isConfirmed) {
            Swal.fire({
               title: 'Data Berhasil Terhapus!',
               icon: 'success',
               confirmButton: 'Hapus'
            }).then((result) => {
               if (result.isConfirmed) {
                  $.ajax({
                     type: "POST",
                     url: "akun/hapus",
                     headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                     },
                     data: {
                        id: $(this).data('val'),
                     },
                     success: function (data) {
                        location.reload()
                     },
                     error: function (xhr, status, error) {
                        console.error(xhr);
                     }
                  });
               }
            })
            $(".swal2-container.swal2-backdrop-show").css('z-index',
               '9999'); //changes the color of the overlay
         }
      })
      $(".swal2-container.swal2-backdrop-show").css('z-index', '9999'); //changes the color of the overlay
   })
</script>
<script src="<?= base_url('/assets/vendor/js/validation-akun.js') ?>"></script>