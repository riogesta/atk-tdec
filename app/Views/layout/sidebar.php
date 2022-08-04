<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
   <div class="layout-container">
      <?php $uri = service('uri') ?>
      <!-- Menu -->
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
         <div class="app-brand demo">
            <a class="app-brand-link">
               <span class="app-brand-logo demo" style="margin-left: -11px;">
                  <img src="../assets/img/icons/unicons/logo.png" width="50" />
               </span>
               <span class="fw-semibold d-block mx-2" style="font-size: 17px;">
                  Alat Tulis Kantor
               </span>
            </a>


            <a href="<?= previous_url() ?>" class="layout-menu-toggle2 menu-link text-large ms-auto d-block d-xl-none">
               <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
            <a href="<?= previous_url() ?>" class="layout-menu-toggle menu-link text-large ms-auto">
               <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
         </div>

         <div class="menu-inner-shadow"></div>

         <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item <?= $uri->getSegment(1) == '' ? 'active' : '' ?>">
               <a href="/" class="menu-link">
                  <i class='menu-icon tf-icons bx bxs-home'></i>
                  <div> Dashboard</div>
               </a>
            </li>

            <!-- menu layanan -->
            <li class="menu-header small text-uppercase">
               <span class="menu-header-text">Menu Layanan</span>
            </li>
            <?php if ($_SESSION['ROLE'] == '1') { ?>
            <li class="menu-item <?= $uri->getSegment(1) == 'barang' ? 'active' : '' ?>">
               <a href="/barang" class="menu-link">
                  <i class='menu-icon tf-icons bx bxs-package'></i>
                  <div>Data Barang</div>
               </a>
            </li>
            <?php } ?>

            <?php if ($_SESSION['ROLE'] == '1') { ?>
            <li class="menu-item <?= $uri->getSegment(1) == 'unit-prodi' ? 'active' : '' ?>">
               <a href="/unit-prodi" class="menu-link">
                  <i class='menu-icon tf-icons bx bxs-school'></i>
                  <div>Unit / Prodi</div>
               </a>
            </li>
            <?php } ?>

            <li class=" menu-item <?= $uri->getSegment(1) == 'pengajuan' ? 'active' : '' ?>">
               <a href="/pengajuan" class="menu-link">
                  <i class='menu-icon tf-icons bx bxs-notepad'></i>
                  <div>Pengajuan Barang</div>
               </a>
            </li>
            <li class="menu-item <?= $uri->getSegment(1) == 'rekapitulasi' ? 'active' : '' ?>">
               <a href="/rekapitulasi" class="menu-link">
                  <i class='menu-icon tf-icons bx bxs-report'></i>
                  <div>Rekapitulasi</div>
               </a>
            </li>
            <?php if ($_SESSION['ROLE'] == '1') { ?>
            <li class="menu-item <?= $uri->getSegment(1) == 'akun' ? 'active' : '' ?>">
               <a href="/akun" class="menu-link">
                  <i class='menu-icon tf-icons bx bxs-user'></i>
                  <div>Kelola Pengguna</div>
               </a>
            </li>
            <?php } ?>
         </ul>
      </aside>
      <!-- / Menu -->