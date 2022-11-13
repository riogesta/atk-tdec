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
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
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
</script>