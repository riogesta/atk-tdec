<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
   <div class="layout-container">
      <?php $uri = service('uri') ?>
      <!-- Menu -->
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
         <ul class="menu-inner py-3">

            <!-- user profile -->
            <li class="menu-item">
               <a href="javascript:void(0);" class="menu-link menu-toggle" data-bs-toggle="dropdown">
                  <div>
                     <img src="<?= base_url('public/assets/img/avatars/1.png')?>" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                  <div class="mx-2">
                     <span class="fw-semibold d-block"><?= esc($_SESSION['UNIT-PRODI']) ?></span>
                     <small class="text-muted"><?= esc($_SESSION['USER']) ?></small>
                  </div>
               </a>
               <ul class="menu-sub">
                  <li class="menu-item">
                     <a href="<?= base_url('/logout')?>" class="menu-link">
                        <div data-i18n="Analytics">Logout</div>
                     </a>
                  </li>
               </ul>
            </li>


            <!-- menu layanan -->
            <li class="menu-header small text-uppercase">
               <span class="menu-header-text">Menu Layanan</span>
            </li>

            <li class="menu-item <?= $uri->getSegment(1) == '' ? 'active' : '' ?>">
               <a href="/" class="menu-link">
                  <i class='menu-icon tf-icons bx bxs-home'></i>
                  <div> Dashboard</div>
               </a>
            </li>
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
            <?php if ($_SESSION['ROLE'] == '1') { ?>
            <?php 
            $active = "";
            if ($uri->getSegment(1) == 'barang' || $uri->getSegment(1) == 'unit-prodi') {
               $active = "active open";
            }?>
            <li class="menu-item <?= $active ?>">
               <a href="javascript:void(0)" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bxs-customize"></i>
                  <div data-i18n="Icons">Master Data</div>
               </a>
               <ul class="menu-sub">
                  <?php if ($_SESSION['ROLE'] == '1') { ?>
                  <li class="menu-item <?= $uri->getSegment(1) == 'barang' ? 'active' : '' ?>">
                     <a href="/barang" class="menu-link">Barang</a>
                  </li>
                  <?php } ?>
                  <?php if ($_SESSION['ROLE'] == '1') { ?>
                  <li class="menu-item <?= $uri->getSegment(1) == 'unit-prodi' ? 'active' : '' ?>">
                     <a href="/unit-prodi" class="menu-link">Unit/Prodi</a>
                  </li>
                  <?php } ?>
               </ul>
            </li>

            <?php 
            $active = "";
            if ($uri->getSegment(1) == 'tahun-akademik') {
               $active = "active open";
            }?>
            <li class="menu-item <?= $active ?>">
               <a href="javascript:void(0)" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bxs-cog"></i>
                  <div data-i18n="Icons">Pengaturan</div>
               </a>
               <ul class="menu-sub">
                  <?php if ($_SESSION['ROLE'] == '1') { ?>
                  <li class="menu-item <?= $uri->getSegment(1) == 'tahun-akademik' ? 'active' : '' ?>">
                     <a href="/tahun-akademik" class="menu-link">Tahun Akademik</a>
                  </li>
                  <?php } ?>
               </ul>
            </li>
            <?php } ?>
         </ul>
      </aside>
      <!-- / Menu -->