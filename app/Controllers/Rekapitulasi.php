<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UnitProdiModel;
use App\Models\BarangModel;
use App\Models\RekapitulasiModel;
use Dompdf\Dompdf;
use CodeIgniter\I18n\Time;

class Rekapitulasi extends BaseController
{
    protected $session;
    protected $model; 
    protected $UnitProdiModel;
    protected $BarangModel;

    function __construct() {
        $this->session = session();
        $this->model = new RekapitulasiModel();
        $this->UnitProdiModel = new UnitProdiModel();
        $this->BarangModel = new BarangModel();
    }

    public function index()
    {
        if ($_SESSION['ROLE'] == '0') {
            //halaman rekapitulasi untuk non admin

            $data = [
                'title' => 'rekapitulasi',
                'rekap' => $this->rekapitulasiUser()->getResultArray()
            ];

            // var_dump($data['rekap']);die();

            return view('layout/head', $data)
                .view('layout/topbar')
                .view('rekapitulasi/rekapitulasi', $data)
                .view('layout/footer');

        } else {
            //halaman rekapitulasi untuk admin
            $sql = "
            SELECT
                barang.id_barang,
                barang.barang,
                satuan.satuan,
                unit_prodi.unit_prodi,
                pengajuan.status,
                sum(pengajuan.jumlah) jumlah
                

            FROM pengajuan
            LEFT JOIN barang ON barang.id_barang = pengajuan.id_barang
            LEFT JOIN satuan ON satuan.id_satuan = barang.id_satuan
            LEFT JOIN unit_prodi ON unit_prodi.id_unit_prodi = pengajuan.id_unit_prodi

            WHERE status = '0'
            GROUP BY barang.barang
            ";
            
            $total = $this->model->query($sql)->getResultArray();

            $arrayJumlah = [];

            foreach ($total as $val) {
                array_push($arrayJumlah, $val['jumlah']);
            }

            $data = [
                'title' => 'rekapitulasi',
                'total' => $arrayJumlah
            ];
            
            return view('layout/head', $data)
            .view('layout/sidebar')
            .view('layout/nav')
            .view('rekapitulasi/rekapitulasi', $data)
            .view('layout/footer');
        }
    }

    // rekaputliasi data untuk admin
    public function rekapitulasiData(){
        $sql = "
        SELECT
            barang.id_barang,
            barang.barang,
            satuan.satuan,
            unit_prodi.unit_prodi,
            pengajuan.status,
            sum(pengajuan.jumlah) jumlah
            

        FROM pengajuan
        LEFT JOIN barang ON barang.id_barang = pengajuan.id_barang
        LEFT JOIN satuan ON satuan.id_satuan = barang.id_satuan
        LEFT JOIN unit_prodi ON unit_prodi.id_unit_prodi = pengajuan.id_unit_prodi

        WHERE status = '0'
        GROUP BY barang.barang
        ";
        
        $total = $this->model->query($sql)->getResultArray();

        $arrayJumlah = [];

        foreach ($total as $val) {
            array_push($arrayJumlah, $val['jumlah']);
        }

        return $arrayJumlah;
    }

    public function totalBarangPengajuan() {
        $sql = "
        SELECT
            barang.barang,
            satuan.satuan,
            unit_prodi.unit_prodi,
            pengajuan.status,
            sum(pengajuan.jumlah) total

        FROM pengajuan
        LEFT JOIN barang ON barang.id_barang = pengajuan.id_barang
        LEFT JOIN satuan ON satuan.id_satuan = barang.id_satuan
        LEFT JOIN unit_prodi ON unit_prodi.id_unit_prodi = pengajuan.id_unit_prodi

        WHERE status = '0'
        GROUP BY barang.barang
        ";
        return $this->model->query($sql);
    }

    public function dataTesting() {
        $sql = "
        SELECT
            barang.id_barang,
            barang.barang,
            satuan.satuan,
            unit_prodi.unit_prodi,
            pengajuan.status,
            sum(pengajuan.jumlah) jumlah
            

        FROM pengajuan
        LEFT JOIN barang ON barang.id_barang = pengajuan.id_barang
        LEFT JOIN satuan ON satuan.id_satuan = barang.id_satuan
        LEFT JOIN unit_prodi ON unit_prodi.id_unit_prodi = pengajuan.id_unit_prodi

        WHERE status = '0'
        GROUP BY barang.barang
        ";
        
        $total = $this->model->query($sql)->getResultArray();

        $arrayJumlah = [];

        foreach ($total as $val) {
            array_push($arrayJumlah, $val['jumlah']);
        }

        $data = [
            'total' => $arrayJumlah
        ];

        return view('rekapitulasi/dataTest', $data);

    }

    public function generateExcel () {
        $date = new Time('now', 'Asia/Jakarta', 'en_US');
        $date = $date->toLocalizedString('dd-MMMM-yyyy');

        $data = [
            'rekap' => $this->rekapitulasiUser()->getResultArray(),
            'total' => $this->rekapitulasiData(),
            'date' => $date
        ];

        return view('rekapitulasi/inExcel.php', $data);
    }

    public function generatePdf() {

        $date = new Time('now', 'Asia/Jakarta', 'en_US');
        $date = $date->toLocalizedString('dd MMMM yyyy');

        if ($_SESSION['ROLE'] == '0') {
            // non admin data rekap
            $unit_prodi = $_SESSION['UNIT-PRODI'];
            $filename = $date.' - rekapitulasi - '.$unit_prodi;
            $data = [
                'rekap' => $this->rekapitulasiUser()->getResultArray(),
                'date' => $date
            ];  

        } else {
            $filename = $date.' - rekapitulasi';
            $data = [
                'total' => $this->rekapitulasiData(),
                'date' => $date
            ];   
        }
        // return view('rekapitulasi/inPdf', $data);

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('rekapitulasi/inPdf', $data));
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream($filename);

    }

    public function rekapitulasiUser() {
        $id_unit_prodi = $_SESSION['ID-UNIT-PRODI'];
        $sql = "
        SELECT
            barang.barang,
            satuan.satuan,
            pengajuan.id_unit_prodi,
            unit_prodi.unit_prodi,
            pengajuan.status,
            sum(pengajuan.jumlah) jumlah


        FROM pengajuan
        LEFT JOIN barang ON barang.id_barang = pengajuan.id_barang
        LEFT JOIN satuan ON satuan.id_satuan = barang.id_satuan
        LEFT JOIN unit_prodi ON unit_prodi.id_unit_prodi = pengajuan.id_unit_prodi

        WHERE pengajuan.status = '0' AND pengajuan.id_unit_prodi = '$id_unit_prodi'
        GROUP BY barang.barang, unit_prodi.unit_prodi
        ";

        return $this->model->query($sql);
    }
}