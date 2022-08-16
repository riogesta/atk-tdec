<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UnitProdiModel;
use App\Models\BarangModel;

class Rekapitulasi extends BaseController
{
    protected $session;
    protected $model; 
    protected $UnitProdiModel;
    protected $BarangModel;

    function __construct() {
        $this->session = session();
        $this->UnitProdiModel = new UnitProdiModel();
        $this->BarangModel = new BarangModel();
    }

    public function index()
    {
        $data = [
            'title' => 'rekapitulasi',
            'unitProdi' => $this->UnitProdiModel->findAll(),
            'rekap' => $this->rekapitulasiData()->getResultArray()
        ];

        return view('layout/head', $data)
                .view('layout/sidebar')
                .view('layout/nav')
                .view('rekapitulasi/rekapitulasi', $data)
                .view('layout/footer');
    }

    public function rekapitulasiData(){
        $db = db_connect();
        return $db->query('
            SELECT 
            pengajuan.*,
            unit_prodi.*,
            satuan.*,
            barang.*
            FROM barang 
            LEFT JOIN pengajuan ON barang.id_barang  = pengajuan.id_barang 
            LEFT JOIN unit_prodi ON unit_prodi.id_unit_prodi = pengajuan.id_unit_prodi 
            LEFT JOIN satuan ON satuan.id_satuan = barang.id_satuan             
        ');
    }
}