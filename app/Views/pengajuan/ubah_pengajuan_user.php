<!-- Content -->
<div class="container flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('pengajuan/ubah-pengajuan/simpan-perubahan') ?>" method="post">
                <input type="hidden" name="id" id="" value="<?= esc($pengajuan['id_pengajuan']) ?>">
                <div class="mb-2">
                    <label for="barang" class="form-label">Barang</label>
                    <select name="barang" id="barang" class="form-select select2">
                        <option value=""></option>
                        <?php foreach($barang as $val): ?>
                        <option value="<?= esc($val['id_barang']) ?>" data-satuan="<?= $val['satuan'] ?>"
                            <?= $val['barang'] == $pengajuan['barang'] ? 'selected' : '' ?>>
                            <?= esc($val['barang']) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div id="invalid-barang" class="form-text"></div>
                </div>
                <div class="row mb-3">
                    <div class="col-9">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" id="jumlah"
                            value="<?= esc($pengajuan['jumlah']) ?>">
                        <div id="invalid-jumlah" class="form-text"></div>
                    </div>
                    <div class="col-3">
                        <label for="" class="form-label">&nbsp;</label>
                        <input type="readonly" name="satuan" class="form-control-plaintext" id="satuan"
                            value="<?= esc($pengajuan['satuan']) ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class='bx bx-fw bxs-save'></i>
                    Simpan
                </button>
            </form>
            <span></span>
            <button type="button" id="delete" class="btn btn-danger mt-2"
                data-val="<?= esc($pengajuan['id_pengajuan']) ?>">
                <i class='bx bx-fw bxs-trash'></i>
                Batalkan Pengajuan
            </button>
        </div>
    </div>

</div>

<script>
    $(document).ready(function () {
        // select2
        $('select.form-select.select2').select2({
            placeholder: "Pilih Barang"
        });

        // ubah satuan berdasarkan barang
        $('select.select2').on('change', function () {
            let unit_prodi = $('select.select2 option:selected').data('satuan')

            console.log(unit_prodi)
            let satuan = document.getElementById('satuan')
            satuan.value = unit_prodi
        })
    })

    // alert hapus
    $('button#delete').click(function () {
        Swal.fire({
            title: 'Batalkan Pengajuan ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Pengajuan Berhasil Dibatalkan!',
                    icon: 'success',
                    confirmButton: 'Hapus'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // $.ajax({
                        //     type: "POST",
                        //     url: "pembatalan-pengajuan",
                        //     headers: {
                        //         'X-Requested-With': 'XMLHttpRequest'
                        //     },
                        //     data: {
                        //         id: $(this).data('val'),
                        //     },
                        //     success: function (data) {

                        //     },
                        //     error: function (xhr, status, error) {
                        //         console.error(xhr);
                        //     }
                        // });
                        // alert($(this).data('val'))
                        let form = document.createElement("form");
                        let element1 = document.createElement("input");
                        element1.type = 'hidden';

                        form.method = "POST";
                        form.action = "pembatalan-pengajuan";

                        element1.value = $(this).data('val');
                        element1.name = "id";
                        form.appendChild(element1);

                        document.body.appendChild(form);

                        form.submit();
                    }
                })
                $(".swal2-container.swal2-backdrop-show").css('z-index',
                    '9999'); //changes the color of the overlay
            }
        })
        $(".swal2-container.swal2-backdrop-show").css('z-index', '9999'); //changes the color of the overlay
    })
</script>