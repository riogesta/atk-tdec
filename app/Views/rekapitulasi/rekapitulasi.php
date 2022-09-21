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
               <?php if($_SESSION['ROLE'] == '0') { ?>
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th>No.</th>
                        <th>Barang</th>
                        <th>Satuan</th>
                        <th>Jumlah</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $i = 1;
                     $totalJml = 0;
                     foreach($rekap as $v): ?>
                     <tr>
                        <td><?= esc($i++) ?></td>
                        <td><?= esc($v['barang']) ?></td>
                        <td><?= esc($v['satuan']) ?></td>
                        <td><?= esc($v['jumlah']) ?></td>
                     </tr>
                     <?php $totalJml += $v['jumlah'] ?>
                     <?php endforeach; ?>
                     <tr>
                        <th colspan="3">Total Jumlah</th>
                        <th><strong><?= $totalJml ?></strong></th>
                     </tr>
                  </tbody>
               </table>
               <?php } else { ?>
               <!-- rekap untuk admin -->
               <?php 
               $sql = "
               SELECT
                  barang.id_barang,
                  barang.barang,
                  satuan.satuan,
                  unit_prodi.unit_prodi,
                  pengajuan.status,
                  sum(pengajuan.jumlah) jumlah
                  

               FROM pengajuan
               LEFT JOIN barang ON barang.id_barang = pengajuan.id_barang
               LEFT JOIN satuan ON satuan.id_satuan = barang.id_satuan
               LEFT JOIN unit_prodi ON unit_prodi.id_unit_prodi = pengajuan.id_unit_prodi

               WHERE status = '0'
               GROUP BY barang.barang, unit_prodi.unit_prodi
               ";

               $conn = mysqli_connect('localhost', 'archie', 'rahasia', 'db_atk') ;
               $query = mysqli_query($conn, $sql);

               $arr = array();
               while($row = mysqli_fetch_object($query)){
                  $arr[$row->id_barang][] = $row;
               }
               ?>
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th>Barang</th>
                        <th>Satuan</th>
                        <th>Unit/Prodi</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php                  
                  $i = 0;
                  $jumlahTotal = 0;
                  foreach($arr as $key => $val) : ?>
                     <?php foreach($val as $k => $v) : ?>
                     <tr>
                        <?php if($k == 0) : ?>
                        <td rowspan="<?= count($val) ?>"><?= $v->barang ?></td>
                        <td rowspan="<?= count($val) ?>"><?= $v->satuan ?></td>
                        <?php endif ?>
                        <td><?= $v->unit_prodi ?></td>
                        <td><?= $v->jumlah ?></td>
                        <?php if($k == 0) : ?>
                        <td rowspan="<?= count($val) ?>"><?= $total[$i++]; ?></td>
                        <?php endif ?>
                        <?php $jumlahTotal += $v->jumlah ?>
                     </tr>
                     <?php endforeach; ?>
                     <?php endforeach; ?>
                     <tr>
                        <th colspan="4">Jumlah Total</th>
                        <th><?= $jumlahTotal ?></th>
                     </tr>
                  </tbody>
               </table>
            </div>
            <?php } ?>
         </div>
      </div>
   </div>
</div>

<script>
</script>

<script src="<?= base_url('/assets/js/cards-actions.js') ?>"> </script>