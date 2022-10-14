<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <!-- ubah tahun akademik -->
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <form action="/tahun-akademik/ubah-tahun-aktif" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id-tahun-akademik-aktif"
                            value="<?= esc($pengaturan['id_pengaturan']) ?>">
                        <div class="row">
                            <label class="col-sm-2 col-form-label bold" for="basic-default-company"><strong>Tahun
                                    Akademik</strong></label>
                            <div class="col-sm-8">
                                <select name="tahun-akademik-aktif" class="form-select select2" id="">
                                    <option value=""></option>
                                    <?php foreach($tahun_akademik as $tahun): ?>
                                    <option
                                        <?= $tahun['id_tahun_akademik'] == $pengaturan['id_tahun_akademik'] ? 'selected' : ''  ?>
                                        value="<?= esc($tahun['id_tahun_akademik']) ?>">
                                        <?= esc($tahun['tahun_akademik']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary"><strong>Ganti Tahun</strong></button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- data tahun akademik -->
<div class="col-xxl">
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0">Tahun Akademik</h5>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                    class='bx bxs-plus-circle'></i> <strong>Tahun
                    Akademik</strong></button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tahun Akademik</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 0;
                            foreach($tahun_akademik as $tahun): 
                            $i++; ?>
                        <tr>
                            <td><?= esc($tahun['tahun_akademik']) ?></td>
                            <td class="text-center" style="width : 15%">
                                <button class="btn btn-sm btn-success rounded-pill" data-bs-toggle="modal"
                                    data-bs-target="#modal-edit-<?= $i ?>"><span class='bx bx-edit-alt'></span></button>
                                <button class="btn btn-sm btn-danger rounded-pill"
                                    data-id="<?= esc($tahun['id_tahun_akademik']) ?>" id="hapus-ta"><span
                                        class='bx bx-trash'></span></button>
                            </td>
                        </tr>
                        <!-- modal edit tahun akademik -->
                        <!-- Modal -->
                        <div class="modal fade" id="modal-edit-<?= $i ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Tahun
                                            Akademik</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/tahun-akademik/edit" method="post">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="id-tahun-akademik"
                                                value="<?= esc($tahun['id_tahun_akademik']) ?>">
                                            <div class="mb-3">
                                                <label class="form-label" for="tahun-akademik">Tahun
                                                    Akademik</label>
                                                <input type="text" name="tahun-akademik" class="form-control"
                                                    id="tahun-akademik"
                                                    placeholder="<?= esc($tahun['tahun_akademik']) ?>"
                                                    value="<?= esc($tahun['tahun_akademik']) ?>">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- modal tambah tahun akademik -->
<div class="modal modal-top fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header d-block">
                <h5 class="modal-title text-center" id="exampleModalLabel">Tambah Tahun Akademik</h5>
            </div>
            <div class="modal-body">
                <form action="/tahun-akademik" method="post">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label class="form-label" for="tahun-akademik">Tahun Akademik</label>
                        <input type="text" name="tahun-akademik" class="form-control" id="tahun-akademik"
                            placeholder="Tahun Akademik">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function () {
        $('select.form-select.select2').select2({
            placeholder: "Pilih Tahun Akademik"
        });
    });

    // delete button
    $('button#hapus-ta').click(function () {
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
                            url: "/tahun-akademik/hapus",
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            data: {
                                id: $(this).data('id'),
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