<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\PengajuanModel;

class Home extends BaseController
{
    protected $session;
    protected $UserModel;
    protected $PengajuanModel;

    function __construct(){
        $this->session = session();
        $this->UserModel = new UserModel();
        $this->PengajuanModel = new PengajuanModel();
    }

    public function index()
    {

        if (empty($_SESSION['USER'])) {
            return redirect()->to('/login');
        }

        if ($_SESSION['ROLE'] == '0') {
            return redirect()->route('pengajuan');
        }

        //
        $sql = "
        SELECT
            barang.barang,
            satuan.satuan,
            DATE_FORMAT(pengajuan.tanggal, '%d %M %Y') AS tanggal,
            unit_prodi.unit_prodi,
            pengajuan.status

        FROM pengajuan
        LEFT JOIN barang ON barang.id_barang = pengajuan.id_barang
        LEFT JOIN satuan ON satuan.id_satuan = barang.id_satuan
        LEFT JOIN unit_prodi ON unit_prodi.id_unit_prodi = pengajuan.id_unit_prodi

        WHERE status = '2'
        ";
        $pengajuan = $this->PengajuanModel->query($sql)->getResultArray();

        $data = [
            'title'=> 'Beranda',
            'totalUsers' => $this->totalUsers(),
            'totalPengajuan' => $this->totalPengajuanMasuk(),
            'totalBarang' => $this->totalBarang(),
            'pengajuan' => $pengajuan
        ];

        return view('layout/head', $data)
                .view('layout/sidebar')
                .view('layout/nav')
                .view('index', $data)
                .view('layout/footer');
    }

    // total semua akun users
    public function totalUsers () {
        $total = $this->PengajuanModel->query("SELECT COUNT(username) AS totalUsers FROM users;")->getRowArray();
        return $total['totalUsers'];
    }

    // total pengajuan yang masuk
    public function totalPengajuanMasuk(){
        $total = $this->PengajuanModel->query("SELECT COUNT(status) AS totalPengajuan FROM pengajuan WHERE status = '0'")->getRowArray();
        return $total['totalPengajuan'];
    }

    // total barang
    public function totalBarang() {
        $total =  $this->PengajuanModel->query("SELECT COUNT(barang) AS totalBarang FROM barang;")->getRowArray();
        return $total['totalBarang'];
    }

}