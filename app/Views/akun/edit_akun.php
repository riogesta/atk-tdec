<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
	<div class="row fv-plugins-icon-container">
		<div class="col-md-12">

			<div class="nav-align-top">
				<ul class="nav nav-pills mb-3" role="tablist">
					<li class="nav-item">
						<button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#akun"
							aria-controls="akun" aria-selected="true">
							<i class="bx bx-user me-1"></i>
							Akun
						</button>
					</li>
					<li class="nav-item">
						<button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#keamanan"
							aria-controls="keamanan" aria-selected="false">
							<i class="bx bx-lock-alt me-1"></i>
							Keamanan
						</button>
					</li>
					<li class="nav-item">
						<button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#role"
							aria-controls="keamanan" aria-selected="false">
							<i class='bx bxs-id-card'></i>
							Hak Akses
						</button>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade show active" id="akun" role="tabpanel">
						<h4 class="card-title">Rincian Akun</h4>
						<hr class="my-0 my-3">
						<form action="/akun/edit" method="POST">
							<?= csrf_field() ?>
							<div class="row">
								<div class="col-md-6 fv-plugins-icon-container">
									<label for="username" class="form-label">Username</label>
									<input type="hidden" name="username-old" value="<?= esc($user['username']) ?>">
									<input class="form-control" type="text" id="username" name="username"
										value="<?= esc($user['username']) ?>" autofocus="">
									<div class="invalid-feedback username"></div>
								</div>
								<div class="col-md-6 fv-plugins-icon-container">
									<label for="unit-prodi" class="form-label">Unit / Prodi</label>
									<select name="unit-prodi" id="unit-prodi" class="form-select select2"
										data-allow-clear="true">
										<option value=""></option>
										<?php foreach($unit_prodi as $val): ?>
										<option <?= $val['id_unit_prodi'] == $user['id_unit_prodi'] ? 'selected' : ''  ?>
											value="<?= esc($val['id_unit_prodi'])?>">
											<?= esc($val['unit_prodi'])?></option>
										<?php endforeach; ?>
									</select>
									<div class="fv-plugins-message-container invalid-feedback unit-prodi"></div>
								</div>
							</div>
					</div>

					<div class="tab-pane fade" id="keamanan" role="tabpanel">
						<h4 class="card-title">Ganti Password</h4>
						<hr class="my-0 my-3">

						<div class="row">
							<div class="mb-3 form-password-toggle">
								<label class="form-label" for="password-now">Password Sekarang</label>
								<div class="input-group">
									<input type="password" name="password" class="form-control" id="password-now"
										placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
										aria-describedby="password-now" value="<?= $pw ?>" />
									<span id="password-now" class="input-group-text cursor-pointer"><i
											class="bx bx-hide"></i></span>
								</div>
								<div class="invalid-feedback password"></div>
							</div>
						</div>
						<div class="row">
							<div class="mb-3 col-6 form-password-toggle">
								<label class="form-label" for="new-password">Password Baru</label>
								<div class="input-group">
									<input type="password" class="form-control" id="new-password"
										placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
										aria-describedby="new-password" />
									<span id="new-password" class="input-group-text cursor-pointer"><i
											class="bx bx-hide"></i></span>
								</div>
							</div>
							<div class="mb-3 col-6 form-password-toggle">
								<label class="form-label" for="conf-new-password">Konfirmasi Password Baru</label>
								<div class="input-group">
									<input type="password" class="form-control" id="conf-new-password"
										placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
										aria-describedby="conf-new-passwords" />
									<span id="conf-new-passwords" class="input-group-text cursor-pointer"><i
											class="bx bx-hide"></i></span>
								</div>
							</div>

							<div class="col-12 mb-">
								<p class="fw-semibold mt-2">Password Requirements:</p>
								<ul class="ps-3 mb-0">
									<li class="mb-1">
										Minimum 8 characters long - the more, the better
									</li>
									<li class="mb-1">At least one lowercase character</li>
									<li>At least one number, symbol, or whitespace character</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="tab-pane fade show" id="role" role="tabpanel">
						<h4 class="card-title">Ubah Hak Akses</h4>
						<hr class="my-0 my-3">
						<form action="/akun/edit" method="POST">
							<?= csrf_field() ?>
							<div class="row">
								<div class="btn-group">
									<input type="radio" class="btn-check" name="role" id="0" autocomplete="off"
										<?= $user['role'] == '0' ? 'checked' : '' ?> value="0" />
									<label class="btn btn-outline-primary" for="0">User</label>

									<input type="radio" class="btn-check" name="role" id="1" autocomplete="off"
										<?= $user['role'] == '1' ? 'checked' : '' ?> value="1" />
									<label class="btn btn-outline-primary" for="1">Admin</label>
								</div>
							</div>
					</div>
				</div>
				<div class="mt-3">
					<button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
				</div>
				</form>
			</div>

		</div>
	</div>
</div>

<script>
	$(document).ready(function () {
		$('select.form-select.select2').select2({
			placeholder: "Pilih Unit / Prodi"

		})
	})
</script>
<script src="<?= base_url('/assets/vendor/js/validation-edit-a.js') ?>"></script>