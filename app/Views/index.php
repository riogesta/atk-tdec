<article class="ui main container">

  <div class="ui right aligned grid">
    <div class="left floated left aligned six wide column">
      <h2 class="ui header">
        Pengajuan
        <div class="sub header">Alat Tulis kantor</div>
      </h2>
    </div>
    <div class="right floated right aligned six wide column">
      <a href="/pengajuan" class="ui labeled blue icon button">
        <i class="plus icon"></i>
        Pengajuan
      </a>
    </div>
  </div>

  <?= session()->getFlashdata('msg') ?>

  <section class="three column stackable ui grid ">
    <div class="column">
      <a href="#" class="ui fluid card" id="pengajuan">
        <div class="content">
          <div class="ui header">Pengajuan</div>
          <div class="meta">
            <div class="ui label">
              <i class="file alternate outline icon"></i>
            </div>
            2 minute ago
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
    <div class="ui top attached  label">Aktivitas</div>
    <table class="ui celled table">
      <thead>
        <tr>
          <th>Unit / Prodi</th>
          <th>Barang</th>
          <th>satuan</th>
          <th>jumlah</th>
          <th>status</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($ajuan as $row): ?>
        <tr>
          <td><?= esc($row["unit_prodi"]) ?></td>
          <td><?= esc($row["barang"]) ?></td>
          <td><?= esc($row["satuan"]) ?></td>
          <td><?= esc($row["jumlah"]) ?></td>
          <td>
            <?php if (esc($row["status"]) == 0) { ?>
            <div class="ui grey label ">
              <i class="hourglass half icon"></i>
              Diproses
            </div>
            <?php } else if (esc($row["status"]) == 1) { ?>
            <div class="ui teal label ">
              <i class="check icon"></i>
              Proses Diterima
            </div>
            <?php } else if (esc($row['status']) == 2) { ?>
            <div class="ui blue label ">
              <i class="check circle icon"></i>
              Dikirim
            </div>
            <?php } else if (esc($row['status'])) { ?>
            <div class="ui green label ">
              <i class="thumbs up outline icon"></i>
              Telah Diterima
            </div>
            <?php } ?>

          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </section>
</article>

<!-- modals -->
<div class="ui standard test modal" id="pengajuan">
  <div class="header">
    Pengajuan
  </div>
  <div class="content">
    <div class="description">
      <div class="ui header">Default Profile Image</div>
      <p>We've found the following <a href="https://www.gravatar.com" target="_blank">gravatar</a> image associated with
        your e-mail address.</p>
      <p>Is it okay to use this photo?</p>
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
</script>