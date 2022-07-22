<article class="ui main container">

    <div class="ui right aligned grid">
        <div class="left floated left aligned six wide column">
            <h2 class="ui header">
                Barang
                <div class="sub header">Data Barang</div>
            </h2>
        </div>
    </div>

    <?= session()->getFlashdata('msg') ?>

    <section class="three column stackable ui grid ">
        <div class="column">
            <a href="#" class="ui fluid card" id="pengajuan">
                <div class="content">
                    <div class="ui header">Barang</div>
                    <div class="meta">
                        <div class="ui label">
                            <i class="file alternate outline icon"></i>Total Barang
                            <?= esc($count) ?>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="column">
            <div class="ui fluid card">
                <div class="content">
                    <div class="ui header">Elliot Fu</div>
                    <div class="meta">Friend</div>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="ui fluid card">
                <div class="content">
                    <div class="ui header">Elliot Fu</div>
                    <div class="meta">Friend</div>
                </div>
            </div>
        </div>
    </section>

    <section class="ui segment">
        <div class="ui top attached  label">Daftar Barang</div>
        <table class="ui celled table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Barang</th>
                    <th>Satuan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach($barang as $row): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($row['barang']) ?></td>
                    <td><?= esc($row['satuan']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</article>

<!-- modals -->
<div class="ui standard test modal" id="pengajuan">
    <div class="header">
        <div id="context2">
            <div class="ui secondary menu">
                <a class="item active" data-tab="barang">Barang</a>
                <a class="item" data-tab="satuan">Satuan</a>
            </div>
        </div>
    </div>
    <div class="content">

        <div class="ui active tab" data-tab="barang">
            <form action="/barang/tambah" method="post">
                <?= csrf_field() ?>
                <div class="ui form">
                    <div class="two fields">
                        <div class="field focus">
                            <label>Barang</label>
                            <input type="text" placeholder="Barang" name="barang">
                        </div>
                        <div class="field">
                            <label>Satuan</label>
                            <select name="satuan" id="" class="ui search dropdown">
                                <?php foreach($satuan as $row): ?>
                                <option value="<?= $row['id_satuan'] ?>"><?= $row['satuan'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <button submit="submit" class="ui button blue">simpan barang</button>
                </div>
            </form>
        </div>
        <div class="ui tab" data-tab="satuan">
            <form action="/satuan/tambah" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="isStatus" value="true">
                <div class="ui form">
                    <div class="field focus">
                        <label>Satuan</label>
                        <input type="text" placeholder="Satuan" name="satuan">
                    </div>
                    <button submit="submit" class="ui button blue">Simpan Satuan</button>
                </div>
            </form>
        </div>

    </div>
    <div class="actions">
        <div class="ui black deny button">
            Tutup
        </div>
    </div>
</div>

<script>
    // fadeOut flashdata
    setInterval(function () {
        $(document).ready(function () {
            $("#message").fadeOut("slow");
        });
    }, 3000)

    // call modal
    $("#pengajuan").click(function () {
        $('div.ui.modal#pengajuan')
            .modal('setting', 'transition', 'scale')
            .modal({
                blurring: true
            })
            .modal('setting', 'closable', false)
            .modal('show');

    })

    // dropdown search
    $(document).ready(function () {
        $('select.ui.search.dropdown')
            .dropdown({
                clearable: true,
                placeholder: 'Pilih Barang'
            });
    })

    // tab
    $(document).ready(function () {
        $('.menu .item').tab();
    })
</script>