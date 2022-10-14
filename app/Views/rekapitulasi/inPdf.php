<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<style>
    .center {
        margin-left: auto;
        margin-right: auto;
    }

    table,
    td,
    th {
        padding: 5px;
        border: 1px solid;
    }

    table {
        border-collapse: collapse;
    }
</style>

<body>

    <center>
        <p>PENGAJUAN ALAT TULIS KANTOR (ATK)
            <br>
            SEMESTER GANJIL TAHUN AKADEMIK 2021/2022
            <br>
            POLITEKNIK BANDUNG TEDC
        </p>
    </center>

    <hr>

    <center>
        <p><?= esc($date) ?></p>
    </center>

    <?php if($_SESSION['ROLE'] == '0') { ?>
    <table class="center">
        <tr>
            <th>No</th>
            <th>Barang</th>
            <th>Satuan</th>
            <th>Jumlah</th>
        </tr>
        <?php
		$i = 1;
		$totalJml = 0;
		foreach($rekap as $v): ?>
        <tr>
            <td><?= $i++; ?> </td>
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
    </table>
    <?php } else { ?>
    <!-- rekap admin -->
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
    <table class="center">
        <tr>
            <th>Barang</th>
            <th>Satuan</th>
            <th>Unit/Prodi</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>
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
            <td rowspan="<?= count($val) ?>"><?= $total[$i++] ?></td>
            <?php endif ?>
            <?php $jumlahTotal += $v->jumlah ?>
        </tr>
        <?php endforeach; ?>
        <?php endforeach; ?>
        <tr>
            <th colspan="4">Jumlah Total</th>
            <th><?= $jumlahTotal ?></th>
        </tr>
    </table>
    <?php } ?>
</body>

</html>