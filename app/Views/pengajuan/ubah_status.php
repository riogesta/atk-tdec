<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <section class="col-md-12">
            <form action="/pengajuan/status" method="post">
                <input type="hidden" name="id" value="<?= $pengajuan['id_pengajuan'] ?>">
                <div class="nav-align-top">
                    <ul class="nav nav-pills mb-3" role="tablist">
                        <li class="nav-item">
                            <button type="button"
                                class="nav-link <?= $pengajuan['status'] == '0' ? 'fw-bold active' : '' ?>" role="tab"
                                data-bs-toggle="tab" data-bs-target="#navs-pills-top-diproses"
                                aria-controls="navs-pills-top-diproses"
                                aria-selected="<?= $pengajuan['status'] == '0' ? 'true' : 'false' ?>" id="diproses">
                                <i class='bx bx-fw bxs-hourglass-top'></i>
                                Diproses
                            </button>
                        </li>
                        <li class="d-flex align-items-center">
                            <i class="bx bx-fw bx-chevron-right"></i>
                        </li>
                        <li class="nav-item">
                            <button type="button"
                                class="nav-link <?= $pengajuan['status'] == '1' ? 'fw-bold active' : '' ?>" role="tab"
                                data-bs-toggle="tab" data-bs-target="#navs-pills-top-approve"
                                aria-controls="navs-pills-top-approve"
                                aria-selected="<?= $pengajuan['status'] == '1' ? 'true' : 'false' ?>" id="approve">
                                <i class='bx bx-fw bx-list-check'></i>
                                Proses diaprove
                            </button>
                        </li>
                        <li class="d-flex align-items-center">
                            <i class="bx bx-fw bx-chevron-right"></i>
                        </li>
                        <li class="nav-item">
                            <button type="button"
                                class="nav-link <?= $pengajuan['status'] == '2' ? 'fw-bold active' : '' ?>" role="tab"
                                data-bs-toggle="tab" data-bs-target="#navs-pills-top-dikirim"
                                aria-controls="navs-pills-top-dikirim"
                                aria-selected="<?= $pengajuan['status'] == '2' ? 'true' : 'false' ?>" id="dikirim">
                                <i class='bx bx-fw bx-check-square'></i>
                                Dikirim
                            </button>
                        </li>
                        <li class="d-flex align-items-center">
                            <i class="bx bx-fw bx-chevron-right"></i>
                        </li>
                        <li class="nav-item">
                            <button type="button"
                                class="nav-link <?= $pengajuan['status'] == '3' ? 'fw-bold active' : '' ?>" role="tab"
                                data-bs-toggle="tab" data-bs-target="#navs-pills-top-selesai"
                                aria-controls="navs-pills-top-selesai"
                                aria-selected="<?= $pengajuan['status'] == '3' ? 'true' : 'false' ?>" id="selesai">
                                <i class='bx bx-fw bxs-flag-checkered'></i>
                                Selesai
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade <?= $pengajuan['status'] == '0' ? 'show active' : '' ?>"
                            id="navs-pills-top-diproses" role="tabpanel">
                            <div class="content-header mb-3">
                                <h6 class="mb-0">Status Diproses</h6>
                                <small>Detail Pengajuan.</small>
                            </div>
                            <dl class="row">
                                <dt class="col-sm-3">Barang</dt>
                                <dd class="col-sm-9"><?= esc($pengajuan['barang']) ?></dd>
                                <dt class="col-sm-3">Jumlah</dt>
                                <dd class="col-sm-9"><?= esc($pengajuan['jumlah']) ?></dd>
                                <dt class="col-sm-3">Tanggal</dt>
                                <dd class="col-sm-9"><?= esc($pengajuan['tanggal']) ?></dd>

                                <dt class="col-sm-3">Unit / Prodi</dt>
                                <dd class="col-sm-9"><?= esc($pengajuan['unit_prodi']) ?></dd>

                                <input type="radio" name="status" <?= $pengajuan['status'] == '0' ? 'checked' : '' ?>
                                    value="0" id="rd-0">
                            </dl>
                        </div>
                        <div class="tab-pane fade <?= $pengajuan['status'] == '1' ? 'show active' : '' ?>"
                            id="navs-pills-top-approve" role="tabpanel">
                            <div class="content-header mb-3">
                                <h6 class="mb-0">Status Approve Diproses</h6>
                                <small>Detail Pengajuan.</small>
                            </div>
                            <dl class="row">
                                <dt class="col-sm-3">Barang</dt>
                                <dd class="col-sm-9"><?= esc($pengajuan['barang']) ?></dd>
                                <dt class="col-sm-3">Jumlah</dt>
                                <dd class="col-sm-9"><?= esc($pengajuan['jumlah']) ?></dd>
                                <dt class="col-sm-3">Tanggal</dt>
                                <dd class="col-sm-9"><?= esc($pengajuan['tanggal']) ?></dd>

                                <dt class="col-sm-3">Unit / Prodi</dt>
                                <dd class="col-sm-9"><?= esc($pengajuan['unit_prodi']) ?></dd>
                                <dt class="col-sm-3">Jumlah Approve</dt>
                                <dd class="col-sm-2">
                                    <input type="hidden" name="id_barang" value="<?= $pengajuan['id_barang'] ?>">
                                    <input type="number" class="form-control form-control-sm" name="jumlah-approve"
                                        value="<?= $pengajuan['jumlah_approve'] ?>">
                                </dd>
                                <dd class="col-sm-3 d-flex align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="jumlah-approve2"
                                            value="<?= esc($pengajuan['jumlah']) ?>" id="jumlah-approve-semua">
                                        <label class="form-check-label" for="jumlah-approve-semua">
                                            semua
                                        </label>
                                    </div>
                                </dd>

                                <input type="radio" name="status" <?= $pengajuan['status'] == '1' ? 'checked' : '' ?>
                                    value="1" id="rd-1">
                            </dl>
                        </div>
                        <div class="tab-pane fade <?= $pengajuan['status'] == '2' ? 'show active' : '' ?>"
                            id="navs-pills-top-dikirim" role="tabpanel">
                            <div class="content-header mb-3">
                                <h6 class="mb-0">Status Dikirim</h6>
                                <small>Detail Pengajuan.</small>
                            </div>
                            <dl class="row">
                                <dt class="col-sm-3">Barang</dt>
                                <dd class="col-sm-9"><?= esc($pengajuan['barang']) ?></dd>
                                <dt class="col-sm-3">Jumlah</dt>
                                <dd class="col-sm-9"><?= esc($pengajuan['jumlah']) ?></dd>
                                <dt class="col-sm-3">Tanggal</dt>
                                <dd class="col-sm-9"><?= esc($pengajuan['tanggal']) ?></dd>

                                <dt class="col-sm-3">Unit / Prodi</dt>
                                <dd class="col-sm-9"><?= esc($pengajuan['unit_prodi']) ?></dd>
                                <dt class="col-sm-3">Jumlah Approve</dt>
                                <dd class="col-sm-2"><?= $pengajuan['jumlah_approve'] ?></dd>

                                <input type="radio" name="status" <?= $pengajuan['status'] == '2' ? 'checked' : '' ?>
                                    value="2" id="rd-2">
                            </dl>
                        </div>
                        <div class="tab-pane fade <?= $pengajuan['status'] == '3' ? 'show active' : '' ?>"
                            id="navs-pills-top-selesai" role="tabpanel">
                            <div class="content-header mb-3">
                                <h6 class="mb-0">Status Selesai</h6>
                                <small>Detail Pengajuan.</small>
                            </div>
                            <dl class="row">
                                <dt class="col-sm-3">Barang</dt>
                                <dd class="col-sm-9"><?= esc($pengajuan['barang']) ?></dd>
                                <dt class="col-sm-3">Jumlah</dt>
                                <dd class="col-sm-9"><?= esc($pengajuan['jumlah']) ?></dd>
                                <dt class="col-sm-3">Tanggal</dt>
                                <dd class="col-sm-9"><?= esc($pengajuan['tanggal']) ?></dd>

                                <dt class="col-sm-3">Unit / Prodi</dt>
                                <dd class="col-sm-9"><?= esc($pengajuan['unit_prodi']) ?></dd>
                                <dt class="col-sm-3">Jumlah Approve</dt>
                                <dd class="col-sm-2"><?= $pengajuan['jumlah_approve'] ?></dd>

                                <input type="radio" name="status" <?= $pengajuan['status'] == '3' ? 'checked' : '' ?>
                                    value="3" id="rd-3">
                            </dl>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Ubah status</button>
            </form>
        </section>
    </div>
</div>

<script>
    let check = document.querySelector("input[name='jumlah-approve2']")
    let jumlah_approve = document.querySelector("input[name='jumlah-approve']")

    let jumlah = "<?= $pengajuan['jumlah'] ?>"
    let jumlah_app = "<?= $pengajuan['jumlah_approve']?>"

    check.addEventListener('change', (event) => {
        if (event.currentTarget.checked) {
            jumlah_approve.value = jumlah
        } else {
            jumlah_approve.value = jumlah_app

        }
    })
    //
    let diproses = document.querySelector("button#diproses")
    let approve = document.querySelector("button#approve")
    let dikirim = document.querySelector("button#dikirim")
    let selesai = document.querySelector("button#selesai")

    let rd0 = document.querySelector('#rd-0');
    let rd1 = document.querySelector('#rd-1');
    let rd2 = document.querySelector('#rd-2');
    let rd3 = document.querySelector('#rd-3');

    // hide radio button
    rd0.style.display = 'none'
    rd1.style.display = 'none'
    rd2.style.display = 'none'
    rd3.style.display = 'none'

    diproses.addEventListener('click', () => {
        // hapus checked
        rd1.removeAttribute('checked')
        rd2.removeAttribute('checked')
        rd3.removeAttribute('checked')

        rd0.setAttribute('checked', 'checked')
        jumlah_approve.value = ''
        // rd0.style.display = 'none'
    })


    approve.addEventListener('click', () => {
        // hapus checked
        rd0.removeAttribute('checked')
        rd2.removeAttribute('checked')
        rd3.removeAttribute('checked')

        // tambah atribute checked
        rd1.setAttribute('checked', 'checked');
        jumlah_approve.value = jumlah_app
    })

    dikirim.addEventListener('click', () => {
        // hapus checked
        rd0.removeAttribute('checked')
        rd1.removeAttribute('checked')
        rd3.removeAttribute('checked')

        // tambah atribute checked
        rd2.setAttribute('checked', 'checked');
        // jumlah_approve.value = ''

    })

    selesai.addEventListener('click', () => {
        // hapus checked
        rd0.removeAttribute('checked')
        rd1.removeAttribute('checked')
        rd2.removeAttribute('checked')

        // tambah atribute checked
        rd3.setAttribute('checked', 'checked');
        // jumlah_approve.value = ''

    })
</script>