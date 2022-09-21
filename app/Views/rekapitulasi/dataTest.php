<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tess</title>
</head>

<body>

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
    <table border="1">
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

</body>

</html>