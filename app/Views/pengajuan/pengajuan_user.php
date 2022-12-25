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
					<button type="button" id="btn-tambah" class="btn btn-xs btn-primary rounded-pill"
						data-bs-toggle="modal" data-bs-target="#tambahPengajuan">
						<i class='bx bx-plus-circle'></i>
					</button>
				</div>
				<div class="card-body wdgt-proccess">
					<ul class="p-0 m-02" id="status-dalam-proses">
						<!-- <p class="text-center text-muted mt-2 mb-0" id="alert-status-dalam-proses">Tidak ada Proses</p> -->

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
							<button type="button" class="approve-all_ dropdown-item"
								data-id="<?= $_SESSION['ID-UNIT-PRODI'] ?>">Tandai telah diterima semua</button>
						</div>
					</div>
				</div>
				<div class="card-body wdgt-proccess">
					<ul class="p-0 m-02" id="status-dikirim">
						<!-- <p class="text-center text-muted mt-2 mb-0" id="message-status-dikirim">Tidak ada Proses</p> -->

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
					<div class="card-datatable">
						<?php if (empty($pengajuan_user)) { ?>
						<h6 class="text-center">Belum Ada Aktifitas Pengajuan</h6>
						<?php } else { ?>
						<table class="table table-hover" id="datatables">
							<thead>
								<tr>
									<th>Barang</th>
									<th>Jumlah Approve</th>
									<th>Tanggal</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($pengajuan_user as $val): ?>
								<tr>
									<td><?= esc($val['barang']) ?></td>
									<td><?= esc($val['jumlah_approve']) ?></td>
									<td><?= esc($val['tanggal']) ?></td>
								</tr>
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
					<button type="button" class="rounded-pill btn-close" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('pengajuan') ?>" method="post">
						<?= csrf_field() ?>
						<div class="row">
							<div class="col mb-3">
								<label for="nameExLarge" class="form-label">Barang</label>
								<select name="barang" class="form-select select2" id="selectBarang"
									data-allow-clear="true">
									<option></option>
									<?php foreach($barang as $val): ?>
									<option value="<?= esc($val['id_barang']) ?>" data-stok="<?= esc($val['stok']) ?>"
										data-satuan="<?= $val['satuan'] ?>">
										<?= esc($val['barang']) ?></option>
									<?php endforeach; ?>
								</select>
								<div class="invalid-feedback barang"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-10 col-sm-10">
								<label for="jumlah" class="form-label">Jumlah</label>
								<input type="number" id="jumlah" name="jumlah" class="form-control"
									placeholder="Jumlah">
								<div class="invalid-feedback jumlah"></div>
							</div>
							<div class="col col-md-2 col-2">
								<label for="" class="form-label">&nbsp;</label>
								<input type="text" id="satuan" readonly class="form-control-plaintext"
									placeholder="Satuan" value="">
							</div>
							<p id="satuan"></p>
						</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" id="simpanPengajuan">Ajukan Barang</button>
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

<!-- ajax -->
<script src=""></script>

<script>
	tippy('#btn-tambah', {
		content: 'Mengajukan Barang',
		animation: 'scale',
		followCursor: 'horizontal',
		delay: [600, 0],
		trigger: "mouseenter"
	});

	//menampilkan flashdata saat user menerima barang / approve
	// alert simpan / edit
	let isSave = '<?= session()->getFlashdata("msg") ?>'
	if (isSave != '') {
		$(document).ready(function () {
			Swal.fire(
				'<?= session()->getFlashdata('
				msg ')?>',
				'',
				'success'
			)
			$(".swal2-container.swal2-backdrop-show").css('z-index', '9999'); //changes the color of the overlay
		})
	}

	// approve semua status "dikirim"
	$(document).ready(function () {
		$('button.approve-all_').on('click', function () {
			let form = document.createElement("form");
			let element1 = document.createElement("input");
			element1.type = 'hidden';

			form.method = "POST";
			form.action = "pengajuan/approve-semua";

			element1.value = $(this).data('id');
			element1.name = "id";
			form.appendChild(element1);

			document.body.appendChild(form);

			form.submit();
		})
	})


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

		$("select.form-select#selectBarang").on("select2:select", function (e) {
			let select_val = $("select.form-select :selected").attr('data-stok')
		});

		// datatable
	});

	$.ajax({
		url: '/pengajuan/riwayat-pengajuan',
		type: 'POST',
		dataType: 'JSON'
	}).done(function (data) {
		$('#datatables').DataTable({
			'aaData': data,
			'columns': [{
					'data': 'barang'
				},
				{
					'data': 'tanggal'
				}
			]
		})
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
				}
				$('ul#status-dalam-proses').html('')

				for (let i = 0; i < obj.proses.length; i++) {
					let status = '';
					let color = '';
					if (obj['proses'][i]['status'] == '0') {
						status = 'Diproses';
						color = 'secondary';
					} else if (obj['proses'][i]['status'] == '1') {
						status = 'Proses Diapprove';
						color = 'info';
					}

					let list = `
					<li class="d-flex mb-2 pb-2">
					<a href="#" class="list-hover proses d-flex w-100 flex-wrap align-items-center justify-content-between gap-2" data-pengajuan="${obj['proses'][i]['id_pengajuan']}">
					<div class="me-2">
					<small class="text-muted d-block mb-1">${obj['proses'][i]['tanggal']}</small>
					<h6 class="mb-0">${obj['proses'][i]['barang']}</h6> 
					</div>
					<div>
						<span class="badge rounded-pill bg-label-${color}">${obj['proses'][i]['jumlah']}</span>
						<span class="badge rounded-pill bg-label-${color}">${status}</span>
					</div>
					</a>
					</li>
					`

					$('ul#status-dalam-proses').append(list)
				}

				// item status approve
				for (let i = 0; i < obj.approve.length; i++) {
					let status = '';
					let color = '';
					if (obj['approve'][i]['status'] == '0') {
						status = 'Diproses';
						color = 'secondary';
					} else if (obj['approve'][i]['status'] == '1') {
						status = 'Proses Diapprove';
						color = 'info';
					}

					let list = `
					<li class="d-flex mb-2 pb-2">
					<div class="proses d-flex w-100 flex-wrap align-items-center justify-content-between gap-2" data-pengajuan="${obj['approve'][i]['id_pengajuan']}">
					<div class="me-2">
						<small class="text-muted d-block mb-1">${obj['approve'][i]['tanggal']}</small>
						<h6 class="mb-0">${obj['approve'][i]['barang']}</h6> 
					</div>
					<div>
						<span class="badge rounded-pill bg-label-${color}">${obj['approve'][i]['jumlah_approve']}</span>
						<span class="badge rounded-pill bg-label-${color}">${status}</span>
					</div>
					</div>
					</li>
					`

					$('ul#status-dalam-proses').append(list)
				}
			}
		})
	}

	// refresh every 2s
	// pause when cursor hover on list 'status dalam proses'
	$(document).ready(function () {
		let intervalHandler = setInterval(StatusDalamProses, 2000);
		$("ul#status-dalam-proses").hover(function () {
			$(this).click(function () {
				return clearInterval(intervalHandler);
			})
			clearInterval(intervalHandler);
		}, function () {
			intervalHandler = setInterval(StatusDalamProses, 2000)
		})
	})
	// end //

	// buka halaman edit pengajuan yang dalam status dalam proses
	$(document).on('click', 'a.list-hover.proses', function () {

		let form = document.createElement("form");
		let element1 = document.createElement("input");
		element1.type = 'hidden';

		form.method = "POST";
		form.action = "pengajuan/ubah-pengajuan";

		element1.value = $(this).data('pengajuan');
		element1.name = "id";
		form.appendChild(element1);

		document.body.appendChild(form);

		form.submit();

	})
	// end //

	// get realtime data 'status dikirim'
	let statusDikirim = () => {
		$.ajax({
			url: '/pengajuan/status-dikirim',
			type: 'POST',
			success: function (data) {
				let obj = JSON.parse(data);

				// console.log(obj);
				// hide message when data is empty
				if (obj.length == 0) {
					$('p#message-status-dikirm').show()
				} else {
					$('p#message-status-dikirm').hide()
					$('div#card-status-dikirim').css('height', '300px')
				}
				$('ul#status-dikirim').html('')

				for (let i = 0; i < obj.length; i++) {
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
							<div>
							<span class="badge rounded-pill bg-label-${color}">${obj[i]['jumlah_approve']}</span>
							<span class="badge rounded-pill bg-label-${color}">${status}</span>
							</div>
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
									<p>jumlah Approve: <b>${obj[i]['jumlah_approve']}</b></p>
									</p>
									<input type="hidden" name="pengajuan" value="">
								</div>
								<div class="modal-footer d-block text-center">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
									<button type="button" data-pengajuan="${obj[i]['id_pengajuan']}"
										class="btn btn-success btn-approve">Diterima</button>
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

	// pause when cursor hover on list 'status dikirim'
	$(document).ready(function () {
		let intervalHandler = setInterval(statusDikirim, 2000);
		$("ul#status-dikirim").hover(function () {
			$(this).click(function () {
				return clearInterval(intervalHandler);
			})
			clearInterval(intervalHandler);
		}, function () {
			intervalHandler = setInterval(statusDikirim, 2000)
		})
	})

	$(document).on('click', 'button.btn-approve', function () {
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
</script>
<script src="<?= base_url("/assets/vendor/js/validation-pengajuan.js") ?>">
</script>