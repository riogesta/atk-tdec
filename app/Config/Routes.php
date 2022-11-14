<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Home::index');

// routes pengajauan user//
// $routes->get('pengajuan/unit-prodi/(:segment)', 'Pengajuan::test/$1');
$routes->group('pengajuan', static function($routes){
    $routes->match(['get','post'], '/', 'Pengajuan::index');
    // halaman user
    $routes->post('ubah-pengajuan', 'Pengajuan::ubahPengajuan');
    $routes->post('ubah-pengajuan/simpan-perubahan', 'Pengajuan::simpanPerubahanPengajuan');
    // end halaman user
    $routes->post('edit', 'Pengajuan::ubahPengajuan');
    $routes->get('unit-prodi/(:segment)', 'Pengajuan::filUnitProdi/$1');
    $routes->get('(:segment)', 'Pengajuan::ubahStatus/$1');
    $routes->post('status', 'Pengajuan::editStatus');
    $routes->post('approve', 'Pengajuan::approve');
    $routes->post('riwayat-pengajuan', 'Pengajuan::riwayatPengajuan');
    $routes->post('status-dalam-proses', 'Pengajuan::tampilStatusDalamProses');
    $routes->post('status-dikirim', 'Pengajuan::statusDikirim');
});
// end //

$routes->post('satuan/tambah', 'Barang::tambahSatuan');

// routes barang //
$routes->group('barang', static function($routes){
    $routes->match(['get','post'], '/', 'Barang::index');
    $routes->post('edit', 'Barang::edit');
    $routes->post('hapus', 'Barang::hapus');
});
// end //

// routes login logout //
$routes->match(['get','post'], 'login','Login::index');
$routes->get('logout','Login::logout');
// end //

// routes users //
$routes->match(['get','post'], '/akun','User::index'); // Open and Add data USER
$routes->group('akun', static function($routes){
    $routes->get('(:segment)', 'User::edit/$1'); 
    $routes->post('edit','User::edit');
    $routes->post('hapus','User::hapus');
    $routes->get('user-exist/(:segment)', 'User::userExist/$1');
    $routes->get('unit-prodi-exist/(:segment)', 'User::unitProdiExist/$1');
});
$routes->post('akun/hapus','User::hapus');
// end //

// routes unit prodi //
$routes->group('unit-prodi', static function($routes){
    $routes->match(['get', 'post'], '/', 'UnitProdi::index');
    $routes->post('hapus', 'UnitProdi::hapus'); // will be : /unit-prodi/hapus
    $routes->post('edit', 'UnitProdi::edit');   // will be : /unit-prodi/edit
});
// end //

// routes rekapitulasi //
$routes->group('rekapitulasi', static function($routes){
    $routes->get('/', 'Rekapitulasi::index');
    $routes->get('excel', 'Rekapitulasi::generateExcel');
    $routes->get('pdf', 'Rekapitulasi::generatePdf');
    $routes->get('dump', 'Rekapitulasi::dataTesting');
});
// end //

// routes akademik //
$routes->group('tahun-akademik', static function($routes){
    $routes->match(['get','post'], '/', 'Akademik::index');
    $routes->post('edit', 'Akademik::edit');
    $routes->post('hapus', 'Akademik::hapus');
    $routes->post('ubah-tahun-aktif', 'Akademik::gantiTahunAkademikAktif');
});
// end //

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}