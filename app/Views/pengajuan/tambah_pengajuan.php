<div class="ui container">

    <div class="ui right aligned grid">
        <div class="left floated left aligned six wide column">
            <h2 class="ui header">
                Pengajuan
                <div class="sub header">Permintaan Barang</div>
            </h2>
        </div>
    </div>

    <div class="ui segment">
        <form method="post" action="/pengajuan" class="ui form">
            <?= csrf_field() ?>
            <div class="three fields">
                <div class="field">
                    <label>Barang</label>
                    <select class="ui fluid search dropdown" name="barang">
                        <option value="">Pilih Barang</option>
                        <?php foreach($barang as $val): ?>
                        <option value="<?= $val['id_barang'] ?>"><?= $val['barang'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="field">
                    <label>Unit / Prodi</label>
                    <select name="unit-prodi" class="ui fluid dropdown" id="dropdown">
                        <option value="">Pilih Unit/Prodi</option>
                        <?php foreach($unit as $val): ?>
                        <option value="<?= $val['id_unit_prodi'] ?>"><?= $val['unit_prodi'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="field">
                    <label>satuan</label>
                    <select name="satuan" class="ui fluid dropdown" id="">
                        <option value="">Pilih Satuan</option>
                        <?php foreach($satuan as $val): ?>
                        <option value="<?= $val['id_satuan'] ?>"><?= $val['satuan'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="field">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" placeholder="Jumlah">
                </div>
            </div>
            <button type="submit" class="ui button blue">Ajukan</button>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('select.ui.search.dropdown')
            .dropdown({
                clearable: true,
                placeholder: 'Pilih Barang'
            });
    })
</script>