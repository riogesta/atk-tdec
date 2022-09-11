<!DOCTYPE html>
<html lang="en">

<head>
	<title>Document</title>
</head>

<style>
	.center {
		text-align: center;
		line-height: 1.5em;
	}
</style>

<body>
	<?php
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=rekapitulasi.xls");
	?>

	<center>
		<p>PENGAJUAN ALAT TULIS KANTOR (ATK)
			<br>
			SEMESTER GANJIL TAHUN AKADEMIK 2021/2022
			<br>
			POLITEKNIK BANDUNG TEDC
		</p>
	</center>


	<table border='1'>
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