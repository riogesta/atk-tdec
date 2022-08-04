<div class="table-responsive text-nowrap">
    <table class="table table-sm table-bordered table-striped">
        <thead>
            <tr class="table-success">
                <th>No.</th>
                <th>Nama Alat Bahan</th>
                <th>Satuan</th>
                <th>Jumlah Pengajuan</th>
                <?php foreach($unitProdi as $up): ?>
                <th><?= esc($up['unit_prodi'])?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i = 1;
            foreach($rekap as $v): ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= esc($v['barang']) ?></td>
                <td><?= esc($v['satuan']) ?></td>
                <td>...</td>
                <td><?= esc($v['jumlah']) ?></td> <!-- informatika -->
                <td><?= esc($v['jumlah']) ?></td> <!-- elektro -->
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>