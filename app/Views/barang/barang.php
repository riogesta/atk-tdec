<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
	<!-- Small table -->

	<div class="card">
		<div class="card-header d-flex align-items-center justify-content-between">
			<h5 class="mb-0">Data Barang</h5>
			<button type="button" class="btn rounded-pill btn-primary float-end" data-bs-target="#tambah-barang"
				data-bs-toggle="modal">
				<i class='bx bx-plus-circle'></i>
				Tambah
			</button>
			<!-- <small class="text-muted ">Default label</small> -->
		</div>

		<div class="card-datatable table-responsive">
			<table class="table table-bordered table-striped" id="datatables">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th>Nama Barang</th>
						<th>Satuan</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody class="table-border-bottom-0">
					<?php
						$i = 1;
						foreach($barang as $barang): ?>
					<tr>
						<td class="mb-0 text-xs text-center"><strong><?= $i++ ?></strong></td>
						<td class="mb-0 text-xs"><?= esc($barang['barang']) ?></td>
						<td class="mb-0 text-xs"><?= esc($barang['satuan']) ?></td>
						<td class="mb-0 text-xs">
							<div class="clearfix d-flex justify-content-center">
								<button type="button" class="rounded-pill btn btn-sm btn-success" data-bs-toggle="modal"
									data-bs-target="#staticBackdrop<?= esc($barang['id_barang']) ?>"><i
										class="bx bx-edit-alt me-2"></i>Edit</button>&nbsp;


								<input type="hidden" name="id" value="<?= esc($barang['id_barang']) ?>">
								<button type="button" id="delete" class="rounded-pill btn btn-sm btn-danger"
									data-val="<?= esc($barang['id_barang']) ?>"><i
										class="bx bx-trash me-2"></i>Hapus</button>
							</div>
						</td>
					</tr>

					<!-- modals edit barang-->
					<div class="modal fade" id="staticBackdrop<?= esc($barang['id_barang']) ?>"
						data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
						aria-labelledby="staticBackdropLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header text-center">
									<h5 class="modal-title" id="staticBackdropLabel">Edit Barang</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<form action="/barang/edit" method="post">
										<?= csrf_field() ?>
										<div>
											<div class="mb-3">
												<input type="hidden" name="id" value="<?= esc($barang['id_barang']) ?>">
												<label for="barang" class="form-label">Nama Barang</label>
												<input type="text" class="form-control" name="barang" id="barang"
													placeholder="Nama Barang" value="<?= esc($barang['barang']) ?>"
													aria-describedby="defaultFormControlHelp">
												<div id="barang" class="form-text">We'll never share your details with
													anyone else.</div>
											</div>
											<div class="md-3">
												<label for="satuan" class="form-label">Satuan</label>
												<select id="collapsible-state" class="select2 form-select" name="satuan"
													data-allow-clear="true">
													<?php foreach($satuan as $s): ?>
													<option
														<?= $selected = $s['id_satuan'] == $barang['id_satuan'] ? 'selected' : '' ?>
														value="<?= esc($s['id_satuan']) ?>">
														<?= esc($s['satuan']) ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
								</div>
								<div class="modal-footer">

									<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- / modals edit barang -->
					<?php endforeach; ?>

				</tbody>
			</table>
		</div>
	</div>
	<!-- modal tambah barang -->
	<div class="modal modal-top fade" id="tambah-barang" data-bs-backdrop="static" data-bs-keyboard="false"
		tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<ul class="nav nav-pills " role="tablist">
						<li class="nav-item">
							<button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
								data-bs-target="#form-barang" aria-controls="form-barang"
								aria-selected="true">Barang</button>
						</li>
						<li class="nav-item">
							<button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
								data-bs-target="#navs-pills-within-card-link"
								aria-controls="navs-pills-within-card-link" aria-selected="false">Satuan</button>
						</li>
					</ul>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="tab-content p-0">
						<div class="tab-pane fade show active" id="form-barang" role="tabpanel">
							<form action="/barang" method="post">
								<?= csrf_field() ?>
								<div class="mb-3">
									<label for="barang" class="form-label">Nama Barang</label>
									<input type="text" name="barang" class="form-control" id="tambah-barang"
										placeholder="Nama Barang">
									<div class="invalid-feedback barang"></div>
								</div>
								<div class="md-3">
									<label for="satuan" class="form-label">Satuan</label>
									<select id="collapsible-state" name="satuan" id="pilih-satuan"
										class="select2 form-select" data-allow-clear="true">
										<option value="">Pilih Satuan</option>
										<?php foreach($satuan as $s): ?>
										<option value="<?= esc($s['id_satuan']) ?>"><?= esc($s['satuan']) ?></option>
										<?php endforeach; ?>
									</select>
									<div class="invalid-feedback satuan"></div>
								</div>
								<div class="mt-3">
									<button type="submit" class="btn btn-primary" id="barang-simpan">Simpan</button>
								</div>
							</form>
						</div>
						<div class="tab-pane fade" id="navs-pills-within-card-link" role="tabpanel">
							<form action="/satuan/tambah" method="post">
								<?= csrf_field() ?>
								<div class="mb-3">
									<label for="satuan" class="form-label">Satuan</label>
									<input type="text" class="form-control" name="satuan" id="satuan"
										placeholder="Satuan">
								</div>
								<div class="mt-3">
									<button type="submit" class="btn btn-primary" id="satuan-simpan">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- / modal tambah barang -->

	<!--/ Small table -->
	<!-- Content wrapper -->
</div>

<script>
	// validasi barang
	let btnSimpanBarang = document.querySelector("button#barang-simpan")
	let btnSimpanSatuan = document.querySelector("button#satuan-simpan")
	let btnModalBarang = document.querySelector("button[data-bs-target='#tambah-barang']")

	let inputBarang = document.querySelector("input#tambah-barang")
	let feedbackInputBarang = document.querySelector('div.invalid-feedback.barang')

	btnModalBarang.addEventListener('click', () => {
		btnSimpanBarang.setAttribute('disabled', true)
	})

	inputBarang.addEventListener('input', () => {
		if (inputBarang.value.length < 4) {
			inputBarang.classList.add('is-invalid')
			feedbackInputBarang.innerHTML = 'Minimal terdiri dari 4 kata atau lebih'
			btnSimpanBarang.setAttribute('disabled', true)
		} else {
			inputBarang.classList.remove('is-invalid')
			// feedbackInputBarang.removeAttribute('')
			btnSimpanBarang.removeAttribute('disabled')
		}
	})

	//


	$(document).ready(function () {
		$('div#barang').hide()
	});

	$(document).ready(function () {
		$('#datatables').DataTable({
			"columnDefs": [{
				"orderable": false,
				"targets": 3
			}]
		});
	});

	// sweatalert2
	$('button#delete').click(function () {
		Swal.fire({
			title: 'Data Akan dihapus!',
			text: "apakah kamu yakin?",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus Saja',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.isConfirmed) {
				Swal.fire({
					title: 'Data Berhasil Terhapus!',
					icon: 'success',
					confirmButton: 'Hapus'
				}).then((result) => {
					if (result.isConfirmed) {
						$.ajax({
							type: "POST",
							url: "/barang/hapus",
							headers: {
								'X-Requested-With': 'XMLHttpRequest'
							},
							data: {
								id: $(this).data('val'),
							},
							success: function (data) {
								location.reload()
							},
							error: function (xhr, status, error) {
								console.error(xhr);
							}
						});
					}
				})
				$(".swal2-container.swal2-backdrop-show").css('z-index',
					'9999'); //changes the color of the overlay
			}
		})
		$(".swal2-container.swal2-backdrop-show").css('z-index', '9999'); //changes the color of the overlay
	})
</script>