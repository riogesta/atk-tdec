<div class="ui main container">

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

  <table class="ui selectable celled table">
    <thead>
      <tr>
        <th>Barang</th>
        <th>satuan</th>
        <th>jumlah</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($ajuan as $row): ?>
      <tr>
        <td><?= esc($row["barang"]) ?></td>
        <td><?= esc($row["satuan"]) ?></td>
        <td><?= esc($row["jumlah"]) ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<script>
  setInterval(function () {
    $(document).ready(function () {
      $("#message").fadeOut("slow");
    });
  }, 3000)
</script>