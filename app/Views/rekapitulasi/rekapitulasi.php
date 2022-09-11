<div class="container-xxl flex-grow-1 container-p-y">
   <div class="col-md">
      <div class="card card-action mb-4">
         <div class="card-header">
            <div class="card-action-title">Rekapitulasi</div>

            <div class="dt-action-buttons text-end pt-3 pt-md-0 px-3">
               <div class="btn-group btn-group-sm" role="group">
                  <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                     aria-expanded="false">
                     Export
                  </button>
                  <ul class="dropdown-menu">
                     <li><a class="dropdown-item" href="/rekapitulasi/pdf">PDF</a></li>
                     <li><a class="dropdown-item" href="/rekapitulasi/excel">Excel</a></li>
                  </ul>
               </div>
            </div>

            <div class="card-action-element">
               <ul class="list-inline mb-0">
                  <li class="list-inline-item">
                     <a href="javascript:void(0);" class="card-expand"><i class="tf-icons bx bx-fullscreen"></i></a>
                  </li>
               </ul>
            </div>
         </div>

         <div class="card-body">
            <div class="table-responsive">
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th>No.</th>
                        <th>Barang</th>
                        <th>Satuan</th>
                        <th>Jumlah</th>
                        <th>Unit/Prodi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $i = 1;
                     foreach($rekap as $v): ?>
                     <tr>
                        <td><?= esc($i++) ?></td>
                        <td><?= esc($v['barang']) ?></td>
                        <td><?= esc($v['satuan']) ?></td>
                        <td><?= esc($v['jumlah']) ?></td>
                        <td><?= esc($v['unit_prodi']) ?></td>
                     </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
            <div class="">
               <br>
               <?php foreach($total as $v): ?>
               <p><?= esc($v['barang']) ?> <small><?= esc($v['total']) ?></small></p>
               <?php endforeach; ?>
            </div>
         </div>
      </div>
   </div>
</div>

<script>
</script>

<script src="<?= base_url('/assets/js/cards-actions.js') ?>"> </script>