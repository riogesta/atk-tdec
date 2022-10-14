<?php $uri = service('uri') ?>
<nav class="navbar navbar-expand-xl navbar-dark bg-dark">
   <div class="container-fluid">
      <a class="navbar-brand" href="javascript:void(0)">ATK TEDC </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-1">
         <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar-ex-1">
         <div class="navbar-nav me-auto">
            <a class="nav-item nav-link <?= $uri->getSegment(1) == 'pengajuan' ? 'active2' : '' ?>"
               href="<?= base_url('/pengajuan')?>">Pengajuan Barang</a>
            <a class="nav-item nav-link <?= $uri->getSegment(1) == 'rekapitulasi' ? 'active2' : '' ?>"
               href="<?= base_url('/rekapitulasi')?>">Rekapitulasi</a>
         </div>
         <hr>
         <ul class="navbar-nav ms-lg-auto">
            <li class="nav-item">
               <a class="nav-link" href="javascript:void(0)"><i class="tf-icons navbar-icon bx bx-user"></i>
                  <?= esc($_SESSION['USER']) ?></a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="<?= base_url('/logout')?>" onClick="return logout()"><i
                     class="tf-icons navbar-icon bx bx-lock-open-alt"></i>
                  Logout</a>
            </li>

            <script>
               let logout = () => {
                  return confirm("Keluar dari akun ?")
               }
            </script>
         </ul>
      </div>
   </div>
</nav>