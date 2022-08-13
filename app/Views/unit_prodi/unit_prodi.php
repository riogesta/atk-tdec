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
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">No
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Unit / Prodi
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php
         		$i = 1;
               foreach($unitProdi as $row): ?>
                    <tr>
                        <td class="mb-0 text-xs text-center"><strong><?= $i++ ?></strong></td>
                        <td class="mb-0 text-xs"><?= esc($row['unit_prodi']) ?></td>
                        <td class="mb-0 text-xs">
                            <div class="clearfix d-flex">
                                <button type="button" class="rounded-pill btn btn-sm btn-success" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop<?= $i ?>">Edit</button>&nbsp;


                                <button type="button" id="delete" class="rounded-pill btn btn-sm btn-danger"
                                    data-val="<?= esc($row['id_unit_prodi']) ?>">Hapus</button>

                            </div>
                        </td>
                    </tr>

                    <!-- modals edit unit prodi -->
                    <div class="modal fade" id="staticBackdrop<?= $i ?>" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit Unit / Prodi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/unit-prodi/edit" method="post">
                                        <?= csrf_field() ?>
                                        <div>
                                            <div class="mb-0">
                                                <input type="hidden" name="id"
                                                    value="<?= esc($row['id_unit_prodi']) ?>">
                                                <label for="unit-prodi" class="form-label">Unit / Prodi</label>
                                                <input type="text" class="form-control" name="unit-prodi"
                                                    id="unit-prodi" placeholder="Unit / Prodi"
                                                    value="<?= esc($row['unit_prodi']) ?>"
                                                    aria-describedby="defaultFormControlHelp">
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">

                                    <button type="submit" class="btn btn-primary">Simpan</button>
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
    <!-- modal tambah unit / prodi -->
    <div class="modal modal-top fade" id="tambah-barang" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Unit / Prodi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/unit-prodi" method="post">
                        <?= csrf_field() ?>
                        <div class="mb-0">
                            <label for="unit-prodi" class="form-label">Unit / Prodi</label>
                            <input type="text" name="unit-prodi" class="form-control" id="unit-prodi"
                                placeholder="Unit / Prodi">
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- / modal tambah barang -->

    <!--/ Small table -->
    <!-- Content wrapper -->
</div>

<script>
    $('abutton#delete').click(function () {
        let id = $(this).data('val');
        alert(id);
    });

    $(document).ready(function () {
        $('#datatables').DataTable({
            "columnDefs": [{
                "orderable": false,
                "targets": 2
            }]
        });
    });

    $('button#delete').click(function () {
        Swal.fire({
            title: 'Data Akan dihapus!',
            text: "apakah kamu yakin?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
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
                            url: "unit-prodi/hapus",
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