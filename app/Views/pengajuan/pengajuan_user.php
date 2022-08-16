<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
	<div class="row">
		<?= session()->getFlashData("msg") ? '' : '' ?>
		<!-- pengajuan dalam proses -->
		<section class="col-sm-6 col-md-6 col-lg-6 mb-4">
			<div class="card overflow-hidden" id="card-status-dalam-proses">
				<div class="card-header d-flex justify-content-between pb-3">
					<div class="card-title mb-0">
						<h5 class="m-0 me-2">Pengajuan</h5>
						<small class="text-muted">Status dalam proses</small>
					</div>
					<button type="button" id="btn-tambah" class="btn btn-xs btn-primary rounded-pill" data-bs-toggle="modal"
						data-bs-target="#tambahPengajuan">
						<i class='bx bx-plus-circle'></i>
					</button>
				</div>
				<div class="card-body wdgt-proccess">
					<ul class="p-0 m-02" id="status-dalam-proses">
						<p class="text-center text-muted mt-2 mb-0" id="alert-status-dalam-proses">Tidak ada Proses</p>

					</ul>
				</div>
			</div>
		</section>

		<!-- pengajuan dikirim  -->
		<section class="col-sm-6 col-md-6 col-lg-6 mb-4">
			<div class="card overflow-hidden" id="card-status-dikirim">
				<div class="card-header d-flex justify-content-between pb-3">
					<div class="card-title mb-0">
						<h5 class="m-0 me-2">Pengajuan</h5>
						<small class="text-muted">Status Dikirim</small>
					</div>
					<div class="dropdown">
						<button class="btn p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
							<i class="bx bx-dots-vertical-rounded"></i>
						</button>
						<div class="dropdown-menu dropdown-menu-end">
							<a class="dropdown-item" href="">Tandai telah diterima semua</a>
						</div>
					</div>
				</div>
				<div class="card-body wdgt-proccess">
					<ul class="p-0 m-02" id="status-dikirim">
						<p class="text-center text-muted mt-2 mb-0" id="message-status-dikirim">Tidak ada Proses</p>

						<!-- Modal -->

					</ul>
				</div>
			</div>
		</section>
	</div>

	<div class="row mb-3">
		<div class="accordion" id="accordionWithIcon">
			<div class="accordion-item card active">
				<h2 class="accordion-header d-flex align-items-center">
					<button type="button" class="accordion-button" data-bs-toggle="collapse"
						data-bs-target="#accordionWithIcon-3" aria-expanded="false">
						<i class='bx bx-history me-2'></i>
						Riwayat Pengajuan
					</button>
				</h2>
				<div id="accordionWithIcon-3" class="accordion-collapse collapse show">
					<div class="accordion-body">
						<?php if ($pengajuan_user == null) { ?>
						<h5 class="text-center text-muted">Tidak ada data</h5>
						<?php } else { ?>
						<table class="table table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Barang</th>
									<th>tanggal</th>
								</tr>
							</thead>
							<tbody>
								<?php
							$i = 1;
							foreach($pengajuan_user as $row): ?>
								<tr>
									<td><?= $i++ ?></td>
									<td><?= esc($row['barang']) ?></td>
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
										$status = "Approve Diproses";
										
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
												<form action="/pengajuan/status" method="post">
													<?= csrf_field() ?>
													<input type="hidden" name="id" value="<?= esc($row['id_pengajuan']) ?>">
													<!-- status pick -->
													<div class="" role="group" aria-label="Basic radio toggle button group">
														<input type="radio" class="btn-check" name="status" id="2-<?= $i ?>"
															autocomplete="off" <?= $row['status'] == '2' ? 'checked':'' ?> value="2">
														<label class="btn btn-outline-primary" for="2-<?= $i ?>">
															<i class='bx bx-check-square'></i>
															Dikirim
														</label>

														<input type="radio" class="btn-check" name="status" id="3-<?= $i ?>"
															autocomplete="off" <?= $row['status'] == '3' ? 'checked':'' ?> value="3">
														<label class="btn btn-outline-success" for="3-<?= $i ?>">
															<i class='bx bxs-flag-checkered'></i>
															Selesai / Diterima
														</label>
													</div>
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
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- modal tambah -->
	<div class="modal modal-top fade animate__animated animate__slideInDown" id="tambahPengajuan" aria-hidden="true"
		data-bs-backdrop="static" tabindex="-1">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel4">Tambah Ajuan</h5>
					<button type="button" class="rounded-pill btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="/pengajuan" method="post">
						<?= csrf_field() ?>
						<div class="row">
							<div class="col mb-3">
								<label for="nameExLarge" class="form-label">Barang</label>
								<select name="barang" class="form-select select2" id="selectBarang" data-allow-clear="true">
									<option></option>
									<?php foreach($barang as $val): ?>
									<option value="<?= esc($val['id_barang']) ?>" data-satuan="<?= $val['satuan'] ?>">
										<?= esc($val['barang']) ?></option>
									<?php endforeach; ?>
								</select>
								<div class="invalid-feedback barang"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-10 col-sm-10">
								<label for="jumlah" class="form-label">Jumlah</label>
								<input type="number" id="jumlah" name="jumlah" class="form-control" placeholder="Jumlah">
								<div class="invalid-feedback jumlah"></div>
							</div>
							<div class="col col-md-2 col-2">
								<label for="" class="form-label">&nbsp;</label>
								<input type="text" id="satuan" readonly class="form-control-plaintext" placeholder="Satuan"
									value="">
							</div>
							<p id="satuan"></p>
						</div>
				</div>
				<div class="modal-footer">
					<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
					<button type="submit" class="btn btn-primary" id="simpanPengajuan">Kirim Ajuan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- / modal tambah -->
</div>

<!-- tippy JS -->
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
<script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>

<script>
	tippy('#btn-tambah', {
		content: 'Mengajukan Barang',
		animation: 'scale',
		followCursor: 'horizontal',
		delay: [600, 0],
		trigger: "mouseenter"
	});

	//menampilkan flashdata saat user menerima barang / approve
	let text = '<?= session()->getFlashdata("msg") ?>'
	if (text != '') {
		$(document).ready(function () {
			$.toast({
				text: `${text}`,
				showHideTransition: 'slide',
				loaderBg: '#6a8cdc',
				hideAfter: 3000,
				position: 'top-right'
			})
		})
	}


	$(document).ready(function () {
		//perefectscroll
		$('.wdgt-proccess').each(function () {
			const ps = new PerfectScrollbar($(this)[0], {
				wheelPropagation: false
			});
		});

		// select2
		$('select.form-select#selectBarang').select2({
			placeholder: "Pilih Barang",
			dropdownParent: $("div#tambahPengajuan"),
		});
	});

	$("button#btnApprove").on('click', function () {
		$.ajax({
			type: "POST",
			url: "/pengajuan/approve",
			headers: {
				'X-Requested-With': 'XMLHttpRequest'
			},
			data: {
				id: $(this).data('pengajuan'),
			},
			success: function (data) {
				location.reload()
			},
			error: function (xhr, status, error) {
				console.error(xhr);
			}
		});

	})

	// get realtime data 'status dalam proses'
	let StatusDalamProses = () => {
		$.ajax({
			url: '/pengajuan/status-dalam-proses',
			type: "POST",
			success: function (data) {
				let obj = JSON.parse(data);
				// hide message when data is empty
				if (obj.length == 0) {
					$('p#alert-status-dalam-proses').show()
				} else {
					$('p#alert-status-dalam-proses').hide()
					$('div#card-status-dalam-proses').css('height', '300px')
					$('ul#status-dalam-proses').html('')
				}


				for (let i = 0; i < obj.length; i++) {
					let status = '';
					let color = '';
					if (obj[i]['status'] == '0') {
						status = 'Diproses';
						color = 'secondary';
					} else if (obj[i]['status'] == '1') {
						status = 'Proses Diapprove';
						color = 'info';
					}
					let list = `
				<li class="d-flex mb-2 pb-2">
					<div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
						<div class="me-2">
							<small class="text-muted d-block mb-1">${obj[i]['tanggal']}</small>
							<h6 class="mb-0">${obj[i]['barang']}</h6>
						</div>
						<span class="badge rounded-pill bg-label-${color}">${status}</span>
					</div>
				</li>
				`
					$('ul#status-dalam-proses').append(list)
				}
			}
		})
	}
	// refresh every 2s
	setInterval(StatusDalamProses, 2000);
	// end //

	// get realtime data 'status dikirim'
	let statusDikirim = () => {
		$.ajax({
			url: '/pengajuan/status-dikirim',
			type: "POST",
			success: function (data) {
				let obj = JSON.parse(data);

				// hide message when data is empty
				if (obj.length == 0) {
					$('p#message-status-dikirm').show()
				} else {
					$('p#message-status-dikirm').hide()
					$('div#card-status-dikirim').css('height', '300px')
					$('ul#status-dikirim').html('')
				}

				for (let i = 0; i < obj.length; i++) {
					console.log(i)

					let status = '';
					let color = '';
					if (obj[i]['status'] == '2') {
						status = 'Dikirim';
						color = 'primary';
					}
					let list = `
					<li class="d-flex mb-2 pb-2">
						<a href="#"
							class="list-hover d-flex w-100 flex-wrap align-items-center justify-content-between gap-2"
							data-bs-toggle="modal" data-bs-target="#status-${i}">
							<div class="me-2">
								<small class="text-muted d-block mb-1">${obj[i]['tanggal']}</small>
								<h6 class="mb-0">${obj[i]['barang']}</h6>
							</div>
							<span class="badge rounded-pill bg-label-${color}">${status}</span>
						</a>
					</li>

					<!-- Modal -->
					<div class="modal fade animate__animated animate__pulse" data-bs-backdrop="static"
						id="status-${i}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
							<div class="modal-content">
								<div class="modal-header d-block">
									<h5 class="modal-title text-center" id="exampleModalLabel">${obj[i]['barang']}</h5>
								</div>
								<div class="modal-body">
									<p>Tanggal Pengajuan : <b>${obj[i]['tanggal']}</b></p>
									<p>jumlah : <b>${obj[i]['jumlah']}</b></p>
									</p>
									<input type="hidden" name="pengajuan" value="">
								</div>
								<div class="modal-footer d-block text-center">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
									<button type="button" id="btnApprove" data-pengajuan="${obj[i]['id_pengajuan']}"
										class="btn btn-success">Diterima</button>
								</div>
							</div>
						</div>
					</div>
					`
					$('ul#status-dikirim').append(list)
				}
			}
		})
	}

	$(document).ready(function () {
		let intervalHandler = setInterval(statusDikirim, 2000);
		$("ul#status-dikirim").hover(function () {
			clearInterval(intervalHandler);
		}, function () {
			intervalHandler = setInterval(statusDikirim, 2000)
		})

	})
</script>
<script src="<?= base_url("/assets/vendor/js/validation-pengajuan.js") ?>">
</script>