<div class="container-xxl flex-grow-1 container-p-y">
   <div class="col-md">
      <div class="card card-action mb-4">
         <div class="card-header">
            <div class="card-action-title">Expand Card</div>
            <div class="card-action-element">
               <ul class="list-inline mb-0">
                  <li class="list-inline-item">
                     <a href="javascript:void(0);" class="card-expand"><i class="tf-icons bx bx-fullscreen"></i></a>
                  </li>
               </ul>
            </div>
         </div>

         <div>
            <div class="table-responsive">
               <table class="table">
                  <thead>
                     <tr>
                        <th>No.</th>
                        <th>Barang</th>
                        <th>Satuan</th>
                        <th>Jumlah</th>
                        <?php foreach($unitProdi as $up): ?>
                        <th><?= esc($up['unit_prodi']) ?></th>
                        <?php endforeach; ?>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach($rekap as $rekap): ?>
                     <tr>
                        <td></td>
                        <td><?= esc($rekap['barang']) ?></td>
                        <td><?= esc($rekap['satuan']) ?></td>
                     </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>

<script>
   $(document).ready(function () {

   })
</script>

<script src="<?= base_url('/assets/js/cards-actions.js') ?>" </script>