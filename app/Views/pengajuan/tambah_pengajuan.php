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
            <div class="two fields">
                <div class="field">
                    <label>Barang</label>
                    <select class="ui fluid search dropdown" name="barang">
                        <option value="">Pilih Barang</option>
                        <?php foreach($barang as $val): ?>
                        <option value="<?= $val['id_barang'] ?>" data-satuan="<?= $val['satuan'] ?>">
                            <?= $val['barang'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="field">
                    <label>satuan</label>
                    <input type="text" readonly name="satuan">
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
                placeholder: 'Pilih Barang',
            });
    })

    $('select').click(function () {
        alert($(this).find(':selected').data('satuan'))
    })
</script>