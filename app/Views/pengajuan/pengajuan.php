<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
	<div class="row">

		<?php if (isset($diproses)): ?>
		<section class="col-md-12">
			<div class="card mb-3">
				<div class="card-body">
					<div class="d-flex justify-content-between">
						<h5 class="card-title d-inline">Pengajuan Masuk</h5>
						<span>pengajuan baru</span>
					</div>
					<div class="demo-inline-spacing">
						<div class="list-group" id="pengajuan-proses">

						</div>



					</div>
				</div>
			</div>
		</section>
		<?php endif; ?>

		<section class="col-md-12">
			<div class="card">
				<div class="card-header d-flex align-items-center justify-content-between">
					<h5 class="m-0">Data Pengajuan</h5>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<label for="smallSelect" class="form-label"><strong>Unit/Prodi</strong></label>
							<select id="smallSelect" class="form-select select2">
								<option></option>
								<?php foreach($filterUnit as $unit): ?>
								<option value="<?= $unit['id_unit_prodi'] ?>"><?= $unit['unit_prodi'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>
				<div class="card-datatable table-responsive">
					<table class="table table-bordered table-striped" id="datatables">
						<thead>
							<tr>
								<th>Barang</th>
								<th>Unit / Prodi</th>
								<th>tanggal</th>
								<th class="text-center">status</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							foreach($pengajuan as $row): ?>
							<tr>
								<?php $i += 1; ?>
								<td><?= esc($row['barang']) ?></td>
								<td><?= esc($row['unit_prodi']) ?></td>
								<td><?= esc($row['tanggal']) ?></td>
								<td class="text-center">
									<?php 
									$icon = "";
									$status = "";
									$color = "";
									if ($row['status'] == 0) {
										$color = "secondary";
										$icon =  "<i class='bx bxs-hourglass-top'></i>";
										$status =  "Diproses";

									} else if ($row['status'] == 1) {
										$color = "info";
										$icon = "<i class='bx bx-list-check'></i>";
										$status = "Approved Diproses";
										
									} else if ($row['status'] == 2) {
										$color = "primary";
										$icon = "<i class='bx bx-check-square'></i>";
										$status = "Dikirim";

									} else if ($row['status'] == 3) {
										$color = "success";
										$icon = "<i class='bx bxs-flag-checkered'></i>";
										$status = "Selesai";

									}
									?>
									<a href="/pengajuan/<?= esc($row['id_pengajuan']) ?>"
										class="btn btn-sm rounded-pill btn-<?= $color ?>">
										<?= $icon ?>
										<strong><?= $status ?></strong>
									</a>
								</td>
							</tr>

							<!-- modal info pengajuan -->
							<div class="modal fade" id="infoPengajuan<?= $i ?>" aria-hidden="true"
								data-bs-backdrop="static">
								<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel4">Ubah Status</h5>
											<button type="button" class="rounded-pill btn-close" data-bs-dismiss="modal"
												aria-label="Close"></button>
										</div>
										<div class="modal-body text-center">

											<!--  -->
											<div class="" role="group" aria-label="Basic radio toggle button group">
												<input type="radio" class="btn-check" name="status" id="0-<?= $i ?>"
													autocomplete="off" <?= $row['status'] == '0' ? 'checked':'' ?>
													value="0">
												<label class="btn btn-outline-secondary" for="0-<?= $i ?>">
													<i class='bx bxs-hourglass-top'></i>
													Diproses
												</label>

												<input type="radio" class="btn-check" name="status" id="1-<?= $i ?>"
													autocomplete="off" <?= $row['status'] == '1' ? 'checked':'' ?>
													value="1">
												<label class="btn btn-outline-info" for="1-<?= $i ?>">
													<i class='bx bx-list-check'></i>
													Approved Proses
												</label>

												<input type="radio" class="btn-check" name="status" id="2-<?= $i ?>"
													autocomplete="off" <?= $row['status'] == '2' ? 'checked':'' ?>
													value="2">
												<label class="btn btn-outline-primary" for="2-<?= $i ?>">
													<i class='bx bx-check-square'></i>
													Dikirim
												</label>

												<input type="radio" class="btn-check" name="status" id="3-<?= $i ?>"
													autocomplete="off" <?= $row['status'] == '3' ? 'checked':'' ?>
													value="3">
												<label class="btn btn-outline-success" for="3-<?= $i ?>">
													<i class='bx bxs-flag-checkered'></i>
													Selesai / Diterima
												</label>
											</div>
											<!--  -->


											<!-- / status pick -->
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-primary">Ubah Status</button>
											</form>
										</div>
									</div>
								</div>
							</div>
							<!-- / modal info pengajuan -->
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- modal tambah -->
			<div class="modal modal-top fade" id="tambahPengajuan" aria-hidden="true" data-bs-backdrop="static"
				tabindex="-1">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel4">Tambah Ajuan</h5>
							<button type="button" class="rounded-pill btn-close" data-bs-dismiss="modal"
								aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form action="/pengajuan" method="post">
								<?= csrf_field() ?>
								<div class="row">
									<div class="col mb-3">
										<label for="nameExLarge" class="form-label">Barang</label>
										<select name="barang" class="form-select select2" id="mySelect2">
											<option></option>
											<?php foreach($barang as $val): ?>
											<option value="<?= esc($val['id_barang']) ?>"
												data-satuan="<?= $val['satuan'] ?>">
												<?= esc($val['barang']) ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-md-10 col-sm-7">
										<label for="jumlah" class="form-label">Jumlah</label>
										<input type="number" id="jumlah" name="jumlah" class="form-control"
											placeholder="Jumlah">
									</div>
									<div class="col">
										<label for="jumlah" class="form-label">&nbsp;</label>
										<input type="text" id="satuan" readonly class="form-control-plaintext"
											placeholder="Satuan" value="">
									</div>
									<p id="satuan"></p>
								</div>
								<button type="submit" class="btn btn-primary rounded-pill">Kirim Ajuan</button>
							</form>
						</div>
						<div class="modal-footer">
							<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
						</div>
					</div>
				</div>
			</div>
			<!-- / modal tambah -->
		</section>
	</div>
</div>

<script>
	$(document).ready(function () {
		$('select.select2').select2({
			placeholder: "Pilih Unit/Prodi",
			// dropdownParent: $("div#tambahPengajuan"),

		});

		// get select2
		$('select.select2').on('change', function () {
			let unit_prodi = $('select.select2 option:selected').val()

			let targetLink = `/pengajuan/unit-prodi/${unit_prodi}`
			location.href = targetLink
		})

		$('#datatables').DataTable({
			"columnDefs": [{
				"orderable": false,
			}]
		});

	})

	let jumlahPengajuanProses = () => {
		let jumlah = null
		$.ajax({
			url: `/pengajuan/jumlah-status-proses`,
			type: 'POST',
			async: false,
			headers: {
				'X-Requested-With': 'XMLHttpRequest'
			},
			dataType: 'JSON',
		}).done(function (data) {
			jumlah = data.id_pengajuan
		})
		return jumlah
	}

	let pengajuanProses = () => {

		let jumlahProses = jumlahPengajuanProses()
		let halaman = 4

		$.ajax({
			url: `/pengajuan/status-proses/${5}/${0}`,
			type: "GET",
			headers: {
				'X-Requested-With': 'XMLHttpRequest'
			},
			dataType: "JSON",
			success: function (pengajuan) {
				console.log(pengajuan)
				let data = pengajuan.data

				data.forEach(function (data) {
					let list = `
					<a href="javascript:void(0);"
						class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
						<div class="li-wrapper d-flex justify-content-start align-items-center">
							<div class="avatar avatar-sm me-3">
								<span class="avatar-initial rounded-circle bg-label-dark">
									${data.jumlah}
								</span>
							</div>
							<div class="list-content">
								<h6 class="mb-1"><b>${data.barang}</b></h6>
								<small class="text-mute">${data.unit_prodi}</small>
							</div>
						</div>
						<small>${data.tanggal}</small>
					</a>`

					$("div.list-group#pengajuan-proses").append(list)
				})

				let pages = jumlahProses / halaman

				console.log(pages)
			}
		})
	}

	$(document).ready(function () {
		// let interval = setInterval(pengajuanProses, 2000);
		pengajuanProses()
	})

	// unit
</script>