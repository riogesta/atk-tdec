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

    <table class="center">
        <tr>
            <th>No</th>
            <th>Barang</th>
            <th>Satuan</th>
            <th>Jumlah</th>
            <th>Unit/Prodi</th>
        </tr>
        <?php
		$i = 1;
		foreach($rekap as $v): ?>
        <tr>
            <td><?= $i++; ?> </td>
            <td><?= esc($v['barang']) ?></td>
            <td><?= esc($v['satuan']) ?></td>
            <td><?= esc($v['jumlah']) ?></td>
            <td><?= esc($v['unit_prodi']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>